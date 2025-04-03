<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 04/2020 v1
 */
require_once 'conexi.php';

$id_estado = $_POST['id'];
	
	$queryM = "SELECT id, ubicacion, email_usuario FROM usuario_sop WHERE id = '$id_estado'";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "value=".utf8_decode($rowM['ubicacion']);
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['ubicacion']."'>".utf8_decode($rowM['ubicacion'])."</option>";
	}
	
	echo $html;

	?>