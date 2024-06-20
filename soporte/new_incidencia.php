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
<head>
  <meta charset="UTF-8">
  <title>Nueva Incidencia</title>
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
		.btno { 
        padding: 30px;
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
      	<img src="img/owl.jpg"/>
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
        <a href="area.php">
          <i class="fa fa-rss-square"></i>
          Área
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
        <a href="seccion.php">
          <i class="fa fa-pie-chart"></i>
        Sección
        </a>
      </li>
	  <li>
        <a href="componente.php">
          <i class="fa fa-codepen"></i>
        Componente
        </a>
      </li>
	   <li>
        <a href="instrumento.php">
          <i class="fa fa-tachometer"></i>
        Instrumento
        </a>
      </li>
	  <li>
        <a href="tarea.php">
         <i class="fa fa-cogs"></i>
          Servicio
        </a>
      </li>
	  <li>
        <a href="./index.php?view=soporte">
          <i class="fa fa-file-archive-o"></i>
        Incidencia
        </a>
      </li>
        <li>
        <a href="tabla_usuarios.php">
          <i class="fa fa-user"></i>
          Usuario
        </a>
		 </li>
	  <li class="active">
        <a href="new_incidencia.php">
          <i class="fa fa-handshake-o"></i>
          Pru Incidencia
        </a>
      </li>
	   <li>
        <a href="list_incidencia.php">
          <i class="fa fa-list"></i>
          Lista Incidencia
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
	
<div class="container">
          <div class="row">
            <div class="col-sm-12">
           <div class="page-header2">
		   <div class="col-sm-2">
	</div>
<a class="boton_personalizado" href="new_incidencia.php"><i class="fa fa-pencil"></i></a><strong>&nbsp;&nbsp;&nbsp;&nbsp;Apertura</strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="boton_personalizado" href="proceso_incidencia.php"><i class="fa fa-pencil"></i></a><strong>&nbsp;&nbsp;&nbsp;&nbsp;Proceso</strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="boton_personalizado" href="cierre_incidencia.php"><i class="fa fa-pencil"></i></a><strong>&nbsp;&nbsp;&nbsp;&nbsp;Cierre</strong>

				</div>
            </div>
          </div>
        </div>
		
		
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
           <div class="page-header2">
				
                <h1 class="animated lightSpeedIn">Apertura</h1>
                <span class="label label-danger"></span> 		 
				<p class="pull-right text-primary"></p>
		   </div>
            </div>
          </div>
        </div>
<style type="text/css">
  .boton_personalizado{
    text-decoration: none;
    padding: 10px;
    font-weight: 600;
    font-size: 20px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 26px;
    border: 2px solid #0016b0;
  }

.col-sm-9 {
    width: 60%;
}
.col-sm-8 {
    width: 90%;
}
.col-sm-offset-2 {
    margin-left: 43%;
}
.col-sm-offset-21 {
    margin-left: 70%;
}
@media (max-width: 900px){
#content {
    padding: 130px 30px 30px 30px;
}
#content-header {
    width: calc(100% + 500px);
    height: 193px;
    margin: -30px 0 0 -30px;
    background: white;
    padding: 30px;
}
}
</style>

<?php
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include("class_mysql.php");
include ("conexi.php");
if(isset($_POST['fecha_ticket']) && isset($_POST['name_ticket'])){

          $codigo = ""; 
          $longitud = 2; 
          for ($i=1; $i<=$longitud; $i++){ 
            $numero = rand(0,9); 
            $codigo .= $numero; 
          } 
          $num=Mysql::consulta("SELECT * FROM ticket");
          $numero_filas = mysqli_num_rows($num);

          $numero_filas_total=$numero_filas+1;
          $id_ticket="TK".$codigo."N".$numero_filas_total;
		  
		  
		  	$estado_ticket="Pendiente";
		
        	if(isset($_POST['fecha_ticket'])){
			$fecha_ticket= $_POST['fecha_ticket'];
		}else{
			$fecha_ticket="";
		}
		if(isset($_POST['equipo_ticket'])){
			$equipo_ticket= $_POST['equipo_ticket'];
		}else{
			$equipo_ticket="";
		}
		if(isset($_POST['name_ticket'])){
			$name_ticket= $_POST['name_ticket'];
		}else{
			$name_ticket="";
		}
		if(isset($_POST['email_ticket'])){
			$email_ticket= $_POST['email_ticket'];
		}else{
			$email_ticket="";
		}
		if(isset($_POST['area_ticket'])){
			$area_ticket= $_POST['area_ticket'];
		}else{
			$area_ticket="";
		}
		if(isset($_POST['ubicacion_ticket'])){
			$ubicacion_ticket= $_POST['ubicacion_ticket'];
		}else{
			$ubicacion_ticket="";
		}
		if(isset($_POST['asunto_ticket'])){
			$asunto_ticket= $_POST['asunto_ticket'];
		}else{
			$asunto_ticket="";
		}
		if(isset($_POST['mensaje_ticket'])){
			$mensaje_ticket= $_POST['mensaje_ticket'];
		}else{
			$mensaje_ticket="";
		}
		$con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("INSERT INTO ticket(fecha, num_equipo,serie, estado_ticket, nombre_usuario, email_cliente, area, ubicacion, asunto, mensaje)VALUES('$fecha_ticket','$equipo_ticket','$id_ticket','$estado_ticket','$name_ticket','$email_ticket','$area_ticket','$ubicacion_ticket','$asunto_ticket','$mensaje_ticket')"))){
		
		
            echo '
               <script language="javascript">
                       alert(" Incidencia creada con exito '.$_SESSION['nombre'].'<br>La Incidencia ID es: <strong>'.$id_ticket.'</strong>");                   
				window.location.href="process_inc.php"</script>';

          }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido crear la incidencia. Por favor intente nuevamente.
                    </p>
                </div>
            ';
		  }
 }
 
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////	  
?>
        <div class="container">
          <!--div class="row well" style="width: 924px;">
            <div class="col-sm-3">
              <img src="img/ticket.png" class="img-responsive" alt="Image">
            </div>
            <div class="col-sm-9 lead">
              <h3 class="text-info">¿Cómo abrir una nueva incidencia?</h3>
              <p>Para abrir una incidencia deberá de llenar todos los campos de el siguiente formulario. Usted podra verificar el estado de su incidencia mediante la <strong>Incidencia ID</strong> que se le proporcionara a usted cuando llene y nos envie el siguiente formulario.</p>
            </div>
          </div><!--fin row 1-->

          <div class="row" style="width: 800px;">
            <div class="col-sm-12">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title text-center"><strong><i class="fa fa-ticket"></i>&nbsp;&nbsp;&nbsp;Incidencia</strong></h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                   
                    <div class="col-sm-8">
                      <form class="form-horizontal" role="form" action="" method="POST">
                          <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Fecha</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
								<input class="form-control" type="date" name="fecha_ticket" step="3" value="<?php echo date("Y-m-d");?>">
                                    <!--input class="form-control" type="text" id="fechainput" placeholder="Fecha" name="fecha_ticket" required="" readonly-->
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Usuario</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <input type="text" class="form-control" placeholder="Nombre" required="" pattern="[a-zA-Z ]{1,30}" name="name_ticket" title="Nombre Apellido">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email_ticket" required="" title="Ejemplo@dominio.com">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-2 control-label">Equipo</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <input type="text" class="form-control" placeholder="Equipo" required="" name="equipo_ticket" title="Nombre Equipo">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Área</label>
						  <div class="col-sm-10">
                              <div class='input-group'>
						  <select class="form-control" name="area_ticket">  
							  <?php
							  $connect = mysqli_connect("localhost", "root", "", "veco_sims_devecchi");
							$query = "SELECT * FROM area";
							$result = mysqli_query($connect, $query);
							   ?>
							  <?php foreach($result as $opciones){ ?> 
							  <option value="<?php echo utf8_encode($opciones['area'])?>"><?php echo utf8_decode($opciones['area'])?></option>
							  <?php } ?>
							  </select>
							   <span class="input-group-addon"><i class="fa fa-users"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-2 control-label">Ubicación</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                               <select class="form-control" name="ubicacion_ticket">  
							  <?php
							  $connect = mysqli_connect("localhost", "root", "", "veco_sims_devecchi");
							$query = "SELECT * FROM ubicacion";
							$result = mysqli_query($connect, $query);
							   ?>
							  <?php foreach($result as $opciones){ ?> 
							  <option value="<?php echo utf8_encode($opciones['ubicacion'])?>"><?php echo utf8_decode($opciones['ubicacion'])?></option>
							  <?php } ?>
							  </select>
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Asunto</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <input type="text" class="form-control" placeholder="Asunto" name="asunto_ticket" required="">
                                <span class="input-group-addon"><i class="fa fa-paperclip"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Problema de su producto</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Escriba el problema que presenta su producto" name="mensaje_ticket" required=""></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-info">Crear Incidencia</button>
                
							  </div>
							   </div>
                            
                      </form>
					  
							    </fieldset> 
					  <!--div class="col-sm-6">
					  <div class="col-sm-offset-21 col-sm-10">
                                   <a href="prueba_incidencia.php" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center; width: 100%;"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
                              </div>
							   </div-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>		
<?php
}
?>
<script type="text/javascript">
  $(document).ready(function(){
      $("#fechainput").datepicker();
  });
</script>