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
<html>
<head>
  <!--meta http-equiv="Content-type" content="text/html; charset=utf-8" /-->
  <meta charset="ISO-8859-1">
  <title>Servicio</title>
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
  <script src="js/jquery-1.9.1.min.js"></script>
</head>
<style>
    .btn { 
        padding: 10px;
		}
		table {
    background-color: #91bad152;
}		
	@media (min-width: 768px){
	.busc_dato{
    float: right;
    margin-right: -5%;
}
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
	  <li  class="active">
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
		    <a href="seccion0_admin.php" ><button type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center">&nbsp;&nbsp;Regresar</button></a>
			<td>
 <tr>
      <button onClick="document.location.reload();" type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Click Actualizar Datos" HSPACE="10" VSPACE="10"><i class="fa fa-refresh fa-spin  fa-fw"></i>
		<span class="sr-only">Loading...</span></button>
        </tr>
          </td>
       </table>
				<!--************************************ Page content******************************-->
		<div class="container" style="width:1180px;">
          <div class="row">
            <div class="col-sm-12">
           <div class="page-header2">
				
                <h1 class="animated lightSpeedIn">Consulta de Servicio</h1>
                <span class="label label-danger"></span> 		 
				<p class="pull-right text-primary"></p>
		   </div>
            </div>
          </div>
        </div>
		<!--************************************ Page content******************************-->
		
		
			

		<div class="container">
  <div class="row">
    <div class="col-sm-8">
      <div class="panel panel-success">
        <div class="panel-heading text-center"><strong>Sistema de Mantenimiento y Servicio De Vecchi</strong></div>
        <div class="panel-body">
            
			
		<?php
		
	//$empresa = $_POST['empresa'];
	//$edificio = $_POST['edificio'];
	//$ubicacion = $_POST['ubicacion'];
/*	$equipo = $_POST['equipo_id'];
	$fecha = $_POST['fecha_servicio'];
			
	$usuario = "veco";
	$password = "Vec83Dv19iSa@";
	$servidor = "localhost";
	$basededatos = "veco_sims_devecchi";
	
	// creación de la conexión a la base de datos con mysql_connect()
	$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
	$conexion ->set_charset('utf8');
	$conexion->query("SET NAMES UTF8");
    $conexion->query("SET CHARACTER SET utf8");
	
	// Selección de la base de datos
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
	// establecer y realizar consulta. guardamos en variable.
	$consulta = "SELECT * from servicio2 WHERE equipo='$equipo' and fecha_servicio='$fecha' ";
	$resultado = mysqli_query( $conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos");

if ($reg = mysqli_fetch_array( $resultado )){
*/
include './lib/class_mysql.php';
include './lib/config.php';

    $id = MysqlQuery::RequestGet('id');
	$sql = Mysql::consulta("SELECT * FROM servicio2  WHERE id_servicio = '$id'" );
	$reg=mysqli_fetch_array($sql, MYSQLI_ASSOC);
	
	$equipo = $reg['equipo'];
	$fecha = $reg['fecha_servicio'];
?>
                       <div class="form-group">
						
						<font size=5 color="blue"  class="col-sm-222 control-label"><?php echo utf8_decode($reg['empresa'])?></font>&nbsp;/
						<font size=5 color="blue"  class="col-sm-222 control-label"><?php echo utf8_decode($reg['edificio'])?></font>&nbsp;/
						<font size=5 color="blue"  class="col-sm-222 control-label"><?php echo utf8_decode($reg['ubicacion'])?></font>&nbsp;/
						<font size=5 color="blue"  class="col-sm-222 control-label" name="equipo"><?php echo utf8_decode($reg['equipo'])?></font>
						
                        
						
						<input type="hidden" readonly="" name="fecha_servicio" readonly="" value="<?php echo date("d-m-Y");?>">
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Fecha</label>
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label"><?php echo utf8_decode($reg['fecha_servicio'])?></font>
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio</label>
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label"><?php echo utf8_decode($reg['servicio'])?></font>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta1'])?> Inicial</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly="" name="valor1" value="<?php echo utf8_decode($reg['valor1'])?>">
								  <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<?php
						
					$ruta = "files/servicio/$fecha/$equipo/Etapa1/Lectura/Inicial/"; //era $rfc
					if(!file_exists($ruta)){
						mkdir($ruta,0777, true);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha/$equipo/Etapa1/Lectura/Inicial/$archivo' target='_blank'><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong><br/></a> ";
							}
						}
					}
						?>
						<br>

                        <div class="form-group">
                           <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta1'])?> Final</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly="" name="valor2" value="<?php echo utf8_decode($reg['valor2'])?>">
								  <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<?php
							
					$ruta = "files/servicio/$fecha/$equipo/Etapa1/Lectura/Final/"; //era $rfc
					if(!file_exists($ruta)){
						mkdir($ruta,0777, true);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha/$equipo/Etapa1/Lectura/Final/$archivo' target='_blank'><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong><br/></a> ";
							}
						}
					}
						?>
						<div class="form-group">
                            <label class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta2'])?></label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="valor3" value="<?php echo utf8_decode($reg['valor3'])?>" >
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<?php
					$ruta = "files/servicio/$fecha/$equipo/Etapa1/Cambio/"; //era $rfc
					if(!file_exists($ruta)){
						mkdir($ruta,0777, true);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha/$equipo/Etapa1/Cambio/$archivo' target='_blank'><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong><br/></a> ";
							}
						}
					}
						?>
						<br>
						
				<div class="form-group">
                            <label class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta3'])?></label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="valor3" value="<?php echo utf8_decode($reg['valor4'])?>" >
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
                        
						<?php
					$ruta = "files/servicio/$fecha/$equipo/Etapa1/Limpieza/"; //era $rfc
					if(!file_exists($ruta)){
						mkdir($ruta,0777, true);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha/$equipo/Etapa1/Limpieza/$archivo' target='_blank'><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong><br/></a> ";
							}
						}
					}
						?>
						<br>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio</label>
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label"><?php echo utf8_decode($reg['servicio2'])?> Inicial</font>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta1_s2'])?></label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly="" name="valor1" value="<?php echo utf8_decode($reg['valor1_s2'])?>">
								  <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<?php
								
					$ruta = "files/servicio/$fecha/$equipo/Etapa2/Lectura/Inicial/"; //era $rfc
					if(!file_exists($ruta)){
						mkdir($ruta,0777, true);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha/$equipo/Etapa2/Lectura/Inicial/$archivo' target='_blank'><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong><br/></a> ";
							}
						}
					}
						?>
						<br>

                        <div class="form-group">
                           <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta1_s2'])?> Final</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly="" name="valor2" value="<?php echo utf8_decode($reg['valor2_s2'])?>">
								  <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<?php
								
					$ruta = "files/servicio/$fecha/$equipo/Etapa2/Lectura/Final/"; //era $rfc
					if(!file_exists($ruta)){
						mkdir($ruta,0777, true);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha/$equipo/Etapa2/Lectura/Final/$archivo' target='_blank'><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong><br/></a> ";
							}
						}
					}
						?>
						<br>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta2_s2'])?></label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="valor3" value="<?php echo utf8_decode($reg['valor3_s2'])?>" >
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<?php
					$ruta = "files/servicio/$fecha/$equipo/Etapa2/Cambio/"; //era $rfc
					if(!file_exists($ruta)){
						mkdir($ruta,0777, true);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha/$equipo/Etapa2/Cambio/$archivo' target='_blank'><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong><br/></a> ";
							}
						}
					}
						?>
						
						<br>
						
					<div class="form-group">
                            <label class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta3_s2'])?></label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="valor3" value="<?php echo utf8_decode($reg['valor4_s2'])?>" >
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
                        
						<?php
					$ruta = "files/servicio/$fecha/$equipo/Etapa2/Limpieza/"; //era $rfc
					if(!file_exists($ruta)){
						mkdir($ruta,0777, true);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha/$equipo/Etapa2/Limpieza/$archivo' target='_blank'><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong><br/></a> ";
							}
						}
					}
						?>
						<br>
						
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio</label>
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label"><?php echo utf8_decode($reg['servicio3'])?></font>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta1_s3'])?> Inicial</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly="" name="valor1" value="<?php echo utf8_decode($reg['valor1_s3'])?>">
								  <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<?php
						
								
					$ruta = "files/servicio/$fecha/$equipo/Etapa3/Lectura/Inicial/"; //era $rfc
					if(!file_exists($ruta)){
						mkdir($ruta,0777, true);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha/$equipo/Etapa3/Lectura/Inicial/$archivo' target='_blank'><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong><br/></a> ";
							}
						}
					}
						?>
						<br>

                        <div class="form-group">
                           <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta1_s3'])?> Final</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly="" name="valor2" value="<?php echo utf8_decode($reg['valor2_s3'])?>">
								  <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<?php
								
					$ruta = "files/servicio/$fecha/$equipo/Etapa3/Lectura/Final/"; //era $rfc
					if(!file_exists($ruta)){
						mkdir($ruta,0777, true);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha/$equipo/Etapa3/Lectura/Final/$archivo' target='_blank'><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong><br/></a> ";
							}
						}
					}
						?>
						<br>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta2_s3'])?></label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="valor3" value="<?php echo utf8_decode($reg['valor3_s3'])?>" >
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<?php
								
					$ruta = "files/servicio/$fecha/$equipo/Etapa3/Cambio/"; //era $rfc
					if(!file_exists($ruta)){
						mkdir($ruta,0777, true);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha/$equipo/Etapa3/Cambio/$archivo' target='_blank'><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong><br/></a> ";
							}
						}
					}
						?>
						
						<br>
						
					<div class="form-group">
                            <label class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta3_s3'])?></label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="valor3" value="<?php echo utf8_decode($reg['valor4_s3'])?>" >
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
                        
						<?php
					$ruta = "files/servicio/$fecha/$equipo/Etapa3/Limíeza/"; //era $rfc
					if(!file_exists($ruta)){
						mkdir($ruta,0777, true);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha/$equipo/Etapa3/Limpieza/$archivo' target='_blank'><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong><br/></a> ";
							}
						}
					}
						?>
						<br>
						
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio</label>
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label"><?php echo utf8_decode($reg['servicio4'])?></font>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta1_s4'])?> Inicial</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly="" name="valor1" value="<?php echo utf8_decode($reg['valor1_s4'])?>">
								  <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<?php
						
								
					$ruta = "files/servicio/$fecha/$equipo/Etapa4/Lectura/Inicial/"; //era $rfc
					if(!file_exists($ruta)){
						mkdir($ruta,0777, true);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha/$equipo/Etapa4/Lectura/Inicial/$archivo' target='_blank'><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong><br/></a> ";
							}
						}
					}
						?>
						<br>

                        <div class="form-group">
                           <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta1_s4'])?> Final</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly="" name="valor2" value="<?php echo utf8_decode($reg['valor2_s4'])?>">
								  <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<?php
								
					$ruta = "files/servicio/$fecha/$equipo/Etapa4/Lectura/Final/"; //era $rfc
					if(!file_exists($ruta)){
						mkdir($ruta,0777, true);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha/$equipo/Etapa4/Lectura/Final/$archivo' target='_blank'><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong><br/></a> ";
							}
						}
					}
						?>
						<!br>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta2_s4'])?></label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="valor3" value="<?php echo utf8_decode($reg['valor3_s4'])?>" >
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<?php
								$etiqueta3_s4 = $reg['etiqueta3_s4'];
								$servicio4 = $reg['servicio4'];
								
					$ruta = "files/servicio/$fecha/$equipo/Etapa4/Cambio/"; //era $rfc
					if(!file_exists($ruta)){
						mkdir($ruta,0777, true);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha/$equipo/Etapa4/Cambio/$archivo' target='_blank'><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong><br/></a> ";
							}
						}
					}
						?>
						
						
						<br>
						
					<div class="form-group">
                            <label class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta3_s4'])?></label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="valor3" value="<?php echo utf8_decode($reg['valor4_s4'])?>" >
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
                        
						<?php
					$ruta = "files/servicio/$fecha/$equipo/Etapa4/Limpieza/"; //era $rfc
					if(!file_exists($ruta)){
						mkdir($ruta,0777, true);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha/$equipo/Etapa4/Limpieza/$archivo' target='_blank'><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong><br/></a> ";
							}
						}
					}
						?>
						<br>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio</label>
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label"><?php echo utf8_decode($reg['servicio5'])?></font>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta1_s5'])?></label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly="" name="valor1" value="<?php echo utf8_decode($reg['valor1_s5'])?>">
								  <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div> 
                          </div>
                        </div>
                        
                        	
						<br>

                        <div class="form-group">
                           <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta2_s5'])?></label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly="" name="valor2" value="<?php echo utf8_decode($reg['valor2_s5'])?>">
								  <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div> 
                          </div>
                        </div>
						
						
						<br>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta3_s5'])?></label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="valor3" value="<?php echo utf8_decode($reg['valor3_s5'])?>" >
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						
						<br>
						
							<div class="form-group">
                          <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta4_s5'])?></label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly="" name="valor1" value="<?php echo utf8_decode($reg['valor4_s5'])?>">
								  <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div> 
                          </div>
                        </div>
                        
                        	
						<br>

						
						<div class="form-group">
                            <label class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta5_s5'])?></label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="valor3" value="<?php echo utf8_decode($reg['valor5_s5'])?>" >
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
												
						<br>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta6_s5'])?></label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="valor3" value="<?php echo utf8_decode($reg['valor6_s5'])?>" >
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<br>
						
					<div class="form-group">
                          <label  class="col-sm-222 control-label">Evidencia Fotografica Posterior al Servicio</label>
						  <div class="col-sm-110">
                              </div>
                        </div>
						
						<?php
								
					$ruta = "files/servicio/$fecha/$equipo/Motoventilador/posterior/"; //era $rfc
					if(!file_exists($ruta)){
						mkdir($ruta,0777, true);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha/$equipo/Motoventilador/posterior/$archivo' target='_blank'><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong><br/></a> ";
							}
						}
					}
						?>
						
						<br>
						
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio</label>
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label"><?php echo utf8_decode($reg['servicio6'])?></font>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta1_s6'])?></label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly="" name="valor1" value="<?php echo utf8_decode($reg['valor1_s6'])?>">
								  <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div> 
                          </div>
                        </div>
						<br>
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Evidencia Fotografica Posterior al Servicio</label>
						  <div class="col-sm-110">
                              </div>
                        </div>
						<?php
								
					$ruta = "files/servicio/$fecha/$equipo/Serpentin/posterior/"; //era $rfc
					if(!file_exists($ruta)){
						mkdir($ruta,0777, true);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha/$equipo/Serpentin/posterior/$archivo' target='_blank'><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong><br/></a> ";
							}
						}
					}
						?>
						<br>

						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio</label>
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label"><?php echo utf8_decode($reg['servicio8'])?></font>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta1_s8'])?></label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly="" name="valor1" value="<?php echo utf8_decode($reg['valor1_s8'])?>">
								  <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Evidencia Fotografica Posterior al Servicio</label>
						  <div class="col-sm-110">
                              </div>
                        </div>
						
						<?php
								
					$ruta = "files/servicio/$fecha/$equipo/Charola/posterior/"; //era $rfc
					if(!file_exists($ruta)){
						mkdir($ruta,0777, true);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha/$equipo/Charola/posterior/$archivo' target='_blank'><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong><br/></a> ";
							}
						}
					}
						?>
						<br>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Tiempo Fuera de Operación por Falla (Hrs)</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly="" name="valor1" value="<?php echo utf8_decode($reg['valor_uptime'])?>">
								  <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div> 
                          </div>
                        </div>

						
						  
                        </div>
                        <div class="panel-footer text-center">
                          <div class="row">
                              <h4></h4>
							 
                              <br class="hidden-lg hidden-md hidden-sm">
                                   <button id="save" class="btn btn-success" data-id="<?php echo $reg['id_servicio']; ?>"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp; Guardar en PDF</button>
                              </div>
							  </div>
                    <br>
            </form>
            </div><!--col-md-12-->
          </div><!--container-->
	  </div>
      </div>
    </div>
    
    <script>
  $(document).ready(function(){
    $("button#save").click(function (){
       window.open ("./lib/pdf_admin.php?id="+$(this).attr("data-id"));
    });
  });
</script>

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