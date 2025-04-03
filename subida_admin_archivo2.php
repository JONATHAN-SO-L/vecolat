<?php
//include("conex.php");
include ("conexi.php");
include './lib/class_mysql.php';
include './lib/config.php';

		   if(isset($_REQUEST['empresa']) && isset($_REQUEST['equipo'])){        

        	if(isset($_REQUEST['empresa'])){
			$empresa= $_REQUEST['empresa'];
		}else{
			$empresa="";
		}
		
		if(isset($_REQUEST['edificio'])){
			$edificio= $_REQUEST['edificio'];
		}else{
			$edificio="";
		}
		if(isset($_REQUEST['ubicacion'])){
			$ubicacion= $_REQUEST['ubicacion'];
		}else{
			$ubicacion="";
		}
		if(isset($_REQUEST['equipo'])){
			$equipo= $_REQUEST['equipo'];
		}else{
			$equipo="";
		}
		if(isset($_REQUEST['area'])){
			$area= $_REQUEST['area'];
		}else{
			$area= "";
		}
		if(isset($_REQUEST['fecha_servicio'])){
			$fecha= $_REQUEST['fecha_servicio'];
		}else{
			$fecha= "";
		}
		if(isset($_REQUEST['carpeta'])){
			$carpeta= $_REQUEST['carpeta'];
		}else{
			$carpeta= "";
		}
		if(isset($_REQUEST['mes'])){
			$mes= $_REQUEST['mes'];
		}else{
			$mes= "";
		}
		if(isset($_REQUEST['hora'])){
			$hora= $_REQUEST['hora'];
		}else{
			$hora= "";
		}
		if(isset($_REQUEST['anio'])){
			$anio= $_REQUEST['anio'];
		}else{
			$anio= "";
		}
		if(isset($_REQUEST['tecnico'])){
			$tecnico= $_REQUEST['tecnico'];
		}else{
			$tecnico= "";
		}
		   }
		////////////////////////////////////////////////////////////////////////////////////////
		
		$num_archivo=count($_FILES['archivo']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo']['name'][$i])){
								
								$ruta_nueva1="files/pdf/$fecha/$equipo/$carpeta/archivo"; 
						if(!file_exists($ruta_nueva)){
										mkdir($ruta_nueva,0777, true);
									}
								$ruta_nueva=$ruta_nueva."/".$_FILES['archivo']['name'];
								$ruta_img1="../".$ruta_nueva;
								if(file_exists($ruta_nueva)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo']['tmp_name'];
									move_uploaded_file($ruta_temporal, $ruta_nueva);
									echo"";
								}
							}
						}
		
		////////////////////////////////////////////////////////////////////////////////////////
		$num_archivo=count($_FILES['archivo1']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo1']['name'][$i])){
								
								$ruta_nueva1="files/pdf/$fecha/$equipo/$carpeta/archivo"; 
						if(!file_exists($ruta_nueva1)){
										mkdir($ruta_nueva1,0777, true);
									}
								$ruta_nueva1=$ruta_nueva1."/".$_FILES['archivo1']['name'][$i];
							//	$ruta_nueva1 = $ruta_nueva1."/".htmlspecialchars($_POST['Foto']);
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
						
		////////////////////////////////////////////////////////////////////////////////////////
		   
		 $con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("INSERT INTO servicio_archivo (
			empresa, edificio, ubicacion, area, equipo, fecha_servicio, carpeta, mes, hora, anio, tecnico )
							VALUES
			('$empresa', '$edificio', '$ubicacion', '$area', '$equipo', '$fecha', '$carpeta', '$mes', '$hora', '$anio', '$tecnico')"))){

				echo 
				'<script language="javascript">
				alert("El Servicio ha sido guardado. Gracias");
				window.location.href="seccion_adm_servicio.php"</script>';
          }else{
             echo 
              '   <script language="javascript">
				alert("El Servicio no se ha podido guardar..::Intente de nuevo::..");
				window.location.href="seccion_adm_servicio.php"</script>';
				
          }
?>