<?php
    include_once './controllers/postArrDemo01func.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forms example</title>
</head>
<body>
    <?php echo $error; ?>
    <hr />
    <form method="post" action="postArray_demo01.php">
        Adult:<input type="checkbox" name="adult" value="yes" /><br />
        <input type="text" value="<?php echo $firstName; ?>" name="firstName" />
        <input type="submit" value="Submit This" name="submitThis" />
    </form>   
</body>
</html>