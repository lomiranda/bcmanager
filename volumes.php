<html>

<head>
<link rel="stylesheet" type="text/css" href="css/table.css" />
<script src="./js/routing.js"></script>
<script language="javascript" type="text/javascript">
	
</script>

</head>

<form id="searchVol">

<table id="srchTbl">

<tr>
 <td>
  Localidade:<br>
  <select id="volReg" name="volumeRegional" form"searchJob">
   <option value="" selected>Todas</option>
   <option value="AJU-SPU">Aracaju (SE) - SPU</option>
   <option value="BLM-SPU">Belem (PA) - SPU</option>
   <option value="BHE-SPU">Belo Horizonte (MG) - SPU</option>
   <option value="BVA-SAMP">Boa Vista (RR) - SAMP</option>
   <option value="BVA-SPU">Boa Vista (RR) - SPU</option>
   <option value="CPE-SPU">Campo Grande (MS) - SPU</option>
   <option value="CTA-SPU">Coritiba (PR) - SPU</option>
   <option value="CBA-SPU">Cuiaba (MT) - SPU</option>
   <option value="FNS-SPU">Florianopolis (SC) - SPU</option>
   <option value="FLA-SPU">Fortaleza (CE) - SPU</option>
   <option value="GNA-SPU">Goiania (GO)- SPU</option>
   <option value="JPA-SPU">Joao Pessoa (PB) - SPU</option>
   <option value="MPA-SAMP">Macapa (AP) - SAMP</option>
   <option value="MPA-SPU">Macapa (AP) - SPU</option>
   <option value="MCO-SPU">Maceio (AL) - SPU</option>
   <option value="MMS-SPU">Manaus (AM) - SPU</option>
   <option value="NTL-SPU">Natal (RN) - SPU</option>
   <option value="PMJ-SPU">Palmas (TO) - SPU</option>
   <option value="PNA-SPU">Parnaiba (PI) - SPU</option>
   <option value="PAE-SPU">Porto Alegre (RS) - SPU</option>
   <option value="PVO-SAMP">Porto Velho (RO) - SAMP</option>
   <option value="PVO-SPU">Porto Velho (RO) - SPU</option>
   <option value="RCE-SPU">Recife (PE) - SPU</option>
   <option value="RBO-SAMP">Rio Branco (AC) - SAMP</option>
   <option value="RBO-SPU">Rio Branco (AC) - SPU</option>
   <option value="RJO-SPU">Rio de Janeiro (RJ) - SPU</option>
   <option value="SDR-SPU">Salvador (BA) - SPU</option>
   <option value="SNT-SPU">Santos (SP) - SPU</option>
   <option value="SLS-SPU">Sao Luis (MA) - SPU</option>
   <option value="SPO-SPU">Sao Paulo (SP) - SPU</option>
   <option value="TSA-SPU">Teresina (PI) - SPU</option>
   <option value="VTA-SPU">Vitoria (ES) - SPU</option>
  </select>
  </td>
 </tr>
 <tr>
  <td>
   <input type="button" id="btnsrchVols" value="Exibir Volumes" onclick="srchVols()" style="margin-top: 5px;"/>
  </td>
 </tr>
</table>
</form>

<div id="srchResult" style="margin-top: 20px;">
</div>

</html>
