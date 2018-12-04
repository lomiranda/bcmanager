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
          <h1>Rebobinar Fita</h1>
        </div>
        <hr>
      </div>
    </div>
  </div>
  <div class="section text-primary">
    <div class="container">
      <form id="rewindForm">
        <div class="row" style="margin-top: 30px; height: 25%">
          <div class="col-md-12">
            <select id="rewindRegional" name="rewindRegional" form="rewindForm" class="form-control input-lg">
              <option value="" selected>Selecione uma Regional</option>
              <option value="aju-spu">Aracaju (SE) - SPU</option>
              <option value="blm-spu">Belem (PA) - SPU</option>
              <option value="bhe-spu">Belo Horizonte (MG) - SPU</option>
              <option value="bva-samp">Boa Vista (RR) - SAMP</option>
              <option value="bva-spu">Boa Vista (RR) - SPU</option>
              <option value="cpe-spu">Campo Grande (MS) - SPU</option>
              <option value="cta-spu">Coritiba (PR) - SPU</option>
              <option value="cba-spu">Cuiaba (MT) - SPU</option>
              <option value="fns-spu">Florianopolis (SC) - SPU</option>
              <option value="fla-spu">Fortaleza (CE) - SPU</option>
              <option value="gna-spu">Goiania (GO)- SPU</option>
              <option value="jpa-spu">Joao Pessoa (PB) - SPU</option>
              <option value="mpa-samp">Macapa (AP) - SAMP</option>
              <option value="mpa-spu">Macapa (AP) - SPU</option>
              <option value="mco-spu">Maceio (AL) - SPU</option>
              <option value="mms-spu">Manaus (AM) - SPU</option>
              <option value="ntl-spu">Natal (RN) - SPU</option>
              <option value="pmj-spu">Palmas (TO) - SPU</option>
              <option value="pna-spu">Parnaiba (PI) - SPU</option>
              <option value="pae-spu">Porto Alegre (RS) - SPU</option>
              <option value="pvo-samp">Porto Velho (RO) - SAMP</option>
              <option value="pvo-spu">Porto Velho (RO) - SPU</option>
              <option value="rce-spu">Recife (PE) - SPU</option>
              <option value="rbo-samp">Rio Branco (AC) - SAMP</option>
              <option value="rbo-spu">Rio Branco (AC) - SPU</option>
              <option value="rjo-spu">Rio de Janeiro (RJ) - SPU</option>
              <option value="sdr-spu">Salvador (BA) - SPU</option>
              <option value="snt-spu">Santos (SP) - SPU</option>
              <option value="sls-spu">Sao Luis (MA) - SPU</option>
              <option value="tsa-spu">Teresina (PI) - SPU</option>
              <option value="vta-spu">Vitoria (ES) - SPU</option>
            </select>
          </div>
        </div>
        <div class="row" style="margin-top: 30px; text-align: center;">
          <input type="button" value="Rebobinar" onclick="drvRewind();" class="btn btn-primary">
        </div>
        <input type="text" id="rewindReg" class="hidden">
      </form>
    </div>

    <div id="rewindModal" class="modal modal-over fade" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 id="rewindModalTitle" class="modal-title">
              Confirme as informações:
            </h4>
          </div>
          <div id="rewindModalBody" class="modal-body">
          </div>
          <div id="rewindModalFooter" class="modal-footer">
            <input type="button" id="rewindModalOK" name="rewindModalOK" class="btn btn-block btn-primary" value="OK">
            <input type="button" id="rewindModalCncl" name="rewindModalCncl" class="btn btn-block btn-primary" value="Cancelar" onclick="rewindModalCncl()">
          </div>
        </div>
      </div>
    </div>

    <div id="rewindResultModal" class="modal modal-over fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button id="rewindErrModalX" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 id="rewindResultModalTitle" class="modal-title">
              Resultado:
            </h4>
          </div>
          <div id="rewindResultModalBody" class="modal-body">
          </div>
        </div>
      </div>
    </div>

    <div id="rewindErrModal" class="modal modal-over fade" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button id="rewindErrModalX" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 id="rewindErrModalTitle" class="modal-title">
              Erro!
            </h4>
          </div>
          <div id="rewindErrModalBody" class="modal-body">
            Selecione ao menos uma regional!
          </div>
        </div>
      </div>
    </div>

  </div>
</body>

</html>
