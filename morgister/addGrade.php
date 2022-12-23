<?php include_once('header.php'); 
 
 if(isset($_GET['scholar_id'])&& ($_GET['subject_id'])){
    $l_scholar = $_GET['scholar_id'];
    $l_subject = $_GET['subject_id'];
?>

<div id="mainGrades">
    <div id="gradesTitle">
        <?php echo "<a href='gradeList.php?scholar_id=" . $l_scholar . "&subject_id=" . $l_subject . "'><p id='leerlingButton'>Vorige pagina</p></a>" ?>
    </div>
    <div id="gradesContent">
        <h2 class="addgradeTitle">Cijfer toevoegen</h2>
    </div>
    <div class="gradeformContent">
       <?php echo "<form action='addGrade.php?scholar_id=" . $l_scholar . "&subject_id=" . $l_subject . "' method='POST' enctype='multipart/form-data' class='gradeForm'>" ?>
            <div>          
                <label for="Product">Cijfer: </label>
                <input type="number" min="1" max="10" name="grade" id="grade">
                <input type="submit" value="Toevoegen">
            </div>
        </form>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $l_error=[];
            $l_grade = filter_input(INPUT_POST, 'grade', FILTER_SANITIZE_SPECIAL_CHARS);
            
            try {
                require_once('DBconnection.php');

                $l_statement = $g_dbHandler->prepare("INSERT INTO `Grades` (`grade_id`, `grade`, `subject_id`, `scholar_id`) 
                VALUES (NULL, :grade, :subject_id, :scholar_id)");

                $l_statement->bindParam('grade', $l_grade, PDO::PARAM_INT);
                $l_statement->bindParam('subject_id', $l_subject, PDO::PARAM_INT);
                $l_statement->bindParam('scholar_id', $l_scholar, PDO::PARAM_INT);
                $l_statement->execute();
                } catch(Exception $l_exception) {
                    echo $l_exception;
                }
        ?>
        </div>
        <div class="updateContent"><p class="updateMsg">Cijfer succesvol toegevoegd</p></div> 
        <?php
        }
    }
    ?>
</div>


<?php require('footer.php'); ?>