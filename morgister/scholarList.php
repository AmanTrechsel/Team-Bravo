<?php require('header.php'); ?>

<div id="mainGrades">
    <div id="gradesContent">
        <h2 class="subjectTable">Leerlingen</h2>
    </div> 
    <div class="scholarList">    
        <?php
                  
        try {
        $g_dbHandler = new PDO("mysql:host=mysql;dbname=Morgister", "root", "qwerty");
        } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
        }   
        $stmt = $g_dbHandler->prepare("SELECT * FROM Scholar");
        $stmt->execute();
           
        if($stmt->rowCount() > 0):
            $rows = $stmt->fetchAll();
            foreach($rows as $row):

        ?>

     
        <div class="scholarBox">
            <p><?php echo $row['name'], " ", $row['surname'], "</p><p>", "Leerling nummer: ", $row['scholar_id']; ?>
            <p><?php echo "<a  href='subjectList.php?scholar_id=" . $row['scholar_id'] . "'>Bekijk cijfers</a>"; ?><p>
        </div>
            

        <?php

        endforeach;

        endif;
        $g_dbHandler = null;
           
        ?>
    </div>
       
    
</div>

<?php require('footer.php'); ?>