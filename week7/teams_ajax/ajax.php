<?php

include (__DIR__ . '/model/model_teams.php');
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

if ($contentType == "application/json") {

    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);
    $action = $decoded['action'];

    if ($action == "add") {
        $id = addTeam ($decoded['teamName'], $decoded['division']);
        echo json_encode(getTeams());
    }
    else if ($action == "delete") {
        deleteTeam ($decoded['id']);
        echo json_encode(getTeams());
    } else if ($action == "get") {
        $team = getTeam ($decoded['id']);
        echo json_encode($team);
    } else {
        echo json_encode(getTeams());
    }

}