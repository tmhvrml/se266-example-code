<?php

function bmi ($ft, $inch, $weight)
{
    $m = ($ft * 12 + $inch) * 0.0254;
    return ($m);
}   

echo bmi (6, 1, 170);
?>
