<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php 

	$idade = 20;
	$peso = 54;

	// echo ($idade >= 16 && $idade <= 69 && $peso > 50) ? 'Atende aos requisitos' : 'Não atende aos requisitos';

	if(($idade >= 16 && $idade) &&  $peso > 50) {
		echo 'Atende aos requisitos';
	} else {
		echo  'Não atende aos requisitos';
	}

	?>
</body>
</html>