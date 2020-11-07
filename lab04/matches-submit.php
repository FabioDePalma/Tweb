<?php include "top.html"; ?>


<?php

$user = $_REQUEST["name"];

$file = file("singles.txt");
$length = count($file);
for ($i=0; $i < $length ; $i++) { 
    list($name, $sex, $age, $type, $os, $ageMin, $ageMax) = explode(",", $file[$i]);
    if($name == $user){
    break;
    }
}

?>

<h3>Matches for <?=$name?></h3>

<?php

for ($i=0; $i < $length ; $i++) { 
    list($nameMa, $sexMa, $ageMa, $typeMa, $osMa,) = explode(",", $file[$i]);
    if($sexMa != $sex){
        if($ageMa >= $ageMin && $ageMa <= $ageMax ){
            if($os == $osMa){
                $typeUser = str_split($type);
                $typeMatch = str_split($typeMa);
                $flag = true;
                for ($j=0; $j < 4 && $flag; $j++) { 
                    if($typeUser[$j] == $typeMatch[$j]){
                        $flag = false;
                        ?>
                        
                        
                        <div class = "match">
                            
                        
                            <p>
                                
                            <img src="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/4/user.jpg" alt="user">

                            <?=$nameMa?> 
                                    
                            </p>

                            <ul>
                                
                                <li><strong>gender: </strong> <?=$sexMa?> </li>
                                <li><strong>age: </strong> <?=$ageMa?> </li>
                                <li><strong>type: </strong> <?=$typeMa?> </li>
                                <li><strong>OS: </strong> <?=$osMa?> </li>
                                
                            </ul>
                            
                            
                        </div>

                        <?php
                    }
                }
            }
        }
    }
}



?>

<?php include "bottom.html"; ?>