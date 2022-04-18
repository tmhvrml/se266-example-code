<?php

include_once __DIR__ . '/../week4/team_final/model/Teams.php';

class ExpandedTeams extends Teams

{

    public function __construct($configFile)
    {
        parent::__construct($configFile);
    }

    function searchTeams ($team, $division) 
    {
        $results = array();
        $binds = array();
        $teamTable = $this->getDatabaseRef();   // Alias for database PDO

        $sql =  "SELECT * FROM  teams WHERE 0=0 ";

        if ($team != "") {
            $sql .= " AND teamName LIKE :team";
            $binds['team'] = '%'.$team.'%';
        }
    
        if ($division != "") {
            $sql .= " AND division LIKE :division";
            $binds['division'] = '%'.$division.'%';
        }
    
        $stmt = $teamTable->prepare($sql);
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
        {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
             
        return $results;
    }


}

?>