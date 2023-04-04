<?php
    include_once './controllers/frmDemo02func.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Forms Data Capture</title>
</head>
<body>
    <h1>Demo Forms</h1>
    <form action="form_demo02.php" method="post">
        Age: <input type="text" name="val1" value="Whatever" />
        <input type="checkbox" value="Adult" name="adult" >Adult<br />
        <input type="radio" value="single" name="status">Single
        <input type="radio" value="relationship" name="status">In a relationship<br />
        <select name="state">
            <option>Rhode Island</option>
            <option>Massachusetts</option>
            <option selected>Connecticut</option>
            <option>Maine</option>
            <option>New Hampshire</option>
            <option>Vermont</option>
        </select>
        
        <input type="submit" name="submitBtn" />
    </form>
</body>
</html>