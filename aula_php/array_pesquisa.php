<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php
		
		// array_search()
		$lista_frutas = ['Banana', 'Maça', 'Morango', 'Uva'];
		$lista_pessoas = ['Max', 'João', 'Maria'];

		$lista_coisas = [
			'frutas' => $lista_frutas,
			'pessoas' => $lista_pessoas
		];

		echo '<pre>';
		print_r($lista_coisas);
		echo '</pre>';

		/*
		// Retorna true ou fasle para existencia do que esta sendo pesquisado
		echo '<hr>';
		$fruta = in_array('Maça', $lista_frutas);

		if($fruta) {
			echo 'A fruta pesquisa existe no array';
		} else {
			echo 'A fruta pesquisa não existe no array';
		}
		*/

		//Retorna a posição no array caso encontre ou null se não exitir
		/*
		$fruta = array_search('Uva', $lista_frutas);

		if($fruta != null) {
			echo 'Foi encontrado: ' .$lista_frutas[$fruta];
		} else {
			echo 'Não encontramos nenhum valor!';
		}
		*/

		$fruta = array_search('Banana', $lista_coisas['frutas']);
		// $pessoa = array_search('Max', $lista_coisas['pessoas']);

		if($fruta !== false) {

			echo 'Foi encontrado: ' .$lista_coisas['frutas'][$fruta]. '<br>';
			// echo 'Foi encontrado: ' .$lista_coisas['pessoas'][$pessoa]. '<br>';
			
		} else {
			echo 'Não encontramos nenhum valor!';
		}
	?>
</body>
</html> 
