<?php

include_once('./Person_v2.php');

class Worker extends Person 
{
    private $job;
    
    public function __construct ($firstArg, $lastArg, $myJob) {
        $this->job = $myJob;

        parent::__construct($firstArg, $lastArg);
    } // end constructor

    public function getJob() 
    {
        return $this->job;
    } // end getJob

    public function getFullName() 
    {
        $message = "Worker: " . $this->getFirst() . " " . $this->getLast();
        return $message;
    } // end getFullName

} // end worker class


?>
