<?php
    /*
        class Person
        Note that properties should always be private or protected and never be accessed directly
        $this keyword refers to the current object
        __construct is for the constructor - function gets called when instantiating a new object
    */
class Person {
    private $first, $last;

    public function __construct ($f, $l) {
        $this->first = $f;
        $this->last = $l;
        
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
}

$p = new Person('Mickey', 'Mouse');

echo $p->getFullName();
echo "<hr />";
$p->setFirst('Donald');
echo $p->getFullName();

?>