<?php require('header.php'); 
 
 if(isset($_GET['grade_id'])&& ($_GET['scholar_id'])&& ($_GET['subject_id'])){
    $grade = $_GET['grade_id'];
    $scholar = $_GET['scholar_id'];
    $subject = $_GET['subject_id'];
?>

<div id="mainGrades">
    <div id="gradesTitle">
        <?php echo "<a href='gradeList.php?scholar_id=" . $scholar . "&subject_id=" . $subject . "'><p id='leerlingButton'>Vorige pagina</p></a>" ?>
    </div>

    <?php
    }        
    ?>
</div>


<?php require('footer.php'); ?>