<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php
		$lista_coisas = [];

		$lista_coisas['frutas'] = [1 => 'Banana', 2 => 'Uva', 3 => 'Abacaxi', 4 => 'Maça'];

		$lista_coisas['pessoas'] = [1 => 'João', 2 => 'Marcos', 3 => 'Max'];

		echo '<pre>';
		print_r($lista_coisas);
		echo '<pre/>';

		echo '<hr>';
		echo ($lista_coisas['pessoas'][3]). '<br>';
		echo ($lista_coisas['frutas'][3]). '<br>';
	?>
</body>
</html> 
