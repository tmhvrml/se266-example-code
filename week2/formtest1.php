<?php
    
    // This code runs everytime the page loads
    $firstName = "";
    $error = "";
    if (isset($_POST['btnSubmit'])) {

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
    } else {
       // echo "Not yet submitted"; // for testing
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form example</title>
</head>
<body>
    <?php
        echo "$error";
    ?>
    <br />
    <form method="post" action="formtest1.php">
        <label>First Name:</label>
        <input type="text" value="<?php echo $firstName; ?>" name="firstName" /><br />
        <label>Old enough to drive</label>
        <input type="checkbox" name="oldEnoughToDrive" value="yes">
        <br />
        <input type="submit" value="Check this Form" name="btnSubmit" />
    </form>

</body>
</html>