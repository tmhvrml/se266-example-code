<?php

//*****************************************************
//
// This class provides a wrapper for the database 
// All methods work on the schools table

class getSchools
{

    // This data field represents the database
    private $schoolData;
 
    // Maximum number of records to insert into database for testing
    const MAX_INSERT_ROWS = 1000;
    
    //*****************************************************
    // Users class constructor:
    // Instantiates a PDO object based on given URL and
    // uses that to initialize the data field $userData
    //
    // INPUT: URL of database configuration file
    // Throws exception if database access fails
    // ** This constructor is very generic and can be used to 
    // ** access your course database for any assignment
    // ** The methods need to be changed to hit the correct table(s)
    public function __construct($configFile) 
    {
        // Parse config file, throw exception if it fails
        if ($ini = parse_ini_file($configFile))
        {
            // Create PHP Database Object
            $schoolPDO = new PDO( "mysql:host=" . $ini['servername'] . 
                                ";port=" . $ini['port'] . 
                                ";dbname=" . $ini['dbname'], 
                                $ini['username'], 
                                $ini['password']);

            // Don't emulate (pre-compile) prepare statements
            $schoolPDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            // Throw exceptions if there is a database error
            $schoolPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Set our database to be the newly created PDO
            $this->schoolData = $schoolPDO;
        }
        else
        {
            // Things didn't go well, throw exception!
            throw new Exception( "<h2>Creation of database object failed!</h2>", 0, null );
        }

    } // end constructor


    //*****************************************************
    // Load schools into database table "schools" from a CSV file
    // INPUT: Name of CSV file to load schools from
    //       Field order: School Name, City, State Abbreviation
    // RETURNS: True if file opened and schools inserted into table
    //               False otherwise
    public function insertSchoolsFromFile ($fname) 
    {

        $insertSucessful = false;           // file records are not added at this point
        $schoolTable = $this->schoolData;   // Alias for database PDO
        $i = 0;
       
        // We only proceed if the file exists
        if (file_exists($fname))
        {
            // Clear current records in table so there are no duplicates
            deleteAllSchools();

            // Open file and ignore first line (header row)
            $file = fopen ($fname, 'rb');

            // ignore first line by loading and not using it
            $row = fgetcsv($file);

            
            while (!feof($file) && $i++ < 10000) {
                $row = fgetcsv($file);
                $school = str_replace("'", "''", htmlspecialchars($row[0]));
                $city = str_replace("'", "''", htmlspecialchars($row[1]));
                $state = str_replace("'", "''", htmlspecialchars($row[2]));

               $sql[] = "('" . $school . "' , '" . $city . "' , '" . $state. "')";
                // 1,000 records at a time
                if ($i % 1000 == 0) {
                   $db->query('INSERT INTO schools (schoolName, schoolCity, schoolState) VALUES '.implode(',', $sql));
                     $sql = array();
                }
            }
            if (count($sql)) {
                $db->query('INSERT INTO schools (schoolName, schoolCity, schoolState) VALUES '.implode(',', $sql));
            }
        }
        return $insertSucessful;
      }
   
 // Database access & modify methods are listed below. 
// General structure of each method is:
//  1) Set up variable for database and query results
//  2) Set up SQL statement (with parameters, if needed)
//  3) Bind any parameters to values
//  4) Execute statement and check for returned rows
//  5) Return results if needed.

//*****************************************************
    // Delete all teams from table
    // RETURNS: True if delete is successful, false otherwise
    public function deleteAllSchools () 
    {
            $deleteSucessful = false;       // Team not updated at this point
            $schoolTable = $this->schoolData;   // Alias for database PDO

            // Preparing SQL query    
            $stmt = $schoolTable->query("DELETE FROM schools;");

            // Execute query and check to see if rows were returned 
            // If so, the team was successfully deleted      
            $deleteSucessful = ($stmt->execute() && $stmt->rowCount() > 0);

            // Return status to client           
            return $deleteSucessful;
    }
   
  
   public function getSchoolCount() {
       global $db;

       $stmt = $db->query("SELECT COUNT(*) AS schoolCount FROM schools");
       $results = $stmt->fetch(PDO::FETCH_ASSOC);   
       return($results['schoolCount']);
   }
   public function getSchools ($name, $city, $state) {
       global $db;
       
       $binds = array();
       $sql = "SELECT id, schoolName, schoolCity, schoolState FROM schools WHERE 0=0 ";
       if ($name != "") {
            $sql .= " AND schoolName LIKE :schoolName";
            $binds['schoolName'] = '%'.$name.'%';
       }
      
       if ($city != "") {
           $sql .= " AND schoolCity LIKE :city";
           $binds['city'] = '%'.$city.'%';
       }
       if ($state != "") {
           $sql .= " AND schoolState LIKE :state";
           $binds['state'] = '%'.$state.'%';
       }
       
       $stmt = $db->prepare($sql);
      
        $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return ($results);
   }
   
   
 
}
// Test code to make sure these functions work
// $schools = getSchools ('New England', '', 'RI');

// var_dump ($schools);

// $b = checkLogin('donald', 'duck');
// if ($b) echo "Logged in"; else echo "Not logged in";

// insertSchoolsFromFile('../uploads/schools.csv');
// $count= getSchoolCount();
// echo $count;

// if ($result) echo "Logged in"; else echo "Not logged in";

   
