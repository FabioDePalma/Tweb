
<?php
#Fabio De Palma
#pagina di registrazione 
include("../html/top.html");
if (!isset($_SESSION)) { session_start(); }




?>
<img src="../img/topburger.png" alt="TopBurger">

      <div id="err">  </div>

<div class="fild">

    <form action="signup.php" method="post">
        <fieldset>
            <legend>REGISTRATION</legend>
            First name: <br> 
            <input type="text" name="firstname" id="firstname" required><br> <br>
            Last name: <br>
            <input type="text" name="lastname" id="lastname" required><br> <br>
            Birthday: <br>
            <input type="date" name="age" id="age"> <br> <br>
            Email: <br> 
            <input type="email" id="email" name="email" placeholder="example@example.com" required><br> <br>
            Username: <br>
            <input type="text" name="username" id="username" required> <br> <br>
            Password: <br>
            <input type="password" name="password" id="password" required > <br> <br>
            Repeat Password: <br>
            <input type="password" name="reppassword" required > <br> <br>
            <button type="submit" id="signin-btn">Submit</button>
            <button type="reset">Reset</button>
            <br><br>
            Already have an account? <a href="../index.php">Log In</a>
        </fieldset>
    </form>
   
</div>
<img src="../img/bottomburger.png" alt="BottomBurger">