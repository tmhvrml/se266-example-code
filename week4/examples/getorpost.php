<?php

//This code executes everytime the page loads.

require_once "../teams/controllers/form_utilities.php";

if (isGetRequest()) {
   //echo "*** GET ***";
    var_dump ($_GET);
}

if (isPostRequest()) {
    // echo "*** POST ***";
    var_dump ($_POST);
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Get or Post</title>
<style type="text/css">
    .main {margin-left: 50px; margin-top: 50px;}
</style>
</head>
<body>
    <div class="main">
        <h1>GET or POST, that's the question</h1>
        <h3>GET</h3>
        <form method="GET" action="getorpost.php">
            <input type="text" name="test_get" value="TEST GET">
            <input type="submit" name="submit_get" value="Submit GET">

        </form>
        <hr />
        <h3>POST</h3>
        <form method="POST" action="getorpost.php">
            <input type="text" name="test_post" value="TEST POST">
            <input type="submit" name="submit_get" value="Submit POST">

        </form>
        <hr />
        <h3>Another GET</h3>
        <a href="getorpost.php?action=whatever">Link to getorpost.php</a>
    </div>
</body>
</html>