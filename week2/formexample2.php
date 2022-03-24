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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms example</title>
</head>
<body>
    <?php echo $error; ?>
    <hr />
    <form method="post" action="formexample2.php">
        Adult:<input type="checkbox" name="adult" value="yes" /><br />
        <input type="text" value="<?php echo $firstName; ?>" name="firstName" />
        <input type="submit" value="Submit This" name="submitThis" />
    </form>   
</body>
</html>