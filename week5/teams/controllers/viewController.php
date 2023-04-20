<?php
    
    require_once "models/TeamDB.php";
    require_once "functions.php";

    // Set up configuration file and create database
    require_once "models/dbpointer.php";  

    try 
    {
        $teamDatabase = new TeamDB(DB_CONFIG_FILE);
    } 
    catch ( Exception $error ) 
    {
        echo "<h2>" . $error->getMessage() . "</h2>";
    }   
    // If POST, delete the requested team before listing all teams
    if (isPostRequest()) {
        $id = filter_input(INPUT_POST, 'teamId');
        // $id = $_POST['teamId'];
        $teamDatabase->deleteTeam($id);

    }
    $teamListing = $teamDatabase->getTeams();
    
?>