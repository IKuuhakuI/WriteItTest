<?php  
	include("header.php");
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

				<input type="submit" value="Publicar" name="Publish" />
				<input type="file" id="file-input" name="file" hidden />

			</form>
		</div>
	</body>
</html>