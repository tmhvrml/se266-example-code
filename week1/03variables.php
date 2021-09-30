<!DOCTYPE html>
<?php
    // This is how you do a comment on one line
    /* 
        and this one spans
        multiple lines
    */
 
    // and now the funky variable stuff
     $myvar = 'hello';
     $myvar = 10; // int
     $myvar = true; //boolean
     $myvar = array(); // array
     $myvar = 'hello'; //string
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My page Title <?php echo $myvar; ?></title>
    </head>
    <body>
        
        <h1> my number is
        <?php  
            $randNumber = rand(1,10);
            echo $randNumber;
        ?>
        </h1>
    </body>
</html>
