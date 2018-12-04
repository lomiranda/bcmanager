<!doctype html public "-//w3c//dtd html 4.0 transitional//en">

<html>
<body>

	<?php


	$username = $_POST["username"];
	$userpw = $_POST["passwd"];

	$dbusername = "bcm_user";
	$dbpw = "bcm@mp_92";
	$dbhost = "10.209.8.251";
	$dbquery = "SELECT count(*) AS dbcount FROM users WHERE login = '$username' AND pw = sha2('$userpw', 256)";
	$namequery = "SELECT u.name AS name, r.role AS role, c.drive as client
	FROM users u
	LEFT JOIN roles r ON u.role_id=r.id
	LEFT JOIN clients c ON u.client_id=c.id
	WHERE login = '$username'";
	$database = "bcmanager";


	global $err_msg, $username, $userpw, $dbhost, $dbusername, $dbpw, $database, $dbquery;

	$dbhandle = mysql_connect($dbhost, $dbusername, $dbpw);

	if ($dbhandle){
		$selected = mysql_select_db($database,$dbhandle);
		$result = mysql_query($dbquery);
		while ($row = mysql_fetch_array($result)) {
			$dbcount = $row{'dbcount'};
		}
		if ($dbcount == "1"){
			$resultname = mysql_query($namequery);
			$rowname = mysql_fetch_array($resultname);
			$nameuser = $rowname{'name'};
			$roleuser = $rowname{'role'};
			$clientuser = $rowname{'client'};
			session_start();
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['nameuser'] = $nameuser;
			$_SESSION['roleuser'] = $roleuser;
			$_SESSION['clientuser'] = $clientuser;
			$_SESSION['password'] = $_POST['passwd'];
			mysql_close($dbhandle);
			$access_log = "./logs/access_bc-" .  date("Ymd");
			$date_now = date("H:i:s Y-m-d");
			file_put_contents("$access_log.log","$nameuser entrou com perfil $roleuser e permissão aos clientes $clientuser às $date_now." . "\n",FILE_APPEND);
			header("Location: ./bcmanager.php");
		}  else {
			header("Location: ./index.php?LoginFailed");
			mysql_close($dbhandle);
		}
	} else {
		$err_msg .= " Could not connect to BC Manager database.";
		mysql_close($dbhandle);
	}

	echo "<script type='text/javascript'>
	if (window.confirm('$err_msg')){
		window.location.replace('./index.php?ServerFail');
	} else {
		window.location.replace('./index.php?ServerFail');
	};
	</script>";

	?>

</body>
</html>
