<?php

session_start();
$nameuser = $_SESSION['nameuser'];
$log_file = "./logs/umntDrv-" .  date("Ymd");
$date_now = date("H:i:s Y-m-d");

foreach($_POST['drvToUmnt'] as $key => $value) {
  system("echo \"umount storage=$value\" | bconsole");
  $log_message = "$nameuser desmontou o drive $value às $date_now." . "\n";
  file_put_contents("$log_file.log","$log_message",FILE_APPEND);
}
?>
