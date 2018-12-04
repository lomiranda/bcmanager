<?php

/* foreach($_POST['drvToMnt'] as $key => $value) {
  echo "$value \n";
  system("echo \"mount storage=$value\" | bconsole");
} */

$atQtd = $_POST['atQtd'];
$atUnit = $_POST['atUnit'];
$atAction = $_POST['atAction'];
$atClient = $_POST['atClient'];


if ($atAction == "mount"){
	echo "Agendando montagem:";
	// system("/opt/phpScripts/mountTape.sh $atClient | sudo at now +$atQtd $atUnit");
	system("/opt/phpScripts/mountTape.sh $atClient $atQtd $atUnit");
} else if ($atAction == "umount"){
	echo "Agendando desmontagem:";
	// system("/opt/phpScripts/umountTape.sh $atClient | sudo at now +$atQtd $atUnit");
	system("/opt/phpScripts/umountTape.sh $atClient $atQtd $atUnit");
} else if ($atAction == "eject"){
	echo "Agendando eject:";
        system("/opt/phpScripts/ejectTape.sh $atClient | sudo at now +$atQtd $atUnit");
} else {
	echo "Acao nao reconhecida!";
}

?>
