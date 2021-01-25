
<?php
#Fabio De Palma
#questo file serve per controllare se l'username c'è nel database
include_once("../db.php");

$info = json_decode($_POST["info"], true);
$name = $info["username"];
$password = $info["password"];
if($name == "" || $password == ""){
    die(json_encode(array("empty"=>"true")));// field empty
}else{
    if (is_password_correct($name, $password)) {
        if(!isset($_SESSION)){
            session_start();
        }
        $_SESSION["username"] =$name;
        echo json_encode(array("ok"=>"true"));
    }else{
        echo json_encode(array("errUserOrPass"=>"true"));
    }
}




?>