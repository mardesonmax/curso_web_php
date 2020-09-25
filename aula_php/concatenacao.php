<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php 
	$nome = 'Jorge';
	$idade = 29;
	$cor = 'verde';
	$gosta = 'Video Gamer';

	// aspas simples
	echo 'Olá '.$nome.', vi que sua cor preferida é '.$cor.', estou vendo tabem que vc tem '.$idade.' anos e gosta de '.$gosta;

	echo '<br>';

	// aspas duplas
	echo "Olá $nome, vi que sua cor preferida é $cor, estou vendo tabem que vc tem $idade anos e gosta de $gosta";
	?>
</body>
</html>