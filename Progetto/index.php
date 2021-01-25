<!-- 
    Fabio De Palma
    il sito è stato pensato per un ristorante fittizia che fa hamburger a tema informatico
    nella schermata iniziale viene presentato subito il menù si può scegliere il panino da inserire nel carrello
    facendo un click sul nome dell’hamburger,
    passando sopra l’immagine di un panino viene mostrato il prezzo, il nome del panino e gli ingredienti.
    nella sezione traceUs è presente la mappa e la via del ristorante
    nella sezione aboutus passando sopra alle varie mansioni dei dipendenti compariranno le loro foto e i loro nomi
    nella sezione make your hackburger è possibile creare panini peronalizzati con i vari ingredienti
    massimo 7 ingredienti.
    facendo click sul nome vengono mostrate le proprie informazioni dove è possibile la modifica.
    facendo click sul carrello verranno mostrati tutti i panini inseriti nel carrello

    questa pagina riguarda il login

 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hamburger IT</title>
    <link rel="stylesheet" href="css/hamburgerit.css">
    <link rel="stylesheet" href="css/loginout.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <script src="js/login.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    

    
</head>
<body>
    <h1>
        <a href="index.php">
          <img src="img/LOGO.png" alt="logo" style="height: 100px; width: 150px; padding-top: 10px;"/>
        </a>
    </h1>
<?php

if (!isset($_SESSION)) { session_start(); }
if(isset($_SESSION["username"])){
  header("Location: php/site.php");
}

?>
<img src="img/topburger.png" alt="TopBurger">

        <?php
        if(isset($_SESSION["logout"])) {
            ?>
            <div id="err"><span>
            <?=$_SESSION["logout"];?>
            </span></div>
        <?php
            unset($_SESSION["logout"]);
        }else{
            ?>
            <div id="err" style="display:none;"> </div>
        <?php
        
        }
        ?>
        

<div class="fild">
   
    <form action="php/user/login.php" method="post">
        <fieldset id= "login">
            <legend>LOGIN</legend>
            Username: <br> <input type="text" name="username" id="username"> <br> <br>


            Password: <br> <input type="password" name="password" id="password"><br> <br>
            <button type="submit" id="login-btn">Log In</button>
            <button type="reset">Reset</button>
            <br>
            <br>
            <a href="php/signin.php">create new account</a>
        </fieldset>
    </form>
   
</div>
<img src="img/bottomburger.png" alt="BottomBurger">