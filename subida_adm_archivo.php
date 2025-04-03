<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 07/2020 v2
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesi贸n o reanudar la existente.
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
          Ubicaci贸n
        </a>
      </li>
	   <li>
        <a href="area.php">
          <i class="fa fa-rss-square"></i>
          脕rea
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
  
		  <!--/////////////////////////////////////////////////////////-->
 <script language="javascript" src="js/jquery-3.1.1.min.js"></script>
		
		<script language="javascript">
			$(document).ready(function(){
				$("#empresa_id").change(function () {
					//$('#ubicacion_id').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					$("#empresa_id option:selected").each(function () {
						id = $(this).val();
						$.post("get_discos.php", { id: id }, function(data){
							$("#cbx_municipio").html(data);
						});            
					});
				})
			});
			
			$(document).ready(function(){
				$("#cbx_municipio").change(function () {
					$('#equipo_id').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					$("#cbx_municipio option:selected").each(function () {
						id = $(this).val();
						$.post("getubicacion.php", { id: id }, function(data){
							$("#ubicacion_id").html(data);
						});            
					});
				})
			});
			
			$(document).ready(function(){
				$("#ubicacion_id").change(function () {
					//$('#seccion_id').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					$("#ubicacion_id option:selected").each(function () {
						id = $(this).val();
						$.post("get_equipo2.php", { id: id }, function(data){
							$("#equipo_id").html(data);
						});            
					});
				})
			});
			
		</script>
 <!--/////////////////////////////////////////////////////////-->
  
  <table>  
		<tr>
       <a href="seccion_adm_servicio.php" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
	   </tr>
 <tr>
      <button onClick="document.location.reload();" type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Click Actualizar Datos" HSPACE="10" VSPACE="10"><i class="fa fa-refresh fa-spin  fa-fw"></i>
		<span class="sr-only">Loading...</span></button>
        </tr>
          </td>
       </table>
		
				<!--************************************ Page content******************************-->
		<div class="container" style="width: 1030px;">
          <div class="row" style="width: 770px;">
            <div class="col-sm-12">
           <div class="page-header2">
				
                <h1 class="animated lightSpeedIn">Adicionar Archivo </h1>
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
            <form  method="POST" action="subida_admin_archivo2.php"  enctype="multipart/form-data">
						
                        
						
						<input type="hidden" readonly="" name="empresa" readonly="" value="<?php echo utf8_decode($reg['empresa'])?>">
						<input type="hidden" readonly="" name="area" readonly="" value="<?php echo utf8_decode($reg['area'])?>">
						<input type="hidden" readonly="" name="edificio" readonly="" value="<?php echo utf8_decode($reg['edificio'])?>">
						<input type="hidden" readonly="" name="ubicacion" readonly="" value="<?php echo utf8_decode($reg['ubicacion'])?>">
						<input type="hidden" readonly="" name="equipo" readonly="" value="<?php echo utf8_decode($reg['equipo'])?>">
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

                       
						<div class="caja">
						<form enctype="multipart/form-data" method="post" action="">
						<font  size=2 color="green" >Agregar Archivo </font>
						<input style=display:none type="text" name="Foto" value="Servicio.pdf">
						<input type="file" name="archivo1[]" />
						</div>
						
			       		
						  <?php
	}						  
						 
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