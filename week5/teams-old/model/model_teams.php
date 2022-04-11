<?php

    include (__DIR__ . '/db.php');
    
    function getTeams () {
        global $db;
        
        $results = [];
        $stmt = $db->prepare("SELECT id, teamName, division FROM teams");
     
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
         }
         
         return ($results);
    }
    
    function addTeam ($t, $d) {
        global $db;
        $results = 'Data NOT Added';
        $stmt = $db->prepare("INSERT INTO teams SET teamName = :team, division = :division");

        $stmt->bindValue(':team', $t);
        $stmt->bindValue(':division', $d);
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }
        
        return ($results);
    }
    
    

    function updateTeam ($id, $team, $division) {
        global $db;

        $results = "";
        
        $stmt = $db->prepare("UPDATE teams SET teamName = :team, division = :division WHERE id=:id");
        
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':team', $team);
        $stmt->bindValue(':division', $division);

      
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Updated';
        }
        
        return ($results);
    }
    
   
    
    
    function deleteTeam ($id) {
        global $db;
        
        $results = "Data was not deleted";
    
        $stmt = $db->prepare("DELETE FROM teams WHERE id=:id");
        
        $stmt->bindValue(':id', $id);
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Deleted';
        }
        
        return ($results);
    }
   
 
  
  

    function getTeam ($id) {
         global $db;
        
        $result = [];
        
        $stmt = $db->prepare("SELECT id, teamName, division FROM teams WHERE id=:id");
        $stmt->bindValue(':id', $id);
       
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        
         }
         
         return ($result);
    }

   

    
    
    
  
  
  
?>

