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

//
// Check to see if content type was set and trim leading/trailing spaces
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

// Check to see if we were sent a JSON file
if ($contentType === "application/json") 
{
  //Receive the RAW post data into $content and trim trailing empty lines
  $content = trim(file_get_contents("php://input"));
 
  // Decode JSON file into an associative array
  $decodedJSON = json_decode($content, true);

    $action = $decodedJSON['action'];

    if ($action == "add") 
    {
        $id = $teamDatabase->addTeam ($decodedJSON['teamName'], $decodedJSON['division']);
        echo json_encode($teamDatabase->getTeams());
    }
    else if ($action == "delete") 
    {
        $teamDatabase->deleteTeam ($decodedJSON['id']);
        echo json_encode($teamDatabase->getTeams());
    }
    else if ($action == "get") 
    {
        $team = getTeam ($decodedJSON['id']);
        echo json_encode($team);
    } else 
    {
        echo json_encode($teamDatabase->getTeams());
    }

}