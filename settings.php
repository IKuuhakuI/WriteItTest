<?php
	include("header.php");

	$infoo = mysql_query("SELECT * FROM users WHERE email='$login_cookie'");
	$info = mysql_fetch_assoc($infoo);

	if (isset($_POST['criar'])) {
		$nome = $_POST['nome'];
		$apelido = $_POST['apelido'];
		$pass = $_POST['pass'];

		if($nome==""){
			echo "<h2>Informe o seu Nome</h2>";
		}elseif($apelido==""){
			echo "<h2>Informe o seu Nickname</h2>";
		}elseif($pass==""){
			echo "<h2>Informe o sua Senha</h2>";
		}else{
			$query = "UPDATE users SET `nome`='$nome', `apelido`='$apelido', `password`='$pass' WHERE email='$login_cookie'";
			$data = mysql_query($query);
			if ($data) {
				header("Location: myprofile.php");
			}else{
				echo "<h2>Ocorreu um erro</h2>";
			}
		}
	}

	if (isset($_POST['cancel'])) {
		header("Location: myprofile.php");
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
			img[name="p"]{display: block; margin: auto; margin-top: 20px; width: 200px;}

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
			input[type = "submit"]{border: none; width: 100px; height: 30px; margin-top: 20px;}

			/*Botao Logar Mouse Por cima*/
			input[type = "submit"]:hover{background-color: #1E90FF;color: #FFF;cursor: pointer;}

			h2{text-align: center;margin-top: 20px;}
			h3{text-align: center; color: #1E90FF; margin-top: 20px;}
			a{text-decoration: none; color: #333;}
		</style>

	</head>

	<body>
		<!--Logo-->
		<img name="p" src="img/logo.png"><br />
		<h2>Mudar suas informações</h2>
		
		<!--CAMPO DE LOGIN-->
			<form method="POST">
				<!--NOME-->
				<input type="text" placeholder="Primeiro nome" value="<?php echo $info['nome'];?>" name="nome"><br />
				<!--APELIDO-->
				<input type="text" placeholder="Nickname" value="<?php echo $info['apelido'];?>" name="apelido"><br />
				<!--SENHA-->
				<input type="password" placeholder="Senha" value="<?php echo $info['password'];?>" name="pass"><br />
				<!--BOTAO DE LOGIN-->
				<input type="submit" value="Atualizar info" name="criar">&nbsp;&nbsp;&nbsp;<input type="submit" value="Cancelar" name="cancel">
			</form>
		<!--FIM DO CAMPO DE LOGIN-->
	</body>
</html>