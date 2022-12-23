<?php
session_start();
require_once('DBconnection.php');
if(isset($_POST['submit'])){
    $l_checkUser = $g_dbHandler->prepare("SELECT * FROM `Accounts` WHERE `username` = :username;");
    $l_filterInput = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $l_checkUser->bindParam("username", $l_filterInput, PDO::PARAM_STR);
    $l_checkUser->execute();
    $l_row = $l_checkUser->fetch(PDO::FETCH_ASSOC);
    if($l_row) {
        $l_getPassword = $g_dbHandler->prepare("SELECT * FROM `Accounts` WHERE `username`= :username");
        $l_getPassword->bindParam("username", $_POST['username'], PDO::PARAM_STR);
        $l_getPassword->execute();
        $l_getPassword->bindColumn("password", $l_password); 
        $l_getPassword->bindColumn("account_id", $g_userId); 
        $l_getPassword->bindColumn("role", $g_role); 
        while($l_result = $l_getPassword->fetch()){ 
            if(password_verify($_POST['password'], $l_password)){
                $_SESSION['role'] = $g_role;
                $_SESSION['user'] = $g_userId;
                header('Location: morgister/index.php?login=true');
            } else{
                //If incorrect -> Give feedback and include loginForm
                header('Location: login.php?login=false');
                // echo password_hash($_POST['password'], PASSWORD_BCRYPT);
            }
        }    
    } else {
        header('Location: login.php?login=false');
    }
}
include_once('header.php');

?>

<div id="item2"></div>
<div id="mainLogin">
<?php
    if(isset($_GET['login']) == "false"){
        echo "<h2 style='color: red;'>Inloggen mislukt!</h2>";
    } elseif (isset($_GET['login']) == "falsepass") {
        echo "<h2 style='color: red;'>Gebruikersnaam en wachtwoord komen niet overeen!</h2>";
    }

?>

    <h2 id="loginTitle">Log hier in om in het leerlingvolgsysteem te komen.</h2>
    <form action="login.php" method="post" id="loginForm">
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