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
<head><meta charset="gb18030">
   
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
		    <a href="seccion3_admin.php" ><button type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center">&nbsp;&nbsp;Regresar</button></a>
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
				
                <h1 class="animated lightSpeedIn">Servicio</h1>
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
	
	// creaci��n de la conexi��n a la base de datos con mysql_connect()
	$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
	$conexion ->set_charset('utf8');
	$conexion->query("SET NAMES UTF8");
    $conexion->query("SET CHARACTER SET utf8");
	
	// Selecci��n de la base de datos
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
            <form  method="POST" action="seccion4_admin.php"  enctype="multipart/form-data">
						
                        
						
						<input type="hidden" readonly="" name="empresa" readonly="" value="<?php echo utf8_decode($reg['empresa'])?>">
						<!--input type="hidden" readonly="" name="sucursal" readonly="" value="<?php echo utf8_decode($reg['sucursal'])?>"-->
						<input type="hidden" readonly="" name="edificio" readonly="" value="<?php echo utf8_decode($reg['edificio'])?>">
						<input type="hidden" readonly="" name="ubicacion" readonly="" value="<?php echo utf8_decode($reg['ubicacion'])?>">
						<input type="hidden" readonly="" name="area" readonly="" value="<?php echo utf8_decode($reg['area'])?>">
						<input type="hidden" readonly="" name="equipo" readonly="" value="<?php echo utf8_decode($reg['equipo'])?>">
						<input type="hidden" readonly="" name="servicio" readonly="" value="<?php echo utf8_decode($reg['servicio'])?>">
						<input type="hidden" readonly="" name="etiqueta1" readonly="" value="<?php echo utf8_decode($reg['etiqueta1'])?>">
						<input type="hidden" readonly="" name="etiqueta2" readonly="" value="<?php echo utf8_decode($reg['etiqueta2'])?>">
						<input type="hidden" readonly="" name="etiqueta3" readonly="" value="<?php echo utf8_decode($reg['etiqueta3'])?>">
						<!--input type="hidden" readonly="" name="etiqueta4" readonly="" value="<?php echo utf8_decode($reg['etiqueta4'])?>"-->
						<input type="hidden" readonly="" name="servicio2" readonly="" value="<?php echo utf8_decode($reg['servicio2'])?>">
						<input type="hidden" readonly="" name="etiqueta1_s2" readonly="" value="<?php echo utf8_decode($reg['etiqueta1_s2'])?>">
						<input type="hidden" readonly="" name="etiqueta2_s2" readonly="" value="<?php echo utf8_decode($reg['etiqueta2_s2'])?>">
						<input type="hidden" readonly="" name="etiqueta3_s2" readonly="" value="<?php echo utf8_decode($reg['etiqueta3_s2'])?>">
						<!--input type="hidden" readonly="" name="etiqueta4_s2" readonly="" value="<?php echo utf8_decode($reg['etiqueta4_s2'])?>"-->
						<input type="hidden" readonly="" name="servicio3" readonly="" value="<?php echo utf8_decode($reg['servicio3'])?>">
						<input type="hidden" readonly="" name="etiqueta1_s3" readonly="" value="<?php echo utf8_decode($reg['etiqueta1_s3'])?>">
						<input type="hidden" readonly="" name="etiqueta2_s3" readonly="" value="<?php echo utf8_decode($reg['etiqueta2_s3'])?>">
						<input type="hidden" readonly="" name="etiqueta3_s3" readonly="" value="<?php echo utf8_decode($reg['etiqueta3_s3'])?>">
						<!--input type="hidden" readonly="" name="etiqueta4_s3" readonly="" value="<?php echo utf8_decode($reg['etiqueta4_s3'])?>"-->
						<input type="hidden" readonly="" name="servicio4" readonly="" value="<?php echo utf8_decode($reg['servicio4'])?>">
						<input type="hidden" readonly="" name="etiqueta1_s4" readonly="" value="<?php echo utf8_decode($reg['etiqueta1_s4'])?>">
						<input type="hidden" readonly="" name="etiqueta2_s4" readonly="" value="<?php echo utf8_decode($reg['etiqueta2_s4'])?>">
						<input type="hidden" readonly="" name="etiqueta3_s4" readonly="" value="<?php echo utf8_decode($reg['etiqueta3_s4'])?>">
						<!--input type="hidden" readonly="" name="etiqueta4_s4" readonly="" value="<?php echo utf8_decode($reg['etiqueta4_s4'])?>"-->
						<input type="hidden" readonly="" name="servicio5" readonly="" value="<?php echo utf8_decode($reg['servicio5'])?>">
						<input type="hidden" readonly="" name="etiqueta1_s5" readonly="" value="<?php echo utf8_decode($reg['etiqueta1_s5'])?>">
						<input type="hidden" readonly="" name="etiqueta2_s5" readonly="" value="<?php echo utf8_decode($reg['etiqueta2_s5'])?>">
						<input type="hidden" readonly="" name="etiqueta3_s5" readonly="" value="<?php echo utf8_decode($reg['etiqueta3_s5'])?>">
						<input type="hidden" readonly="" name="etiqueta4_s5" readonly="" value="<?php echo utf8_decode($reg['etiqueta4_s5'])?>">
						<input type="hidden" readonly="" name="etiqueta5_s5" readonly="" value="<?php echo utf8_decode($reg['etiqueta5_s5'])?>">
						<input type="hidden" readonly="" name="etiqueta6_s5" readonly="" value="<?php echo utf8_decode($reg['etiqueta6_s5'])?>">
						<input type="hidden" readonly="" name="servicio6" readonly="" value="<?php echo utf8_decode($reg['servicio6'])?>">
						<input type="hidden" readonly="" name="etiqueta1_s6" readonly="" value="<?php echo utf8_decode($reg['etiqueta1_s6'])?>">
						<input type="hidden" readonly="" name="servicio8" readonly="" value="<?php echo utf8_decode($reg['servicio8'])?>">
						<input type="hidden" readonly="" name="etiqueta1_s8" readonly="" value="<?php echo utf8_decode($reg['etiqueta1_s8'])?>">
						<input type="hidden" readonly="" name="uptime" readonly="" value="<?php echo utf8_decode($reg['uptime'])?>">
						<input type="hidden" readonly="" name="mes" readonly="" value="<?php echo date("M");?>">
						<input type="hidden" readonly="" name="anio" readonly="" value="<?php echo date("Y");?>">
						<input type="hidden" readonly="" name="tecnico" readonly="" value="<?php echo $_SESSION['nombre'];?>">
						<?php
						date_default_timezone_set('America/Mexico_City');
						setlocale(LC_TIME, 'spanish');
						
						?>
						<input type="hidden" readonly="" name="hora" readonly="" value="<?php echo strftime("%H:%M");?>">
						<input type="hidden" readonly="" name="carpeta" readonly="" value="<?php echo strftime("%H-%M");?>">
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Hora</label>
						  <div class="col-sm-110">
						  <font size=4 color="blue" class="col-sm-222 control-label"><?php echo strftime("%H:%M");?></font>
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
                          <label  class="col-sm-222 control-label">Servicio</label>
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label"><?php echo utf8_decode($reg['servicio'])?></font>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta1'])?> Inicial</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" name="valor1" pl value="" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
							
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto" value="LectInicial.jpg">
						<input type="file" name="archivo1[]" required="" accept="image/*" />
						</div>
						
			       		<br>
						<div class="form-group">
                            <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta2'])?></label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="valor3" required="">            
										<option value=""></option>                                      
                                        <option value="Se realiza cambio">Se realiza cambio</option>
                                        <option value="No se realiza cambio presion Satisfactoria">No se realiza cambio presión Satisfactoria</option>
                                        <option value="No cuenta con etapa">No cuenta con etapa</option>
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
											
						
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto</font>
						<input style=display:none type="text" name="Foto3" value="Cambio.jpg">
						<input type="file" name="archivo3[]" required="" accept="image/*" />
						</div>
						<br>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta1'])?> Final</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" name="valor2" required="" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
                        
                        
						
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto2" value="LectFinal.jpg">
						<input type="file" name="archivo2[]" required="" accept="image/*" />
						</div>
			
						<br>
						
						<div class="form-group">
                            <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta3'])?></label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="valor4" required="">          
										<option value=""></option>									
                                        <option value="Se realiza limpieza general">Se realiza limpieza general</option>
                                        <option value="No se realiza limpieza">No se realiza limpieza</option>
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						
						<div class="caja">
						<form method="post" action=""enctype="multipart/form-data">
						<font  size=2 color="green" >Agregar Foto</font>
						<input style=display:none type="text" name="Foto4" value="Limpieza.jpg">
						<input type="file" name="archivo4[]" required="" accept="image/*" />
						</div>
						<br>
			  
			   <!--////////////////////////////////////////////////////////////////////////////////////////////////////////-->
			  <?php
	$con2 = "SELECT * from equipo where equipo='$equipo'";
	$resultado = mysqli_query( $conexion, $con2) or die ( "Algo ha ido mal en la consulta a la base de datos");

	while ($medidas = mysqli_fetch_array( $resultado )){
    
	echo "<tr>";	
    ?>
			
	        <input type="text" class="form-control" readonly="" name="area" value="<?php echo utf8_decode($medidas['area'])?>">
<?php
		}
	?>
			  <br>
			  <br>						
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio</label>
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label"><?php echo utf8_decode($reg['servicio2'])?></font>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta1_s2'])?> Inicial</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" name="valor1_s2" required="" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>						
						
						<div class="caja">
						<form method="post" action="" enctype="multipart/form-data">
						<font  size=2 color="green" >Agregar Foto</font>
						<input style=display:none type="text" name="Foto5" value="LectInicial.jpg">
						<input type="file"  name="archivo5[]" required="" accept="image/*" />
						</div>
						<br>
				<div class="form-group">
                            <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta2_s2'])?></label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="valor3_s2" required="">              
										<option value=""></option>                                    
                                        <option value="Se realiza cambio">Se realiza cambio</option>
                                        <option value="No se realiza cambio presion Satisfactoria">No se realiza cambio presión Satisfactoria</option>
                                        <option value="No cuenta con etapa">No cuenta con etapa</option>
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
												
						<div class="caja">
						<form method="post" action=""enctype="multipart/form-data">
						<font  size=2 color="green" >Agregar Foto</font>
						<input style=display:none type="text" name="Foto7" value="Cambio.jpg">
						<input type="file" name="archivo7[]" required="" accept="image/*" />
						</div>
						<br>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta1_s2'])?> Final</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" name="valor2_s2" required="" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
												
						<div class="caja">
						<form method="post" action="" enctype="multipart/form-data">
						<font  size=2 color="green" >Agregar Foto</font>
						<input style=display:none type="text" name="Foto6" value="LectFinal.jpg">
						<input type="file"  name="archivo6[]" required="" accept="image/*" />
						</div>
						<br>
                        						
						<div class="form-group">
                            <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta3_s2'])?></label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="valor4_s2" required="">          
										<option value=""></option>									
                                        <option value="Se realiza limpieza general">Se realiza limpieza general</option>
                                        <option value="No se realiza limpieza">No se realiza limpieza</option>
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="caja">
						<form method="post" action=""enctype="multipart/form-data">
						<font  size=2 color="green" >Agregar Foto</font>
						<input style=display:none type="text" name="Foto8" value="Limpieza.jpg">
						<input type="file"  name="archivo8[]" required="" accept="image/*"/>
						</div>
					
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
                                  <input type="text" class="form-control" name="valor1_s3" required="" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<div class="caja">
						<form method="post" action="" enctype="multipart/form-data">
						<font  size=2 color="green" >Agregar Foto</font>
						<input style=display:none type="text" name="Foto9" value="LectInicial.jpg">
						<input type="file" name="archivo9[]" required="" accept="image/*" />
						</div>
						<br>

                        <div class="form-group">
                            <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta2_s3'])?></label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="valor3_s3" required="">          
										<option value=""></option>                                        
                                        <option value="Se realiza cambio">Se realiza cambio</option>
                                        <option value="No se realiza cambio presion Satisfactoria">No se realiza cambio presi&oacute;n Satisfactoria</option>
                                        <option value="No cuenta con etapa">No cuenta con etapa</option>
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="caja">
						<form method="post" action=""enctype="multipart/form-data">
						<font  size=2 color="green" >Agregar Foto</font>
						<input style=display:none type="text" name="Foto11" value="Cambio.jpg">
						<input type="file" name="archivo11[]" required="" accept="image/*" />
						</div>						
                <br>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta1_s3'])?> Final</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" name="valor2_s3" required="" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<div class="caja">
						<form method="post" action="" enctype="multipart/form-data">
						<font  size=2 color="green" >Agregar Foto</font>
						<input style=display:none type="text" name="Foto10" value="LectFinal.jpg">
						<input type="file" name="archivo10[]" required="" accept="image/*" />
						</div>
						<br>
						<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Amperaje de Alimentaci&#243;n previo al cambio</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L1-L2</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje1_s3" required="">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L2-L3</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje2_s3" required="">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L3-L1</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje3_s3" required="">
              </div>
              </div>
              <br>
						<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Amperaje de Alimentaci&#243;n despues del cambio</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L1-L2</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje4_s3" required="">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L2-L3</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje5_s3" required="">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L3-L1</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje6_s3" required="">
              </div>
              </div>              
						<br>
						
						<div class="form-group">
                            <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta3_s3'])?></label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="valor4_s3" required="">          
										<option value=""></option>									
                                        <option value="Se realiza limpieza general">Se realiza limpieza general</option>
                                        <option value="No se realiza limpieza">No se realiza limpieza</option>
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>						
						
						<div class="caja">
						<form method="post" action=""enctype="multipart/form-data">
						<font  size=2 color="green" >Agregar Foto</font>
						<input style=display:none type="text" name="Foto12" value="Limpieza.jpg">
						<input type="file"  name="archivo12[]" required="" accept="image/*" />
						</div>
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
                                  <input type="text" class="form-control" name="valor1_s4" value="" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
						
						
						<div class="caja">
						<form method="post" action="" enctype="multipart/form-data">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto13" value="LectInicial.jpg">
						<input type="file" name="archivo13[]" required="" accept="image/*" />
						</div>
						<br>
						<div class="form-group">
                            <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta2_s4'])?></label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="valor3_s4" required="">          
										<option value=""></option>                                        
                                        <option value="Se realiza cambio">Se realiza cambio</option>
                                        <option value="No se realiza cambio presion Satisfactoria">No se realiza cambio presión Satisfactoria</option>
                                        <option value="No cuenta con etapa">No cuenta con etapa</option>
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="caja">
						<form method="post" action=""enctype="multipart/form-data">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto15" value="Cambio.jpg">
						<input type="file" name="archivo15[]" required="" accept="image/*" />
						</div>
						<br>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta1_s4'])?> Final</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" name="valor2_s4"  required="" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>						
						
						<div class="caja">
						<form method="post" action="" enctype="multipart/form-data">
						<font  size=2 color="green" >Agregar Foto </font>
						<input style=display:none type="text" name="Foto14" value="LectFinal.jpg">
						<input type="file" name="archivo14[]" required="" accept="image/*" />
						</div>
						<br>
						
						<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Amperaje de Alimentaci&#243;n previo al cambio</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L1-L2</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje1_s4" required="">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L2-L3</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje2_s4" required="">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L3-L1</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje3_s4" required="">
              </div>
              </div>
              <br>
						<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Amperaje de Alimentaci&#243;n despues del cambio</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L1-L2</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje4_s4" required="">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L2-L3</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje5_s4" required="">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L3-L1</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje6_s4" required="">
              </div>
              </div>
              <br>                        
						<div class="form-group">
                            <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta3_s4'])?></label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="valor4_s4" required="">          
										<option value=""></option>									
                                        <option value="Se realiza limpieza general">Se realiza limpieza general</option>
                                        <option value="No se realiza limpieza">No se realiza limpieza</option>
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
												
						<div class="caja">
						<form method="post" action=""enctype="multipart/form-data">
						<font  size=2 color="green" >Agregar Foto</font>
						<input style=display:none type="text" name="Foto16" value="Limpieza.jpg">
						<input type="file" name="archivo16[]" required="" accept="image/*" />
						</div>
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
                                  <input type="text" class="form-control" name="valor1_s5" value="" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
						
                        <div class="form-group">
                            <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta2_s5'])?></label>
                            <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" name="valor2_s5" value="" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<div class="form-group">
                            <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta3_s5'])?></label>
                            <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" name="valor3_s5" value="" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
												
						<div class="form-group">
                            <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta4_s5'])?></label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="valor4_s5" required="">           
										<option value=""></option>                                       
                                        <option value="Se realiza limpieza general">Se realiza limpieza general</option>
                                        <option value="No se realiza limpieza">No se realiza limpieza</option>
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>

						<div class="form-group">
                            <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta5_s5'])?></label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="valor5_s5" required="">           
										<option value=""></option>                                       
                                        <option value="Se realiza Engrasado de Chumacera">Se realiza Engrasado de Chumacera</option>
                                        <option value="No se realiza Engrasado de Chumacera">No se realiza Engrasado de Chumacera</option>
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta6_s5'])?></label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="valor6_s5" required="">           
										<option value=""></option>                                       
                                        <option value="Se realizo Cambio de Bandas">Se realizo Cambio de Bandas</option>
                                        <option value="No se realizo Cambio de Bandas">No se realizo Cambio de Bandas</option>
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Evidencia Fotografica Posterior al Servicio</label>
						  <div class="col-sm-110">
                          </div>
                        </div>
						<div class="caja">
						<form method="post" action="" enctype="multipart/form-data">
						<font  size=2 color="blue" >Agregar Foto Posterior al Cambio</font>
						<input style=display:none type="text" name="Foto17" value="Motoventilador.jpg">
						<input type="file" name="archivo17[]" required="" accept="image/*" />
						</div>
						<br>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio</label>
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label"><?php echo utf8_decode($reg['servicio6'])?></font>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta1_s6'])?></label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="valor1_s6" required="">           
										<option value=""></option>                                       
                                        <option value="Se realiza limpieza general">Se realiza limpieza general</option>
                                        <option value="No se realiza limpieza">No se realiza limpieza</option>
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Evidencia Fotografica Posterior al Servicio</label>
						  <div class="col-sm-110">
                          </div>
                        </div>
						
						<div class="caja">
						<form method="post" action="" enctype="multipart/form-data">
						<font  size=2 color="blue" >Agregar Foto Posterior al Servicio</font>
						<input style=display:none type="text" name="Foto18" value="Serpentin.jpg">
						<input type="file" name="archivo18[]" required="" accept="image/*" />
						</div>
						<br>

						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio</label>
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label"><?php echo utf8_decode($reg['servicio8'])?></font>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label  class="col-sm-222 control-label"><?php echo utf8_decode($reg['etiqueta1_s8'])?></label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="valor1_s8" required="">             
										<option value=""></option>                                     
                                        <option value="Se realiza limpieza general">Se realiza limpieza general</option>
                                        <option value="No se realiza limpieza">No se realiza limpieza</option>
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Evidencia Fotografica Posterior al Servicio</label>
						  <div class="col-sm-110">
                          </div>
                        </div>
						
						<div class="caja">
						<form method="post" action="" enctype="multipart/form-data">
						<font  size=2 color="blue" >Agregar Foto Posterior al Servicio</font>
						<input style=display:none type="text" name="Foto19" value="Charola.jpg">
						<input type="file" name="archivo19[]" required="" accept="image/*" />
						</div>
						<br>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Tiempo Fuera por operacion por Falla (Hrs)</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" name="valor_uptime"  required="" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label  class="col-sm-222 control-label">Observaciones</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control"  required="" name="observaciones" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
                        <br>
						                       
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
                  <input type="text" class="form-control" name="tempentrada" required="" maxlength="10">
              </div>
			  <label  class="col-sm-2 control-label">Salida: </label>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="tempsalida" required="" maxlength="10">
              </div>
			  
			<div class="form-group">
              <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Presi&#243;n</font>
              <div class="col-sm-2">
			  <div class="input-group">
                  <input type="text" class="form-control" name="tempresion" required="" maxlength="10">
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
                  <input type="text" class="form-control" name="tempentrada2" required="" maxlength="10">
              </div>
			  <label  class="col-sm-2 control-label">Salida</label>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="tempsalida2" required="" maxlength="10">
              </div>
            </div>
			
			<div class="form-group">
              <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Presi&#243;n</font>
              <div class="col-sm-2">
			  <div class="input-group">
                  <input type="text" class="form-control" name="tempresion2" required="" maxlength="10">
              </div>
			  </div>
            </div>
			
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Valvulas y actuadores</font>
			  <br>
              <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Estado</font>
              <div class="col-sm-2">
                  <select class="form-control" name="estadoval" required="">             
						<option value=""></option>                                     
                        <option value="En buen estado">En buen estado</option>
                        <option value="Cambio">Cambio</option>
                  </select>
              </div>
			<div class="form-group">
              <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Modulaci&#243;n</font>
              <div class="col-sm-2">
                  <select class="form-control" name="tipomodulacion" required="">             
						<option value=""></option>                                     
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
                  <select class="form-control" name="estamanguera" required="">             
						<option value=""></option>                                     
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
                  <select class="form-control" name="tornilleria" required="">             
						<option value=""></option>                                     
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
                  <select class="form-control" name="estacable" required="">             
						<option value=""></option>                                     
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
                  <input type="text" class="form-control" name="amperaje1_3" required="" maxlength="8">
              </div>
			  <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L2-L3</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje2_3" required="" maxlength="8">
              </div>
			  <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L3-L1</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje3_3" required="" maxlength="8">
              </div>
            </div>
			<br>
			
						<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Variador</font>
			  <br>
			  <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Funcionamiento</font>
              <div class="col-sm-2">
                  <select class="form-control" name="funcionamiento" required="">             
						<option value=""></option>                                     
                        <option value="En buen estado">En buen estado</option>
                        <option value="Cambio">Cambio</option>
                  </select>
              </div>
			  <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Tipo</font>
              <div class="col-sm-2">
                  <select class="form-control" name="tipovariador" required="">             
						<option value=""></option>                                     
                        <option value="Manual">Manual</option>
                        <option value="Automatico">Automatico</option>
                  </select>
              </div>
            </div>
			<br>
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Improve (Mejora)</label>
						  <br>
                          <div class="col-sm-110">
                            <textarea class="form-control" rows="3" placeholder="Escriba la mejora" name="mejora" required=""></textarea>
                          </div>
                        </div>

						  <?php } 
						 
			?>
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
						?>
	
	
	
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