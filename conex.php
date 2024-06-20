<?php
	function conectar(){
		$servidor = "localhost";
		$usuario	= "veco_dvi";
		$clave		= "Vec83Dv19iSa@";
		$bd				= "veco_sims_devecchi";
		
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