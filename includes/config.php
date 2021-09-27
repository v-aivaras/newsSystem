<?php
    session_start();

    date_default_timezone_set('Europe/Vilnius');
    try {
        $con = new PDO('mysql:dbname=news; host=localhost; charset=utf8', 'root', '');
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }

        
    $DEFAULT_LIMIT = 50;
    $DEFAULT_LIMIT_STEPS = [1,2,3,4,5,10,20,30,40,50,100]; //filtro SELECT elementui

?>