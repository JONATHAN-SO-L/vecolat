<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
	 if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="user"){ 
?>
<!DOCTYPE html>
<?php include "./inc/links.php"; ?> 
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
  <!--meta http-equiv="Content-type" content="text/html; charset=utf-8" /-->
  
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
        <a href="inicio_user.php">
          <i class="fa fa-cogs"></i>
        Consulta
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
<section id="content" style="width:1200px;">	 
  <header id="content-header">
  
		  <table>  
    <td>
		<tr>
       <a href="menu_grafica_user.php" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
	   </tr>
	</td>
	   </table>
  
				<!--************************************ Page content******************************-->
		<div class="container" style="width:1180px;">
          <div class="row">
            <div class="col-sm-12">
           <div class="page-header2">
                <h1 class="animated lightSpeedIn" style="color: #165892;">Gr&#225;ficas Mensuales</h1>
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

<section class="content">
<table>
				<div class="col-lg-3 col-xs-6">
<a class="button" href="consul_grafxetapa_user.php" style="width: 234px;margin-left: 40px;">
	<center>Etapa 1</center>
	<div class="button__horizontal" ></div>
	<div class="button__vertical" ></div>
</div><!-- ./col -->
</a>
<td>
						<tr>
						    <div class="col-lg-3 col-xs-6">
<a class="button" href="consul_grafxetapa2_user.php" style="width: 234px;margin-left: 40px;">
	<center>Etapa 2</center>
	<div class="button__horizontal"></div>
	<div class="button__vertical"></div>
</a>
	</div>
 <br>
 <br>
 <br>
 <br>
 </table>
 <table>
				<div class="col-lg-3 col-xs-6">
<a class="button" href="consul_grafxetapa3_user.php" style="width: 234px;margin-left: 40px;">
	<center>Etapa 3</center>
	<div class="button__horizontal"></div>
	<div class="button__vertical"></div>
</div>
</a>
<td>
						<tr>
						    <div class="col-lg-3 col-xs-6">
<a class="button" href="consul_grafxetapa4_user.php" style="width: 234px;margin-left: 40px;">
	<center>Etapa 4</center>
	<div class="button__horizontal"></div>
	<div class="button__vertical"></div>
</a>
	</div>
	<br>
 <br>
 <br>
 <br>
 </table>
<table>
				<div class="col-lg-3 col-xs-6">
<a class="button" href="consul_grafica_user.php" style="width: 234px;margin-left: 40px;">
	<center>Down Time</center>
	<div class="button__horizontal"></div>
	<div class="button__vertical"></div>
	</div>
</a>
<td>
						<tr>
						    <div class="col-lg-3 col-xs-6">
<a class="button" href="consul_moto_user.php" style="width: 234px;margin-left: 40px;">
	<center>Motoventilador</center>
	<div class="button__horizontal"></div>
	<div class="button__vertical"></div>
</a>
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