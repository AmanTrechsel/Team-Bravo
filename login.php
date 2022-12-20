<?php
session_start();
require_once('DBconnection.php');
if(isset($_POST['submit'])){
    $checkUser = $g_DBhandeler->prepare("SELECT * FROM `Accounts` WHERE `username` = :username;");
    $filtInput = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $checkUser->bindParam("username", $filtInput, PDO::PARAM_STR);
    $checkUser->execute();
    $row = $checkUser->fetch(PDO::FETCH_ASSOC);
    if($row) {
        $getPass = $g_DBhandeler->prepare("SELECT * FROM `Accounts` WHERE `username`= :username");
        $getPass->bindParam("username", $_POST['username'], PDO::PARAM_STR);
        $getPass->execute();
        $getPass->bindColumn("password", $pass); 
        $getPass->bindColumn("role", $role); 
        while($result = $getPass->fetch()){ 
            if(password_verify($_POST['password'], $pass)){
                $_SESSION['logged_in'] = $role;
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