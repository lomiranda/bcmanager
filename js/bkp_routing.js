$(function () {
    $("#drv_status").on("click", function () {
	$('#loading').show();
	$('#contentArea').load("drvStatus.php",function(){
		$('#loading').hide();
	});
    });
    $("#admin").on("click", function () {
	$('#loading').show();
	$('#contentArea').load("admin.php",function(){
		$('#loading').hide();
	});
    });
    $("#drv_mount").on("click", function () {
	$('#loading').show();
	$('#contentArea').load("drvMnt.php",function(){
		$('#loading').hide();
	});
    });
    $("#drv_umount").on("click", function () {
	$('#loading').show();
	$('#contentArea').load("drvUmnt.php",function(){
		$('#loading').hide();
	});
    });
    $("#drv_eject").on("click", function () {
	$('#loading').show();
	$('#contentArea').load("drvEject.php",function(){
		$('#loading').hide();
	});
    });
    $("#newUserBtn").on("click", function () {
	$('#adminOptions').hide();
	$('#adminForm').show();
	var adminLabel = document.getElementById('adminLabel');
	adminLabel.innerHTML = 'Criar Usuario';
    });
    $("#cancelBtn").on("click", function () {
	$('#adminOptions').show();
	$('#adminForm').hide();
	$('#results').hide();
	var adminLabel = document.getElementById('adminLabel');
	adminLabel.innerHTML = '';
	clrNUFields();
    });
    $("#bcmanager").on("click", function () {
        $("#contentArea").load("./bcblank.php");
    });
    $("#logout").on("click", function () {
        window.location.href = "./logout.php";
    });
});

function addNewUser() {
    var newUserName = $("#newUserName").val();
    var newUserLogin = $("#newUserLogin").val();
    var newUserPwd = $("#newUserPwd").val();
    var newUserRole = $("input[type=radio]:checked").val();
    $.post("userAdd.php", { newUserName: newUserName, newUserLogin: newUserLogin, newUserPwd: newUserPwd, newUserRole: newUserRole },
    function(data) {
	 alert(data);
	 clrNUFields();
    });
}

function checkDrvStatus(){
    drvStatusPanel = document.getElementById('drvStatusPanel');
    drvStatusPanel.innerHTML = '<?php system("/etc/bacula/tools/check_mounted.sh") ?>';
}

function drvMnt(){
    $('#loading').show();
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
    var confMnt = confirm("Pressione OK para desmontar os seguintes drives: \n\n" + drvToMnt.join("\n"));
    if (confMnt == true ) {
	    $.post("mntDrv.php", { drvToMnt: drvToMnt },
	    function(data) {
		alert(data);
		$('#loading').hide();
	    });
    } else {
	$('#loading').hide();
	return;
    }
}

function drvUmnt(){
    $('#loading').show();
    checkboxes = document.getElementsByName('regional');
    drvToUmnt = [];
    j = 0;
    for(var i=0, n=checkboxes.length;i<n;i++) {
        if (checkboxes[i].checked) {
		drvToUmnt[j] = checkboxes[i].value;
		j++;
	}
    }
    var drvToMntArray = JSON.stringify(drvToMnt);
    var confUmnt = confirm("Pressione OK para desmontar os seguintes drives: \n\n" + drvToUmnt.join("\n"));
    if (confUmnt == true ) {
	$.post("umntDrv.php", { drvToUmnt: drvToUmnt },
	    function(data) {
		alert(data);
		$('#loading').hide();
	    });
    } else {
	$('#loading').hide();
	return;
    }
}


function drvEject(){
    $('#loading').show();
    checkboxes = document.getElementsByName('regional');
    drvToEject = [];
    j = 0;
    for(var i=0, n=checkboxes.length;i<n;i++) {
        if (checkboxes[i].checked) {
		drvToEject[j] = checkboxes[i].value;
		j++;
	}
    }
    var drvToMntArray = JSON.stringify(drvToMnt);
    var confEject = confirm("Pressione OK para desmontar os seguintes drives: \n\n" + drvToEject.join("\n"));
    if (confEject == true ) {
	$.post("ejectDrv.php", { drvToEject: drvToEject },
	    function(data) {
		alert(data);
		$('#loading').hide();
	    });
    } else {
	$('#loading').hide();
	return;
    }
}

function clrNUFields(){
    document.getElementById('newUserName').value = '';
    document.getElementById('newUserLogin').value = '';
    document.getElementById('newUserPwd').value = '';
}
