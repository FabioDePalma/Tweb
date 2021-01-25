
<?php
#Fabio De Palma

#questo file serve per comunicare con il database, tutte le funzioni che comunicano con il database si trovano in questa pagina

$dbconnstring = 'mysql:dbname=hamburger;host=localhost:3306';
$dbuser = 'root';
$dbpasswd = '';

if (!isset($_SESSION)) { session_start(); }

function is_password_correct($name, $password) {
    $db = open_db();
    $name = $db->quote($name);
    $rows = $db->query("SELECT password FROM users WHERE username=$name");
    $criptPw = md5($password);
    if ($rows) {
      foreach ($rows as $row) {
        $correct_password = $row["password"];
        return $criptPw === $correct_password; #user found return true
      }
    } else {
      return FALSE;   # user not found
    }
}


# Redirects if user is not logged in.
function ensure_logged_in() {
  

  if (!isset($_SESSION["username"])) {
    header("Location: ../index.php");
  }
}
/**
 * @param string $username
 * @return true if username exist
 */

function is_username_duplicate($username){
  $db = open_db();
  $username = $db->quote($username);
  $rows = $db->query("SELECT username FROM users WHERE username=$username");
  $exist = $rows->rowCount(); // return number of rows
  if($exist){
    return TRUE;
  }else{
    return FALSE;
  }

}

/**
 * @param string $firstname, $lastname,$age,$email,$username,$password
 * insert new user in to database hamburger.users 
 * 
 */
function new_user($firstname, $lastname,$age,$email,$username,$password){
  $db = open_db();
  $password = md5($password);
  $firstname = $db->quote($firstname);
  $lastname = $db->quote($lastname);
  $email = $db->quote($email);
  $username = $db->quote($username);
  

  $db -> query("INSERT INTO users (id, first_name, last_name, age, email, username, password) VALUES (NULL, $firstname, $lastname, '$age', $email, $username, '$password')");
}
/**
 * @return PDO
 */
function open_db(){
  global $dbconnstring, $dbuser, $dbpasswd;
  $db = new PDO($dbconnstring, $dbuser, $dbpasswd);
  $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $db;
}
/**
 * @return number id
 */
function get_id(){
  $db = open_db();
  $username = $_SESSION["username"];
  $username = $db->quote($username);
  $rows = $db->query("SELECT id FROM users WHERE username=$username");
  
  return $rows->fetchColumn();
}

/**
 * @param number $id
 * @param string $hamname, $ingredients
 * insert new hamburgername into database hamburger.name_burger
 * 
 */
function insert_name_of_hamburger($id, $hamname, $ingredients){
  $db = open_db();
  $hamname = $db->quote($hamname);
  $db -> query("INSERT INTO name_burger (id, name, ingredients) VALUES ('$id', $hamname, '$ingredients' )");

}
/**
 * @return array $rows[n][id, name_hamburger, ingredients]
 * 
 */
function get_list_hamburger(){
  $db = open_db();
  $id = get_id();
  $rows = $db-> query("SELECT id, name, ingredients FROM name_burger WHERE id=$id ");

  $rows =  $rows->fetchAll(PDO::FETCH_ASSOC);
  return $rows;

}

/**
 * @param number $id
 * @param string $hamname
 * remove specific personal hamburger into database hamburger.name_burger 
 */
function removeBurgher($id, $hamname){
  $db = open_db();
  $hamname = $db->quote($hamname);
  $db->query("DELETE FROM name_burger WHERE name=$hamname AND id=$id");
}
/**
 * @param string $username
 * take all info users and store in to session
 */
function get_user_info($username){
  $db = open_db();
  $username = $db->quote($username);
  $rows = $db->query("SELECT id, first_name, last_name, age, email, username, password FROM users WHERE username=$username");
  
  foreach ($rows as $row) {
    $_SESSION["firstname"] = $row["first_name"];
    $_SESSION["lastname"] = $row["last_name"];
    $_SESSION["email"] = $row["email"];   
    $_SESSION["age"] = $row["age"];
  }
  
}

/**
 * @param array $dainserire[firstname->admin, lastname->admin]
 */
function modify_info($dainserire){
  $db = open_db();
  $query = "UPDATE users SET ";

  foreach($dainserire as $key => $val){
    if($key == "password"){
      $val = md5($val);
    }
    if($key == "repeatpassword"){
      break;
    }
    $val = $db->quote($val);
    $query .= $key ." = ".$val.", ";
  }
  $username = $db->quote($_SESSION["username"]);
  $queryy = rtrim($query, ", ");
  $queryy .= " WHERE users.username = ". $username;
  $test = 1;
  $db->query($queryy);
  echo json_encode(array('errorpassword'=>'false'));

}
/**
 * @param number %id
 * @param string $namehamburger
 * @return true if hamburger name with specifid id exist
 */
function hamburger_alredy_exist($id, $namehamburger){
  $db = open_db();
  $namehamburger = $db->quote($namehamburger);
  $rows = $db->query("SELECT * FROM name_burger WHERE id=$id AND name=$namehamburger");
  $rows =  $rows->fetchAll(PDO::FETCH_ASSOC);
  if(count($rows) > 0){//il panino esiste
    return true;
  }else{
    return false;
  }
}
/**
 * @param number $id
 * 
 */

function remove_account($id){
  $db = open_db();
  $db->query("DELETE FROM users WHERE users.id = $id");
  $db->query("DELETE FROM name_burger WHERE id = $id");
}



?>
