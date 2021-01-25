

<?php
#Fabio De Palma
# pagina di creazione dei panini personalizzati e lista dei panini personali

include("../html/top.html");
include_once("db.php");

ensure_logged_in();

include("carthtml.php");


?>

<?php
include("../html/navbar.html");

$ingredients = array("salad", "meat", "pickle", "ketchup", "bacon", "egg", "pineapple", "cheddar", "onion", "pickle_sauce", "gouda", "tomato", "mushroom", "grilled_peppers");

?>
<div id="ing">


    <?php
    for ($i=0; $i < count($ingredients); $i++) { 
        ?>
        <button class = "ingredients" id=<?=$ingredients[$i]?>>
        <?=strtoupper($ingredients[$i])?>
        </button>
        <?php
    }
    ?>
</div>

<div class="makehamburger">
    <img src="../img/topburger.png" alt="">
    <div class="nelpanino">
        <?php
        for ($i=0; $i < count($ingredients); $i++) { 
            ?>
            <p class="setting" id=<?=$ingredients[$i]?> >
                <?=strtoupper($ingredients[$i])?>
            </p>
        <?php
        }
        ?>

    </div>
    <img src="../img/bottomburger.png" alt="">
</div>
<br>
<br>

<form class= namehamburger action="user/check_burger.php" method="POST">
    <fieldset id="namehamburger">
        <legend>name of hamburger</legend>
        <input type="text" name="namehmbg" pattern=".{1,}" required>

        <input id="btn" type="submit" value="add">
    </fieldset>
</form>


<div id="hiddenmsg" class="modal" >
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>the hamburger has been added</p>
    </div>
</div>
<div id="hiddenmsgNoAdd" class="modal" >
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>the name of hamburger alredy exists, it will not be added</p>
    </div>
</div>
<br><br>
<div class="popup">
    <span class= "poputext">hamburger added to cart</span>
</div>
<button class="mylist">My List</button>
<div class="list">
    <?php
    $ing = get_list_hamburger();
    
    for ($in=0; $in < count($ing) ; $in++) { 
        ?>
        <br>
        <h3>
        <?php
        
            echo $a=$ing[$in]["name"];
            echo ":"
        ?>
        </h3>
        <p>
        <?php
        
            echo $ing[$in]["ingredients"].".";
        ?>

        </p>
        <span class="delete" id="<?=$a?>">
            <button type="submit" title="REMOVE HAMBURGER">&times;</button>

        </span>
        
        <br>
       
    <?php


    }
    ?>

</div>

<div id="hiddenmsgrem" class="modalrem" >
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>The hamburger has been removed</p>
    </div>
</div>

<div id="msging" class="modalrem" >
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>The hamburger must contain at least 1 ingredients</p>
    </div>
</div>


<?php
include("../html/bottom.html");
?>