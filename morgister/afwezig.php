<?php require('header.php'); ?>
        <?php
            try{
                $dbHandler = new PDO("mysql:host=mysql;dbname=Morgister_test;charset=utf8", "root", "qwerty");
            }catch (Expection $ex) {
                echo $ex;
            }
            if(!$dbHandler == true){
                echo "The connection is not correct, please try again";
            }
            else{
              try{
                $statement = $dbHandler->prepare("SELECT name, reason
                                                  FROM Scholar
                                                  INNER JOIN Absence ON Scholar.Scholar_id=Absence.Scholar_id;");

                                           
                $statement->execute();


                $statement->bindColumn('name', $name);
                $statement->bindColumn('reason', $reason);

              }
              catch (Expection $ex) {
                    echo $ex;
              }
            }
            
            ?>
            <main>
                <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                    <div id="date">
                        <p>29/11/2022</p>
                    </div>
                    <div id="headAbsence">
                        <div class="AbsenceWhite">
                            <h3>Afwezigheid</h3>
                        </div>
                        <div class="AbsenceWhite">
                            <h3>Aanwezig</h3>
                        </div>
                        <div class="AbsenceWhite">
                            <h3>Afwezig</h3>
                        </div>
                        <div class="AbsenceWhite">
                            <h3>Reden</h3>
                        </div>
                    </div>
                    <div id="whiteLine">
                        <?php	
                            $i=0;
                            while($result = $statement->fetch()){
                                echo '<div class="scholarWhite">
                                        <div>
                                        <p class="pAbsence">'.$name.'</p>
                                        </div>
                                        <div>
                                        <input type="radio" name="scholar_'.$i.'" value="Aanwezig" class="radio" disabled>
                                        </div>
                                        <div>
                                        <input type="radio" name="scholar_'.$i.'" value="Afwezig" class="radio" checked>
                                        </div>
                                        <div>
                                        <p class="pAbsence">'.$reason.'</p>
                                        </div>
                                      </div>';  
                                $i++;
                            }
                        ?>
                        
                        <!--<input type="submit" name="submitAbsence" value="Verzenden" id="submit">-->
                    </div>
                </form>
            </main>     
<?php require('footer.php'); ?>