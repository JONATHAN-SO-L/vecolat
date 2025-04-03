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
<head><meta charset="gb18030">
  
  <title>Ver Servicio</title>
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
    width: 100%;
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
          Ubicaci&#243;n
        </a>
      </li>
	  <li>
        <a href="area.php">
          <i class="fa fa-rss-square"></i>
          &#193;rea
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
	   <li class="active">
        <a href="tarea.php">
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
          Gr&#225;fica
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
       <a href="tarea.php" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
	   </tr>
	</td>
	   </table>
		<!--************************************ Page content******************************-->
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Ver Servicio </h1>
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
        <div class="panel-heading text-center"><strong></strong></div>
        <div class="panel-body">
            <form role="form" action="" method="POST">
		
    <?php
	include './lib/class_mysql.php';
include './lib/config.php';

$id = MysqlQuery::RequestGet('id');
	$sql = Mysql::consulta("SELECT * FROM servicio WHERE id_servicio= '$id'");
	$reg=mysqli_fetch_array($sql, MYSQLI_ASSOC);

?>
	  <fieldset>
						<div class="form-group">
                            <label class="col-sm-222 control-label">Id</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="id_edit" readonly=""  value="<?php echo utf8_decode($reg['id_servicio'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Empresa</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="rfc" readonly="" value="<?php echo utf8_decode($reg['empresa'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Edificio</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" readonly="" type="text" name="clave" readonly="" value="<?php echo utf8_decode($reg['edificio'])?>">
								   <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                                </div>
                            </div>
                        </div>

						<div class="form-group">
                            <label class="col-sm-222 control-label">Ubicación</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="tarea" readonly="" value="<?php echo utf8_decode($reg['ubicacion'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
                    
                       <div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio</label>
						  <div class="col-sm-110">
						  <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="tarea" readonly="" value="<?php echo utf8_decode($reg['servicio'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Etiqueta 1</label>
						    <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control"readonly=""  name="valor1" value="<?php echo utf8_decode($reg['etiqueta1'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
						
                        <div class="form-group">
                           <label  class="col-sm-222 control-label">Etiqueta 2</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly=""  name="valor2" value="<?php echo utf8_decode($reg['etiqueta2'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
				
						<div class="form-group">
                            <label class="col-sm-222 control-label">Etiqueta 3</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly=""  name="valor3" value="<?php echo utf8_decode($reg['etiqueta3'])?>" >
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
						<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio 2</label>
						  <div class="col-sm-110">
						  <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="tarea" readonly="" value="<?php echo utf8_decode($reg['servicio2'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Etiqueta 1</label>
						  <!--a href="edit_seccion.php?id=<?php// echo $reg['id_config']; ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a-->
				    
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly=""  name="valor1_s2" value="<?php echo utf8_decode($reg['etiqueta1_s2'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
						
                        <div class="form-group">
                           <label  class="col-sm-222 control-label">Etiqueta 2</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly=""  name="valor2_s2" value="<?php echo utf8_decode($reg['etiqueta2_s2'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
					
						<div class="form-group">
                            <label class="col-sm-222 control-label">Etiqueta 3</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly=""  name="valor3_s2" value="<?php echo utf8_decode($reg['etiqueta3_s2'])?>" >
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
						<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio 3</label>
						  <div class="col-sm-110">
						  <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="tarea" readonly="" value="<?php echo utf8_decode($reg['servicio3'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div></div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Etiqueta 1</label>
						 <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly=""  name="valor1_s3" value="<?php echo utf8_decode($reg['etiqueta1_s3'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
						
                        <div class="form-group">
                           <label  class="col-sm-222 control-label">Etiqueta 2</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly=""  name="valor2_s3" value="<?php echo utf8_decode($reg['etiqueta2_s3'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Etiqueta 3</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly=""  name="valor3_s3" value="<?php echo utf8_decode($reg['etiqueta3_s3'])?>" >
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
						<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio 4</label>
						  <div class="col-sm-110">
						  <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="tarea" readonly="" value="<?php echo utf8_decode($reg['servicio4'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Etiqueta 1</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly=""  name="valor1_s4" value="<?php echo utf8_decode($reg['etiqueta1_s4'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
					
                        <div class="form-group">
                           <label  class="col-sm-222 control-label">Etiqueta 2</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control"  readonly=""  name="valor2_s4" value="<?php echo utf8_decode($reg['etiqueta2_s4'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Etiqueta 3</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly=""  name="valor3_s4" value="<?php echo utf8_decode($reg['etiqueta3_s4'])?>" >
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
						<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio 5</label>
						  <div class="col-sm-110">
						  <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="tarea" readonly="" value="<?php echo utf8_decode($reg['servicio5'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Etiqueta 1</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly=""  name="valor1_s5" value="<?php echo utf8_decode($reg['etiqueta1_s5'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
					
                        <div class="form-group">
                           <label  class="col-sm-222 control-label">Etiqueta 2</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly=""   name="valor2_s5" value="<?php echo utf8_decode($reg['etiqueta2_s5'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
					
						<div class="form-group">
                            <label class="col-sm-222 control-label">Etiqueta 3</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly=""  name="valor3_s5" value="<?php echo utf8_decode($reg['etiqueta3_s5'])?>" >
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                           <label  class="col-sm-222 control-label"> Etiqueta 4</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly=""  name="valor4_s5" value="<?php echo utf8_decode($reg['etiqueta4_s5'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
					
						<div class="form-group">
                            <label class="col-sm-222 control-label">Etiqueta 5</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly=""  name="valor5_s5" value="<?php echo utf8_decode($reg['etiqueta5_s5'])?>" >
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Etiqueta 6</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly=""  name="valor6_s5" value="<?php echo utf8_decode($reg['etiqueta6_s5'])?>" >
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
					
						<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio 6</label>
						  <div class="col-sm-110">
						  <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="tarea" readonly="" value="<?php echo utf8_decode($reg['servicio6'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Etiqueta 1</label>
						   <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control"  readonly=""  name="valor1_s6" value="<?php echo utf8_decode($reg['etiqueta1_s6'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
					
                        <!--div class="form-group">
                           <label  class="col-sm-222 control-label"> Etiqueta 2</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly=""  name="valor2_s6" value="<?php echo utf8_decode($reg['etiqueta2_s6'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
					
						<div class="form-group">
                            <label class="col-sm-222 control-label">Etiqueta 3</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly=""  name="valor3_s6" value="<?php echo utf8_decode($reg['etiqueta3_s6'])?>" >
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div-->
					
						<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
						
						<!--div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio 7</label>
						  <div class="col-sm-110">
						  <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="tarea" readonly="" value="<?php echo utf8_decode($reg['servicio7'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Etiqueta 1</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly=""  name="valor1_s7" value="<?php echo utf8_decode($reg['etiqueta1_s7'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
						
                        <div class="form-group">
                           <label  class="col-sm-222 control-label">Etiqueta 2</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly=""  name="valor2_s7" value="<?php echo utf8_decode($reg['etiqueta2_s7'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Etiqueta 3</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly=""  name="valor3_s7" value="<?php echo utf8_decode($reg['etiqueta3_s7'])?>" >
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div-->
						
						<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio 8</label>
						  <div class="col-sm-110">
						  <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="tarea" readonly="" value="<?php echo utf8_decode($reg['servicio8'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Etiqueta 1</label>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly=""  name="valor1_s8" value="<?php echo utf8_decode($reg['etiqueta1_s8'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
						
                        <!--div class="form-group">
                           <label  class="col-sm-222 control-label">Etiqueta 2</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly=""   name="valor2_s8" value="<?php echo utf8_decode($reg['etiqueta2_s8'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Etiqueta 3</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly=""  name="valor3_s8" value="<?php echo utf8_decode($reg['etiqueta3_s8'])?>" >
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div-->
					
						
						<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
						
						<!--div class="form-group">
                          <label  class="col-sm-222 control-label">Servicio 9</label>
						  <div class="col-sm-110">
						  <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="tarea" readonly="" value="<?php echo utf8_decode($reg['servicio9'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Etiqueta 1</label>
						 
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly=""  name="valor1_s9" value="<?php echo utf8_decode($reg['etiqueta1_s9'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
						

                        <div class="form-group">
                           <label  class="col-sm-222 control-label">Etiqueta 2</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly=""  name="valor2_s9" value="<?php echo utf8_decode($reg['etiqueta2_s9'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Etiqueta 3</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly=""  name="valor3_s9" value="<?php echo utf8_decode($reg['etiqueta3_s9'])?>" >
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div-->
						
			</fieldset>		
</form>			
                    <br>
            
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