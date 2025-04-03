<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 04/2020 v1
 */
require_once 'conexi.php';

$id_estado = $_POST['id'];
	
	$queryM = "SELECT id, nombre_comp, email_usuario FROM usuario_sop WHERE id = '$id_estado'";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "value=".utf8_decode($rowM['nombre_comp']);
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['nombre_comp']."'>".utf8_decode($rowM['nombre_comp'])."</option>";
	}
	
	echo $html;

	?>