<?php
session_start();
if ($_SESSION['roleuser'] == 'operador' || $_SESSION['roleuser'] == 'admin'){
  echo "<div>";
} else {
  echo "<div style='height: 55%;'>";
}
?>
<div class="row text-primary">
  <h1>Bem vindo ao CIT - BC Manager!</h1>
  <div class="container text-primary">
    <p>
      Escolha uma das opções no menu superior:
    </p>
    <ul>
      <?php
      if ($_SESSION['roleuser'] == 'operador' || $_SESSION['roleuser'] == 'admin'){
        echo '<li>
        <b>Gerenciar Drives:</b> Realiza todas as operações relevantes aos drives das fitas LTO, como carregar, ejetar, montar e desmontar.
        </li>
        <br>
        <li>
        <b>Gerenciar Jobs:</b> Esta opção ainda será implementada.
        </li>
        <br>';
      }
      ?>
      <li>
        <b>Relatórios:</b> Exibe uma interface para visualizar os jobs executados em determinado período.
      </li>
      <br>
      <li>
        <b>Gráficos:</b> Exibe os gráficos gerados pelo Grafana.
      </li>
    </ul>
  </div>
</div>
<div class="container">
  <?php
  if ($_SESSION['roleuser'] == 'operador' || $_SESSION['roleuser'] == 'admin'){
  echo "<hr>";
    #Ultimos Backups
    echo "<div class='panel panel-primary'>
    <div class='panel-heading' id='panel-heading-lastBkp' style='cursor: pointer;'>
    <h3 class='panel-title'>Últimos Backups &#x25BC</h3>
    </div>
    <div class='panel-body' id='panel-body-lastBkp'>
    <pre>" . shell_exec("echo 'status dir' | bconsole | sed -n '/Terminated Jobs/,/^$/p' | tail -n +2") . "</pre>
    </div>
    </div>";

    #Backups Agendados
    echo "<div class='panel panel-primary'>
    <div class='panel-heading' id='panel-heading-nextBkp' style='cursor: pointer;'>
    <h3 class='panel-title'>Backups Agendados &#x25BC</h3>
    </div>
    <div class='panel-body' id='panel-body-nextBkp'>
    <pre>" . shell_exec("echo 'status dir' | bconsole | sed -n '/Scheduled Jobs/,/^$/p' | tail -n +2") . "</pre>
    </div>
    </div>";
  }
  ?>
</div>
</div>

<script>

//Ultimos Backups
$('#panel-body-lastBkp').slideUp();
$('#panel-heading-lastBkp').on("click", function () {
  $('#panel-body-lastBkp').slideToggle();
});

//Backups Agendados
$('#panel-body-nextBkp').slideUp();
$('#panel-heading-nextBkp').on("click", function () {
  $('#panel-body-nextBkp').slideToggle();
});
</script>
