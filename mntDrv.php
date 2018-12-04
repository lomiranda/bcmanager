<?php

session_start();
$nameuser = $_SESSION['nameuser'];
$log_file = "./logs/mntDrv-" .  date("Ymd");
$date_now = date("H:i:s Y-m-d");

foreach($_POST['drvToMnt'] as $key => $value) {
  system("echo \"mount storage=$value\" | bconsole");
  $log_message = "$nameuser montou o drive $value às $date_now." . "\n";
  file_put_contents("$log_file.log","$log_message",FILE_APPEND);
}

?>
