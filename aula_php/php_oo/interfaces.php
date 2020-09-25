<?php 
	//interfaces
	interface EquipamentoEletronico {
		public function ligar();
		public function desligar();
	}

	//======================================

	class TV implements EquipamentoEletronico {
		public function mudaCanal() {
			echo 'Mudar Canal';
		}

		public function ligar() {
			echo 'Ligar';
		}

		public function desligar() {
			echo 'Deligar';
		}
	}

	$x = new TV();

	//=======================================

	//interfaces
	interface Mamifero {
		public function respirar();
	}

	interface Terreste extends Mamifero{
		public function andar();
	}

	interface Aquatico extends Mamifero{
		public function nadar();
	}

	//Class
	Class Humano implements Terreste {

		public function respirar() {
			echo 'Respirar';
		}

		public function andar() {
			echo 'Respirar';
		}
	}

	Class Baleia implements Aquatico{

		public function respirar() {
			echo 'Respirar';
		}

		public function nadar() {
			echo 'Respirar';
		}
	}




?>