

<?php
#Fabio De Palma


    #questo file serve per controllare se nel database è presente il nome dell'hamburger personalizzato

include_once("../db.php");
$id = get_id();

if(isset($_REQUEST["remove"])){
    removeBurgher($id,$_REQUEST["remove"]);

}else{

    $name = $_POST["name"];
    if($name == ""){

    }else{
        
        if(hamburger_alredy_exist($id, $name)){
            die(json_encode(array('add'=>'false')));
            
        }else{
            
    
            $ingredients = json_decode($_POST["result"], true);
            if(count($ingredients) <= 0){
                die(json_encode(array('add'=>'ing')));
            }
            for ($i=0; $i < count($ingredients); $i++) { 
                $ingredients[$i] = str_replace('_', ' ', $ingredients[$i]);
            }
            $ing = implode(", ", $ingredients);
            insert_name_of_hamburger($id, $name, $ing);
            echo json_encode(array('add'=>'true'));
        }

        
    }
    
    
}



?>