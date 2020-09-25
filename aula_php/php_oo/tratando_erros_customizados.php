<?php 
	
	class MinhaExeptionCustomizada extends Exception {

		private $erro = '';

		public function __construct($erro) {
			$this->erro = $erro;
		}

		public function exibirErro() {
			echo '<div style="border: 1px solid #000; padding: 20px; color: #fff; text-align: center; background: red;">';
			echo $this->erro;
			echo '</div>';
		}
	}

	 try {

	 	throw new MinhaExeptionCustomizada("Esse é um erro de teste");	 	

	 }	catch (MinhaExeptionCustomizada $e) {
	 	$e->exibirErro();
	 }

?>