<html>

<head>
<link rel="stylesheet" type="text/css" href="css/table.css" />
<script src="./js/routing.js"></script>
<script language="javascript" type="text/javascript">
	
</script>

</head>

<form id="searchJob">

<div style="text-align: center;">
<!-- p>
  <input type="radio" name="atTime" value="at" checked> As:
  <input type="radio" name="atTime" value="at now +" checked> Daqui a:<br>
</p -->

<h2>Agendar evento daqui a:</h2>

<p>
 Quantidade de tempo<br>
 <input id="atQtd" type="text" name="atQtd" value="10">
</p>

<p>
 Unidade de tempo<br>
 <select id="atUnit" name="atUnit" form="schedEvent">
	<option value="minutes" selected>Minuto(s)</option>
	<option value="hours">Hora(s)</option>
        <option value="days">Dia(s)</option>
        <option value="months">Mes(es)</option>
  </select>
</p>

<p>
  Acao<br>
  <select id="atAction" name="atAction" form="schedEvent">
	<option value="mount" selected>Montar</option>
	<option value="umount">Desmontar</option>
        <!-- option value="eject">Ejetar</option -->
  </select>
</p>

<p>
  Localidade<br>
  <select id="atClient" name="atClient" form"searchJob">
    <option value="vazio" selected>Todas</option>
    <option value="mp-spu-aju-fd">Aracaju (SE) - SPU</option>
    <option value="mp-spu-blm-fd">Belem (PA) - SPU</option>
    <option value="mp-spu-bhe-fd">Belo Horizonte (MG) - SPU</option>
    <option value="mp-samp-bva-fd">Boa Vista (RR) - SAMP</option>
    <option value="mp-spu-bva-fd">Boa Vista (RR) - SPU</option>
    <option value="mp-spu-cpe-fd">Campo Grande (MS) - SPU</option>
    <option value="mp-spu-cta-fd">Coritiba (PR) - SPU</option>
    <option value="mp-spu-cba-fd">Cuiaba (MT) - SPU</option>
    <option value="mp-spu-fns-fd">Florianopolis (SC) - SPU</option>
    <option value="mp-spu-fla-fd">Fortaleza (CE) - SPU</option>
    <option value="mp-spu-gna-fd">Goiania (GO)- SPU</option>
    <option value="mp-spu-jpa-fd">Joao Pessoa (PB) - SPU</option>
    <option value="mp-samp-mpa-fd">Macapa (AP) - SAMP</option>
    <option value="mp-spu-mpa-fd">Macapa (AP) - SPU</option>
    <option value="mp-spu-mco-fd">Maceio (AL) - SPU</option>
    <option value="mp-spu-mms-fd">Manaus (AM) - SPU</option>
    <option value="mp-spu-ntl-fd">Natal (RN) - SPU</option>
    <option value="mp-spu-pmj-fd">Palmas (TO) - SPU</option>
    <option value="mp-spu-pna-fd">Parnaiba (PI) - SPU</option>
    <option value="mp-spu-pae-fd">Porto Alegre (RS) - SPU</option>
    <option value="mp-samp-pvo-fd">Porto Velho (RO) - SAMP</option>
    <option value="mp-spu-pvo-fd">Porto Velho (RO) - SPU</option>
    <option value="mp-spu-rce-fd">Recife (PE) - SPU</option>
    <option value="mp-samp-rbo-fd">Rio Branco (AC) - SAMP</option>
    <option value="mp-spu-rbo-fd">Rio Branco (AC) - SPU</option>
    <option value="mp-spu-rjo-fd">Rio de Janeiro (RJ) - SPU</option>
    <option value="mp-spu-sdr-fd">Salvador (BA) - SPU</option>
    <option value="mp-spu-snt-fd">Santos (SP) - SPU</option>
    <option value="mp-spu-sls-fd">Sao Luis (MA) - SPU</option>
    <option value="mp-spu-spo-fd">Sao Paulo (SP) - SPU</option>
    <option value="mp-spu-tsa-fd">Teresina (PI) - SPU</option>
    <option value="mp-spu-vta-fd">Vitoria (ES) - SPU</option>
  </select>
</p>

<p>
 <input type="button" id="btnSchedEvent" value="Agendar" onclick="schedEvent()" style="margin-top: 5px;"/>
</p>

</div>

</form>

<div id="reportResult" style="margin-top: 20px;">
</div>

<script language="javascript" type="text/javascript">
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1;
	var yyyy = today.getFullYear();

	if(dd<10) {
	    dd='0'+dd
	} 

	if(mm<10) {
	    mm='0'+mm
	}
	
	today = dd+'/'+mm+'/'+yyyy;

	$(document).ready(function(){
		$('#startDate').val(today);
		$('#endDate').val(today);
	})
</script>

</html>
