<?php 		
    class person {
            var $name;
            function __construct($persons_name) {		
                    $this->name = $persons_name;		
            }		

            function set_name($new_name) {
                     $this->name = $new_name;
            }	

            function get_name() {		
                     return $this->name;		
             }		

    }	
    
    // code below executes every time file is loaded
    // comment out after testing
    
    $people = array();
    
    $people[] = new person ('Jim');
    $people[] = new person ('Erik');
    
    
    var_dump ($people);
    echo json_encode ($people);
?>