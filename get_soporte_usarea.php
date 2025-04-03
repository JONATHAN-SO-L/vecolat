<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 04/2020 v1
 */
require_once 'conexi.php';

$id_estado = $_POST['id'];
	
	$queryM = "SELECT id, area, email_usuario FROM usuario_sop WHERE id = '$id_estado'";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "value=".utf8_decode($rowM['area']);
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['area']."'>".utf8_decode($rowM['area'])."</option>";
	}
	
	echo $html;

	?>