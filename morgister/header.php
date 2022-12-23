<?php session_start();
if(!isset($_SESSION['user'])) {
    header('Location: ../login.php?login=false');   
} else {
    $g_userId = $_SESSION['user'];
    $g_role = $_SESSION['role'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../DBconnection.php'); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Cambo' rel='stylesheet'>
    <title>De morgenster</title>
    <link rel="stylesheet" href="style/style.css">
<?php $g_page = ucfirst(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)); ?>
</head>
<body>
<?php
    switch($g_page){
        case 'Klassen':
            $g_current = 2;   
            break;
        case 'Cijfers':
            $g_current = 3;   
            break; 
        case 'Agenda':
            $g_current = 4;   
            break;
        case 'Events':
            $g_current = 5;   
            break;
        case 'Afwezig':
            $g_current = 6;   
            break;
        default:
            $g_current = 1; 
    }
?>
<style>
    .navleft li:nth-child(<?= $g_current;?>) {
        margin-left: 10px;
        border-radius: 30px 0 0 30px;
    }
</style>
<div id="container">
    <header>
        <div id="logo">
            <img src="img/logo.png">
        </div>
        <div>
            <?php
            	switch($_SESSION["role"]){
                    case 0:
                        echo"Ouder"; 
                        break;
                    case 1:
                        echo "Docent";   
                        break; 
                    case 2:
                        echo "Administratie";   
                        break;
                    default:
                        $g_current = 0; 
                }
            ?>
        </div>
        <ul>
            <li><a href="profile.php">Profiel</a></li>
            <li><a href="logout.php">Uitloggen</a></li>
        </ul>
    </header>
    <div class="navleft">
        <ul id="navigation">
            <li><a href="index.php">Home</a></li>
            <?php
                if($_SESSION['role'] >= 1) {
                    echo '<li> <a href="klassen.php">Klassen</a></li>';
                }
            ?>
            <li> <a href="scholarList.php">Cijfers</a></li>
            <li><a href="agenda.php">Agenda</a></li>
            <li><a href="events.php">Events</a></li>
            <li><a href="<?php if($_SESSION['role'] ==0) {
                    echo 'absent-melden.php';
                } else {
                    echo 'afwezig.php';
                }?>">Afwezig</a></li>
        </ul>
    </div>