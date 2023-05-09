<?php

// Set the upload directory.
// In this case is it "upload"
const UPLOAD_DIRECTORY = "upload";

// If $_FILES['fileToUpload'] is set, we are in a POST 
// and should upload the file
if (isset ($_FILES['fileToUpload'])) 
{   
    // Build the target storage location path:
    // Get the current working directory (this files directory)
    // Concatenate the environment's directory separator '/'
    // Then concatenate the upload directory set abiove
    $path = getcwd() . DIRECTORY_SEPARATOR . UPLOAD_DIRECTORY;
    // $path = "./upload";

    // Concatenate the uploaded filename onto our the target path
    $targetFilename = $path . DIRECTORY_SEPARATOR . $_FILES['fileToUpload']['name'];
    echo $targetFilename . "<br />";
    // Grab the tempprary name of the file as stored on server
    $tmpName = $_FILES['fileToUpload']['tmp_name'];
echo $tmpName . "<br />";
    // Move the file from the temp locations to target location
    move_uploaded_file($tmpName, $targetFilename);

    echo "<h2>File successfully uploaded! 😀</h2>";
}
?>


<form action="uploadFile.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload">
    <input type="submit" value="Upload">
</form> 


