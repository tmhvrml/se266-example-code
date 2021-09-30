<?php

    include __DIR__ . '/model/model_schools.php';
    include  __DIR__ . '/functions/colorFunctions.php'; 
    
    $schools = getSchoolSummaryInfo();
    
   
    $results = array();
    $results[0] = array(); // list states
    $results[1] = array (); // number of schools in each state
    $results[2] = getRandomColorArray (10); // colors
    
    foreach ($schools as $s) {
        
        array_push($results[0], $s['schoolState']);
        array_push($results[1], $s['schoolCount']);
        
    }
    
   // var_dump ($results);
   echo json_encode($results);
   
?>