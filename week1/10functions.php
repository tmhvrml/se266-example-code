
<?php

    function headsOrTails() 
    {
        if (mt_rand(0,1) == 0) return "heads";

        return "tails";
    } // end headsOrTails

    // return true for positive numbers that are prime
    function isPrime ($n)
    {
        if ($n == 1) return false;
        if ($n == 2 || $n == 3) return true;

        // we only need to test until the square root of n
        $maxNumberToTest = sqrt($n);
        
        for ($i=2; $i<=$maxNumberToTest; $i++) {
            if ($n % $i == 0) return false; // n is divisible by i
        }
        return true;
    }// end isPrime

    function getInterest ($balance, $apr) {
        return $balance * $apr /12 /100;
    }// end getInterest
    
    // get the maximum value of two numbers
    function getMax ($x, $y) {
        if ($x >= $y) return $x;

        return $y;
    }// end getMax

    function printNumber () {
        echo "Print the variable a: $a";
    }// end printNumber

    function printGlobalNumber () {
        global $a;
        echo "Print the variable a: $a<br />";
    }// end printGlobalNumber

    function printLocalNumberAndTryToChangeIt() {
        $a = 500;
        echo "Call printLocalNumberAndTryToChangeIt. The variable a: $a<br />";
    }// end printLocalNumberAndTryToChangeIt

  //  include '10functions_example.php';
?>
