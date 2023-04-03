<?php 
// Load libraries first

// Place initialization code here
$myVar1 = 10;
$myVar2 = "10";

const LOOP_LIMIT = 15;
define ("ANOTHER_CONSTANT", 100);

// Other code goes here

if ($myVar1 === $myVar2)
{
    echo "They are equal!<br />";
}
else
{
    echo "They are not the same!<br />";
}

?>
<html>
<head>
</head>
<body>
<?php
    if ($myVar1 == $myVar2):
?>
    They are equal!<br />
    <p>This has multiple lines</p>
<?php else: ?>
    <p> something else </p>
<?php endif; ?>

<?php
$index = 0;
while ($index < LOOP_LIMIT):
?>
     The number is  <? $index ?>  of  LOOP_LIMIT !<br/>"
<?php
    $index++;
endwhile; ?>

?>

</body>
</html>