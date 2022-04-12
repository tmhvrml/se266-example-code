<?php

require_once ('./Person_v2.php');

class Student extends Person 
{
    private $studentSSN;
    private $gpa;
    
    public function __construct ($firstArg, $lastArg, $ssn, $gpa) {
        $this->gpa = $gpa;
        $this->studentSSN = $ssn;

        parent::__construct($firstArg, $lastArg);
    } // end constructor

    public function getGPA() 
    {
        return $this->gpa;
    } // end getGPA

    public function getStudentSSN() 
    {
        return $this->studentSSN;
    } // end getStudentID

    public function getFullName() 
    {
        $message = "Student: " . $this->getFirst() . " " . $this->getLast();
        return $message;
    } // end getFullName

} // end student

// The code below runs everytime this class loads and 
// should be commented out after testing.
$someStudent = new Student('Mickey', 'Mouse', '123456789', 3.5);
// var_dump ($s);

// $p = new Person ('Donald', 'Duck');

// echo Student::getObjectCount() . "<br />";
// echo $someStudent->getFullName() . "<br />";
// echo $someStudent->getStudentSSN() . "<br />";
// echo "<hr />";
// echo $p->getFullName() . "<br />";
// echo Student::getObjectCount() . "<br />";

?>
