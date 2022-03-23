<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // Try this code with different values for $a and $b
        $a = 0;
        $b = false;
        $value = 'foo';

        ?>  
        <?php if ($a === $b): ?>
            'A === B'
        <?php endif; ?>
        <br />   
        <?php if ($a == $b): ?>
            'A == B'
        <?php endif; ?>

        <?php
        if ($a === $b) {
            echo 'A === B';
        }
        echo '<br />';
        if ($a == $b) {
            echo 'A == B';
        }
        ?>

        <?php if ($value == "foo"): ?>
            <p><?php echo $value; ?></p>
        <?php endif; ?>

        <?php
        $expression = false;
        ?>
        
        <?php if ($expression == true): ?>
            This will show if the expression is true.
        <?php elseif ($expression == 10): ?>
            This will show if the expression is 10.
        <?php else: ?>
            Otherwise this will show.
        <?php endif; ?>

    </body>
</html>
