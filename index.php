<?php
include("header.php");
	if (isset($_POST['publish'])) {
		if ($_FILES["file"]["error"] > 0) {
			$texto = $_POST["texto"];
			$hoje = date("Y-m-d");

			if ($texto == "") {
				echo "<h3>A publicãção não pode estar em branco!</h3>";
			}else{
				$query = "INSERT INTO pubs (user,texto,data) VALUES ('$login_cookie','$texto','$hoje')";
				$data = mysql_query($query) or die();
				if ($data) {
					header("Location: ./");
				}else{
					echo "Alguma coisa deu errado... Tenta outra vez mais tarde";
				}
			}
		}else{
			$n = rand(0, 1000000);
			$img = $n.$_FILES["file"]["name"];

			move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".$img);

			$texto = $_POST['texto'];
			$hoje = date("Y-m-d");

			if ($texto == "") {
				echo "<h3>A publicãção não pode estar em branco!</h3>";
			}else{
				$query = "INSERT INTO pubs (user,texto,imagem,data) VALUES ('$login_cookie','$texto','$img','$hoje')";
				$data = mysql_query($query) or die();
				if ($data) {
					header("Location: ./");
				}else{
					echo "Alguma coisa deu errado... Tenta outra vez mais tarde";
				}
			}
		}
	}
?>

<html>
	<header>
		<style type="text/css">
			div#publish{width: 400px; height: 210px; display: block; margin: auto; border: none; border-radius: 5px; background: #FFF; box-shadow: 0 0 6px #000; margin-top: 30px;}
			div#publish textarea{width: 365px; height: 100px; display: block; margin: auto; border-radius: 5px; padding-left: 5px; padding-top: 5px; border-width: 1px; border-color: #A1A1A1;}
			div#publish img{margin-top: 50px;margin-left: 10px;width: 40px;cursor: pointer;}
			div#publish input[type="submit"]{width: 70px;height: 25px;border-radius: 3px; float: right; margin-right: 15px; border:none; margin-top: 5px; background: #4169E1; color: #FFF; margin-top: 55px;}
			div#publish input[type="submit"]:hover{background: #001F3F;cursor: pointer;}
		</style>
	</header>

	<body>
		<div id = "publish">
			<form method="POST" enctype="multipart/from-data">
				<br />
				<textarea placeholder="Compartilhe suas ideias..." name="texto"></textarea>
				
				<label for="file-input">
					<img src="img/imagegrey.png" title="Inserir fotos" />
				</label>

				<input type="submit" value="Publicar" name="publish" />
				<input type="file" id="file-input" name="file" hidden />

			</form>
		</div>
		
	</body>
</html>