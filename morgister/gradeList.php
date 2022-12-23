<?php include_once('header.php'); 
 
 if(isset($_GET['scholar_id'])&&($_GET['subject_id'])){
    $l_scholar = $_GET['scholar_id'];
    $l_subject = $_GET['subject_id'];
?>

<div id="mainGrades">
    <div id="gradesTitle">
        <?php echo "<a href='subjectList.php?scholar_id=" . $l_scholar . "'><p id='leerlingButton'>Vorige pagina</p></a>" ?>
        <?php echo "<a href='addGrade.php?scholar_id=" . $l_scholar . "&subject_id=" . $l_subject . "'><p id='leerlingButton'>Cijfer toevoegen</p></a>" ?>
    </div>
    <div id="gradesContent">
        <table>
            <tr>
                <td class="semesterTable"><h3>Cijfer</h3></td>
                <td class="semesterTable"><h3></h3></td>
            </tr>

            <?php

            try {
                require_once('DBconnection.php');
            
                $l_statement = $g_dbHandler->prepare("SELECT * FROM `Grades` WHERE scholar_id = :scholarId AND subject_id = :subjectId");
                $l_statement->bindParam(':scholarId', $l_scholar, PDO::PARAM_STR);
                $l_statement->bindParam(':subjectId', $l_subject, PDO::PARAM_STR);
                $l_statement->execute();

            } catch(Exception $l_exception) {
                echo $l_exception;
            }

            if($l_statement->rowCount() > 0) {
                $l_rows = $l_statement->fetchAll();
                foreach($l_rows as $l_row) {

            ?>

            <tr>
                <td class="semesterTable"><?php echo $l_row['grade']; ?></td>
                <td class="semesterTable"><?php echo "<a href='editGrade.php?grade_id=" . $l_row['grade_id'] . "&scholar_id=" . $l_scholar . "&subject_id=" . $l_subject . "'>Cijfer bewerken</a>" ?></td> 
            </tr>

            <?php

                }

            }

            $g_dbHandler = null;
            }
        
            ?>
    </div>
</div>


<?php require('footer.php'); ?>