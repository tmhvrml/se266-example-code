<?php

// $names = file('names.txt');
// echo $names[0];
//var_dump ($names); // shows an array



// $file = fopen ('names.txt', 'rb');
// while (!feof($file)) {
//    $name = fgets ($file);
//    echo $name . "*** <br />";
// }
define ("MAX_SCHOOLS", 10);

if (!file_exists("upload/schools.csv")) {
   echo "File does not exist";
   exit;
}
$file = fopen ('upload/schools.csv', 'rb');
$i = 0;
while (!feof($file) && $i < MAX_SCHOOLS ) {
   
   $school = fgetcsv($file);
   
   echo ($school[1]) . "<br />";
   $i++;
}

?>

