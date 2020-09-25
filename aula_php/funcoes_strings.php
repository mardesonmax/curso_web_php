<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php
		// strtolower($texto) -> Tranformma todos os carateres em minúsculos
		// strtoupper($texto) -> Transforma todos os carateres em maiúsculos
		// ucfirst($texto) -> Transforma o primeiro caracter am maiúsculo
		// strlen($texto) -> Conta os caracteres da string
		// str_replace(<procurar>, <subistituir>, $texto) -> Substitui uma cadeia de caracteres por outra 
		// substr($texto, <posicao inicial>, <qtde caracteres>) -> Retorna parte de uma string

		$texto = 'curso compelto de PHP';

		//tower -------------------------
		echo "Original: $texto" . '<br/><hr>';
		echo strtolower($texto).'<br/><hr>';
		echo strtoupper($texto).'<br/><hr>';
		echo ucfirst($texto).'<br/><hr>';
		echo strlen($texto).'<br/><hr>';
		echo str_replace('PHP', 'NudeJS', $texto).'<br/><hr>';
		echo substr($texto, 0, 14).' ...<br/>';

	?>
</body>
</html> 


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>