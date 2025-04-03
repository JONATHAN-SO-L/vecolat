<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
require_once 'conexi.php';

$id_estado = $_POST['id'];
	
	$queryM = "SELECT id_usuario, nombre, apellido FROM usuario WHERE id_usuario = '$id_estado'";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value=''>Seleccionar Apellido</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['apellido']."'>".utf8_decode($rowM['apellido'])."</option>";
	}
	
	echo $html;

	?>