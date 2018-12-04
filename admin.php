<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
  rel="stylesheet" type="text/css">
  <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css"
  rel="stylesheet" type="text/css">
  <script type="text/javascript" src="./js/routing.js"></script>
</head>

<body>
  <div class="section text-primary">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Administração</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="section text-primary">
    <div class="container">
      <div>
        <div id="adminArea" style="margin-top: 30px; text-align: center;">
          <div class="row" style="height: 24%;">
            <div class="col-md-6">
              <a href="#" id="newUserBtn" name='create user button'><i class="fa fa-4x fa-fw fa-child text-primary"></i>
                <font size="5px">Criar Usuário</font>
              </a>
            </div>
            <div class="col-md-6">
              <a href="#"  id="editUserBtn" name='edit user button'><i class="fa fa-4x fa-group fa-fw text-primary"></i>
                <font size="5px">Editar Usuário</font>
              </a>
            </div>
            <!-- div class="col-md-4">
            <a href="#" id="delUserBtn" name='delete user button'><i class="fa fa-4x fa-fw fa-meh-o text-primary"></i>
            <font size="5px">Excluir Usuário</font>
          </a>
        </div-->
      </div>
    </div>

    <div id="editUserModal" class="modal modal-over fade" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 id="editUserModalTitle" class="modal-title">
              Editar usuário
            </h4>
          </div>
          <div id="editUserModalBody" class="modal-body">
            <div class="form-group">
              <label class="control-label" for="newLogin">Login:</label>
              <input class="form-control" id="newLogin" type='text' name='newLogin'>
            </div>
            <div class="form-group">
              <label class="control-label" for="newName">Nome:</label>
              <input class="form-control" id="newName" type='text' name='newName'>
            </div>
            <div class="form-group">
              <input type="text" id="newClnt" class="hidden">
              <select id="newClient" name="newClient" class="form-control input">
                <option value='' selected>Selecione uma Regional</option>

                <?php
                $dbusername = "bcm_user";
                $dbpw = "bcm@mp_92";
                $dbhost = "10.209.8.251";
                $dbquery = "SELECT id, name FROM clients";
                $database = "bcmanager";

                global $err_msg, $dbhost, $dbusername, $dbpw, $database, $dbquery;
                $dbhandle = mysql_connect($dbhost, $dbusername, $dbpw);

                if ($dbhandle){
                  mysql_select_db($database,$dbhandle);
                  $resultquery = mysql_query($dbquery);
                  while ($row = mysql_fetch_array($resultquery)) {
                    echo "<option value='" . $row{'id'} . "'>" . utf8_encode($row{'name'}) . "</option>";
                  }
                  mysql_close($dbhandle);
                }
                ?>

              </select>
            </div>
            <div class="form-group">
              <div class="radio">
                <label class="radio-inline">
                  <input type="radio" id="newRoleadmin" name="newRole" value="1">Administrador
                </label>
                <label class="radio-inline">
                  <input type="radio" id="newRoleoperador" name="newRole" value="2">Operador
                </label>
                <label class="radio-inline">
                  <input type="radio" id="newRoleusuario" name="newRole" value="3">Usuário
                </label>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label" for="newPass">Nova Senha</label>
              <input class="form-control" id="newPass" type='Password' name='newPass' placeholder="Opcional">
            </div>
          </div>
          <div id="editUserModalFooter" class="modal-footer">
            <input type="button" id="editUserModalOK" name="editUserModalOK" class="btn btn-block btn-primary" value="OK" onclick="editUserModalOK()">
            <input type="button" id="editUserModalCncl" name="editUserModalCncl" class="btn btn-block btn-primary" value="Cancelar" onclick="editUserModalCncl()">
          </div>
        </div>
      </div>
    </div>

    <div id="infoModal" class="modal fade" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button id="infoModalX" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 id="infoModalTitle" class="modal-title">
              Sair
            </h4>
          </div>
          <div id="infoModalBody" class="modal-body">
          </div>
        </div>
      </div>
    </div>

  </div>
  <div id="results">
  </div>
</div>
</div>
</body>

<script>

$(document).ready(function(){
  $('#adminForm').hide();
});

</script>

</html>
