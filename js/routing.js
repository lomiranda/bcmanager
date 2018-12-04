var editUserId = '';

$(function () {
  $("#endModal").on("hide.bs.modal", function () {
    window.location.href = "./index.php";
  });
  $("#endModalX").on("click", function () {
    window.location.href = "./index.php";
  });
  $("#drv_status").on("click", function () {
    $('#loading').fadeIn();
    $('#contentArea').load("drvStatus.php",function(){
      $('#loading').fadeOut();
    });
  });
  $("#drv_version").on("click", function () {
    $('#loading').fadeIn();
    $('#contentArea').load("drvVersion.php",function(){
      $('#loading').fadeOut();
    });
  });
  $("#admin").on("click", function () {
    $('#loading').fadeIn();
    $('#contentArea').load("admin.php",function(){
      $('#loading').fadeOut();
    });
  });
  $("#logs").on("click", function () {
    $('#loading').fadeIn();
    $('#contentArea').load("logs.php",function(){
      $('#loading').fadeOut();
    });
  });
  $("#drv_mount").on("click", function () {
    $('#loading').fadeIn();
    $('#contentArea').load("drvMnt.php",function(){
      $('#loading').fadeOut();
    });
  });
  $("#drv_umount").on("click", function () {
    $('#loading').fadeIn();
    $('#contentArea').load("drvUmnt.php",function(){
      $('#loading').fadeOut();
    });
  });
  $("#drv_eject").on("click", function () {
    $('#loading').fadeIn();
    $('#contentArea').load("drvEject.php",function(){
      $('#loading').fadeOut();
    });
  });
  $("#drv_rewind").on("click", function () {
    $('#loading').fadeIn();
    $('#contentArea').load("drvRewind.php",function(){
      $('#loading').fadeOut();
    });
  });
  $("#newUserBtn").on("click", function () {
    $('#loading').fadeIn();
    $('#adminArea').load("addUser.php",function(){
      $('#loading').fadeOut();
    });
  });
  $("#editUserBtn").on("click", function () {
    $('#loading').fadeIn();
    $('#adminArea').load("getUsers.php",function(){
      $('#loading').fadeOut();
    });
  });
  $("#cancelBtn").on("click", function () {
    $('#contentArea').load("admin.php",function(){
      $('#loading').fadeOut();
    });
  });
  $("#cnclBtn").on("click", function () {
    $('#contentArea').load("admin.php",function(){
      $('#loading').fadeOut();
    });
  });
  $("#bcmanager").on("click", function () {
    $("#contentArea").load("./bcblank.php");
  });
  $("#reports").on("click", function () {
    $("#contentArea").load("./reports.php");
  });
  $("#graphs").on("click", function () {
    $("#contentArea").load("./graphs.php");
  });
  $("#schedule").on("click", function () {
    $("#contentArea").load("./schedule.php");
  });
  $("#volumes").on("click", function () {
    $("#contentArea").load("./volumes.php");
  });
  $("#logout").on("click", function () {
    //window.location.href = "./logout.php";
    $("#logoutModal").modal('show');
  });
  $("#tests").on("click", function () {
    $("#dl-menu")._closeMenu();
  });
});

function addNewUser() {
  var newUserName = $("#newUserName").val();
  var newUserLogin = $("#newUserLogin").val();
  var newUserPwd = $("#newUserPwd").val();
  var newUserClnt = $("#newClient").val();
  $("#newClnt").val(newUserClnt);
  var newUserClient = $("#newClnt").val();
  var newUserRole = $("input[type=radio]:checked").val();
  $.post("userAdd.php", { newUserName: newUserName, newUserLogin: newUserLogin, newUserPwd: newUserPwd, newUserRole: newUserRole, newUserClient: newUserClient },
  function(data) {
    $('#infoModal').modal('show');
    $('#infoModalBody').html(data);
    clrNUFields();
  });
}

function showEdit(source){
  editUserId = source;
  $.post("getUserDetails.php", { editUserId: editUserId },
    function(data) {
      $('#results').html(data);
  });
  $('#editUserModal').modal('toggle');
}

function editUserModalOK(){
  var editUserLogin = $("#newLogin").val();
  var editUserName = $("#newName").val();
  var editUserRole = $("[name='newRole']:checked").val();
  var editUserClnt = $("#newClient").val();
  $("#newClnt").val(editUserClnt);
  var editUserClient = $("#newClnt").val();
  var editUserPass = $("#newPass").val();
  $.post("userEdit.php", { editUserId: editUserId, editUserLogin: editUserLogin, editUserName: editUserName, editUserRole: editUserRole, editUserPass: editUserPass, editUserClient: editUserClient },
  function(data) {
    $('#editUserModal').modal('toggle');
    $('#infoModal').modal('show');
    $('#infoModalBody').html(data);
    $('#adminArea').load("getUsers.php",function(){
      $('#loading').hide();
    });
  });
}

function editUserModalCncl(){
  $('#editUserModal').modal('toggle');
  $('#loading').fadeOut();
}

function delUser(source){
  var userLogin = source;
  $.post("userDel.php", { userLogin: userLogin },
  function(data) {
    $('#infoModal').modal('show');
    $('#infoModalBody').html(data);
    $('#adminArea').load("getUsers.php",function(){
      $('#loading').hide();
    });
  });
}

function checkDrvStatus(){
  drvStatusPanel = document.getElementById('drvStatusPanel');
  drvStatusPanel.innerHTML = '<?php system("/etc/bacula/tools/check_mounted.sh") ?>';
}

function drvMnt(){
  checkboxes = document.getElementsByName('regional');
  drvToMnt = [];
  j = 0;
  for(var i=0, n=checkboxes.length;i<n;i++) {
    if (checkboxes[i].checked) {
      drvToMnt[j] = checkboxes[i].value;
      j++;
    }
  }
  var drvToMntArray = JSON.stringify(drvToMnt);

  if (drvToMnt == ''){
    $('#errModal').modal('show');
  } else {
    $('#loading').fadeIn();
    $('#mntModalBody').html("Pressione OK para <b>montar</b> os seguintes drives: <br><br>" + drvToMnt.join("<br>"));
    $('#mntModal').modal('show');
  }
}

function mntModalOK(){
  $('#mntModal').modal('toggle');
  $.post("mntDrv.php", { drvToMnt: drvToMnt },
  function(data) {
    $('#resultModal').modal('show');
    $('#resultModalBody').html(data);
    $('#loading').fadeOut();
  });
}

function mntModalCncl(){
  $('#mntModal').modal('toggle');
  $('#loading').fadeOut();
}

function drvUmnt(){
  checkboxes = document.getElementsByName('regional');
  drvToUmnt = [];
  j = 0;
  for(var i=0, n=checkboxes.length;i<n;i++) {
    if (checkboxes[i].checked) {
      drvToUmnt[j] = checkboxes[i].value;
      j++;
    }
  }
  var drvToUmntArray = JSON.stringify(drvToUmnt);

  if (drvToUmnt == ''){
    $('#errModal').modal('show');
  } else {
    $('#loading').fadeIn();
    $('#umntModalBody').html("Pressione OK para <b>desmontar</b> os seguintes drives: <br><br>" + drvToUmnt.join("<br>"));
    $('#umntModal').modal('show');
  }
}

function umntModalOK(){
  $('#umntModal').modal('toggle');
  $.post("umntDrv.php", { drvToUmnt: drvToUmnt },
  function(data) {
    $('#resultModal').modal('show');
    $('#resultModalBody').html(data);
    $('#loading').fadeOut();
  });
}

function umntModalCncl(){
  $('#umntModal').modal('toggle');
  $('#loading').fadeOut();
}

function drvEject(){
  checkboxes = document.getElementsByName('regional');
  drvToEject = [];
  j = 0;
  for(var i=0, n=checkboxes.length;i<n;i++) {
    if (checkboxes[i].checked) {
      drvToEject[j] = checkboxes[i].value;
      j++;
    }
  }
  var drvToEjectArray = JSON.stringify(drvToEject);

  if (drvToEject == ''){
    $('#errModal').modal('show');
  } else {
    $('#loading').fadeIn();
    $('#ejectModalBody').html("Pressione OK para <b>ejetar</b> os seguintes drives: <br><br>" + drvToEject.join("<br>"));
    $('#ejectModal').modal('show');
  }
}

function ejectModalOK(){
  $('#ejectModal').modal('toggle');
  $.post("ejectDrv.php", { drvToEject: drvToEject },
  function(data) {
    $('#resultModal').modal('show');
    $('#resultModalBody').html(data);
    $('#loading').fadeOut();
  });
}

function ejectModalCncl(){
  $('#ejectModal').modal('toggle');
  $('#loading').fadeOut();
}

function drvLoad(){
  checkboxes = document.getElementsByName('regional');
  drvToLoad = [];
  j = 0;
  for(var i=0, n=checkboxes.length;i<n;i++) {
    if (checkboxes[i].checked) {
      drvToLoad[j] = checkboxes[i].value;
      j++;
    }
  }
  var drvToLoadArray = JSON.stringify(drvToLoad);

  if (drvToLoad == ''){
    $('#errModal').modal('show');
  } else {
    $('#loading').fadeIn();
    $('#loadModalBody').html("Pressione OK para <b>carregar</b> os seguintes drives: <br><br>" + drvToLoad.join("<br>"));
    $('#loadModal').modal('show');
  }
}

function loadModalOK(){
  $('#loadModal').modal('toggle');
  $.post("loadDrv.php", { drvToLoad: drvToLoad },
  function(data) {
    $('#resultModal').modal('show');
    $('#resultModalBody').html(data);
    $('#loading').fadeOut();
  });
}

function loadModalCncl(){
  $('#loadModal').modal('toggle');
  $('#loading').fadeOut();
}

function drvRewind(){
  var rewindRegional = $("#rewindRegional").val();
  $("#rewindReg").val(rewindRegional);
  var rewindReg = $("#rewindReg").val();
  if (rewindRegional == ''){
    $('#rewindErrModal').modal('show');
  } else {
    $('#loading').fadeIn();
    $('#rewindModalBody').html("Pressione OK para <b>rebobinar</b> a fita inserida no drive abaixo: <br><br>" + rewindRegional);
    console.log(rewindRegional);
    $('#rewindModal').modal('show');
    $('#rewindModalOK').on("click", function(){
      $('#rewindModal').modal('toggle');
      $.post("rewindDrv.php", { rewindReg: rewindReg },
      function(data) {
        $('#rewindResultModal').modal('show');
        $('#rewindResultModalBody').html(data);
        $('#loading').fadeOut();
      });
    });
  }
}

function rewindModalOK(){
  $('#rewindModal').modal('toggle');
  $.post("rewindDrv.php", { rewindReg: rewindReg },
  function(data) {
    $('#rewindResultModal').modal('show');
    $('#rewindResultModalBody').html(data);
    $('#loading').fadeOut();
    //alert(data);
  });
}

function rewindModalCncl(){
  $('#rewindModal').modal('toggle');
  $('#loading').fadeOut();
}

function clrNUFields(){
  document.getElementById('newUserName').value = '';
  document.getElementById('newUserLogin').value = '';
  document.getElementById('newUserPwd').value = '';
}

function runReport(){
  $('#loading').fadeIn();
  var startDate = $("#startDate").val();
  var endDate = $("#endDate").val();
  var jobLvl = $("#jobLvl").val();
  var jobStts = $("#jobStts").val();
  var jobClnt = $("#jobClnt").val();
  $.post("showReport.php", { startDate: startDate, endDate: endDate, jobStts: jobStts, jobClnt: jobClnt, jobLvl: jobLvl },
  function(data) {
    $('#reportResult').html(data);
    $('#loading').hide();
  });
}

function srchVols(){
  $('#loading').fadeIn();
  var volReg = $("#volReg").val();
  $.post("getVols.php", { volReg: volReg },
  function(data) {
    $('#srchResult').html(data);
    $('#loading').hide();
  });
}

function schedEvent(){
  $('#loading').fadeIn();
  var atQtd = $("#atQtd").val();
  var atUnit= $("#atUnit").val();
  var atAction = $("#atAction").val();
  var atClient = $("#atClient").val();
  $.post("scheduleEvent.php", { atQtd: atQtd, atUnit: atUnit, atAction: atAction, atClient: atClient },
  function(data) {
    alert(data);
    $('#loading').hide();
  });
}

function logoutModalOK(){
  $('#logoutModal').modal('toggle');
  $.post("logout.php", {  },
  function(data) {
    $('#endModal').modal('show');
  });
}

function logoutModalCncl(){
  $('#logoutModal').modal('toggle');
}
