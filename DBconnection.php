<?php
//This is the database connection file, if you need to connect to the database with your current file, use the following:
//require(DBconnection.php)
try {
    $g_DBhandeler = new PDO("mysql:host=mysql;dbname=huiswerkweek4;charset=utf8", "USERNAME", "QWERTY");
}
catch(Exception $ex){
    echo "<h1>PDO Error</h1>";
    echo $ex;
}
?>