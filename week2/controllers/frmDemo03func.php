<?php

    include_once 'form_utilities.php';
     // This code runs everytime the page is loaded.
    $allStates = ["Rhode Island", "Massachusetts", "Connecticut", "Maine", "New Hampshire", "Vermont"];

    
    if (isPostRequest()) 
    {
        $selectedState = filter_input (INPUT_POST, 'state');
        echo $selectedState . "<br />";
        // For debugging:
        // var_dump ($_POST);
    } 
    else 
    {
        $selectedState = "";
        echo "<h3>Initial load of form</h3>";
    }
    
?>