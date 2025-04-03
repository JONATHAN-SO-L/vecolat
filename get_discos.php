<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
require_once 'conexi.php';

$id_estado = $_POST['id'];
	
	$queryM = "SELECT id_edificio,empresa_id, descripcion FROM edificio WHERE empresa_id = '$id_estado' order by descripcion";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value=''>Seleccionar Edificio</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['id_edificio']."'>".utf8_decode($rowM['descripcion'])."</option>";
	}
	
	echo $html;

	?>