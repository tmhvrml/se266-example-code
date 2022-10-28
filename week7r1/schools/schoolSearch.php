<?php

    include_once __DIR__ . "/model/Schools.php";
    include_once __DIR__ . "/include/functions.php";
   
    $schoolName = "";
    $city = "";
    $state = "";

    if (isPostRequest()) 
    {
        //*******************************************************************//
        //************     TODO     *****************************************//
        //
        // Create an object to represent the schools table in the database 
        //
        //  Add your search logic here. 
        // 
        // Call getSchools with the appropriate arguments
        //
        //*******************************************************************//
    }

    include_once __DIR__ . "/include/header.php";
?>

    <h2>Search Schools</h2>
    <form method="post" action="search.php">
        <div class="rowContainer">
            <div class="col1">School Name:</div>
            <div class="col2"><input type="text" name="schoolName" value="<?php echo $schoolName; ?>"></div> 
        </div>
        <div class="rowContainer">
            <div class="col1">City:</div>
            <div class="col2"><input type="text" name="city" value="<?php echo $city; ?>"></div> 
        </div>
        <div class="rowContainer">
            <div class="col1">State:</div>
            <div class="col2"><input type="text" name="state" value="<?php echo $state; ?>"></div> 
        </div>
            <div class="rowContainer">
            <div class="col1">&nbsp;</div>
            <div class="col2"><input type="submit" name="search" value="Search" class="btn btn-warning"></div> 
        </div>
    </form>
            
    <?php
        //*******************************************************************//
        //************     TODO     *****************************************//
        //
        // Display your search results here in a nice pretty table 🙂
        //
        //*******************************************************************//

    ?>


    <?php
        }
        include_once __DIR__ . "/include/footer.php";
    ?>

