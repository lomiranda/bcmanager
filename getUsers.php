<html>

<head>
	<script src="./js/routing.js"></script>
</head>

<table class="table table-bordered table-striped" style="text-align: center;">
	<!-- tr style="border-bottom:1pt solid black;" -->
	<tr>
		<td style="text-align: center;"><b>Login</b></td>
		<td style="text-align: center;"><b>Nome</b></td>
		<td style="text-align: center;"><b>Perfil</b></td>
		<td style="text-align: center;"><b>Client</b></td>
		<td style="text-align: center;"><b>Ações</b></td>
	</tr>

	<?php

	$dbusername = "bcm_user";
	$dbpw = "bcm@mp_92";
	$dbhost = "10.209.8.251";
	$dbquery = "SELECT u.id as id, u.name as name, u.login as login, r.role as role, c.name AS client
	FROM users u
	LEFT JOIN roles r ON u.role_id=r.id
	LEFT JOIN clients c ON u.client_id=c.id
	ORDER BY role, id";
	$database = "bcmanager";

	global $err_msg, $dbhost, $dbusername, $dbpw, $database, $dbquery;

	$dbhandle = mysql_connect($dbhost, $dbusername, $dbpw);

	if ($dbhandle){
		mysql_select_db($database,$dbhandle);
		$resultquery = mysql_query($dbquery);
		while ($row = mysql_fetch_array($resultquery)) {
			echo "<tr>";
			echo "<td>" . $row{'login'} . "</td>";
			echo "<td>" . $row{'name'} . "</td>";
			echo "<td>" . $row{'role'} . "</td>";
			echo "<td>" . utf8_encode($row{'client'}) . "</td>";
			echo "<td><a href='#'><i id='editUserBtn' class='fa fa-2x fa-fw fa-pencil text-primary'
			onclick='showEdit(" . $row{'id'} . ")' value='Editar Usuario'></i></a>
			<a href='#'><i id='delUserBtn' class='fa fa-2x fa-fw fa-close text-primary'
			onclick='delUser(\"" . $row{'login'} . "\")' value='Remover Usuario'></i></a>
			</td>";
			echo "</tr>";
		}
		mysql_close($dbhandle);
	} else {
		$err_msg = "Erro ao se conectar a base de dados.";
		echo $err_msg;
	}

	?>
</table>

<a href="#"><i id='cnclBtn' name='cancel button' class='fa fa-3x fa-arrow-left fa-fw text-primary'></i></a>

<script>
$('#loading').hide();
</script>

</html>
