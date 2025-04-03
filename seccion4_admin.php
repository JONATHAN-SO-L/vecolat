<?php
//include("conex.php");
include ("conexi.php");
include './lib/class_mysql.php';
include './lib/config.php';

//	$link = conectar();
	
	    $empresa= $_POST['empresa'];
		$edificio= $_POST['edificio'];
		$ubicacion= $_POST['ubicacion'];
		$area= $_POST['area'];
		$equipo= $_POST['equipo'];
		$fecha =$_POST['fecha_servicio'];
		$servicio= $_POST['servicio'];
		$valor1= $_POST['valor1'];
		$valor2= $_POST['valor2'];
		$valor3= $_POST['valor3'];
		$valor4= $_POST['valor4'];
		$servicio2= $_POST['servicio2'];
		$valor1_s2= $_POST['valor1_s2'];
		$valor2_s2= $_POST['valor2_s2'];
		$valor3_s2= $_POST['valor3_s2'];
		$valor4_s2= $_POST['valor4_s2'];
		$servicio3= $_POST['servicio3'];
		$valor1_s3= $_POST['valor1_s3'];
		$valor2_s3= $_POST['valor2_s3'];
		$valor3_s3= $_POST['valor3_s3'];
		$valor4_s3= $_POST['valor4_s3'];
		$servicio4= $_POST['servicio4'];
		$valor1_s4= $_POST['valor1_s4'];
		$valor2_s4= $_POST['valor2_s4'];
		$valor3_s4= $_POST['valor3_s4'];
		$valor4_s4= $_POST['valor4_s4'];
		$servicio5= $_POST['servicio5'];
		$valor1_s5= $_POST['valor1_s5'];
		$valor2_s5= $_POST['valor2_s5'];
		$valor3_s5= $_POST['valor3_s5'];
		$valor4_s5= $_POST['valor4_s5'];
		$valor5_s5= $_POST['valor5_s5'];
		$valor6_s5= $_POST['valor6_s5'];
		$servicio6= $_POST['servicio6'];
		$valor1_s6= $_POST['valor1_s6'];
		$servicio8= $_POST['servicio8'];
		$valor1_s8= $_POST['valor1_s8'];
		$uptime= $_POST['uptime'];
		$valor_uptime= $_POST['valor_uptime'];
		$observaciones = $_POST['observaciones'];
		$TempEntrada = $_POST['tempentrada'];
		$TempSalida = $_POST['tempsalida'];
		$TemPresion = $_POST['tempresion'];
		$TempEntrada2 = $_POST['tempentrada2'];
		$TempSalida2 = $_POST['tempsalida2'];
		$TemPresion2 = $_POST['tempresion2'];
		$estadoval = $_POST['estadoval'];
		$TipoModulacion = $_POST['tipomodulacion'];
		$EstaManguera = $_POST['estamanguera'];
		$lect1 = $_POST['amperaje1_s3'];
		$lect2 = $_POST['amperaje2_s3'];
		$lect3 = $_POST['amperaje3_s3'];
		$lect4 = $_POST['amperaje4_s3'];
		$lect5 = $_POST['amperaje5_s3'];
		$lect6 = $_POST['amperaje6_s3'];
		$lect1_2 = $_POST['amperaje1_s4'];
		$lect2_2 = $_POST['amperaje2_s4'];
		$tornilleria = $_POST['tornilleria'];
		$EstaCable = $_POST['estacable'];
		$lect3_2 = $_POST['amperaje3_s4'];
		$lect4_2 = $_POST['amperaje4_s4'];
		$lect5_2 = $_POST['amperaje5_s4'];
		$lect6_2 = $_POST['amperaje6_s4'];
		$lect1_3 = $_POST['amperaje1_3'];
		$lect2_3 = $_POST['amperaje2_3'];
		$lect3_3 = $_POST['amperaje3_3'];
		$funcionamiento = $_POST['funcionamiento'];
		$tipovariador = $_POST['tipovariador'];
		$mejora = $_POST['mejora'];
		$mes = $_POST['mes'];
		$hora = $_POST['hora'];
		$anio = $_POST['anio'];
		$tecnico = $_POST['tecnico'];
	    $carpeta = $_POST['carpeta'];  
	
        	$num_archivo=count($_FILES['archivo']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo']['name'][$i])){
								
								$ruta_nueva="files/servicio/$fecha/$equipo/$carpeta/Etapa1/Lectura"; 
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
								
								$ruta_nueva1="files/servicio/$fecha/$equipo/$carpeta/Etapa1/Lectura/Inicial"; 
						if(!file_exists($ruta_nueva1)){
										mkdir($ruta_nueva1,0777, true);
									}
								//$ruta_nueva1=$ruta_nueva1."/".$_FILES['archivo1']['name'][$i];
								$ruta_nueva1 = $ruta_nueva1."/".htmlspecialchars($_POST['Foto']);
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
				
		
						$num_archivo=count($_FILES['archivo2']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo2']['name'][$i])){
								
								$ruta_nueva2="files/servicio/$fecha/$equipo/$carpeta/Etapa1/Lectura/Final"; 
						if(!file_exists($ruta_nueva2)){
										mkdir($ruta_nueva2,0777, true);
									}
								//$ruta_nueva2=$ruta_nueva2."/".$_FILES['archivo2']['name'][$i];
								$ruta_nueva2 = $ruta_nueva2."/".htmlspecialchars($_POST['Foto2']);
								//$ruta_img2="../".$ruta_nueva2;
								if(file_exists($ruta_nueva2)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo2']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva2);
									echo"";
								}
							}
						}
						
						$num_archivo=count($_FILES['archivo3']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo3']['name'][$i])){
								
								$ruta_nueva3="files/servicio/$fecha/$equipo/$carpeta/Etapa1/Cambio"; 
						if(!file_exists($ruta_nueva3)){
										mkdir($ruta_nueva3,0777, true);
									}
								//$ruta_nueva3=$ruta_nueva3."/".$_FILES['archivo3']['name'][$i];
								$ruta_nueva3 = $ruta_nueva3."/".htmlspecialchars($_POST['Foto3']);
								//$ruta_img3="../".$ruta_nueva3;
								if(file_exists($ruta_nueva3)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo3']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva3);
									echo"";
								}
							}
						}
						
						$num_archivo=count($_FILES['archivo4']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo4']['name'][$i])){
								
								$ruta_nueva4="files/servicio/$fecha/$equipo/$carpeta/Etapa1/Limpieza"; 
						if(!file_exists($ruta_nueva4)){
										mkdir($ruta_nueva4,0777, true);
									}
								//$ruta_nueva4=$ruta_nueva4."/".$_FILES['archivo4']['name'][$i];
								$ruta_nueva4 = $ruta_nueva4."/".htmlspecialchars($_POST['Foto4']);
								//$ruta_img4="../".$ruta_nueva4;
								if(file_exists($ruta_nueva4)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo4']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva4);
									echo"";
								}
							}
						}
		//////////////				
						$num_archivo=count($_FILES['archivo5']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo5']['name'][$i])){
								
								$ruta_nueva1_s2="files/servicio/$fecha/$equipo/$carpeta/Etapa2/Lectura/Inicial"; 
						if(!file_exists($ruta_nueva1_s2)){
										mkdir($ruta_nueva1_s2,0777, true);
									}
								//$ruta_nueva1_s2=$ruta_nueva1_s2."/".$_FILES['archivo5']['name'][$i];
								$ruta_nueva1_s2 = $ruta_nueva1_s2."/".htmlspecialchars($_POST['Foto5']);
									//$ruta_img1_s2="../".$ruta_nueva1_s2;
								if(file_exists($ruta_nueva1_s2)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo5']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva1_s2);
									echo"";
								}
							}
						}
		//////////////				
						$num_archivo=count($_FILES['archivo6']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo6']['name'][$i])){
								
								$ruta_nueva2_s2="files/servicio/$fecha/$equipo/$carpeta/Etapa2/Lectura/Final"; 
						if(!file_exists($ruta_nueva2_s2)){
										mkdir($ruta_nueva2_s2,0777, true);
									}
								//$ruta_nueva2_s2=$ruta_nueva2_s2."/".$_FILES['archivo6']['name'][$i];
								$ruta_nueva2_s2 = $ruta_nueva2_s2."/".htmlspecialchars($_POST['Foto6']);
									//$ruta_img2_s2="../".$ruta_nueva2_s2;
								if(file_exists($ruta_nueva2_s2)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo6']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva2_s2);
									echo"";
								}
							}
						}
						
						$num_archivo=count($_FILES['archivo7']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo7']['name'][$i])){
								
								$ruta_nueva3_s2="files/servicio/$fecha/$equipo/$carpeta/Etapa2/Cambio"; 
						if(!file_exists($ruta_nueva3_s2)){
										mkdir($ruta_nueva3_s2,0777, true);
									}
								//$ruta_nueva3_s2=$ruta_nueva3_s2."/".$_FILES['archivo7']['name'][$i];
								$ruta_nueva3_s2 = $ruta_nueva3_s2."/".htmlspecialchars($_POST['Foto7']);
								//$ruta_img3_s2="../".$ruta_nueva3_s2;
								if(file_exists($ruta_nueva3_s2)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo7']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva3_s2);
									echo"";
								}
							}
						}
						
						$num_archivo=count($_FILES['archivo8']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo8']['name'][$i])){
								
								$ruta_nueva4_s2="files/servicio/$fecha/$equipo/$carpeta/Etapa2/Limpieza"; 
						if(!file_exists($ruta_nueva4_s2)){
										mkdir($ruta_nueva4_s2,0777, true);
									}
								//$ruta_nueva4_s2=$ruta_nueva4_s2."/".$_FILES['archivo8']['name'][$i];
								$ruta_nueva4_s2 = $ruta_nueva4_s2."/".htmlspecialchars($_POST['Foto8']);
								//$ruta_img4_s2="../".$ruta_nueva4_s2;
								if(file_exists($ruta_nueva4_s2)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo8']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva4_s2);
									echo"";
								}
							}
						}
						
							$num_archivo=count($_FILES['archivo9']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo9']['name'][$i])){
								
								$ruta_nueva1_s3="files/servicio/$fecha/$equipo/$carpeta/Etapa3/Lectura/Inicial"; 
						if(!file_exists($ruta_nueva1_s3)){
										mkdir($ruta_nueva1_s3,0777, true);
									}
								//$ruta_nueva1_s3=$ruta_nueva1_s3."/".$_FILES['archivo9']['name'][$i];
								$ruta_nueva1_s3 = $ruta_nueva1_s3."/".htmlspecialchars($_POST['Foto9']);
								//$ruta_img1_s3="../".$ruta_nueva1_s3;
								if(file_exists($ruta_nueva1_s3)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo9']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva1_s3);
									echo"";
								}
							}
						}
						
						$num_archivo=count($_FILES['archivo10']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo10']['name'][$i])){
								
								$ruta_nueva2_s3="files/servicio/$fecha/$equipo/$carpeta/Etapa3/Lectura/Final"; 
						if(!file_exists($ruta_nueva2_s3)){
										mkdir($ruta_nueva2_s3,0777, true);
									}
								//$ruta_nueva2_s3=$ruta_nueva2_s3."/".$_FILES['archivo10']['name'][$i];
								$ruta_nueva2_s3 = $ruta_nueva2_s3."/".htmlspecialchars($_POST['Foto10']);
									//$ruta_img2_s3="../".$ruta_nueva2_s3;
								if(file_exists($ruta_nueva2_s3)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo10']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva2_s3);
									echo"";
								}
							}
						}
						
						$num_archivo=count($_FILES['archivo11']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo11']['name'][$i])){
								
								$ruta_nueva3_s3="files/servicio/$fecha/$equipo/$carpeta/Etapa3/Cambio"; 
						if(!file_exists($ruta_nueva3_s3)){
										mkdir($ruta_nueva3_s3,0777, true);
									}
								//$ruta_nueva3_s3=$ruta_nueva3_s3."/".$_FILES['archivo11']['name'][$i];
								$ruta_nueva3_s3 = $ruta_nueva3_s3."/".htmlspecialchars($_POST['Foto11']);
								//$ruta_img3_s3="../".$ruta_nueva3_s3;
								if(file_exists($ruta_nueva3_s3)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo11']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva3_s3);
									echo"";
								}
							}
						}
						
						$num_archivo=count($_FILES['archivo12']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo12']['name'][$i])){
								
								$ruta_nueva4_s3="files/servicio/$fecha/$equipo/$carpeta/Etapa3/Limpieza"; 
						if(!file_exists($ruta_nueva4_s3)){
										mkdir($ruta_nueva4_s3,0777, true);
									}
								//$ruta_nueva4_s3=$ruta_nueva4_s3."/".$_FILES['archivo12']['name'][$i];
								$ruta_nueva4_s3 = $ruta_nueva4_s3."/".htmlspecialchars($_POST['Foto12']);
								//$ruta_img4_s3="../".$ruta_nueva4_s3;
								if(file_exists($ruta_nueva4_s3)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo12']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva4_s3);
									echo"";
								}
							}
						}
						
						
							$num_archivo=count($_FILES['archivo13']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo13']['name'][$i])){
								
								$ruta_nueva1_s4="files/servicio/$fecha/$equipo/$carpeta/Etapa4/Lectura/Inicial"; 
						if(!file_exists($ruta_nueva1_s4)){
										mkdir($ruta_nueva1_s4,0777, true);
									}
								//$ruta_nueva1_s4=$ruta_nueva1_s4."/".$_FILES['archivo13']['name'][$i];
								$ruta_nueva1_s4 = $ruta_nueva1_s4."/".htmlspecialchars($_POST['Foto13']);
								//$ruta_img1_s4="../".$ruta_nueva1_s4;
								if(file_exists($ruta_nueva1_s4)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo13']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva1_s4);
									echo"";
								}
							}
						}
						
						$num_archivo=count($_FILES['archivo14']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo14']['name'][$i])){
								
								$ruta_nueva2_s4="files/servicio/$fecha/$equipo/$carpeta/Etapa4/Lectura/Final"; 
						if(!file_exists($ruta_nueva2_s4)){
										mkdir($ruta_nueva2_s4,0777, true);
									}
								//$ruta_nueva2_s4=$ruta_nueva2_s4."/".$_FILES['archivo14']['name'][$i];
								$ruta_nueva2_s4 = $ruta_nueva2_s4."/".htmlspecialchars($_POST['Foto14']);
								//$ruta_img2_s4="../".$ruta_nueva2_s4;
								if(file_exists($ruta_nueva2_s4)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo14']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva2_s4);
									echo"";
								}
							}
						}
						
						$num_archivo=count($_FILES['archivo15']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo15']['name'][$i])){
								
								$ruta_nueva3_s4="files/servicio/$fecha/$equipo/$carpeta/Etapa4/Cambio"; 
						if(!file_exists($ruta_nueva3_s4)){
										mkdir($ruta_nueva3_s4,0777, true);
									}
								//$ruta_nueva3_s4=$ruta_nueva3_s4."/".$_FILES['archivo15']['name'][$i];
								$ruta_nueva3_s4 = $ruta_nueva3_s4."/".htmlspecialchars($_POST['Foto15']);
								//$ruta_img3_s4="../".$ruta_nueva3_s4;
								if(file_exists($ruta_nueva3_s4)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo15']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva3_s4);
									echo"";
								}
							}
						}
						
						$num_archivo=count($_FILES['archivo16']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo16']['name'][$i])){
								
								$ruta_nueva4_s4="files/servicio/$fecha/$equipo/$carpeta/Etapa4/Limpieza"; 
						if(!file_exists($ruta_nueva4_s4)){
										mkdir($ruta_nueva4_s4,0777, true);
									}
								//$ruta_nueva4_s4=$ruta_nueva4_s4."/".$_FILES['archivo16']['name'][$i];
								$ruta_nueva4_s4 = $ruta_nueva4_s4."/".htmlspecialchars($_POST['Foto16']);
								//$ruta_img4_s4="../".$ruta_nueva4_s4;
								if(file_exists($ruta_nueva4_s4)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo16']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva4_s4);
									echo"";
								}
							}
						}
						
							$num_archivo=count($_FILES['archivo17']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo17']['name'][$i])){
								
								$ruta_nueva1_s5="files/servicio/$fecha/$equipo/$carpeta/Motoventilador/posterior"; 
						if(!file_exists($ruta_nueva1_s5)){
										mkdir($ruta_nueva1_s5,0777, true);
									}
								//$ruta_nueva1_s5=$ruta_nueva1_s5."/".$_FILES['archivo17']['name'][$i];
								$ruta_nueva1_s5 = $ruta_nueva1_s5."/".htmlspecialchars($_POST['Foto17']);
								//$ruta_img1_s5="../".$ruta_nueva1_s5;
								if(file_exists($ruta_nueva1_s5)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo17']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva1_s5);
									echo"";
								}
							}
						}
						
							$num_archivo=count($_FILES['archivo18']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo18']['name'][$i])){
								
								$ruta_nueva1_s6="files/servicio/$fecha/$equipo/$carpeta/Serpentin/posterior"; 
						if(!file_exists($ruta_nueva1_s6)){
										mkdir($ruta_nueva1_s6,0777, true);
									}
								//$ruta_nueva1_s6=$ruta_nueva1_s6."/".$_FILES['archivo18']['name'][$i];
								$ruta_nueva1_s6 = $ruta_nueva1_s6."/".htmlspecialchars($_POST['Foto18']);
								//$ruta_img1_s6="../".$ruta_nueva1_s6;
								if(file_exists($ruta_nueva1_s6)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo18']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva1_s6);
									echo"";
								}
							}
						}
						
						$num_archivo=count($_FILES['archivo19']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo19']['name'][$i])){
								
								$ruta_nueva1_s8="files/servicio/$fecha/$equipo/$carpeta/Charola/posterior"; 
						if(!file_exists($ruta_nueva1_s8)){
										mkdir($ruta_nueva1_s8,0777, true);
									}
								//$ruta_nueva1_s8=$ruta_nueva1_s8."/".$_FILES['archivo19']['name'][$i];
								$ruta_nueva1_s8 = $ruta_nueva1_s8."/".htmlspecialchars($_POST['Foto19']);
								//$ruta_img1_s8="../".$ruta_nueva1_s8;
								if(file_exists($ruta_nueva1_s8)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo19']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva1_s8);
									echo"";
								}
							}
						}
						
			/*			
			            $con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("INSERT INTO servicio2 (empresa, edificio, ubicacion, area, equipo ,fecha_servicio, carpeta, valor1, valor2, valor3, valor4, valor1_s2, valor2_s2, valor3_s2, valor4_s2, valor1_s3, valor2_s3, valor3_s3, valor4_s3, valor1_s4, valor2_s4, valor3_s4, valor4_s4, valor1_s5, valor2_s5, valor3_s5, valor4_s5, valor5_s5, valor6_s5, valor1_s6, valor1_s8, valor_uptime, observaciones, tempentrada, tempsalida, tempresion, tempentrada2, tempsalida2, tempresion2, estadoval, tipomodulacion, estamanguera, amperaje1_s3, amperaje2_s3, amperaje3_s3, amperaje4_s3, amperaje5_s3, amperaje6_s3, amperaje1_s4, amperaje2_s4, amperaje3_s4, amperaje4_s4, amperaje5_s4, amperaje6_s4, tornilleria, estacable, amperaje1_3, amperaje2_3, amperaje3_3, funcionamiento, tipovariador, medida1, pz1, medida1_2, pz1_2, medida2, pz2, medida2_2, pz2_2, medida3, pz3, medida3_2, pz3_2, medida4, pz4, medida4_2, pz4_2, tipo1, tipo1_2, tipo2, tipo2_2, tipo3, tipo3_2, tipo4, tipo4_2, mejora, mes, hora, anio, tecnico )
							VALUES
							('$empresa', '$edificio', '$ubicacion','$area', '$equipo', '$fecha', '$carpeta', '$valor1', '$valor2', '$valor3', '$valor4', '$valor1_s2', '$valor2_s2', '$valor3_s2', '$valor4_s2', '$valor1_s3', '$valor2_s3', '$valor3_s3', '$valor4_s3', '$valor1_s4', '$valor2_s4', '$valor3_s4', '$valor4_s4', '$valor1_s5', '$valor2_s5', '$valor3_s5', '$valor4_s5', '$valor5_s5', '$valor6_s5', '$valor1_s6', '$valor1_s8', '$valor_uptime', '$observaciones','$TempEntrada','$TempSalida','$TemPresion','$TempEntrada2','$TempSalida2','$TemPresion2','$estadoval','$TipoModulacion','$EstaManguera','$lect1','$lect2','$lect3','$lect4','$lect5','$lect6','$lect1_2','$lect2_2','$lect3_2','$lect4_2','$lect5_2','$lect6_2','$tornilleria','$EstaCable','$lect1_3','$lect2_3','$lect3_3','$funcionamiento','$tipovariador','$medida1','$pz1','$medida1_2','$pz1_2','$medida2','$pz2','$medida2_2','$pz2_2','$medida3','$pz3','$medida3_2','$pz3_2','$medida4','$pz4','$medida4_2','$pz4_2','$tipo1','$tipo1_2','$tipo2','$tipo2_2','$tipo3','$tipo3_2','$tipo4','$tipo4_2','$mejora', '$mes', '$hora', '$anio', '$tecnico')"))){
			*/
			 $con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("INSERT INTO servicio2 (
			empresa, edificio, ubicacion, area, equipo, fecha_servicio, carpeta, valor1, valor2, valor3, valor4, valor1_s2, valor2_s2, valor3_s2, valor4_s2, valor1_s3, valor2_s3, valor3_s3, valor4_s3, valor1_s4, valor2_s4, valor3_s4, valor4_s4, valor1_s5, valor2_s5, valor3_s5, valor4_s5, valor5_s5, valor6_s5, valor1_s6, valor1_s8, valor_uptime, observaciones, tempentrada, tempsalida, tempresion, tempentrada2, tempsalida2, tempresion2, estadoval, tipomodulacion, estamanguera, amperaje1_s3, amperaje2_s3, amperaje3_s3, amperaje4_s3, amperaje5_s3, amperaje6_s3, amperaje1_s4, amperaje2_s4, amperaje3_s4, amperaje4_s4, amperaje5_s4, amperaje6_s4, tornilleria, estacable, amperaje1_3, amperaje2_3, amperaje3_3, funcionamiento, tipovariador, mejora, mes, hora, anio, tecnico )
							VALUES
			('$empresa', '$edificio', '$ubicacion', '$area', '$equipo', '$fecha', '$carpeta', '$valor1', '$valor2', '$valor3', '$valor4', '$valor1_s2', '$valor2_s2',	'$valor3_s2', '$valor4_s2', '$valor1_s3', '$valor2_s3', '$valor3_s3', '$valor4_s3', '$valor1_s4', '$valor2_s4', '$valor3_s4', '$valor4_s4', '$valor1_s5', '$valor2_s5', '$valor3_s5', '$valor4_s5', '$valor5_s5', '$valor6_s5', '$valor1_s6', '$valor1_s8', '$valor_uptime', '$observaciones', '$TempEntrada',	'$TempSalida', '$TemPresion', '$TempEntrada2', '$TempSalida2', '$TemPresion2', '$estadoval', '$TipoModulacion', '$EstaManguera', '$lect1', '$lect2', '$lect3', '$lect4', '$lect5', '$lect6', '$lect1_2', '$lect2_2', '$lect3_2', '$lect4_2', '$lect5_2', '$lect6_2', '$tornilleria', '$EstaCable', '$lect1_3', '$lect2_3', '$lect3_3', '$funcionamiento', '$tipovariador', '$mejora', '$mes', '$hora', '$anio', '$tecnico')"))){

	  
				echo 
                '<script language="javascript">
				alert("El Servicio ha sido guardado. Gracias");
				window.location.href="seccion3_admin.php"</script>';

          }else{
             echo 
              '  <script language="javascript">
				alert("El Servicio no se ha podido guardar..::Intente de nuevo::..");
				window.location.href="seccion3_admin.php"</script>';
          }
?>