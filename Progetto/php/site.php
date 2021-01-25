
<?php
#Fabio De Palma
#pagina principale sito

include("../html/top.html");
include("db.php");

ensure_logged_in();

if (!isset($_SESSION)) { session_start(); }



include("carthtml.php");

?>

<?php
include("../html/navbar.html");


?>




<div class="menu" id= "menu">
    <h2>menu</h2>
    <div class="popup">
        <span class= "poputext">hamburger added to cart</span>
    </div>
    
    <?php
    $ingred = array("meat, salad, tomato, onion, pickle","meat, salad, tomato, onion, pickle, cheese","meat, salad, tomato, onion, pickle, bacon","meat, tomato, onion, pickle, cheese, bacon","chicken, salad, cheese, tzatziki","vegetables, garlic sauce, salad");
    $burgerName = array('C','C++','JAVA','JAVASCRIPT','PHP','HTML');
    $price = array('5€','5,50€','6€','6,50€', '5,50€', '4,50€');
    $img = array("../img/Hamburger.jpg", "../img/chese.jpg", "../img/Bacon.jpg", "../img/baconcheese.jpg", "../img/chickenl.jpg", "../img/veggy.jpg");



    ?>
    
    <div class="row">
        <?php
        for ($i=0; $i < 6 ; $i++) { 
        ?>
            <div class="column">
                <div class="card">
                    <div class="card-inner">
                        <div class="card-front">
                            <img src="<?=$img[$i]?>" alt="hamburger" >
                        </div>
                        
                        <div class="card-back">
                        
                            <span>
                                <?=$price[$i]?>
                            </span>

                            <h2>
                                
                                <?= $burgerName[$i] ?>
                            </h2>
            
                            <p>
                                <?= $ingred[$i] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </div>

    <img class="backgroundBar" src="../img/menu.jpg" alt="menu" >
    
</div>

<div class="traceus" id="traceus">

    <h2>Trace Us</h2>
    
    <div class="row-des">
        
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2817.7291430060486!2d7.685689877127433!3d45.07100532168351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47886d703ff69533%3A0x22ef78451aa2fa9b!2sMadama%20Palace!5e0!3m2!1sen!2sit!4v1609824200928!5m2!1sen!2sit"  allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

    </div>
    
    <ul id="info">
        <li>Hamburger IT</li>
        <li>Piazza Castello</li>
        <li>10122</li>
        <li>Torino</li>
        <li>TO</li>
        <li>Italia</li>
        <li>3334561234</li>
    </ul>
    
    
        
    <img class="backgroundBar" src="../img/menu.jpg" alt="menu">

</div>

<div class="aboutus" id="aboutus">
    <h2>About Us</h2>
    <div class="component">
        <p id="manager">General Manager</p>
        <p id="chef">Chef</p>
        <p id="hall">Hall Director</p>
        <p id="waiters">Waiters</p>

        <div class= "box" id="image-manager" >
            <img src="../img/aboutus/Joe_Bastianich.jpg" alt="Bastianich">

            <p class = "name">Joe Bastianich</p>
            <p class = "bio">General Manager</p> 
        </div>

        <div class= "box" id="image-chef">
            <div>
                <img src="../img/aboutus/chef.jpg" alt="Barbieri">
    
                <p class = "name">Bruno Barbieri</p>
                <p class = "bio">Master Chef</p> 
            </div>

            <div>
                <img src="../img/aboutus/chef2-Modifica.jpg" alt="Gentile">
        
                <p class = "name">Maria  <br> Gentile</p>
                <p class = "bio">Chef</p> 
            </div>
            
        </div>

        <div class="box" id="image-hall">
            <img src="../img/aboutus/halldirector.jpg" alt="Cannava">
    
            <p class = "name">Antonino Cannavacciuolo</p>
            <p class = "bio">Hall Director</p>
            <!-- <p id = "bio">tira schiaffi</p>  -->
        </div>

        <div class= "box" id="image-waiters">
            <div>
                <img src="../img/aboutus/waiter1.jpg" alt="Scorzese">
        
                <p class = "name">Teresa Scorzese</p>
                <p class = "bio">Main Waiter</p> 
            </div>
            
            <div>
                <img src="../img/aboutus/waiter2.jpg" alt="Galluzzo">
        
                <p class = "name">Michael Galluzzo</p>
                <p class = "bio">Waiter</p> 
            </div>

        </div>
        
    </div>
    
    <img class="backgroundBar" src="../img/menu.jpg" alt="menu" >
</div>


    

<?php
include("../html/bottom.html");
?>