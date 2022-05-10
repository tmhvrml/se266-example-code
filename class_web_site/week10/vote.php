<?php

include ('functions.php');
include_once __DIR__ . '/model/DisneyVotes.php';

// Set up configuration file and create database
$configFile = __DIR__ . '/model/dbconfig.ini';
try 
{
    $voteDatabase = new DisneyVotes($configFile);
} 
catch ( Exception $error ) 
{
    echo "<h2>" . $error->getMessage() . "</h2>";
}   

if (isPostRequest()) 
{
    $DisneyCharacterID = filter_input(INPUT_POST, 'characterId'); 
    $results = $voteDatabase->insertDisneyVote($DisneyCharacterID, $_SERVER['REMOTE_ADDR'], NOW());
    echo json_encode($results);
    //echo $DisneyCharacterID . $_SERVER['REMOTE_ADDR'] . NOW();
} 
else if (isGetRequest()) 
{
//    $results = $voteDatabase->getVotes();
$DisneyCharacterID = 1; 

$results = $voteDatabase->insertDisneyVote($DisneyCharacterID, $_SERVER['REMOTE_ADDR'], NOW());
echo json_encode($results);
}
    
?>
