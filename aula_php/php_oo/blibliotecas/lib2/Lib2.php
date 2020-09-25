<?php 

	namespace B;

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

		public function excluir() {
			echo 'Excluir';
		}
	}


	interface Cadastro {
		public function excluir();
	}

?>