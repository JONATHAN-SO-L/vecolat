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
<head><meta charset="gb18030">
  
  <title>Adicionar</title>
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
	  <li  class="active">
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
        <a href="equipo.php">
          <i class="fa fa-cubes"></i>
        Equipo
        </a>
      </li>
	   <li>
        <a href="area.php">
          <i class="fa fa-rss-square"></i>
          Área
        </a>
      </li>
	  <li>
        <a href="seccion_admin.php">
          <i class="fa fa-wrench"></i>
        Servicio
        </a>
      </li>	
      <li class="active">
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

 <?php
 include ("conexi.php");
 
 if(isset($_POST['descripcion']) && isset($_POST['empresa_id'])){ 
			
			if(isset($_POST['empresa_id'])){
			$empresa_id= $_POST['empresa_id'];
		}else{
			$empresa_id="";
		}
		if(isset($_POST['descripcion'])){
			$descripcion= $_POST['descripcion'];
		}else{
			$descripcion="";
		}
			
		if(isset($_POST['calle'])){
			$calle= $_POST['calle'];
		}else{
			$calle="";
		}
		if(isset($_POST['numero_exterior'])){
			$numero_exterior= $_POST['numero_exterior'];
		}else{
			$numero_exterior="";
		}
		if(isset($_POST['numero_interior'])){
			$numero_interior= $_POST['numero_interior'];
		}else{
			$numero_interior="";
		}
		if(isset($_POST['colonia'])){
			$colonia= $_POST['colonia'];
		}else{
			$colonia="";
		}
		if(isset($_POST['municipio'])){
			$municipio= $_POST['municipio'];
		}else{
			$municipio="";
		}
		if(isset($_POST['entidad_federativa'])){
			$entidad_federativa= $_POST['entidad_federativa'];
		}else{
			$entidad_federativa="";
		}
		if(isset($_POST['codigo_postal'])){
			$codigo_postal= $_POST['codigo_postal'];
		}else{
			$codigo_postal="";
		}
		if(isset($_POST['pais'])){
			$pais= $_POST['pais'];
		}else{
			$pais="";
		}
		if(isset($_POST['direccion_gps'])){
			$direccion_gps= $_POST['direccion_gps'];
		}else{
			$direccion_gps="";
		}
		if(isset($_POST['contacto_nombre'])){
			$contacto_nombre= $_POST['contacto_nombre'];
		}else{
			$contacto_nombre="";
		}
		if(isset($_POST['contacto_apellido'])){
			$contacto_apellido= $_POST['contacto_apellido'];
		}else{
			$contacto_apellido="";
		}
		if(isset($_POST['contacto_puesto'])){
			$contacto_puesto= $_POST['contacto_puesto'];
		}else{
			$contacto_puesto="";
		}
		if(isset($_POST['contacto_email'])){
			$contacto_email= $_POST['contacto_email'];
		}else{
			$contacto_email="";
		}
		if(isset($_POST['contacto_telefono'])){
			$contacto_telefono= $_POST['contacto_telefono'];
		}else{
			$contacto_telefono="";
		}
		if(isset($_POST['requisitos_acceso'])){
			$requisitos_acceso= $_POST['requisitos_acceso'];
		}else{
			$requisitos_acceso="";
		}
			$con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("INSERT INTO edificio(empresa_id, descripcion, calle, numero_exterior, numero_interior, colonia, municipio, entidad_federativa, codigo_postal, pais, direccion_gps, contacto_nombre, contacto_apellido, contacto_puesto, contacto_email, contacto_telefono, requisitos_acceso)VALUES('$empresa_id', '$descripcion', '$calle','$numero_interior','$numero_exterior','$colonia','$municipio','$entidad_federativa','$codigo_postal','$pais','$direccion_gps','$contacto_nombre','$contacto_apellido','$contacto_puesto','$contacto_email','$contacto_telefono','$requisitos_acceso')"))){
			
		
            echo '
                <script language="javascript">
				alert("Edificio Guardado");
				window.location.href="edificio.php"</script>
            ';

          }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="edificio.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido guardar el Edificio. Por favor intente nuevamente.
                    </p>
                </div>
            ';
          }
        }
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