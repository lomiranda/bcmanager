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

<h3 class="text-center">
  <div>Criar Usuário</div>
</h3>
<div id="adminForm" class='inputLogin' style="text-align: center; margin-top: 30px;">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <form id="newUserForm" method="post">
      <div class="form-group">
        <label class="control-label" for="exampleInputEmail1">Nome Completo</label>
        <input class="form-control" id="newUserName" type='text' name='newUserName' placeholder="João Maria da Silva">
      </div>
      <div class="form-group">
        <label class="control-label" for="exampleInputEmail1">Login</label>
        <input class="form-control" id="newUserLogin" type='text' name='newUserLogin' placeholder="joao.silva">
      </div>
      <div class="form-group">
        <label class="control-label" for="exampleInputPassword1">Password</label>
        <input class="form-control" id="newUserPwd" type='Password' name='newUserPwd' placeholder="Password">
      </div>
      <div class="form-group">
        <div class="radio">
          <label class="radio-inline">
            <input type="radio" id="newUserRole" name="newUserRole" value="1" checked="">Administrador
          </label>
          <label class="radio-inline">
            <input type="radio" id="newUserRole" name="newUserRole" value="2" checked="">Operador
          </label>
          <label class="radio-inline">
            <input type="radio" id="newUserRole" name="newUserRole" value="3" checked="">Usuário
          </label>
        </div>
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
      <input type='button' id="sndBtn" name='send button' class='btn btn-primary' style="width: 120px;" value='Enviar' onclick="addNewUser()"/>
      <input type='button' id="cnclBtn" name='cancel button' class='btn btn-primary' style="width: 120px;" value='Cancelar'/>
    </form>
  </div>
  <div class="col-md-4"></div>
</div>
<html>
