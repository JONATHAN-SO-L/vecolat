<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
require_once 'conexi.php';

$id_estado = $_POST['id'];
	
	$queryM = "SELECT id_area,empresa_id, edificio_id, area, prioridad FROM area WHERE edificio_id = '$id_estado' order by area";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value=''>Seleccionar Área 4</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['area']."'>".utf8_decode($rowM['area'])." Con Prioridad: ".$rowM['prioridad']."</option>";
	}
	
	echo $html;

	?>