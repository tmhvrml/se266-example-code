<?php

//*****************************************************
//
// This class provides a wrapper for the database 
// All methods work on the teams table

class Teams
{
    // This data field represents the database
    private $teamData;

    //*****************************************************
    // Teams class constructor:
    // Instantiates a PDO object based on given URL and
    // uses that to initialize the data fiel $teamData
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
            $teamPDO = new PDO( "mysql:host=" . $ini['servername'] . 
                                ";port=" . $ini['port'] . 
                                ";dbname=" . $ini['dbname'], 
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

// Database access methods are listed below. 
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
        $stmt = $teamTable->prepare("SELECT id, teamName, division FROM teams ORDER BY teamname"); 
        
        // Execute query and check to see if rows were returned
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) 
        {
            // if successful, grab all rows
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);                 
        }         

        // Return results to client
        return $results;
    }

    //*****************************************************
    // Add a team to database
    // INPUT: team and divison to add
    // RETURNS: True is add is successful, false otherwise
    public function addTeam($team, $division) 
    {
        $addSucessful = false;         // Team not added at this point
        $teamTable = $this->teamData;   // Alias for database PDO

        // Preparing SQL query with parameters for team and division
        $stmt = $teamTable->prepare("INSERT INTO teams SET teamName = :team, division = :division");

        // Bind query parameters to method parameter values
        $boundParams = array(
            ":team" => $team,
            ":division" => $division
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
    //   Use alternative style to bind query parameters.
    // INPUT: team and divison to add
    // RETURNS: True is add is successful, false otherwise
    public function addTeam2($team, $division) 
    {
        $addSucessful = false;         // Team not added at this point
        $teamTable = $this->teamData;   // Alias for database PDO

        // Preparing SQL query with parameters for team and division
        $stmt = $teamTable->prepare("INSERT INTO teams SET teamName = :team, division = :division");

        // Bind query parameters to method parameter values
        $stmt->bindValue(':team', $team);
        $stmt->bindValue(':division', $division);
       
            // Execute query and check to see if rows were returned 
         // If so, the team was successfully added
         $addSucessful = ($stmt->execute() && $stmt->rowCount() > 0);
        
         // Return status to client
         return $addSucessful;
    }

        //*****************************************************
// Update specified team with a new name and division
    public function updateTeam ($id, $team, $division) 
    {
        $results = "Team not updated.";
        $teamTable = $this->teamData;
        $stmt = $teamTable->prepare("UPDATE teams SET teamName = :team, division = :division WHERE id=:id");
        
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':team', $team);
        $stmt->bindValue(':division', $division);

      
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Updated';
        }
        return $results;
    }

        //*****************************************************
// Delete specified team   
    public function deleteTeam ($id) 
    {
        $results = "Data was not deleted.";

        $teamTable = $this->teamData;
        $stmt = $teamTable->prepare("DELETE FROM teams WHERE id=:id");
        
        $stmt->bindValue(':id', $id);
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Deleted';
        } 
        return $results;
    }
 
       //*****************************************************
// Get one team and place it into an associative array
   public function getTeam ($id) 
    {
        $results = [];

        $teamTable = $this->teamData;
        $stmt = $teamTable->prepare("SELECT id, teamName, division FROM teams WHERE id=:id");
        $stmt->bindValue(':id', $id);
       
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetch(PDO::FETCH_ASSOC);
                        
         }
        return $results;
    }
 
} // end class Teams
?>