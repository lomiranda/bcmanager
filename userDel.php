<?php

$userLogin = $_POST["userLogin"];

session_start();
$nameuser = $_SESSION['nameuser'];
$userMngmt_log = "./logs/userMngmt-" .  date("Ymd");
$date_now = date("H:i:s Y-m-d");
$log_message = "$nameuser falhou ao remover o usuário $userLogin às $date_now." . "\r";

$dbusername = "bcm_user";
$dbpw = "bcm@mp_92";
$dbhost = "10.209.8.251";
$dbquery = "SELECT count(*) AS dbcount FROM users WHERE login = '$userLogin'";
$dbselect = "SELECT login, name, role FROM users WHERE login = '$userLogin'";
$dbremove = "DELETE FROM users WHERE login = '$userLogin'";
$database = "bcmanager";

global $err_msg, $userLogin, $dbhost, $dbselect, $dbremove, $dbusername, $dbpw, $database, $dbquery;

$dbhandle = mysql_connect($dbhost, $dbusername, $dbpw);

if ($dbhandle){
	mysql_select_db($database,$dbhandle);
	$resultquery = mysql_query($dbquery);
	$row = mysql_fetch_array($resultquery);
	$dbcount = $row{'dbcount'};
	if ($dbcount !== "1"){
		echo "Usuario nao encontrado na base de dados! Remocao abortada.";
		mysql_close($dbhandle);
	} else {
		mysql_query($dbremove) or die(mysql_error());
		$resultselect = mysql_query($dbselect);
		$rowresult = mysql_fetch_array($resultselect);
		$resultquery = mysql_query($dbquery);
		$row2 = mysql_fetch_array($resultquery);
		$dbcount2 = $row2{'dbcount'};
		if ($dbcount2 == "0"){
			echo "Usuario " . $userLogin . " removido com sucesso!";
			mysql_close($dbhandle);
			$log_message = "$nameuser removeu o usuário $userLogin às $date_now." . "\r";
		} else {
			// echo "A remocao do usuario " . $userLogin . " falhou!";
			echo $rowresult{'login'};
			echo $dbcount2;
			mysql_close($dbhandle);
		}
	}
} else {
	$err_msg = "Erro ao se conectar a base de dados.";
	echo $err_msg;
}

file_put_contents("$userMngmt_log.log","$log_message",FILE_APPEND);

?>
