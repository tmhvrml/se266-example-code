<?php

require_once ('./Person_v2.php');

class Worker extends Person 
{
    private $job;
    
    public function __construct ($firstArg, $lastArg, $job) {
        $this->job = $job;
    
        parent::__construct($firstArg, $lastArg);
    } // end constructor

    public function getJob() 
    {
        return $this->job;
    } // end getGPA

    public function getFullName() 
    {
        $message = "Worker: " . $this->getFirst() . " " . $this->getLast();
        return $message;
    } // end getFullName

} // end student

// The code below runs everytime this class loads and 
// should be commented out after testing.
// $someWorker = new Worker('Mickey', 'Mouse', 'Actor');
// // var_dump ($s);

// // $p = new Person ('Donald', 'Duck');

// echo Person::getObjectCount() . "<br />";
// echo $someWorker->getFullName() . "<br />";
// echo "<hr />";
// echo $p->getFullName() . "<br />";
// echo Student::getObjectCount() . "<br />";

?>
