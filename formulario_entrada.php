<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 03/2020 v1
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    //session_start();
	// if( $_SESSION['usuario']!="" && $_SESSION['contrasena']!="" && $_SESSION['tipo']=="user"){ 
?>
<!DOCTYPE html>
<?php include "./inc/links.php"; ?> 
<html >
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
    <a href="checador.php" ><button class="btn btn-success" title="Salir"><i class="fa fa-home"></i></button></a>
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
<section id="content" style="padding-top: 80px;">
  
  <header>
			<div class="alert alert-info">
			<center>
			<h2>REGISTRO DE ENTRADA</h2>
			</center>
			</div>
		</header>

<center>
	<form action="entrada.php" method="POST">


		<br/>
		
		<h4>Nombre Completo :&nbsp;</h4>
		<input class="balloon" type="text"  required="" name="nombre" placeholder="Nombre Completo..." value="" title="Escriba su nombre completo por favor" maxlength="45"/><br/><br/>
		<?php
				date_default_timezone_set('America/Mexico_City');
				setlocale(LC_TIME, 'spanish');
		?>
		<div class="form-group">
                          <center><h4  align="center" class="col-sm-222 control-label">Fecha   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hora</h4></center>
						  <div class="col-sm-110">
						    <center><font size=4 color="blue" class="col-sm-222 control-label"><?php echo date("Y-m-d");?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						  <font size=4 color="blue" class="col-sm-222 control-label"><?php echo strftime("%H:%M");?></font>
						  <font size=4 color="blue" class="col-sm-222 control-label"><?php echo date("a");?></font></center>
                          </div>
                        </div>
        <div class="form-group">
                            <h4  class="col-sm-222 control-label">Sistemas Funcionando Correctamente</h4>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="sis_func" required="">            
										<option value=""></option>                                      
                                        <option value="Si">Si</option>                               
                                <option value="No">No Comunicarse a sistemas@dvi.mx</option>  
                                      </select>
                                </div>
                            </div>
                        </div>            	
		<br/><br/>
		
		
		<input type="hidden" readonly="" name="hora" readonly="" value="<?php echo strftime("%H:%M");?>">
		<input type="hidden" readonly="" name="fecha" readonly="" value="<?php echo date("Y-m-d");?>">
		
		<div type="text" readonly required id="liveclock" ></div><br/><br/>		
		<input class="btn btn-success" type="submit" value="Aceptar" />		
		<input type="button" class="btn btn-danger" name="cancel" value="Cancelar" onClick="window.location='checador2.php';" />
		
	</form>

<br>



</center>

<footer></footer>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
</body>
</html>