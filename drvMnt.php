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
          <h1>Montar e Desmontar Drives</h1>
        </div>
        <hr>
      </div>
    </div>
  </div>
  <div class="section text-primary">
    <div class="container">
      <form id="drvMntForm">
        <div class="row">
          <div class="col-md-12">
            <input type="checkbox" onClick="toggle(this)" /><b> Marcar/Desmarcar Todos</b><br>
          </div>
        </div>
        <div class="row" style="margin-top: 30px;">
          <div class="col-md-4">
            <input type="checkbox" name="regional" value="spu_aju_LTO-5"> Aracaju (SE) - SPU<br>
            <input type="checkbox" name="regional" value="spu_blm_LTO-3"> Belém (PA) - SPU<br>
            <input type="checkbox" name="regional" value="spu_bhe_LTO-5"> Belo Horizonte (MG) - SPU<br>
            <input type="checkbox" name="regional" value="samp_bva_LTO-3"> Boa Vista (RR) - SAMP<br>
            <input type="checkbox" name="regional" value="spu_bva_LTO-3"> Boa Vista (RR) - SPU<br>
            <input type="checkbox" name="regional" value="spu_cpe_DAT72"> Campo Grande (MS) - SPU<br>
            <input type="checkbox" name="regional" value="spu_cta_LTO-5"> Coritiba (PR) - SPU<br>
            <input type="checkbox" name="regional" value="spu_cba_LTO-5"> Cuiabá (MT) - SPU<br>
            <input type="checkbox" name="regional" value="spu_fns_LTO-4"> Florianópolis (SC) - SPU<br>
            <input type="checkbox" name="regional" value="spu_fla_LTO-4"> Fortaleza (CE) - SPU<br>
            <input type="checkbox" name="regional" value="spu_gna_LTO-5"> Goiânia (GO)- SPU<br>
          </div>
          <div class="col-md-4">
            <input type="checkbox" name="regional" value="spu_jpa_LTO-5"> João Pessoa (PB) - SPU<br>
            <input type="checkbox" name="regional" value="samp_mpa_LTO-3"> Macapá (AP) - SAMP<br>
            <input type="checkbox" name="regional" value="spu_mpa_LTO-3"> Macapá (AP) - SPU<br>
            <input type="checkbox" name="regional" value="spu_mco_LTO-5"> Maceió (AL) - SPU<br>
            <input type="checkbox" name="regional" value="spu_mms_LTO-3"> Manaus (AM) - SPU<br>
            <input type="checkbox" name="regional" value="spu_ntl_LTO-5"> Natal (RN) - SPU<br>
            <input type="checkbox" name="regional" value="spu_pmj_LTO-5"> Palmas (TO) - SPU<br>
            <input type="checkbox" name="regional" value="spu_pna_LTO-5"> Parnaíba (PI) - SPU<br>
            <input type="checkbox" name="regional" value="spu_pae_LTO-5"> Porto Alegre (RS) - SPU<br>
            <input type="checkbox" name="regional" value="samp_pvo_LTO-4"> Porto Velho (RO) - SAMP<br>
            <input type="checkbox" name="regional" value="spu_pvo2_LTO-5"> Porto Velho (RO) - SPU<br>
          </div>
          <div class="col-md-4">
            <input type="checkbox" name="regional" value="spu_rce_LTO-5"> Recife (PE) - SPU<br>
            <input type="checkbox" name="regionalDis" value="" disabled> Rio Branco (AC) - SAMP (Filestorage)<br>
            <input type="checkbox" name="regionalDis" value="" disabled> Rio Branco (AC) - SPU (Filestorage)<br>
            <input type="checkbox" name="regional" value="spu_rjo_LTO-5"> Rio de Janeiro (RJ) - SPU<br>
            <input type="checkbox" name="regional" value="spu_sdr_LTO-5"> Salvador (BA) - SPU<br>
            <input type="checkbox" name="regional" value="spu_snt_LTO-3"> Santos (SP) - SPU<br>
            <input type="checkbox" name="regional" value="spu_sls_LTO-4"> São Luís (MA) - SPU<br>
            <input type="checkbox" name="regional" value="spu_spo_ULTRIUM-HH3"> São Paulo (SP) - SPU<br>
            <input type="checkbox" name="regional" value="spu_tsa_LTO-5"> Teresina (PI) - SPU<br>
            <input type="checkbox" name="regional" value="spu_vta_ULTRIUM-HH5"> Vitória (ES) - SPU<br>
          </div>
        </div>
        <div class="row" style="margin-top: 30px; text-align: center;">
          <input type="button" value="Montar" onclick="drvMnt();" class="btn btn-primary">
          <input type="button" value="Desmontar" onclick="drvUmnt();" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>

  <div id="drvMntResult">
  </div>

  <div id="mntModal" class="modal modal-over fade" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 id="mntModalTitle" class="modal-title">
            Confirme as informações:
          </h4>
        </div>
        <div id="mntModalBody" class="modal-body">
        </div>
        <div id="mntModalFooter" class="modal-footer">
          <input type="button" id="mntModalOK" name="mntModalOK" class="btn btn-block btn-primary" value="OK" onclick="mntModalOK()">
          <input type="button" id="mntModalCncl" name="mntModalCncl" class="btn btn-block btn-primary" value="Cancelar" onclick="mntModalCncl()">
        </div>
      </div>
    </div>
  </div>

  <div id="umntModal" class="modal modal-over fade" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 id="umntModalTitle" class="modal-title">
            Confirme as informações:
          </h4>
        </div>
        <div id="umntModalBody" class="modal-body">
        </div>
        <div id="umntModalFooter" class="modal-footer">
          <input type="button" id="umntModalOK" name="umntModalOK" class="btn btn-block btn-primary" value="OK" onclick="umntModalOK()">
          <input type="button" id="umntModalCncl" name="umntModalCncl" class="btn btn-block btn-primary" value="Cancelar" onclick="umntModalCncl()">
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

</body>

<script language="JavaScript">
function toggle(source) {
  checkboxes = document.getElementsByName('regional');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
};
/* $(document).ready(function(){
$('#mntModal').modal('show');
});*/
</script>

</html>
