<?php 

	class Veiculo {
		public $placa = null;
		public $cor = null;

		function __construct($placa, $cor) {
			$this->__set('placa', $placa);
			$this->__set('cor', $cor);
		}

		function __set($atributo, $valor) {
			$this->$atributo = $valor;
		}

		function __get($atributo) {
			return $this->$atributo;
		}

		function acelerar() {
			echo 'Acelerar <br/>';
		}

		function freiar() {
			echo 'Freiar <br/>';
		}

		function trocarMarcha() {
			echo 'Passar marcha com a Mão <br/>';
		}
	}

	class Carro extends Veiculo{

		public $tetoSolar = true;

		function __construct($placa, $cor) {
			parent::__construct($placa, $cor);
		}

		function alterarPosicaoVolante() {
			echo 'Alterar posição volante <br/>';
		}

		function abrirTetoSolar() {
			echo 'Abrir teto solar <br/>';
		}
	}

	class Moto extends Veiculo{
		public $contraPesoGuidao = true;

		function __construct($placa, $cor) {
			parent::__construct($placa, $cor);
		}

		function empinar() {
			echo 'Empinar <br/>';
		}

		function trocarMarcha() {
			echo 'Passar marcha com o Pé<br/>';
		}
	}


	$carro = new Carro('ADC1234', 'Vermelho');
	$carro->trocarMarcha();

	$moto = new Moto('XYZ9876', 'Prata');
	$moto->trocarMarcha();



?>