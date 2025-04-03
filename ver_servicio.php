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
        <a href="seccion_admin.php">
          <i class="fa fa-wrench"></i>
        Servicio
        </a>
      </li>
	  <li class="active">
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
	$sql = Mysql::consulta("SELECT * FROM servicio2 WHERE id_servicio= '$id'");
	$registro=mysqli_fetch_array($sql, MYSQLI_ASSOC);

?>
					<form action="" method="POST" style="display: inline-block;">
	  <fieldset>
                		<div class="form-group">
                            <label class="col-sm-222 control-label">Id</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="id_edit" readonly=""  value="<?php echo $registro['id_servicio']?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Empresa</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="empresa_id" value="<?php echo utf8_decode($registro['empresa'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Edificio</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="edificio_id" value="<?php echo utf8_decode($registro['edificio'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Ubicación</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="edificio_id" value="<?php echo utf8_decode($registro['ubicacion'])?>">
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
                                <input type="text" class="form-control" readonly=""name="valor1" value="Inicial: <?php echo utf8_decode($registro['valor1'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
							  <div class='input-group'>
                                <input type="text" class="form-control" readonly=""name="valor2" value="Final: <?php echo utf8_decode($registro['valor2'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Cambio de Filtros</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input class="form-control" name="valor3" readonly="" value="<?php echo $registro['valor3']?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Limpieza</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input class="form-control" name="valor4" readonly="" value="<?php echo $registro['valor4']?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
                        
			  <br>
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
                                <input type="text" class="form-control" readonly="" name="valor1_s2" value="Inicial: <?php echo utf8_decode($registro['valor1_s2'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
							  <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="valor2_s2" value="Final: <?php echo utf8_decode($registro['valor2_s2'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Cambio de Filtros</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input class="form-control" name="valor3_s2" readonly="" value="<?php echo $registro['valor3_s2']?>">
								<span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Limpieza</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input class="form-control" name="valor4_s2" readonly="" value="<?php echo $registro['valor4_s2']?>">
									  <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
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
                                <input type="text" class="form-control" name="valor1_s3" readonly="" value="Inicial: <?php echo utf8_decode($registro['valor1_s3'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
							  <div class='input-group'>
                                <input type="text" class="form-control" name="valor2_s3" readonly="" value="Final: <?php echo utf8_decode($registro['valor2_s3'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Cambio de Filtros</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                    <input class="form-control" name="valor3_s3" readonly="" value="<?php echo $registro['valor3_s3']?>">
									  <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Amperaje de Alimentaci&#243;n previo al cambio</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L1-L2</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje1_s3" readonly="" value="<?php echo utf8_decode($registro['amperaje1_s3'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L2-L3</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje2_s3" readonly="" value="<?php echo utf8_decode($registro['amperaje2_s3'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L3-L1</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje3_s3" readonly="" value="<?php echo utf8_decode($registro['amperaje3_s3'])?>">
              </div>
              </div>
              <br>
						<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Amperaje de Alimentaci&#243;n despues del cambio</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L1-L2</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje4_s3" readonly="" value="<?php echo utf8_decode($registro['amperaje4_s3'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L2-L3</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje5_s3" readonly="" value="<?php echo utf8_decode($registro['amperaje5_s3'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L3-L1</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje6_s3" readonly="" value="<?php echo utf8_decode($registro['amperaje6_s3'])?>">
              </div>
              </div>              
						<br>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Limpieza</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input class="form-control" name="valor4_s3" readonly="" value="<?php echo $registro['valor4_s3']?>">
									  <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
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
                                <input type="text" class="form-control" readonly="" name="valor1_s4" value="Inicial: <?php echo utf8_decode($registro['valor1_s4'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
							  <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="valor2_s4" value="Final: <?php echo utf8_decode($registro['valor2_s4'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Cambio de Filtros</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input class="form-control" name="valor3_s4" readonly="" value="<?php echo $registro['valor3_s4']?>">
									  <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
				<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Amperaje de Alimentaci&#243;n previo al cambio</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L1-L2</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje1_s4" readonly="" value="<?php echo utf8_decode($registro['amperaje1_s4'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L2-L3</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje2_s4" readonly="" value="<?php echo utf8_decode($registro['amperaje2_s4'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L3-L1</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje3_s4" readonly="" value="<?php echo utf8_decode($registro['amperaje3_s4'])?>">
              </div>
              </div>
              <br>
						<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Amperaje de Alimentaci&#243;n despues del cambio</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L1-L2</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje4_s4" readonly="" value="<?php echo utf8_decode($registro['amperaje4_s4'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L2-L3</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje5_s4" readonly="" value="<?php echo utf8_decode($registro['amperaje5_s4'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L3-L1</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje6_s4" readonly="" value="<?php echo utf8_decode($registro['amperaje6_s4'])?>">
              </div>
              </div>              
						<br>		
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Limpieza</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input class="form-control" name="valor4_s4" readonly="" value="<?php echo $registro['valor4_s4']?>">
									  <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
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
                                <input type="text" class="form-control" name="valor1_s5" readonly="" value="<?php echo utf8_decode($registro['valor1_s5'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Lectura de Vibracion (Vertical)</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" name="valor2_s5" readonly="" value="<?php echo utf8_decode($registro['valor2_s5'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Lectura de Vibracion (Horizontal)</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" name="valor3_s5" readonly="" value="<?php echo utf8_decode($registro['valor3_s5'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Limpieza</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input class="form-control" name="valor4_s5" readonly="" value="<?php echo $registro['valor4_s5']?>">
								<span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Engrasado de Chumacera</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input class="form-control" name="valor5_s5" readonly="" value="<?php echo $registro['valor5_s5']?>">
								<span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Cambio de Bandas</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input class="form-control" name="valor6_s5" readonly="" value="<?php echo $registro['valor6_s5']?>">
								<span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
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
                                <input class="form-control" name="valor1_s6" readonly="" value="<?php echo $registro['valor1_s6']?>">
								<span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
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
                                    <input class="form-control" name="valor1_s8" readonly="" value="<?php echo $registro['valor1_s8']?>">
									  <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        	<div class="form-group">
                            <label class="col-sm-222 control-label">Observaciones</label>
                             <br>
                          <div class="col-sm-110">
						  <input type="text" class="form-control" name="observaciones" readonly="" value="<?php echo utf8_decode($registro['observaciones'])?>">
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
                  <input type="text" class="form-control" name="tempentrada" readonly="" value="<?php echo utf8_decode($registro['tempentrada'])?>">
              </div>
			  <label  class="col-sm-2 control-label">Salida: </label>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="tempsalida" readonly="" value="<?php echo utf8_decode($registro['tempsalida'])?>">
              </div>
			  
			<div class="form-group">
              <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Presi&#243;n</font>
              <div class="col-sm-2">
			  <div class="input-group">
                  <input type="text" class="form-control" name="tempresion" readonly="" value="<?php echo utf8_decode($registro['tempresion'])?>">
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
                  <input type="text" class="form-control" name="tempentrada2" readonly="" value="<?php echo utf8_decode($registro['tempentrada2'])?>">
              </div>
			  <label  class="col-sm-2 control-label">Salida</label>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="tempsalida2" readonly="" value="<?php echo utf8_decode($registro['tempsalida2'])?>">
              </div>
            </div>
			
			<div class="form-group">
              <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Presi&#243;n</font>
              <div class="col-sm-2">
			  <div class="input-group">
                  <input type="text" class="form-control" name="tempresion2" readonly="" value="<?php echo utf8_decode($registro['tempresion2'])?>">
              </div>
			  </div>
            </div>
			
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Valvulas y actuadores</font>
			  <br>
			<div class="form-group">
              <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Estado</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="estadoval" readonly="" value="<?php echo $registro['estadoval']?>">
				</div>
            </div>
			
			<div class="form-group">
              <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Modulaci&#243;n</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="tipomodulacion" readonly="" value="<?php echo $registro['tipomodulacion']?>">
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
                  <input type="text" class="form-control" name="estamanguera" readonly="" value="<?php echo $registro['estamanguera']?>">
              </div>
            </div>
			
			<br>
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Tornilleria</font>
			  <br>
              <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Completa</font>
              <div class="col-sm-2">
                  <input type="text"  class="form-control" name="tornilleria" readonly="" value="<?php echo $registro['tornilleria']?>">
              </div>
            </div>
			<br>
			
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Cableado de alimentaci&#243;n electrica</font>
			  <br>
			  <font size=3 color="blue" FACE="arial" class="col-sm-2 control-label">Estado de Conexi&#243;n</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="estacable" readonly="" value="<?php echo $registro['estacable']?>">
              </div>
            </div>
            <br>
            <br></br>
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Voltaje de Alimentaci&#243;n</font>
			  <br>
			  <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L1-L2</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje1_3" readonly="" value="<?php echo utf8_decode($registro['amperaje1_3'])?>">
              </div>
			  <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L2-L3</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje2_3" readonly="" value="<?php echo utf8_decode($registro['amperaje2_3'])?>">
              </div>
			  <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">L3-L1</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="amperaje3_3" readonly="" value="<?php echo utf8_decode($registro['amperaje3_3'])?>">
              </div>
            </div>
			<br>
			
						<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Variador</font>
			  <br>
			  <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Funcionamiento</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="funcionamiento" readonly="" value="<?php echo $registro['funcionamiento']?>">
              </div>
			  <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Tipo</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" name="tipovariador" readonly="" value="<?php echo $registro['tipovariador']?>">
              </div>
            </div>
			<br>
			<!--/////////////////////////////////////////////////////////-->
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Tiempo Fuera por operacion por Falla (Hrs)</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="valor_uptime" value="<?php echo utf8_decode($registro['valor_uptime'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
				</fieldset>								
						</form>
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