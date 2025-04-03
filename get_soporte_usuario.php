<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 04/2020 v1
 */
require_once 'conexi.php';

$id_estado = $_POST['id'];
	
	$queryM = "SELECT id, nombre_usuario, email_usuario FROM usuario_sop WHERE id = '$id_estado'";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "value=".utf8_decode($rowM['email_usuario']);
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['email_usuario']."'>".utf8_decode($rowM['email_usuario'])."</option>";
	}
	
	echo $html;

	?>