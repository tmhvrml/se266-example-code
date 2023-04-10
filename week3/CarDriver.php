<?php
// The code below runs everytime this file loads 

require_once "models/Car.php";

$carOne = new Car("Toyota Yaris");
$carTwo = new Car("Honda Accord");

$carOne->setModel( "BMW");
$message = $carOne->drive();
echo $message . " It works!<br /><br />";
var_dump ($carOne); 
?>