<?php
	include("db.php");

	if(isset($_POST['entrar'])){
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$verifica = mysql_query("SELECT * FROM users  WHERE email = '$email' AND password = '$pass'");
		if(mysql_num_rows($verifica)<=0){
			echo "<h3>Email ou senha incorretos</h3>";
		}else{
			setcookie("login", $email);
			header("location: ./");
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<!-- Fonte Montserrat -->
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
		
		<style type="text/css">
			/*Fonte Montserrant*/
			*{font-family: 'Montserrat', cursive;}

			/*Logo*/
			img{display: block; margin: auto; margin-top: 20px; width: 200px;}

			/*Formulario*/
			form{text-align: center; margin-top: 20px;}

			/*Email*/
			input[type = "email"]{border-width: 1px; border: solid; border-color: #CCC; border-radius: 3px; 
				width: 250px; height: 25px; padding-left: 10px;}

			/*Senha*/
			input[type = "password"]{border-width: 1px; border: solid; border-color: #CCC; border-radius: 3px;
				width: 250px; height: 25px; padding-left: 10px; margin-top: 10px;}

			/*Botao Logar*/
			input[type = "submit"]{border: none; width: 80px; height: 30px; margin-top: 20px;}

			/*Botao Logar Mouse Por cima*/
			input[type = "submit"]:hover{background-color: #1E90FF;color: #FFF;cursor: pointer;}

			h2{text-align: center;margin-top: 20px;}
			h3{text-align: center; color: #1E90FF; margin-top: 20px;}
			a{text-decoration: none; color: #333;}
		</style>

	</head>

	<body>
		<!--Logo-->
		<img src="img/logo.png"><br />
		<h2>Fazer Login</h2>
		
		<!--CAMPO DE LOGIN-->
			<form method="POST">
				<!--EMAIL-->
				<input type="email" placeholder="Endereço email" name="email"><br />
				<!--SENHA-->
				<input type="password" placeholder="Senha" name="pass"><br />
				<!--BOTAO DE LOGIN-->
				<input type="submit" value="Entrar" name="entrar">
			</form>
		<!--FIM DO CAMPO DE LOGIN-->

		<h3>Ainda não tem uma conta?<a href="registrar.php"> Crie uma agora mesmo!</a></h3>
	</body>
</html>


