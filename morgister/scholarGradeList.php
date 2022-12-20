<?php require('header.php'); ?>

<div id="mainGrades">
    <div id="gradesContent">
        <table>
            <tr>
                <th class="subjectTable"><h2>Leerlingen</h2></th>
            </tr>

            <?php 
            try {
            $g_dbHandler = new PDO("mysql:host=mysql;dbname=Morgister", "root", "qwerty");
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $sql = "SELECT * FROM Scholar";

            $result = $g_dbHandler->prepare($sql);

            $result->execute();

            if($result->rowCount() > 0):
                $rows = $result->fetchAll();
                foreach($rows as $row):

            ?>

            <tr>
                <td class="semesterTable"><a href="grades.php"><?php echo $row['name'], " ", $row['surname']; ?></a></td>
            </tr>

            <?php

            endforeach;

            endif;

            $dbHandler = null;

            ?>

        </table> 
    </div>
</div>

<?php require('footer.php'); ?>