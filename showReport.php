<html>

<!-- table style="table-layout: auto; border: 2px solid #ccc; width: 100%; height: 50px;" -->
<table class="table table-bordered table-striped">
  <!-- tr style="border-bottom:1pt solid black;" -->
  <tr>
    <td><b>JobId</b></td>
    <td><b>Type</b></td>
    <td><b>Level</b></td>
    <td><b>Client</b></td>
    <td><b>Pool</b></td>
    <td><b>Volume</b></td>
    <td><b>Size</b></td>
    <td><b>JobStatus</b></td>
    <td><b>SchedTime</b></td>
    <td><b>StartTime</b></td>
    <td><b>EndTime</b></td>
  </tr>
  <?php

  $startDate = $_POST['startDate'];
  $endDate = $_POST['endDate'];
  $jobLvl = $_POST['jobLvl'];
  $jobStts = $_POST['jobStts'];
  $jobClnt = $_POST['jobClnt'];

  session_start();
  $nameuser = $_SESSION['nameuser'];
  $reports_log = "./logs/reports-" .  date("Ymd");
  $date_now = date("H:i:s Y-m-d");
  $log_message = "$nameuser gerou um relatorio às $date_now" . "\n" .
  "PERIODO: de $startDate até $endDate" . "\n" .
  "Status: $jobStts" . "\n" .
  "Regional: $jobClnt" . "\n\n";

  $dbusername = "bcm_user";
  $dbpw = "bcm@mp_92";
  $dbhost = "10.209.8.251";
  $database = "bacula";

  if($_POST["jobLvl"] !== 'todos') {
    $lvlFilter = " AND j.Level LIKE '$jobLvl' ";
  } else {
    $lvlFilter = "";
  }

  if($_POST["jobStts"] !== 'todos') {
    $sttsFilter = " AND j.JobStatus LIKE '$jobStts' ";
    if ($_POST["jobStts"] == 'R') {
      $endTimeOp = '=';
    } else {
      $endTimeOp = '!=';
    }
  } else {
    $sttsFilter = "";
    $endTimeOp = '!=';
  }

  if($_POST["jobClnt"] !== 'todos') {
    $clntFilter = " AND c.Name LIKE '$jobClnt' ";
  } else {
    $clntFilter = "";
  }

  $dbselect = "SELECT j.JobId,
  CASE WHEN j.Type = 'B' THEN 'Back' WHEN j.Type = 'R' THEN 'Rest' END AS Type,
  CASE WHEN j.Level = 'F' THEN 'Full' WHEN j.Level = 'D'
  THEN 'Diff' WHEN j.Level = 'I' THEN 'Incr' END AS Level,
  CONVERT(c.Name using utf8) AS Client, CONVERT(p.Name using utf8) AS Pool,
  CONVERT(m.VolumeName using utf8) AS Volume, CONCAT (TRUNCATE(j.JobBytes DIV 1024 DIV 1024 / 1024,2), ' GB') AS Size,
  CASE WHEN j.JobStatus = 'A' THEN 'Cancelado pelo Usuario' WHEN j.JobStatus = 'T' THEN 'Finalizado'
  WHEN j.JobStatus = 'f' THEN 'Erro' WHEN j.JobStatus = 'R' THEN 'Em execucao'
  END AS JobStatus, j.SchedTime, j.StartTime, j.EndTime
  FROM Job j
  LEFT JOIN JobMedia jm
  ON j.JobId = jm.JobId
  LEFT JOIN Media m
  ON jm.MediaId = m.MediaId
  LEFT JOIN Client c
  ON j.ClientId = c.ClientId
  LEFT JOIN Pool p
  ON j.PoolId = p.PoolId
  WHERE c.Name not like 'bmaster-fd'
  AND UNIX_TIMESTAMP(j.StartTime) > unix_timestamp(str_to_date('"
  . $startDate .
  "00:00', '%d/%m/%Y %H:%i')) AND UNIX_TIMESTAMP(j.EndTime) < unix_timestamp(str_to_date('"
  . $endDate .
  "23:59', '%d/%m/%Y %H:%i')) AND UNIX_TIMESTAMP(j.EndTime) " . $endTimeOp . " 0 "
  . $sttsFilter . $clntFilter . $lvlFilter .
  "Group by j.JobId;";


  global $err_msg, $userLogin, $dbhost, $dbselect, $dbusername, $dbpw, $database;

  $dbhandle = mysql_connect($dbhost, $dbusername, $dbpw);

  if ($dbhandle){
    mysql_select_db($database,$dbhandle);
    $resultquery = mysql_query($dbselect);
    while ($row = mysql_fetch_array($resultquery)){
      //echo "<tr style='border-bottom:1pt solid #ccc;'>";
      echo "<tr>";
      echo "<td>" . $row{'JobId'} . "</td>";
      echo "<td>" . $row{'Type'} . "</td>";
      echo "<td>" . $row{'Level'} . "</td>";
      echo "<td>" . $row{'Client'} . "</td>";
      echo "<td>" . $row{'Pool'} . "</td>";
      echo "<td>" . $row{'Volume'} . "</td>";
      echo "<td>" . $row{'Size'} . "</td>";
      echo "<td>" . $row{'JobStatus'} . "</td>";
      echo "<td>" . $row{'SchedTime'} . "</td>";
      echo "<td>" . $row{'StartTime'} . "</td>";
      echo "<td>" . $row{'EndTime'} . "</td>";
      echo "</tr>";
    }
    mysql_close($dbhandle);
    file_put_contents("$reports_log.log","$log_message",FILE_APPEND);
  } else {
    $err_msg = "Erro ao se conectar a base de dados.";
    echo $err_msg;
    mysql_close($dbhandle);
    file_put_contents("$reports_log.log","$log_message",FILE_APPEND);
  }
  ?>

</table>

</html>
