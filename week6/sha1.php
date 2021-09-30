<?php
$str = "Brady";
echo sha1($str) . "<br />";

$str = "brady";
echo sha1($str) . "<br />";


$salt = "SECRET";


echo sha1($salt . $str) . "<br />";
 
 

 
 ?>

