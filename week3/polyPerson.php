<?php

include_once("./Student.php");
include_once("./Worker.php");

$audience = 
[
    new Person("Jose", "Smith"),
    new Student('Mickey', 'Mouse', '123456789', 3.5),
    new Worker('Chris', 'Alverez', 'Painter'),
    new Person("Jane", "Smith"),
    new Student('Donald', 'Duck', '11111111', 4.5),
    new Worker('Alex', 'Patel', 'Architect')
    ];

foreach($audience as $who)
{
    echo "<br />". $who->getFullName() . "<br />";
}

?>