<html>
<body>

<?php  echo "<h2>Welcome to SE266!  PHP Rocks!!!!</h2>"; 

// Integer
$stuff = 10;
echo $stuff . "<br />";
$stuff = "Whatever";

echo $stuff . "<br />";

$myArray = array('rocks', 'pebbles', 'sand');
echo count($myArray) . "<br />";
?>

<ul>

<?php for($index = 0; $index < count($myArray); $index++)
    { ?>
        <li><?php echo $myArray[$index]; ?> </li>
   <?php } 
?>

<?php for($index = 0; $index < count($myArray); $index++)
    {

        // This is comment
        /* This is a multiple line comment
            */
        echo "<li>" . $myArray[$index] . "</li>";
    } 

    var_dump($myArray);
    echo "<p>display w/print_r </p>";
    print_r($myArray);

    $statement = "PHP is a cool language!!!";
    $statementArray = explode(" ",$statement);
    echo "<p></p>";
    print_r($statementArray);

    echo nl2br("\n  \n  \n \t \t Here I am! \n");

    echo mt_rand(1, 10);

    $myvar1 = "Hello";
    $myvar2 = "World";

    ?>
    <p>
        <?php echo $myvar1 . ' ' . $myvar2; ?>
    </p>

    <p>
        <?php echo "$myvar1 <h1>  $myvar2 </h1>"; //double quotes ?>
    </p>

    <p>
        <?php echo '$myvar1  $myvar2'; // single quotes ?>
    </p>



</ul>


</body>
</html>
