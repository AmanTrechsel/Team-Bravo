<?php
require('constants.php');
//This is the database connection file, if you need to connect to the database with your current file, use the following:
//require_once('DBconnection.php')
try {
    $g_dbHandler = new PDO("mysql:host=".$G_HOSTNAME.";dbname=".$G_MAIN_DB.";charset=utf8", $G_USERNAME, $G_PASSWORD);
}
catch(Exception $l_exception){
    echo "<h1>PDO Error</h1>";
    echo $l_exception;
}
?>