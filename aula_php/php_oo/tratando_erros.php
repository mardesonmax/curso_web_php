<?php 

	 try {

	 	echo "<h3> *** Try *** </h3>";

	 	// $sql = 'select * from clientes';
	 	// mysql_query($sql);

	 	if(!file_exists('arquivo.php')) {

	 		throw new Exception('O arquivo não exite');
	 		
	 	}
	 	
	 } catch (Error $e) {
	 	echo "<h3> *** Cathc *** </h3>";
	 	echo " <p style='color: red'>$e</p>";

	 }	catch (Exception $e) {
	 	echo "<h3> *** Cathc *** </h3>";
	 	echo " <p style='color: red'>$e</p>";
	 }

?>