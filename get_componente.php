<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
require_once 'conexi.php';

$id_estado = $_POST['id'];
	
	$queryM = "SELECT id_seccion,empresa_id, edificio_id, ubicacion_id, seccion  FROM seccion WHERE ubicacion_id = '$id_estado' order by seccion";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value=''>Seleccionar Equipo</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['id_seccion']."'>".utf8_decode($rowM['seccion'])."</option>";
	}
	
	echo $html;

	?>