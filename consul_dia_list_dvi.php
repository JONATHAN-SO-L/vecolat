<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
	 if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="devecchi"){ 
?>
<!DOCTYPE html>
<?php include "./inc/links.php"; ?> 
<html>
<head>
  <!--meta http-equiv="Content-type" content="text/html; charset=utf-8" /-->
  <meta charset="ISO-8859-1">
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
        <a href="seccion.php">
          <i class="fa fa-wrench"></i>
        Servicio
        </a>
      </li>
      <li class="active">
        <a href="diario_servic_dvi.php">
          <i class="fa fa-calendar-check-o"></i>
        Diario
        </a>
      </li>	
	  <li>
        <a href="menu_grafica_dvi.php">
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
		    <a href="consul_diario_dvi.php" ><button type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"></i>&nbsp;&nbsp;Regresar</button></a>
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
	$consulta = "SELECT * from diario_serv WHERE equipo = '$equipo' OR fecha_servicio BETWEEN '$fecha_i' AND '$fecha_f' order by fecha_servicio
	";
	$resultado = mysqli_query( $conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos");



ECHO "<table class='table table-hover table-striped table-bordered'><th>Acción</th><th>Equipo</th><th>Fecha de Servicio</th><th>Hora</th><th>Mes</th>";
while ($fila = mysqli_fetch_array( $resultado )){
	echo "<tr>";
      ?>
		<td class="text-center">
			<a href="consul_dia_ver.php?id=<?php echo $fila['id_diario']; ?>" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
		</td>
        <?php
		 " <TD>".utf8_decode($fila["id_diario"])."</TD>";
        ECHO " <TD>".utf8_decode($fila["equipo"])."</TD>";
        ECHO " <TD>".utf8_decode($fila["fecha_servicio"])."</TD>";
		ECHO " <TD>".utf8_decode($fila["hora"])."</TD>";
		ECHO " <TD>".utf8_decode($fila["mes"])."</TD>";
     
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
<script>
  $(document).ready(function(){
    $("button#save").click(function (){
       window.open ("./lib/pdf_dia_dvi.php?id="+$(this).attr("data-id"));
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