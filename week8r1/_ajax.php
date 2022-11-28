<?php

// Check to see if content type was set and trim leading/trailing spaces
$contentType = isset($_SERVER["CONTENT_TYPE"]) 
                        ? trim($_SERVER["CONTENT_TYPE"]) 
                        : '';

// Check to see if we were sent a JSON file
if ($contentType === "application/json") 
{
  //Receive the RAW post data into $content and trim trailing empty lines
  $content = trim(file_get_contents("php://input"));
 
  // Decode JSON file into an associative array
  $decoded = json_decode($content, true);

  //If json_decode failed, the JSON is invalid.
  if( is_array($decoded)) 
  {
      // Display User Name from JSON file
      echo json_encode($decoded['user_name1']);
      
  } else 
  {
    echo "<h2>Invalid JSON File sent!</h2>";
  }
}

?>