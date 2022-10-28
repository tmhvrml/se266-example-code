<?php
    include  __DIR__ . '/include/colorFunctions.php'; 
    $colors = getRandomColorArray(50);
?>


<!--
    Given a number N, create N random colors
-->
<html>
<head>
    <style type="text/css">
        .main {margin: 100px 0px 0px 100px}
        .box {border: 5 px solid red; width: 100px; height: 100px; float: left; margin-right: 10px; }
    </style>
<title>Colors</title>
</head>
<body>
    <div class="main">
        <h2>Colors</h2>
         <?php
            foreach ($colors as $c):
        ?>
            <div class="box" style="background-color: <?php echo $c ?>;"><?php echo $c; ?></div>
        <?php
            endforeach;
        ?>
        
        
    </div>

</body>
</html>