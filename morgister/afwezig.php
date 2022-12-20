<?php include_once('header.php'); ?>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            $inputs = array(
                'scholar_0' => FILTER_UNSAFE_RAW,
                'scholar_2' => FILTER_UNSAFE_RAW,
                'scholar_3' => FILTER_UNSAFE_RAW,
                'scholar_4' => FILTER_UNSAFE_RAW,
                'scholar_5' => FILTER_UNSAFE_RAW,
                'scholar_6' => FILTER_UNSAFE_RAW,
                'scholar_7' => FILTER_UNSAFE_RAW,
                'scholar_8' => FILTER_UNSAFE_RAW,
                'scholar_9' => FILTER_UNSAFE_RAW,

                'reason_0' => FILTER_SANITIZE_SPECIAL_CHARS,
                'reason_1' => FILTER_SANITIZE_SPECIAL_CHARS,
                'reason_2' => FILTER_SANITIZE_SPECIAL_CHARS,
                'reason_3' => FILTER_SANITIZE_SPECIAL_CHARS,
                'reason_4' => FILTER_SANITIZE_SPECIAL_CHARS,
                'reason_5' => FILTER_SANITIZE_SPECIAL_CHARS,
                'reason_6' => FILTER_SANITIZE_SPECIAL_CHARS,
                'reason_7' => FILTER_SANITIZE_SPECIAL_CHARS,
                'reason_8' => FILTER_SANITIZE_SPECIAL_CHARS,
                'reason_9' => FILTER_SANITIZE_SPECIAL_CHARS,

            )
        }
        else{
        ?>
        <?php
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
                $statement = $dbHandler->prepare("SELECT name FROM Scholar;");
                                           
                $statement->execute();

                $statement->bindColumn('name', $name);

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
                                    <p class="pAbsence">'.$name.'</p>
                                    <input type="radio" name="scholar_'.$i.'" value="Aanwezig" class="radio" checked>
                                    <input type="radio" name="scholar_'.$i.'" value="Afwezig" class="radio">
                                    <input type="text" name="reason_'.$i.'" placeholder="Reden van afwezigheid" class="textBox">
                                    </div>';
                                
                                $i++;
                            }
                        ?>
                        <input type="submit" name="submitAbsence" value="Verzenden" id="submit">
                    </div>
                </form>
        <?php } ?>      
<?php require('footer.php'); ?>