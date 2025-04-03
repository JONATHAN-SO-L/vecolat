<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesi贸n o reanudar la existente.
    session_start();
	 if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="admin"){ 
?>
<!DOCTYPE html>
<?php include "./inc/links.php"; ?> 
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
   
  <!--meta http-equiv="Content-type" content="text/html; charset=utf-8" /-->
  
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
          Area
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
        <a href="seccion_admin.php">
          <i class="fa fa-wrench"></i>
        Servicio
        </a>
      </li>
	  <li class="active">
        <a href="diario_servic.php">
          <i class="fa fa-pencil-square"></i>
        Diario
        </a>
      </li>	
      <li>
        <a href="tabla_servicios.php">
          <i class="fa fa-pencil-square-o"></i>
        Editar Servicio
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
		    <a href="diario_crear.php" ><button type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center">&nbsp;&nbsp;Regresar</button></a>
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
				
                <h1 class="animated lightSpeedIn">Servicio Diario</h1>
                <span class="label label-danger"></span> 		 
				<p class="pull-right text-primary"></p>
		   </div>
            </div>
          </div>
        </div>
		<!--************************************ Page content******************************-->
		
				
<?php
	
	$usuario = "veco_dvi";
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
	//$consulta = "SELECT * FROM area";
	
	$equipo = $_POST['equipo_id'];

	$consulta = "SELECT * from servicio where equipo='$equipo'";
	$resultado = mysqli_query( $conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos");

while ($reg = mysqli_fetch_array( $resultado )){
    
	echo "<tr>";
      ?>
			
<!--//////////////////-->

		<div class="container">
  <div class="row">
    <div class="col-sm-8">
      <div class="panel panel-success">
        <div  size=4  class="panel-heading text-center"><strong>Sistema de Mantenimiento y Servicio De Vecchi</strong>
		<br>
		<font size=4 color="blue" class="col-sm-222 control-label">						
						<?php echo utf8_decode($reg['empresa'])?>&nbsp;/
						<?php echo utf8_decode($reg['edificio'])?>&nbsp;/
						<?php echo utf8_decode($reg['ubicacion'])?>&nbsp;/
						<?php echo utf8_decode($reg['equipo'])?></font></div>
        <div class="panel-body">
            <form  method="POST" action="serv_dba.php"  enctype="multipart/form-data">
						
                        
						
						<input type="hidden" readonly="" name="empresa" readonly="" value="<?php echo utf8_decode($reg['empresa'])?>">
						<!--input type="hidden" readonly="" name="area" readonly="" value="<?php //echo utf8_decode($r['area'])?>"-->
						<input type="hidden" readonly="" name="edificio" readonly="" value="<?php echo utf8_decode($reg['edificio'])?>">
						<input type="hidden" readonly="" name="ubicacion" readonly="" value="<?php echo utf8_decode($reg['ubicacion'])?>">
						<input type="hidden" readonly="" name="equipo" readonly="" value="<?php echo utf8_decode($reg['equipo'])?>">
						<input type="hidden" readonly="" name="anio" readonly="" value="<?php echo date("Y");?>">
						<input type="hidden" readonly="" name="tecnico" readonly="" value="<?php echo $_SESSION['nombre'];?>">
						<?php
						date_default_timezone_set('America/Mexico_City');
						setlocale(LC_TIME, 'spanish');
				}	
						?>
						<!--input type="hidden" readonly="" name="hora" readonly=""// value="<?php echo strftime("%H:%M");?>"-->
						<input type="hidden" readonly="" name="carpeta" readonly="" value="<?php echo strftime("%H-%M");?>">
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Hora</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" step="any" class="form-control" name="hora" placeholder="HH:MM"value="" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Fecha</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input class="form-control" type="date" name="fecha_servicio" required="">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>

                       <div class="form-group">
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial" class="col-sm-222 control-label">Datos del Variador</font>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Frecuencia (Hz)</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="frecuencia" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
							
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto" value="hz.jpg">
						<input type="file" name="archivo1[]" accept="image/*" />
						</div>
						<br>
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Potencia (HP)</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="potencia" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>						
							
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto2" value="hp.jpg">
						<input type="file" name="archivo2[]" accept="image/*" />
						</div>
						<br>
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Velocidad Motor (RPM)</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="vel_moto" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
							
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto3" value="rpm.jpg">
						<input type="file" name="archivo3[]" accept="image/*" />
						</div>
						<br>
						<div class="form-group">
                          <label  class="col-sm-222 control-label">% de Operación</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="operacion" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
							
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto4" value="oper.jpg">
						<input type="file" name="archivo4[]" accept="image/*" />
						</div>
						<br>
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Amperaje</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="amperaje" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
							
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto15" value="amp.jpg">
						<input type="file" name="archivo15[]" accept="image/*" />
						</div>
						<br>
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio</label>
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial" class="col-sm-222 control-label">Caída de Presión Estática de Filtros</font>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">MERV 8 (in. Wg.)</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" step="any" class="form-control" name="caida_merv8" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto5" value="merv8.jpg">
						<input type="file" name="archivo5[]" accept="image/*" />
						</div>
						<br>
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Carbón Activado (in. Wg.)</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="car_act" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
							
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto6" value="cara.jpg">
						<input type="file" name="archivo6[]" accept="image/*" />
						</div>
						<br>
						<div class="form-group">
                          <label  class="col-sm-222 control-label">MERV 15 (in. Wg.)</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="caida_merv15" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
							
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto7" value="merv15.jpg">
						<input type="file" name="archivo7[]" accept="image/*" />
						</div>
                        <br>						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">MERV 17 (in. Wg.)</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="caida_merv17" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
							
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto8" value="merv17.jpg">
						<input type="file" name="archivo8[]" accept="image/*" />
						</div>
						
						<div class="form-group">
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Amperaje</font>
              <br><br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L1</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="l1" >
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L2</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="l2" >
              </div>	
              <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">L3</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="l3" >
              </div>
              </div>						
							
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto9" value="amperaje.jpg">
						<input type="file" name="archivo9[]" accept="image/*" />
						</div>
						<br>
						<div class="form-group">
                          <font size=3 color="blue" FACE="arial" class="col-sm-222 control-label">Voltaje</font>
						  
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">L1-L2</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="l1_l2" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">L1-L3</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="l1_l3" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">L2-L3</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="l2_l3" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Neutro</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="neutro" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
							
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto10" value="voltaje.jpg">
						<input type="file" name="archivo10[]" accept="image/*" />
						</div>
						<br>
						<div class="form-group">
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label">Serpentín Agua Helada</font>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">A.A.H</label>
						  
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Temp. °C</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="aah_temp" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Psi</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="aah_psi" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
							
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto11" value="aah.jpg">
						<input type="file" name="archivo11[]" accept="image/*" />
						</div>
						<br>
						<div class="form-group">
                          <label  class="col-sm-222 control-label">R.A.H</label>
						 <div class="form-group">
                          <label  class="col-sm-222 control-label">Temp. °C</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="rah_temp" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Psi</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" step="any" class="form-control" name="rah_psi" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
							
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto12" value="rah.jpg">
						<input type="file" name="archivo12[]" accept="image/*" />
						</div>
						<br>
						<div class="form-group">
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label">Serpentín Agua Caliente</font>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">A.A.C</label>
						  <div class="form-group">
                          <label  class="col-sm-222 control-label">Temp. °C</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="aac_temp" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Psi</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="aac_psi" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
							
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto13" value="aac.jpg">
						<input type="file" name="archivo13[]" accept="image/*" />
						</div>
						<br>
						<div class="form-group">
                          <label  class="col-sm-222 control-label">R.A.C</label>						  
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Temp. °C</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="rac_temp" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Psi</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" step="any" class="form-control" name="rac_psi" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
							
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto14" value="rac.jpg">
						<input type="file" name="archivo14[]" accept="image/*" />
						</div>
						
						<br>												
						<div class="form-group">
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label">Revisión Visual</font>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Estado de Manómetros</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <select class="form-control" name="manometro">             
										<option value=""></option>                                     
										<option value="Bueno">Bueno</option>										
										<option value="Regular">Regular</option>
										<option value="Malo">Malo</option>
									</select>
									<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Estado de Mangueras</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <select class="form-control" name="manguera">           
										<option value=""></option>                                     
										<option value="Bueno">Bueno</option>										
										<option value="Regular">Regular</option>
										<option value="Malo">Malo</option>
									</select>
									<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Estado de Filtros</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <select class="form-control" name="filtro">             
										<option value=""></option>                                     
										<option value="Bueno">Bueno</option>										
										<option value="Regular">Regular</option>
										<option value="Malo">Malo</option>
									</select>
									<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Drenajes</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <select class="form-control" name="drenajes">             
										<option value=""></option>                                     
										<option value="Bueno">Bueno</option>										
										<option value="Regular">Regular</option>
										<option value="Malo">Malo</option>
									</select>
									<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label  class="col-sm-222 control-label">Observaciones</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" name="observaciones" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
                        <div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto16" value="obs.jpg">
						<input type="file" name="archivo16[]" accept="image/*" />
						</div>
						
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto17" value="obs2.jpg">
						<input type="file" name="archivo17[]" accept="image/*" />
						</div>
						
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto18" value="obs3.jpg">
						<input type="file" name="archivo18[]" accept="image/*" />
						</div>
						
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto19" value="obs4.jpg">
						<input type="file" name="archivo19[]" accept="image/*" />
						</div>
						
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto20" value="obs5.jpg">
						<input type="file" name="archivo20[]" accept="image/*" />
						</div>
						
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto21" value="obs6.jpg">
						<input type="file" name="archivo21[]" accept="image/*" />
						</div>
						
						<br>
                        <br>
                        
						
                        </div>
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