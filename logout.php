<?php
session_start();
if(isset($_SESSION['nameuser']))
unset($_SESSION['nameuser']);
if(isset($_SESSION['username']))
unset($_SESSION['username']);
if(isset($_SESSION['password']))
unset($_SESSION['password']);
if(isset($_SESSION['roleuser']))
unset($_SESSION['roleuser']);
if(isset($_SESSION['clientuser']))
unset($_SESSION['clientuser']);
?>

<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
	<title>Logout - Renegociacao de LDAP</title>
	<link rel="shortcut icon" href="_src/fav_ldap.png"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="generator" content="editplus">
	<meta name="author" content="Lucas de Oliveira Miranda">
	<!-- meta http-equiv="refresh" content="1;url=./index.php" / -->

	<link rel="stylesheet" type="text/css" href="./css/text.css">

	<script src="./js/jquery-1.10.2.js"></script>
	<script src="./js/jquery-ui.js"></script>

</head>
<body>
	<!-- div class="container-fluid">
	<div class="row">
	<div>
	<span class="logoutMsg" style="width: 100%; text-align: center;">Sua sessão foi encerrada com sucesso!</span>
</div>
<br>
<br>
<br>
<br>
<img class="imgLogout" src="_img/logo_central.png" alt="" />
</div>
</div -->
</body>
</html>
