<?php

/// Class car
class Car {
    private $engine;
    private $model;

    public function __construct ($model_arg) {
        $this->model = $m;

    } // end constructor
    
    public function setModel($model) {
        $this->model = $model;
    } // end setModel

    public function drive() {
        echo "Drive " . $this->model;
    } // end drive

} // end Car

// The code below runs everytime this class loads and 
// should be commented out after testing.
$carOne = new Car("Toyota Yaris");
$carTwo = new Car("Honda Accord");

$carOne->setModel( "BMW");
$carOne->drive();
var_dump ($carOne);