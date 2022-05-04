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

// Check to see if content type was set and trim leading/trailing spaces
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

// Check to see if we were sent a JSON file
if ($contentType === "application/json") 
{
  //Receive the RAW post data into $content and trim trailing empty lines
  $content = trim(file_get_contents("php://input"));
 
  // Decode JSON file into an associative array
  $decodedJSON = json_decode($content, true);


  //If json_decode failed, the JSON is invalid.
  if( is_array($decodedJSON)) {

     // We can add the team to the database
      $team_name = $decodedJSON['team_name'];
      $division = $decodedJSON['division'];

      // This function returns the ID field of the newly 
      //  creasted record in the database
      $results = $teamDatabase->addTeam($team_name, $division);

      // We forward that ID to the caller waiting for a response
      echo json_encode($results);

  } 
  else 
  {
    // Send error back to user.
  }
}

?>