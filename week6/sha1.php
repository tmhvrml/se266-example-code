<?php
$str = "New England Institute of Technology";

echo sha1($str) . "<br />";

$str = "New England Institute of Technology";
echo sha1($str) . "<br />";


$salt = "SECRET";


echo sha1($salt . $str) . "<br />";
 
 ?>

