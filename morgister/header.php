<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('../DBconnection.php'); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
    <title>De morgenster</title>
    <link rel="stylesheet" href="style/style.css">
    <?php $page = ucfirst(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)); ?>
</head>
<body>
<?php
    switch($page){
        case 'Klassen':
            $current = 2;   
            break;
        case 'Cijfers':
            $current = 3;   
            break; 
        case 'Agenda':
            $current = 4;   
            break;
        case 'Events':
            $current = 5;   
            break;
        case 'Afwezig':
            $current = 6;   
            break;
        default:
            $current = 1; 
    }
?>
<style>
    .navleft li:nth-child(<?= $current;?>) {
        margin-left: 10px;
        border-radius: 30px 0 0 30px;
    }

</style>

<div id="container">
    <header>
        <div id="logo">
            <img src="img/logo.png">
        </div>
        <ul>
            <li>Profiel</li>
            <li>Uitloggen</li>
        </ul>

    </header>

    <div class="navleft">
        <ul id="navigation">
            <li><a href="index.php">Home</a></li>
            <li> <a href="klassen.php">Klassen</a></li>
            <li> <a href="cijfers.php">Cijfers</a></li>
            <li><a href="agenda.php">Agenda</a></li>
            <li><a href="events.php">Events</a></li>
            <li><a href="afwezig.php">Afwezig</a></li>
        </ul>
    </div>