<?php

/// Class car
class Car {
    private $engine;
    private $model;

    public function __construct ($model_arg) {
        $this->model = $m;

    }

    public function setModel($model) {
        $this->model = $model;
    }
    public function drive() {
        echo "Drive " . $this->model;
    }
}

// The code below runs everytime this class loads and 
// should be commented out after testing.
$carOne = new Car("Toyota Yaris");
$carTwo = new Car("Honda Accord");

$carOne->setModel( "BMW");
$carOne->drive();
var_dump ($carOne);