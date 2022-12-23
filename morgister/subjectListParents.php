<?php include_once('header.php'); 
 
 if(isset($_GET['scholar_id'])){
    $l_scholar = $_GET['scholar_id'];
    
?>

<div id="mainGrades">
    <div id="gradesTitle">
        <a href="scholarListParents.php"><p id="leerlingButton">Cijfers</p></a>
    </div>
    <div id="gradesContent">
        <table>
            <tr>
                <td class="subjectTable"><h2>Vakken</h2></td>
                <td class="subjectTable"><h2></h2></td>
            </tr>

            <?php 

                try {
                    require_once('DBconnection.php');
                } catch(Exception $l_exception) {
                    echo $l_exception;
                }

                $l_statement = $g_dbHandler->prepare("SELECT * FROM Subjects");

                $l_statement->execute();
        
                if($l_statement->rowCount() > 0):
                        $l_rows = $l_statement->fetchAll();
                        foreach($l_rows as $l_row):

                ?>

                <tr>
                    <td class="semesterTable"><?php echo $l_row['subject_name']; ?></td>
                    <td class="semesterTable"><?php echo "<a href='gradeListParents.php?scholar_id=" . $l_scholar . "&subject_id=" . $l_row['subject_id'] . "'>Bekijk cijfers</a>" ?></td> 
                </tr>

                <?php

                endforeach;

                endif;

                $g_dbHandler = null;
            }
            
            ?>

        </table> 
    </div>
</div>


<?php require('footer.php'); ?>