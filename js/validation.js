function checkLogin(){
	if (window.location.href.indexOf("LoginFailed") > -1) {
		shake($('#modalLogin'));
		$('#alertError').html("Login e/ou senha incorreto(s)!");
		$('#alertError').slideDown('fast', function(){});
	} else if(window.location.href.indexOf("ServerFail") > -1) {
		//$('#modalLogin').effect('shake', {times:4}, 1000 );
		shake($('#modalLogin'));
		$('#alertError').html("Sem conexão aos servidores de autenticação!");
		$('#alertError').slideDown('fast', function(){});
	}
}

function shake(div) {
	var interval = 60;
	var distance = 10;
	var times = 4;

	$(div).css('position', 'relative');

	for (var iter = 0; iter < (times + 1) ; iter++) {
		$(div).animate({
			left: ((iter % 2 == 0 ? distance : distance * -1))
		}, interval);
	}
	$(div).animate({ left: 0 }, interval);
}

