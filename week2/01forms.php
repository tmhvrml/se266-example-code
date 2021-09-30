<?php
    
    if (isset($_POST['add_numbers'])) {
        $number_1 = filter_input(INPUT_POST, 'number_1', FILTER_VALIDATE_FLOAT);
        $number_2 = filter_input(INPUT_POST, 'number_2', FILTER_VALIDATE_FLOAT);
        
    } else {
        $number_1 = 12;
        $number_2 = 25;
    }
    $error = "";
    if (!is_numeric($number_1)) {
        $error .= "<li>Number 1 must be a valid number</li>";
    }
    if (!is_numeric($number_2)) {
        $error .= "<li>Number 2 must be a valid number</li>";
    }
    
    if ($error != "") {
        $error = "<ul>$error</ul>";
    }

    function addNumbers ($num1, $num2) {
        return $num1 + $num2;
    }

    include ('./01forms_inc.php');
?>

