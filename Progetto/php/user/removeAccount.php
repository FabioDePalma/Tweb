
<?php
#Fabio De Palma
#questo file rimuove l'account e i rispettivi panini dal database
require_once("../db.php");
$id = get_id();
remove_account($id);
include("logout.php");
?>