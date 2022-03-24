<?php
class Car {
    private $model;

    public function __construct ($carModel) {
        $this->model = $carModel;
    }

    public function setModel($carModel) {
        $this->model = $carModel;
    }
    public function drive() {
        echo "Drive the " . $this->model . "<br />";
    }
}


// $car = new Car ("Kia Rio");
// $car->drive();

?>