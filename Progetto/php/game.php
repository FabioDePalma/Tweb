
<?php
#Fabio De Palma
#game memory in questa pagina è possibile giocare al gioco delle carte memory
include("../html/top.html");
include_once("db.php");

ensure_logged_in();

include("carthtml.php");
include("../html/navbar.html")
?>


<br><br>
<button id="button-start">START GAME</button>
<div id= "time">
        Time:
    
    <div id="countdown">
        
        <span>
            45
        </span>
    </div>
</div>

<div class="cardgame">

</div>
<br><br>

<div id="gameWin" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>You Win...</p>
    </div>
</div>

<div id="gameLost" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>You lose...</p>
    </div>
</div>

