
<?php
# Fabio De Palma


   # questo file serve per fare il totale e assicurarsi che nessuno modifichi la localstorage
require_once("../db.php");


$cart = json_decode($_POST["cart"]);
$total = 0;


foreach ($cart as $key => $value) {
    $singleprice;
    $quantity = $value -> quantity;
    if($quantity < 0){
        die(json_encode(array("total"=>"false")));
    }
    switch ($key) {
        case 'C':
            $singleprice = 5;
            break;
        case 'C++':
            $singleprice = 5.5;
            break;
        case 'JAVA':
            $singleprice = 6;
            break;
        case 'PHP':
            $singleprice = 5.5;
            break;
        case 'JAVASCRIPT':
            $singleprice = 6.5;
            break;
        case 'HTML':
            $singleprice = 4.5;
            break;
                
                                
        default:
            $singleprice = 6;
            break;
    }
    
    $total += $singleprice * $quantity;
}


echo json_encode(array("total"=>$total));


?>