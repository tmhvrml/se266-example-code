<?php include __DIR__ . '/../include/header.php'; 
    $conditions = ["High Blood Pressure", "Diabetes", "Heart Condition"];

    function age ($bdate) {
        $date = new DateTime($bdate);
        $now = new DateTime();
        $interval = $now->diff($date);

        return $interval->y;
    }

    //https://www.nhlbi.nih.gov/health/educational/lose_wt/BMI/bmicalc.htm
    function bmi ($ft, $inch, $weight) {
        //convert ft to cm
        $m = ($ft * 12 + $inch) * 2.54 * 0.01;
        $kg = $weight / 2.20462;
        return ($kg / ($m * $m));
    }
    
    function bmiDescription ($bmi) {
        if ($bmi < 18.5) return ("Underweight");
        if ($bmi < 25) return ("Normal weight");
        if ($bmi < 30) return ("Overweight");
        return ("Obese");
        
    }
    function isDate($dt) {
        try {
            $d = new DateTime($dt);
            return (true);
        } catch(Exception $e) {
            return false;
        }
    }
    

    $error = "";
    $first_name = "";
    $last_name = "";
    $married = "";
    $ft = "";
    $inches = 0;
    $age = "";
    $bmi = "";
    $weight = "";
    if (isset($_POST['storePatient'])) {
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $birth_date = filter_input(INPUT_POST, 'birth_date');
        $married = filter_input(INPUT_POST, 'married');
        $ft = filter_input(INPUT_POST, 'ft', FILTER_VALIDATE_INT);
        $inches = filter_input(INPUT_POST, 'inches', FILTER_VALIDATE_INT);
        
        $weight = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT);

        if ($first_name == "") $error .= "<li>Please provide first name</li>";
        if ($last_name == "") $error .= "<li>Please provide last name</li>";
        if ($married == "") $error .= "<li>Please provide marital status</li>";
        if ($birth_date == "" || !isDate($birth_date)) $error .= "<li>Please provide valid birth date</li>";
        if ($ft == "") $error .= "<li>Please provide valid height</li>";
        if (!is_numeric($inches)) $error .= "<li>Please provide valid number for inches</li>";
        
        if ($weight == "") $error .= "<li>Please provide valid weight</li>"; 
        
        if ($error == "") {
            $bmi = bmi($ft, $inches, $weight);
        }
    }
  
    
    
    
?>

    <style type="text/css">
       .wrapper {
            display: grid;
            grid-template-columns: 180px 400px;
        }
        .label {
            text-align: right;
            padding-right: 10px;
            margin-bottom: 5px;
        }
        label {
           font-weight: bold;
        }
        input[type=text] {width: 200px;}
        .error {color: red;}
        div {margin-top: 5px;}
    </style>

    <?php
        if (isset($_POST['storePatient']) && $error == ""):
    ?>
        <h2>Summary</h2>
        <ul>
            <li><?php echo "Name: $first_name $last_name"; ?></li>
            <li><?php echo "Marital status: " . ($married == "yes"? "married": "single"); ?></li>
            <?php
                if (!$_POST['conditions']):
            ?>
                <li>No known conditions</li>
            <?php
                else:
            ?>
                <li>Conditions: <?php echo implode($_POST['conditions'], ", "); ?></li>
            <?php

                endif;
            ?>
            
            <li>Birth date: <?php echo "$birth_date. Age:" . age($birth_date); ?></li>
            <li>Height: <?= $ft ?>" <?= $inches ?>'</li>
            <li>Weight: <?= $weight ?> pounds</li>
            <li>BMI: <?= number_format($bmi, 1) ?> -- <?= bmiDescription($bmi) ?> </li>
            
        </ul>
    <?php
            exit;
        endif;
    ?>
    <h2>Patient Intake Form</h2>

   

    <form name="patient" method="post" action="patient.php">
        <?php
            if ($error != ""):
        ?>
                
        <div class="error">
            <p>Please fix the following and resubmit</p>
            <ul>
                <?php echo $error; ?>
            </ul>
        </div>
        <?php
            endif;
        ?>

        <div class="wrapper">
            <div class="label">
                <label>First Name:</label>
            </div>
            <div>
                <input type="text" name="first_name" value="<?= $first_name ?>" />
            </div>
            <div class="label">
                <label>Last Name:</label>
            </div>
            <div>
                <input type="text" name="last_name" value="<?= $last_name ?>"" />
            </div>
            <div class="label">
                <label>Married:</label>
            </div>
            <div>
                <input type="radio" name="married" value="yes"  <?= $married=="yes"?"checked":"" ?>>Yes

                    
                <input type="radio" name="married" value="no"  <?= $married=="no"?"checked":"" ?> />No
                
            </div>
            <div class="label">
                <label>Conditions:</label>
            </div>
            <div>
               <?php foreach($conditions as $condition):
                    if (isset($_POST['conditions']) && is_int(array_search($condition, $_POST['conditions']))) {
                        $checked = "checked";
                    } else {
                        $checked = "";
                    }
                    
                ?>
                    <input type="checkbox" <?= $checked ?> name="conditions[]" value="<?= $condition ?>"><?= $condition ?>
               <?php endforeach; ?>
            </div>
            <div class="label">
                <label>Birth Date:</label>
            </div>
            <div>
                <input type="date" name="birth_date" value="<?= $birth_date ?>" />
                
                
            </div>
            <div class="label">
                <label>Height:</label>
            </div>
            <div>
            Feet: <input type="text" name="ft" value="<?= $ft ?>" style="width:40px;" />
            Inches: <input type="text" name="inches" value="<?= $inches ?>" style="width:40px;" />
                
                
                
            </div>
            <div class="label">
                <label>Weight (pounds):</label>
            </div>
            <div>
                <input type="text" name="weight" value="<?= $weight ?>"  style="width:40px;" />
                
                
            </div>
            <div>
                &nbsp;
            </div>
            <div>
                <input type="submit" name="storePatient" value="Store Patient Information" />
            </div>
           
        </div>

       
    </form>
    <p>
       
    </p>


<?php include __DIR__ . '/../include/footer.php'; ?>