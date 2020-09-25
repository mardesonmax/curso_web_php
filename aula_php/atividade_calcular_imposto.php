<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php

		function calcularImposto($valor) {

			$res;

			if($valor <= 1903.98) {

				$res = 'Não pagarar impopsto!';

			} else if($valor >= 1903.99 && $valor <= 2826.65) {

				$imposto = 7.5/100 * $valor;

				$res = "Imposto cobrado em R$ $valor é de R$ $imposto"; 

			} else if($valor >= 2826.66 && $valor <= 3751.05) {

				$imposto = 15/100 * $valor;

				$res = "Imposto cobrado em R$ $valor é de R$ $imposto"; 

			} else if($valor >= 3751.06 && $valor <= 4664.68) {

				$imposto = 22.5/100 * $valor;

				$res = "Imposto cobrado em R$ $valor é de R$ $imposto"; 

			} else if($valor > 4664.68) {

				$imposto = 27.5/100 * $valor;

				$res = "Imposto cobrado em R$ $valor é de R$ $imposto";  

			}

			return $res;
		}

		echo calcularImposto(3250.50);

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