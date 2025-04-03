<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 05/2020 v1
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
	 if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="superoot"){ 
?>
<!DOCTYPE html>
<?php include "./inc/links.php"; ?> 
<html>
<head>
  <!--meta http-equiv="Content-type" content="text/html; charset=utf-8" /-->
  <meta charset="ISO-8859-1">
  <title>Tickets</title>
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
      <li  class="active">
        <a href="ticket.php">
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
        <a href="ticket_usuarios.php">
          <i class="fa fa-users"></i>
          Usuarios
        </a>
      </li>
      <li>
        <a href="ticket_admin.php">
          <i class="fa fa-user"></i>
          Administradores
        </a>
      </li>
      <li>
        <a href="ticket_root_config.php">
          <i class="fa fa-cogs"></i>
          Configuraci&#243;n
        </a>
      </li>
      <li>
        <a href="./soporte.php?view=registro">
          <i class="fa fa-users"></i>
          Registrar Usuario
        </a>
      </li>
      <li>
        <a href="ticket_add_equi.php">
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
</header>
<section id="content">  
		  <script type="text/javascript">
			  function validarForm(formulario)
			  {
				  if(formulario.palabra.value.length==0)
				  { //¿Tiene 0 caracteres?
					  formulario.palabra.focus();  // Damos el foco al control
					  alert('Debes rellenar este campo'); //Mostramos el mensaje
					  return false;
				   } //devolvemos el foco
				   return true;
			   }
		  </script>
  
				<!--************************************ Page content******************************-->
		<div class="container" >
          <div class="row">
            <div class="col-sm-12">
           <div class="page-header2">
				
                <h1 class="animated lightSpeedIn">Tickets Requisici&#243;n de Compra Oficina</h1>
                <span class="label label-danger"></span> 		 
				<p class="pull-right text-primary"></p>
		   </div>
            </div>
          </div>
        </div>
		<!--************************************ Page content******************************-->
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
           <div class="page-header2">
<a class="boton_personalizado" href="ticket.php"><i class="fa fa-pencil"></i></a><strong><a href="ticket.php">&nbsp;&nbsp;&nbsp;&nbsp;Todos </a></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="boton_personalizado" href="ticket_root_planta.php"><i class="fa fa-pencil"></i></a><strong><a href="ticket_root_planta.php">&nbsp;&nbsp;&nbsp;&nbsp;Planta </a></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="boton_personalizado" href="ticket_root_oficinas.php"><i class="fa fa-pencil"></i></a><strong><a href="ticket_root_oficinas.php">&nbsp;&nbsp;&nbsp;&nbsp;Oficinas</a></strong>

				</div>
            </div>
          </div>
        </div>
        <br>
        	<div class="container">
          <div class="row">
            <div class="col-sm-12">
           <div class="page-header2">
<a class="boton_personalizado" href="ticket_root_o_pendiente.php"><i class="fa fa-pencil"></i></a><strong><a href="ticket_root_o_pendiente.php">&nbsp;&nbsp;&nbsp;&nbsp;Pendientes </a></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="boton_personalizado" href="ticket_root_o_proceso.php"><i class="fa fa-pencil"></i></a><strong><a href="ticket_root_o_proceso.php">&nbsp;&nbsp;&nbsp;&nbsp;Proceso</a></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="boton_personalizado" href="ticket_root_o_repara.php"><i class="fa fa-pencil"></i></a><strong><a href="ticket_root_o_repara.php">&nbsp;&nbsp;&nbsp;&nbsp;Requisici&#243;n de Compra</a></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="boton_personalizado" href="ticket_root_o_garantia.php"><i class="fa fa-pencil"></i></a><strong><a href="ticket_root_o_garantia.php">&nbsp;&nbsp;&nbsp;&nbsp;Reparaci&#243;n en Garantia</a></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="boton_personalizado" href="ticket_root_o_resuelto.php"><i class="fa fa-pencil"></i></a><strong><a href="ticket_root_o_resuelto.php">&nbsp;&nbsp;&nbsp;&nbsp;Resueltos</a></strong>
				</div>
            </div>
          </div>
        </div>
        <br><br>	
<div class="buscar_index">	
    <?php
	$usuario = "veco";
	$password = "Vec83Dv19iSa@";
	$servidor = "localhost";
	$basededatos = "veco_sims_devecchi";
	
	// creación de la conexión a la base de datos con mysql_connect()
	$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
	$conexion ->set_charset('utf8');
	$conexion->query("SET NAMES UTF8");
    $conexion->query("SET CHARACTER SET utf8");
	
	// Selección de la base de datos
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
	// establecer y realizar consulta. guardamos en variable.
	//$consulta = "SELECT * FROM area";

	$consulta = "SELECT * from ticket where estado_ticket='Requisicion' AND ubicacion='Oficinas' ";
	$resultado = mysqli_query( $conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos");


ECHO "<table class='table table-hover table-striped table-bordered'><th>Acción</th><th>ID</th><th>Hora</th><th>Fecha</th><th>Usuario</th><th>Area</th><th>Equipo</th><th>Serie</th><th>Estado</th><th>Quien soluciona</th><th>Fecha Solucion</th>";
while ($fila = mysqli_fetch_array( $resultado )){
	echo "<tr>";
      ?>
		<td class="text-center">
					<a href="ticket_edit.php?id=<?php echo $fila['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					<a href="ticket_eliminar.php?id=<?php echo $fila['id']; ?>"class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
        </td>
        <?php
		ECHO " <TD>".utf8_decode($fila["id"])."</TD>";
        ECHO " <TD>".utf8_decode($fila["hora"])."</TD>";
        ECHO " <TD>".utf8_decode($fila["fecha"])."</TD>";
        ECHO " <TD>".utf8_decode($fila["nombre_usuario"])."</TD>";
        ECHO " <TD>".utf8_decode($fila["area"])."</TD>";
        ECHO " <TD>".utf8_decode($fila["equipo"])."</TD>";
        ECHO " <TD>".utf8_decode($fila["serie"])."</TD>";
		ECHO " <TD>".utf8_decode($fila["estado_ticket"])."</TD>";
		ECHO " <TD>".utf8_decode($fila["observaciones"])."</TD>";
        ECHO " <TD>".utf8_decode($fila["fecha_solucion"])."</TD>";
     
  echo "</tr>";
}
ECHO "</table>";


		  ?>
	
</div>
 <?php
}else{
	header('Location: soporte.php');
}
?>

<footer></footer>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
	<script src="/devecchi/ejercicio/Resources/js/empresa.js"></script>
	<script src="/devecchi/ejercicio/Models/empresa.js"></script>
</body>
</html>