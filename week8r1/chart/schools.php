<?php

include_once __DIR__ . "/model/SchoolStats.php";
//include_once __DIR__ . "/include/functions.php";
 include  __DIR__ . '/include/colorFunctions.php'; 


 $schoolDatabase = new SchoolStats(__DIR__ . "/model/dbconfig.ini");

    $schools =  $schoolDatabase->getSchoolSummaryInfo();
    
   
    $results = array();
    $results[0] = array(); // list states
    $results[1] = array(); // number of schools in each state
    $results[2] = getRandomColorArray(20); // colors
    
    foreach ($schools as $s) {
        
        array_push($results[0], $s['schoolState']);
        array_push($results[1], $s['schoolCount']);
        
    }
    
 //  var_dump ($results);
   echo json_encode($results);


?>