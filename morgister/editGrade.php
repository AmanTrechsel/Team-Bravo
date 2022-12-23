<?php include_once('header.php'); 
 
 if(isset($_GET['grade_id'])&& ($_GET['scholar_id'])&& ($_GET['subject_id'])){
    $grade_id = $_GET['grade_id'];
    $scholar = $_GET['scholar_id'];
    $subject = $_GET['subject_id'];

?>

<div id="mainGrades">
    <div id="gradesTitle">
        <?php echo "<a href='gradeList.php?scholar_id=" . $scholar . "&subject_id=" . $subject . "'><p id='leerlingButton'>Vorige pagina</p></a>" ?>
    </div>
    <div id="gradesContent">
        <h2 class="addgradeTitle">Cijfer veranderen</h2>
    </div>
    <div class="gradeformContent">

    <?php

    try{
        $dbHandler = new PDO("mysql:host=mysql;dbname=Morgister_test", "root", "qwerty");

        $stmt = $dbHandler->prepare("SELECT * FROM `Grades` WHERE scholar_id=" . $scholar . " AND subject_id=" . $subject . " AND grade_id=" . $grade_id . "");

        $stmt->execute();
    } catch(Exception $ex){
        echo $ex;
    }

    if($row = $stmt->fetch(PDO::FETCH_ASSOC)){

    ?>

       <?php echo "<form action='editGrade.php?scholar_id=" . $scholar . "&subject_id=" . $subject . "&grade_id=" . $grade_id . "' method='POST' enctype='multipart/form-data' class='gradeForm'>" ?>
            <div>          
                <label for="Product">Cijfer: </label>
                <input type="number" value="<?php echo $row['grade'] ?>" min="1" max="10" name="grade" id="grade">
                <input type="submit" value="Veranderen">
            </div>
        </form>

        <?php
    }

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $err=[];
            $grade = filter_input(INPUT_POST, 'grade', FILTER_SANITIZE_SPECIAL_CHARS);
            
            try {
                $g_dbHandler = new PDO("mysql:host=mysql;dbname=Morgister", "root", "qwerty");


            $stmt = $g_dbHandler->prepare("UPDATE `Grades` SET `grade` = :grade, `subject_id` = :subject_id, `scholar_id` = :scholar_id WHERE `grade_id` = " . $grade_id . "");

            $stmt->bindParam('grade', $grade, PDO::PARAM_INT);
            $stmt->bindParam('subject_id', $subject, PDO::PARAM_INT);
            $stmt->bindParam('scholar_id', $scholar, PDO::PARAM_INT);
            $stmt->execute();
            } catch(Exception $ex) {
                echo $ex;
        }
        ?>
    </div>
    <div class="updateContent"><p class="updateMsg">Cijfer succesvol veranderd</p></div> 
    <?php
    }
    }        
    ?>
</div>


<?php require('footer.php'); ?>