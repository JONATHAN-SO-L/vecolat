<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
require_once 'conexi.php';

$id_estado = $_POST['id'];
	
	$queryM = "SELECT id_usuario, nombre, especialidad FROM usuario WHERE id_usuario = '$id_estado'";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value=''>Seleccionar Especialidad</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['especialidad']."'>".utf8_decode($rowM['especialidad'])."</option>";
	}
	
	echo $html;

	?>