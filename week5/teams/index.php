<?php
   $files = scandir('.');
   sort($files); // this does the sorting
   foreach($files as $file){
      echo'<a href="./'.$file.'">'.$file.'</a><br />';
   }
?>