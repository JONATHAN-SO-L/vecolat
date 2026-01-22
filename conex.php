<?php
	function conectar(){
		$servidor = "";
		$usuario	= "";
		$clave		= "";
		$bd				= "";
		
		if(!($link = mysqli_connect($servidor,$usuario,$clave))){
			echo "ERROR DE CONEXION CON EL SERVIDOR";
			exit();
		}
		
		if(!mysql_select_db($bd,$link)){
			echo "ERROR DE CONEXION CON LA BASE DE DATOS";
			exit();		
		}
		
		return $link;
	}
?>
