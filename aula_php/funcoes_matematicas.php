<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php
		$num = 9.55;

		echo ceil($num) . '<br><hr>'; //arredonda para cima
		echo floor($num) . '<br><hr>'; //arredonda para baixo
		echo round($num) . '<br><hr>'; //arredonda com base na fração - entre 0 e 4 arredonda bara baixo entre 5 e 9 arrendo para cima

		
		echo 'Valor maximo que pode ser gerado: ' . getrandmax() . '<br>';
		echo 'Valor gerado: ' . rand(10, 20) . '<br><hr>'; //Gera um numero aleatorio

	 	echo "Raiz quadrada de $num = " . sqrt($num);


	?>
</body>
</html> 


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>