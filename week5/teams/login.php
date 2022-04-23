<?php

    // Include functions from previous week
    include_once __DIR__ . '/include/functions.php';

    // Include user database definitions
    include_once __DIR__ . '/model/Users.php';

    include_once __DIR__ . "/include/header.php";

    // start session tracking and set logged in to false
    $_SESSION['isLoggedIn'] = false;
    
    // If this is a POST, check to see if user credentials are valid.
    // First we need to gab the crednetials form the form 
    //      and create a user database object
    $message = "";
    if (isPostRequest()) 
    {

        // get _POST form fields
        $username = filter_input(INPUT_POST, 'userName');
        $password = filter_input(INPUT_POST, 'password');

        // Set up configuration file and create database
        $configFile = __DIR__ . '/model/dbconfig.ini';
        try 
        {
            $userDatabase = new Users($configFile);
        } 
        catch ( Exception $error ) 
        {
            echo "<h2>" . $error->getMessage() . "</h2>";
        }   
    
        // Now we can check to see if use credentials are valid.
        if ($userDatabase->validateCredentials($username, $password)) 
        {
            // If so, set logged in to TRUE
            $_SESSION['isLoggedIn'] = true;
            // Redirect to team listing page
            header ('Location: teamListing.php');
        } 
        else 
        {
           // Whoops! Incorrect login. Tell user and stay on this page.
           $message = "You did not enter  correct login credentials. 🤨";
        }
    }
?>

<div class="container">
    <h2>NFL Team Management</h2>
    <?php 
        if ($message)
        {   ?>
            <div style="background-color: yellow; padding: 10px; border: solid 1px black;"> 
           <?php echo $message; ?>
           </div>
        <?php } ?>

    <div id="mainDiv">
        <form method="post" action="login.php">
           
            <div class="rowContainer">
                <h3>Please Login</h3>
            </div>
            <div class="rowContainer">
                <div class="col1">User Name:</div>
                <div class="col2"><input type="text" name="userName" value="donald"></div> 
            </div>
            <div class="rowContainer">
                <div class="col1">Password:</div>
                <div class="col2"><input type="password" name="password" value="duck"></div> 
            </div>
              <div class="rowContainer">
                <div class="col1">&nbsp;</div>
                <div class="col2"><input type="submit" name="login" value="Login" class="btn btn-warning"></div> 
            </div>
            
        </form>
        
    </div>
    <?php
      include_once __DIR__ . "/include/footer.php";
?>


</body>
</html>