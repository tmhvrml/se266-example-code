<?php
    
    $firstName = "";
    $error = "";
    if (isset($_POST['btnSubmit'])) {
        $firstName = filter_input(INPUT_POST, 'firstName'); 
        $oldEnough = isset($_POST['oldEnoughToDrive']);
        if (isset($_POST['oldEnoughToDrive'])) {
            $oldEnough = true;
        } else {
            $oldEnough = false;
        }
        if ($firstName == "") {
            $error .= "No first name provided";
        }
        //echo "Submitted form";
    } else {
       // echo "Not yet submitted";
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