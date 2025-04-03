<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 12/2020 v1
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesi贸n o reanudar la existente.
    session_start();
	 if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="devecchi"){ 
?>
<!DOCTYPE html>
<?php include "./inc/links.php"; ?> 
<html >
<head><meta charset="gb18030">
  
  <title>Key</title>
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
        <a href="inicio_dvi_user.php">
          <i class="fa fa-grav"></i>
          Inicio
        </a>
      </li>
	  <li>
        <a href="seccion.php">
          <i class="fa fa-wrench"></i>
        Servicio
        </a>
      </li>
      <li>
        <a href="diario_servic_dvi.php">
          <i class="fa fa-calendar-check-o"></i>
        Diario
        </a>
      </li>	
      <li>
        <a href="menu_grafica_dvi.php">
          <i class="fa fa-line-chart"></i>
          Grafica
        </a>
      </li>
      <li class="active">
        <a href="key_dvi.php">
          <i class="fa fa-key"></i>
          Claves
        </a>
      </li>
    </ul>
  </nav>
 
  <div id="header_logo">
    <a href=""></a>
  </div>
</header>
<section id="content">
  	<!--************************************ Page content******************************-->
		<div class="container" style="width:1180px;">
          <div class="row">
            <div class="col-sm-12">
           <div class="page-header2">
				
                <h1 class="animated lightSpeedIn">Doble Autenticacion</h1>
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
        <div class="panel-heading text-center"><strong></strong></div>
        <div class="panel-body">
            <form role="form" action="login_key.php" method="POST">
			
                        <div class="form-group">
              <label class="control-label"><i class="fa fa-envelope"></i>&nbsp;Correo</label>
              <input type="text" id="input_user" required="" class="form-control" name="usuario" placeholder="Introduzca su correo" required="">
              <div id="com_form"></div>
            </div>
            <div class="form-group">
              <label class="control-label"><i class="fa fa-key"></i>&nbsp;Password</label>
              <input type="password" id="input_user" required="" class="form-control" name="contrasena" placeholder="Introduzca su contrasena" required="">
              <div id="com_form"></div>
            </div>
						<div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" value="devecchi" checked>
                    Usuario devecchi
                </label>
             </div>
			
			 <br>
						<div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10 text-center">
                              <button type="submit" class="btn btn-info">Entrar</button>
                          </div>
                        </div>
          </form>

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