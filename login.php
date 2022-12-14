<?php include('header.php'); ?>

<div id="mainLogin">
    <h2 id="loginTitle">Log hier in om in het leerlingvolgsysteem te komen.</h2>
    <form action="#" id="loginForm">
        <div class="login">
            <span><h3>Gebruikersnaam:</h3></span>
            <input type="text" name="username" class="loginBox">
        </div>
        <div class="login">
            <span><h3>Wachtwoord:</h3></span>
            <input type="password" name="password" class="loginBox">
        </div>
        <div id="loginButtonDiv">
            <input type="submit" name="submit" value="Log in" id="loginButton">
        </div>
    </form>
</div>


<?php include('footer.php'); ?>