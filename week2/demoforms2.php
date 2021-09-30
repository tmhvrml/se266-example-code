<?php
    $states = ["Rhode Island", "Massachusetts", "Connecticut", "Maine", "New Hampshire", "Vermont"];
    
    

    if (isset($_POST['submitBtn'])) {
       
        $state = filter_input (INPUT_POST, 'state');
        echo $state;
        //var_dump ($_POST);
    } else {
        $state = "";
        echo "Initial load of form";
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Forms</title>
</head>
<body>
    <h1>Demo Forms</h1>
    <form action="demoforms2.php" method="post">
     
        <select name="state">
            <option>None</option>
            <?php
                foreach ($states as $s):
            ?>
                  <?php
                    if ($state == $s):
                  ?>
                   <option selected>
                   <?php
                        
                    else:
                   ?>
                     <option>
                    <?php
                        endif;
                    ?>
                        <?= $s ?>
                   </option>
            <?php    
                endforeach;
            ?>
            
            
            
        </select>
        
        <input type="submit" name="submitBtn" />
    </form>
</body>
</html>