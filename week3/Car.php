<?php

/// Class car
class Car 
{
    private $model;

    public function __construct ($model_arg) 
    {
        $this->model = $model_arg;

    } // end constructor
    
    public function setModel($model_arg) 
    {
        $this->model = $model_arg;
    } // end setModel

    public function drive() 
    {
        echo "🚗 Drive " . $this->model . "<br />";
    } // end drive

} // end Car

// The code below runs everytime this class loads and 
// should be commented out after testing.
$carOne = new Car("Toyota Yaris");
$carTwo = new Car("Honda Accord");

$carOne->setModel( "BMW");
$carOne->drive();
var_dump ($carOne);