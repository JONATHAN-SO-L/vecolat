<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 03/2020 v1
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
	// if( $_SESSION['usuario']!="" && $_SESSION['contrasena']!="" && $_SESSION['tipo']=="user"){ 
?>
<!DOCTYPE html>
<?php include "./inc/links.php"; ?> 
<!--html >
<head><meta charset="gb18030">
  
  <title>Checador</title>
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
   <link rel="stylesheet" href="css/ingr.css">
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
      	<img src="img/veco.png"/>
      </div>
      <a href="#" id="profile-link"><h4>&nbsp;&nbsp;&nbsp;<?php// echo $_SESSION['nombre']; ?></h4>
    </div>
    <div id="account-actions">
    <a href="checador.php" ><button class="btn btn-success" title="salir"><i class="fa fa-home"></i></button></a>
        </div>
       
   <ul id="main-nav">
      
	  <li class="active">
        <a href="checador2.php">
          <i class="fa fa-clock-o"></i>
          Checador
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
  	<div class="form-group">
  	    <?php
				date_default_timezone_set('America/Mexico_City');
				setlocale(LC_TIME, 'spanish');
		?>
                          <font size=6  class="col-sm-222 control-label"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hora</font>
						  <div class="col-sm-110">
						  <font size=4 color="blue" class="col-sm-222 control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("Y-m-d");?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						  <font size=4 color="blue" class="col-sm-222 control-label"><?php// echo strftime("%H:%M");?></font>
						  <font size=4 color="blue" class="col-sm-222 control-label"><?php// echo date("a");?></font>
                          </div>
                        </div>
                        
  <div class="tablon" style="margin-top: 20px;">

<table valign="center" width="" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;">
    <tr>
      <td align="center" valign="top" class="cgan">
      <a href="formulario_entrada.php">
        <p class="txt2">ENTRADA</p></a>
      </td>
      <!--td align="center" valign="top" class="cgan">
      <a href="comida.php"><img src="comida.jpg"></a>
        <p class="txt2">REFRIGERIO</p>
      </td-->
      <!--td align="center" valign="top" class="cgan">
      <a href="formulario_salida.php">
        <p class="txt2">SALIDA</p></a>
      </td>
    </tr>
</table>

<table width="270" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
  <tr>
    <td height="20"></td>
  </tr>
</table>

</div-->
  
    <?php
	
?>
 <?php
//}else{
	//header('Location: index.php');
//}
?>
 <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                             <center><img src="./img/altoveco.png" alt="Image" class="img-responsive"/></center>
                            
                        </div>
                        <div class="col-sm-7 text-center">
                             <center><h1 class="text-danger"><font color="navy">Lo sentimos, Apartir del Lunes 01 de Marzo ya no podras checar aqui</font></h1></center>
                            <center><h3 class="text-info"><font color="navy">El nuevo checador lo encuentras en el Portal Devinsa</font></h3></center>
                            <center><h3 class="text-info"><font color="teal">(www.veco.lat/soporte.php)</font></h3></center>
                        </div>
                        <div class="col-sm-1">&nbsp;</div>
                    </div>
                </div>
<footer></footer>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
</body>
</html>