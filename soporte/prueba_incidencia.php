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
  <title>Incidencia</title>
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
   .col-sm-6 {
    width: 50%;
}

  @media (max-width: 900px){
#content {
    padding: 130px 30px 30px 30px;
}
.col-sm-6 {
    width: 90%;
}
  }
 
</style>

<header id="content-header">

<div class="container">
  

  <div class="row">
    <div class="col-sm-6">
      <div class="panel panel-info">
        <div class="panel-heading text-center"><i class="fa fa-file-text"></i>&nbsp;<strong>Nueva Incidencia</strong></div>
        <div class="panel-body text-center">
          <img src="./img/new_ticket.png" alt="">
          <h4>Crear una nueva incidencia</h4>
          <p class="text-justify">Si tienes un problema con cualquiera de nuestros equipos reportalo creando una incidencia y te ayudaremos a solucionarlo.O si desea actualizar una incidencia utiliza el formulario de la derecha <em>Comprobar estado de Incidencia</em>, solamente los <strong>usuarios registrados</strong> pueden crear una incidencia.</p>
          <p>Para crear una <strong>incidencia</strong> has click en el siguiente boton</p>
          <a type="button" class="btn btn-info" href="new_incidencia.php">Nueva Incidencia</a>
		  
        </div>
      </div>
    </div><!--fin col-md-6-->
    
    
  </div><!--fin row 2-->
</div><!--fin container-->


<!--div class="row">
    <div class="col-sm-6">
      <div class="panel panel-info">
        <div class="panel-heading text-center"><i class="fa fa-file-text"></i>&nbsp;<strong>Nueva Incidencia</strong></div>
        <div class="panel-body text-center">
          <img src="./img/new_ticket.png" alt="">
          <h4>Crear una nueva incidencia</h4>
          <p class="text-justify">Si tienes un problema con cualquiera de nuestros equipos reportalo creando una incidencia y te ayudaremos a solucionarlo.O si desea actualizar una incidencia utiliza el formulario de la derecha <em>Comprobar estado de Incidencia</em>, solamente los <strong>usuarios registrados</strong> pueden crear una incidencia.</p>
          <p>Para crear una <strong>incidencia</strong> has click en el siguiente boton</p>
          <a type="button" class="btn btn-info" href="new_incidencia.php">Nueva Incidencia</a>
		  <div class="col-sm-6">
                                   <a href="prueba_incidencia.php" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
                              </div>
        </div>
      </div>
    </div><!--fin col-md>
    
    <div class="col-sm-6">
      <div class="panel panel-danger">
        <div class="panel-heading text-center"><i class="fa fa-link"></i>&nbsp;<strong>Comprobar estado de la Incidencia</strong></div>
        <div class="panel-body text-center">
          <img src="./img/old_ticket.png" alt="">
          <h4>Colsultar estado de Incidencia</h4>
          <form class="form-horizontal" role="form" method="GET" action="process_inc.php">
            <input type="hidden" name="view" value="ticketcon">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                  <input type="email" class="form-control" name="email_consul" placeholder="Email" required="">
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-2 control-label">ID Incidencia</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="id_consul" placeholder="ID Incidencia" required="">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Colsultar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div><!--fin col-md-6>
  </div><!--fin row 2-->
<?php
}
?>
<footer></footer>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
</body>
</html>