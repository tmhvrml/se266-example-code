<?php
    
    include_once './controllers/postArrDemo02func.php';
    
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
    <form method="post" action="postArray_demo02.php">
        <label>First Name:</label>
        <input type="text" value="<?php echo $firstName; ?>" name="firstName" /><br />
        <label>Old enough to drive</label>
        <input type="checkbox" name="oldEnoughToDrive" value="yes">
        <br />
        <input type="submit" value="Check this Form" name="btnSubmit" />
    </form>

</body>
</html>