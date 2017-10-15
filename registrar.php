<?php
	include("db.php");
	
	if (isset($_POST['criar'])) {
		$nome = $_POST['nome'];
		$apelido = $_POST['apelido'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$data = date("Y/m/d");

		$email_check = mysql_query("SELECT email FROM users WHERE email='$email'");
		$do_email_check = mysql_num_rows($email_check);

		if ($do_email_check >= 1) {
			echo '<h3>Este email já está registado, faça o login <a href="login.php">aqui</a></h3>';
		} elseif ($nome == '' OR strlen($nome)<3) {
			echo '<h3>O nome precisa ser maior</h3>';
		} elseif ($email == '' OR strlen($email)<7) {
			echo '<h3>Email precisa ser maior</h3>';
		} elseif ($pass == '' OR strlen($pass)<8) {
			echo '<h3>A senha tem que ter mais que 8 caracteres!</h3>';
		} else{
			$query = "INSERT INTO users (`nome`,`apelido`,`email`,`password`,`data`) VALUES ('$nome','$apelido','$email','$pass','$data')";
			$data = mysql_query($query) or die(mysql_error());
			if ($data) {
				setcookie("login",$email);
				header("Location: ./");
			} else{
				echo "<h3>Ocorreu um erro ao te registrar</h3>";
			}
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

			input[type = "text"]{border-width: 1px; border: solid; border-color: #CCC; border-radius: 3px; 
				width: 250px; height: 25px; padding-left: 10px;  margin-top: 10px;}

			/*Email*/
			input[type = "email"]{border-width: 1px; border: solid; border-color: #CCC; border-radius: 3px; 
				width: 250px; height: 25px; padding-left: 10px;  margin-top: 10px;}

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
		<h2>Criar uma conta</h2>
		
		<!--CAMPO DE LOGIN-->
			<form method="POST">
				<!--NOME-->
				<input type="text" placeholder="Primeiro nome" name="nome"><br />
				<!--APELIDO-->
				<input type="text" placeholder="Nickname" name="apelido"><br />
				<!--EMAIL-->
				<input type="email" placeholder="Endereço email" name="email"><br />
				<!--SENHA-->
				<input type="password" placeholder="Senha" name="pass"><br />
				<!--BOTAO DE LOGIN-->
				<input type="submit" value="Criar" name="criar">
			</form>
		<!--FIM DO CAMPO DE LOGIN-->
		<h3>Já possui uma conta?<a href="login.php"> Entre com ela!</a></h3>
	</body>
</html>