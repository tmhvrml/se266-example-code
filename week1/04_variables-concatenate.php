<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Concatenate Strings</title>
    </head>
    <body>
        <h1>Concatenate Strings</h1>
        <?php
        // Observe the output from each echo statement below
            $myvar1 = 'hello';
            $myvar2 = 'world';
        ?>
        
        <p>
            <?php echo $myvar1 . ' ' . $myvar2; ?>
        </p>

        <p>
            <?php echo "$myvar1 $myvar2"; // Double Quotes ?>
        </p>

        <p>
            <?php echo '$myvar1 $myvar2'; // Single Quotes ?>
        </p>
        
    </body>
</html>
