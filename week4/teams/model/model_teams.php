<?php

    include (__DIR__ . '/db.php');
    
    
    function getTeams () {
        global $db;
        
        
        $results = [];

        $stmt = $db->prepare("SELECT id, teamName, division FROM teams ORDER BY teamname"); 
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                 
         }
         
         return ($results);
    }

    
    function addTeam ($t, $d) {
        global $db;
        $results = "Not added";

        $stmt = $db->prepare("INSERT INTO teams SET teamName = :team, division = :division");

        $binds = array(
            ":team" => $t,
            ":division" => $d
        );
        
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }
        
        return ($results);
    }
   

    function addTeam2 ($t, $d) {
        global $db;
        $results = "Not added";

        $stmt = $db->prepare("INSERT INTO teams SET teamName = :team, division = :division");
       
        $stmt->bindValue(':team', $t);
        $stmt->bindValue(':division', $d);
       
        
        
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }
       
        $stmt->closeCursor();
       
        return ($results);
    }
   
    
    //   $result = addTeam2 ('Ajax', 'Eredivisie');
    //   echo $result;
    
    

?>

