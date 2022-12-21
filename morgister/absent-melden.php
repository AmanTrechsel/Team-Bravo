<?php include_once('header.php'); ?>

<main>

<?php 

$getID = $g_DBhandeler->prepare("SELECT * FROM `Parent` WHERE `account_id` = {$userID}");
$getID->execute();
$getID->bindColumn("parent_id", $parentID); 
$getID->fetch();

$getChild = $g_DBhandeler->prepare("SELECT * FROM `Scholar` WHERE `parent_id` = {$parentID}");
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
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS);
    $scholar = filter_input(INPUT_POST, 'scholar', FILTER_SANITIZE_SPECIAL_CHARS);
    
    $stmt = $g_DBhandeler->prepare("INSERT INTO `Absence`(`reason`, `date`, `scholar_id`) VALUES (?,?,?)");
    $stmt->bindParam(1, $reason, PDO::PARAM_STR);
    $stmt->bindParam(2, $date, PDO::PARAM_STR);
    $stmt->bindParam(3, $scholar, PDO::PARAM_INT);

    $checkDate = $g_DBhandeler->prepare("SELECT * FROM `Absence` WHERE `date` = :dates AND `scholar_id` = :scholar");
    $checkDate->bindParam('dates', $date, PDO::PARAM_STR);
    $checkDate->bindParam('scholar', $scholar, PDO::PARAM_INT);
    $checkDate->execute();

    if($checkDate->rowCount() > 0) {
        echo "<h3>Er staat al een absentie melding op deze datum!</h3>";
    } else {
        try {
            $stmt->execute();
            echo "<h3>Absentie succesvol verstuurd voor de datum: <b>{$date}</b>, met als reden: <b>{$reason}</b></h3>";
        } catch (Exception $e) {
            echo $e;
        }
    }



}

?>
</main>

<?php include_once('footer.php'); ?>