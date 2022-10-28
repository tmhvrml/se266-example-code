<?php

// Test to determine if this is a POST event
function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

// Test to determine if this is a GET event
function isGetRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' && !empty($_GET) );
}

?>