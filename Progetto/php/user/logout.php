
<?php
#Fabio De Palma
#questo file serve per cancellare la sessione di un utente quando si disconnette
require_once("../db.php");
session_unset();
session_destroy();
//svuoto $_SESSION
session_start();
$_SESSION["logout"] = "Logout successful.";
header("Location: ../../index.php");
?>