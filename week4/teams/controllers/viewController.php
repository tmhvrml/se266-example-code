<?php
    
    include_once __DIR__ . '/../models/TeamDB.php';
    include_once __DIR__ . '/functions.php';

    // Set up configuration file and create database
    $configFile = __DIR__ . '/../models/dbconfig.ini';
    try 
    {
        $teamDatabase = new TeamDB($configFile);
    } 
    catch ( Exception $error ) 
    {
        echo "<h2>" . $error->getMessage() . "</h2>";
    }   
    // If POST, delete the requested team before listing all teams
    if (isPostRequest()) {
        $id = filter_input(INPUT_POST, 'teamId');
        $teamDatabase->deleteTeam ($id);

    }
    $teamListing = $teamDatabase->getTeams();
    
?>