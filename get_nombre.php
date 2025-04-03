<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
require_once 'conexi.php';

$id_estado = $_POST['id'];
	
	$queryM = "SELECT empresa_id, nombre, apellido FROM usuario WHERE id_usuario = '$id_estado' order by nombre";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value=''>Seleccionar Nombre</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['nombre']."'>".utf8_decode($rowM['nombre'])."</option>";
	}
	
	echo $html;

	?>