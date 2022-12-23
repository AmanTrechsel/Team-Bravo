<?php require_once('header.php'); ?>

<main>
<h2>Aankomende evenementen</h2>
<?php
$l_getEvents = $g_dbHandler->prepare("SELECT * FROM `Events` ORDER BY `event_id` DESC");
$l_getEvents->execute();

$l_getEvents->bindColumn("event_id", $l_id);
$l_getEvents->bindColumn("title", $l_title);
$l_getEvents->bindColumn("description", $l_description);
$l_getEvents->bindColumn("date", $l_date);

while($l_result = $l_getEvents->fetch()) {
    echo "<h3>{$l_title}</h3>";
    echo "<p><b>{$l_date}</b></p>";
    echo "<p>{$l_description}</p><hr>";
}

?>

</main>


<?php require('footer.php'); ?>