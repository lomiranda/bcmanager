<?php

$newUserName = $_POST["newUserName"];
$newUserLogin = $_POST["newUserLogin"];
$newUserRole = $_POST["newUserRole"];
$newUserClient = $_POST["newUserClient"];
$newUserPwd = $_POST["newUserPwd"];

session_start();
$nameuser = $_SESSION['nameuser'];
$userMngmt_log = "./logs/userMngmt-" .  date("Ymd");
$date_now = date("H:i:s Y-m-d");
$log_message = "$nameuser falhou ao criar o usuário $newUserLogin às $date_now." . "\r";

$dbusername = "bcm_user";
$dbpw = "bcm@mp_92";
$dbhost = "10.209.8.251";
$dbquery = "SELECT count(*) AS dbcount FROM users
						WHERE login = '$newUserLogin' AND pw = sha2('$newUserPwd', 256)";
$dbinsert = "INSERT INTO users (login, pw, name, role_id, client_id)
							VALUES ('$newUserLogin', sha2('$newUserPwd', 256), '$newUserName', '$newUserRole', '$newUserClient')";
$database = "bcmanager";

global $err_msg, $newUserLogin, $newUserPwd, $dbhost, $newUserName, $newUserRole, $dbusername, $dbpw, $database, $dbquery;

$dbhandle = mysql_connect($dbhost, $dbusername, $dbpw);

// echo '<script language="javascript" type="text/javascript">alert("Entrou na pagina");</script>';

if ($dbhandle){
	mysql_select_db($database,$dbhandle);
	$resultquery = mysql_query($dbquery);
	while ($row = mysql_fetch_array($resultquery)) {
		$dbcount = $row{'dbcount'};
	}
	if ($dbcount >= "1"){
		echo "Usuario ja existente no sistema! Cadastro abortado.";
		mysql_close($dbhandle);
	} else {
		mysql_query($dbinsert);
		$resultquery = mysql_query($dbquery);
		while ($row = mysql_fetch_array($resultquery)) {
			$dbcount = $row{'dbcount'};
		}
		if ($dbcount == "1"){
			echo "Usuario " . $newUserLogin . " criado com sucesso!";
			mysql_close($dbhandle);
			$log_message = "$nameuser criou o usuário $newUserLogin às $date_now." . "\r";
		} else {
			//echo "A criacao do usuario falhou!";
			echo "$dbinsert";
			mysql_close($dbhandle);
		}
	}
} else {
	$err_msg = "Erro ao se conectar a base de dados.";
	echo $err_msg;
}

file_put_contents("$userMngmt_log.log","$log_message",FILE_APPEND);

?>
