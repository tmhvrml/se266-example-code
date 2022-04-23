<?php

define ("UPLOAD_DIRECTORY", "upload");

if (isset ($_FILES['file1'])) {
   
    $tmp_name = $_FILES['file1']['tmp_name'];
    $path = getcwd() . DIRECTORY_SEPARATOR . UPLOAD_DIRECTORY;
    $new_name = $path . DIRECTORY_SEPARATOR . $_FILES['file1']['name'];

    move_uploaded_file($tmp_name, $new_name);
}
?>


<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file1">
    <input type="submit" value="Upload">
</form> 
<?php 
if (isset ($_FILES['file1'])) {
    echo "File uploaded";
}

?>


