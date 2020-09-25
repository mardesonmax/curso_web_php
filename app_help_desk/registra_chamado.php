<?php 
	session_start();

	$usuario_id = $_SESSION['usuario']['id'];
	// Tratando texto
	$conteudo = str_replace('#', '-', $_POST); //substitundo # por - se ouver

	$conteudo['id'] = $usuario_id;

	$texto = implode('#', $conteudo). PHP_EOL; //formatando o texto colocando #para separar

	// Abrindo arquivo e salvando informações
	$arquivo = fopen('../../app_help_desk/arquivo.hd', 'a'); //abre o arquivo

	fwrite($arquivo, $texto);	//escreve no arquivo

	fclose($arquivo); //fecha o arquivo

	header("Location: consultar_chamado.php");

?>