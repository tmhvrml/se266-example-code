<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Concatenate Strings</title>
    </head>
    <body>
        <h1>Concatenate Strings</h1>
        <?php
            $myvar = 'hello';
            $myvar2 = 'world';
        ?>
        
        <p>
            <?php echo $myvar . ' ' . $myvar2; ?>
        </p>

        <p>
            <?php echo "$myvar $myvar2"; ?>
        </p>

        <p>
            <?php echo '$myvar $myvar2'; ?>
        </p>

        
        
    </body>
</html>
