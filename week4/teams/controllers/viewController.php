<?php
    require_once "./models/TeamDB.php";
    require_once "./controllers/form_utilities.php";
    require_once "./models/dbpointer.php";

    // Set up configuration file and create database
    //$configFile = "../models/prod_dbconfig.ini";
    try 
    {
        $teamDatabase = new TeamDB(DB_CONFIG);
    } 
    catch ( Exception $error ) 
    {
        echo "<h2>" . $error->getMessage() . "</h2>";
    }   
    // If POST, delete the requested team before listing all teams
    if (isPostRequest()) 
    {
        $id = filter_input(INPUT_POST, 'teamId');
        // $id = $_POST['teamId'];
        $teamDatabase->deleteTeam($id);

    }

    // Grab all teams
    // Form builds table from this array
    $teamListing = $teamDatabase->getTeams();
    
?>