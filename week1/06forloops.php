<!DOCTYPE html>
<?php
// Using constants instead of magic numbers is best.
define("LOOP_MAX", 10);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>For loops</title>
    </head>
    <body>
        <h1>Three for loops</h1>

        <p>These all produce the same result but are coded differently</p>
        
        <h2>For loop with { and }</h2>
        <ul>   
        <?php for ($index = 1; $index <= LOOP_MAX; $index++) { ?>
            <li><?php echo $index; ?> </li>    
        <?php } ?>
        </ul> 
        
        <h2>For loop with : and endfor;</h2>
        <ul>
        <?php for($index = 1; $index <= LOOP_MAX; $index++):?>
            <li> <?php echo $index;?> </li>
        <?php endfor; ?>
        </ul>
        
        <h2>No Separation of Concern on this one</h2>
        <?php
            echo "<ul>";
            for ($index = 1; $index <= LOOP_MAX; $index++) {
                echo "<li>$index</li>";
            }
            echo "</ul>";
            
        ?>
        
    </body>
</html>
