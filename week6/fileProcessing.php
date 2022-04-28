<?php

// Grabs a text file. Each line of the file
// Is another row in the array.
$names = file('upload/names.txt');
echo $names[0]. "*** <br />";
var_dump ($names); // shows an array


echo "<p> </p>";
// Opens the file for reading, in "binary" format
// (as opposed to 't' text format)
$nameFileRef = fopen ('upload/names.txt', 'rb');

// Loop until the end of the file
while (!feof($nameFileRef)) 
{
   // Get next line of the file and echo it out
   $name = fgets($nameFileRef);
   echo $name . "*** <br />";
}

// Define max number of lines to read in for testing
define ("MAX_SCHOOLS", 10);
echo "<p> </p>";

// First check if file exists (always do!)
if (!file_exists("upload/schools.csv")) 
{
   echo "<p>File does not exist</p>";
   exit;
}

// Open CSV file for reading
$schoolFileRef = fopen ('upload/schools.csv', 'rb');


$currentLine = 0;
while (!feof($schoolFileRef) && $currentLine < MAX_SCHOOLS )
 {
   // Read next line of CSV file and echo it out
   $school = fgetcsv($schoolFileRef);
   
   echo $school[0] . "  ---  " . $school[1] . "<br />";

   // Increment line counter
   $currentLinei++;
}

?>

