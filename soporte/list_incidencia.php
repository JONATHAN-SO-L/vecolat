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
<html>
<head>
  <!--meta http-equiv="Content-type" content="text/html; charset=utf-8" /-->
  <meta charset="ISO-8859-1">
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
  <script src="js/jquery-1.9.1.min.js"></script>
</head>
<style>
    .btn { 
        padding: 10px;
		}
		.btn-close {
    color: #fff;
    background-color: #8473e0;
    border-color: #6d4cae;
}
		table {
    background-color: #91bad152;
}		
@media (min-width: 1200px){
.container {
    width: 1900px;
}
}
	@media (min-width: 768px){
	.busc_dato{
    float: right;
    margin-right: -5%;
}
	}
</style>

  <body style="width: 2000px;">
    
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
	  <!--li>
        <a href="new_incidencia.php">
          <i class="fa fa-handshake-o"></i>
          Pru Incidencia
        </a>
      </li-->
	   <li  class="active">
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
  
  <table>
		    <a href="add_inc_tabla.php" ><button type="submit" value="Adicionar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-plus"></i>&nbsp;&nbsp;Adicionar</button></a>
			<td>
 <tr>
      <button onClick="document.location.reload();" type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Click Actualizar Datos" HSPACE="10" VSPACE="10"><i class="fa fa-refresh fa-spin  fa-fw"></i>
		<span class="sr-only">Loading...</span></button>
        </tr>
          </td>
       </table>
			<div class="container">
          <div class="row">
            <div class="col-sm-12">
           <div class="page-header2">
				
                <h1 class="animated lightSpeedIn">Incidencias</h1>
                <span class="label label-danger"></span> 		 
				<p class="pull-right text-primary"></p>
		   </div>
            </div>
          </div>
        </div>
		<!--************************************ Page content******************************-->
				<form style="float: left;" class="busc_dato" method="POST" action="list_incidencia.php" onSubmit="return validarForm(this)">
				<input type="text" id="busqueda" />
				<div id="resultado"></div>
				</form>
				
				<div id="datos"></div>
				
<script>
$(document).ready(function(){
                                
        var consulta;
                                                                          
         //hacemos focus al campo de búsqueda
        $("#busqueda").focus();
                                                                                                    
        //comprobamos si se pulsa una tecla
        $("#busqueda").keyup(function(e){
                                     
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#busqueda").val();
                                                                           
              //hace la búsqueda
                                                                                  
              $.ajax({
                    type: "POST",
                    url: "buscar_inc.php",
                    data: "bus_inc="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                          //imagen de carga
                          $("#resultado").html("<p align='center'><img src='ajax-loader.gif' /></p>");
                    },
                    error: function(){
                          alert("error petición ajax");
                    },
                    success: function(data){                                                    
                          $("#resultado").empty();
                          $("#resultado").append(data);
                                                             
                    }
              });
                                                                                  
                                                                           
        });
                                                                   
});
</script>
<div class="buscar_index">	
    <?php
	$usuario = "root";
	$password = "";
	$servidor = "localhost";
	$basededatos = "veco_sims_devecchi";
	
	// creación de la conexión a la base de datos con mysql_connect()
	$conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");
	$conexion ->set_charset('utf8');
	$conexion->query("SET NAMES UTF8");
    $conexion->query("SET CHARACTER SET utf8");
	
	// Selección de la base de datos
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
	// establecer y realizar consulta. guardamos en variable.
	$consulta = "SELECT * FROM ticket";
	$resultado = mysqli_query( $conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos");



ECHO "<table class='table table-hover table-striped table-bordered'><th>Acción</th><th>Id</th><th>Fecha Cración</th><th>Nombre Equipo</th><th>Serie</th><th>Estado</th><th>Usuario</th><th>Correo</th><th>Área</th><th>Ubicación</th><th>Asunto</th><th>Mensaje</th><th>Solución</th><th>Fecha Solución</th><th>Up_Time</th>";
while ($fila = mysqli_fetch_array( $resultado )){
	echo "<tr>";
      ?>
		<td class="text-center">
                <!--a href="#=<?php// echo $row['id']; ?>" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a-->
                    <a href="edit_inc_tabla.php?id=<?php echo $fila['id']; ?>" class="btn btn-sm btn-success" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					<a href="process_inc_tabla.php?id=<?php echo $fila['id']; ?>" class="btn btn-sm btn-warning" title="Proceso"><i class="fa fa-spinner" aria-hidden="true"></i></a>
					<a href="cerrar_inc_tabla.php?id=<?php echo $fila['id']; ?>" class="btn btn-sm btn-close" title="Cerrar Incidencia"><i class="fa fa fa-window-close-o" aria-hidden="true"></i></a>				    
					<a href="borrar_inc_tabla.php?id=<?php echo $fila['id']; ?>"class="btn btn-sm btn-danger" title="Borrar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
           	<a href="ver_inc_tabla.php?id=<?php echo $fila['id']; ?>" class="btn btn-info" title="Ver"><i class="fa fa-eye" aria-hidden="true"></i></a>
        </td>
        <?php
		ECHO " <TD>".utf8_encode($fila["id"])."</TD>";
        ECHO " <TD>".utf8_decode($fila["fecha"])."</TD>";
		ECHO " <TD>".utf8_encode($fila["num_equipo"])."</TD>";
		ECHO " <TD>".utf8_encode($fila["serie"])."</TD>";
        ECHO " <TD>".utf8_decode($fila["estado_ticket"])."</TD>";
        ECHO " <TD>".utf8_decode($fila["nombre_usuario"])."</TD>";	
        ECHO " <TD>".utf8_decode($fila["email_cliente"])."</TD>";	
        ECHO " <TD>".utf8_decode($fila["area"])."</TD>";	
        ECHO " <TD>".utf8_decode($fila["ubicacion"])."</TD>";	
        ECHO " <TD>".utf8_decode($fila["asunto"])."</TD>";	
        ECHO " <TD>".utf8_encode($fila["mensaje"])."</TD>";
		ECHO " <TD>".utf8_decode($fila["solucion"])."</TD>";
		ECHO " <TD>".utf8_decode($fila["fecha_solucion"])."</TD>";
		ECHO " <TD>".utf8_decode($fila["up_time"])."</TD>";		
			 
  echo "</tr>";
}
ECHO "</table>";

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$connect = mysqli_connect("localhost", "root", "", "veco_sims_devecchi");
$query = "SELECT * FROM ticket";
$result = mysqli_query($connect, $query);
	//////////////////////////////////////////////////////////////////////////////////////////////////7

while($reg = mysqli_fetch_array($result))
      {
		  ?>
	 <?php
      }
      ?>
     
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