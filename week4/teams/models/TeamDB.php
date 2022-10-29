<?php

include_once "Team.php";
//*****************************************************
//
// This class provides a wrapper for the database 
// All methods work on the teams table

class TeamDB
{
    // This data field represents the database
    private $teamData;

    //*****************************************************
    // Teams class constructor:
    // Instantiates a PDO object based on given URL and
    // uses that to initialize the data field $teamData
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
            $connectionString = "mysql:host=" . $ini['servername'] . 
            ";port=" . $ini['port'] . 
            ";dbname=" . $ini['dbname'];

            $teamPDO = new PDO( $connectionString, 
                                $ini['username'], 
                                $ini['password']);

            // Don't emulate (pre-compile) prepare statements
            $teamPDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            // Throw exceptions if there is a database error
            $teamPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Set our database to be the newly created PDO
            $this->teamData = $teamPDO;
        }
        else
        {
            // Things didn't go well, throw exception!
            throw new Exception( "<h2>Creation of database object failed!</h2>", 0, null );
        }

    } // end constructor

// Database access & modify methods are listed below. 
// General structure of each method is:
//  1) Set up variable for database and query results
//  2) Set up SQL statement (with parameters, if needed)
//  3) Bind any parameters to values
//  4) Execute statement and check for returned rows
//  5) Return results if needed.

    //*****************************************************
    // Get listing of all teams
    // INPUT: None
    // RETURNS: Array with each entry representing a row in the table
    //          If no records in table, array is empty
    public function getTeams() 
    {
        $results = [];                  // Array to hold results
        $teamTable = $this->teamData;   // Alias for database PDO

        // Preparing SQL query
        $stmt = $teamTable->prepare("SELECT * FROM teams ORDER BY teamname"); 
        
        // Execute query and check to see if rows were returned
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) 
        {
            // if successful, grab all rows
            $results = $stmt->fetchAll(PDO::FETCH_CLASS, "Team");                 
        }         

        // Return results to client
        return $results;
    }

    //*****************************************************
    // Add a team to database
    // INPUT: team and divison to add
    // RETURNS: True if add is successful, false otherwise
    public function addTeam($team, $division) 
    {
        $addSucessful = false;         // Team not added at this point
        $teamTable = $this->teamData;   // Alias for database PDO

        // Preparing SQL query with parameters for team and division
        $stmt = $teamTable->prepare("INSERT INTO teams SET teamName = :teamParam, division = :divisionParam");

        // Bind query parameters to method parameter values
        $boundParams = array(
            ":teamParam" => $team,
            ":divisionParam" => $division
        );       
        
         // Execute query and check to see if rows were returned 
         // If so, the team was successfully added
        $addSucessful = ($stmt->execute($boundParams) && $stmt->rowCount() > 0);
        
         // Return status to client
         return $addSucessful;
    }
   
    //*****************************************************
     //*****************************************************
    // Add a team to database
    //   Uses alternative style to bind query parameters.
    // INPUT: team and divison to add
    // RETURNS: True if add is successful, false otherwise
    public function addTeam2($team, $division) 
    {
        $addSucessful = false;         // Team not added at this point
        $teamTable = $this->teamData;   // Alias for database PDO

        // Preparing SQL query with parameters for team and division
        $stmt = $teamTable->prepare("INSERT INTO teams SET teamName = :teamParam, division = :divisionParam");

        // Bind query parameters to method parameter values
        $stmt->bindValue(':teamParam', $team);
        $stmt->bindValue(':divisionParam', $division);
       
        // Execute query and check to see if rows were returned 
        // If so, the team was successfully added
         $addSucessful = ($stmt->execute() && $stmt->rowCount() > 0);
        
         // Return status to client
         return $addSucessful;
    }

    //*****************************************************
    // Update specified team with a new name and division
    // INPUT: id of team to update
    //        new value for team name
    //        new value for division
    // RETURNS: True if update is successful, false otherwise
    public function updateTeam ($id, $team, $division) 
    {
        $updateSucessful = false;        // Team not updated at this point
        $teamTable = $this->teamData;   // Alias for database PDO

        // Preparing SQL query with parameters for team and division
        //    id is used to ensure we update correct record
        $stmt = $teamTable->prepare("UPDATE teams SET teamName = :teamParam, division = :divisionParam WHERE id=:idParam");
        
         // Bind query parameters to method parameter values
        $stmt->bindValue(':idParam', $id);
        $stmt->bindValue(':teamParam', $team);
        $stmt->bindValue(':divisionParam', $division);

        // Execute query and check to see if rows were returned 
        // If so, the team was successfully updated      
        $updateSucessful = ($stmt->execute() && $stmt->rowCount() > 0);

          // Return status to client
          return $updateSucessful;
    }

    //*****************************************************
    // Delete specified team from table
    // INPUT: id of team to delete
    // RETURNS: True if update is successful, false otherwise
    public function deleteTeam ($id) 
    {
        $deleteSucessful = false;       // Team not updated at this point
        $teamTable = $this->teamData;   // Alias for database PDO

        // Preparing SQL query 
        //    id is used to ensure we delete correct record
        $stmt = $teamTable->prepare("DELETE FROM teams WHERE id=:idParam");
        
         // Bind query parameter to method parameter value
        $stmt->bindValue(':idParam', $id);
            
        // Execute query and check to see if rows were returned 
        // If so, the team was successfully deleted      
        $deleteSucessful = ($stmt->execute() && $stmt->rowCount() > 0);

        // Return status to client           
        return $deleteSucessful;
    }
 
    //*****************************************************
    // Get one team and place it into an associative array
    public function getTeam ($id) 
    {
        $results = [];                  // Array to hold results
        $teamTable = $this->teamData;   // Alias for database PDO

        // Preparing SQL query 
        //    id is used to ensure we delete correct record
        $stmt = $teamTable->prepare("SELECT id, teamName, division FROM teams WHERE id=:idParam");

         // Bind query parameter to method parameter value
         $stmt->bindValue(':idParam', $id);
       
         // Execute query and check to see if rows were returned 
         if ( $stmt->execute() && $stmt->rowCount() > 0 ) 
         {
            // if successful, grab the first row returned
            $results = $stmt->setFetchMode(PDO::FETCH_CLASS, "Team");
            $results = $stmt->fetch();                       
        }

        // Return results to client
        return $results;
    }

    public function getDatabaseRef()
    {
        return $this->teamData;
    }

    // Destructor to clean up any memory allocation
   public function __destruct() 
   {
       // Mark the PDO for deletion
       $this->teamData = null;

        // If we had a datafield that was a fileReference
        // we should ensure the file is closed
   }

 
} // end class Teams
?>