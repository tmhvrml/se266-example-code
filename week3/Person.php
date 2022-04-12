<?php
    /*
        class Person
        Note that properties should always be private and never be accessed directly
        $this keyword refers to the current object
        __construct is for the constructor - function gets called when instantiating a new object
    */
class Person 
{
    private $first;
    private $last;

    public function __construct ($firstArg, $lastArg) 
    {
        $this->first = $firstArg;
        $this->last = $lastArg;
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
        return $this->first . " " . $this->last;
    } // end getFullName
    
} // end person

?>
