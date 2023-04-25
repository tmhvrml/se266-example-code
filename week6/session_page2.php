<?php
include __DIR__ . '/../week3/models/Car.php';

session_start();
?>

<h2>Shoesize</h2>
<p>
    My Shoesize is <?= $_SESSION['shoeSize'] ?>
</p>
<h2>Cars</h2>

<?php
    foreach ($_SESSION['cars'] as $sessionCar) 
    {
        echo $sessionCar->drive();
    }
?>

<hr />
<a href="session_page1.php">Page 1</a>