<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<h3>Exibi ao menos uma vez o codigo</h3>
	<?php 

		$num = 20;

		echo '===Inicio do loop=== <br/>';
		do {

			echo "Numero: $num <br/>";

			$num++;

		} while ($num < 10); 
		echo '===Fim do loop===' 
	?>
</body>
</html>