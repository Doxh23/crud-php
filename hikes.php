<?php
    session_start();
    
    if(isset($_SESSION['login']) && $_SESSION['login'] === TRUE){
        header("location: table.php");    }
    else{

if(isset($_POST['pseudo']) && isset($_POST['password'])) {
    include "db-connect.php";

    $pseudolog = $_POST['pseudo'];
    $usernamesql = "SELECT pseudonyme,password FROM `USER` WHERE pseudonyme='$pseudolog'";
   $usernameexec = $conn->query($usernamesql);
   $test = $usernameexec->fetchall(PDO::FETCH_ASSOC);
   $pseudologin = $test["0"]['pseudonyme'];
   $passwordlogin = $test["0"]['password'];
if($pseudologin == $_POST['pseudo']  && $passwordlogin == $_POST['password']){
    $_SESSION['login'] = TRUE;
    header('location:table.php');
}
}
if(isset($_POST['pseudonyme'])   && isset($_POST['password']) && isset($_POST['verif-pass'])){
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./scss/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

</head>
<body id="hikes">
    <main>
   



<div class="login-register">
    <div class="login-reg-title" >
        <h2 id="login-title" class="login-title">login</h2>
        <h2  id="register-title" class="register-title">register</h2>
    </div>
    <div class="login">
 <form action="" method="POST" class="login-form">
    <input type="text" name="pseudo" placeholder="pseudo"class="inputext">
    <input type="password" name="password" placeholder="password"class="inputext">
    <input type="submit" class="submit" value="signIn" >
</form>
</div>
 <div class="register">
<form action="" method="POST" class="register-form">
    <input type="text" name="pseudonyme" placeholder="pseudo"class="inputext">
    <input type="text" name="password" placeholder="password" class="inputext">
    <input type="text" name="verif-pass" placeholder="confirm password" class="inputext">
    <input type="submit" class="submit" value="signUp">
</form>

    </div>
    </div>
   
<?php 
    }
    ?>
      


      </main>


<script src="./js/index.js"></script>
</body>
</html>