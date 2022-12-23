<?php require('header.php'); ?>
        <?php
            try {
                require_once('DBconnection.php');
            } catch (Exception $l_exception) {
                echo $l_exception;
            }
            if(!$g_dbHandler == true) {
                echo "The connection is not correct, please try again";
            } else {
                try {
                    $l_statement = $g_dbHandler->prepare("SELECT name, reason
                                                      FROM Scholar
                                                      INNER JOIN Absence ON Scholar.Scholar_id=Absence.Scholar_id;");

                                              
                    $l_statement->execute();


                    $l_statement->bindColumn('name', $l_name);
                    $l_statement->bindColumn('reason', $l_reason);

                }
                catch (Exception $l_exception) {
                    echo $l_exception;
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
                            while ($l_result = $l_statement->fetch()) {
                                echo '<div class="scholarWhite">
                                        <div>
                                        <p class="pAbsence">'.$l_name.'</p>
                                        </div>
                                        <div>
                                        <input type="radio" name="scholar_'.$i.'" value="Aanwezig" class="radio" disabled>
                                        </div>
                                        <div>
                                        <input type="radio" name="scholar_'.$i.'" value="Afwezig" class="radio" checked>
                                        </div>
                                        <div>
                                        <p class="pAbsence">'.$l_reason.'</p>
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