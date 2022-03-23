<?php
    /*
        class Person
        Note that properties should always be private and never be accessed directly
        $this keyword refers to the current object
        __construct is for the constructor - function gets called when instantiating a new object
    */
class Person {
    private $first;
    private $last;

    public function __construct ($firstArg, $lastArg) {
        $this->first = $firstArg;
        $this->last = $lastArg;
    }

    public function setFirst ($firstArg) {
        $this->first = $firstArg;
    }

    public function setLast ($lastArg) {
        $this->last = $lastArg;
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

// The code below runs everytime this class loads and 
// should be commented out after testing.
$p = new Person('Mickey', 'Mouse');

echo $p->getFullName();
echo "<hr />";
$p->setFirst('Donald');
echo $p->getFullName();

?>
