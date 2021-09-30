<?php
class Car {
    private $model;

    public function __construct ($m) {
        $this->model = $m;

    }

    public function setModel($model) {
        $this->model = $model;
    }
    public function drive() {
        echo "Drive the " . $this->model . "<br />";
    }
}

// $car = new Car ("Kia Rio");
// $car->drive();