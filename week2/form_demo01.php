<?php 
    include ('./controllers/frmDemo01func.php'); 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Playing with Forms</title>
        <style type="text/css">
            .wrapper {
                display: grid;
                grid-template-columns: 180px 300px;
            }
            .label {
                text-align: right;
                padding-right: 10px;
                margin-bottom: 5px;
            }
            label {
            font-weight: bold;
            }
            input[type=text] {width: 80px;}
            .error {color: red;}
        </style>
    </head>
    <body>

        <?php
            if ($error != ""):
        ?>
                
        <div class="error">
            <p>
                Please fix the following and resubmit
            </p>
            <?= $error; ?>
            
        </div>
        <?php
            endif;
        ?>

        <form name="addNumbers" method="post">
        <div class="wrapper">
            <div class="label">
                <label>Number 1:</label>
            </div>
            <div>
                <input type="text" name="number_1" value="<?php echo $number_1; ?>" />
            </div>
            <div class="label">
                <label>Number 2:</label>
            </div>
            <div>
                <input type="text" name="number_2" value="<?= $number_2; ?>" />
            </div>
            <div>
                &nbsp;
            </div>
            <div>
                <input type="submit" name="add_numbers" value="Add Numbers" />
                <p>
                    <?php
                        if ($error == "") {
                            echo "<p>The sum of these two numbers is " . addNumbers($number_1, $number_2) . ". </p>";
                        }
                    ?>
                </p>
            </div>
           
        </div>
        </form>
    </body>
</html>
