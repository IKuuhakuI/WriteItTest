<?php
	include("header.php");
?>

<html>
	<header>
		<style type="text/css">
			h3{text-align: center; font-size: 32px; color: #666;}
			h2{text-align: center; font-size: 46px; color: #666;}
			p[name="p"]{display: block;margin: auto;font-size: 20px;text-align: center;color: #FFF;max-width: 700px;}
			a[name="p"]{color: #111; text-decoration: none;}
			hr{border: 1px solid #666; width: 500px; display: block; margin:auto;}
		</style>
	</header>
	<body>
		<h3>Resultados da sua pesquisa</h3><br />
		<?php
			$query = $_GET['query'];

			$min_lenght = 3;

			if(strlen($query)>=$min_lenght){
				$query = htmlspecialchars($query);

				$query = mysql_real_escape_string($query);

				$raw_results = mysql_query("SELECT * FROM users WHERE (`apelido` LIKE '%".$query."%')") OR die(mysql_error());

				if (mysql_num_rows($raw_results) > 0) {
					
					while ($results = mysql_fetch_array($raw_results)) {
						echo '<a href="profile.php?id='.$results["id"].'" name="p"><p name="p"><h3>'.$results["apelido"].'</h3></p></a><hr /><br />';
					}
				} else{
					echo"<br /><h3>Não foram encontrados resultados</h3>";
				}
			} else{
				echo"<br /><h3>O nome precisa de no mínimo 3 letras</h3>";
			}
		?>
		<div id="footer"><p>&copy; Write It, 2017 - Todos os direitos Reservados</p></div>
	</body>
</html>