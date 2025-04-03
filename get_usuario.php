<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
require_once 'conexi.php';

$id_estado = $_POST['id'];
	
	$queryM = "SELECT id,rfc, razon_social FROM empresas WHERE id = '$id_estado' order by razon_social";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value=''>Seleccionar Razon Social</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['razon_social']."'>".utf8_decode($rowM['razon_social'])."</option>";
	}
	
	echo $html;

	?>