<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 04/2020 v1
 */
require_once 'conexi.php';

$id_estado = $_POST['id'];
	
$queryM = "SELECT id_eq_us, nombre_comp, equipo, num_serie FROM equipo_usuario WHERE usuario = '$id_estado'";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value=''>Seleccionar Equipo</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['num_serie']."'>".utf8_decode($rowM['num_serie'])."</option>";
	}
	
	echo $html;

	?>