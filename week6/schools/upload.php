<?php
    include_once __DIR__ . "/model/Schools.php";
    include_once __DIR__ . "/include/functions.php";
    
    if (isset ($_FILES['fileToUpload'])) 
    {
        // upload the file to uploads folder and then call insertSchoolsFromFile 
        
        //redirect to search.php
    }
    include_once __DIR__ . "/include/header.php";

?>  
    <h2>Upload File</h2>
    <p>
        Please specify a file to upload and then be patient as the upload may take a while.
    </p>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload">
        <input type="submit" value="Upload">
    </form>    

<?php
    include_once __DIR__ . "/include/footer.php";
?>
