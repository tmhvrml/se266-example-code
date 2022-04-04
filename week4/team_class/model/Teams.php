<?php

class Teams
{
    // This data field represents the database
    private $teamData;

    public function __construct () 
    {
        $ini = parse_ini_file( __DIR__ . '/dbconfig.ini');

        $this->teamData = new PDO(  "mysql:host=" . $ini['servername'] . 
                ";port=" . $ini['port'] . 
                ";dbname=" . $ini['dbname'], 
                $ini['username'], 
                $ini['password']);

        $this->teamData->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->teamData->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } // end constructor

    // Get listing of all teams
    public function getTeams () 
    {
        $results = [];
        $teamTable = $this->teamData;

        $stmt = $teamTable->prepare("SELECT id, teamName, division FROM teams ORDER BY teamname"); 
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);                 
        }         
         return ($results);
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
        
        if ($stmt->execute($bindParams) && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }    
        return ($results);
    }
   
    // Alternative style to add team records database.
    public function addTeam2 ($team, $division) 
    {
        $results = "Not added";

        $teamTable = $this->teamData;
        $stmt = $teamTable->prepare("INSERT INTO teams SET teamName = :team, division = :division");
       
        $stmt->bindValue(':team', $team);
        $stmt->bindValue(':division', $division);
       
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }
       
        $stmt->closeCursor();
       
        return ($results);
    }

    //// Stubbed for future implementation
    public function updateTeam ($id, $team, $division) 
    {
        $results = "Team not updated.";
        
        return ($results);
    }

    //// Stubbed for future implementation   
    public function deleteTeam ($id) 
    {
        $results = "Data was not deleted.";
         
        return ($results);
    }
 
   //// Stubbed for future implementation
   public function getTeam ($id) 
    {
        $results = ["not implemented"];

        return ($results);
    }
 
} // end class Teams
?>