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

// The code below runs everytime this class loads and 
// should be commented out after testing.
// $someWorker = new Worker('Mickey', 'Mouse', '123456789', 3.5);
// // var_dump ($s);

// // $p = new Person ('Donald', 'Duck');


// echo $someWorker->getFullName() . "<br />";
// echo $someWorker->getJob() . "<br />";
// echo "<hr />";
// echo $p->getFullName() . "<br />";
// echo Student::getObjectCount() . "<br />";

?>
