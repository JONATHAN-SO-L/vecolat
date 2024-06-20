<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 03/2020 v2
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
		    <a href="list_edit_diario.php" ><button type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center">&nbsp;&nbsp;Regresar</button></a>
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
				
                <h1 class="animated lightSpeedIn">Editar Servicio Diario</h1>
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
        <div class="panel-heading text-center"><strong>Edite la información que se muestra a continuación</strong></div>
        <div class="panel-body">
            <form role="form" action="" method="POST" enctype="multipart/form-data">
		
    
	<?php
	include ("conexi.php");
include './lib/class_mysql.php';
include './lib/config.php';
if(isset($_REQUEST['empresa']) && isset($_REQUEST['equipo'])){        

        	if(isset($_REQUEST['id_diario'])){
			$id_diario= $_REQUEST['id_diario'];
		}else{
			$id_diario="";
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
		if(isset($_REQUEST['semana'])){
			$semana= $_REQUEST['semana'];
		}else{
			$semana="";
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
 
  $con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("UPDATE diario_serv set  frecuencia='$frecuencia', potencia='$potencia', vel_moto='$vel_moto', operacion='$operacion', 
				caida_merv8='$caida_merv8', car_act='$car_act', caida_merv15='$caida_merv15', caida_merv17='$caida_merv17',
				l1='$l1', l2='$l2', l3='$l3', l1_l2='$l1_l2',
				l1_l3='$l1_l3', l2_l3='$l2_l3', neutro='$neutro', aah_temp='$aah_temp',
				aah_psi='$aah_psi', rah_temp='$rah_temp', rah_psi='$rah_psi', aac_temp='$aac_temp', aac_psi='$aac_psi', rac_temp='$rac_temp',
				rac_psi='$rac_psi', manometro='$manometro', manguera='$manguera', filtro='$filtro', 
				drenajes='$drenajes',observaciones='$observaciones' WHERE id_diario='$id_diario' AND fecha_servicio='$fecha_servicio' "))){

				echo 
                '<script language="javascript">
				alert("El Servicio ha sido guardado. Gracias");
				window.location.href="diario_servic.php"</script>';

          }else{
             echo 
              '   <script language="javascript">
				alert("El Servicio no se ha podido modificar..::Intente de nuevo::..");
				window.location.href="diario_servic.php"</script>';
          }
	 }
	
	$id = MysqlQuery::RequestGet('id');
	$sql = Mysql::consulta("SELECT * FROM diario_serv WHERE id_diario= '$id'");
	$registro=mysqli_fetch_array($sql, MYSQLI_ASSOC);

 
?>
	  <fieldset>
                		<input type="hidden" readonly="" name="id_diario" readonly="" value="<?php echo $registro['id_diario']?>">
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
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial" class="col-sm-222 control-label">Datos del Variador</font>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Frecuencia (Hz)</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="frecuencia" value="<?php echo utf8_decode($registro['frecuencia'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/diario/frecuencia/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/diario/frecuencia/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/diario/frecuencia/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
								<br>
						
							 <div class="form-group">
                          <label  class="col-sm-222 control-label">Potencia (HP)</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="potencia" value="<?php echo utf8_decode($registro['potencia'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>		
						<?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/diario/potencia/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/diario/potencia/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/diario/potencia/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						
					<div class="form-group">
                          <label  class="col-sm-222 control-label">Velocidad Motor (RPM)</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="vel_moto" value="<?php echo utf8_decode($registro['vel_moto'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
							  <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/diario/velocidad/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/diario/velocidad/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/diario/velocidad/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">% de Operación</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="operacion" value="<?php echo utf8_decode($registro['operacion'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
							  <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/diario/operacion/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/diario/operacion/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/diario/operacion/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						
							<div class="form-group">
                          <label  class="col-sm-222 control-label">Amperaje</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="amperaje" value="<?php echo utf8_decode($registro['amperaje'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
							  <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/diario/amp/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/diario/amp/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/diario/amp/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						
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
                                  <input type="text" step="any" class="form-control" name="caida_merv8" value="<?php echo utf8_decode($registro['caida_merv8'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						 <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/diario/merv8";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/diario/merv8/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/diario/merv8/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Carbón Activado (in. Wg.)</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="car_act" value="<?php echo utf8_decode($registro['car_act'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						 <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/diario/carbon";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/diario/carbon/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/diario/carbon/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">MERV 15 (in. Wg.)</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="caida_merv15" value="<?php echo utf8_decode($registro['caida_merv15'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
							
						
						 <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/diario/merv15/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/diario/merv15/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/diario/merv15/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">MERV 17 (in. Wg.)</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="caida_merv17" value="<?php echo utf8_decode($registro['caida_merv17'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						 <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/diario/merv17/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/diario/merv17/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/diario/merv17/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						
						<div class="form-group">
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Amperaje</font>
              <br><br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L1</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="l1" value="<?php echo utf8_decode($registro['l1'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L2</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="l2" value="<?php echo utf8_decode($registro['l2'])?>">
              </div>	
              <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">L3</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="l3" value="<?php echo utf8_decode($registro['l3'])?>">
              </div>
              </div>				
						
						 <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/diario/amperaje/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/diario/amperaje/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/diario/amperaje/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						
						<div class="form-group">
                          <font size=3 color="blue" FACE="arial" class="col-sm-222 control-label">Voltaje</font>
						  
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">L1-L2</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="l1_l2" value="<?php echo utf8_decode($registro['l1_l2'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">L1-L3</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="l1_l3" value="<?php echo utf8_decode($registro['l1_l3'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">L2-L3</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="l2_l3" value="<?php echo utf8_decode($registro['l2_l3'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Neutro</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="neutro" value="<?php echo utf8_decode($registro['neutro'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						 <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/diario/voltaje/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/diario/voltaje/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/diario/voltaje/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						
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
                                  <input type="number" step="any" class="form-control" name="aah_temp" value="<?php echo utf8_decode($registro['aah_temp'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Psi</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="aah_psi" value="<?php echo utf8_decode($registro['aah_psi'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						 <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/diario/aah/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/diario/aah/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/diario/aah/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">R.A.H</label>
						 <div class="form-group">
                          <label  class="col-sm-222 control-label">Temp. °C</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="rah_temp" value="<?php echo utf8_decode($registro['rah_temp'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Psi</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" step="any" class="form-control" name="rah_psi" value="<?php echo utf8_decode($registro['rah_psi'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						 <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/diario/rah/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/diario/rah/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/diario/rah/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						
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
                                  <input type="number" step="any" class="form-control" name="aac_temp" value="<?php echo utf8_decode($registro['aac_temp'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Psi</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="aac_psi" value="<?php echo utf8_decode($registro['aac_psi'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						 <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/diario/aac/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/diario/aac/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/diario/aac/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">R.A.C</label>						  
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Temp. °C</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" name="rac_temp" value="<?php echo utf8_decode($registro['rac_temp'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Psi</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" step="any" class="form-control" name="rac_psi" value="<?php echo utf8_decode($registro['rac_psi'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						 <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/diario/rac/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/diario/rac/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/diario/rac/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
					}
						?>
						
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
										<option value="<?php echo $registro['filtro']?>"><?php echo utf8_decode($registro['manometro'])?>  (Actual)</option>                                    
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
										<option value="<?php echo $registro['manguera']?>"><?php echo utf8_decode($registro['manguera'])?>  (Actual)</option>                                   
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
										<option value="<?php echo $registro['filtro']?>"><?php echo utf8_decode($registro['filtro'])?>  (Actual)</option>                                    
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
										<option value="<?php echo $registro['drenajes']?>"><?php echo utf8_decode($registro['drenajes'])?>  (Actual)</option>                                    
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
                                  <input type="text" class="form-control" name="observaciones" value="<?php echo utf8_decode($registro['observaciones'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
                        <br>
						 <?php
								$fecha_servicio = $registro['fecha_servicio'];
								$equipo = $registro['equipo'];
								$carpeta = $registro['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/diario/observaciones/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/diario/observaciones/$archivo' target='_blank' ><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong></a> ";
								?>
								<a href="del_file.php?id=files/servicio/<?php echo $registro['fecha_servicio'];?>/<?php echo $registro['equipo'];?>/<?php echo $registro['carpeta'];?>/diario/observaciones/<?php echo $archivo;?>">&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><br>
								<?php
								}
						}
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
}else{
	header('Location: index.php');
}
?>
<footer></footer>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
</body>
</html>