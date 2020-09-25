<?php 

	require "./blibliotecas/lib1/Lib1.php";
	require "./blibliotecas/lib2/Lib2.php";

	//indicando o namespace
	use A\Cliente as C1;  //apelidando o namespace
	use B\Cliente;  

	$c = new Cliente(); //atribuindo instancia

	print_r($c);
	$c->__get('nome');

	//===============================
	echo '<hr>';

	$c = new C1(); //atribuindo instancia

	print_r($c);
	$c->__get('nome');

?>