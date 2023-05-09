<?php
    //  $_SESSION['site_root'] = __DIR__;
// Grabs a plain text file. 
// Each line of the file is another row in the array.
// This assumes the file "names.txt" is stored in the "upload" directory
$names = file('upload/names.txt');
echo "<h3>This is an echo of the first line of names.txt followed by a var_dump of the file.</h3>";
echo $names[0]. "*** <br />";    // shows first line of array
var_dump ($names);               // shows the resulting array


echo "<p> </p>";
// Opens the file for reading 'r', in binary 'b' format
// (as opposed to 't' text format)
$nameFileRef = fopen('upload/names.txt', 'rb');

echo "<h3>This is a line by line echo of the file names.txt</h3>";
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

// First check if file exists (always do this!)
if (!file_exists("upload/schools.csv")) 
{
   echo "<h3>File does not exist</h3>";
   exit;
}

// Open CSV file for reading
$schoolFileRef = fopen('upload/schools.csv', 'rb');

// only read MAX_SCHOOLS lines from file for testing
echo "<h3>This is translation of the first 10 lines of the CSV file schools.csv</h3>";
$currentLine = 0;
while (!feof($schoolFileRef) && $currentLine < MAX_SCHOOLS )
 {
   // Read next line of CSV file and echo it out
   $school = fgetcsv($schoolFileRef);
   
   echo $school[0] . "  ---  " . $school[1] . "<br />";

   // Increment line counter
   $currentLine++;
}

?>

