<?php
    $str = "New England Institute of Technology";

    echo $str . " with no salt.<br />";
    echo sha1($str) . "<br /><br />";

    echo $str . " with SECRET salt.<br />";
    $salt = "SECRET";
    echo sha1($salt . $str) . "<br />";
 
 ?>

