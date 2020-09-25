<?php 

	namespace A;

	class Cliente  implements Cadastro {
		public $nome = 'Jorge';

		public function __construct() {
			echo "<pre>";
			print_r(get_class_methods($this));
			echo "</pre>";			
		}

		public function __get($attr) {
			return $this->$attr;
		}

		public function salvar() {
			echo 'Salvar';
		}
	}

	interface Cadastro {
		public function salvar();
	}

	//=========================================
	namespace B;

	class Cliente  implements \A\Cadastro {
		public $nome = 'Jorge';

		public function __construct() {
			echo "<pre>";
			print_r(get_class_methods($this));
			echo "</pre>";			
		}

		public function __get($attr) {
			return $this->$attr;
		}

		public function salvar() {
			echo 'Salvar';
		}

		public function excluir() {
			echo 'Excluir';
		}
	}


	interface Cadastro {
		public function excluir();
	}

	//==========================================

	$x = new \A\Cliente();
	$y = new \B\Cliente();

	print_r($x);
	echo $x->__get('nome');

?>