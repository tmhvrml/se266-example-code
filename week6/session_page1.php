<?php
    include __DIR__ . '/car.php';
    include __DIR__ . '/functions.php';
    session_start();

    // sessions can be simple
    if (isPostRequest()) {
        $_SESSION['shoeSize'] = filter_input(INPUT_POST, 'shoeSize');
    } else if (!isset($_SESSION['shoeSize'])){
        $_SESSION['shoeSize'] = 10.5;
    }
    
    // or complex. Cars is an array of objects
    $_SESSION['cars'] = [
        new Car ('Toyota Yaris'),
        new Car ('Kia Rio'),
        new Car ('Kia Sorrento')
    ];

    

?>
<form action="session_page1.php" method="post">
    <label>Current Shoesize</label>
    <input type="text" value="<?= $_SESSION['shoeSize'] ?>" style="width:35px;" name="shoeSize">
    <input type="submit" value="Change Shoesize">
</form>
<br />
<a href="session_page2.php">Page 2</a>
