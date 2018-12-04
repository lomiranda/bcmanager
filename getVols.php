<html>

<?php
$regional = $_POST['volReg'];

$dbusername = "bcm_user";
$dbpw = "bcm@mp_92";
$dbhost = "10.209.8.251";
$database = "bacula";

$selectDaily = "select 
convert(m.VolumeName using utf8) as Volume,
VolStatus AS Status, convert(p.Name USING utf8) as PoolName,
CONCAT (TRUNCATE(VolBytes div 1024 DIV 1024 / 1024,2), ' GB') as Used,
convert(m.MediaType USING utf8) as MediaType,
FirstWritten, LastWritten, LabelDate, VolMounts, VolJobs as JobsDone
from Media m
JOIN Pool p
on m.PoolId = p.PoolId
where p.Name LIKE '%" . $regional . "%Diario'
ORDER BY m.VolumeName;";

$selectWeekly = "select 
convert(m.VolumeName using utf8) as Volume,
VolStatus AS Status, convert(p.Name USING utf8) as PoolName,
CONCAT (TRUNCATE(VolBytes div 1024 DIV 1024 / 1024,2), ' GB') as Used,
convert(m.MediaType USING utf8) as MediaType,
FirstWritten, LastWritten, LabelDate, VolMounts, VolJobs as JobsDone
from Media m
JOIN Pool p
on m.PoolId = p.PoolId
where p.Name LIKE '%" . $regional . "%Semanal'
ORDER BY m.VolumeName;";

$selectMonthly = "select 
convert(m.VolumeName using utf8) as Volume,
VolStatus AS Status, convert(p.Name USING utf8) as PoolName,
CONCAT (TRUNCATE(VolBytes div 1024 DIV 1024 / 1024,2), ' GB') as Used,
convert(m.MediaType USING utf8) as MediaType,
FirstWritten, LastWritten, LabelDate, VolMounts, VolJobs as JobsDone
from Media m
JOIN Pool p
on m.PoolId = p.PoolId
where p.Name LIKE '%" . $regional . "%Mensal'
ORDER BY m.VolumeName;";

$selectYearly = "select 
convert(m.VolumeName using utf8) as Volume,
VolStatus AS Status, convert(p.Name USING utf8) as PoolName,
CONCAT (TRUNCATE(VolBytes div 1024 DIV 1024 / 1024,2), ' GB') as Used,
convert(m.MediaType USING utf8) as MediaType,
FirstWritten, LastWritten, LabelDate, VolMounts, VolJobs as JobsDone
from Media m
JOIN Pool p
on m.PoolId = p.PoolId
where p.Name LIKE '%" . $regional . "%Anual'
ORDER BY m.VolumeName;";

global $err_msg, $userLogin, $dbhost, $selectDaily, $selectWeekly, $selectMonthly, $selectYearly, $dbusername, $dbpw, $database;

$dbhandle = mysql_connect($dbhost, $dbusername, $dbpw);

if ($dbhandle){

	mysql_select_db($database,$dbhandle);
        $resultDaily = mysql_query($selectDaily);
        $resultWeekly = mysql_query($selectWeekly);
        $resultMonthly = mysql_query($selectMonthly);
        $resultYearly = mysql_query($selectYearly);

	echo"<p><table style='table-layout: auto; border: 2px solid #ccc; width: 100%; height: 50px;'>
		 <tr>
		  <h2>Pool Diario</h2>
		 </tr>
		<tr style='border-bottom:1pt solid black;'>
		  <td><b>Volume</b></td>
		  <td><b>Status</b></td>
		  <td><b>Used</b></td>
		  <td><b>MediaType</b></td>
		  <td><b>FirstWritten</b></td>
		  <td><b>LastWritten</b></td>
		  <td><b>LabelDate</b></td>
		  <td><b>VolMounts</b></td>
		  <td><b>JobsDone</b></td>
		 </tr>\n";

	while ($row = mysql_fetch_array($resultDaily)){
		echo "<tr style='border-bottom:1pt solid #ccc;'>";
		echo "<td>" . $row{'Volume'} . "</td>\n";
		echo "<td>" . $row{'Status'} . "</td>\n";
		echo "<td>" . $row{'Used'} . "</td>\n";
		echo "<td>" . $row{'MediaType'} . "</td>\n";
		echo "<td>" . $row{'FirstWritten'} . "</td>\n";
		echo "<td>" . $row{'LastWritten'} . "</td>\n";
		echo "<td>" . $row{'LabelDate'} . "</td>\n";
		echo "<td>" . $row{'VolMounts'} . "</td>\n";
		echo "<td>" . $row{'JobsDone'} . "</td>\n";
		echo "</tr>\n";
	}
	echo "</table>";
	echo "</p>";

	echo"<p><table style='table-layout: auto; border: 2px solid #ccc; width: 100%; height: 50px;'>
                 <tr>
                  <h2>Pool Semanal</h2>
                 </tr>
                <tr style='border-bottom:1pt solid black;'>
                  <td><b>Volume</b></td>
                  <td><b>Status</b></td>
                  <td><b>Used</b></td>
                  <td><b>MediaType</b></td>
                  <td><b>FirstWritten</b></td>
                  <td><b>LastWritten</b></td>
                  <td><b>LabelDate</b></td>
                  <td><b>VolMounts</b></td>
                  <td><b>JobsDone</b></td>
                 </tr>\n";

        while ($row = mysql_fetch_array($resultWeekly)){
                echo "<tr style='border-bottom:1pt solid #ccc;'>";
                echo "<td>" . $row{'Volume'} . "</td>\n";
                echo "<td>" . $row{'Status'} . "</td>\n";
                echo "<td>" . $row{'Used'} . "</td>\n";
                echo "<td>" . $row{'MediaType'} . "</td>\n";
                echo "<td>" . $row{'FirstWritten'} . "</td>\n";
                echo "<td>" . $row{'LastWritten'} . "</td>\n";
                echo "<td>" . $row{'LabelDate'} . "</td>\n";
                echo "<td>" . $row{'VolMounts'} . "</td>\n";
                echo "<td>" . $row{'JobsDone'} . "</td>\n";
                echo "</tr>\n";
        }
	echo "</table>";
	echo "</p>";

	echo"<p><table style='table-layout: auto; border: 2px solid #ccc; width: 100%; height: 50px;'>
                 <tr>
                  <h2>Pool Mensal</h2>
                 </tr>
                <tr style='border-bottom:1pt solid black;'>
                  <td><b>Volume</b></td>
                  <td><b>Status</b></td>
                  <td><b>Used</b></td>
                  <td><b>MediaType</b></td>
                  <td><b>FirstWritten</b></td>
                  <td><b>LastWritten</b></td>
                  <td><b>LabelDate</b></td>
                  <td><b>VolMounts</b></td>
                  <td><b>JobsDone</b></td>
                 </tr>\n";

        while ($row = mysql_fetch_array($resultMonthly)){
                echo "<tr style='border-bottom:1pt solid #ccc;'>";
                echo "<td>" . $row{'Volume'} . "</td>\n";
                echo "<td>" . $row{'Status'} . "</td>\n";
                echo "<td>" . $row{'Used'} . "</td>\n";
                echo "<td>" . $row{'MediaType'} . "</td>\n";
                echo "<td>" . $row{'FirstWritten'} . "</td>\n";
                echo "<td>" . $row{'LastWritten'} . "</td>\n";
                echo "<td>" . $row{'LabelDate'} . "</td>\n";
                echo "<td>" . $row{'VolMounts'} . "</td>\n";
                echo "<td>" . $row{'JobsDone'} . "</td>\n";
                echo "</tr>\n";
        }
	echo "</table>";
	echo "</p>";

	mysql_close($dbhandle);

} else {
        $err_msg = "Erro ao se conectar a base de dados.";
	echo $err_msg;
}
?>

</html>
