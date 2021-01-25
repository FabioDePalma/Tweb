
<?php
#Fabio De Palma
#questo file serve per fare tutti i controlli in fase di registrazione
require_once("../db.php");

$newUser = json_decode($_POST["info"], true);

$firstname = $newUser["firstname"];
$lastname = $newUser["lastname"];
$birthday = $newUser["age"];
$email = $newUser["email"];
$username = $newUser["username"];
$password = $newUser["password"];
$reppassword = $newUser["repeatpassword"];

if( !empty($firstname) && !empty($lastname) && !empty($birthday) && !empty($email) && !empty($username) && !empty($reppassword) ){
    if($password != $reppassword){
        die(json_encode(array("errorpassword"=>"true")));

    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die(json_encode(array("errmail"=>"true")));
        
    }
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);

    $testName = preg_match('/^[a-zA-Z]+$/', $firstname);
    $testFirstname = preg_match('/^[a-zA-Z]+$/', $lastname);

    if(!$testName || !$testFirstname){
        die(json_encode(array("errorname"=>"pattern")));
    }

    if(!$uppercase || !$lowercase || !$number || strlen($password) < 8){
        die(json_encode(array("errorpassword"=>"pattern")));
    }
    if(!is_username_duplicate($username)){
        new_user($firstname,$lastname,$birthday,$email,$username,$password);
        $_SESSION["username"] = $username;
        echo json_encode(array("errorpassword"=>"false"));
        
    }
}else{
    die(json_encode(array("errorpassword"=>"empty")));
}
   


?>