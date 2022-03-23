<?php
    /*
        This class is the same as the one in 01person.php but you should notice the static variable objectCount. 
        The variable is independent of the current object and is the same for all objects of this class
        Note how the variable is referenced using self:: within the class and then Person:: outside of the class
    */
class Person {
    private $first;
    private $last;
    private static $objectCount=0;

    public function __construct ($firstArg, $lastArg) {
        $this->first = $firstArg;
        $this->last = $lastArg;

        self::$objectCount++;
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

    public static function getObjectCount() {
        return self::$objectCount;
    }
}

// The code below runs everytime this class loads and 
// should be commented out after testing.
$p = new Person('Mickey', 'Mouse');
$p2 = new Person('Donald', 'Duck');

echo Person::getObjectCount();

?>
