<?php 

	class Pai {
		private $nome = 'Max'; //restrito ao objeto
		protected $sobrenome = 'Pereira';
		public $humor = 'Feliz';

		public function __get($attr) {
			return $this->$attr;
		}

		// pode ser acessado diretamente
		public function __set($attr, $value) {
			$this->$attr = $value;
		}
		
		// não pode ser acessado diretamente
		private function executarMania() {
			echo 'Assobiar';
		}

		// não pode ser acessado diretamente
		protected function responder() {
			echo 'Olá';
		}

		//Usado para chamar as functions private/protected
		public function executarAcao() {
			$this->executarMania();
			echo '<br/>';
			$this->responder();
		}
	}

	//extends não erda private
	class Filho extends Pai {
		public function __construct() {
			echo '<pre>';
			//debug de metodos do objeto
			print_r(get_class_methods($this));
			echo '</pre>';
		}

		// não modifica o valor da function do objeto pai
		//private não é sobreposto
		private function executarMania() { 
			echo 'Cantar';
		}

		// modifica o valor da function do objeto pai
		protected function responder() {
			echo 'Oi';
		}
	}

	$filho = new Filho();

	echo '<pre>';
	print_r($filho);
	echo '</pre>';

	$filho->executarAcao();

	
	

?>