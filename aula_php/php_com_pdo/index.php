<?php 
	if(!empty($_POST['email']) && !empty($_POST['senha'])) {

		$dsn = 'mysql:host=localhost; dbname=php_com_pdo';
		$usuario = 'root';
		$senha = '';

		try{

			$conexao = new PDO($dsn, $usuario, $senha);
			
			// query 
			$query = "select * from tb_usuarios where";
			$query .= " email = :email";
			$query .= " AND senha = :senha";		

			$stmt = $conexao->prepare($query);

			$stmt->bindValue(':email', $_POST['email']);
			$stmt->bindValue(':senha', $_POST['senha']);

			$stmt->execute();

			$usuario = $stmt->fetch();

			echo '<hr>';
			print_r($usuario);

		} catch(PDOException $e) {
			$erro = [
				'code' => $e->getCode(),
				'msg' => $e->getMessage()
			];

			echo 'Erro: '. $erro['code']. ', Mensagem:'. $erro['msg'];
		}
	}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>

	<form method="post" action="index.php">
		<input type="text" placeholder="E-mail" name="email">
		<br />
		<input type="password" placeholder="Senha" name="senha">
		<br />
		<button type="submit">Entrar</button>
	</form>

</body>
</html>