<?php

include ('./Person_v2.php');

class Student extends Person 
{
    private $studentId;
    private $gpa;
    
    public function __construct ($firstArg, $lastArg, $id, $gpa) {
        $this->gpa = $gpa;
        $this->studentId = $id;

        parent::__construct($firstArg, $lastArg);
    } // end constructor

    public function getGPA () 
    {
        return $this->gpa;
    } // end getGPA

    public function getStudentId () 
    {
        return $this->studentId;
    } // end getStudentID

} // end student

// The code below runs everytime this class loads and 
// should be commented out after testing.
$someStudent = new Student('Mickey', 'Mouse', '123456789', 3.5);
// var_dump ($s);

// $p = new Person ('Donald', 'Duck');

echo Student::getObjectCount() . "<br />";
echo $someStudent->getFullName() . "<br />";
echo $someStudent->getStudentId() . "<br />";
echo "<hr />";
// echo $p->getFullName() . "<br />";
// echo Student::getObjectCount() . "<br />";
?>
