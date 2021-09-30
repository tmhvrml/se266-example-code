<?php
$titles = true;
$titles = 10;

$myList = array('Chicken', 'fish', 'rice', 'steak', 'soda');
$myListLength = count($myList);
        
$titles = array('rocks', 'is cool', 'stinks');


if ( is_int($titles) ) {
    $title = 'my page title is 10';
} else {
    $title = 'my page title';
}


$rand = rand(0, 2);
$title = 'my page title ' . $titles[$rand];


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
