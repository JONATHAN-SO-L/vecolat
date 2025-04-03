<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 03/2020 v1
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
	// if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="admin"){ 
?>
<!DOCTYPE html>
<?php include "./inc/links.php"; ?> 
<html >
<head><meta charset="gb18030">
  
  <title>Usuario</title>
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
		busc_dato{
			text-align:re
		}
		table {
    background-color: #91bad152;
}
.boton_personalizado{
    text-decoration: none;
    padding: 10px;
    font-weight: 600;
    font-size: 20px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 26px;
    border: 2px solid #0016b0;
  }
   .col-sm-6 {
    width: 50%;
}

  @media (max-width: 900px){
#content {
    padding: 130px 30px 30px 30px;
}
.col-sm-6 {
    width: 90%;
}
  }
  @media (min-width: 1200px){
.container {
    width: 1320px;
}
  } 
   .btn { 
        padding: 10px;
		}
		.btno { 
        padding: 30px;
		}
		
    .btn { 
        padding: 10px;
		}
		busc_dato{
			text-align:re
		}
		table {
    background-color: #91bad152;
}
.boton_personalizado{
    text-decoration: none;
    padding: 10px;
    font-weight: 600;
    font-size: 20px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 26px;
    border: 2px solid #0016b0;
  }
   .col-sm-6 {
    width: 50%;
}

  @media (max-width: 900px){
#content {
    padding: 130px 30px 30px 30px;
}
.col-sm-6 {
    width: 90%;
}
  }
  @media (min-width: 1200px){
.container {
    width: 1320px;
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
      	<img src="img/veco.png"/>
      </div>
      <a href="#" id="profile-link"><h4>&nbsp;&nbsp;&nbsp;<?php //echo $_SESSION['nombre']; ?></h4>
    </div>
    <div id="account-actions">
    <a href="checador.php" ><button class="btn btn-success" title="Salir"><i class="fa fa-home"></i></button></a>
        </div>
       
    <ul id="main-nav">
      <li>
        <a href="inicio_admin.php">
          <i class="fa fa-pencil-square"></i>
          Inicio
        </a>
      </li>
	  <li>
        <a href="checador2.php">
          <i class="fa fa-clock-o"></i>
          Checador
        </a>
      </li>
	 <li class="active">
        <a href="usuarios.php">
          <i class="fa fa-user"></i>
        Usuarios
        </a>
      </li>
      <li>
        <a href="reporteChecador.php">
          <i class="fa fa-file-excel-o"></i>
        Reporte
        </a>
      </li>
	   </ul>
  </nav>
 
  <div id="header_logo">
    <a href=""></a>
  </div>
</header>
<section id="content" style="padding-top: 100px;">
 <div class="container">
          <div class="row">
            <div class="col-sm-12">
           <div class="page-header2">
<a class="boton_personalizado" href="usuarios.php"><i class="fa fa-pencil"></i></a><strong>&nbsp;&nbsp;&nbsp;&nbsp;Usuario Veco</strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="boton_personalizado" href="che_usuarios.php"><i class="fa fa-pencil"></i></a><strong>&nbsp;&nbsp;&nbsp;&nbsp;Checador</strong>

				</div>
            </div>
          </div>
        </div>
  <br>
  <table>
  <td>
  <tr>
		    <a href="add_usuario_veco.php" ><button type="submit" value="Adicionar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-plus"></i>&nbsp;&nbsp;Adicionar</button></a>
			<td>
 <tr>
      <button onClick="document.location.reload();" type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Click Actualizar Datos" HSPACE="10" VSPACE="10"><i class="fa fa-refresh fa-spin  fa-fw"></i>
<span class="sr-only">Loading...</span></button>
        </tr>
          </td>
			   
       </table>
		<!--************************************ Page content******************************-->
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Usuario</h1>
                <span class="label label-danger"></span>
                <p class="pull-right text-primary">
               </p>
              </div>
			 </div>
          </div>
        </div>
		<!--************************************ Page content******************************-->
		
		<div class="buscar_index">	
    <?php
	$usuario = "veco_dvi";
	$password = "Vec83Dv19iSa@";
	$servidor = "localhost";
	$basededatos = "veco_sims_devecchi";
	
	// creación de la conexión a la base de datos con mysql_connect()
	$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
	
	// Selección de la base de datos
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
	$consulta = "SELECT * from usuarios";
	
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	
ECHO "<table class='table table-hover table-striped table-bordered'><th>Accion</th><th>Id</th><th>Nombre Completo</th><th>Nombre Usuario</th><th>Clave</th><th>Email</th><th>IP</th>";
while ($fila = mysqli_fetch_array( $resultado )){
	echo "<tr>";
      ?>
		<td class="text-center">
                    <a href="edit_us_veco.php?id=<?php echo $fila['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					<!--a href="ver_usuario.php?id=<?php echo $fila['id']; ?>" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
					<a href="eliminar_usuario.php?id=<?php echo $fila['id']; ?>"class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a-->
        </td>
        <?php
		ECHO " <TD>".utf8_decode($fila["id"])."</TD>";
		ECHO " <TD>".utf8_encode($fila["nombre_comp"])."</TD>";
		ECHO " <TD>".utf8_decode($fila["usuario"])."</TD>";
		ECHO " <TD>".utf8_encode($fila["contrasena"])."</TD>";
		ECHO " <TD>".utf8_decode($fila["email"])."</TD>";
		ECHO " <TD>".utf8_decode($fila["ip"])."</TD>";
     
  echo "</tr>";
}
ECHO "</table>";

      ?>
     </div>
 <?php
//}else{
	//header('Location: index.php');
	// }
?>
<footer></footer>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
</body>
</html>