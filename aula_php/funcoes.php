<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php

		//void (sem retorno)
		function exibirBoasVindas() {
			echo 'Bem-vindo ao curso de PHP!<br/>';
		}

		exibirBoasVindas();

		//return (com retorno)
		function calcularAreaTerreno($largura, $comprimento) {

			$area = $largura * $comprimento;

			return $area;
		}

		$res = calcularAreaTerreno(30, 50);
		echo $res;

	?>
</body>
</html> 