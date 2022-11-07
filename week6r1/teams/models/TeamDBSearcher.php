<?php

include_once __DIR__ . '/TeamDB.php'; 

// We extend the teams class so we can take advantage of work done earlier
class TeamDBSearcher extends TeamDB
{

    // Allows user to search for either team, division or both
    // INPUT: team and/or division to search for
    function searchTeams ($team, $division) 
    {
        // We set up all the necessary variables here 
        // to ensure they are scoped for the entire function
        $results = array();             // tables of query results
        $binds = array();               // bind array for query parameters
        $teamTable = $this->getDatabaseRef();   // Alias for database PDO

        // Create base SQL statement that we can append
        // specific restrictions to
        $sqlQuery =  "SELECT * FROM  teams   ";
        $isFirstClause = true;
        // If team is set, append team query and bind parameter
        if ($team != "") {
            if ($isFirstClause)
            {
                $sqlQuery .=  " WHERE ";
                $isFirstClause = false;
            }
            else
            {
                $sqlQuery .= " AND ";
            }
            $sqlQuery .= "  teamName LIKE :teamParam";
            $binds['teamParam'] = '%'.$team.'%';
        }
    
        // If division is set, append team query and bind parameter
        if ($division != "") {
            if ($isFirstClause)
            {
                $sqlQuery .=  " WHERE ";
                $isFirstClause = false;
            }
            else
            {
                $sqlQuery .= " AND ";
            }
            $sqlQuery .= "  division LIKE :divisionParam";
            $binds['divisionParam'] = '%'.$division.'%';
        }
    
       
        // Create query object
        $stmt = $teamTable->prepare($sqlQuery);

        // Perform query
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
        {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // Return query rows (if any)
        return $results;
    } // end search teams
}

?>