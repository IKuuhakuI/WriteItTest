<?php
	include("db.php");

	$login_cookie = $_COOKIE['login'];
	if(!isset($login_cookie)){
		header("Location: login.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
			<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">	
			
			<style type="text/css">

			/*Fonte Montserrant*/
			*{font-family: 'Montserrat', cursive;}

			body{background: #F6F6F6;}

			div#topo{width: 102%; margin-top: -9px; background-color: #fff; box-shadow: 0 0 10px #000; height: 70px; margin-left: -10px;}
			div#topo img[name=logo]{float: left; margin-left: 20px; margin-top: 12px;}
			div#topo img[name=menu]{float: right; margin-right: 25px; margin-top: -28px;}
			div#topo input[type=text]{display: block;margin:auto; width: 300px; border:none; border-radius: 3px; background:#F6F6F6; height: 25px; padding-left: 10px; box-shadow: 0 0 4px #000;}
			div#topo form{margin:auto; width:300px; display: block; padding-top: 25px;}

		</style>
	</head>
	<body>
		<div id="topo">
			<a href="index.php"><img src="img/logo.png" width="150px" name="logo"></a>

			<form method="GET">
				<input type = "text" placeholder="Procure outras pessoas" name = "query" autocomplete="off">
				<input type="submit" hidden>
			</form>
			<a href="#"><img src="img/chat.png" width="30px" name="menu"></a>
			<a href="pedidos.php"><img src="img/pedidos.png" width="50px" name="menu" style="margin-top:-35px;"></a>
			<a href="myprofile.php"><img src="img/perfil.png" width="30px" name="menu"></a>	
		</div>

	</body>
</html>








