<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */

 include ("conexi.php");
include 'edit_servicio.php';

	$dir= $_GET['id'];
		if(file_exists($dir)){ 
		if(unlink($dir)) 
			echo "<script type=\"text/javascript\">
           history.go(-1);
       </script>";
        exit;
		}else{
		print "Este archivo no existe"; 
		}
?>