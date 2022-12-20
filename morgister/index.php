<?php require_once('header.php'); ?>

<main>
<h2>Aankomende evenementen</h2>
<?php
$getevents = $g_DBhandeler->prepare("SELECT * FROM `Events` ORDER BY `event_id` DESC");
$getevents->execute();

$getevents->bindColumn("event_id", $id);
$getevents->bindColumn("title", $title);
$getevents->bindColumn("description", $desc);
$getevents->bindColumn("date", $date);

while($result = $getevents->fetch()) {
    echo "<h3>{$title}</h3>";
    echo "<p><b>{$date}</b></p>";
    echo "<p>{$desc}</p><hr>";
}

?>

</main>


<?php require('footer.php'); ?>