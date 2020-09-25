<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php
		/*
		//Data atual
		echo date('d/m/Y H:i') . '<br>';

		//------------------
		date_default_timezone_set('America/Fortaleza');

		echo date_default_timezone_get() . '<br>';

		echo date('d/m/Y H:i');
		*/

		$data_inicial = '2020-05-24';
		$data_final = '2020-08-10';

		$time_inicial = strtotime($data_inicial);
		$time_final = strtotime($data_final);

		echo $data_inicial . ' - ' . $time_inicial . '<br>';
		echo $data_final . ' - ' . $time_final . '<br>';

		$diferenca_times = abs($time_inicial - $time_final);


		echo "A diferença em segundos entre a data $data_inicial e $data_final é " . $diferenca_times . '<br>';
		$dias_em_segundos = 24 * 60 * 60;
		echo $dias_em_segundos . '<br>';
		echo "A diferença em dias entre a data $data_inicial e $data_final é " . $diferenca_times / $dias_em_segundos . '<br>';





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