<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php 
		$num1 = 18;
		$num2 = 5;


		echo "A soma entre $num1 e $num2 é " . ($num1 + $num2) . '<br>';
		echo "A subtração entre $num1 e $num2 é " . ($num1 - $num2) . '<br>';
		echo "A multiplicação entre $num1 e $num2 é " . ($num1 * $num2) . '<br>';
		echo "A divisão entre $num1 e $num2 é " . ($num1 / $num2) . '<br>';
		echo "O Modulo entre $num1 e $num2 é " . ($num1 % $num2) . '<br>';

		// ---------------------------------------
		$num1 += $num2;
		echo "Somando e atribuindo o resultado em num1: $num1";
	?>
</body>
</html>