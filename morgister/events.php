<?php require('header.php'); ?>

    <main>
        <h1>Evenementen:</h1>
        <hr>
        <?php
            // if () { Show when the user has permission
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
                $newTitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
                $newDesc = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_SPECIAL_CHARS);
                $newDate = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS);

                $checkEvent = $g_DBhandeler->prepare("SELECT * FROM `Events` WHERE `title` = :newTitle AND `date` = :newDate");
                $checkEvent->bindParam(':newTitle', $newTitle, PDO::PARAM_STR);
                $checkEvent->bindParam(':newDate', $newDate, PDO::PARAM_STR);
                try {                
                    $checkEvent->execute();
                } catch (Exception $e) {
                    echo $e;
                }

                if ($checkEvent->rowCount() == 0) {
                    if(empty($newTitle)||empty($newDesc)||empty($newDate)) {
                        echo '<b style="color:red">Fill in all fields!</b>';
                    } else {
                        $stmt = $g_DBhandeler->prepare("INSERT INTO `Events`(`title`, `description`, `date`) VALUES (?,?,?)");
                        $stmt->bindParam(1, $newTitle, PDO::PARAM_STR);
                        $stmt->bindParam(2, $newDesc, PDO::PARAM_STR);
                        $stmt->bindParam(3, $newDate, PDO::PARAM_STR);

                        try {
                            $stmt->execute();
                        } catch (Exception $e) {
                            echo $e;
                        }
                    }
                } else {
                    echo "<b style='color:red'>Er is al een evenement met dezelfde titel op de gekozen datum!</b>";
                }
            } 
            // }

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