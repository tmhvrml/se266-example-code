<?php
// This function computes a persons Body Mass Index (BMI)
function bmi($heightFeet, $heightInches, $weightPounds)
{
    // Formula for English units:
    //    weight / (height)^2 * 703
    
    $bodyMassIndex = $weightPounds / pow(($heightFeet * 12 + $heightInches), 2) * 703;
    
    return ($bodyMassIndex);
} // end bmi

// This is test code, comment it out for production
// echo "Example bmi test for bmi(6,1,170): " . bmi (6, 1, 170);

?>
