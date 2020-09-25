<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php
		$registro = [
			['titulo' => 'Titulo notícia 1', 'conteudo' => 'conteudo da notícia 1'], 
			['titulo' => 'Titulo notícia 2', 'conteudo' => 'conteudo da notícia 2'], 
			['titulo' => 'Titulo notícia 3', 'conteudo' => 'conteudo da notícia 3'],
			['titulo' => 'Titulo notícia 4', 'conteudo' => 'conteudo da notícia 4'],
			['titulo' => 'Titulo notícia 5', 'conteudo' => 'conteudo da notícia 5']
		];

		

		$idN = 0;
		$qtde_noticia = count($registro); //Conta quantos registro tem no array

		for ($x = 0; $x < $qtde_noticia; $x++) {


			echo 'Titulo notícia: ' . $registro[$idN]['titulo'] . '<br/>';
			echo 'Conteudo notícia: ' . $registro[$idN]['conteudo'] . '<br/>';
			echo '<hr>';

			$idN++;
		}


	?>
</body>
</html>