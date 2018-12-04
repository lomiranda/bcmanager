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
</head>

<body>
  <div class="section text-primary">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Status dos Drives</h1>
        </div>
        <hr>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div id="drvStatusPanel" style="margin-top: 20px;">
        <div style="height: 43%;">
          <?php system("/opt/phpScripts/check_mounted.sh") ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
