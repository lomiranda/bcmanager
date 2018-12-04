<html>
<head>
</script>
</head>

<body>

	<?php
	session_start();

	if($_SESSION['clientuser'] == "Todas Regionais" || $_SESSION['clientuser'] == "todos"){
		echo "<iframe style='width: 100%; height: 80%; display:block; verflow:hidden;'
		src='http://10.209.8.205:3000/dashboard/db/bacula-jobs' frameborder='0'></iframe>";
	} else {
		echo "<div style='width: 40%; height: 15%; position: absolute; display:block; z-index:2;'></div>
		<iframe style='width: 100%; height: 80%; display:block; verflow:hidden;'
		src='http://10.209.8.205:3000/dashboard/db/bacula-client-view?var-Regional=" . $_SESSION['clientuser'] . "' frameborder='0'></iframe>";
	}
	?>

</body>
</html>
