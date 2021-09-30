<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Patient Intake</title>
    </head>

<?php 






function emptyCheck($target){  //check if entry is blank
    if(empty($target)){     //if empty
        $error = "Please enter all fields.";    //error message
        return $error;  //return error message
    }
    else{
        return $target; //else return variable being checked if good
    }
}

 function age ($birthDate) {    //fucntion to calculate age
    $inputDate = new DateTime($birthDate);
    $now = new DateTime();
    $interval = $now->diff($inputDate);
    return $interval->y;
}

function isDate($dt) {  //function for date validation
    try {
        $d = new DateTime($dt);
        return $dt;
    } catch(Exception $e) {
        $error = "Error!";
        return $error;
    }

}

function bmi ($weight, $feet, $inches) {    //function for bmi calculation
    $kiloConversion = ($weight / 2.20462);
    $feetConversion = ($feet * 12 * 0.0254);
    $inchesConversion = ($inches * 0.0254);
    $metersConversion = ($feetConversion + $inchesConversion);
    $bmi = ($kiloConversion / ($metersConversion ^ 2));
    $bmi = round($bmi,1);
    return $bmi;
  }

  function bmiDescription ($bmi) {  //function for bmi description
    if ($bmi < 18.5){
        $bmiResult = "Underweight";
    }
    else if ($bmi >= 18.5){
        $bmiResult = "Normal weight";
    }
    else if ($bmi >= 30){
        $bmiResult = "Obese";
    }
    else {
        $bmiResult = "Overweight";
    }    
    return $bmiResult;
}   


$firstName = emptyCheck(strval($_POST['firstName']));   //declaring variables with error checks
$lastName = emptyCheck(strval($_POST['lastName']));
$married = emptyCheck(strval($_POST['married']));
$birthDate = isDate(strval($_POST['birthDate']));
$weight = emptyCheck(intval($_POST['weight']));
$feet = emptyCheck(intval($_POST['feet']));
$inches = emptyCheck(intval($_POST['inches']));

$age = age($birthDate); //running functions needed for calculations
$bmi = emptyCheck(bmi($weight, $feet, $inches));
$bmiResult = emptyCheck(bmiDescription($bmi));
$error = "";

?>

    <body>

    <div>
        <h1>Patient Intake Results</h1>

        <?php echo $error;?>    <!--echo error info-->

        <ul>
            <li>
            First: <?php echo $firstName;?> <!--echoes for patient information-->
            </li>
            <li>
            Last: <?php echo $lastName;?>
            </li>
            <li>
            Married: <?php echo $married;?>
            </li>
            <li>
            Date of birth: <?php echo $birthDate;?>
            </li>
            <li>
            Height: <?php echo $feet; echo '\' '; echo $inches; echo "\"";?>
            </li>
            <li>
            Weight: <?php echo $weight . " lbs.";?>
            </li>
            <li>
            Age: <?php echo $age;?>
            </li>
            <li>
            BMI: <?php echo $bmi . " -- " . $bmiResult;?>
            </li>
        </ul>
    </div>
    </body>
</html>