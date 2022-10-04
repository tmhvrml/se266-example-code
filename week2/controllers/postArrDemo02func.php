<?php
    
    // This code runs everytime the page loads
    $firstName = "";
    $error = "";

    if (isset($_POST['btnSubmit'])) 
    {

        // Example code to grab array keys
        $keys = array_keys($_POST);
        foreach($keys as $myKey=>$value)
        {
            echo "<br/>" . $myKey . " : " . $value . "<br/>";
        }

        // Check Form
        $firstName = filter_input(INPUT_POST, 'firstName'); 
        $oldEnough = isset($_POST['oldEnoughToDrive']);
        
        if ($firstName == "") {
            $error .= "No first name provided";
        }
        //echo "Submitted form";    // for testing
    } 
    else 
    {
       // echo "Not yet submitted"; // for testing
    }
    
?>