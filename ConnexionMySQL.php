<?php

    define('HOST','localhost');
    define('DB_NAME','epreuves_ccf');
    define('USER','root');
    define('PASS','');
    $db = new PDO("mysql:host=". HOST .";dbname=" .DB_NAME, USER, PASS);

    try{
        $db = new PDO("mysql:host=".HOST.";dbname=".DB_NAME,USER,PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e){
        echo $e;
    }

?>