<?php
// Simple PHP example with arrays, loop and decision.

// Sadly, variables in PHP can be assigned values of multiple types.
// PHP is a "weakly" typed language.
$stuff = true;
$stuff = 10;
$stuff = array('rocks', 'is cool', 'stinks');

// Here is where the code starts.

$rand = rand(0, 2);
$title = 'my page title ' . $stuff[$rand];
if ( is_int($stuff) ) {
    $title = 'my page title is 10';
} else {
    //$title = 'my page title';
}

// Try to declare variables close to where they are used.
$myList = array('Chicken', 'fish', 'rice', 'steak', 'soda');
$myListLength = count($myList);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <h1><?php echo $title; ?></h1>
        
        <ul>   
        <?php for ($index = 0; $index < $myListLength; $index++){ ?>
            <li><?php echo $myList[$index] ?> </li>    
        <?php } ?>
        </ul> 
               
        
    </body>
</html>
