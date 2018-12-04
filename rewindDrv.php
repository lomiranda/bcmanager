<?php

system("bash /opt/phpScripts/rewindTape.sh $_POST[rewindReg]");

session_start();
$nameuser = $_SESSION['nameuser'];
$regional = $_POST[rewindReg];
$log_file = "./logs/rewindDrv-" .  date("Ymd");
$date_now = date("H:i:s Y-m-d");
$log_message = "$nameuser rebobinou a fita da regional $regional às $date_now." . "\r";

file_put_contents("$log_file.log","$log_message",FILE_APPEND);

?>
