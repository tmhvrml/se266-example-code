<?php

require_once "models/Student.php";
require_once "models/Worker.php";

// ********************************************************
// Testing Person Class
echo "<h3>Testing Person Class</h2>";
$p = new Person('Mickey', 'Mouse');

echo $p->getFullName();
echo "<hr />";
$p->setFirst('Donald');
echo $p->getFullName();


// ********************************************************
// Testing Student Class
echo "<h3>Testing Student Class</h2>";
$someStudent = new Student('Mickey', 'Mouse', '123456789', 3.5);
var_dump($someStudent);

$p = new Student('Donald', 'Duck', '111111111', 1.5);

echo Student::getObjectCount() . "<br />";
echo $someStudent->getFullName() . "<br />";
echo $someStudent->getStudentSSN() . "<br />";
echo $someStudent->getID() . "<br />";
echo "<hr />";
echo $p->getFullName() . "<br />";
echo $p->getID() . "<br />";
echo Student::getObjectCount() . "<br />";


// ********************************************************
// Testing Worker Class
echo "<h3>Testing Worker Class</h2>";
$someWorker = new Worker('Worker', 'Mouse', 'Tailor');
var_dump($someWorker);

$p = new Worker('Donald', 'Duck', "Swimmer");

echo $someWorker->getFullName() . "<br />";
echo $someWorker->getJob() . "<br />";
echo "<hr />";
echo $p->getFullName() . "<br />";
echo $p->getID() . "<br />";
echo Worker::getObjectCount() . "<br />";


?>