<?php 

	class Exemplo {
		//Atributos
		public static $atributo1 = "Atributo estático <br/>";
		public $atributo2 = "Atributo normal <br/>";

		//Metodos
		public static function metodo1() {
			echo 'Metodo estático <br/>';
		}

		public function metodo2() {
			echo 'Metodo normal <br/>';
		}
	}


	echo '<h1>Acessando atributos e metodos normais</h1>';
	$x = new Exemplo();
	echo $x->atributo2;
	echo $x->metodo2();

	echo '<hr>';

	echo '<h1>Acessando atributos e metodos estáticos</h1>';
	echo Exemplo::$atributo1;
	Exemplo::metodo1();


?>