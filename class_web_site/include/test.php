<?php       
        date_default_timezone_set("America/New_York");
        $file = basename($_SERVER['PHP_SELF']);
        $mod_date=date("F d Y h:i:s A", filemtime($file));
        echo "File last updated $mod_date ";
        //date.timezone = "America/New_York"
    ?>