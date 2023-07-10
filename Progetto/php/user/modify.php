
<?php
#Fabio De Palma
#questo file serve per fare tutti i controlli sulla modifica di informazioni degli account
include_once("../db.php");
if(isset($_POST)){
    $newInfo = json_decode($_POST["info"], true);

    if($newInfo["password"] == $newInfo["repeatpassword"]){
        $password = $newInfo["password"];
        if($password != ""){
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number = preg_match('@[0-9]@', $password);
            if(!$uppercase || !$lowercase || !$number || strlen($password) < 8){
                die(json_encode(array("errorpassword"=>"pattern")));

            }
        }
        $email = $newInfo["email"];
        if($email != ""){
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                die(json_encode(array("errmail"=>"true")));
            }
        }
        $name = $newInfo["first_name"];
        if($name != ""){
            $name = preg_match('/^[a-zA-Z]+$/', $name);
            if(!$name){
                die(json_encode(array("errname"=>"true")));

            }
        }
        $lastname = $newInfo["last_name"];
        if($lastname != ""){
            $lastname = preg_match('/^[a-zA-Z]+$/', $lastname);
            if(!$lastname){
                die(json_encode(array("errlastname"=>"true")));

            }
        }
        
        $dainserire = array();
        foreach($newInfo as $key => $info){
            if($info != ""){//voglio cambiare info 
                
                $dainserire["$key"] = $info;
                
            }
        }
        
    }else{
        die(json_encode(array("errorpassword"=>"true")));
    }
    if(empty($dainserire)){
        die(json_encode(array("errorpassword"=>"empty")));

    }
    modify_info($dainserire);
    
    
}else{
    //////
}




?>
