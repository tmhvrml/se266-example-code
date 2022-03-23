<?php
// This function computes a persons Body Mass Index (BMI)
function bmi ($ft, $inch, $weight)
{
    $m = ($ft * 12 + $inch) * 0.0254;
    return ($m);
} 
// This is test code, comment it out for production
echo bmi (6, 1, 170);

?>
