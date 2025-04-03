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
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <!--meta http-equiv="Content-type" content="text/html; charset=utf-8" /-->
  
  <title>Consulta</title>
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
	   <li>
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
	  <li  class="active">
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
		    <a href="seccion0_admin.php" ><button type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"></i>&nbsp;&nbsp;Regresar</button></a>
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
				
                <h1 class="animated lightSpeedIn">Consulta</h1>
                <span class="label label-danger"></span> 		 
				<p class="pull-right text-primary"></p>
		   </div>
            </div>
          </div>
        </div>
		<!--************************************ Page content******************************>
				<form style="float: left; height: 35px;" class="busc_dato" method="POST" action="ubicacion.php" onSubmit="return validarForm(this)"><i class="fa fa-search" aria-hidden="true"></i>
				<input placeholder=" Id o Descripción" type="text" id="busqueda" />
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
                    url: "buscar_ubicacion.php",
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
</script-->
				
<div class="buscar_index" style="width: 800px;">	
    <?php
	$usuario = "veco_dvi";
	$password = "Vec83Dv19iSa@";
	$servidor = "localhost";
	$basededatos = "veco_sims_devecchi";
	
	$equipo= $_POST['equipo_id'];
	$fecha_i= $_POST['fecha_i'];
	$fecha_f= $_POST['fecha_f'];
	
	// creación de la conexión a la base de datos con mysql_connect()
	$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
	$conexion ->set_charset('utf8');
	$conexion->query("SET NAMES UTF8");
    $conexion->query("SET CHARACTER SET utf8");
	
	// Selección de la base de datos
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
	// establecer y realizar consulta. guardamos en variable.
$consulta = "SELECT * from servicio2 WHERE equipo = '$equipo' OR fecha_servicio BETWEEN '$fecha_i' AND '$fecha_f' order by fecha_servicio
	";
	$resultado = mysqli_query( $conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos");



ECHO "<table class='table table-hover table-striped table-bordered'><th>Acción</th><th>Equipo</th><th>Fecha de Servicio</th><th>Hora</th><th>Mes</th>";
while ($fila = mysqli_fetch_array( $resultado )){
	echo "<tr>";
      ?>
	<td class="text-center">
			<button id="save" class="btn btn-success" data-id="<?php echo $fila['id_servicio']; ?>"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;PDF</button>
			<a href="servicios.php?id=<?php echo $fila['id_servicio']; ?>" class="btn btn-info" ><i class="fa fa-eye" aria-hidden="true"> Subir Doc</i></a>
			<?php
								$fecha_servicio = $fila['fecha_servicio'];
								$equipo = $fila['equipo'];
								$carpeta = $fila['carpeta'];
								
					$ruta = "files/servicio/$fecha_servicio/$equipo/$carpeta/doc/";
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/servicio/$fecha_servicio/$equipo/$carpeta/doc/$archivo' target='_blank' ><img src='./img/pdf.png' width='40' height='40'/>";
								}
						}
					}
		?>
					</td>
        <?php
		 " <TD>".utf8_decode($fila["id_servicio"])."</TD>";
        ECHO " <TD>".utf8_decode($fila["equipo"])."</TD>";
        ECHO " <TD>".utf8_decode($fila["fecha_servicio"])."</TD>";
		ECHO " <TD>".utf8_decode($fila["hora"])."</TD>";
		ECHO " <TD>".utf8_decode($fila["mes"])."</TD>";
     
  echo "</tr>";
}
ECHO "</table>";


		  ?>

    
</div>
 <?php
}else{
	header('Location: index.php');
}
?>
<script>
  $(document).ready(function(){
    $("button#save").click(function (){
       window.open ("./lib/pdf_admin.php?id="+$(this).attr("data-id"));
    });
  });
</script>
<footer></footer>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
	<script src="/devecchi/ejercicio/Resources/js/empresa.js"></script>
	<script src="/devecchi/ejercicio/Models/empresa.js"></script>
</body>
</html>