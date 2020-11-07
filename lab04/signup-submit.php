<?php
include "top.html";

$nameUser = $_REQUEST["name"];
$newUser= $_REQUEST["name"].",".$_REQUEST["gender"].",".$_REQUEST["age"].",".strtoupper($_REQUEST["type"]).",".$_REQUEST["favoriteOS"].",".$_REQUEST["ageMin"].",".$_REQUEST["ageMax"]."\n";

$file = file("singles.txt");
$length = count($file);
$flag = true;

for ($i=0; $i < $length && $flag ; $i++) { 
	list($name, $sex, $age, $type, $os, $ageMin, $ageMax) = explode(",", $file[$i]);
    if($name == $nameUser){
    	$flag = false;
    }
}
if($flag){
	file_put_contents("singles.txt", $newUser, FILE_APPEND);
	?>
	<h2>Thank you!</h2>
	<p>
		Welcome to NerdLuv, <?=$nameUser?>! <br><br>
		Now <a href="matches.php">log in to see your matches!</a>
	</p>
<?php
}else{
	?>
	<h2 style="color:red">User alredy exist!</h2>
	<?php
}

?>

<?php include "bottom.html"; ?>