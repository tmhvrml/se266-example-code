<?php
    
    $firstName = "Alex";
    if (isset($_POST['btnSubmit'])) {
        //var_dump ($_POST);
        $firstName = $_POST['firstName'];
        echo $_POST['firstName'];
      
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Forms</title>
</head>
<body>
    <form method="post" action="test.php">
        <label>First Name</label>
        <input type="text" name="firstName" value="<?= $firstName ?>" /> <!-- // -> $_POST['firstName'] -->
        <input type="submit" name="btnSubmit" /> <!-- // -> $_POST['btnSubmit'] -->

    </form>
</body>
</html>