<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
	 if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="admin"){ 
?>
<!DOCTYPE html>
<?php include "./inc/links.php"; ?> 
<html >
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <title>Editar Servicio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <link rel="shortcut icon" href="img/favicon.ico">
  <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css'>
  <link rel="stylesheet"; href="https://unpkg.com/ng-table@2.0.2/bundles/ng-table.min.css">
  <script src="https://unpkg.com/ng-table@2.0.2/bundles/ng-table.min.js"></script>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="angular/angular.min.js"></script>
        <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/sweetalert.css">
<script src="js/custom.js"></script>
     <script src="js/sweetalert.min.js"></script>
  
</head>
<style>
    .btn { 
        padding: 10px;
		}
		@media (min-width: 768px)
.col-sm-222 {
    width: 50%;
}
@media (min-width: 768px)
.col-sm-110 {
    width: 80%;
}
.panel-success>.panel-heading {
    color: #2774e8;
    background-color: #d8e8f0;
    border-color: #c6e9e9;
}
@media (min-width: 768px)
.col-sm-offset-2 {
    margin-left: 10.66666667%;
}
</style>

  <body>
    
<div id="menu-overlay"></div>
<div id="menu-toggle" class="closed" data-title="Menu">
    <i class="fa fa-bars"></i>
    <i class="fa fa-times"></i>
  </div>
<header id="main-header">
  <nav id="sidenav">
    <div id="sidenav-header">
      <div id="profile-picture">
      	<img src="img/owl.png"/>
      </div>
      <a href="#" id="profile-link"><h4>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['nombre']; ?></h4>
    </div>
    <div id="account-actions">
    <a href="index.php" ><button class="btn btn-success" title="Regresar al incio"><i class="fa fa-home"></i></button></a>
        </div>
       
    <ul id="main-nav">
      <li>
        <a href="inicio.php">
          <i class="fa fa-grav"></i>
          Inicio
        </a>
      </li>
      <li>
        <a href="empresa.php">
          <i class="fa fa-hospital-o"></i>
        Empresa
        </a>
      </li>
	  <li>
        <a href="edificio.php">
          <i class="fa fa-university"></i>
          Edificio
        </a>
      </li>
	 
	   <li>
        <a href="ubicacion.php">
          <i class="fa fa-map-marker"></i>
          Ubicación
        </a>
      </li>
	   <li>
        <a href="area.php">
          <i class="fa fa-rss-square"></i>
          Área
        </a>
      </li>
      <li>
        <a href="equipo.php">
          <i class="fa fa-cubes"></i>
        Equipo
        </a>
      </li>
	  <li>
        <a href="tarea.php">
          <i class="fa fa-cogs"></i>
        Config
        </a>
      </li>
      <li>
        <a href="tarea.php">
          <i class="fa fa-cogs"></i>
          Config
        </a>
      </li>
	  <li class="active">
        <a href="seccion_admin.php">
          <i class="fa fa-wrench"></i>
        Servicio
        </a>
      </li>	
	  <li>
        <a href="tabla_servicios.php">
          <i class="fa fa-pencil-square-o"></i>
        Editar Servicio
        </a>
      </li>
		<li>
        <a href="diario_servic.php">
          <i class="fa fa-calendar-check-o"></i>
        Diario
        </a>
      </li>	  
      <li>
        <a href="menu_grafica.php">
          <i class="fa fa-line-chart"></i>
          Grafica
        </a>
      </li>
        <li>
        <a href="tabla_usuarios.php">
          <i class="fa fa-user"></i>
          Usuario
        </a>
		 </li>
    </ul>
  </nav>
 
  <div id="header_logo">
    <a href=""></a>
  </div>
</header>
<section id="content">
  <header id="content-header">
  
  <table>  
    <td>
		<tr>
       <a href="tabla_servicios.php" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
	   </tr>
	</td>
	   </table>
		<!--************************************ Page content******************************-->
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Editar Servicio</h1>
                <span class="label label-danger"></span>
                <p class="pull-right text-primary">
               </p>
              </div>
            </div>
          </div>
        </div>
		<!--************************************ Page content******************************-->
<div class="container">
  <div class="row">
    <div class="col-sm-8">
      <div class="panel panel-success">
        <div class="panel-heading text-center"><strong>Edite la información que se muestra a continuación</strong></div>
        <div class="panel-body">
            <form role="form" action="" method="POST" enctype="multipart/form-data">
		
    <?php
   
			
	include './lib/class_mysql.php';
include './lib/config.php';

	include ("conexi.php");
	
 if(isset($_REQUEST['equipo']) && isset($_REQUEST['fecha_servicio'])){ 
			
		if(isset($_REQUEST['id_servicio'])){
			$id_servicio= $_REQUEST['id_servicio'];
		}else{
			$id_servicio="";
		}
		if(isset($_REQUEST['equipo'])){
			$equipo= $_REQUEST['equipo'];
		}else{
			$equipo="";
		}
		if(isset($_REQUEST['fecha_servicio'])){
			$fecha_servicio= $_REQUEST['fecha_servicio'];
		}else{
			$fecha_servicio="";
		}
			if(isset($_REQUEST['carpeta'])){
			$carpeta= $_REQUEST['carpeta'];
		}else{
			$carpeta="";
		}
			////////////////////////////////////////////////////////////////////////////
		$num_archivo=count($_FILES['archivo1']['name']);
		for ($i=0; $i <=$num_archivo; $i++){
			if(!empty($_FILES['archivo1']['name'][$i])){
				
				$ruta_nueva="files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa1/Lectura/Inicial";
		if(!file_exists($ruta_nueva)){
						mkdir($ruta_nueva);
					}
				//$ruta_nueva=$ruta_nueva."/".$_FILES['archivo1']['name'][$i];
				$ruta_nueva = $ruta_nueva."/".htmlspecialchars($_POST['Foto']);
				//$ruta_img="../".$ruta_nueva;
	
				if(file_exists($ruta_nueva)){
					echo "";
				}else{
					$ruta_temporal=$_FILES['archivo1']['tmp_name'][$i];
					move_uploaded_file($ruta_temporal, $ruta_nueva);
					echo"";
				}
			}
		}

		/////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		$num_archivo=count($_FILES['archivo2']['name']);
		for ($i=0; $i <=$num_archivo; $i++){
			if(!empty($_FILES['archivo2']['name'][$i])){
				
				$ruta_nueva2="files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa1/Lectura/Final";
		if(!file_exists($ruta_nueva2)){
						mkdir($ruta_nueva2);
					}
				//$ruta_nueva2=$ruta_nueva2."/".$_FILES['archivo2']['name'][$i];
				$ruta_nueva2 = $ruta_nueva2."/".htmlspecialchars($_POST['Foto2']);
				//$ruta_img2="../".$ruta_nueva;
		
				if(file_exists($ruta_nueva2)){
					echo "";
				}else{
					$ruta_temporal2=$_FILES['archivo2']['tmp_name'][$i];
					move_uploaded_file($ruta_temporal2, $ruta_nueva2);
					echo"";
				}
			}
		}
		/////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		$num_archivo=count($_FILES['archivo3']['name']);
		for ($i=0; $i <=$num_archivo; $i++){
			if(!empty($_FILES['archivo3']['name'][$i])){
				
				$ruta_nueva3="files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa1/Cambio";
		if(!file_exists($ruta_nueva3)){
						mkdir($ruta_nueva3);
					}
				//$ruta_nueva2=$ruta_nueva2."/".$_FILES['archivo3']['name'][$i];
				$ruta_nueva3 = $ruta_nueva3."/".htmlspecialchars($_POST['Foto3']);
				//$ruta_img2="../".$ruta_nueva;
		
				if(file_exists($ruta_nueva3)){
					echo "";
				}else{
					$ruta_temporal3=$_FILES['archivo3']['tmp_name'][$i];
					move_uploaded_file($ruta_temporal3, $ruta_nueva3);
					echo"";
				}
			}
		}
		/////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		$num_archivo=count($_FILES['archivo4']['name']);
		for ($i=0; $i <=$num_archivo; $i++){
			if(!empty($_FILES['archivo4']['name'][$i])){
				
				$ruta_nueva4="files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa1/Limpieza";
		if(!file_exists($ruta_nueva4)){
						mkdir($ruta_nueva4);
					}
				//$ruta_nueva2=$ruta_nueva2."/".$_FILES['archivo4']['name'][$i];
				$ruta_nueva4 = $ruta_nueva4."/".htmlspecialchars($_POST['Foto4']);
				//$ruta_img2="../".$ruta_nueva;
		
				if(file_exists($ruta_nueva4)){
					echo "";
				}else{
					$ruta_temporal4=$_FILES['archivo4']['tmp_name'][$i];
					move_uploaded_file($ruta_temporal4, $ruta_nueva4);
					echo"";
				}
			}
		}
		/////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		$num_archivo=count($_FILES['archivo5']['name']);
		for ($i=0; $i <=$num_archivo; $i++){
			if(!empty($_FILES['archivo5']['name'][$i])){
				
				$ruta_nueva1_s2="files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa2/Lectura/Inicial";
		if(!file_exists($ruta_nueva1_s2)){
						mkdir($ruta_nueva1_s2);
					}
				//$ruta_nueva2=$ruta_nueva2."/".$_FILES['archivo5']['name'][$i];
				$ruta_nueva1_s2 = $ruta_nueva1_s2."/".htmlspecialchars($_POST['Foto5']);
				//$ruta_img2="../".$ruta_nueva;
		
				if(file_exists($ruta_nueva1_s2)){
					echo "";
				}else{
					$ruta_temporal5=$_FILES['archivo5']['tmp_name'][$i];
					move_uploaded_file($ruta_temporal5, $ruta_nueva1_s2);
					echo"";
				}
			}
		}
		/////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		$num_archivo=count($_FILES['archivo6']['name']);
		for ($i=0; $i <=$num_archivo; $i++){
			if(!empty($_FILES['archivo6']['name'][$i])){
				
				$ruta_nueva2_s2="files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa2/Lectura/Final";
		if(!file_exists($ruta_nueva2_s2)){
						mkdir($ruta_nueva2_s2);
					}
				//$ruta_nueva2=$ruta_nueva2."/".$_FILES['archivo6']['name'][$i];
				$ruta_nueva2_s2 = $ruta_nueva2_s2."/".htmlspecialchars($_POST['Foto6']);
				//$ruta_img2="../".$ruta_nueva;
		
				if(file_exists($ruta_nueva2_s2)){
					echo "";
				}else{
					$ruta_temporal6=$_FILES['archivo6']['tmp_name'][$i];
					move_uploaded_file($ruta_temporal6, $ruta_nueva2_s2);
					echo"";
				}
			}
		}
		/////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		$num_archivo=count($_FILES['archivo7']['name']);
		for ($i=0; $i <=$num_archivo; $i++){
			if(!empty($_FILES['archivo7']['name'][$i])){
				
				$ruta_nueva3_s2="files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa2/Cambio";
		if(!file_exists($ruta_nueva3_s2)){
						mkdir($ruta_nueva3_s2);
					}
				//$ruta_nueva2=$ruta_nueva2."/".$_FILES['archivo7']['name'][$i];
				$ruta_nueva3_s2 = $ruta_nueva3_s2."/".htmlspecialchars($_POST['Foto7']);
				//$ruta_img2="../".$ruta_nueva;
		
				if(file_exists($ruta_nueva3_s2)){
					echo "";
				}else{
					$ruta_temporal7=$_FILES['archivo7']['tmp_name'][$i];
					move_uploaded_file($ruta_temporal7, $ruta_nueva3_s2);
					echo"";
				}
			}
		}
		/////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		$num_archivo=count($_FILES['archivo8']['name']);
		for ($i=0; $i <=$num_archivo; $i++){
			if(!empty($_FILES['archivo8']['name'][$i])){
				
				$ruta_nueva4_s2="files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa2/Limpieza";
		if(!file_exists($ruta_nueva4_s2)){
						mkdir($ruta_nueva4_s2);
					}
				//$ruta_nueva2=$ruta_nueva2."/".$_FILES['archivo8']['name'][$i];
				$ruta_nueva4_s2 = $ruta_nueva4_s2."/".htmlspecialchars($_POST['Foto8']);
				//$ruta_img2="../".$ruta_nueva;
		
				if(file_exists($ruta_nueva4_s2)){
					echo "";
				}else{
					$ruta_temporal8=$_FILES['archivo8']['tmp_name'][$i];
					move_uploaded_file($ruta_temporal8, $ruta_nueva4_s2);
					echo"";
				}
			}
		}
		/////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		$num_archivo=count($_FILES['archivo9']['name']);
		for ($i=0; $i <=$num_archivo; $i++){
			if(!empty($_FILES['archivo9']['name'][$i])){
				
				$ruta_nueva1_s3="files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa3/Lectura/Inicial";
		if(!file_exists($ruta_nueva1_s3)){
						mkdir($ruta_nueva1_s3);
					}
				//$ruta_nueva2=$ruta_nueva2."/".$_FILES['archivo9']['name'][$i];
				$ruta_nueva1_s3 = $ruta_nueva1_s3."/".htmlspecialchars($_POST['Foto9']);
				//$ruta_img2="../".$ruta_nueva;
		
				if(file_exists($ruta_nueva1_s3)){
					echo "";
				}else{
					$ruta_temporal9=$_FILES['archivo9']['tmp_name'][$i];
					move_uploaded_file($ruta_temporal9, $ruta_nueva1_s3);
					echo"";
				}
			}
		}
		/////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		$num_archivo=count($_FILES['archivo10']['name']);
		for ($i=0; $i <=$num_archivo; $i++){
			if(!empty($_FILES['archivo10']['name'][$i])){
				
				$ruta_nueva2_s3="files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa3/Lectura/Final";
		if(!file_exists($ruta_nueva2_s3)){
						mkdir($ruta_nueva2_s3);
					}
				//$ruta_nueva2=$ruta_nueva2."/".$_FILES['archivo10']['name'][$i];
				$ruta_nueva2_s3 = $ruta_nueva2_s3."/".htmlspecialchars($_POST['Foto10']);
				//$ruta_img2="../".$ruta_nueva;
		
				if(file_exists($ruta_nueva2_s3)){
					echo "";
				}else{
					$ruta_temporal10=$_FILES['archivo10']['tmp_name'][$i];
					move_uploaded_file($ruta_temporal10, $ruta_nueva2_s3);
					echo"";
				}
			}
		}
		/////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		$num_archivo=count($_FILES['archivo11']['name']);
		for ($i=0; $i <=$num_archivo; $i++){
			if(!empty($_FILES['archivo11']['name'][$i])){
				
				$ruta_nueva3_s3="files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa3/Cambio";
		if(!file_exists($ruta_nueva3_s3)){
						mkdir($ruta_nueva3_s3);
					}
				//$ruta_nueva2=$ruta_nueva2."/".$_FILES['archivo11']['name'][$i];
				$ruta_nueva3_s3 = $ruta_nueva3_s3."/".htmlspecialchars($_POST['Foto11']);
				//$ruta_img2="../".$ruta_nueva;
		
				if(file_exists($ruta_nueva3_s3)){
					echo "";
				}else{
					$ruta_temporal11=$_FILES['archivo11']['tmp_name'][$i];
					move_uploaded_file($ruta_temporal11, $ruta_nueva3_s3);
					echo"";
				}
			}
		}
		/////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		$num_archivo=count($_FILES['archivo12']['name']);
		for ($i=0; $i <=$num_archivo; $i++){
			if(!empty($_FILES['archivo12']['name'][$i])){
				
				$ruta_nueva4_s3="files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa3/Limpieza";
		if(!file_exists($ruta_nueva4_s3)){
						mkdir($ruta_nueva4_s3);
					}
				//$ruta_nueva2=$ruta_nueva2."/".$_FILES['archivo12']['name'][$i];
				$ruta_nueva4_s3 = $ruta_nueva4_s3."/".htmlspecialchars($_POST['Foto12']);
				//$ruta_img2="../".$ruta_nueva;
		
				if(file_exists($ruta_nueva4_s3)){
					echo "";
				}else{
					$ruta_temporal12=$_FILES['archivo12']['tmp_name'][$i];
					move_uploaded_file($ruta_temporal12, $ruta_nueva4_s3);
					echo"";
				}
			}
		}
		/////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		$num_archivo=count($_FILES['archivo13']['name']);
		for ($i=0; $i <=$num_archivo; $i++){
			if(!empty($_FILES['archivo13']['name'][$i])){
				
				$ruta_nueva1_s4="files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa4/Lectura/Inicial";
		if(!file_exists($ruta_nueva1_s4)){
						mkdir($ruta_nueva1_s4);
					}
				//$ruta_nueva2=$ruta_nueva2."/".$_FILES['archivo13']['name'][$i];
				$ruta_nueva1_s4 = $ruta_nueva1_s4."/".htmlspecialchars($_POST['Foto13']);
				//$ruta_img2="../".$ruta_nueva;
		
				if(file_exists($ruta_nueva1_s4)){
					echo "";
				}else{
					$ruta_temporal13=$_FILES['archivo13']['tmp_name'][$i];
					move_uploaded_file($ruta_temporal13, $ruta_nueva1_s4);
					echo"";
				}
			}
		}
		/////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		$num_archivo=count($_FILES['archivo14']['name']);
		for ($i=0; $i <=$num_archivo; $i++){
			if(!empty($_FILES['archivo14']['name'][$i])){
				
				$ruta_nueva2_s4="files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa4/Lectura/Final";
		if(!file_exists($ruta_nueva2_s4)){
						mkdir($ruta_nueva2_s4);
					}
				//$ruta_nueva2=$ruta_nueva2."/".$_FILES['archivo14']['name'][$i];
				$ruta_nueva2_s4 = $ruta_nueva2_s4."/".htmlspecialchars($_POST['Foto14']);
				//$ruta_img2="../".$ruta_nueva;
		
				if(file_exists($ruta_nueva2_s4)){
					echo "";
				}else{
					$ruta_temporal14=$_FILES['archivo14']['tmp_name'][$i];
					move_uploaded_file($ruta_temporal14, $ruta_nueva2_s4);
					echo"";
				}
			}
		}
		/////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		$num_archivo=count($_FILES['archivo15']['name']);
		for ($i=0; $i <=$num_archivo; $i++){
			if(!empty($_FILES['archivo15']['name'][$i])){
				
				$ruta_nueva3_s4="files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa4/Cambio";
		if(!file_exists($ruta_nueva3_s4)){
						mkdir($ruta_nueva3_s4);
					}
				//$ruta_nueva2=$ruta_nueva2."/".$_FILES['archivo15']['name'][$i];
				$ruta_nueva3_s4 = $ruta_nueva3_s4."/".htmlspecialchars($_POST['Foto15']);
				//$ruta_img2="../".$ruta_nueva;
		
				if(file_exists($ruta_nueva3_s4)){
					echo "";
				}else{
					$ruta_temporal15=$_FILES['archivo15']['tmp_name'][$i];
					move_uploaded_file($ruta_temporal15, $ruta_nueva3_s4);
					echo"";
				}
			}
		}
		/////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		$num_archivo=count($_FILES['archivo16']['name']);
		for ($i=0; $i <=$num_archivo; $i++){
			if(!empty($_FILES['archivo16']['name'][$i])){
				
				$ruta_nueva4_s4="files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa4/Limpieza";
		if(!file_exists($ruta_nueva4_s4)){
						mkdir($ruta_nueva4_s4);
					}
				//$ruta_nueva2=$ruta_nueva2."/".$_FILES['archivo16']['name'][$i];
				$ruta_nueva4_s4 = $ruta_nueva4_s4."/".htmlspecialchars($_POST['Foto16']);
				//$ruta_img2="../".$ruta_nueva;
		
				if(file_exists($ruta_nueva4_s4)){
					echo "";
				}else{
					$ruta_temporal16=$_FILES['archivo16']['tmp_name'][$i];
					move_uploaded_file($ruta_temporal16, $ruta_nueva4_s4);
					echo"";
				}
			}
		}
		/////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		$num_archivo=count($_FILES['archivo17']['name']);
		for ($i=0; $i <=$num_archivo; $i++){
			if(!empty($_FILES['archivo17']['name'][$i])){
				
				$ruta_nueva1_s5="files/servicio/$fecha_servicio/$equipo/$carpeta/Motoventilador/posterior";
		if(!file_exists($ruta_nueva1_s5)){
						mkdir($ruta_nueva1_s5);
					}
				//$ruta_nueva2=$ruta_nueva2."/".$_FILES['archivo17']['name'][$i];
				$ruta_nueva1_s5 = $ruta_nueva1_s5."/".htmlspecialchars($_POST['Foto17']);
				//$ruta_img2="../".$ruta_nueva;
		
				if(file_exists($ruta_nueva1_s5)){
					echo "";
				}else{
					$ruta_temporal17=$_FILES['archivo17']['tmp_name'][$i];
					move_uploaded_file($ruta_temporal17, $ruta_nueva1_s5);
					echo"";
				}
			}
		}
		/////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		$num_archivo=count($_FILES['archivo18']['name']);
		for ($i=0; $i <=$num_archivo; $i++){
			if(!empty($_FILES['archivo18']['name'][$i])){
				
				$ruta_nueva1_s6="files/servicio/$fecha_servicio/$equipo/$carpeta/Serpentin/posterior";
		if(!file_exists($ruta_nueva1_s6)){
						mkdir($ruta_nueva1_s6);
					}
				//$ruta_nueva2=$ruta_nueva2."/".$_FILES['archivo18']['name'][$i];
				$ruta_nueva1_s6 = $ruta_nueva1_s6."/".htmlspecialchars($_POST['Foto18']);
				//$ruta_img2="../".$ruta_nueva;
		
				if(file_exists($ruta_nueva1_s6)){
					echo "";
				}else{
					$ruta_temporal18=$_FILES['archivo18']['tmp_name'][$i];
					move_uploaded_file($ruta_temporal18, $ruta_nueva1_s6);
					echo"";
				}
			}
		}
		/////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		$num_archivo=count($_FILES['archivo19']['name']);
		for ($i=0; $i <=$num_archivo; $i++){
			if(!empty($_FILES['archivo19']['name'][$i])){
				
				$ruta_nueva1_s8="files/servicio/$fecha_servicio/$equipo/$carpeta/Charola/posterior";
		if(!file_exists($ruta_nueva1_s8)){
						mkdir($ruta_nueva1_s8);
					}
				//$ruta_nueva2=$ruta_nueva2."/".$_FILES['archivo2']['name'][$i];
				$ruta_nueva1_s8 = $ruta_nueva1_s8."/".htmlspecialchars($_POST['Foto19']);
				//$ruta_img2="../".$ruta_nueva;
		
				if(file_exists($ruta_nueva1_s8)){
					echo "";
				}else{
					$ruta_temporal19=$_FILES['archivo19']['tmp_name'][$i];
					move_uploaded_file($ruta_temporal19, $ruta_nueva1_s8);
					echo"";
				}
			}
		}
		/////////////////////////////////////////////////////////////////////////////
		
        if(isset($_REQUEST['valor1'])){
			$valor1= $_REQUEST['valor1'];
		}else{
			$valor1="";
		}
		
		if(isset($_REQUEST['valor2'])){
			$valor2= $_REQUEST['valor2'];
		}else{
			$valor2="";
		}
		if(isset($_REQUEST['valor3'])){
			$valor3= $_REQUEST['valor3'];
		}else{
			$valor3="";
		}
		if(isset($_REQUEST['valor4'])){
			$valor4= $_REQUEST['valor4'];
		}else{
			$valor4="";
		}
		if(isset($_REQUEST['valor1_s2'])){
			$valor1_s2= $_REQUEST['valor1_s2'];
		}else{
			$valor1_s2="";
		}
		if(isset($_REQUEST['valor2_s2'])){
			$valor2_s2= $_REQUEST['valor2_s2'];
		}else{
			$valor2_s2="";
		}
		if(isset($_REQUEST['valor3_s2'])){
			$valor3_s2= $_REQUEST['valor3_s2'];
		}else{
			$valor3_s2="";
		}
		if(isset($_REQUEST['valor4_s2'])){
			$valor4_s2= $_REQUEST['valor4_s2'];
		}else{
			$valor4_s2="";
		}
		if(isset($_REQUEST['valor1_s3'])){
			$valor1_s3= $_REQUEST['valor1_s3'];
		}else{
			$valor1_s3="";
		}
		if(isset($_REQUEST['valor2_s3'])){
			$valor2_s3= $_REQUEST['valor2_s3'];
		}else{
			$valor2_s3="";
		}
		if(isset($_REQUEST['valor3_s3'])){
			$valor3_s3= $_REQUEST['valor3_s3'];
		}else{
			$valor3_s3="";
		}
		if(isset($_REQUEST['valor4_s3'])){
			$valor4_s3= $_REQUEST['valor4_s3'];
		}else{
			$valor4_s3="";
		}
		if(isset($_REQUEST['valor1_s4'])){
			$valor1_s4= $_REQUEST['valor1_s4'];
		}else{
			$valor1_s4="";
		}
		if(isset($_REQUEST['valor2_s4'])){
			$valor2_s4= $_REQUEST['valor2_s4'];
		}else{
			$valor2_s4="";
		}
		if(isset($_REQUEST['valor3_s4'])){
			$valor3_s4= $_REQUEST['valor3_s4'];
		}else{
			$valor3_s4="";
		}
		if(isset($_REQUEST['valor4_s4'])){
			$valor4_s4= $_REQUEST['valor4_s4'];
		}else{
			$valor4_s4="";
		}
		if(isset($_REQUEST['valor1_s5'])){
			$valor1_s5= $_REQUEST['valor1_s5'];
		}else{
			$valor1_s5="";
		}
		if(isset($_REQUEST['valor2_s5'])){
			$valor2_s5= $_REQUEST['valor2_s5'];
		}else{
			$valor2_s5="";
		}
		if(isset($_REQUEST['valor3_s5'])){
			$valor3_s5= $_REQUEST['valor3_s5'];
		}else{
			$valor3_s5="";
		}
		if(isset($_REQUEST['valor4_s5'])){
			$valor4_s5= $_REQUEST['valor4_s5'];
		}else{
			$valor4_s5="";
		}
		if(isset($_REQUEST['valor5_s5'])){
			$valor5_s5= $_REQUEST['valor5_s5'];
		}else{
			$valor5_s5="";
		}
		if(isset($_REQUEST['valor6_s5'])){
			$valor6_s5= $_REQUEST['valor6_s5'];
		}else{
			$valor6_s5="";
		}
		if(isset($_REQUEST['valor1_s6'])){
			$valor1_s6= $_REQUEST['valor1_s6'];
		}else{
			$valor1_s6="";
		}
		
	
		if(isset($_REQUEST['valor1_s8'])){
			$valor1_s8= $_REQUEST['valor1_s8'];
		}else{
			$valor1_s8="";
		}
		if(isset($_REQUEST['valor_uptime'])){
			$valor_uptime= $_REQUEST['valor_uptime'];
		}else{
			$valor_uptime="";
		}
		if(isset($_REQUEST['observaciones'])){
			$observaciones= $_REQUEST['observaciones'];
		}else{
			$observaciones="";
		}
		if(isset($_REQUEST['tempentrada'])){
			$tempentrada= $_REQUEST['tempentrada'];
		}else{
			$tempentrada="";
		}
		if(isset($_REQUEST['tempsalida'])){
			$tempsalida= $_REQUEST['tempsalida'];
		}else{
			$tempsalida="";
		}
		if(isset($_REQUEST['tempresion'])){
			$tempresion= $_REQUEST['tempresion'];
		}else{
			$tempresion="";
		}
		if(isset($_REQUEST['tempentrada2'])){
			$tempentrada2= $_REQUEST['tempentrada2'];
		}else{
			$tempentrada2="";
		}
		if(isset($_REQUEST['tempsalida2'])){
			$tempsalida2= $_REQUEST['tempsalida2'];
		}else{
			$tempsalida2="";
		}
		if(isset($_REQUEST['tempresion2'])){
			$tempresion2= $_REQUEST['tempresion2'];
		}else{
			$tempresion2="";
		}
		if(isset($_REQUEST['estadoval'])){
			$estadoval= $_REQUEST['estadoval'];
		}else{
			$estadoval="";
		}
		if(isset($_REQUEST['tipomodulacion'])){
			$tipomodulacion= $_REQUEST['tipomodulacion'];
		}else{
			$tipomodulacion="";
		}
		if(isset($_REQUEST['estamanguera'])){
			$estamanguera= $_REQUEST['estamanguera'];
		}else{
			$estamanguera="";
		}
		if(isset($_REQUEST['amperaje1_s3'])){
			$amperaje1_s3= $_REQUEST['amperaje1_s3'];
		}else{
			$amperaje1_s3="";
		}
		if(isset($_REQUEST['amperaje2_s3'])){
			$amperaje2_s3= $_REQUEST['amperaje2_s3'];
		}else{
			$amperaje2_s3="";
		}
		if(isset($_REQUEST['amperaje3_s3'])){
			$amperaje3_s3= $_REQUEST['amperaje3_s3'];
		}else{
			$amperaje3_s3="";
		}
		if(isset($_REQUEST['amperaje4_s3'])){
			$amperaje4_s3= $_REQUEST['amperaje4_s3'];
		}else{
			$amperaje4_s3="";
		}
		if(isset($_REQUEST['amperaje5_s3'])){
			$amperaje5_s3= $_REQUEST['amperaje5_s3'];
		}else{
			$amperaje5_s3="";
		}
		if(isset($_REQUEST['amperaje6_s3'])){
			$amperaje6_s3= $_REQUEST['amperaje6_s3'];
		}else{
			$amperaje6_s3="";
		}
		if(isset($_REQUEST['amperaje1_s4'])){
			$amperaje1_s4= $_REQUEST['amperaje1_s4'];
		}else{
			$amperaje1_s4="";
		}
		if(isset($_REQUEST['amperaje2_s4'])){
			$amperaje2_s4= $_REQUEST['amperaje2_s4'];
		}else{
			$amperaje2_s4="";
		}
		if(isset($_REQUEST['amperaje3_s4'])){
			$amperaje3_s4= $_REQUEST['amperaje3_s4'];
		}else{
			$amperaje3_s4="";
		}
		if(isset($_REQUEST['amperaje4_s4'])){
			$amperaje4_s4= $_REQUEST['amperaje4_s4'];
		}else{
			$amperaje4_s4="";
		}
		if(isset($_REQUEST['amperaje5_s4'])){
			$amperaje5_s4= $_REQUEST['amperaje5_s4'];
		}else{
			$amperaje5_s4="";
		}
		if(isset($_REQUEST['amperaje6_s4'])){
			$amperaje6_s4= $_REQUEST['amperaje6_s4'];
		}else{
			$amperaje6_s4="";
		}
		if(isset($_REQUEST['tornilleria'])){
			$tornilleria= $_REQUEST['tornilleria'];
		}else{
			$tornilleria="";
		}
		if(isset($_REQUEST['estacable'])){
			$estacable= $_REQUEST['estacable'];
		}else{
			$estacable="";
		}
		if(isset($_REQUEST['amperaje1_3'])){
			$amperaje1_3= $_REQUEST['amperaje1_3'];
		}else{
			$amperaje1_3="";
		}
		if(isset($_REQUEST['amperaje2_3'])){
			$amperaje2_3= $_REQUEST['amperaje2_3'];
		}else{
			$amperaje2_3="";
		}
		if(isset($_REQUEST['amperaje3_3'])){
			$amperaje3_3= $_REQUEST['amperaje3_3'];
		}else{
			$amperaje3_3="";
		}
		if(isset($_REQUEST['funcionamiento'])){
			$funcionamiento= $_REQUEST['funcionamiento'];
		}else{
			$funcionamiento="";
		}
		if(isset($_REQUEST['tipovariador'])){
			$tipovariador= $_REQUEST['tipovariador'];
		}else{
			$tipovariador="";
		}
		if(isset($_REQUEST['mejora'])){
			$mejora= $_REQUEST['mejora'];
		}else{
			$mejora="";
		}
		
			$con=mysqli_connect($host,$user,$pw,$db);	
			if(mysqli_query($con,("UPDATE servicio2 set  valor1='$valor1', valor2='$valor2', valor3='$valor3', valor4='$valor4', 
				valor1_s2='$valor1_s2', valor2_s2='$valor2_s2', valor3_s2='$valor3_s2', valor4_s2='$valor4_s2',
				valor1_s3='$valor1_s3', valor2_s3='$valor2_s3', valor3_s3='$valor3_s3', valor4_s3='$valor4_s3',
				valor1_s4='$valor1_s4', valor2_s4='$valor2_s4', valor3_s4='$valor3_s4', valor4_s4='$valor4_s4',
				valor1_s5='$valor1_s5', valor2_s5='$valor2_s5', valor3_s5='$valor3_s5', valor4_s5='$valor4_s5', valor5_s5='$valor5_s5', valor6_s5='$valor6_s5',
				valor1_s6='$valor1_s6', valor1_s8='$valor1_s8', valor_uptime='$valor_uptime', observaciones='$observaciones', 
				tempentrada='$tempentrada',tempsalida='$tempsalida',tempresion='$tempresion',tempentrada2='$tempentrada2',tempsalida2='$tempsalida2',tempresion2='$tempresion2',
				estadoval='$estadoval',tipomodulacion='$tipomodulacion',estamanguera='$estamanguera',amperaje1_s3='$amperaje1_s3',amperaje2_s3='$amperaje2_s3',amperaje3_s3='$amperaje3_s3',amperaje4_s3='$amperaje4_s3',amperaje5_s3='$amperaje5_s3',amperaje6_s3='$amperaje6_s3',
				amperaje1_s4='$amperaje1_s4',amperaje2_s4='$amperaje2_s4',amperaje3_s4='$amperaje3_s4',amperaje4_s4='$amperaje4_s4',amperaje5_s4='$amperaje5_s4',amperaje6_s4='$amperaje6_s4',
				tornilleria='$tornilleria',estacable='$estacable',amperaje1_3='$amperaje1_3',amperaje2_3='$amperaje2_3',amperaje3_3='$amperaje3_3',
				funcionamiento='$funcionamiento',tipovariador='$tipovariador',mejora='$mejora' WHERE id_servicio='$id_servicio' AND fecha_servicio='$fecha_servicio' "))){
						
		echo 
                '<script language="javascript">
				alert("El Servicio ha sido actualizado. Gracias");
				window.location.href="tabla_servicios.php"</script>';
		}else{
			echo 
                '<script language="javascript">
				alert("Ha ocurrido un error favor de verificar");
				window.location.href="tabla_servicios.php"</script>';
		}
}

	$id = MysqlQuery::RequestGet('id');
	$sql = Mysql::consulta("SELECT * FROM servicio2 WHERE id_servicio= '$id'");
	$registro=mysqli_fetch_array($sql, MYSQLI_ASSOC);

 
?>
	  <fieldset>
                		<input type="hidden" readonly="" name="id_servicio" readonly="" value="<?php echo $registro['id_servicio']?>">
						<input type="hidden" readonly="" name="carpeta" readonly="" value="<?php echo $registro['carpeta']?>">					
						<div class="form-group">
                            <label class="col-sm-222 control-label">Empresa</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="empresa" value="<?php echo utf8_decode($registro['empresa'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Edificio</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="edificio" value="<?php echo utf8_decode($registro['edificio'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Ubicación</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="ubicacion" value="<?php echo utf8_decode($registro['ubicacion'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Área</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="area" value="<?php echo utf8_decode($registro['area'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Equipo</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="equipo" value="<?php echo utf8_decode($registro['equipo'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Fecha de Servicio</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="fecha_servicio" value="<?php echo utf8_decode($registro['fecha_servicio'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio</label>
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label">Filtro 1era Etapa</font>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Lectura de Presion (In H2O/Pa)</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" name="valor1" value="<?php echo utf8_decode($registro['valor1'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                        </div>
						
						<?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa1/Lectura/Inicial/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa1/Lectura/Inicial/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/Etapa1/Lectura/Inicial/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						<div class="caja">
						<font  size=2 color="green" >Agregar Foto Nueva </font>
						<input style=display:none type="text" name="Foto" value="LectInicial.jpg">
						<input type="file" name="archivo1[]" id="archivo1" accept="image/*" />
						</div>
						
								<br>
						
							  <div class='input-group'>
                                <input type="text" class="form-control" name="valor2" value="<?php echo utf8_decode($registro['valor2'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
							  
						<?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa1/Lectura/Final/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa1/Lectura/Final/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/Etapa1/Lectura/Final/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						<div class="caja">
						<font  size=2 color="green" >Agregar Foto Nueva </font>
						<input style=display:none type="text" name="Foto2" value="LectFinal.jpg">
						<input type="file" name="archivo2[]" id="archivo2" accept="image/*" />
						</div>
						<br>								
                        </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Cambio de Filtros</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <select class="form-control" name="valor3">
                                        <option value="<?php echo $registro['valor3']?>"><?php echo utf8_decode($registro['valor3'])?>  (Actual)</option>
                                        <option value="Se realiza cambio">Se realiza cambio</option>
                                        <option value="No se realiza cambio presion satisfactoria">No se realiza cambio presi&oacute;n satisfactoria</option>
                                        <option value="No cuenta con etapa">No cuenta con etapa</option>
                                </select>
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
							  
							  <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa1/Cambio/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa1/Cambio/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/Etapa1/Cambio/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						<div class="caja">
						<font  size=2 color="green" >Agregar Foto Nueva </font>
						<input style=display:none type="text" name="Foto3" value="Cambio.jpg">
						<input type="file" name="archivo3[]" id="archivo3" accept="image/*" />
						</div>
						<br>						
                          </div>
                        </div>
						
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Limpieza</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <select class="form-control" name="valor4">          
										<option value="<?php echo $registro['valor4']?>"><?php echo utf8_decode($registro['valor4'])?>  (Actual)</option>
                                        <option value="Se realiza limpieza general">Se realiza limpieza general</option>
                                        <option value="No se realiza limpieza">No se realiza limpieza</option>
                                </select>
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
							  <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa1/Limpieza/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa1/Limpieza/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/Etapa1/Limpieza/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						<div class="caja">
						<font  size=2 color="green" >Agregar Foto Nueva </font>
						<input style=display:none type="text" name="Foto4" value="Limpieza.jpg">
						<input type="file" name="archivo4[]" id="archivo4" accept="image/*" />
						</div>
						<br>
                          </div>
                        </div>
			  
			  <br>	
			  
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio</label>
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label">Filtro 2da Etapa</font>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Lectura de Presion (In H2O/Pa)</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" name="valor1_s2" value="<?php echo utf8_decode($registro['valor1_s2'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
							  <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa2/Lectura/Inicial/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa2/Lectura/Inicial/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/Etapa2/Lectura/Inicial/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						<div class="caja">
						<font  size=2 color="green" >Agregar Foto Nueva </font>
						<input style=display:none type="text" name="Foto5" value="LectInicial.jpg">
						<input type="file" name="archivo5[]" id="archivo5" accept="image/*" />
						</div>
						<br>
							  <div class='input-group'>
                                <input type="text" class="form-control" name="valor2_s2" value="<?php echo utf8_decode($registro['valor2_s2'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
							  <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa2/Lectura/Final/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa2/Lectura/Final/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/Etapa2/Lectura/Final/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						<div class="caja">
						<font  size=2 color="green" >Agregar Foto Nueva </font>
						<input style=display:none type="text" name="Foto6" value="LectFinal.jpg">
						<input type="file" name="archivo6[]" id="archivo6" accept="image/*" />
						</div>
						<br>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Cambio de Filtros</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <select class="form-control" name="valor3_s2">              
										<option value="<?php echo $registro['valor3_s2']?>"><?php echo utf8_decode($registro['valor3_s2'])?>  (Actual)</option>
                                        <option value="Se realiza cambio">Se realiza cambio</option>
                                        <option value="No se realiza cambio presion satisfactoria">No se realiza cambio presi&oacute;n satisfactoria</option>
                                        <option value="No cuenta con etapa">No cuenta con etapa</option>
                                </select>
								<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
							  <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa2/Cambio/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa2/Cambio/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/Etapa2/Cambio/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						<div class="caja">
						<font  size=2 color="green" >Agregar Foto Nueva </font>
						<input style=display:none type="text" name="Foto7" value="Cambio.jpg">
						<input type="file" name="archivo7[]" id="archivo7" accept="image/*" />
						</div>
						<br>
                          </div>
                        </div>
						
					
						<div class="form-group">
                            <label class="col-sm-222 control-label">Limpieza</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <select class="form-control" name="valor4_s2">          
										<option value="<?php echo $registro['valor4_s2']?>"><?php echo utf8_decode($registro['valor4_s2'])?>  (Actual)</option>
                                        <option value="Se realiza limpieza general">Se realiza limpieza general</option>
                                        <option value="No se realiza limpieza">No se realiza limpieza</option>
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
							  <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa2/Limpieza/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa2/Limpieza/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/Etapa2/Limpieza/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						<div class="caja">
						<font  size=2 color="green" >Agregar Foto Nueva </font>
						<input style=display:none type="text" name="Foto8" value="Limpieza.jpg">
						<input type="file" name="archivo8[]" id="archivo8" accept="image/*" />
						</div>
						<br>
                          </div>
                        </div>
                       
			  <br>	
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio</label>
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label">Filtro 3era Etapa</font>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Lectura de Presion (In H2O/Pa)</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" name="valor1_s3" value="<?php echo utf8_decode($registro['valor1_s3'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
							  <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa3/Lectura/Inicial/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa3/Lectura/Inicial/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/Etapa3/Lectura/Inicial/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						<div class="caja">
						<font  size=2 color="green" >Agregar Foto Nueva </font>
						<input style=display:none type="text" name="Foto9" value="LectInicial.jpg">
						<input type="file" name="archivo9[]" id="archivo9" accept="image/*" />
						</div>
						<br>
							  <div class='input-group'>
                                <input type="text" class="form-control" name="valor2_s3" value="<?php echo utf8_decode($registro['valor2_s3'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
							  <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa3/Lectura/Final/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa3/Lectura/Final/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/Etapa3/Lectura/Final/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						<div class="caja">
						<font  size=2 color="green" >Agregar Foto Nueva </font>
						<input style=display:none type="text" name="Foto10" value="LectFinal.jpg">
						<input type="file" name="archivo10[]" id="archivo10" accept="image/*" />
						</div>
						<br>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Cambio de Filtros</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                    <select class="form-control" name="valor3_s3">          
										<option value="<?php echo $registro['valor3_s3']?>"><?php echo utf8_decode($registro['valor3_s3'])?>  (Actual)</option>
                                        <option value="Se realiza cambio">Se realiza cambio</option>
                                        <option value="No se realiza cambio presion satisfactoria">No se realiza cambio presi&oacute;n satisfactoria</option>
                                        <option value="No cuenta con etapa">No cuenta con etapa</option>
                                    </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
							  <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa3/Cambio/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa3/Cambio/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/Etapa3/Cambio/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						<div class="caja">
						<font  size=2 color="green" >Agregar Foto Nueva </font>
						<input style=display:none type="text" name="Foto11" value="Cambio.jpg">
						<input type="file" name="archivo11[]" id="archivo11" accept="image/*" />
						</div>
						<br>
                          </div>
                        </div>
						
				
			  <div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Amperaje de Alimentaci&#243;n previo al cambio</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L1-L2</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje1_s3" value="<?php echo utf8_decode($registro['amperaje1_s3'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L2-L3</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje2_s3" value="<?php echo utf8_decode($registro['amperaje2_s3'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L3-L1</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje3_s3" value="<?php echo utf8_decode($registro['amperaje3_s3'])?>">
              </div>
              </div>
              <br>
						<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Amperaje de Alimentaci&#243;n despues del cambio</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L1-L2</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje4_s3" value="<?php echo utf8_decode($registro['amperaje4_s3'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L2-L3</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje5_s3" value="<?php echo utf8_decode($registro['amperaje5_s3'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L3-L1</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje6_s3" value="<?php echo utf8_decode($registro['amperaje6_s3'])?>">
              </div>
              </div>              
						<br>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Limpieza</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <select class="form-control" name="valor4_s3">          
										<option value="<?php echo $registro['valor4_s3']?>"><?php echo utf8_decode($registro['valor4_s3'])?>  (Actual)</option>
                                        <option value="Se realiza limpieza general">Se realiza limpieza general</option>
                                        <option value="No se realiza limpieza">No se realiza limpieza</option>
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
							  <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa3/Limpieza/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa3/Limpieza/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/Etapa3/Limpieza/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						<div class="caja">
						<font  size=2 color="green" >Agregar Foto Nueva </font>
						<input style=display:none type="text" name="Foto12" value="Limpieza.jpg">
						<input type="file" name="archivo12[]" id="archivo12" accept="image/*" />
						</div>
						<br>
                          </div>
                        </div>
                       
			  <br>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio</label>
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label">Filtro 4a Etapa</font>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Lectura de Presion (In H2O/Pa)</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" name="valor1_s4" value="<?php echo utf8_decode($registro['valor1_s4'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
							  <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa4/Lectura/Inicial/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa4/Lectura/Inicial/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/Etapa4/Lectura/Inicial/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						<div class="caja">
						<font  size=2 color="green" >Agregar Foto Nueva </font>
						<input style=display:none type="text" name="Foto13" value="LectInicial.jpg">
						<input type="file" name="archivo13[]" id="archivo13" accept="image/*" />
						</div>
						
						<br>
							  <div class='input-group'>
                                <input type="text" class="form-control" name="valor2_s4" value="<?php echo utf8_decode($registro['valor2_s4'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
							  <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa4/Lectura/Final/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa4/Lectura/Final/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/Etapa4/Lectura/Final/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						<div class="caja">
						<font  size=2 color="green" >Agregar Foto Nueva </font>
						<input style=display:none type="text" name="Foto14" value="LectFinal.jpg">
						<input type="file" name="archivo14[]" id="archivo14" accept="image/*" />
						</div>
						<br>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Cambio de Filtros</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <select class="form-control" name="valor3_s4">          
										<option value="<?php echo $registro['valor3_s4']?>"><?php echo utf8_decode($registro['valor3_s4'])?>  (Actual)</option>
                                        <option value="Se realiza cambio">Se realiza cambio</option>
                                        <option value="No se realiza cambio presion satisfactoria">No se realiza cambio presi&oacute;n satisfactoria</option>
                                        <option value="No cuenta con etapa">No cuenta con etapa</option>
                                </select>
								<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
							   <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa4/Cambio/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa4/Cambio/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/Etapa4/Cambio/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						<div class="caja">
						<font  size=2 color="green" >Agregar Foto Nueva </font>
						<input style=display:none type="text" name="Foto15" value="Cambio.jpg">
						<input type="file" name="archivo15[]" id="archivo15" accept="image/*" />
						</div>
						<br>
                          </div>
                        </div>
						
					
					<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Amperaje de Alimentaci&#243;n previo al cambio</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L1-L2</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje1_s4" value="<?php echo utf8_decode($registro['amperaje1_s4'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L2-L3</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje2_s4" value="<?php echo utf8_decode($registro['amperaje2_s4'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L3-L1</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje3_s4" value="<?php echo utf8_decode($registro['amperaje3_s4'])?>">
              </div>
              </div>
              <br>
						<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Amperaje de Alimentaci&#243;n despues del cambio</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L1-L2</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje4_s4" value="<?php echo utf8_decode($registro['amperaje4_s4'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L2-L3</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje5_s4" value="<?php echo utf8_decode($registro['amperaje5_s4'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L3-L1</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje6_s4" value="<?php echo utf8_decode($registro['amperaje6_s4'])?>">
              </div>
              </div>              
						<br>	
						<div class="form-group">
                            <label class="col-sm-222 control-label">Limpieza</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <select class="form-control" name="valor4_s4">          
										<option value="<?php echo $registro['valor4_s4']?>"><?php echo utf8_decode($registro['valor4_s4'])?>  (Actual)</option>
                                        <option value="Se realiza limpieza general">Se realiza limpieza general</option>
                                        <option value="No se realiza limpieza">No se realiza limpieza</option>
                                </select>
								<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
							  <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa4/Limpieza/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/Etapa4/Limpieza/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/Etapa4/Limpieza/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						<div class="caja">
						<font  size=2 color="green" >Agregar Foto Nueva </font>
						<input style=display:none type="text" name="Foto16" value="Limpieza.jpg">
						<input type="file" name="archivo16[]" id="archivo16" accept="image/*" />
						</div>
						<br>
                          </div>
                        </div>
						
			  <br>	
			  
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio</label>
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label">Motoventilador</font>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Lectura de Vibracion (Axial)</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" name="valor1_s5" value="<?php echo utf8_decode($registro['valor1_s5'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Lectura de Vibracion (Vertical)</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" name="valor2_s5" value="<?php echo utf8_decode($registro['valor2_s5'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
						
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Lectura de Vibracion (Horizontal)</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" name="valor3_s5" value="<?php echo utf8_decode($registro['valor3_s5'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Limpieza</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <select class="form-control" name="valor4_s5">           
										<option value="<?php echo $registro['valor4_s5']?>"><?php echo utf8_decode($registro['valor4_s5'])?>  (Actual)</option>
                                        <option value="Se realiza limpieza general">Se realiza limpieza general</option>
                                        <option value="No se realiza limpieza">No se realiza limpieza</option>
                                      </select>
								<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
						
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Engrasado de Chumacera</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <select class="form-control" name="valor5_s5">           
										<option value="<?php echo $registro['valor5_s5']?>"><?php echo utf8_decode($registro['valor5_s5'])?>  (Actual)</option>
                                        <option value="Se realiza engrasado de chumacera">Se realiza engrasado de chumacera</option>
                                        <option value="No se realiza engrasado de chumacera">No se realiza engrasado de chumacera</option>
                                      </select>
								<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Cambio de Bandas</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <select class="form-control" name="valor6_s5">           
										<option value="<?php echo $registro['valor6_s5']?>"><?php echo utf8_decode($registro['valor6_s5'])?>  (Actual)</option>
                                        <option value="Se realizo cambio de bandas">Se realizo cambio de bandas</option>
                                        <option value="No se realizo cambio de bandas">No se realizo cambio de bandas</option>
                                      </select>
								<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
							  <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/Motoventilador/posterior/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/Motoventilador/posterior/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/Motoventilador/posterior/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						<div class="caja">
						<font  size=2 color="green" >Agregar Foto Nueva </font>
						<input style=display:none type="text" name="Foto17" value="Motoventilador.jpg">
						<input type="file" name="archivo17[]" id="archivo17" accept="image/*" />
						</div>
						<br>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio</label>
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label">Serpentin de Evaporacion</font>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Limpieza General</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <select class="form-control" name="valor1_s6">           
										<option value="<?php echo $registro['valor1_s6']?>"><?php echo utf8_decode($registro['valor1_s6'])?>  (Actual)</option>
                                        <option value="Se realiza limpieza general">Se realiza limpieza general</option>
                                        <option value="No se realiza limpieza">No se realiza limpieza</option>
                                      </select>
								<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
							   <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/Serpentin/posterior/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/Serpentin/posterior/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/Serpentin/posterior/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						<div class="caja">
						<font  size=2 color="green" >Agregar Foto Nueva </font>
						<input style=display:none type="text" name="Foto18" value="Serpentin.jpg">
						<input type="file" name="archivo18[]" id="archivo18" accept="image/*" />
						</div>
						<br>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio</label>
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label">Charola de Condensados</font>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label>Limpieza General</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="valor1_s8" >
										<option value="<?php echo $registro['valor1_s8']?>"><?php echo utf8_decode($registro['valor1_s8'])?>  (Actual)</option>
                                        <option value="Se realiza limpieza general">Se realiza limpieza general</option>
                                        <option value="No se realiza limpieza">No se realiza limpieza</option>
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
								 <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/Charola/posterior/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/Charola/posterior/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/Charola/posterior/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						<div class="caja">
						<font  size=2 color="green" >Agregar Foto Nueva </font>
						<input style=display:none type="text" name="Foto19" value="Charola.jpg">
						<input type="file" name="archivo19[]" id="archivo19" accept="image/*" />
						</div>
						<br>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Tiempo Fuera por operacion por Falla (Hrs)</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" name="valor_uptime" value="<?php echo utf8_decode($registro['valor_uptime'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Observaciones</label>
                             <br>
                          <div class="col-sm-110">
						  <input type="text" class="form-control" name="observaciones" value="<?php echo utf8_decode($registro['observaciones'])?>">
                           </div>
                        </div>
						
						<!--///////////////////////////////////////////////////////////////////////////////////////////////////////-->				                       
						
                          <font size=4 color="green" FACE="arial" class="col-sm-222 control-label">Parametros / Estados</font>
                          <br>
               <div class="form-group">           
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Serpentin de Agua Helada: </font>
			  <br>
			  <font size=3 color="blue" FACE="arial"  class="col-sm-222 control-label">Temperatura: </font>
			  <br>
			  <label  class="col-sm-2 control-label">Entrada: </label>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="tempentrada" value="<?php echo utf8_decode($registro['tempentrada'])?>">
              </div>
			  <label  class="col-sm-2 control-label">Salida: </label>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="tempsalida" value="<?php echo utf8_decode($registro['tempsalida'])?>">
              </div>
			  
			<div class="form-group">
              <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Presi&#243;n</font>
              <div class="col-sm-2">
			  <div class="input-group">
                  <input type="text" class="form-control" name="tempresion" value="<?php echo utf8_decode($registro['tempresion'])?>">
              </div>
			  </div>
            </div>
            </div>
			<br>
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Serpentin de Agua Caliente</font>
			  <br>
			  <font size=3 color="blue" FACE="arial"  class="col-sm-222 control-label">Temperatura</font>
			  <br>
			  <label  class="col-sm-2 control-label">Entrada</label>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="tempentrada2" value="<?php echo utf8_decode($registro['tempentrada2'])?>">
              </div>
			  <label  class="col-sm-2 control-label">Salida</label>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="tempsalida2" value="<?php echo utf8_decode($registro['tempsalida2'])?>">
              </div>
            </div>
			
			<div class="form-group">
              <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Presi&#243;n</font>
              <div class="col-sm-2">
			  <div class="input-group">
                  <input type="text" class="form-control" name="tempresion2" value="<?php echo utf8_decode($registro['tempresion2'])?>">
              </div>
			  </div>
            </div>
			
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Valvulas y actuadores</font>
			  <br>
			<div class="form-group">
              <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Estado</font>
              <div class="col-sm-2">
                  <select class="form-control" name="estadoval">  
						<option value="<?php echo $registro['estadoval']?>"><?php echo utf8_decode($registro['estadoval'])?>  (Actual)</option>
						<option value="En buen estado">En buen estado</option>
                        <option value="Cambio">Cambio</option>
                  </select>
				  </div>
            </div>
			
			<div class="form-group">
              <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Modulaci&#243;n</font>
              <div class="col-sm-2">
                  <select class="form-control" name="tipomodulacion">             
						<option value="<?php echo $registro['tipomodulacion']?>"><?php echo utf8_decode($registro['tipomodulacion'])?>  (Actual)</option>                                    
                        <option value="Si">Si</option>
                        <option value="N">No</option>
                  </select>
              </div>
            </div>
			</div>
			<br>
			<br>
			
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Manguera de Presi&#243;n</font>
			  <br>
			  <font size=3 color="blue" FACE="arial" class="col-sm-2 control-label">Estado</font>
              <div class="col-sm-2">
                  <select class="form-control" name="estamanguera">             
						<option value="<?php echo $registro['estamanguera']?>"><?php echo utf8_decode($registro['estamanguera'])?>  (Actual)</option>                                     
                        <option value="En buen estado">En buen estado</option>
                        <option value="Cambio">Cambio</option>
                  </select>
              </div>
            </div>
			
			<br>
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Tornilleria</font>
			  <br>
              <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Completa</font>
              <div class="col-sm-2">
                  <select class="form-control" name="tornilleria">             
						<option value="<?php echo $registro['tornilleria']?>"><?php echo utf8_decode($registro['tornilleria'])?>  (Actual)</option>                                     
                        <option value="Completo y en buen estado">Completo y en buen estado</option>
                        <option value="Incompleta">Incompleta</option>
                  </select>
              </div>
            </div>
			<br>
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Cableado de alimentaci&#243;n electrica</font>
			  <br>
			  <font size=3 color="blue" FACE="arial" class="col-sm-2 control-label">Estado de Conexi&#243;n</font>
              <div class="col-sm-2">
                  <select class="form-control" name="estacable">             
						<option value="<?php echo $registro['estacable']?>"><?php echo utf8_decode($registro['estacable'])?>  (Actual)</option>                                 
                        <option value="En buen estado">En buen estado</option>
                        <option value="Cambio">Cambio</option>
                  </select>
              </div>
            </div>
            <br>
            <br></br>
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Voltaje de Alimentaci&#243;n</font>
			  <br>
			  <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L1-L2</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje1_3" value="<?php echo utf8_decode($registro['amperaje1_3'])?>">
              </div>
			  <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L2-L3</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje2_3" value="<?php echo utf8_decode($registro['amperaje2_3'])?>">
              </div>
			  <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L3-L1</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje3_3" value="<?php echo utf8_decode($registro['amperaje3_3'])?>">
              </div>
            </div>
			<br>
			
						<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Variador</font>
			  <br>
			  <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Funcionamiento</font>
              <div class="col-sm-2">
                  <select class="form-control" name="funcionamiento">             
						<option value="<?php echo $registro['funcionamiento']?>"><?php echo utf8_decode($registro['funcionamiento'])?>  (Actual)</option>                                 
                        <option value="En buen estado">En buen estado</option>
                        <option value="Cambio">Cambio</option>
                  </select>
              </div>
			  <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Tipo</font>
              <div class="col-sm-2">
                  <select class="form-control" name="tipovariador">             
						<option value="<?php echo $registro['tipovariador']?>"><?php echo utf8_decode($registro['tipovariador'])?>  (Actual)</option>                                 
                        <option value="Manual">Manual</option>
                        <option value="Automatico">Automatico</option>
                  </select>
              </div>
            </div>
			<br>
			<!--/////////////////////////////////////////////////////////-->
			
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Improve (Mejora)</label>
						  <br>
                          <div class="col-sm-110">
                            <input class="form-control" rows="3" name="mejora" value="<?php echo utf8_decode($registro['mejora'])?>">
                          </div>
                        </div>
						
					</fieldset>			
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10 text-center">
                              <button type="submit" class="btn btn-info">Guardar</button>
                          </div>
                        </div>
                    <br>
            </form>
            </div><!--col-md-12-->
          </div><!--container-->
		</div>
	  </div>
      </div>
    </div>
	  <?php
}else{
	header('Location: index.php');
}
?>

<footer></footer>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
</body>
</html>