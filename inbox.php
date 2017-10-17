<?php
	include("header.php");

	$sql = mysql_query("SELECT * FROM mensagens WHERE para='$login_cookie' ORDER BY id");

	$ups = mysql_query("SELECT * FROM mensagens WHERE para='$login_cookie' AND status=0");
	$contagem = mysql_num_rows($ups);

?>

<html>
	<header>
		<style type="text/css">
			
		</style>
	</header>
	<body>
		<h2>Chat</h2>
		<form method="POST">
			<div>
				<?php
					if($contagem==0){
						echo"<h3>Sem conversas</h3>";
					} else{
						while ($img=mysql_fetch_assoc($sql)) {
							$from = $msg["de"];
							$tudo = mysql_query("SELECT * FROM users WHERE email='$from'");
							$img = mysql_fetch_assoc($tudo);
							$conta = mysql_query("SELECT * FROM mensagens WHERE de='$from' AND para='$login_cookie' AND status=0");
							$contar = mysql_num_rows($conta);

							echo'<br /><a name="d" href="chat.php?from='.$img['id'].'<div id="box"><br /><p>'.$img["apelido"].'-'.$contar.'mensagens novas</p><br />
							</div></a><br />
							<br />';

						}
					}
				?>
			</div>
		</form>
	</body>
</html>
