<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php
		$registro = [
			'Noticia 1' => [
				'titulo' => 'Titulo notícia 1', 
				'conteudo' => 'conteudo da notícia 1'
			],
			'Noticia 2' => [
				'titulo' => 'Titulo notícia 2', 
				'conteudo' => 'conteudo da notícia 2'
			], 
			'Noticia 3' => [
				'titulo' => 'Titulo notícia 3',
				'conteudo' => 'conteudo da notícia 3'
				],
			'Noticia 4' => [
				'titulo' => 'Titulo notícia 4', 
				'conteudo' => 'conteudo da notícia 4'
			],
			'Noticia 5' => [
				'titulo' => 'Titulo notícia 5', 
				'conteudo' => 'conteudo da notícia 5'
			]
		];

		

		$idN = 0;
		$qtde_noticia = count($registro); //Conta quantos registro tem no array

		foreach ($registro as $key => $noticia) {

			echo '<h3>' . $key .'</h3>';
			echo 'Titulo da notícia: '. $noticia['titulo'] .'<br>';
			echo 'Conteudo da notícia: '. $noticia['conteudo'] .'<br>';
			echo '<hr>';
		}


	?>

</body>
</html>