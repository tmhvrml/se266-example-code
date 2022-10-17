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
        $message =  "🚗 Drive " . $this->model . "<br />";
        return $message;
    } // end drive

} // end Car
