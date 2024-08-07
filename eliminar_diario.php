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
				
                <h1 class="animated lightSpeedIn">Eliminar Servicio Diario</h1>
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
        <div class="panel-heading text-center"><strong>Verifique antes de Eliminar</strong></div>
        <div class="panel-body">
            <form role="form" action="" method="POST" enctype="multipart/form-data">
	<?php
    include ("conexi.php");
	include './lib/class_mysql.php';
	include './lib/config.php';
	
if(isset($_POST['equipo']) && isset($_POST['id_diario']) && isset($_POST['fecha_servicio'])){
		$id_diario=MysqlQuery::RequestPost('id_diario');
		$equipo=  MysqlQuery::RequestPost('equipo');
		$fecha_servicio=  MysqlQuery::RequestPost('fecha_servicio');
		$carpeta=  MysqlQuery::RequestPost('carpeta');

	if(isset($_POST['equipo']) && isset($_POST['equipo'])){
          $empresa_delete=MysqlQuery::RequestPost('id_diario');
          $corto_delete=MysqlQuery::RequestPost('fecha_servicio');
          $carpeta=MysqlQuery::RequestPost('carpeta');
         
          $sql=Mysql::consulta("SELECT * FROM diario_serv WHERE id_diario= '$empresa_delete' AND fecha_servicio='$corto_delete'");

          if(mysqli_num_rows($sql)>=1){
             MysqlQuery::Eliminar("diario_serv", "id_diario='$empresa_delete' and fecha_servicio='$corto_delete'");
			 
			 echo 
			 '<script language="javascript">
				alert("Servicio Eliminado");
				window.location.href="list_edit_diario.php"</script>';
          }else{
            echo'
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="list_edit_diario.php"><button type="button" class="close"  data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido eliminar el servicio por que los datos son incorrectos
                    </p>
                </div>
            '; 
          }
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
                                  <input type="number" step="any" class="form-control" readonly="" name="frecuencia" value="<?php echo utf8_decode($registro['frecuencia'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
								<br>
						
							 <div class="form-group">
                          <label  class="col-sm-222 control-label">Potencia (HP)</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" readonly="" name="potencia" value="<?php echo utf8_decode($registro['potencia'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>	
						
					<div class="form-group">
                          <label  class="col-sm-222 control-label">Velocidad Motor (RPM)</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" readonly="" name="vel_moto" value="<?php echo utf8_decode($registro['vel_moto'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">% de Operación</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" readonly="" name="operacion" value="<?php echo utf8_decode($registro['operacion'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
                        
                        
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Amperaje</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" readonly="" name="amperaje" value="<?php echo utf8_decode($registro['amperaje'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
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
                                  <input type="text" step="any" class="form-control" readonly="" name="caida_merv8" value="<?php echo utf8_decode($registro['caida_merv8'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div> 
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Carbón Activado (in. Wg.)</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" readonly="" name="car_act" value="<?php echo utf8_decode($registro['car_act'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">MERV 15 (in. Wg.)</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" readonly="" name="caida_merv15" value="<?php echo utf8_decode($registro['caida_merv15'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">MERV 17 (in. Wg.)</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" readonly="" name="caida_merv17" value="<?php echo utf8_decode($registro['caida_merv17'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Amperaje</font>
              <br><br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L1</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="l1" readonly="" value="<?php echo utf8_decode($registro['l1'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L2</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="l2" readonly="" value="<?php echo utf8_decode($registro['l2'])?>">
              </div>	
              <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">L3</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="l3" readonly="" value="<?php echo utf8_decode($registro['l3'])?>">
              </div>
              </div>				
						
						
						<div class="form-group">
                          <font size=3 color="blue" FACE="arial" class="col-sm-222 control-label">Voltaje</font>
						  
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">L1-L2</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" readonly="" name="l1_l2" value="<?php echo utf8_decode($registro['l1_l2'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">L1-L3</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" readonly="" name="l1_l3" value="<?php echo utf8_decode($registro['l1_l3'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">L2-L3</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" readonly="" name="l2_l3" value="<?php echo utf8_decode($registro['l2_l3'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Neutro</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" readonly="" name="neutro" value="<?php echo utf8_decode($registro['neutro'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
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
                                  <input type="number" step="any" class="form-control" readonly="" name="aah_temp" value="<?php echo utf8_decode($registro['aah_temp'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Psi</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" readonly="" name="aah_psi" value="<?php echo utf8_decode($registro['aah_psi'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">R.A.H</label>
						 <div class="form-group">
                          <label  class="col-sm-222 control-label">Temp. °C</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" readonly="" name="rah_temp" value="<?php echo utf8_decode($registro['rah_temp'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Psi</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" step="any" class="form-control" readonly="" name="rah_psi" value="<?php echo utf8_decode($registro['rah_psi'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
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
                                  <input type="number" step="any" class="form-control" readonly="" name="aac_temp" value="<?php echo utf8_decode($registro['aac_temp'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Psi</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" readonly="" name="aac_psi" value="<?php echo utf8_decode($registro['aac_psi'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">R.A.C</label>						  
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Temp. °C</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="number" step="any" class="form-control" readonly="" name="rac_temp" value="<?php echo utf8_decode($registro['rac_temp'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Psi</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" step="any" class="form-control" readonly="" name="rac_psi" value="<?php echo utf8_decode($registro['rac_psi'])?>" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						
						<div class="form-group">
						  <div class="col-sm-110">
						  <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label">Revisión Visual</font>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Estado de Manómetros</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly="" name="manometro" value="<?php echo utf8_decode($registro['manometro'])?>">
									<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Estado de Mangueras</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly="" name="manguera" value="<?php echo utf8_decode($registro['manguera'])?>">
									<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Estado de Filtros</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly="" name="filtro" value="<?php echo utf8_decode($registro['filtro'])?>">
									<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Drenajes</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly="" name="drenajes" value="<?php echo utf8_decode($registro['drenajes'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>						  
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label  class="col-sm-222 control-label">Observaciones</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly="" name="observaciones" value="<?php echo utf8_decode($registro['observaciones'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
                        <br>
						
						
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10 text-center">
                              <button type="submit" class="btn btn-info">Eliminar</button>
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