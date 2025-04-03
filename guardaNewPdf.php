<?php
//include("conex.php");
include ("conexi.php");
    
	    $fecha= $_POST['fecha'];
		$equipo= $_POST['equipo'];
		$carpeta= $_POST['carpeta'];
		
								$num_archivo=count($_FILES['archivo1']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo1']['name'][$i])){
								
								$ruta_nueva1="files/servicio/$fecha/$equipo/$carpeta/doc"; 
						if(!file_exists($ruta_nueva1)){
										mkdir($ruta_nueva1,0777, true);
									}
								//$ruta_nueva1=$ruta_nueva1."/".$_FILES['archivo1']['name'][$i];
								$ruta_nueva1 = $ruta_nueva1."/".htmlspecialchars($_POST['PDF']);
								//$ruta_img="../".$ruta_nueva1;
								if(file_exists($ruta_nueva1)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo1']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva1);
									echo"";
								}
							}
						}
		header("Location:seccion0_admin.php");
?>			
						