<?php require('header.php'); ?>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $scholar_1 = filter_input(INPUT_POST, 'scholar_1', FILTER_UNSAFE_RAW);
            $reason_1 = filter_input(INPUT_POST, 'reason_1', FILTER_SANITIZE_SPECIAL_CHARS);

            $scholar_2 = filter_input(INPUT_POST, 'scholar_2', FILTER_UNSAFE_RAW);
            $reason_2 = filter_input(INPUT_POST, 'reason_2', FILTER_SANITIZE_SPECIAL_CHARS);

            $scholar_3 = filter_input(INPUT_POST, 'scholar_3', FILTER_UNSAFE_RAW);
            $reason_3 = filter_input(INPUT_POST, 'reason_3', FILTER_SANITIZE_SPECIAL_CHARS);

            $scholar_4 = filter_input(INPUT_POST, 'scholar_4', FILTER_UNSAFE_RAW);
            $reason_4 = filter_input(INPUT_POST, 'reason_4', FILTER_SANITIZE_SPECIAL_CHARS);

            $scholar_5 = filter_input(INPUT_POST, 'scholar_5', FILTER_UNSAFE_RAW);
            $reason_5 = filter_input(INPUT_POST, 'reason_5', FILTER_SANITIZE_SPECIAL_CHARS);

            $scholar_6 = filter_input(INPUT_POST, 'scholar_6', FILTER_UNSAFE_RAW);
            $reason_6 = filter_input(INPUT_POST, 'reason_6', FILTER_SANITIZE_SPECIAL_CHARS);

            $scholar_7 = filter_input(INPUT_POST, 'scholar_7', FILTER_UNSAFE_RAW);
            $reason_7 = filter_input(INPUT_POST, 'reason_7', FILTER_SANITIZE_SPECIAL_CHARS);

            $scholar_8 = filter_input(INPUT_POST, 'scholar_8', FILTER_UNSAFE_RAW);
            $reason_8 = filter_input(INPUT_POST, 'reason_8', FILTER_SANITIZE_SPECIAL_CHARS);

            $scholar_9 = filter_input(INPUT_POST, 'scholar_9', FILTER_UNSAFE_RAW);
            $reason_9 = filter_input(INPUT_POST, 'reason_9', FILTER_SANITIZE_SPECIAL_CHARS);

            $scholar_10 = filter_input(INPUT_POST, 'scholar_10', FILTER_UNSAFE_RAW);
            $reason_10 = filter_input(INPUT_POST, 'reason_10', FILTER_SANITIZE_SPECIAL_CHARS);

            //echo "Aanwezigheid: $scholar_1 <br>";
            //echo "Reden: $reason_1 <br>";
            //echo "Aanwezigheid: $scholar_10 <br>";
            //echo "Reden: $reason_10";
            try{
                $dbHandler = new PDO("mysql:host=mysql;dbname=Morgister;charset=utf8", "root", "qwerty");
            }catch (Expection $ex) {
                echo $ex;
            }
            if(!$dbHandler == true){
                echo "The connection is not correct, please try again";
            }
            else{
              try{
                    $stmt = $dbHandler->prepare("INSERT INTO 'Absence'('absence', 'reason')
                                                VALUES (:absence_1, :reason_1)");

                    $stmt->bindParam("absence_1", $scholar_1, PDO::PARAM_STR);
                    $stmt->bindParam("reason_1", $reason_1, PDO::PARAM_STR);

                    $stmt->bindParam("absence_2", $scholar_2, PDO::PARAM_STR);
                    $stmt->bindParam("reason_2", $reason_2, PDO::PARAM_STR);

                    $stmt->bindParam("absence_3", $scholar_3, PDO::PARAM_STR);
                    $stmt->bindParam("reason_3", $reason_3, PDO::PARAM_STR);

                    $stmt->bindParam("absence_4", $scholar_4, PDO::PARAM_STR);
                    $stmt->bindParam("reason_4", $reason_4, PDO::PARAM_STR);

                    $stmt->execute();
              }catch (Expection $ex) {
                    echo $ex;
              }
            }
        }
        else{
            
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
                        <div class="scholarWhite">
                            <p class="pAbsence">Leerling</p>
                            <input type="radio" name="scholar_1" value="Aanwezig" class="radio" checked>
                            <input type="radio" name="scholar_1" value="Afwezig" class="radio">
                            <input type="text" name="reason_1" placeholder="Reden van afwezigheid" class="textBox">
                        </div>
                        <div class="scholarWhite">
                            <p class="pAbsence">Leerling</p>
                            <input type="radio" name="scholar_2" value="Aanwezig" class="radio" checked>
                            <input type="radio" name="scholar_2" value="Afwezig" class="radio">
                            <input type="text" name="reason_2" placeholder="Reden van afwezigheid" class="textBox">
                        </div> 
                        <div class="scholarWhite">
                            <p class="pAbsence">Leerling</p>
                            <input type="radio" name="scholar_3" value="Aanwezig" class="radio" checked>
                            <input type="radio" name="scholar_3" value="Afwezig" class="radio">
                            <input type="text" name="reason_3" placeholder="Reden van afwezigheid" class="textBox">
                        </div> 
                        <div class="scholarWhite">
                            <p class="pAbsence">Leerling</p>
                            <input type="radio" name="scholar_4" value="Aanwezig" class="radio" checked>
                            <input type="radio" name="scholar_4" value="Afwezig" class="radio">
                            <input type="text" name="reason_4" placeholder="Reden van afwezigheid" class="textBox">
                        </div> 
                        <div class="scholarWhite">
                            <p class="pAbsence">Leerling</p>
                            <input type="radio" name="scholar_5" value="Aanwezig" class="radio" checked>
                            <input type="radio" name="scholar_5" value="Afwezig" class="radio">
                            <input type="text" name="reason_5" placeholder="Reden van afwezigheid" class="textBox">
                        </div> 
                        <div class="scholarWhite">
                            <p class="pAbsence">Leerling</p>
                            <input type="radio" name="scholar_6" value="Aanwezig" class="radio" checked>
                            <input type="radio" name="scholar_6" value="Afwezig" class="radio">
                            <input type="text" name="reason_6" placeholder="Reden van afwezigheid" class="textBox">
                        </div> 
                        <div class="scholarWhite">
                            <p class="pAbsence">Leerling</p>
                            <input type="radio" name="scholar_7" value="Aanwezig" class="radio" checked>
                            <input type="radio" name="scholar_7" value="Afwezig" class="radio">
                            <input type="text" name="reason_7" placeholder="Reden van afwezigheid" class="textBox">
                        </div> 
                        <div class="scholarWhite">
                            <p class="pAbsence">Leerling</p>
                            <input type="radio" name="scholar_8" value="Aanwezig" class="radio" checked>
                            <input type="radio" name="scholar_8" value="Afwezig" class="radio">
                            <input type="text" name="reason_8" placeholder="Reden van afwezigheid" class="textBox">
                        </div> 
                        <div class="scholarWhite">
                            <p class="pAbsence">Leerling</p>
                            <input type="radio" name="scholar_9" value="Aanwezig" class="radio" checked>
                            <input type="radio" name="scholar_9" value="Afwezig" class="radio">
                            <input type="text" name="reason_9" placeholder="Reden van afwezigheid" class="textBox">
                        </div> 
                        <div class="scholarWhite">
                            <p class="pAbsence">Leerling</p>
                            <input type="radio" name="scholar_10" value="Aanwezig" class="radio" checked>
                            <input type="radio" name="scholar_10" value="Afwezig" class="radio">
                            <input type="text" name="reason_10" placeholder="Reden van afwezigheid" class="textBox">
                        </div> 
                        <input type="submit" name="submitAbsence" value="Verzenden" id="submit">
                    </div>
                </form>
            </main>
            <?php } ?>
<?php require('footer.php'); ?>