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
  <title>Área</title>
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
        <a href="ubicacion.php">
          <i class="fa fa-map-marker"></i>
          Ubicación
        </a>
      </li>
	   <li  class="active">
        <a href="area.php">
          <i class="fa fa-rss-square"></i>
          Área
        </a>
      </li>
      <li>
        <a href="equipo.php">
          <i class="fa fa-cubes"></i>
        Equipo
        </a>
      </li>
	  <li>
        <a href="tarea.php">
          <i class="fa fa-cogs"></i>
          Config
        </a>
      </li>
	  <li>
        <a href="seccion_admin.php">
          <i class="fa fa-wrench"></i>
        Servicio
        </a>
      </li>	
	  <li>
        <a href="tabla_servicios.php">
          <i class="fa fa-pencil-square-o"></i>
        Editar Servicio
        </a>
      </li>
		<li>
        <a href="diario_servic.php">
          <i class="fa fa-calendar-check-o"></i>
        Diario
        </a>
      </li>	
     <li>
        <a href="menu_grafica.php">
          <i class="fa fa-line-chart"></i>
          Grafica
        </a>
      </li>
        <li>
        <a href="tabla_usuarios.php">
          <i class="fa fa-user"></i>
          Usuario
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
		    <a href="add_area.php" ><button type="submit" value="Adicionar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-plus"></i>&nbsp;&nbsp;Adicionar</button></a>
			<td>
 <tr>
      <button onClick="document.location.reload();" type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Click Actualizar Datos" HSPACE="10" VSPACE="10"><i class="fa fa-refresh fa-spin  fa-fw"></i>
		<span class="sr-only">Loading...</span></button>
        </tr>
          </td>
       </table>
		<!--form style="float:right; margin-right: 25%;" class="busc_dato" method="POST" action="busquedaEmpresa.php" onSubmit="return validarForm(this)">
					 <input type="text" placeholder="Buscar por nombre o id" name="palabra">
					 <input type="submit" value="Buscar" name="buscar" class="btn btn-primary">
				</form-->
				<!--************************************ Page content******************************-->
		<div class="container" >
          <div class="row">
            <div class="col-sm-12">
           <div class="page-header2">
				
                <h1 class="animated lightSpeedIn">Área</h1>
                <span class="label label-danger"></span> 		 
				<p class="pull-right text-primary"></p>
		   </div>
            </div>
          </div>
        </div>
		<!--************************************ Page content******************************-->
				<form style="float: left; height: 35px;" class="busc_dato" method="POST" action="area.php" onSubmit="return validarForm(this)"><i class="fa fa-search" aria-hidden="true"></i>
				<input placeholder=" Id, Área o Prioridad" type="text" id="busqueda" />
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
                    url: "buscar_area.php",
                    data: "b="+consulta,
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
				
<div class="buscar_index" style="width: 1030px;">	
    <?php
	$usuario = "veco_dvi";
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

	$consulta = "SELECT * from area 
	inner join empresas on area.empresa_id=empresas.id
	inner join edificio on area.edificio_id=edificio.id_edificio
	";
	$resultado = mysqli_query( $conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos");



ECHO "<table class='table table-hover table-striped table-bordered'><th>Acción</th><th>ID</th><th>Empresa</th><th>Edificio</th><th>Descripción</th><th>Prioridad</th>";
while ($fila = mysqli_fetch_array( $resultado )){
	echo "<tr>";
      ?>
		<td class="text-center">
					<a href="edit_area.php?id=<?php echo $fila['id_area']; ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				    <!--a href="copy_area.php?id=<?php //echo $fila['id_area']; ?>"class="btn btn-sm btn-warning"><i class="fa fa-clone" aria-hidden="true"></i></a-->
					<a href="eliminar_area.php?id=<?php echo $fila['id_area']; ?>"class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
					<a href="ver_area.php?id=<?php echo $fila['id_area']; ?>" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
        </td>
        <?php
		ECHO " <TD>".utf8_decode($fila["id_area"])."</TD>";
        ECHO " <TD>".utf8_decode($fila["nombre_corto"])."</TD>";
        ECHO " <TD>".utf8_decode($fila["descripcion"])."</TD>";
		ECHO " <TD>".utf8_decode($fila["area"])."</TD>";
		ECHO " <TD>".utf8_decode($fila["prioridad"])."</TD>";
     
  echo "</tr>";
}
ECHO "</table>";

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$connect = mysqli_connect("localhost", "root", "", "veco_sims_devecchi");
$query = "SELECT * FROM area";
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