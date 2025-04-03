<?php
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
	 if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="superoot"){
				 
?>
<!DOCTYPE html>
<?php include "./inc/links.php"; ?> 
<html >
<head>
  <meta charset="UTF-8">
  <title>Inicio</title>
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
		
		.bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
    background-color: #00c0ef !important;
}
.bg-green, .callout.callout-success, .alert-success, .label-success, .modal-success .modal-body {
    background-color: #00a65a !important;
}.bg-yellow, .callout.callout-warning, .alert-warning, .label-warning, .modal-warning .modal-body {
    background-color: #f39c12 !important;
}
.bg-red, .callout.callout-danger, .alert-danger, .alert-error, .label-danger, .modal-danger .modal-body {
    background-color: #dd4b39 !important;
}
.small-box>.inner {
    padding: 10px;
}
.bg-red, .bg-yellow, .bg-aqua, .bg-blue, .bg-light-blue, .bg-green, .bg-navy, .bg-teal, .bg-olive, .bg-lime, .bg-orange, .bg-fuchsia, .bg-purple, .bg-maroon, .bg-black, .bg-red-active, .bg-yellow-active, .bg-aqua-active, .bg-blue-active, .bg-light-blue-active, .bg-green-active, .bg-navy-active, .bg-teal-active, .bg-olive-active, .bg-lime-active, .bg-orange-active, .bg-fuchsia-active, .bg-purple-active, .bg-maroon-active, .bg-black-active, .callout.callout-danger, .callout.callout-warning, .callout.callout-info, .callout.callout-success, .alert-success, .alert-danger, .alert-error, .alert-warning, .alert-info, .label-danger, .label-info, .label-warning, .label-primary, .label-success, .modal-primary .modal-body, .modal-primary .modal-header, .modal-primary .modal-footer, .modal-warning .modal-body, .modal-warning .modal-header, .modal-warning .modal-footer, .modal-info .modal-body, .modal-info .modal-header, .modal-info .modal-footer, .modal-success .modal-body, .modal-success .modal-header, .modal-success .modal-footer, .modal-danger .modal-body, .modal-danger .modal-header, .modal-danger .modal-footer {
    color: #fff !important;
}
.small-box>.small-box-footer {
    position: relative;
    text-align: center;
    padding: 3px 0;
    color: #fff;
    color: rgba(255,255,255,0.8);
    display: block;
    z-index: 10;
    background: rgba(0,0,0,0.1);
    text-decoration: none;
}
.small-box h3 {
    font-size: 38px;
    font-weight: bold;
    margin: 0 0 10px 0;
    white-space: nowrap;
    padding: 0;
}

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
	@media all and (max-width:2400px){
  #main-header {
    left:0px;
  }
  body.open-menu {
    overflow-x:hidden;
    overflow-y:auto;
  }
  .open-menu #main-header {
    left:300px;
  }
 
  #menu-overlay {
    height:100%;
    position:fixed;
    top:0;
    right:0;
    left:100%;
    background:transparent;
    z-index:499;
  }
  .open-menu #menu-overlay {
    left:300px;
    background:rgba(255,255,255,.9);
  }
  #content {
    position:relative;
    left:0;
  }
  .open-menu #content {
    left:300px;
  }
  #sidenav {
    left:-300px;
  }
  .open-menu #sidenav {
    left:0;
  }
  #account-actions {
    left:0;
    top:100px;
    width:100%;
  }
  #menu-toggle {
    width:40px;
    height:40px;
    line-height:5px;
    border-radius:0 5px 5px 0;
    font-size:20px;
  }
  #main-header {
    position: fixed;
    height: 50px;
    box-shadow: 0 1px 0 #f1f1f1;
    background-color: #337ab7;
}
  .open-menu #menu-toggle {
    left:300px;
    color:#0f92d1;
  }
  #content {
    padding:10px 30px 30px 30px;
  }
  #main-nav {
    margin:1px 0 0 0;
  }
  #account-actions {
    padding:0px 0 0 25px;
    background:#337ab7;
    height:65px;
  }
  #account-actions a {
    color:#69c0ea;
  }
  #account-actions a:hover {
    color:white;
  }
  #content-header {
    width:calc(100% + 60px);
    height:193px;
    margin:-30px 0 0 -30px;
    background:white;
    padding:30px;
  }
  #tabs ul {
    width:calc(100% + 60px);
    margin:0 0 30px -30px;
  }
  #tabs li {
    margin:0 30px 0 0;
  }

  #tabs li:first-of-type {
    margin:0 30px 0 30px;
  }
  .tab-target {
    padding:0 50px 50px 50px;
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
      	<img src="img/root.png"/>
      </div>
       <a href="#" id="profile-link"><h4>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['nombre']; ?></h4>
    </div>
       
    <ul id="main-nav">
      <li>
        <a href="root.php?view=ticketroot">
          <i class="fa fa-envelope"></i>
          Tickets
        </a>
      </li>
      <li>
        <a href="ticket_mant.php">
          <i class="fa fa-wrench"></i>
          Mantenimientos
        </a>
      </li>
      <li>
        <a href="root.php?view=users">
          <i class="fa fa-users"></i>
          Todos los Usuarios
        </a>
      </li>
      <li>
        <a href="ticket_root_config.php">
          <i class="fa fa-cogs"></i>
          Configuracion
        </a>
      </li>
      <li>
        <a href="root.php?view=equipo">
          <i class="fa fa-desktop"></i>
          Equipos
        </a>
      </li>
      <li>
        <a href="ticket_preventivo.php">
          <i class="fa fa-calendar"></i>
          Soporte Preventivo
        </a>
      </li>
      <li>
        <a href="./process/logouti.php">
          <i class="fa fa-power-off"></i>
         Cerrar sesión
        </a>
      </li>
    </ul>
  </nav>
  <div id="header_logo">

    <a href=""></a>
  </div>
</header>
<section id="content">
  <header id="content-header" style="width: 1050px;">
  
  <table>
      
          
           </td>
       
       </table>
  <?php 
	$usuario = "veco_dvi";
	$password = "Vec83Dv19iSa@";
	$servidor = "localhost";
	$basededatos = "veco_sims_devecchi";
		  
	$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
	$conexion ->set_charset('utf8');
	$conexion->query("SET NAMES UTF8");
    $conexion->query("SET CHARACTER SET utf8");
	
	// Selección de la base de datos
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
		   
		   

    $count_files = mysqli_query($conexion, "select * from usuario_sop");
    $count_usuarios=mysqli_query($conexion, "select * from admin_soporte");
	$count_dvi=mysqli_query($conexion, "select * from ticket");
    $count_comments=mysqli_query($conexion, "select * from equipo");

?>

 <div class="content-wrapper" style="min-height: 292px;"><!-- Content Wrapper. Contains page content -->
        <section class="content-header"><!-- Content Header (Page header) -->
           <br>
		   <br>
		   <br>
        </section>
        <section class="content"><!-- Main content -->
            <div class="row" style="width: 1050px;"><!-- Small boxes (Stat box) -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo mysqli_num_rows($count_files); ?></h3>
                            <p>Usuarios</p>
                        </div>
                        <a href="root.php?view=users" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green"><!-- small box -->
                        <div class="inner">
                            <h3><?php echo mysqli_num_rows($count_usuarios); ?></h3>
                            <p>Administradores</p>
                        </div>
                        <a href="root.php?view=users" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
				
				
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow"><!-- small box -->
                        <div class="inner">
                            <h3><?php echo mysqli_num_rows($count_dvi); ?></h3>
                            <p>Tickets</p>
                        </div>
                        <a href="root.php?view=ticketroot" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
			
				
            </div><!-- /.row -->
            
        </section>
    </div><!-- /.content -->

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

<script>
    $(function(){
    $("input[name='file']").on("change", function(){
        var formData = new FormData($("#formulario")[0]);
        var ruta = "action/uploadprofile.php";
        $.ajax({
            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos)
            {
                $("#respuesta").html(datos);
            }
        });
    });
    });
</script>