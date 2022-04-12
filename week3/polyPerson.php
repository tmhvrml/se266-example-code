<?php

include_once("./Student.php");
include_once("./Worker.php");

function whoWeAre($listOfPeople)
{
	foreach ($listOfPeople as $human) {
		echo '<p>' . $human->getFullName() . '</p>';
	}
}

$audience = 
[
    new Person("Jose", "Smith"),
    new Student('Mickey', 'Mouse', '123456789', 3.5),
    new Worker('Chris', 'Alverez', 'Painter'),
    new Person("Jane", "Smith"),
    new Student('Donald', 'Duck', '11111111', 4.5),
    new Worker('Alex', 'Patel', 'Architect')
];


echo "<h3>What we are:</h3>";
foreach ($audience as $value) {
        echo '<p>' . get_class($value), "</p>";
    }
    
echo "<h3>Who we are:</h3>";
whoWeAre($audience);

?>