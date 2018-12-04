<?php

session_start();
$nameuser = $_SESSION['nameuser'];
$log_file = "./logs/ejectDrv-" .  date("Ymd");
$date_now = date("H:i:s Y-m-d");

foreach($_POST['drvToEject'] as $key => $value) {
    system("bash /opt/phpScripts/ejectTape.sh $value");
    $log_message = "$nameuser ejetou o drive $value às $date_now." . "\n";
    file_put_contents("$log_file.log","$log_message",FILE_APPEND);
}

?>
