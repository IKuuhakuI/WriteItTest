<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	$connect = mysql_connect("127.0.0.1", "root") or die("Não foi possivel ligar ao servidor");
	$db = mysql_select_db("aula-rede-social", $connect) or die("Impossível entrar na base de dados");

?>

<html>
	<header>
		<meta charset="utf-8">
		<title>Write It</title>
	</header>
</html>