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
<html >
<head>
  <meta charset="UTF-8">
  <title>Busqueda de Empresa</title>
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
		table {
    background-color: #91bad152;
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
      <li  class="active">
        <a href="empresa.php">
          <i class="fa fa-hospital-o"></i>
        Empresa
        </a>
      </li>
      <li>
        <a href="umas.php">
          <i class="fa fa-cubes"></i>
        Equipo
        </a>
      </li>
	  <li>
        <a href="./index.php?view=soporte">
          <i class="fa fa-file-archive-o"></i>
        Incidencia
        </a>
      </li>
        <li>
        <a href="usuarios.php">
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
   <H1>Resultados de búsqueda</H1>

  <a href="empresa.php"><input type="submit" value="Regresar a Ventas" name="" class="btn btn-primary"></a>
  </header>
  
  

     
<?php
if($_POST['buscar'])
{
 ?>

 <!--table class="table table-striped" >
     <tr>
         
          <td width="25%" bgcolor="#58D3F7"  align="center"><th><strong>Acción</strong></th></td>
          <td width="100" bgcolor="#58D3F7" align="center"><th><strong>Id</strong></th></td>
          <td width="100" bgcolor="#58D3F7" align="center"><th><strong>Nombre Completo</strong></th></td>
          <td width="100" bgcolor="#58D3F7"  align="center"><th><strong>Nombre Corto</strong></th></td>
          <td width="100" bgcolor="#58D3F7" align="center"><th><strong>Giro Comercial</strong></th></td>
          <td width="100" bgcolor="#58D3F7" align="center"><th><strong>RFC</strong></th></td>
          <td width="100" bgcolor="#58D3F7" align="center"><th><strong>Dirección</strong></th></td>
          <td width="100" bgcolor="#58D3F7" align="center"><th><strong>Entidad Federativa</strong></th></td>
          <td width="100" bgcolor="#58D3F7" align="center"><th><strong>Telefono</strong></th></td>
          <td width="100" bgcolor="#58D3F7" align="center"><th><strong>Pagina Web</strong></th></td>
          <td width="100" bgcolor="#58D3F7" align="center"><th><strong>Dirección GPS</strong></th></td>
          <td width="100" bgcolor="#58D3F7" align="center"><th><strong>Observaciones</strong></th></td>
     </tr-->
     <?php
	 
	  $buscar = $_POST["palabra"];
	  
	  $connect = mysqli_connect("localhost", "root", "", "veco_sims_devecchi");
		$query = "SELECT * FROM empresas WHERE id like '%$buscar%' or nombre_corto like '%$buscar%' or razon_social like '%$buscar%'";
		$consulta_mysql = mysqli_query($connect, $query);
		
		
		ECHO "<table class='table table-hover table-striped table-bordered'><th>Acción</th><th>Id</th><th>RFC</th><th>Razon Social</th><th>Nombre Corto</th><th>Logotipo</th><th>Calle</th><th>Núm Exterior</th><th>Núm Interior</th><th>Colonia</th><th>Municipio</th><th>Entidad Federativa</th><th>Codigo Postal</th><th>País</th><th>Dirección GPS</th><th>Nombre de Contacto</th><th>Apellido de Contacto</th><th>Puesto de Contacto</th><th>Email de Contacto</th><th>Telefono de Contacto</th>";
while ($fila = mysqli_fetch_array( $consulta_mysql )){
	echo "<tr>";
      ?>
		<td class="text-center">
					<a href="edit_empresa.php?id=<?php echo $fila['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				    <a href="copy_empresa.php?id=<?php echo $fila['id']; ?>"class="btn btn-sm btn-warning"><i class="fa fa-clone" aria-hidden="true"></i></a>
					<a href="eliminar_empresa.php?id=<?php echo $fila['id']; ?>"class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
					<a href="ver_empresa.php?id=<?php echo $fila['id']; ?>" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
        </td>
        <?php
		ECHO " <TD>".utf8_encode($fila["id"])."</TD>";
        ECHO " <TD>".utf8_encode($fila["rfc"])."</TD>";
        ECHO " <TD>".utf8_encode($fila["razon_social"])."</TD>";
		ECHO " <TD>".utf8_encode($fila["nombre_corto"])."</TD>";
		?>
		  <TD><img src="data:image/jpg;base64,<?php echo base64_encode($fila['logotipo']);?>" width='100'/></TD>;
		  <?php
        ECHO " <TD>".utf8_decode($fila["calle"])."</TD>";
        ECHO " <TD>".utf8_decode($fila["numero_interior"])."</TD>";
        ECHO " <TD>".utf8_encode($fila["numero_exterior"])."</TD>";	
        ECHO " <TD>".utf8_encode($fila["colonia"])."</TD>";
        ECHO " <TD>".utf8_encode($fila["municipio"])."</TD>";
        ECHO " <TD>".utf8_encode($fila["entidad_federativa"])."</TD>";	
        ECHO " <TD>".utf8_decode($fila["codigo_postal"])."</TD>";	
        ECHO " <TD>".utf8_decode($fila["pais"])."</TD>";	
        ECHO " <TD>".utf8_decode($fila["direccion_gps"])."</TD>";	
        ECHO " <TD>".utf8_decode($fila["contacto_nombre"])."</TD>";	
        ECHO " <TD>".utf8_encode($fila["contacto_apellido"])."</TD>";
        ECHO " <TD>".utf8_encode($fila["contacto_puesto"])."</TD>";
        ECHO " <TD>".utf8_encode($fila["contacto_email"])."</TD>";
        ECHO " <TD>".utf8_encode($fila["contacto_telefono"])."</TD>";	
     
  echo "</tr>";
}
ECHO "</table>";



///////////////////////////////////////////////////////////////////////////////////////////
    // while($registro = mysqli_fetch_array($consulta_mysql))
     //{
         ?>
         <!--tr>
             <td class="text-center">
					<a href="edit_empresa.php?id=<?php //echo $fila['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				    <a href="copy_empresa.php?id=<?php //echo $fila['id']; ?>"class="btn btn-sm btn-warning"><i class="fa fa-clone" aria-hidden="true"></i></a>
					<a href="eliminar_empresa.php?id=<?php //echo $fila['id']; ?>"class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
					<a href="ver_empresa.php?id=<?php //echo $fila['id']; ?>" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
			</td>
             <td  align="center"><?//=$registro['id']?></td>
             <td  align="center"><?//=$registro['nombre_completo']?></td>
             <td  align="center"><?//=$registro['nombre_corto']?></td>
             <td  align="center"><?//=$registro['giro_comercial']?></td>
			 <td  align="center"><?//=$registro['rfc']?></td>
			 <td  align="center"><?//=$registro['direccion']?></td>
			 <td  align="center"><?//=$registro['entidad_federativa']?></td>
			 <td  align="center"><?//=$registro['telefono']?></td>
			 <td  align="center"><?//=$registro['pagina_web']?></td>
			 <td  align="center"><?//=$registro['direccion_gps']?></td>
			 <td  align="center"><?//=$registro['observaciones']?></td>
         </tr>
         <?php
     } 
  ?>
  </table-->
  <?php
//} 
?>

  
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