<?php
    $folder = getcwd();
    $pos = strpos($folder, "week");
    $folder = substr($folder, $pos , strlen($folder)-$pos);
?>
<h2><?= $folder ?> files</h2>
<ul>
<?php
    
    $files = scandir(".");
    foreach ($files as $f):
        $len = strlen($f);
        if (strlen($f) > 3 && strpos($f, ".php") > 0):
?>
             <li><a href="<?= $f ?>"><?= $f?></a></li>
<?php
        endif;
    endforeach;
?>
</ul>