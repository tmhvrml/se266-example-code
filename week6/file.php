<?php

$names = file('names.txt');
echo $names[0]. "*** <br />";
var_dump ($names); // shows an array


echo "<p> </p>";
$file = fopen ('names.txt', 'rb');
while (!feof($file)) {
   $name = fgets ($file);
   echo $name . "*** <br />";
}


define ("MAX_SCHOOLS", 10);
echo "<p> </p>";

if (!file_exists("upload/schools.csv")) {
   echo "<p>File does not exist</p>";
   exit;
}
$file = fopen ('upload/schools.csv', 'rb');
$i = 0;
while (!feof($file) && $i < MAX_SCHOOLS )
 {
   
  $school = fgetcsv($file);
   
   echo $school[0] . "  ---  " . $school[1] . "<br />";
   $i++;
}

?>

