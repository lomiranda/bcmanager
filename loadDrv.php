<?php

session_start();
$nameuser = $_SESSION['nameuser'];
$log_file = "./logs/loadDrv-" .  date("Ymd");
$date_now = date("H:i:s Y-m-d");

foreach($_POST['drvToLoad'] as $key => $value) {

  echo "Carregando o drive da regional $value";

  exec("bash /opt/phpScripts/loadTape.sh $value", $output, $return);
  $log_message = "$nameuser carregou o drive $value às $date_now." . "\n";
  file_put_contents("$log_file.log","$log_message",FILE_APPEND);

  if (!$return) {
    echo "<br>Drive carregado com sucesso!";
    echo "<br>-=-=-=-=-=-=-=-=-<br>";
  } else {
    echo "<br>Erro ao carregar o drive!";
    echo "<br>-=-=-=-=-=-=-=-=-<br>";
  }
}

?>
