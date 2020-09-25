<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php
		/*
		// $lista_frutas = array('Banana', 'Maça', 'Morango', 'Uva');
		$lista_frutas = ['Banana', 'Maça', 'Morango', 'Uva'];

		$lista_frutas[] = 'Abacaxi';

		echo '<pre>';
		var_dump($lista_frutas);
		echo '<pre/><br><hr>';

		echo $lista_frutas[1];
		*/

		//Array associativos
		 $lista_frutas = [
		 	'a' => 'Banana', 
		 	'b' => 'Maça', 
		 	'c' => 'Morango', 
		 	'd' => 'Uva'
		 ];

		echo '<pre>';
		var_dump($lista_frutas);
		echo '<pre/><br><hr>';
	?>
</body>
</html> 
