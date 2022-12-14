<?php require('header.php'); ?>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            
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
                <div class="scholarWhite">
                    <p class="pAbsence">Leerling</p>
                    <input type="radio" name="scholar#1" value="present" class="radio" checked>
                    <input type="radio" name="scholar#1" value="absent" class="radio">
                    <input type="text" name="reason#1" placeholder="Reden van afwezigheid" class="textBox">
                </div>
                <div class="scholarWhite">
                    <p class="pAbsence">Leerling</p>
                    <input type="radio" name="scholar#2" value="present" class="radio" checked>
                    <input type="radio" name="scholar#2" value="absent" class="radio">
                    <input type="text" name="reason#2" placeholder="Reden van afwezigheid" class="textBox">
                </div> 
                <div class="scholarWhite">
                    <p class="pAbsence">Leerling</p>
                    <input type="radio" name="scholar#3" value="present" class="radio" checked>
                    <input type="radio" name="scholar#3" value="absent" class="radio">
                    <input type="text" name="reason#3" placeholder="Reden van afwezigheid" class="textBox">
                </div> 
                <div class="scholarWhite">
                    <p class="pAbsence">Leerling</p>
                    <input type="radio" name="scholar#4" value="present" class="radio" checked>
                    <input type="radio" name="scholar#4" value="absent" class="radio">
                    <input type="text" name="reason#4" placeholder="Reden van afwezigheid" class="textBox">
                </div> 
                <div class="scholarWhite">
                    <p class="pAbsence">Leerling</p>
                    <input type="radio" name="scholar#5" value="present" class="radio" checked>
                    <input type="radio" name="scholar#5" value="absent" class="radio">
                    <input type="text" name="reason#5" placeholder="Reden van afwezigheid" class="textBox">
                </div> 
                <div class="scholarWhite">
                    <p class="pAbsence">Leerling</p>
                    <input type="radio" name="scholar#6" value="present" class="radio" checked>
                    <input type="radio" name="scholar#6" value="absent" class="radio">
                    <input type="text" name="reason#6" placeholder="Reden van afwezigheid" class="textBox">
                </div> 
                <div class="scholarWhite">
                    <p class="pAbsence">Leerling</p>
                    <input type="radio" name="scholar#7" value="present" class="radio" checked>
                    <input type="radio" name="scholar#7" value="absent" class="radio">
                    <input type="text" name="reason#7" placeholder="Reden van afwezigheid" class="textBox">
                </div> 
                <div class="scholarWhite">
                    <p class="pAbsence">Leerling</p>
                    <input type="radio" name="scholar#8" value="present" class="radio" checked>
                    <input type="radio" name="scholar#8" value="absent" class="radio">
                    <input type="text" name="reason#8" placeholder="Reden van afwezigheid" class="textBox">
                </div> 
                <div class="scholarWhite">
                    <p class="pAbsence">Leerling</p>
                    <input type="radio" name="scholar#9" value="present" class="radio" checked>
                    <input type="radio" name="scholar#9" value="absent" class="radio">
                    <input type="text" name="reason#9" placeholder="Reden van afwezigheid" class="textBox">
                </div> 
                <div class="scholarWhite">
                    <p class="pAbsence">Leerling</p>
                    <input type="radio" name="scholar#10" value="present" class="radio" checked>
                    <input type="radio" name="scholar#10" value="absent" class="radio">
                    <input type="text" name="reason#10" placeholder="Reden van afwezigheid" class="textBox">
                </div> 
                <input type="submit" name="submitAbsence" value="Verzenden" id="submit">
            </div>
        </form>
    </main>
<?php require('footer.php'); ?>