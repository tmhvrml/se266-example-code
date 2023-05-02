<?php
  // This should already be loaded, but just in case
  include_once __DIR__ . '/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>School Name Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <span class="navbar-brand">School Name Management</span>
      </div>
      <?php
        // We want to hide the Logout button if the user is not logged in
        // That means we are on the Login page
        // Since the session should have been destroyed, we first check to see if isLoggedIn exists
        // It may exist if an already logged in user manually loads or reloads login.php 
        if (isUserLoggedIn()) 
        { ?>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logoff.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
            <?php
        } 
      // end logout button code   
      ?>
    </div>
  </nav>
  <div class="container">

