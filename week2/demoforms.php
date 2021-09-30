<?php
    
    if (isset($_POST['submitBtn'])) {
        if (isset($_POST['adult'])) {
            echo "You're an adult";
        } else {
            echo "You are NOT an adult";
        }
        echo "Form submitted<hr />";
        $value = filter_input(INPUT_POST, 'val1', FILTER_VALIDATE_FLOAT);
        echo "$value ****";
        if (!is_numeric($value)) {
             echo "You did not submit a number!";
         }
        
        $state = filter_input (INPUT_POST, 'state');
        
      
        echo $state;
    } else {
        echo "Initial load of form";
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Forms</title>
</head>
<body>
    <h1>Demo Forms</h1>
    <form action="demoforms.php" method="post">
        <input type="text" name="val1" value="Whatever" />
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