<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">
	<link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css"
	rel="stylesheet" type="text/css">

	<link rel="stylesheet" type="text/css" href="css/table.css" />
	<script src="./js/routing.js"></script>

</head>

<form id="searchJob">

	<table id="srchTbl">

		<tr>
			<td>
				Data de Inicio:
				<input id="startDate" type="text" name="Data de Inicio">
			</td>
			<td>
				Data de Termino:
				<input id="endDate" type="text" name="Data de Termino">
			</td>
			<td>
				Nível:
				<select id="jobLvl" name="jobLevel" form="searchJob">
					<option value="todos" selected>Todos</option>
					<option value="F">Full</option>
					<option value="D">Differential</option>
					<option value="I">Incremental</option>
				</select>
			</td>
			<td>
				Status:
				<select id="jobStts" name="jobStatus" form="searchJob">
					<option value="todos" selected>Todos</option>
					<option value="A">Abortado</option>
					<option value="f">Erro</option>
					<option value="R">Em Execucao</option>
					<option value="T">Finalizado com Sucesso</option>
				</select>
			</td>
			<td>
				Localidade:
				<select id="jobClnt" name="jobClient" form"searchJob">
					<?php
					session_start();
					$dbusername = "bcm_user";
					$dbpw = "bcm@mp_92";
					$dbhost = "10.209.8.251";
					if($_SESSION['clientuser'] == "Todas Regionais" || $_SESSION['clientuser'] == "todos"){
						$dbquery = "SELECT drive, name FROM clients";
					} else {
						$dbquery = "SELECT drive, name FROM clients WHERE drive LIKE '" . $_SESSION['clientuser'] . "'";
					}
					$database = "bcmanager";

					global $err_msg, $dbhost, $dbusername, $dbpw, $database, $dbquery;
					$dbhandle = mysql_connect($dbhost, $dbusername, $dbpw);

					if ($dbhandle){
						mysql_select_db($database,$dbhandle);
						$resultquery = mysql_query($dbquery);
						while ($row = mysql_fetch_array($resultquery)) {
							echo "<option value='" . $row{'drive'} . "'>" . utf8_encode($row{'name'}) . "</option>";
						}
						mysql_close($dbhandle);
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" id="btnRunReport" value="Gerar Relatorio" onclick="runReport()" style="margin-top: 5px;"/>
			</td>
		</tr>
	</table>
</form>

<div id="reportResult" style="margin-top: 20px;">
	<div style="height: 43%;"></div>
</div>

<script language="javascript" type="text/javascript">
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1;
var yyyy = today.getFullYear();

if(dd<10) {
	dd='0'+dd
}

if(mm<10) {
	mm='0'+mm
}

today = dd+'/'+mm+'/'+yyyy;

$(document).ready(function(){
	$('#startDate').val(today);
	$('#endDate').val(today);
})
</script>

</html>
