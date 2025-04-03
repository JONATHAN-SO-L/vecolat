<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
require_once 'conexi.php';

$id_estado = $_POST['id'];
	
	$queryM = "SELECT id_ubicacion,edificio_id, ubicacion FROM ubicacion WHERE edificio_id = '$id_estado' order by ubicacion";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value=''>Seleccionar Ubicación</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['id_ubicacion']."'>".utf8_decode($rowM['ubicacion'])."</option>";
	}
	
	echo $html;

	?>