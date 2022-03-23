<?php

// abstract class Person {
//     protected $first;
//     protected $last;
//     private static $objectCount=0;

//     public function __construct ($firstArg, $lastArg) {
//         $this->first = $firstArg;
//         $this->last = $lastArg;

//         self::$objectCount++;
        
//     }

//     public function setFirst ($firstArg) {
//         $this->first = $firstArg;
//     }

//     public function setLast ($lastArg) {
//         $this->last = $lastArg;
//     }

//     public function getFirst () {
//         return $this->first;
//     }

//     public function getLast () {
//         return $this->last;
//     }

//     public function getFullName () {
//         return $this->first . " " . $this->last;
//     }

//     public static function getObjectCount() {
//         return self::$objectCount;
//     }
// }

include ('./02person_v2.php');

class Student extends Person {
    private $studentId;
    private $gpa;
    
    public function __construct ($firstArg, $lastArg, $id, $gpa) {
        $this->gpa = $gpa;
        $this->studentId = $id;

        parent::__construct($firstArg, $lastArg);
        
    }

    public function getGPA () {
        return $this->gpa;
    }
    public function getStudentId () {

        return $this->studentId;
    }

}

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