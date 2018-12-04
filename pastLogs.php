<?php
session_start();

if(isset($_POST['logDate'])){
  $oldFormat = DateTime::createFromFormat('d-m-Y', $_POST['logDate']);
  $dateLog = $oldFormat->format('Ymd');
} else {
  $dateLog = date("Ymd");
}

$accessLog = "./logs/access_bc-" .  $dateLog . ".log";
$mntLog = "./logs/mntDrv-" .  $dateLog . ".log";
$umntLog = "./logs/umntDrv-" .  $dateLog . ".log";
$ejectLog = "./logs/ejectDrv-" .  $dateLog . ".log";
$loadLog = "./logs/loadDrv-" .  $dateLog . ".log";
$rewindLog = "./logs/rewindDrv-" .  $dateLog . ".log";
$reportsLog = "./logs/reports-" .  $dateLog . ".log";


$newFormat = DateTime::createFromFormat('Ymd', $dateLog);
$dateTxtInput = $newFormat->format('d-m-Y');


if ($_SESSION['roleuser'] == 'operador' || $_SESSION['roleuser'] == 'admin'){

  #Log de Acesso
  echo "<div class='panel panel-primary'>
  <div class='panel-heading' id='panel-heading-access' style='cursor: pointer;'>
  <h3 class='panel-title'>Logs de Acesso &#x25BC</h3>
  </div>
  <div class='panel-body' id='panel-body-access'>
  <pre>";
  if (file_exists($accessLog)){
    $fh1 = fopen($accessLog, 'r');
    $output1 = fread($fh1, 25000);
    echo $output1;
  } else {
    echo "O log $accessLog não existe!";
  }
  echo "</pre>
  </div>
  </div>";

  #Log de Mount
  echo "<div class='panel panel-primary'>
  <div class='panel-heading' id='panel-heading-mount' style='cursor: pointer;'>
  <h3 class='panel-title'>Logs de Montagem &#x25BC</h3>
  </div>
  <div class='panel-body' id='panel-body-mount'>
  <pre>";
  if (file_exists($mntLog)){
    $fh1 = fopen($mntLog, 'r');
    $output1 = fread($fh1, 25000);
    echo $output1;
  } else {
    echo "O log $mntLog não existe!";
  }
  echo "</pre>
  </div>
  </div>";

  #Log de Umount
  echo "<div class='panel panel-primary'>
  <div class='panel-heading' id='panel-heading-umount' style='cursor: pointer;'>
  <h3 class='panel-title'>Logs de Desmontagem &#x25BC</h3>
  </div>
  <div class='panel-body' id='panel-body-umount'>
  <pre>";
  if (file_exists($umntLog)){
    $fh2 = fopen($umntLog, 'r');
    $output2 = fread($fh2, 25000);
    echo $output2;
  } else {
    echo "O log $umntLog não existe!";
  }
  echo "</pre>
  </div>
  </div>";

  #Log de Eject
  echo "<div class='panel panel-primary'>
  <div class='panel-heading' id='panel-heading-eject' style='cursor: pointer;'>
  <h3 class='panel-title'>Logs de Ejeção &#x25BC</h3>
  </div>
  <div class='panel-body' id='panel-body-eject'>
  <pre>";
  if (file_exists($ejectLog)){
    $fh3 = fopen($ejectLog, 'r');
    $output3 = fread($fh3, 25000);
    echo $output3;
  } else {
    echo "O log $ejectLog não existe!";
  }
  echo "</pre>
  </div>
  </div>";

  #Log de Load
  echo "<div class='panel panel-primary'>
  <div class='panel-heading' id='panel-heading-load' style='cursor: pointer;'>
  <h3 class='panel-title'>Logs de Carregamento &#x25BC</h3>
  </div>
  <div class='panel-body' id='panel-body-load'>
  <pre>";
  if (file_exists($loadLog)){
    $fh4 = fopen($loadLog, 'r');
    $output4 = fread($fh4, 25000);
    echo $output4;
  } else {
    echo "O log $loadLog não existe!";
  }
  echo "</pre>
  </div>
  </div>";

  #Log de Rewind
  echo "<div class='panel panel-primary'>
  <div class='panel-heading' id='panel-heading-rewind' style='cursor: pointer;'>
  <h3 class='panel-title'>Logs de Rebobinamento &#x25BC</h3>
  </div>
  <div class='panel-body' id='panel-body-rewind'>
  <pre>";
  if (file_exists($rewindLog)){
    $fh5 = fopen($rewindLog, 'r');
    $output5 = fread($fh5, 25000);
    echo $output5;
  } else {
    echo "O log $rewindLog não existe!";
  }
  echo "</pre>
  </div>
  </div>";

  #Log de Report
  echo "<div class='panel panel-primary'>
  <div class='panel-heading' id='panel-heading-report' style='cursor: pointer;'>
  <h3 class='panel-title'>Logs de Relatórios &#x25BC</h3>
  </div>
  <div class='panel-body' id='panel-body-report'>
  <pre>";
  if (file_exists($reportsLog)){
    $fh6 = fopen($reportsLog, 'r');
    $output6 = fread($fh6, 25000);
    echo $output6;
  } else {
    echo "O log $reportsLog não existe!";
  }
  echo "</pre>
  </div>
  </div>";
}
?>

<script>

//Log de Acesso
$('#panel-body-access').slideUp();
$('#panel-heading-access').on("click", function () {
  $('#panel-body-access').slideToggle();
});

//Log de Mount
$('#panel-body-mount').slideUp();
$('#panel-heading-mount').on("click", function () {
  $('#panel-body-mount').slideToggle();
});

//Log de Mount
$('#panel-body-umount').slideUp();
$('#panel-heading-umount').on("click", function () {
  $('#panel-body-umount').slideToggle();
});

//Log de Eject
$('#panel-body-eject').slideUp();
$('#panel-heading-eject').on("click", function () {
  $('#panel-body-eject').slideToggle();
});

//Log de Load
$('#panel-body-load').slideUp();
$('#panel-heading-load').on("click", function () {
  $('#panel-body-load').slideToggle();
});

//Log de Rewind
$('#panel-body-rewind').slideUp();
$('#panel-heading-rewind').on("click", function () {
  $('#panel-body-rewind').slideToggle();
});

//Log de Report
$('#panel-body-report').slideUp();
$('#panel-heading-report').on("click", function () {
  $('#panel-body-report').slideToggle();
});

</script>
