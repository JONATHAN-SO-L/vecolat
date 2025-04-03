<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 03/2020 v2
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
	 if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="user"){ 
?>
<!DOCTYPE html>
<?php include "./inc/links.php"; ?> 
<html >
<head><meta charset="gb18030">
  
  <title>Grafica</title>
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
    width: 50%;
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
        <a href="inicio_user.php">
          <i class="fa fa-cogs"></i>
        Consulta
        </a>
      </li> 
      <li>
        <a href="consul_diario_user.php">
          <i class="fa fa-pencil-square"></i>
        Diario
        </a>
      </li>
	  <li  class="active">
        <a href="menu_grafica_user.php">
          <i class="fa fa-line-chart"></i>
          Grafica
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


		

<style>
.page-header{
display:none;
}


.button {
	
	--offset: 10px;
	--border-size: 2px;
	
	display: block;
	position: relative;
	padding: 1.5em 3em;
	appearance: none;
	border: 0;
	background: #35495d;
	color: #3fb5ef;
	text-transform: uppercase;
	letter-spacing: .25em;
	outline: none;
	cursor: pointer;
	font-weight: bold;
	border-radius: 0;
	box-shadow: inset 0 0 0 var(--border-size) currentcolor;
	transition: background .8s ease;
	
	&:hover {
		background: rgba(100, 0, 0, .03);
	}
	
	&__horizontal,
	&__vertical {
		position: absolute;
		top: var(--horizontal-offset, 0);
		right: var(--vertical-offset, 0);
		bottom: var(--horizontal-offset, 0);
		left: var(--vertical-offset, 0);
		transition: transform .8s ease;
		will-change: transform;
		
		&::before {
			content: '';
			position: absolute;
			border: inherit;
		}
	}
	
	&__horizontal {
		--vertical-offset: calc(var(--offset) * -1);
		border-top: var(--border-size) solid currentcolor;
		border-bottom: var(--border-size) solid currentcolor;
		
		&::before {
			top: calc(var(--vertical-offset) - var(--border-size));
			bottom: calc(var(--vertical-offset) - var(--border-size));
			left: calc(var(--vertical-offset) * -1);
			right: calc(var(--vertical-offset) * -1);
		}
	}
	
	&:hover &__horizontal {
		transform: scaleX(0);
	}
	
	&__vertical {
		--horizontal-offset: calc(var(--offset) * -1);
		border-left: var(--border-size) solid currentcolor;
		border-right: var(--border-size) solid currentcolor;
		
		&::before {
			top: calc(var(--horizontal-offset) * -1);
			bottom: calc(var(--horizontal-offset) * -1);
			left: calc(var(--horizontal-offset) - var(--border-size));
			right: calc(var(--horizontal-offset) - var(--border-size));
		}
	}
	
	&:hover &__vertical {
		transform: scaleY(0);
	}
	
}
</style>


<a class="button" href="g_dia_variador_user.php" style="width: 254px;margin-left: 40px;">
	<center>Datos Variador</center>
	<div class="button__horizontal"></div>
	<div class="button__vertical"></div>
</a>
<br>
<a class="button" href="g_dia_estatica_user.php" style="width: 254px;margin-left: 40px;">
	<center>Caida Presion Estatica</center>
	<div class="button__horizontal"></div>
	<div class="button__vertical"></div>
</a>
<br>
<a class="button" href="g_dia_electrico_amp_user.php" style="width: 254px;margin-left: 40px;">
	<center>Electrico Aperaje</center>
	<div class="button__horizontal"></div>
	<div class="button__vertical"></div>
</a>
<br>
<a class="button" href="g_dia_electrico_vol_user.php" style="width: 254px;margin-left: 40px;">
	<center>Electrico voltaje</center>
	<div class="button__horizontal"></div>
	<div class="button__vertical"></div>
</a>
<br>
<a class="button" href="g_dia_aah_user.php" style="width: 254px;margin-left: 40px;">
	<center>Serp. Agua Helada A.A.H</center>
	<div class="button__horizontal"></div>
	<div class="button__vertical"></div>
</a>
<br>
<a class="button" href="g_dia_rah_user.php" style="width: 254px;margin-left: 40px;">
	<center>Serp. Agua Helada R.A.H</center>
	<div class="button__horizontal"></div>
	<div class="button__vertical"></div>
</a>
<br>
<a class="button" href="g_dia_aac_user.php" style="width: 254px;margin-left: 40px;">
	<center>Serp. Agua Caliente A.A.C</center>
	<div class="button__horizontal"></div>
	<div class="button__vertical"></div>
</a>
<br>
<a class="button" href="g_dia_rac_user.php" style="width: 254px;margin-left: 40px;">
	<center>Serp. Agua Caliente R.A.C</center>
	<div class="button__horizontal"></div>
	<div class="button__vertical"></div>
</a>



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