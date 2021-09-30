<?php

class Car {
    private $engine;
    private $model;

    public function __construct ($m) {
        $this->model = $m;

    }

    public function setModel($model) {
        $this->model = $model;
    }
    public function drive() {
        echo "Drive " . $this->model;
    }
}

$c = new Car("Toyota Yaris");
$c2 = new Car("Honda Accord");

$c->setModel( "BMW");
// $c->drive();
var_dump ($c);