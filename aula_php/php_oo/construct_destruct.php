<?php 

	class Pessoa {
		public $nome = null;

		function __construct($nome) {
			$this->__set('nome', $nome);
		}

		function __destruct() {
			echo 'Objeto removido!';
		}

		function __set($atributo, $valor) {
			$this->$atributo = $valor;
		}

		function __get($atributo) {
			return $this->$atributo;
		}

		function correr() {
			return $this->__get('nome'). ' está correndo';
		}
	}

	$pessoa = new Pessoa('Jorge');

	echo $pessoa->correr().'<br/>';

	//unset($pessoa);


?>