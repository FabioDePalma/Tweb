
<?php
#Fabio De Palma
#pagina riguardante il carrello con tutti i dettagli sui panini che si stanno acquistando
include("../html/top.html");
include("db.php");
include("carthtml.php");

include("../html/navbar.html");
ensure_logged_in();

if (!isset($_SESSION)) { session_start(); }

?>

<div id="divcart">
        <h3>Cart</h3>
        

    </div>
    <div class="total-price">
        TOTAL: <span></span>

    </div>
    <button id="pay" type="submit">PAY</button>
    <button id="reset">RESET</button>

    <div id="hiddenmessage" class="modal" >
        <div class="modal-content">
        
            <p>you will be redirected to homepage</p>
        </div>
    </div>
    <div id="cartmsgerr" class="modal" >
        <div class="modal-content">
        <span class="close">&times;</span>
            <p>value Error</p>
        </div>
    </div>

    
    
    
</div>