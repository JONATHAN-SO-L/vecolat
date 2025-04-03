<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 03/2020 v1
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesi贸n o reanudar la existente.
    session_start();
	// if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="admin"){ 
?>
<!DOCTYPE html>
<?php include "./inc/links.php"; ?> 
<html >
<head><meta charset="gb18030">
  
  <title>Usuario</title>
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
      	<img src="img/veco.png"/>
      </div>
      <a href="#" id="profile-link"><h4>&nbsp;&nbsp;&nbsp;<?php //echo $_SESSION['nombre']; ?></h4>
    </div>
    <div id="account-actions">
    <a href="checador.php" ><button class="btn btn-success" title="Salir"><i class="fa fa-home"></i></button></a>
        </div>
       
    <ul id="main-nav">
     
	  <li>
        <a href="checador2.php">
          <i class="fa fa-clock-o"></i>
          Checador
        </a>
      </li>
	
     <li  class="active">
        <a href="reporteChecador.php">
          <i class="fa fa-file-excel-o"></i>
        Reporte
        </a>
      </li>
	   </ul>
  </nav>
 
  <div id="header_logo">
    <a href=""></a>
  </div>
</header>
<section id="content" style="padding-top: 100px;">

  <br>
  <table>
      	<td>
      	  
 <tr>
     
</tr>
          </td>
			   
       </table>
		<!--************************************ Page content******************************-->
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Reporte En Excel</h1>
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
        <div class="panel-heading text-center"><strong>Introduzca de que fecha a que fecha requiere el Reporte de Checadas</strong></div>
        <div class="panel-body">
			
		  <form method="POST" class="form" action="reporteExcel.php">
                <input type="date" name="fecha1">
                <input type="date" name="fecha2">
                <input type="submit" name="generar_reporte">
           
			 </form>
        </div>
      </div>
    </div>
  </div>
</div>
		
<footer></footer>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
</body>
</html>