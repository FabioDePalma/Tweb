
<div id="game">

</div>

<div id="cart" >
    <i  class='fa fa-shopping-cart'></i>
</div>
<div class= "user">
    <i class="far fa-address-card" > </i>
    <span id="informa"><?=$_SESSION["username"]?></span>
    <input type="submit" value="Disconnect" id="logout">
</div>
<div id="hid" class="modal" >
        <div class="modal-content">
            <p>if you log out you will lose the items in the cart </p>
        </div>
        <form action="user/logout.php" method="post">
            <button type="submit" id="btnok">OK</button>
        </form>
        <button type="submit" id="cancbtn">Cancel</button>
</div>

<div class="cart">


</div>