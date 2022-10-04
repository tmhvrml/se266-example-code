<?php
// This is a quick and dirty way to capture (and validate) form input

    // This code runs everytine the page loads
    if (isset($_POST['submitBtn'])) 
    {
        if (isset($_POST['adult'])) 
        {
            echo "You're an adult<br />";
        } 
        else 
        {
            echo "You are NOT an adult<br />";
        }

        echo "<p>Form submitted</p><hr />";

        $value = filter_input(INPUT_POST, 'val1', FILTER_VALIDATE_FLOAT);
        echo "$value **** <br />";

        if (!is_numeric($value)) 
        {
             echo "You did not submit a number!<br />";
        }
        
        $state = filter_input (INPUT_POST, 'state');
        
      
        echo $state . "<br />";
    } 
    else 
    {
        echo "<h3>Initial load of form</h3>";
    }
    
?>