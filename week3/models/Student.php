<?php

require_once('Person_v2.php');

class Student extends Person 
{
    private $studentSSN;
    private $gpa;
    
    public function __construct($firstArg, $lastArg, $ssn, $student_gpa) 
    {
        $this->gpa = $student_gpa;
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

?>
