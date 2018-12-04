<?php

$userId = $_POST["editUserId"];

$dbusername = "bcm_user";
$dbpw = "bcm@mp_92";
$dbhost = "10.209.8.251";
$dbquery = "SELECT u.login AS login, u.name AS name, r.role AS role, c.id AS client
FROM users u
LEFT JOIN roles r ON u.role_id=r.id
LEFT JOIN clients c ON u.client_id=c.id
WHERE u.id = '$userId'";
$database = "bcmanager";

global $err_msg, $userId, $dbhost, $dbselect, $dbupdate, $dbusername, $dbpw, $database, $dbquery;

$dbhandle = mysql_connect($dbhost, $dbusername, $dbpw);

if ($dbhandle){
  mysql_select_db($database,$dbhandle);
  $resultquery = mysql_query($dbquery);
  $row = mysql_fetch_array($resultquery);
  echo "<script>
  $('#newLogin').val('" . $row{'login'} . "');
  $('#newName').val('" . $row{'name'} . "');
  document.getElementById('newRole" . $row{'role'} . "').checked = true;
  var dropClient = document.getElementById('newClient');
  var opts = dropClient.options.length;
  for (var i=0; i<opts; i++){
    if (dropClient.options[i].value ==" . $row{'client'} . "){
      dropClient.options[i].selected = true;
      break;
    }
  }
  </script>";
  mysql_close($dbhandle);
} else {
  $err_msg = "Erro ao se conectar a base de dados.";
  echo $err_msg;
}

?>
