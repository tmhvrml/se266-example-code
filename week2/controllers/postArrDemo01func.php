<?php
    var_dump($_POST);
    $error = "";
    echo "<hr />";
    $firstName = "";
    if (isset($_POST['submitThis'])) {
        $firstName = filter_input(INPUT_POST, 'firstName');
        if ($firstName == "") {
            $error .= "You did not provide the first name.";
        }
        echo "Form submitted. First Name: $firstName";
    } else {
        echo "Form not yet submitted";
    }
?>