<?php include_once('header.php'); 
 
 if(isset($_GET['scholar_id'])&& ($_GET['subject_id'])){
    $scholar = $_GET['scholar_id'];
    $subject = $_GET['subject_id'];
?>

<div id="mainGrades">
    <div id="gradesTitle">
        <?php echo "<a href='gradeList.php?scholar_id=" . $scholar . "&subject_id=" . $subject . "'><p id='leerlingButton'>Vorige pagina</p></a>" ?>
    </div>
    <div id="gradesContent">
        <h2 class="addgradeTitle">Cijfer toevoegen</h2>
    </div>
    <div class="gradeformContent">
       <?php echo "<form action='addGrade.php?scholar_id=" . $scholar . "&subject_id=" . $subject . "' method='POST' enctype='multipart/form-data' class='gradeForm'>" ?>
            <div>          
                <label for="Product">Cijfer: </label>
                <input type="number" min="1" max="10" name="grade" id="grade">
                <input type="submit" value="Toevoegen">
            </div>
        </form>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $err=[];
            $grade = filter_input(INPUT_POST, 'grade', FILTER_SANITIZE_SPECIAL_CHARS);
            
            try {
                $g_dbHandler = new PDO("mysql:host=mysql;dbname=Morgister", "root", "qwerty");


            $stmt = $g_dbHandler->prepare("INSERT INTO `Grades` (`grade_id`, `grade`, `subject_id`, `scholar_id`) 
            VALUES (NULL, :grade, :subject_id, :scholar_id)");

            $stmt->bindParam('grade', $grade, PDO::PARAM_INT);
            $stmt->bindParam('subject_id', $subject, PDO::PARAM_INT);
            $stmt->bindParam('scholar_id', $scholar, PDO::PARAM_INT);
            $stmt->execute();
            } catch(Exception $ex) {
                echo $ex;
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