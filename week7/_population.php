<?php 	

    // Quick and dirty class Person with two data fields
    //  that is initialized by the constructor
    class Person 
    {
        var $firstName;
        var $lastName;
        
        function __construct($first, $last) 
        {		
            $this->firstName = $first;		
            $this->lastName = $last;		
        }		
    }	
    
    $people = array();
    $people[] = new Person ('Joe', 'Bombassei');
    $people[] = new Person ('Ethan', 'Carrera');
    $people[] = new Person ('Ron' ,'Croteau');
    $people[] = new Person ('Meagan' , 'Jones');
    $people[] = new Person ('Berta', 'Puello-Martinez');
    $people[] = new Person ('Nate' , 'Tandon');

    echo "<h3>Comparing var_dump to json_encode</h3>";
    
    echo "<p>This is the var_dump of the array:</p>";
    var_dump ($people);
    
    echo "<p>This is the json_encode of the array:</p>";
    echo json_encode ($people);
?>