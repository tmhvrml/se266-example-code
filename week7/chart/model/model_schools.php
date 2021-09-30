<?php

    include __DIR__ . '/dbconnect.php';
    
    function getSchoolSummaryInfo () {
        $db = dbconnect();

        $stmt = $db->prepare("SELECT schoolState, COUNT(*) AS schoolCount from schools
                            GROUP BY schoolstate
                            ORDER BY COUNT(*) DESC LIMIT 10");

      
        $schools = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $schools = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return ($schools);
    }
    
   
 ?>