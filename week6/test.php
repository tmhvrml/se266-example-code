<?php

    $school = "SCHOOLLLLL";
    $city = "CITYYYY";  
    $state = "STATEEEE";

$sql[] = "('" . $school . "' , '" . $city . "' , '" . $state. "')";
$sql1 = "('" . $school . "' , '" . $city . "' , '" . $state. "')";
echo implode(',', $sql);

echo "<p></P>";
// 1,000 records at a time
echo 'INSERT INTO schools (schoolName, schoolCity, schoolState) VALUES '.implode(',', $sql);

echo "<p></P>";
// 1,000 records at a time
echo "INSERT INTO schools (schoolName, schoolCity, schoolState) VALUES ".  $sql1;


?>