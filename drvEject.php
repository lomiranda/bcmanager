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
          <h1>Carregar/Ejetar Drives</h1>
        </div>
        <hr>
      </div>
    </div>
  </div>
  <div class="section text-primary">
    <div class="container">
      <form id="drvejectForm">
        <div class="row">
          <div class="col-md-12">
            <input type="checkbox" onClick="toggle(this)" /><b> Marcar/Desmarcar Todos</b><br>
          </div>
        </div>
        <div class="row" style="margin-top: 30px;">
          <div class="col-md-4">
            <input type="checkbox" name="regional" value="aju-spu"> Aracaju (SE) - SPU<br>
            <input type="checkbox" name="regional" value="blm-spu"> Belém (PA) - SPU<br>
            <input type="checkbox" name="regional" value="bhe-spu"> Belo Horizonte (MG) - SPU<br>
            <input type="checkbox" name="regional" value="bva-samp"> Boa Vista (RR) - SAMP<br>
            <input type="checkbox" name="regional" value="bva-spu"> Boa Vista (RR) - SPU<br>
            <input type="checkbox" name="regional" value="cpe-spu"> Campo Grande (MS) - SPU<br>
            <input type="checkbox" name="regional" value="cta-spu"> Coritiba (PR) - SPU<br>
            <input type="checkbox" name="regional" value="cba-spu"> Cuiabá (MT) - SPU<br>
            <input type="checkbox" name="regional" value="fns-spu"> Florianópolis (SC) - SPU<br>
            <input type="checkbox" name="regional" value="fla-spu"> Fortaleza (CE) - SPU<br>
            <input type="checkbox" name="regional" value="gna-spu"> Goiânia (GO)- SPU<br>
          </div>
          <div class="col-md-4">
            <input type="checkbox" name="regional" value="jpa-spu"> João Pessoa (PB) - SPU<br>
            <input type="checkbox" name="regional" value="mpa-samp"> Macapá (AP) - SAMP<br>
            <input type="checkbox" name="regional" value="mpa-spu"> Macapá (AP) - SPU<br>
            <input type="checkbox" name="regional" value="mco-spu"> Maceió (AL) - SPU<br>
            <input type="checkbox" name="regional" value="mms-spu"> Manaus (AM) - SPU<br>
            <input type="checkbox" name="regional" value="ntl-spu"> Natal (RN) - SPU<br>
            <input type="checkbox" name="regional" value="pmj-spu"> Palmas (TO) - SPU<br>
            <input type="checkbox" name="regional" value="pna-spu"> Parnaíba (PI) - SPU<br>
            <input type="checkbox" name="regional" value="pae-spu"> Porto Alegre (RS) - SPU<br>
            <input type="checkbox" name="regional" value="pvo-samp"> Porto Velho (RO) - SAMP<br>
            <input type="checkbox" name="regional" value="pvo2-spu"> Porto Velho (RO) - SPU<br>
          </div>
          <div class="col-md-4">
            <input type="checkbox" name="regional" value="rce-spu"> Recife (PE) - SPU<br>
            <input type="checkbox" name="regionalDis" value="" disabled> Rio Branco (AC) - SAMP (Filestorage)<br>
            <input type="checkbox" name="regionalDis" value="" disabled> Rio Branco (AC) - SPU (Filestorage)<br>
            <input type="checkbox" name="regional" value="rjo-spu"> Rio de Janeiro (RJ) - SPU<br>
            <input type="checkbox" name="regional" value="sdr-spu"> Salvador (BA) - SPU<br>
            <input type="checkbox" name="regional" value="snt-spu"> Santos (SP) - SPU<br>
            <input type="checkbox" name="regional" value="sls-spu"> São Luís (MA) - SPU<br>
            <input type="checkbox" name="regional" value="spu-spo"> São Paulo (SP) - SPU<br>
            <input type="checkbox" name="regional" value="tsa-spu"> Teresina (PI) - SPU<br>
            <input type="checkbox" name="regional" value="vta-spu"> Vitória (ES) - SPU<br>
          </div>
        </div>
        <div class="row" style="margin-top: 30px; text-align: center;">
          <input type="button" value="Carregar" onclick="drvLoad();" class="btn btn-primary">
          <input type="button" value="Ejetar" onclick="drvEject();" class="btn btn-primary">
        </div>
      </form>
    </div>

    <div id="ejectModal" class="modal modal-over fade" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 id="ejectModalTitle" class="modal-title">
              Confirme as informações:
            </h4>
          </div>
          <div id="ejectModalBody" class="modal-body">
          </div>
          <div id="ejectModalFooter" class="modal-footer">
            <input type="button" id="ejectModalOK" name="ejectModalOK" class="btn btn-block btn-primary" value="OK" onclick="ejectModalOK()">
            <input type="button" id="ejectModalCncl" name="ejectModalCncl" class="btn btn-block btn-primary" value="Cancelar" onclick="ejectModalCncl()">
          </div>
        </div>
      </div>
    </div>

    <div id="loadModal" class="modal modal-over fade" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 id="loadModalTitle" class="modal-title">
              Confirme as informações:
            </h4>
          </div>
          <div id="loadModalBody" class="modal-body">
          </div>
          <div id="loadModalFooter" class="modal-footer">
            <input type="button" id="loadModalOK" name="loadModalOK" class="btn btn-block btn-primary" value="OK" onclick="loadModalOK()">
            <input type="button" id="loadModalCncl" name="loadModalCncl" class="btn btn-block btn-primary" value="Cancelar" onclick="loadModalCncl()">
          </div>
        </div>
      </div>
    </div>

    <div id="resultModal" class="modal modal-over fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button id="errModalX" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 id="resultModalTitle" class="modal-title">
              Resultado:
            </h4>
          </div>
          <div id="resultModalBody" class="modal-body">
          </div>
        </div>
      </div>
    </div>

    <div id="errModal" class="modal modal-over fade" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button id="errModalX" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 id="errModalTitle" class="modal-title">
              Erro!
            </h4>
          </div>
          <div id="errModalBody" class="modal-body">
            Selecione ao menos uma opção!
          </div>
        </div>
      </div>
    </div>

  </div>
</body>

<script language="JavaScript">
function toggle(source) {
  checkboxes = document.getElementsByName('regional');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
};
</script>

</html>
