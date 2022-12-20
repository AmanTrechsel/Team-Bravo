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
$getChild->fetch();
// var_dump($getID);
echo $cName;

?>

</main>
           

<?php include_once('footer.php'); ?>