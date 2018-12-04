<!--

var ip = "<?php echo $_SERVER['SERVER_NAME']; ?>";
	
function goMoodle(){
	var User = document.getElementById("User");
	var Password = document.getElementById("Password");
	document.loginform.action = "/moodle/login/index.php"
	document.loginform.target = "_blank";
	document.loginform.User.id = "username";
	document.loginform.User.setAttribute("name", "username");
	document.loginform.Password.id = "password";
	document.loginform.Password.setAttribute("name", "password");
}

function goItsmAgent(){
	var User = document.getElementById("User");
	var Password = document.getElementById("Password");
	document.loginform.target = "_blank";
	document.loginform.action = "/otrs/index.pl"
	document.loginform.User.id = "User";
	document.loginform.User.setAttribute("name", "User");
	document.loginform.Password.id = "Password";
	document.loginform.Password.setAttribute("name", "Password");
}

function goItsmCustomer(){
	var User = document.getElementById("User");
	var Password = document.getElementById("Password");
	document.loginform.target = "_blank";
	document.loginform.action = "/otrs/customer.pl"
	document.loginform.User.id = "User";
	document.loginform.User.setAttribute("name", "User");
	document.loginform.Password.id = "Password";
	document.loginform.Password.setAttribute("name", "Password");
}

function goZabbix(){
	var User = document.getElementById("User");
	var Password = document.getElementById("Password");
	document.loginform.action = "/zabbix/index.php?enter=Sign in"
	document.loginform.target = "_blank";
	document.loginform.User.id = "name";
	document.loginform.User.setAttribute("name", "name");
	document.loginform.Password.id = "password";
	document.loginform.Password.setAttribute("name", "password");
}

function exitHub(){
	document.loginform.action = "/logout.php"
	document.loginform.target = ""
}

function debugForm(){
	var User = document.getElementById("User");
	var Password = document.getElementById("Password");
	document.loginform.action = "./get.php"
	document.loginform.target = "_blank";
	document.loginform.User.id = "username";
	document.loginform.User.setAttribute("name", "username");
	document.loginform.Password.id = "password";
	document.loginform.Password.setAttribute("name", "password");
}

function goGitLab(){
	var User = document.getElementById("User");
	var Password = document.getElementById("Password");
	document.loginform.action = "/gitlab/users/sign_in"
	document.loginform.target = "_blank";
	document.loginform.User.id = "username";
	document.loginform.User.setAttribute("name", "username");
	document.loginform.Password.id = "password";
	document.loginform.Password.setAttribute("name", "password");
}

function goOpenProject(){
	var User = document.getElementById("User");
	var Password = document.getElementById("Password");
	document.loginform.action = " /openproject/login"
	document.loginform.target = "_blank";
	document.loginform.User.id = "username";
	document.loginform.User.setAttribute("name", "username");
	document.loginform.Password.id = "password";
	document.loginform.Password.setAttribute("name", "password");
}

-->