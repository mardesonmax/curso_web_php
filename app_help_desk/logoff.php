<?php
	
	session_start();

	// unset() destroi um indice do array session

	// unset($_SESSION['X']);


	// destruir a sessão 
	session_destroy();
	header('Location: index.php'); 


?>