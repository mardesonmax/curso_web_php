<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Curso PHP</title>
</head>
<body>
	<?php 

		//Operadores condicionais/comparação
		//Igual				==
		//Identico			=== 
		//Diferente			!= ou <> 
		//Não identico  	!==
		//Menor 			< 
		//Maior 			>
		//Menor ou Igual 	<=
		//Maior ou Igual 	>= 

		//Operadores logicos
		/*
			E: && ou AND -> Retorna true se todas as condições for verdadeiras
			Ou: || ou OR -> Retorna verdadeiro se pelomenos uma condição for verdadeira
		
			XOR: XOR -> Retorna verdadeiro se uma condição for verdadeira e o resto falsa
						Retorna falso se uma codição for falsa e o resto verdadeiras

			!  ->  investe o resultado pela expressão
		*/

		
		//Loja
		$usuario_cartao_da_loja = false; //Cartão

		$valor_compra = 50; //Valor da compra

		$valor_frete = 30; //Valor do frete

		$valor_frete_desconto; //Valor do frete com desconto

		$recebeu_desconto_frete = true; //Recebeu desconto

		if($usuario_cartao_da_loja) {

			$valor_frete_desconto = 0;

		} else if($valor_compra >= 120) { //Caso não tenha o cartão e a comrpa seja maior ou igual a 120

			$desconto= 50/100 * $valor_frete; //deconto de 50%

			$valor_frete_desconto = $valor_frete - $desconto; //aplicando desconto

		} else {
			$recebeu_desconto_frete = false;
		}



	?>
	<!-- Operador ternario -->
	<!-- <condição> ? true : false;  -->
	<h1>Resumo da compra</h1>
	<p>Possui cartão da loja? <?= $usuario_cartao_da_loja ? 'SIM' : 'NÃO'; ?></p>
	<p>Valor da compra R$ <?= $valor_compra ?></p>
	<p>Recebeu desconto: <?= $recebeu_desconto_frete ? 'SIM' : 'NÃO' ?></p>
	<p>Valor do frete R$ <?= $recebeu_desconto_frete ? "$valor_frete com desconto R$ $valor_frete_desconto" : $valor_frete ?></p>
</body>
</html>