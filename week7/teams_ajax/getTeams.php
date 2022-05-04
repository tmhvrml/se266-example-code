<?php

    include_once __DIR__ . '/model/Teams.php';

    // Set up configuration file and create database
    $configFile = __DIR__ . '/model/dbconfig.ini';
    try 
    {
        $teamDatabase = new Teams($configFile);
    } 
    catch ( Exception $error ) 
    {
        echo "<h2>" . $error->getMessage() . "</h2>";
    }   

    // Encode the getTeams response as JSON and return it
    echo json_encode($teamDatabase->getTeams());

?>