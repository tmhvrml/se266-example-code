<?php

include (__DIR__ . '/model/model_teams.php');

$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

if ($contentType === "application/json") {
  //Receive the RAW post data.
  $content = trim(file_get_contents("php://input"));

  $decoded = json_decode($content, true);

  //If json_decode failed, the JSON is invalid.
  if( is_array($decoded)) {
     // echo json_encode($decoded['team_name']);
      $team_name = $decoded['team_name'];
      $division = $decoded['division'];
      $results = addTeam ($team_name, $division);
      echo json_encode ($results);
  } else {
    // Send error back to user.
  }
}

?>