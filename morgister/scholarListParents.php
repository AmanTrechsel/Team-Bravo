<?php require('header.php'); ?>

<div id="mainGrades">
    <div id="gradesContent">
        <h2 class="subjectTable">Cijfers</h2>
    </div> 
    <div class="scholarList">    
        <?php
                  
        try {
            require_once('DBconnection.php');
        } catch(Exception $l_exception) {
                echo $l_exception;
        }   
        $l_statement = $g_dbHandler->prepare("SELECT * FROM Scholar");
        $l_statement->execute();
           
        if($l_statement->rowCount() > 0):
            $l_rows = $l_statement->fetchAll();
            foreach($l_rows as $l_row):

        ?>

     
        <div class="scholarBox">
            <p><?php echo $l_row['name'], " ", $l_row['surname'], "</p><p>", "Leerling nummer: ", $l_row['scholar_id']; ?>
            <p><?php echo "<a href='subjectListParents.php?scholar_id=" . $l_row['scholar_id'] . "'>Bekijk cijfers</a>"; ?><p>
        </div>
            

        <?php

        endforeach;

        endif;
        $g_dbHandler = null;
           
        ?>
    </div>
       
    
</div>

<?php require('footer.php'); ?>