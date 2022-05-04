<?php

include_once __DIR__ . '/Schools.php'; 

// We extend the TeamSearcher class so we can take advantage of work done earlier
class SchoolStats extends Schools
{
    const MAX_SCHOOLS = 20;
    
    public function getSchoolSummaryInfo() 
    {
        // We set up all the necessary variables here 
        // to ensure they are scoped for the entire function
        $results = array();             // tables of query results
        $binds = array();               // bind array for query parameters
        $teamTable = $this->getDatabaseRef();   // Alias for database PDO


        $stmt = $teamTable->prepare("SELECT schoolState, COUNT(*) AS schoolCount from schools
                            GROUP BY schoolState
                            ORDER BY COUNT(*) DESC LIMIT 20");

      
        if ($stmt->execute() && $stmt->rowCount() > 0) 
        {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return $results;
    }
}
   
 ?>