<?php
    /*
        This class is the same as the one in 01person.php but you should notice the static variable objectCount. 
        The variable is independent of the current object and is the same for all objects of this class
        Note how the variable is referenced using self:: within the class and then Person:: outside of the class
    */
class Person 
{
    private $first;
    private $last;
    private $myID;
    private static $objectCount=0;

    public function __construct ($firstArg, $lastArg) 
    {
        $this->first = $firstArg;
        $this->last = $lastArg;

        $this->myID = self::$objectCount;
        self::$objectCount++;
    } // end constructor

    public function setFirst ($firstArg) 
    {
        $this->first = $firstArg;
    } // end setFirst

    public function setLast ($lastArg) 
    {
        $this->last = $lastArg;
    } // end setLast

    public function getFirst () 
    {
        return $this->first;
    } // end getFirst

    public function getLast () 
    {
        return $this->last;
    } // end getLast

    public function getFullName () 
    {
        $message = $this->first . " " . $this->last;
        return $message;
    } // end getFullName
  
    public function getID () 
    {
        return $this->myID;
    } // end getFullName
  

    public static function getObjectCount() 
    {
        return Person::$objectCount;
    }  // end getObjectCount
    
} // end Person

// The code below runs everytime this class loads and 
// should be commented out after testing.
$p = new Person('Mickey', 'Mouse');
echo $p->getID() . "  ";
$p2 = new Person('Donald', 'Duck');

echo Person::getObjectCount();

?>
