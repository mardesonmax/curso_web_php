<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php 

		$parametro = 4;

		switch ($parametro) {
			case 1:
				echo 'case 1';
				break;

			case 2:
				echo 'case 2';
				break;
			
			case 3:
				echo 'case 3';
				break;		
			
			default:
				echo 'Nenhum case encontrado';
				break;
		}

	?>
</body>
</html>