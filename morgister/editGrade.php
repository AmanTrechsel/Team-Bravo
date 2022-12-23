<?php include_once('header.php'); 
 
 if (isset($_GET['grade_id']) && ($_GET['scholar_id']) && ($_GET['subject_id'])) {
    $l_gradeId = $_GET['grade_id'];
    $l_scholar = $_GET['scholar_id'];
    $l_subject = $_GET['subject_id'];

  ?>

  <div id="mainGrades">
      <div id="gradesTitle">
          <?php echo "<a href='gradeList.php?scholar_id=" . $l_scholar . "&subject_id=" . $l_subject . "'><p id='leerlingButton'>Vorige pagina</p></a>" ?>
      </div>
      <div id="gradesContent">
          <h2 class="addgradeTitle">Cijfer veranderen</h2>
      </div>
      <div class="gradeformContent">

      <?php

      try{
          require_once('DBconnection.php');

          $l_statement = $g_dbHandler->prepare("SELECT * FROM `Grades` WHERE scholar_id=" . $l_scholar . " AND subject_id=" . $l_subject . " AND grade_id=" . $l_gradeId . "");

          $l_statement->execute();
      } catch(Exception $l_exception){
          echo $l_exception;
      }

      if($l_row = $l_statement->fetch(PDO::FETCH_ASSOC)){

      ?>

        <?php echo "<form action='editGrade.php?scholar_id=" . $l_scholar . "&subject_id=" . $l_subject . "&grade_id=" . $l_gradeId . "' method='POST' enctype='multipart/form-data' class='gradeForm'>" ?>
              <div>          
                  <label for="Product">Cijfer: </label>
                  <input type="number" value="<?php echo $l_row['grade'] ?>" min="1" max="10" name="grade" id="grade">
                  <input type="submit" value="Veranderen">
              </div>
          </form>

          <?php
      }

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $l_error=[];
              $l_grade = filter_input(INPUT_POST, 'grade', FILTER_SANITIZE_SPECIAL_CHARS);
              
              try {
                 require_once('DBconnection.php');


              $l_statement = $g_dbHandler->prepare("UPDATE `Grades` SET `grade` = :grade, `subject_id` = :subject_id, `scholar_id` = :scholar_id WHERE `grade_id` = " . $l_gradeId . "");

              $l_statement->bindParam('grade', $l_grade, PDO::PARAM_INT);
              $l_statement->bindParam('subject_id', $l_subject, PDO::PARAM_INT);
              $l_statement->bindParam('scholar_id', $l_scholar, PDO::PARAM_INT);
              $l_statement->execute();
              } catch(Exception $l_exception) {
                  echo $l_exception;
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