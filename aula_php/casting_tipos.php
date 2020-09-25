<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php 
		$valor = '10.25';
		$valor2 = (int) $valor;
		$valor3 = (float) $valor;

		echo $valor.' '. gettype($valor).'<br/>';		
		echo $valor2.' '. gettype($valor2).'<br/>';		
		echo $valor3.' '. gettype($valor3).'<br/>';		

	?>
</body>
</html>