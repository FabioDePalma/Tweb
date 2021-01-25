
<?php
# Fabio De Palma
 

#pagina che mostra tutti i dettagli dell'utente con possibile modifica

include("../html/top.html");
include_once("db.php");
include("carthtml.php");
include("../html/navbar.html");

ensure_logged_in();

if(!isset($_SESSION)){
    session_start();
}

get_user_info($_SESSION["username"]);

?>
<br>
<img src="../img/topburger.png" alt="TopBurger">

<div class ="fild" id="infouser">

    <p>First name: </p> <span><?=$_SESSION["firstname"]?></span>
    <br> <hr>
    <p>Last name:</p> <span> <?=$_SESSION["lastname"]?></span>
    <br> <hr>
    <p>Birthday: </p> <span><?=$_SESSION["age"]?></span>
    <br> <hr>
    <p>Email: </p> <span><?=$_SESSION["email"]?></span>
    <br> <hr>
    <p>Username: </p> <span><?=$_SESSION["username"]?></span>
    <br>

</div>



<button id="modify">Edit Information</button>

<div class="hiddenmodify" id="hiddenmodify" >
    <form action="user/modify.php" method="POST">
        <p>New Information</p>
        <p>Modify only interesed information</p>
        First name: <br> 
        <input type="text" name="firstname" id="firstname" placeholder="<?=$_SESSION["firstname"]?>"><br> <br>
        Last name: <br>
        <input type="text" name="lastname" id="lastname" placeholder="<?=$_SESSION["lastname"]?>"><br> <br>
        Email: <br> 
        <input type="email" id="email" name="email" placeholder="<?=$_SESSION["email"]?>"><br> <br>
        Password: <br>
        <input type="password" name="password" id="password" > <br> <br>
        Reapeat Password: <br>
        <input type="password" name="reppassword" ><br> <br>
        
        <button id="modifydb" type="submit">Change data</button>
        <br><br>

        
    </form>
    <button id="remove-account">Remove Account</button>
</div>
<img src="../img/bottomburger.png" alt="BottomBurger">

<div id="rem-account" class="modal" >
        <div class="modal-content">
            <p>Are you sure to delete this Account? :( </p>
        </div>
        <form action="user/removeAccount.php" method="post">
            <button type="submit" id="btnokk">OK</button>
        </form>
        <button type="submit" id="cancbtnrem">Cancel</button>
</div>

<div id="hiddenmsgfall" class="modal" >
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>The password must be the same</p>
    </div>
</div>
<div id="hiddenmsgok" class="modal" >
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Info changed</p>
    </div>
</div>
<div id="hiddenmsgempty" class="modal" >
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Empty fild, fill fields please</p>
    </div>
</div>
<div id="patternErr" class="modal" >
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>The Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</p>
    </div>
</div>
<div id="mailinvalid" class="modal" >
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Invalid email format</p>
    </div>
</div>
<div id="errname" class="modal" >
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Invalid name input format</p>
    </div>
</div>

<?php
unset($_SESSION["firstname"]);
unset($_SESSION["lastname"]);
unset($_SESSION["email"]);
unset($_SESSION["age"]);


include("../html/bottom.html");
?>
