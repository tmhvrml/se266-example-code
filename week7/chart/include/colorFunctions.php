<?php

    // This function generates a random color and returns its hex code
    function getRandomColor () 
    {
         $hex = '#';

         //Create a loop for red, green & blue
         foreach(array('r', 'g', 'b') as $color)
         {
             //Random number between 0 and 255.
             $val = mt_rand(0, 255);

             //Convert the random number into a Hex value.
             $dechex = dechex($val);

             //Pad with a 0 if length is less than 2.
             if(strlen($dechex) < 2){
                 $dechex = "0" . $dechex;
             }
             //Concatenate
             $hex .= $dechex;
         }

         //Print out our random hex color.
        return $hex;
     }

     // Generate an array of random colors
     // INPUT: how many arry entries (colors) to create
     function getRandomColorArray($numberOfColors) 
     {
         $colors = array();
         for ($i=0; $i<$numberOfColors; $i++) 
         {
             array_push ($colors, getRandomColor());
         }

         return $colors;
     }

     
?>