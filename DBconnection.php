<?php
//This is the database connection file, if you need to connect to the database with your current file, use the following:
//require(DBconnection.php)
try {
    $g_DBhandeler = new PDO("mysql:host=mysql;dbname=Morgister;charset=utf8", "root", "qwerty");
}
catch(Exception $ex){
    echo "<h1>PDO Error</h1>";
    echo $ex;
}
?>