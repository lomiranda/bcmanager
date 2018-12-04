<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="_img/bcmanager_fav.png"/>
  <title>Login - CIT BC Manager</title>
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
  rel="stylesheet" type="text/css">
  <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css"
  rel="stylesheet" type="text/css">

  <script src="./js/validation.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/bcmanager.css">

</head>

<body onload="checkLogin();" class="hd-wall">
  <div id="modalLogin" class="modal" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!-- button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button -->
          <h4 class="modal-title">Entrar no CIT - BC Manager</h4>
        </div>
        <div class="modal-body">
          <img src="./_img/bcmanager_logo.png" class="img img-responsive"
          style="display: block; margin: 0 auto;">
          <hr>
          <p>Insira suas credenciais para continuar:</p>
          <!-- form role="form" action="./validation.php" method="POST" enctype="application/x-www-form-urlencoded" id="loginform" name="loginform" -->
            <form role="form" action="./validation.php" method="POST" enctype="application/x-www-form-urlencoded" id="loginform" name="loginform">
            <div class="form-group">
              <label class="control-label" for="exampleInputEmail1">Login</label>
              <input class="form-control" id="username" placeholder="nome.sobrenome"
              type="text" name="username">
            </div>
            <div class="form-group">
              <label class="control-label" for="exampleInputPassword1">Password</label>
              <input class="form-control" id="passwd" placeholder="Password"
              type="password" name="passwd">
            </div>

<div id="alertError" class="alert alert-dismissable alert-danger">
            </div>

          </div>
          <div class="modal-footer">
            <input type="submit" id="LogginButton" name="log in" class="btn btn-block btn-primary" value="Entrar">
            <hr>
            <img src="./_img/cit_logo.png" class="img img-responsive"
            style="display: block; margin: 0 auto;">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

<script>
$(document).ready( function(){
  $('#modalLogin').modal('show');
  $('#alertError').hide();
});
</script>

</html>
