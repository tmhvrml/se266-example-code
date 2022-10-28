<?php

//*****************************************************
//
// This class provides a wrapper for the database 
// All methods work on the schools table

class Schools
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
    public function insertSchoolsFromFile($fileName) 
    {
        $insertSucessful = false;           // file records are not added at this point
        $schoolTable = $this->schoolData;   // Alias for database PDO
        $schoolCounter = 0;                 // Counter for rows read from file
       
        // We only proceed if the file exists
        if (file_exists($fileName))
        {
            // Clear current records in table so there are no duplicates
            $this->deleteAllSchools();

            // Open file 
            $schoolFileRef = fopen($fileName, 'rb');

            // ignore first line (CSV header row) by loading and not using it
            $row = fgetcsv($schoolFileRef);

            $schoolCounter = 0;
            // Loop through entire file
            while (!feof($schoolFileRef)) 
            {
                // Get a row from the CSV file
                $row = fgetcsv($schoolFileRef);

                // Convert any special character in the fields into HTML characters
                $school = str_replace("'", "''", htmlspecialchars($row[0]));
                $city = str_replace("'", "''", htmlspecialchars($row[1]));
                $state = str_replace("'", "''", htmlspecialchars($row[2]));

                // Create the string of values for the INSERT
                $schoolToInsert = "('" . $school . "' , '" . $city . "' , '" . $state. "')";

                // This if-statement is here to filter the number of records added to the database
                // When testing, you may not want to add *all* records for time's sake
                if ($schoolCounter++ % self::MAX_INSERT_ROWS == 0) 
                {
                    // Add the school to the database
                   $schoolTable->query("INSERT INTO schools (schoolName, schoolCity, schoolState) VALUES ". $schoolToInsert);
                }
            }
 
            // All done, for security reasons, close and delete the CSV file
           fclose($schoolFileRef);
           unlink($fileName);
        }
        return $insertSucessful;
      } // end insertSchools from File
   
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
    public function deleteAllSchools() 
    {
            $deleteSucessful = false;           // Team not updated at this point
            $schoolTable = $this->schoolData;   // Alias for database PDO

            // Preparing SQL query    
            $deleteSucessful = $schoolTable->query("DELETE FROM schools;");

            // Execute query and check to see if rows were returned 
            // If so, the schools were successfully deleted      
           // $deleteSucessful = ($stmt->execute() && $stmt->rowCount() > 0);

            // Return status to client           
            return $deleteSucessful;
    }
   
    //*****************************************************
    // Get a count of schools int he database
    // RETURNS: how many schools were uploaded were uploaded to DB
   public function getSchoolCount() 
   {
        $schoolTable = $this->schoolData;   // Alias for database PDO

        // Build SQL query, notice we alias the count result so we can access it
        $stmt = $schoolTable->query("SELECT COUNT(*) AS schoolCount FROM schools");

        // Grab the results into an associative array
        $results = $stmt->fetch(PDO::FETCH_ASSOC);   
        
        // return the count of schools in DB
        return $results['schoolCount'];
   } // end getSchoolCount


     //*****************************************************
    // Allows user to search for either a school name, city, state or any combination
    // INPUT: school name, host city and state to search for
    // RETURNS: table of records of schools matching the criteria
   public function getSelectedSchools($name, $city, $state) 
   {
       $results = array();                  // Empty results table 
       $binds = array();                    // Empty bind array
       $isFirstClause = true;               // Next WHERE clause is first
       $schoolTable = $this->schoolData;   // Alias for database PDO

       // Here is the base SQL statement to select all schools
       $sql = "SELECT id, schoolName, schoolCity, schoolState FROM schools ";

        // Now we check for any parameters and build the WHERE clause filters
        // First, school name:
        if (isset($name)) 
        {
            if ($isFirstClause)
            {
                $sql .= " WHERE ";
                $isFirstClause = false;
            }
            else
            {
                $sql .= " AND ";
            }
            $sql .= " schoolName LIKE :schoolName";
            $binds['schoolName'] = '%'.$name.'%';
        }
      
        // Next, city name:
        if (isset($city)) 
        {
            if ($isFirstClause)
            {
                $sql .= " WHERE ";
                $isFirstClause = false;
            }
            else
            {
                $sql .= " AND ";
            }
            $sql .= "  schoolCity LIKE :city";
           $binds['city'] = '%'.$city.'%';
       }

        // Finally, state:
        if (isset($state)) 
        {
            if ($isFirstClause)
            {
                $sql .= " WHERE ";
                $isFirstClause = false;
            }
            else
            {
                $sql .= " AND ";
            }
           $sql .= "  schoolState LIKE :state";
           $binds['state'] = '%'.$state.'%';
       }

       // Let's sort whatever records come back
       $sql .= " ORDER BY schoolState, schoolName";
       
       // Prepare the SQL statement object
       $stmt = $schoolTable->prepare($sql);
      
       // Execute the query and fetch the results into a 
       // table of associative arrays
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Return the results
        return $results;
   }    // end getSelected Schools

   // Destructor to clean up any memory allocation
   public function __destruct() 
   {
       // Mark the PDO for deletion
       $this->schoolData = null;

        // If we had a datafield that was a fileReference
        // we should ensure the file is closed
        // We don't have that here since schoolFileRef was local to 
        // the method insertSchoolsFromFile   
        // if($this->myFileRef)
        // {
        //     fclose($this->myFileRef);
        // }

   }


} // end Schools class