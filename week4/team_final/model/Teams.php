<?php

class Teams
{
    // This data field represents the database
    private $teamData;

    // Teams class constructor
    // INPUT: URL of database configuration file
    // Throws exception if database access fails
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
            throw new Exception( "<h2>Creation of Teams object failed!</h2>", 0, null );
        }

    } // end constructor

// Database access methods are listed below. 
// General structure of each method is:
//  1) Set up variable for database and query results
//  2) Set up SQL statement (with parameters, if needed)
//  3) Bind any parameters to values
//  4) Execute statement and check for returned rows
//  5) Return results if needed.

    // Get listing of all teams
    public function getTeams () 
    {
        $results = [];
        $teamTable = $this->teamData;

        $stmt = $teamTable->prepare("SELECT id, teamName, division FROM teams ORDER BY teamname"); 
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) 
        {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);                 
        }         
        return $results;
    }

    //Add a team to database
    public function addTeam ($team, $division) 
    {
        $results = "Not added";
        $teamTable = $this->teamData;
        $stmt = $teamTable->prepare("INSERT INTO teams SET teamName = :team, division = :division");

        $bindParams = array(
            ":team" => $team,
            ":division" => $division
        );       
        
        if ($stmt->execute($bindParams) && $stmt->rowCount() > 0) 
        {
            $results = 'Data Added';
        }    
        return $results;
    }
   
    // Alternative style to add team records database.
    public function addTeam2 ($team, $division) 
    {
        $results = "Not added";

        $teamTable = $this->teamData;
        $stmt = $teamTable->prepare("INSERT INTO teams SET teamName = :team, division = :division");
       
        $stmt->bindValue(':team', $team);
        $stmt->bindValue(':division', $division);
       
        if ($stmt->execute() && $stmt->rowCount() > 0) 
        {
            $results = 'Data Added';
        }
       
       // $stmt->closeCursor();
       
        return $results;
    }

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