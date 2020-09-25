<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php 
		define('BD_URL', 'endereco_db_dev');
		define('BD_USUARIO', 'usario_dev');
		define('BD_SENHA', 'senha_dev');

		echo BD_URL . '<br/>';
		echo BD_USUARIO . '<br/>';
		echo BD_SENHA . '<br/>';
	?>
</body>
</html>