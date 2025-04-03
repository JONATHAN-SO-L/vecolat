<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 03/2020 v1
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
        <a href="equipo.php">
          <i class="fa fa-cubes"></i>
        Equipo
        </a>
      </li>
	   <li>
        <a href="area.php">
          <i class="fa fa-rss-square"></i>
          Área
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
		   <a href="consul_diario.php" ><button type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center">&nbsp;&nbsp;Regresar</button></a>
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
				
                <h1 class="animated lightSpeedIn">Consultar Servicio</h1>
                <span class="label label-danger"></span> 		 
				<p class="pull-right text-primary"></p>
		   </div>
            </div>
          </div>
        </div>
		<!--************************************ Page content******************************-->
		

<style>
.page-header{
display:none;
}

</style>

	<div class="container">
  <div class="row">
    <div class="col-sm-8">
      <div class="panel panel-success">
        <div class="panel-heading text-center"><strong>Compruebe datos a Consultar</strong></div>
        <div class="panel-body">
            <form role="form" action="./lib/pdf_diario.php" method="POST" enctype="multipart/form-data">
			
						<?php
						$equipo= $_POST['equipo_id'];
						$fecha = $_POST['fecha_i'];
						$semana= date('W', strtotime($fecha)) . PHP_EOL; 
						
						$connect = mysqli_connect("localhost", "veco", "Vec83Dv19iSa@", "veco_sims_devecchi");
								$query = "SELECT * FROM servicio where equipo ='$equipo'";
								$resultado = mysqli_query( $connect, $query) or die ( "Algo ha ido mal en la consulta a la base de datos");
								while ($reg = mysqli_fetch_array( $resultado )){
						?>
						<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->
						<input type="hidden" readonly="" name="equipo" readonly="" value="<?php echo $equipo?>">
						<input type="hidden" readonly="" name="semana" readonly="" value="<?php echo $semana?>">
								<div class="form-group">
                          <label  class="col-sm-222 control-label">Empresa</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" step="any" class="form-control" name="empresa" readonly="" value="<?php echo utf8_decode($reg['empresa'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>	
						<div class="form-group">
                          <label  class="col-sm-222 control-label">edificio</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" step="any" class="form-control" name="edificio" readonly="" value="<?php echo utf8_decode($reg['edificio'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>	
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Ubicacion</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" step="any" class="form-control" name="ubicacion" readonly="" value="<?php echo utf8_decode($reg['ubicacion']) ?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>	
							<?php 	}  ?>
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Equipo</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" step="any" class="form-control" name="equipo" readonly="" value="<?php echo $equipo?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>	
						<div class="form-group">
                          <label  class="col-sm-222 control-label">semana</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" step="any" class="form-control" name="semana" readonly="" value="<?php echo $semana?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>	
					<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->
						
			<br>
			<br>
			<br>			
						<div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10 text-center">
                              <button type="submit" class="btn btn-info">Ver PDF</button>
                          </div>
                        </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->
						

</div>
 <?php
}else{
	header('Location: index.php');
}
?>
<footer></footer>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
	<script src="/devecchi/ejercicio/Resources/js/empresa.js"></script>
	<script src="/devecchi/ejercicio/Models/empresa.js"></script>
</body>
</html>
