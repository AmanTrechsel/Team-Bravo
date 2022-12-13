<?php include('header.php');
    try {
        $connection = new PDO("mysql:host=mysql;dbname=Morgister;charset=utf8", "root", "qwerty");
    } catch(Exception $exception) {
        echo $exception;
        exit;
    }
    //Check if a form has been posted to the script
    if(isset($_POST['submit'])){
        $statement = $connection->prepare("SELECT `password` FROM `Accounts` WHERE `username` = :username;");
        $statement->bindParam("username", $_POST['username'], PDO::PARAM_STR);
        $statement->execute();
        if(password_verify($_POST['password'], ($statement->fetch())['password']))
        {
            $_SESSION['logged_in'] = true;
            echo "<p>you are logged in</p>";
        }
        else{
            //If incorrect -> Give feedback and include loginForm
            echo "<p style='color: red;'>wrong username and/or password</p>";

            echo password_hash($_POST['password'], PASSWORD_BCRYPT);
        }
    }
?>
<div id="mainLogin">
    <h2 id="loginTitle">Log hier in om in het leerlingvolgsysteem te komen.</h2>
    <form action="#" method="post" id="loginForm">
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