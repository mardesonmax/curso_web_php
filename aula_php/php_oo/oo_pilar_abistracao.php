<?php 
	// modelo
	class Funcionario {

		//atributos
		public $nome = null;
		public $telefone = null;
		public $numFilhos = null;
		public $cargo = null;
		public $salario = null;

		// getters setters overloadin / sobrecarga
		function __set($atributo, $valor) {
			$this->$atributo = $valor;
		}

		function __get($atributo) {
			return $this->$atributo;
		}


		/*
		// setters 
		function setNome($nome) {
			$this->nome = $nome;
		}

		function setTelefone($telefone) {
			$this->telefone = $telefone;
		}

		function setNumFilhos($numFilhos) {
			$this->numFilhos = $numFilhos;
		}

		// getters
		function getNome() {
			return $this->nome;
		}

		function getTelefone() {
			return $this->telefone;
		}

		function getNumFilhos() {
			return $this->numFilhos;
		}
		*/

		// métodos
		function resumirCadFunc() {

			$nome = $this->__get('nome');
			$telefone = $this->__get('telefone');
			$filhos = $this->__get('numFilhos');
			$cargo = $this->__get('cargo');
			$salario = $this->__get('salario');
			
			return "$nome possui $filhos filho(s), cargo: $cargo, salario: $salario, numero para contato $telefone<br>";
		}

		function modNumFilhos($numFilhos) {
			$this->__set('numFilhos', $numFilhos);
		}
	}

	$fun = new Funcionario();

	$fun->__set('nome', 'Max');
	$fun->__set('telefone', '85 98853-2761');
	$fun->__set('numFilhos', 0);
	$fun->__set('cargo', 'Desenvolverdor WEB');
	$fun->__set('salario', '5200');

	$fun-> modNumFilhos(1);

	echo $fun->resumirCadFunc();
	
	echo 'Olá ' . $fun->__get('nome') . ', seja bem-vindo!';



?>