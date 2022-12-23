<?php include_once('header.php');?>

    <main>
        <h1>Evenementen:</h1>
        <hr>
        <?php
            // Check if user has administration role
            if($_SESSION['role'] == 2) {
                echo "<a href='events.php?event=new'><button id='newEvent'>Nieuw evenement</button></a>";

                if(isset($_GET['event'])){
                    if($_GET['event'] == "new"){
                        echo "<form action='events.php' method='POST'>
                                <p>Titel:</p><input type='text' name='title' >
                                <p>Omscrijving:</p> <textarea name='desc' cols='18' rows='10'></textarea>
                                <p>Datum - <input type='date' name='date'></p>
                                <input type='submit' name='submit' value='Evenement aanmaken'>
                            </form>";
                    }
                }

                if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
                    $l_newTitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
                    $l_newDesc = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_SPECIAL_CHARS);
                    $l_newDate = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS);

                    $l_checkEvent = $g_dbHandler->prepare("SELECT * FROM `Events` WHERE `title` = :newTitle AND `date` = :newDate");
                    $l_checkEvent->bindParam(':newTitle', $l_newTitle, PDO::PARAM_STR);
                    $l_checkEvent->bindParam(':newDate', $l_newDate, PDO::PARAM_STR);
                    try {                
                        $l_checkEvent->execute();
                    } catch (Exception $l_exception) {
                        echo $l_exception;
                    }

                    if ($l_checkEvent->rowCount() == 0) {
                        if (empty($l_newTitle)||empty($l_newDesc)||empty($l_newDate)) {
                            echo '<b style="color:red">Fill in all fields!</b>';
                        } else {
                            $l_statement = $g_dbHandler->prepare("INSERT INTO `Events`(`title`, `description`, `date`) VALUES (?,?,?)");
                            $l_statement->bindParam(1, $l_newTitle, PDO::PARAM_STR);
                            $l_statement->bindParam(2, $l_newDesc, PDO::PARAM_STR);
                            $l_statement->bindParam(3, $l_newDate, PDO::PARAM_STR);

                            try {
                                $l_statement->execute();
                            } catch (Exception $l_exception) {
                                echo $l_exception;
                            }
                        }
                    } else {
                        echo "<b style='color:red'>Er is al een evenement met dezelfde titel op de gekozen datum!</b>";
                    }
                } 
            }

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