<?php

function dbconnect() {
    
       
        $config = array(
            'DB_DNS' => 'mysql:host=mysql.neit.edu;port=5500;dbname=se266_123456789;',
            'DB_USER' => 'se266_123456789',
            'DB_PASSWORD' => '123456789'
        );
        
       
        
        try {
            $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $db = null;
        }
        

    return $db;
}

?>