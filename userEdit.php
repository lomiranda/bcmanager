<?php

$userId = $_POST["editUserId"];
$newLogin = $_POST["editUserLogin"];
$newName = $_POST["editUserName"];
$newRole = $_POST["editUserRole"];
$newClient = $_POST["editUserClient"];
$newPass = $_POST["editUserPass"];

session_start();
$nameuser = $_SESSION['nameuser'];
$userMngmt_log = "./logs/userMngmt-" .  date("Ymd");
$date_now = date("H:i:s Y-m-d");
$log_message = "$nameuser falhou ao editar o usuário $newLogin às $date_now." . "\r";

$dbusername = "bcm_user";
$dbpw = "bcm@mp_92";
$dbhost = "10.209.8.251";
$dbquery = "SELECT count(*) AS dbcount FROM users WHERE id = '$userId'";
$dbselect = "SELECT login, name, role FROM users WHERE id = '$userId'";
$dbupdatelogin = "UPDATE users SET login = '$newLogin' WHERE id = '$userId'";
$dbupdatename = "UPDATE users SET name = '$newName' WHERE id = '$userId'";
$dbupdaterole = "UPDATE users SET role_id = '$newRole' WHERE id = '$userId'";
$dbupdateclient = "UPDATE users SET client_id = '$newClient' WHERE id = '$userId'";
$dbupdatepw = "UPDATE users SET pw = sha2('$newPass', 256) WHERE id = '$userId'";
$database = "bcmanager";

global $err_msg, $userId, $dbhost, $dbselect, $dbupdatelogin, $dbupdatename, $dbupdaterole, $dbupdatepw, $dbusername, $dbpw, $database, $dbquery;

$dbhandle = mysql_connect($dbhost, $dbusername, $dbpw);

if ($dbhandle){
  mysql_select_db($database,$dbhandle);
  $resultquery = mysql_query($dbquery);
  $row = mysql_fetch_array($resultquery);
  $dbcount = $row{'dbcount'};
  if ($dbcount !== "1"){
    echo "Usuário não encontrado na base de dados! Edição abortada.";
    mysql_close($dbhandle);
  } else {
    if ($newLogin != "" && (!empty($newLogin))){
      mysql_query($dbupdatelogin) or die(mysql_error());
    }
    if ($newName != "" && (!empty($newName))){
      mysql_query($dbupdatename) or die(mysql_error());
    }
    if ($newRole != "" && (!empty($newRole))){
      mysql_query($dbupdaterole) or die(mysql_error());
    }
    if ($newClient != "" && (!empty($newClient))){
      mysql_query($dbupdateclient) or die(mysql_error());
    }
    if ($newPass != "" && (!empty($newPass))){
      mysql_query($dbupdatepw) or die(mysql_error());
    }
    echo "Atributos do usuário alterados com sucesso!";
    $log_message = "$nameuser editou o usuário $newLogin às $date_now." . "\r";
  }
} else {
  $err_msg = "Erro ao se conectar a base de dados.";
  echo $err_msg;
}

file_put_contents("$userMngmt_log.log","$log_message",FILE_APPEND);

?>
