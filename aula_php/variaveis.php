<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php 
		// string 
		$nome = 'Max';

		// int
		$idade = 25;

		// float
		$peso = 55.5;

		// boolean
		$fumante = false;

		if($fumante === false) {
			$fumante = 'Não';
		} else {
			$fumante = 'Sim';
		}
	?>

	<h1>Ficha cadastral</h1>
	<br>
	<p>Nome: <?= $nome ?></p>
	<p>Idade: <?= $idade ?></p>
	<p>Peso: <?= $peso ?></p>
	<p>Fumante: <?= $fumante ?></p>
</body>
</html>