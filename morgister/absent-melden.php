<?php include_once('header.php'); ?>

<main>

<?php 

$getID = $g_dbHandler->prepare("SELECT * FROM `Parent` WHERE `account_id` = {$g_userId}");
$getID->execute();
$getID->bindColumn("parent_id", $parentID); 
$getID->fetch();

$getChild = $g_dbHandler->prepare("SELECT * FROM `Scholar` WHERE `parent_id` = {$parentID}");
$getChild->execute();
$getChild->bindColumn("name", $cName); 
$getChild->bindColumn("surname", $csurName); 
$getChild->bindColumn("scholar_id", $cId); 
// $getChild->bindColumn("name", $cName); 
// $getChild->bindColumn("name", $cName); 
$month = date('m');
$day = date('d');
$year = date('Y');
$today = $year . '-' . $month . '-' . $day;

?>

<form action="" method="POST">

<h3>Absent melden</h3>
Wie: 
<select name="scholar">
    <?php
    while($getChild->fetch()){
        echo "<option value='{$cId}'>{$cName}</option>";
    }
    ?>
    
</select>
<p>Reden absentie:
    <input type="text" name="reason">
</p>
<p> Datum absentie: 
    <input type="date" value="<?= $today; ?>" name="date"></p>

<input type="submit" value="Absentie melden">
</form>
          

<?php

// absence_id 	reason 	scholar_id 	

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $reason = filter_input(INPUT_POST, 'reason', FILTER_SANITIZE_SPECIAL_CHARS);
    $l_date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS);
    $l_scholar = filter_input(INPUT_POST, 'scholar', FILTER_SANITIZE_SPECIAL_CHARS);
    
    $l_statement = $g_dbHandler->prepare("INSERT INTO `Absence`(`reason`, `date`, `scholar_id`) VALUES (?,?,?)");
    $l_statement->bindParam(1, $reason, PDO::PARAM_STR);
    $l_statement->bindParam(2, $l_date, PDO::PARAM_STR);
    $l_statement->bindParam(3, $l_scholar, PDO::PARAM_INT);

    $l_checkDate = $g_dbHandler->prepare("SELECT * FROM `Absence` WHERE `date` = :dates AND `scholar_id` = :scholar");
    $l_checkDate->bindParam('dates', $l_date, PDO::PARAM_STR);
    $l_checkDate->bindParam('scholar', $l_scholar, PDO::PARAM_INT);
    $l_checkDate->execute();

    if($l_checkDate->rowCount() > 0) {
        echo "<h3>Er staat al een absentie melding op deze datum!</h3>";
    } else {
        try {
            $l_statement->execute();
            echo "<h3>Absentie succesvol verstuurd voor de datum: <b>{$l_date}</b>, met als reden: <b>{$reason}</b></h3>";
        } catch (Exception $l_exception) {
            echo $l_exception;
        }
    }



}

?>
</main>

<?php include_once('footer.php'); ?>