<?php include_once('header.php'); 
 
 if(isset($_GET['scholar_id'])){
    $scholar = $_GET['scholar_id'];
    
?>

<div id="mainGrades">
    <div id="gradesTitle">
        <a href="scholarListParents.php"><p id="leerlingButton">Leerlingen</p></a>
    </div>
    <div id="gradesContent">
        <table>
            <tr>
                <td class="subjectTable"><h2>Vakken</h2></td>
                <td class="subjectTable"><h2></h2></td>
            </tr>

            <?php 

                try {
                    $g_dbHandler = new PDO("mysql:host=mysql;dbname=Morgister", "root", "qwerty");
                } catch(Exception $ex) {
                    echo $ex;
                }

                $stmt = $g_dbHandler->prepare("SELECT * FROM Subjects");

                $stmt->execute();
        
                if($stmt->rowCount() > 0):
                        $rows = $stmt->fetchAll();
                        foreach($rows as $row):

                ?>

                <tr>
                    <td class="semesterTable"><?php echo $row['subject_name']; ?></td>
                    <td class="semesterTable"><?php echo "<a href='gradeListParents.php?scholar_id=" . $scholar . "&subject_id=" . $row['subject_id'] . "'>Bekijk cijfers</a>" ?></td> 
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