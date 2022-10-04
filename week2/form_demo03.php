<?php
    include_once('./controllers/frmDemo03func.php');    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Forms</title>
</head>
<body>
    <h1>State Selection Demo Form</h1>
    <form action="form_demo03.php" method="post">
     
        <select name="state">
            <option>None</option>
            <?php
                // This loop selects the correct radio buytton to highlight
                // based on the value in $state
                foreach ($allStates as $thisState):
            ?>
                  <?php
                    if ($selectedState == $thisState):
                  ?>
                   <option selected>
                   <?php
                        
                    else:
                   ?>
                     <option>
                    <?php
                        endif;
                    ?>
                        <?= $thisState ?>
                   </option>
            <?php    
                endforeach;
            ?>
            
            
            
        </select>
        
        <input type="submit" name="submitBtn" />
    </form>
</body>
</html>