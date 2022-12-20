<?php require('header.php'); 
 
 if(isset($_GET['scholar_id'])&&($_GET['subject_id'])){
    $scholar = $_GET['scholar_id'];
    $subject = $_GET['subject_id'];
?>

<div id="mainGrades">
    <div id="gradesTitle">
        <?php echo "<a href='subjectList.php?scholar_id=" . $scholar . "'><p id='leerlingButton'>Vorige pagina</p></a>" ?>
        <?php echo "<a href='addGrade.php?scholar_id=" . $scholar . "&subject_id=" . $subject . "'><p id='leerlingButton'>Cijfer toevoegen</p></a>" ?>
    </div>
    <div id="gradesContent">
        <table>
            <tr>
                <td class="semesterTable"><h3>Cijfer</h3></td>
                <td class="semesterTable"><h3></h3></td>
            </tr>

            <?php

            try {
                $g_dbHandler = new PDO("mysql:host=mysql;dbname=Morgister", "root", "qwerty");
            
                $stmt = $g_dbHandler->prepare("SELECT * FROM `Grades` WHERE scholar_id = :scholarId AND subject_id = :subjectId");
                $stmt->bindParam(':scholarId', $scholar, PDO::PARAM_STR);
                $stmt->bindParam(':subjectId', $subject, PDO::PARAM_STR);
                $stmt->execute();

            } catch(Exception $ex) {
                echo $ex;
            }

            if($stmt->rowCount() > 0):
                $rows = $stmt->fetchAll();
                foreach($rows as $row):

            ?>

            <tr>
                <td class="semesterTable"><?php echo $row['grade']; ?></td>
                <td class="semesterTable"><?php echo "<a href='editGrade.php?grade_id=" . $row['grade_id'] . "&scholar_id=" . $scholar . "&subject_id=" . $subject . "'>Cijfer bewerken</a>" ?></td> 
            </tr>

            <?php

            endforeach;

            endif;

            $g_dbHandler = null;
            }
        
            ?>
    </div>
</div>


<?php require('footer.php'); ?>