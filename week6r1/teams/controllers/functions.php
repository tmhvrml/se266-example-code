<?php

// Test to determine if this is a POST event
// RETURNS: True if page load was result of POST, false otherwise
function isPostRequest() 
{
    return (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

// Test to determine if this is a GET event
// RETURNS: True if page load was result of GET with no fields, false otherwise
function isGetRequest() 
{
    return (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' && !empty($_GET) );
}

// Start session and check to see if the user is logged in
// RETURNS: True if user is already logged in, false otherwise
//      If session was not started, it will ne started shen function ends
function isUserLoggedIn()
{
    // Check session staus and start session if not running
    if (session_status() !== PHP_SESSION_ACTIVE) 
    {
        session_start();
    }

    // Check if isLoggedIn is set, then check its status
    return (array_key_exists('isLoggedIn', $_SESSION) && ($_SESSION['isLoggedIn']));
}

?>