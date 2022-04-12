<?php

// Person class include from child classes.
include ('./Student.php');
include ('./Worker.php');

function whoWeAre($listOfPeople)
{
	foreach ($listOfPeople as $human) {
		echo '<p>' . $human->getFullName() . '</p>';
	}
}

$audience = [
        new Student("Chris", "Jones", 111111111, 3.5),
        new Worker("Sam", "Smith", "Artist"),
        new Person("John Q.", "Public"),

        new Student("Jaime", "Jones", 222222222, 3.5),
        new Worker("Jesse", "Smith", "Artist"),
        new Person("Janie Q.", "Public"),

        new Student("Alex", "Jones", 333333333, 3.5),
];

echo "<h3>What we are:</h3>";
foreach ($audience as $value) {
        echo '<p>' . get_class($value), "</p>";
    }
    
echo "<h3>Who we are:</h3>";
whoWeAre($audience);

?>