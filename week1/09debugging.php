<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>"Debugging PHP</title>
</head>
<body>
    <h2>"Debugging" PHP</h2>
    <?php
        $truth = "PHP is a great programming language";
        $arrayTruth = explode(" ", $truth);
        echo "<h2>Using var_dump</h2>";
        var_dump ($arrayTruth);
        echo "<h2>Using print_r</h2>";
        print_r ($arrayTruth);
        echo "\tgot here\n"; 
        //exit;// same as echo "got here"; exit;
        // This code will not execute
        echo "Hello, can you hear me?!!!";
    ?>
</body>
</html>