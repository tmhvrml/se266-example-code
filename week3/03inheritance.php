<?php

abstract class Person {
    protected $first, $last;
    private static $objectCount=0;

    public function __construct ($f, $l) {
        $this->first = $f;
        $this->last = $l;

        self::$objectCount++;
        
    }

    public function setFirst ($f) {
        $this->first = $f;
    }

    public function setLast ($l) {
        $this->last = $l;
    }

    public function getFirst () {
        return $this->first;
    }

    public function getLast () {
        return $this->last;
    }

    public function getFullName () {
        return $this->first . " " . $this->last;
    }

    public static function getObjectCount() {
        return self::$objectCount;
    }
}

class Student extends Person {
    private $studentId;
    private $gpa;
    
    public function __construct ($f, $l, $id, $gpa) {
        $this->gpa = $gpa;
        $this->studentId = $id;

        parent::__construct($f, $l);
        
    }

    public function getGPA () {
        return $this->gpa;
    }
    public function getStudentId () {

        return $this->studentId;
    }


}

$s = new Student('Mickey', 'Mouse', '123456789', 3.5);
// var_dump ($s);

// $p = new Person ('Donald', 'Duck');

echo Student::getObjectCount() . "<br />";
echo $s->getFullName() . "<br />";
echo $s->getStudentId() . "<br />";
echo "<hr />";
// echo $p->getFullName() . "<br />";
// echo Student::getObjectCount() . "<br />";
?>