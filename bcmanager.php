<?php
session_start();

if(empty($_SESSION['nameuser'])) {
  header("Location: ./index.php?LoginFailed");
}
?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="_img/bcmanager_fav.png"/>
  <title>CIT - BC Manager</title>
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
  rel="stylesheet" type="text/css">
  <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css"
  rel="stylesheet" type="text/css">


  <script src="./js/routing.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/bcmanager.css">

</head>

<body>

  <div id="endModal" class="modal fade" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button id="endModalX" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 id="endModalTitle" class="modal-title">
            Sair
          </h4>
        </div>
        <div id="endModalBody" class="modal-body">
          Sessão encerrada com sucesso!
        </div>
      </div>
    </div>
  </div>

  <div class="navbar navbar-default navbar-static-top ">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- a class="navbar-brand" href="#"><span>BC Manager</span></a -->
        <a href="./bcmanager.php"><img src="_img/bcmanager_logo.png" style="width: 94px; height: 50px;"></a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-ex-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="#">Entrou como <b class="text-primary"><?php echo $_SESSION['nameuser']; ?></b>.</a>
          </li>
          <li>
            <a href="#" id="logout">Sair</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul id="topNav" class="nav nav-justified nav-pills">
            <?php
              if ($_SESSION['roleuser'] == 'operador' || $_SESSION['roleuser'] == 'admin'){
                echo '
                <li id="nav1" onclick="selectNav(this)">
                  <a href="#" id="gdLabel">Gerenciar Drives</a>
                  <div id="gdNav">
                    <ul>
                      <li>
                        <a id="drv_status" href="#">Status dos drives</a>
                      </li>
                      <li>
                        <a id="drv_version" href="#">Versão dos drives</a>
                      </li>
                      <li>
                        <a id="drv_mount" href="#">Montar/Desmontar drives</a>
                      </li>
                      <li>
                        <a id="drv_eject" href="#">Carregar/Ejetar drives</a>
                      </li>
                      <li>
                        <a id="drv_rewind" href="#">Rebobinar Fitas</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li id="nav2" class="disabled">
                  <a href="#">Gerenciar Jobs</a>
                </li>';
              }
            ?>
            <li id="nav3" onclick="selectNav(this)">
              <a id="reports" href="#">Relatórios</a>
            </li>
            <li id="nav4" onclick="selectNav(this)">
              <a id="graphs" href="#">Gráficos</a>
            </li>
            <?php
              if ($_SESSION['roleuser'] == 'admin'){
                echo '<li id="nav5" onclick="selectNav(this)">
                  <a id="admin" href="#">Administração</a>
                </li>
                <li id="nav6" onclick="selectNav(this)">
                  <a id="logs" href="#">Logs</a>
                </li>';
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <div class="section hd-wall">
    <div class="container" id="contentArea">
    </div>
  </div>
  <footer class="section section-primary" style="position: relative;">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-12 text-right">
          <h6>Desenvolvido por Lucas Miranda - Central IT</h6>
        </div>
      </div>
    </div>
  </footer>

  <div id="logoutModal" class="modal modal-over fade" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 id="logoutModalTitle" class="modal-title">
            Sair
          </h4>
        </div>
        <div id="logoutModalBody" class="modal-body">
          Tem certeza que deseja sair?
        </div>
        <div id="logoutModalFooter" class="modal-footer">
          <input type="button" id="logoutModalOK" name="logoutModalOK" class="btn btn-block btn-primary" value="OK" onclick="logoutModalOK()">
          <input type="button" id="logoutModalCncl" name="logoutModalCncl" class="btn btn-block btn-primary" value="Cancelar" onclick="logoutModalCncl()">
        </div>
      </div>
    </div>
  </div>

  <div id="loading">
    <img id="loading-image" src="_img/loading.gif" alt="Loading..." />
  </div>

</body>


<script>

function selectNav(navN){
  $('#topNav>li.active').removeClass('active');
  $(navN).addClass("active");

}

$(function() {
  $( '#gdNav' ).hide();
  $( '#loading' ).hide();
  setTimeout(function () {
    location.reload();
  }, 3000000);
});

$('#nav1').on("click", function(){
  $('#gdNav').slideToggle( "fast", function (){} );
});

$('#contentArea').load("welcome.php",function(){} );

$(document).click(function(e){
  if (! $(e.target).closest('#gdLabel').length )
  if (! $(e.target).closest('#gdNav').length )
  $('#gdNav').hide();
});


</script>

</html>
