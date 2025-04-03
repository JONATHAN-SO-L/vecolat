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
		/*if(isset($_REQUEST['area'])){
			$area= $_REQUEST['area'];
		}else{
			$area="";
		}*/
		if(isset($_REQUEST['equipo'])){
			$equipo= $_REQUEST['equipo'];
		}else{
			$equipo="";
		}
		if(isset($_REQUEST['carpeta'])){
			$carpeta= $_REQUEST['carpeta'];
		}else{
			$carpeta= "";
		}
		if(isset($_REQUEST['fecha_servicio'])){
			$fecha_servicio= $_REQUEST['fecha_servicio'];
		}else{
			$fecha_servicio= "";
		}
		if(isset($_REQUEST['frecuencia'])){
			$frecuencia= $_REQUEST['frecuencia'];
		}else{
			$frecuencia="";
		}
		if(isset($_REQUEST['potencia'])){
			$potencia= $_REQUEST['potencia'];
		}else{
			$potencia="";
		}
		if(isset($_REQUEST['vel_moto'])){
			$vel_moto= $_REQUEST['vel_moto'];
		}else{
			$vel_moto="";
		}
		if(isset($_REQUEST['operacion'])){
			$operacion= $_REQUEST['operacion'];
		}else{
			$operacion="";
		}
		if(isset($_REQUEST['amperaje'])){
			$amperaje= $_REQUEST['amperaje'];
		}else{
			$amperaje="";
		}
		if(isset($_REQUEST['caida_merv8'])){
			$caida_merv8= $_REQUEST['caida_merv8'];
		}else{
			$caida_merv8="";
		}
		if(isset($_REQUEST['car_act'])){
			$car_act= $_REQUEST['car_act'];
		}else{
			$car_act="";
		}
		if(isset($_REQUEST['caida_merv15'])){
			$caida_merv15= $_REQUEST['caida_merv15'];
		}else{
			$caida_merv15="";
		}
		if(isset($_REQUEST['caida_merv17'])){
			$caida_merv17= $_REQUEST['caida_merv17'];
		}else{
			$caida_merv17="";
		}
		if(isset($_REQUEST['l1'])){
			$l1= $_REQUEST['l1'];
		}else{
			$l1="";
		}
		if(isset($_REQUEST['l2'])){
			$l2= $_REQUEST['l2'];
		}else{
			$l2="";
		}
		if(isset($_REQUEST['l3'])){
			$l3= $_REQUEST['l3'];
		}else{
			$l3="";
		}
		if(isset($_REQUEST['l1_l2'])){
			$l1_l2= $_REQUEST['l1_l2'];
		}else{
			$l1_l2="";
		}
		if(isset($_REQUEST['l1_l3'])){
			$l1_l3= $_REQUEST['l1_l3'];
		}else{
			$l1_l3="";
		}
		if(isset($_REQUEST['l2_l3'])){
			$l2_l3= $_REQUEST['l2_l3'];
		}else{
			$l2_l3="";
		}
		if(isset($_REQUEST['neutro'])){
			$neutro= $_REQUEST['neutro'];
		}else{
			$neutro="";
		}
		if(isset($_REQUEST['aah_temp'])){
			$aah_temp= $_REQUEST['aah_temp'];
		}else{
			$aah_temp="";
		}
		if(isset($_REQUEST['aah_psi'])){
			$aah_psi= $_REQUEST['aah_psi'];
		}else{
			$aah_psi="";
		}
		if(isset($_REQUEST['rah_temp'])){
			$rah_temp= $_REQUEST['rah_temp'];
		}else{
			$rah_temp="";
		}
		if(isset($_REQUEST['rah_psi'])){
			$rah_psi= $_REQUEST['rah_psi'];
		}else{
			$rah_psi="";
		}
		if(isset($_REQUEST['aac_temp'])){
			$aac_temp= $_REQUEST['aac_temp'];
		}else{
			$aac_temp="";
		}
		if(isset($_REQUEST['aac_psi'])){
			$aac_psi= $_REQUEST['aac_psi'];
		}else{
			$aac_psi="";
		}
		if(isset($_REQUEST['rac_temp'])){
			$rac_temp= $_REQUEST['rac_temp'];
		}else{
			$aac_trac_tempemp="";
		}
		if(isset($_REQUEST['rac_psi'])){
			$rac_psi= $_REQUEST['rac_psi'];
		}else{
			$rac_psi="";
		}
		if(isset($_REQUEST['manometro'])){
			$manometro= $_REQUEST['manometro'];
		}else{
			$manometro="";
		}
		if(isset($_REQUEST['manguera'])){
			$manguera= $_REQUEST['manguera'];
		}else{
			$manguera="";
		}
		if(isset($_REQUEST['filtro'])){
			$filtro= $_REQUEST['filtro'];
		}else{
			$filtro="";
		}
		if(isset($_REQUEST['drenajes'])){
			$drenajes= $_REQUEST['drenajes'];
		}else{
			$drenajes="";
		}
		if(isset($_REQUEST['observaciones'])){
			$observaciones= $_REQUEST['observaciones'];
		}else{
			$observaciones="";
		}	
		if(isset($_REQUEST['hora'])){
			$hora= $_REQUEST['hora'];
		}else{
			$hora="";
		}
		if(isset($_REQUEST['anio'])){
			$anio= $_REQUEST['anio'];
		}else{
			$anio="";
		}	
		if(isset($_REQUEST['tecnico'])){
			$tecnico= $_REQUEST['tecnico'];
		}else{
			$tecnico="";
		}
		$fecha = $_REQUEST['fecha_servicio'];
$semana= date('W', strtotime($fecha)) . PHP_EOL;

        $diaas = $_REQUEST['fecha_servicio'];
$dia= date('l', strtotime($diaas)) . PHP_EOL;

$mees = $_REQUEST['fecha_servicio'];
$mes= date('M', strtotime($mees)) . PHP_EOL;
 }
 
 $num_archivo=count($_FILES['archivo']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo']['name'][$i])){
								
								$ruta_nueva="files/servicio/$fecha_servicio/$equipo/$carpeta/diario/frecuencia"; 
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
								
								$ruta_nueva1="files/servicio/$fecha_servicio/$equipo/$carpeta/diario/frecuencia"; 
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
								
								$ruta_nueva2="files/servicio/$fecha_servicio/$equipo/$carpeta/diario/potencia"; 
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
								
								$ruta_nueva3="files/servicio/$fecha_servicio/$equipo/$carpeta/diario/velocidad"; 
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
								
								$ruta_nueva4="files/servicio/$fecha_servicio/$equipo/$carpeta/diario/operacion"; 
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
								
								$ruta_nueva1_s2="files/servicio/$fecha_servicio/$equipo/$carpeta/diario/merv8"; 
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
								
								$ruta_nueva2_s2="files/servicio/$fecha_servicio/$equipo/$carpeta/diario/carbon"; 
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
								
								$ruta_nueva3_s2="files/servicio/$fecha_servicio/$equipo/$carpeta/diario/merv15"; 
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
								
								$ruta_nueva4_s2="files/servicio/$fecha_servicio/$equipo/$carpeta/diario/merv17"; 
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
								
								$ruta_nueva1_s3="files/servicio/$fecha_servicio/$equipo/$carpeta/diario/amperaje"; 
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
								
								$ruta_nueva10="files/servicio/$fecha_servicio/$equipo/$carpeta/diario/voltaje"; 
						if(!file_exists($ruta_nueva10)){
										mkdir($ruta_nueva10,0777, true);
									}
								//$ruta_nueva1_s3=$ruta_nueva1_s3."/".$_FILES['archivo10']['name'][$i];
								$ruta_nueva10 = $ruta_nueva10."/".htmlspecialchars($_POST['Foto10']);
								//$ruta_img1_s3="../".$ruta_nueva1_s3;
								if(file_exists($ruta_nueva10)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo10']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva10);
									echo"";
								}
							}
						}
						$num_archivo=count($_FILES['archivo11']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo11']['name'][$i])){
								
								$ruta_nueva11="files/servicio/$fecha_servicio/$equipo/$carpeta/diario/aah"; 
						if(!file_exists($ruta_nueva11)){
										mkdir($ruta_nueva11,0777, true);
									}
								//$ruta_nueva11=$ruta_nueva11."/".$_FILES['archivo11']['name'][$i];
								$ruta_nueva11 = $ruta_nueva11."/".htmlspecialchars($_POST['Foto11']);
								//$ruta_img1_s3="../".$ruta_nueva1_s3;
								if(file_exists($ruta_nueva11)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo11']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva11);
									echo"";
								}
							}
						}
						$num_archivo=count($_FILES['archivo12']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo12']['name'][$i])){
								
								$ruta_nueva12="files/servicio/$fecha_servicio/$equipo/$carpeta/diario/rah"; 
						if(!file_exists($ruta_nueva12)){
										mkdir($ruta_nueva12,0777, true);
									}
								//$ruta_nueva1_s3=$ruta_nueva1_s3."/".$_FILES['archivo12']['name'][$i];
								$ruta_nueva12 = $ruta_nueva12."/".htmlspecialchars($_POST['Foto12']);
								//$ruta_img1_s3="../".$ruta_nueva1_s3;
								if(file_exists($ruta_nueva12)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo12']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva12);
									echo"";
								}
							}
						}
						$num_archivo=count($_FILES['archivo13']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo13']['name'][$i])){
								
								$ruta_nueva13="files/servicio/$fecha_servicio/$equipo/$carpeta/diario/aac"; 
						if(!file_exists($ruta_nueva13)){
										mkdir($ruta_nueva13,0777, true);
									}
								//$ruta_nueva1_s3=$ruta_nueva1_s3."/".$_FILES['archivo13']['name'][$i];
								$ruta_nueva13 = $ruta_nueva13."/".htmlspecialchars($_POST['Foto13']);
								//$ruta_img1_s3="../".$ruta_nueva1_s3;
								if(file_exists($ruta_nueva13)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo13']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva13);
									echo"";
								}
							}
						}
						$num_archivo=count($_FILES['archivo14']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo14']['name'][$i])){
								
								$ruta_nueva14="files/servicio/$fecha_servicio/$equipo/$carpeta/diario/rac"; 
						if(!file_exists($ruta_nueva14)){
										mkdir($ruta_nueva14,0777, true);
									}
								$ruta_nueva14 = $ruta_nueva14."/".htmlspecialchars($_POST['Foto14']);
								if(file_exists($ruta_nueva14)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo14']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva14);
									echo"";
								}
							}
						}
						$num_archivo=count($_FILES['archivo15']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo15']['name'][$i])){
								
								$ruta_nueva15="files/servicio/$fecha_servicio/$equipo/$carpeta/diario/amp"; 
						if(!file_exists($ruta_nueva15)){
										mkdir($ruta_nueva15,0777, true);
									}
								//$ruta_nueva1_s3=$ruta_nueva1_s3."/".$_FILES['archivo15']['name'][$i];
								$ruta_nueva15 = $ruta_nueva15."/".htmlspecialchars($_POST['Foto15']);
								//$ruta_img1_s3="../".$ruta_nueva1_s3;
								if(file_exists($ruta_nueva15)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo15']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva15);
									echo"";
								}
							}
						}
							$num_archivo=count($_FILES['archivo16']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo16']['name'][$i])){
								
								$ruta_nueva16="files/servicio/$fecha_servicio/$equipo/$carpeta/diario/observaciones"; 
						if(!file_exists($ruta_nueva16)){
										mkdir($ruta_nueva16,0777, true);
									}
								//$ruta_nueva1_s3=$ruta_nueva1_s3."/".$_FILES['archivo16']['name'][$i];
								$ruta_nueva16 = $ruta_nueva16."/".htmlspecialchars($_POST['Foto16']);
								//$ruta_img1_s3="../".$ruta_nueva1_s3;
								if(file_exists($ruta_nueva16)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo16']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva16);
									echo"";
								}
							}
						}
						$num_archivo=count($_FILES['archivo17']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo17']['name'][$i])){
								
								$ruta_nueva17="files/servicio/$fecha_servicio/$equipo/$carpeta/diario/observaciones"; 
						if(!file_exists($ruta_nueva17)){
										mkdir($ruta_nueva17,0777, true);
									}
								//$ruta_nueva1_s3=$ruta_nueva1_s3."/".$_FILES['archivo17']['name'][$i];
								$ruta_nueva17 = $ruta_nueva17."/".htmlspecialchars($_POST['Foto17']);
								//$ruta_img1_s3="../".$ruta_nueva1_s3;
								if(file_exists($ruta_nueva17)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo17']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva17);
									echo"";
								}
							}
						}
						$num_archivo=count($_FILES['archivo18']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo18']['name'][$i])){
								
								$ruta_nueva18="files/servicio/$fecha_servicio/$equipo/$carpeta/diario/observaciones"; 
						if(!file_exists($ruta_nueva18)){
										mkdir($ruta_nueva18,0777, true);
									}
								//$ruta_nueva1_s3=$ruta_nueva1_s3."/".$_FILES['archivo18']['name'][$i];
								$ruta_nueva18 = $ruta_nueva18."/".htmlspecialchars($_POST['Foto18']);
								//$ruta_img1_s3="../".$ruta_nueva1_s3;
								if(file_exists($ruta_nueva18)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo18']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva18);
									echo"";
								}
							}
						}
						$num_archivo=count($_FILES['archivo19']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo19']['name'][$i])){
								
								$ruta_nueva19="files/servicio/$fecha_servicio/$equipo/$carpeta/diario/observaciones"; 
						if(!file_exists($ruta_nueva19)){
										mkdir($ruta_nueva19,0777, true);
									}
								$ruta_nueva19 = $ruta_nueva19."/".htmlspecialchars($_POST['Foto19']);
								if(file_exists($ruta_nueva19)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo19']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva19);
									echo"";
								}
							}
						}
						$num_archivo=count($_FILES['archivo20']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo20']['name'][$i])){
								
								$ruta_nueva20="files/servicio/$fecha_servicio/$equipo/$carpeta/diario/observaciones"; 
						if(!file_exists($ruta_nueva20)){
										mkdir($ruta_nueva20,0777, true);
									}
								//$ruta_nueva1_s3=$ruta_nueva1_s3."/".$_FILES['archivo20']['name'][$i];
								$ruta_nueva20 = $ruta_nueva20."/".htmlspecialchars($_POST['Foto20']);
								//$ruta_img1_s3="../".$ruta_nueva1_s3;
								if(file_exists($ruta_nueva20)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo20']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva20);
									echo"";
								}
							}
						}
						$num_archivo=count($_FILES['archivo21']['name']);
						for ($i=0; $i <=$num_archivo; $i++){
							if(!empty($_FILES['archivo21']['name'][$i])){
								
								$ruta_nueva21="files/servicio/$fecha_servicio/$equipo/$carpeta/diario/observaciones"; 
						if(!file_exists($ruta_nueva21)){
										mkdir($ruta_nueva21,0777, true);
									}
								//$ruta_nueva1_s3=$ruta_nueva1_s3."/".$_FILES['archivo16']['name'][$i];
								$ruta_nueva21 = $ruta_nueva21."/".htmlspecialchars($_POST['Foto21']);
								//$ruta_img1_s3="../".$ruta_nueva1_s3;
								if(file_exists($ruta_nueva21)){
									echo "";
								}else{
									$ruta_temporal=$_FILES['archivo21']['tmp_name'][$i];
									move_uploaded_file($ruta_temporal, $ruta_nueva21);
									echo"";
								}
							}
						}
						
		 $con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("INSERT INTO diario_serv (
			empresa, edificio, ubicacion, equipo, carpeta, fecha_servicio, frecuencia, potencia, vel_moto, operacion, amperaje, caida_merv8, car_act, caida_merv15, caida_merv17, l1, l2, l3, l1_l2, l1_l3, l2_l3, neutro, aah_temp, aah_psi, rah_temp, rah_psi, aac_temp, aac_psi, rac_temp, rac_psi, manometro, manguera, filtro, drenajes, observaciones, semana, dia, hora, mes, anio, tecnico )
							VALUES
			('$empresa', '$edificio', '$ubicacion', '$equipo', '$carpeta', '$fecha_servicio', '$frecuencia', '$potencia', '$vel_moto', '$operacion', '$amperaje',  '$caida_merv8', '$car_act', '$caida_merv15','$caida_merv17', '$l1', '$l2', '$l3', '$l1_l2', '$l1_l3', '$l2_l3', '$neutro', '$aah_temp', '$aah_psi', '$rah_temp', '$rah_psi', '$aac_temp', '$aac_psi', '$rac_temp', '$rac_psi', '$manometro', '$manguera', '$filtro',	'$drenajes', '$observaciones', '$semana', '$dia', '$hora', '$mes', '$anio', '$tecnico')"))){

				echo 
                '<script language="javascript">
				alert("El Servicio ha sido guardado. Gracias");
				window.location.href="diario_servic.php"</script>';

          }else{
             echo 
              '   <script language="javascript">
				alert("El Servicio no se ha podido guardar..::Intente de nuevo::..");
				window.location.href="diario_servic.php"</script>';
          }
?>