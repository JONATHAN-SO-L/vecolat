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
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
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
	 
	 <script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
  
</head>
<style>
    .btn { 
        padding: 10px;
		}
		.btno { 
        padding: 30px;
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
      <li  class="active">
        <a href="equipo.php">
          <i class="fa fa-cubes"></i>
        Equipo
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
 <script language="javascript" src="js/jquery-3.1.1.min.js"></script>
		
		<script language="javascript">
			$(document).ready(function(){
				$("#empresa_id").change(function () {
					$("#empresa_id option:selected").each(function () {
						id = $(this).val();
						$.post("get_discos.php", { id: id }, function(data){
							$("#cbx_municipio").html(data);
						});            
					});
				})
			});
			
			$(document).ready(function(){
				$("#cbx_municipio").change(function () {
					//$('#area_id').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					$("#cbx_municipio option:selected").each(function () {
						id = $(this).val();
						$.post("getubicacion2.php", { id: id }, function(data){
							$("#ubicacion_id").html(data);
						});            
					});
				})
			});
			
			$(document).ready(function(){
				$("#cbx_municipio").change(function () {
				//	$('#area_id3').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					 $("#cbx_municipio option:selected").each(function () {
						id = $(this).val();
						$.post("getarea2.php", { id: id }, function(data){
							$("#area").html(data);
						});            
					});
				})
			});
	
		</script>
 <!--/////////////////////////////////////////////////////////-->
 
  <div id="header_logo">
    <a href=""></a>
  </div>
</header>
<section id="content">
  <header id="content-header">
  
  <table>  
    <td>
		<tr>
       <a href="equipo.php" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
	   </tr>
	</td>
	   </table>
		<!--************************************ Page content******************************-->
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Adicionar Equipo</h1>
                <span class="label label-danger"></span>
                <p class="pull-right text-primary">
               </p>
              </div>
            </div>
          </div>
        </div>
		<!--************************************ Page content******************************-->

<?php
 include ("conexi.php");
 
 if(isset($_POST['empresa_id']) && isset($_POST['equipo'])){        

        	if(isset($_POST['empresa_id'])){
			$empresa_id= $_POST['empresa_id'];
		}else{
			$empresa_id="";
		}
		
		if(isset($_POST['cbx_municipio'])){
			$edificio_id= $_POST['cbx_municipio'];
		}else{
			$edificio_id="";
		}
		if(isset($_POST['ubicacion_id'])){
			$ubicacion_id= $_POST['ubicacion_id'];
		}else{
			$ubicacion_id="";
		}
		if(isset($_POST['equipo'])){
			$descripcion= $_POST['equipo'];
		}else{
			$descripcion="";
		}
		if(isset($_POST['area_id'])){
			$area_id= $_POST['area_id'];
		}else{
			$area_id= "1";
		}
			if(isset($_POST['area'])){
			$area= $_POST['area'];
		}else{
			$area="";
		}
		if(isset($_POST['cfm_equipo'])){
			$cfm_equipo= $_POST['cfm_equipo'];
		}else{
			$cfm_equipo="";
		}
		if(isset($_POST['vel_filtro_f1'])){
			$vel_filtro_f1= $_POST['vel_filtro_f1'];
		}else{
			$vel_filtro_f1="";
		}
		if(isset($_POST['area_filt_f1'])){
			$area_filt_f1= $_POST['area_filt_f1'];
		}else{
			$area_filt_f1="";
		}
		if(isset($_POST['modelo_f1'])){
			$modelo_f1= $_POST['modelo_f1'];
		}else{
			$modelo_f1="";
		}
		if(isset($_POST['alto_f1'])){
			$alto_f1= $_POST['alto_f1'];
		}else{
			$alto_f1="";
		}
		if(isset($_POST['frente_f1'])){
			$frente_f1= $_POST['frente_f1'];
		}else{
			$frente_f1="";
		}
		if(isset($_POST['fondo_f1'])){
			$fondo_f1= $_POST['fondo_f1'];
		}else{
			$fondo_f1="";
		}
		if(isset($_POST['um_f1'])){
			$um_f1= $_POST['um_f1'];
		}else{
			$um_f1="";
		}
		if(isset($_POST['pz_f1'])){
			$pz_f1= $_POST['pz_f1'];
		}else{
			$pz_f1="";
		}
		if(isset($_POST['cfm_filtro_f1'])){
			$cfm_filtro_f1= $_POST['cfm_filtro_f1'];
		}else{
			$cfm_filtro_f1="";
		}
		if(isset($_POST['cfm_fil_fab_f1'])){
			$cfm_fil_fab_f1= $_POST['cfm_fil_fab_f1'];
		}else{
			$cfm_fil_fab_f1="";
		}
		if(isset($_POST['modelo_f1_2'])){
			$modelo_f1_2= $_POST['modelo_f1_2'];
		}else{
			$modelo_f1_2="";
		}
		if(isset($_POST['alto_f1_2'])){
			$alto_f1_2= $_POST['alto_f1_2'];
		}else{
			$alto_f1_2="";
		}
		if(isset($_POST['frente_f1_2'])){
			$frente_f1_2= $_POST['frente_f1_2'];
		}else{
			$frente_f1_2="";
		}
		if(isset($_POST['fondo_f1_2'])){
			$fondo_f1_2= $_POST['fondo_f1_2'];
		}else{
			$fondo_f1_2="";
		}
		if(isset($_POST['um_f1_2'])){
			$um_f1_2= $_POST['um_f1_2'];
		}else{
			$um_f1_2="";
		}
		if(isset($_POST['pz_f1_2'])){
			$pz_f1_2= $_POST['pz_f1_2'];
		}else{
			$pz_f1_2="";
		}
		if(isset($_POST['cfm_filtro_f1_2'])){
			$cfm_filtro_f1_2= $_POST['cfm_filtro_f1_2'];
		}else{
			$cfm_filtro_f1_2="";
		}
		if(isset($_POST['cfm_fil_fab_f1_2'])){
			$cfm_fil_fab_f1_2= $_POST['cfm_fil_fab_f1_2'];
		}else{
			$cfm_fil_fab_f1_2="";
		}
		////////////////////////////////////////////////////////////
		if(isset($_POST['modelo_f1_3'])){
			$modelo_f1_3= $_POST['modelo_f1_3'];
		}else{
			$modelo_f1_3="";
		}
		if(isset($_POST['alto_f1_3'])){
			$alto_f1_3= $_POST['alto_f1_3'];
		}else{
			$alto_f1_3="";
		}
		if(isset($_POST['frente_f1_3'])){
			$frente_f1_3= $_POST['frente_f1_3'];
		}else{
			$frente_f1_3="";
		}
		if(isset($_POST['fondo_f1_3'])){
			$fondo_f1_3= $_POST['fondo_f1_3'];
		}else{
			$fondo_f1_3="";
		}
		if(isset($_POST['um_f1_3'])){
			$um_f1_3= $_POST['um_f1_3'];
		}else{
			$um_f1_3="";
		}
		if(isset($_POST['pz_f1_3'])){
			$pz_f1_3= $_POST['pz_f1_3'];
		}else{
			$pz_f1_3="";
		}
		if(isset($_POST['cfm_filtro_f1_3'])){
			$cfm_filtro_f1_3= $_POST['cfm_filtro_f1_3'];
		}else{
			$cfm_filtro_f1_3="";
		}
		if(isset($_POST['cfm_fil_fab_f1_3'])){
			$cfm_fil_fab_f1_3= $_POST['cfm_fil_fab_f1_3'];
		}else{
			$cfm_fil_fab_f1_3="";
		}
		////////////////////////////////////////////////////////////
		if(isset($_POST['sp_ini_wg_f1'])){
			$sp_ini_wg_f1= $_POST['sp_ini_wg_f1'];
		}else{
			$sp_ini_wg_f1="";
		}
		if(isset($_POST['sp_can_wg_f1'])){
			$sp_can_wg_f1= $_POST['sp_can_wg_f1'];
		}else{
			$sp_can_wg_f1="";
		}
		if(isset($_POST['vel_filtro_f2'])){
			$vel_filtro_f2= $_POST['vel_filtro_f2'];
		}else{
			$vel_filtro_f2="";
		}
		if(isset($_POST['area_filt_f2'])){
			$area_filt_f2= $_POST['area_filt_f2'];
		}else{
			$area_filt_f2="";
		}
		if(isset($_POST['modelo_f2'])){
			$modelo_f2= $_POST['modelo_f2'];
		}else{
			$modelo_f2="";
		}
		if(isset($_POST['alto_f2'])){
			$alto_f2= $_POST['alto_f2'];
		}else{
			$alto_f2="";
		}
		if(isset($_POST['frente_f2'])){
			$frente_f2= $_POST['frente_f2'];
		}else{
			$frente_f2="";
		}
		if(isset($_POST['fondo_f2'])){
			$fondo_f2= $_POST['fondo_f2'];
		}else{
			$fondo_f2="";
		}
		if(isset($_POST['um_f2'])){
			$um_f2= $_POST['um_f2'];
		}else{
			$um_f2="";
		}
		if(isset($_POST['pz_f2'])){
			$pz_f2= $_POST['pz_f2'];
		}else{
			$pz_f2="";
		}
		if(isset($_POST['cfm_filtro_f2'])){
			$cfm_filtro_f2= $_POST['cfm_filtro_f2'];
		}else{
			$cfm_filtro_f2="";
		}
		if(isset($_POST['cfm_fil_fab_f2'])){
			$cfm_fil_fab_f2= $_POST['cfm_fil_fab_f2'];
		}else{
			$cfm_fil_fab_f2="";
		}
		if(isset($_POST['modelo_f2_2'])){
			$modelo_f2_2= $_POST['modelo_f2_2'];
		}else{
			$modelo_f2_2="";
		}
		if(isset($_POST['alto_f2_2'])){
			$alto_f2_2= $_POST['alto_f2_2'];
		}else{
			$alto_f2_2="";
		}
		if(isset($_POST['frente_f2_2'])){
			$frente_f2_2= $_POST['frente_f2_2'];
		}else{
			$frente_f2_2="";
		}
		if(isset($_POST['fondo_f2_2'])){
			$fondo_f2_2= $_POST['fondo_f2_2'];
		}else{
			$fondo_f2_2="";
		}
		if(isset($_POST['um_f2_2'])){
			$um_f2_2= $_POST['um_f2_2'];
		}else{
			$um_f2_2="";
		}
		if(isset($_POST['pz_f2_2'])){
			$pz_f2_2= $_POST['pz_f2_2'];
		}else{
			$pz_f2_2="";
		}
		if(isset($_POST['cfm_filtro_f2_2'])){
			$cfm_filtro_f2_2= $_POST['cfm_filtro_f2_2'];
		}else{
			$cfm_filtro_f2_2="";
		}
		if(isset($_POST['cfm_fil_fab_f2_2'])){
			$cfm_fil_fab_f2_2= $_POST['cfm_fil_fab_f2_2'];
		}else{
			$cfm_fil_fab_f2_2="";
		}
		////////////////////////////////////////////////////////////
		if(isset($_POST['modelo_f2_3'])){
			$modelo_f2_3= $_POST['modelo_f2_3'];
		}else{
			$modelo_f2_3="";
		}
		if(isset($_POST['alto_f2_3'])){
			$alto_f2_3= $_POST['alto_f2_3'];
		}else{
			$alto_f2_3="";
		}
		if(isset($_POST['frente_f2_3'])){
			$frente_f2_3= $_POST['frente_f2_3'];
		}else{
			$frente_f2_3="";
		}
		if(isset($_POST['fondo_f2_3'])){
			$fondo_f2_3= $_POST['fondo_f2_3'];
		}else{
			$fondo_f2_3="";
		}
		if(isset($_POST['um_f2_3'])){
			$um_f2_3= $_POST['um_f2_3'];
		}else{
			$um_f2_3="";
		}
		if(isset($_POST['pz_f2_3'])){
			$pz_f2_3= $_POST['pz_f2_3'];
		}else{
			$pz_f2_3="";
		}
		if(isset($_POST['cfm_filtro_f2_3'])){
			$cfm_filtro_f2_3= $_POST['cfm_filtro_f2_3'];
		}else{
			$cfm_filtro_f2_3="";
		}
		if(isset($_POST['cfm_fil_fab_f2_3'])){
			$cfm_fil_fab_f2_3= $_POST['cfm_fil_fab_f2_3'];
		}else{
			$cfm_fil_fab_f2_3="";
		}
		////////////////////////////////////////////////////////////
		if(isset($_POST['sp_ini_wg_f2'])){
			$sp_ini_wg_f2= $_POST['sp_ini_wg_f2'];
		}else{
			$sp_ini_wg_f2="";
		}
		if(isset($_POST['sp_can_wg_f2'])){
			$sp_can_wg_f2= $_POST['sp_can_wg_f2'];
		}else{
			$sp_can_wg_f2="";
		}
		if(isset($_POST['vel_filtro_f3'])){
			$vel_filtro_f3= $_POST['vel_filtro_f3'];
		}else{
			$vel_filtro_f3="";
		}
		if(isset($_POST['area_filt_f3'])){
			$area_filt_f3= $_POST['area_filt_f3'];
		}else{
			$area_filt_f3="";
		}
		if(isset($_POST['modelo_f3'])){
			$modelo_f3= $_POST['modelo_f3'];
		}else{
			$modelo_f3="";
		}
		if(isset($_POST['alto_f3'])){
			$alto_f3= $_POST['alto_f3'];
		}else{
			$alto_f3="";
		}
		if(isset($_POST['frente_f3'])){
			$frente_f3= $_POST['frente_f3'];
		}else{
			$frente_f3="";
		}
		if(isset($_POST['fondo_f3'])){
			$fondo_f3= $_POST['fondo_f3'];
		}else{
			$fondo_f3="";
		}
		if(isset($_POST['um_f3'])){
			$um_f3= $_POST['um_f3'];
		}else{
			$um_f3="";
		}
		if(isset($_POST['pz_f3'])){
			$pz_f3= $_POST['pz_f3'];
		}else{
			$pz_f3="";
		}
		if(isset($_POST['cfm_filtro_f3'])){
			$cfm_filtro_f3= $_POST['cfm_filtro_f3'];
		}else{
			$cfm_filtro_f3="";
		}
		if(isset($_POST['cfm_fil_fab_f3'])){
			$cfm_fil_fab_f3= $_POST['cfm_fil_fab_f3'];
		}else{
			$cfm_fil_fab_f3="";
		}
		if(isset($_POST['modelo_f3_2'])){
			$modelo_f3_2= $_POST['modelo_f3_2'];
		}else{
			$modelo_f3_2="";
		}
		if(isset($_POST['alto_f3_2'])){
			$alto_f3_2= $_POST['alto_f3_2'];
		}else{
			$alto_f3_2="";
		}
		if(isset($_POST['frente_f3_2'])){
			$frente_f3_2= $_POST['frente_f3_2'];
		}else{
			$frente_f3_2="";
		}
		if(isset($_POST['fondo_f3_2'])){
			$fondo_f3_2= $_POST['fondo_f3_2'];
		}else{
			$fondo_f3_2="";
		}
		if(isset($_POST['um_f3_2'])){
			$um_f3_2= $_POST['um_f3_2'];
		}else{
			$um_f3_2="";
		}
		if(isset($_POST['pz_f3_2'])){
			$pz_f3_2= $_POST['pz_f3_2'];
		}else{
			$pz_f3_2="";
		}
		if(isset($_POST['cfm_filtro_f3_2'])){
			$cfm_filtro_f3_2= $_POST['cfm_filtro_f3_2'];
		}else{
			$cfm_filtro_f3_2="";
		}
		if(isset($_POST['cfm_fil_fab_f3_2'])){
			$cfm_fil_fab_f3_2= $_POST['cfm_fil_fab_f3_2'];
		}else{
			$cfm_fil_fab_f3_2="";
		}
		////////////////////////////////////////////////////////////
		if(isset($_POST['modelo_f3_3'])){
			$modelo_f3_3= $_POST['modelo_f3_3'];
		}else{
			$modelo_f3_3="";
		}
		if(isset($_POST['alto_f3_3'])){
			$alto_f3_3= $_POST['alto_f3_3'];
		}else{
			$alto_f3_3="";
		}
		if(isset($_POST['frente_f3_3'])){
			$frente_f3_3= $_POST['frente_f3_3'];
		}else{
			$frente_f3_3="";
		}
		if(isset($_POST['fondo_f3_3'])){
			$fondo_f3_3= $_POST['fondo_f3_3'];
		}else{
			$fondo_f3_3="";
		}
		if(isset($_POST['um_f3_3'])){
			$um_f3_3= $_POST['um_f3_3'];
		}else{
			$um_f3_3="";
		}
		if(isset($_POST['pz_f3_3'])){
			$pz_f3_3= $_POST['pz_f3_3'];
		}else{
			$pz_f3_3="";
		}
		if(isset($_POST['cfm_filtro_f3_3'])){
			$cfm_filtro_f3_3= $_POST['cfm_filtro_f3_3'];
		}else{
			$cfm_filtro_f3_3="";
		}
		if(isset($_POST['cfm_fil_fab_f3_3'])){
			$cfm_fil_fab_f3_3= $_POST['cfm_fil_fab_f3_3'];
		}else{
			$cfm_fil_fab_f3_3="";
		}
		////////////////////////////////////////////////////////////
		if(isset($_POST['sp_ini_wg_f3'])){
			$sp_ini_wg_f3= $_POST['sp_ini_wg_f3'];
		}else{
			$sp_ini_wg_f3="";
		}
		if(isset($_POST['sp_can_wg_f3'])){
			$sp_can_wg_f3= $_POST['sp_can_wg_f3'];
		}else{
			$sp_can_wg_f3="";
		}
		if(isset($_POST['vel_filtro_f4'])){
			$vel_filtro_f4= $_POST['vel_filtro_f4'];
		}else{
			$vel_filtro_f4="";
		}
		if(isset($_POST['area_filt_f4'])){
			$area_filt_f4= $_POST['area_filt_f4'];
		}else{
			$area_filt_f4="";
		}
		if(isset($_POST['modelo_f4'])){
			$modelo_f4= $_POST['modelo_f4'];
		}else{
			$modelo_f4="";
		}
		if(isset($_POST['alto_f4'])){
			$alto_f4= $_POST['alto_f4'];
		}else{
			$alto_f4="";
		}
		if(isset($_POST['frente_f4'])){
			$frente_f4= $_POST['frente_f4'];
		}else{
			$frente_f4="";
		}
		if(isset($_POST['fondo_f4'])){
			$fondo_f4= $_POST['fondo_f4'];
		}else{
			$fondo_f4="";
		}
		if(isset($_POST['um_f4'])){
			$um_f4= $_POST['um_f4'];
		}else{
			$um_f4="";
		}
		if(isset($_POST['pz_f4'])){
			$pz_f4= $_POST['pz_f4'];
		}else{
			$pz_f4="";
		}
		if(isset($_POST['cfm_filtro_f4'])){
			$cfm_filtro_f4= $_POST['cfm_filtro_f4'];
		}else{
			$cfm_filtro_f4="";
		}
		if(isset($_POST['cfm_fil_fab_f4'])){
			$cfm_fil_fab_f4= $_POST['cfm_fil_fab_f4'];
		}else{
			$cfm_fil_fab_f4="";
		}
		if(isset($_POST['modelo_f4_2'])){
			$modelo_f4_2= $_POST['modelo_f4_2'];
		}else{
			$modelo_f4_2="";
		}
		if(isset($_POST['alto_f4_2'])){
			$alto_f4_2= $_POST['alto_f4_2'];
		}else{
			$alto_f4_2="";
		}
		if(isset($_POST['frente_f4_2'])){
			$frente_f4_2= $_POST['frente_f4_2'];
		}else{
			$frente_f4_2="";
		}
		if(isset($_POST['fondo_f4_2'])){
			$fondo_f4_2= $_POST['fondo_f4_2'];
		}else{
			$fondo_f4_2="";
		}
		if(isset($_POST['um_f4_2'])){
			$um_f4_2= $_POST['um_f4_2'];
		}else{
			$um_f4_2="";
		}
		if(isset($_POST['pz_f4_2'])){
			$pz_f4_2= $_POST['pz_f4_2'];
		}else{
			$pz_f4_2="";
		}
		if(isset($_POST['cfm_filtro_f4_2'])){
			$cfm_filtro_f4_2= $_POST['cfm_filtro_f4_2'];
		}else{
			$cfm_filtro_f4_2="";
		}
		if(isset($_POST['cfm_fil_fab_f4_2'])){
			$cfm_fil_fab_f4_2= $_POST['cfm_fil_fab_f4_2'];
		}else{
			$cfm_fil_fab_f4_2="";
		}
		if(isset($_POST['modelo_f4_3'])){
			$modelo_f4_3= $_POST['modelo_f4_3'];
		}else{
			$modelo_f4_3="";
		}
		if(isset($_POST['alto_f4_3'])){
			$alto_f4_3= $_POST['alto_f4_3'];
		}else{
			$alto_f4_3="";
		}
		if(isset($_POST['frente_f4_3'])){
			$frente_f4_3= $_POST['frente_f4_3'];
		}else{
			$frente_f4_3="";
		}
		if(isset($_POST['fondo_f4_3'])){
			$fondo_f4_3= $_POST['fondo_f4_3'];
		}else{
			$fondo_f4_3="";
		}
		if(isset($_POST['um_f4_3'])){
			$um_f4_3= $_POST['um_f4_3'];
		}else{
			$um_f4_3="";
		}
		if(isset($_POST['pz_f4_3'])){
			$pz_f4_3= $_POST['pz_f4_3'];
		}else{
			$pz_f4_3="";
		}
		if(isset($_POST['cfm_filtro_f4_3'])){
			$cfm_filtro_f4_3= $_POST['cfm_filtro_f4_3'];
		}else{
			$cfm_filtro_f4_3="";
		}
		if(isset($_POST['cfm_fil_fab_f4_3'])){
			$cfm_fil_fab_f4_3= $_POST['cfm_fil_fab_f4_3'];
		}else{
			$cfm_fil_fab_f4_3="";
		}		
		if(isset($_POST['sp_ini_wg_f4'])){
			$sp_ini_wg_f4= $_POST['sp_ini_wg_f4'];
		}else{
			$sp_ini_wg_f4="";
		}
		if(isset($_POST['sp_can_wg_f4'])){
			$sp_can_wg_f4= $_POST['sp_can_wg_f4'];
		}else{
			$sp_can_wg_f4="";
		}
		
			$con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("INSERT INTO equipo(empresa_id, edificio_id, ubicacion_id, equipo, area_id, area, 
						cfm_equipo, vel_filtro_f1, area_filt_f1, modelo_f1, alto_f1, frente_f1, fondo_f1, um_f1, pz_f1, cfm_filtro_f1, cfm_fil_fab_f1,
						modelo_f1_2, alto_f1_2, frente_f1_2, fondo_f1_2, um_f1_2, pz_f1_2, cfm_filtro_f1_2, cfm_fil_fab_f1_2,
						modelo_f1_3, alto_f1_3, frente_f1_3, fondo_f1_3, um_f1_3, pz_f1_3, cfm_filtro_f1_3, cfm_fil_fab_f1_3,
						sp_ini_wg_f1, sp_can_wg_f1,
						vel_filtro_f2, area_filt_f2, modelo_f2, alto_f2, frente_f2, fondo_f2, um_f2, pz_f2, cfm_filtro_f2, cfm_fil_fab_f2,
						modelo_f2_2, alto_f2_2, frente_f2_2, fondo_f2_2, um_f2_2, pz_f2_2, cfm_filtro_f2_2, cfm_fil_fab_f2_2,
						modelo_f2_3, alto_f2_3, frente_f2_3, fondo_f2_3, um_f2_3, pz_f2_3, cfm_filtro_f2_3, cfm_fil_fab_f2_3,
						sp_ini_wg_f2, sp_can_wg_f2,
						vel_filtro_f3, area_filt_f3, modelo_f3, alto_f3, frente_f3, fondo_f3, um_f3, pz_f3, cfm_filtro_f3, cfm_fil_fab_f3,
						modelo_f3_2, alto_f3_2, frente_f3_2, fondo_f3_2, um_f3_2, pz_f3_2, cfm_filtro_f3_2, cfm_fil_fab_f3_2,
						modelo_f3_3, alto_f3_3, frente_f3_3, fondo_f3_3, um_f3_3, pz_f3_3, cfm_filtro_f3_3, cfm_fil_fab_f3_3,
						sp_ini_wg_f3, sp_can_wg_f3,
						vel_filtro_f4, area_filt_f4, modelo_f4, alto_f4, frente_f4, fondo_f4, um_f4, pz_f4, cfm_filtro_f4, cfm_fil_fab_f4,
						modelo_f4_2, alto_f4_2, frente_f4_2, fondo_f4_2, um_f4_2, pz_f4_2, cfm_filtro_f4_2, cfm_fil_fab_f4_2,
						modelo_f4_3, alto_f4_3, frente_f4_3, fondo_f4_3, um_f4_3, pz_f4_3, cfm_filtro_f4_3, cfm_fil_fab_f4_3, sp_ini_wg_f4, sp_can_wg_f4)
				VALUES
						('$empresa_id','$edificio_id','$ubicacion_id','$descripcion','$area_id', '$area', 
						'$cfm_equipo','$vel_filtro_f1','$area_filt_f1','$modelo_f1','$alto_f1','$frente_f1','$fondo_f1','$um_f1','$pz_f1','$cfm_filtro_f1','$cfm_fil_fab_f1',
						'$modelo_f1_2','$alto_f1_2','$frente_f1_2','$fondo_f1_2','$um_f1_2','$pz_f1_2','$cfm_filtro_f1_2','$cfm_fil_fab_f1_2',
						'$modelo_f1_3','$alto_f1_3','$frente_f1_3','$fondo_f1_3','$um_f1_3','$pz_f1_3','$cfm_filtro_f1_3','$cfm_fil_fab_f1_3',
						'$sp_ini_wg_f1','$sp_can_wg_f1',
						'$vel_filtro_f2','$area_filt_f2','$modelo_f2','$alto_f2','$frente_f2','$fondo_f2','$um_f2','$pz_f2','$cfm_filtro_f2','$cfm_fil_fab_f2',
						'$modelo_f2_2','$alto_f2_2','$frente_f2_2','$fondo_f2_2','$um_f2_2','$pz_f2_2','$cfm_filtro_f2_2','$cfm_fil_fab_f2_2',
						'$modelo_f2_3','$alto_f2_3','$frente_f2_3','$fondo_f2_3','$um_f2_3','$pz_f2_3','$cfm_filtro_f2_3','$cfm_fil_fab_f2_3',
						'$sp_ini_wg_f2','$sp_can_wg_f2',
						'$vel_filtro_f3','$area_filt_f3','$modelo_f3','$alto_f3','$frente_f3','$fondo_f3','$um_f3','$pz_f3','$cfm_filtro_f3','$cfm_fil_fab_f3',
						'$modelo_f3_2','$alto_f3_2','$frente_f3_2','$fondo_f3_2','$um_f3_2','$pz_f3_2','$cfm_filtro_f3_2','$cfm_fil_fab_f3_2',
						'$modelo_f3_3','$alto_f3_3','$frente_f3_3','$fondo_f3_3','$um_f3_3','$pz_f3_3','$cfm_filtro_f3_3','$cfm_fil_fab_f3_3',
						'$sp_ini_wg_f3','$sp_can_wg_f3',
						'$vel_filtro_f4','$area_filt_f4','$modelo_f4','$alto_f4','$frente_f4','$fondo_f4','$um_f4','$pz_f4','$cfm_filtro_f4','$cfm_fil_fab_f4',
						'$modelo_f4_2','$alto_f4_2','$frente_f4_2','$fondo_f4_2','$um_f4_2','$pz_f4_2','$cfm_filtro_f4_2','$cfm_fil_fab_f4_2',
						'$modelo_f4_3','$alto_f4_3','$frente_f4_3','$fondo_f4_3','$um_f4_3','$pz_f4_3','$cfm_filtro_f4_3','$cfm_fil_fab_f4_3','$sp_ini_wg_f4','$sp_can_wg_f4')"))){
			
            echo '
                <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="equipo.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">Equipo GUARDADO</h4>
                    <p class="text-center">
                        El Equipo ha sido guardada exitosamente
                    </p>
                </div>
            ';

          }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                   <a href="equipo.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido guardar el equipo. Por favor intente nuevamente.
                    </p>
                </div>
            ';
          }
        }
		?>

<style>
.page-header{
display:none;
}

</style>

<div class="container">
  <div class="row">
    <div class="col-sm-8">
      <div class="panel panel-success">
        <div class="panel-heading text-center"><strong>Para poder registrar un equipo nuevo debes de llenar todos los campos de este formulario</strong></div>
        <div class="panel-body">
            <form role="form" action="" method="POST">
			
						
						<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->
						<div><label><i class="fa fa-hospital-o"></i>&nbsp;Empresa</label>
						<select class="form-control" name="empresa_id" id="empresa_id">
				<option class="form-control" required="" value="0">Seleccionar Empresa</option>
				<?php
								$connect = mysqli_connect("localhost","veco_dvi", "Vec83Dv19iSa@", "veco_sims_devecchi");
								$query = "SELECT * FROM empresas Order by razon_social";
								$result = mysqli_query($connect, $query);
								?>	
				<?php foreach($result as $row){ ?> 
					<option value="<?php echo $row['id']; ?>"><?php echo $row['razon_social']; ?></option>
				<?php } ?>
			</select></div>
			
			<br />
			
			<div><label><i class="fa fa-hospital-o"></i>&nbsp;Edificio</label>
			<select class="form-control" required="" name="cbx_municipio" id="cbx_municipio"></select></div>
			
			<br />
			
			<div><label><i class="fa fa-hospital-o"></i>&nbsp;Ubicación</label>
			<select class="form-control" required="" name="ubicacion_id" id="ubicacion_id"></select></div>
			<br>
			<div><label><i class="fa fa-hospital-o"></i>&nbsp;Area</label>
			<select class="form-control" required="" name="area" id="area"></select></div>
			<br>
			<div class="form-group">
                            <label class="col-sm-222 control-label">Número de Serie</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" required="" type="text" placeholder="Número de serie" maxlength="30" name="equipo" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			<br>
		<div class="form-group">
                    <label class="col-sm-222 control-label">Flujo de aire a manejar (CFM)</label>
                        <div class='col-sm-110'>
                        <div class="input-group">
                        <input class="form-control" type="text" maxlength="20" name="cfm_equipo" >
				  	   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                        </div>
                    </div>
            </div>
			<!--/////////////////////////////////////////////////////////////////////////////////////////////-->
			
			<font size=4 color="green" FACE="arial" class="col-sm-222 control-label">Filtro 1era Etapa</font>
			<br>		
				<div class="form-group">
                            <label class="col-sm-222 control-label">Velocidad paso por filtro</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="10" name="vel_filtro_f1" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>	
				<div class="form-group">
                            <label class="col-sm-222 control-label">Area Filtracion(ft)</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="10" name="area_filt_f1" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			<div class="form-group">
                            <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="70" name="modelo_f1" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="alto_f1">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="frente_f1" >
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="fondo_f1" >
              </div>	
				 	<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
              <div class="col-sm-2">
                        <div class="input-group">
                            <select class="form-control" name="um_f1"  maxlength="20">              
								<option value=""></option>     
                                <option value="mm">Milimetros</option>                               
                                <option value="cm">Centimetros</option>
                                <option value="plg">Pulgadas</option>
                                <option value="m">Metros</option>
                                <option value="ft">Pies</option>
                            </select>
                        </div>
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="pz_f1" >
              </div>
			   <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/Filtro</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_filtro_f1" >
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/ Filtro a 500</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_fil_fab_f1" >
              </div>
              </div>   
             <br><br><br><br><br>
			 <!--//////////////////////////////////////////////////////////////////////////////////////////-->
			 
			<div class="form-group">
                            <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="70" name="modelo_f1_2" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="alto_f1_2">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="frente_f1_2" >
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="fondo_f1_2" >
              </div>	
					<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
              <div class="col-sm-2">
                        <div class="input-group">
                            <select class="form-control" name="um_f1_2"  maxlength="20">              
								<option value=""></option>     
                                <option value="mm">Milimetros</option>                               
                                <option value="cm">Centimetros</option>
                                <option value="plg">Pulgadas</option>
                                <option value="m">Metros</option>
                                <option value="ft">Pies</option>
                            </select>
                        </div>
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="pz_f1_2" >
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/Filtro</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_filtro_f1_2" >
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/ Filtro a 500</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_fil_fab_f1_2" >
              </div>
              </div>   
			  <br><br><br><br><br>
			   <!--////////////////////////////////////////////////////////////////////////////////////7-->
			   	
			<div class="form-group">
                            <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="70" name="modelo_f1_3" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="alto_f1_3">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="frente_f1_3" >
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="fondo_f1_3" >
              </div>
					<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
              <div class="col-sm-2">
                        <div class="input-group">
                            <select class="form-control" name="um_f1_3"  maxlength="20">              
								<option value=""></option>     
                                <option value="mm">Milimetros</option>                               
                                <option value="cm">Centimetros</option>
                                <option value="plg">Pulgadas</option>
                                <option value="m">Metros</option>
                                <option value="ft">Pies</option>
                            </select>
                        </div>
              </div>	
				 <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="pz_f1_3" >
              </div>	
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/Filtro</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_filtro_f1_3" >
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/ Filtro a 500</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_fil_fab_f1_3" >
              </div>
              </div> 
             <br><br><br><br><br>
						<div class="form-group">
                            <label class="col-sm-222 control-label">SP Inicial "W.G"</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="10" name="sp_ini_wg_f1" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-222 control-label">SP Cambio "W.G"</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="10" name="sp_can_wg_f1" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			 <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////-->
			
			<font size=4 color="green" FACE="arial"  class="col-sm-222 control-label">Filtro 2da Etapa</font>
			<br>
			<div class="form-group">
                            <label class="col-sm-222 control-label">Velocidad paso por filtro</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="10" name="vel_filtro_f2" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>		
				<div class="form-group">
                            <label class="col-sm-222 control-label">Area Filtracion(ft)</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="10" name="area_filt_f2" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			<div class="form-group">
                            <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="70" name="modelo_f2" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="alto_f2">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="frente_f2" >
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="fondo_f2" >
              </div>	
				        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
              <div class="col-sm-2">
                        <div class="input-group">
                            <select class="form-control" name="um_f2"  maxlength="20">              
								<option value=""></option>     
                                <option value="mm">Milimetros</option>                               
                                <option value="cm">Centimetros</option>
                                <option value="plg">Pulgadas</option>
                                <option value="m">Metros</option>
                                <option value="ft">Pies</option>
                            </select>
                        </div>
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="pz_f2" >
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/Filtro</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_filtro_f2" >
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/ Filtro a 500</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_fil_fab_f2" >
              </div>
              </div>   
			   <br><br><br><br><br>
			  <!--/////////////////////////////////////////////////////////////////////////////////////////-->
			
			<div class="form-group">
                            <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="70" name="modelo_f2_2" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="alto_f2_2">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="frente_f2_2" >
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="fondo_f2_2" >
              </div>
					<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
              <div class="col-sm-2">
                        <div class="input-group">
                            <select class="form-control" name="um_f2_2"  maxlength="20">              
								<option value=""></option>     
                                <option value="mm">Milimetros</option>                               
                                <option value="cm">Centimetros</option>
                                <option value="plg">Pulgadas</option>
                                <option value="m">Metros</option>
                                <option value="ft">Pies</option>
                            </select>
                        </div>
              </div>	
				 <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="pz_f2_2" >
              </div>	
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/Filtro</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_filtro_f2_2" >
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/ Filtro a 500</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_fil_fab_f2_2" >
              </div>
              </div>  
			<br><br><br><br><br>
			 <!--////////////////////////////////////////////////////////////////////////////////////7-->
			   	
			<div class="form-group">
                            <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="70" name="modelo_f2_3" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="alto_f2_3">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="frente_f2_3" >
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="fondo_f2_3" >
              </div>
					<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
              <div class="col-sm-2">
                        <div class="input-group">
                            <select class="form-control" name="um_f2_3"  maxlength="20">              
								<option value=""></option>     
                                <option value="mm">Milimetros</option>                               
                                <option value="cm">Centimetros</option>
                                <option value="plg">Pulgadas</option>
                                <option value="m">Metros</option>
                                <option value="ft">Pies</option>
                            </select>
                        </div>
              </div>	
				 <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="pz_f2_3" >
              </div>	
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/Filtro</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_filtro_f2_3" >
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/ Filtro a 500</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_fil_fab_f2_3" >
              </div>
              </div> 
             <br><br><br><br><br>
		<div class="form-group">
                            <label class="col-sm-222 control-label">SP Inicial "W.G"</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="10" name="sp_ini_wg_f2" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-222 control-label">SP Cambio "W.G"</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="10" name="sp_can_wg_f2" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			 <!--////////////////////////////////////////////////////////////////////////////////////////////////////-->
			
			<font size=4 color="green" FACE="arial"  class="col-sm-222 control-label">Filtro 3era Etapa</font>
			<br>
			<div class="form-group">
                            <label class="col-sm-222 control-label">Velocidad paso por filtro</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="10" name="vel_filtro_f3" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
				<div class="form-group">
                            <label class="col-sm-222 control-label">Area Filtracion(ft)</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="10" name="area_filt_f3" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			<div class="form-group">
                            <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="70" name="modelo_f3" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="alto_f3">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="frente_f3" >
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="fondo_f3" >
              </div>	
					<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
              <div class="col-sm-2">
                        <div class="input-group">
                            <select class="form-control" name="um_f3"  maxlength="20">              
								<option value=""></option>     
                                <option value="mm">Milimetros</option>                               
                                <option value="cm">Centimetros</option>
                                <option value="plg">Pulgadas</option>
                                <option value="m">Metros</option>
                                <option value="ft">Pies</option>
                            </select>
                        </div>
              </div>
					<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="pz_f3" >
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/Filtro</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_filtro_f3" >
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/ Filtro a 500</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_fil_fab_f3" >
              </div>
              </div>   
              
			   <br><br><br><br><br>
			  <!--/////////////////////////////////////////////////////////////////////////////////////////-->
			
			<div class="form-group">
                            <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="70" name="modelo_f3_2" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="alto_f3_2">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="frente_f3_2" >
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="fondo_f3_2" >
              </div>
					<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
              <div class="col-sm-2">
                        <div class="input-group">
                            <select class="form-control" name="um_f3_2"  maxlength="20">              
								<option value=""></option>     
                                <option value="mm">Milimetros</option>                               
                                <option value="cm">Centimetros</option>
                                <option value="plg">Pulgadas</option>
                                <option value="m">Metros</option>
                                <option value="ft">Pies</option>
                            </select>
                        </div>
              </div>	
				 <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="pz_f3_2" >
              </div>	
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/Filtro</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_filtro_f3_2" >
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/ Filtro a 500</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_fil_fab_f3_2" >
              </div>
              </div>   
			  <br><br><br><br><br>
			   <!--////////////////////////////////////////////////////////////////////////////////////7-->
			   	
			<div class="form-group">
                            <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="70" name="modelo_f3_3" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="alto_f3_3">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="frente_f3_3" >
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="fondo_f3_3" >
              </div>
					<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
              <div class="col-sm-2">
                        <div class="input-group">
                            <select class="form-control" name="um_f3_3"  maxlength="20">              
								<option value=""></option>     
                                <option value="mm">Milimetros</option>                               
                                <option value="cm">Centimetros</option>
                                <option value="plg">Pulgadas</option>
                                <option value="m">Metros</option>
                                <option value="ft">Pies</option>
                            </select>
                        </div>
              </div>	
				 <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="pz_f3_3" >
              </div>	
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/Filtro</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_filtro_f3_3" >
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/ Filtro a 500</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_fil_fab_f3_3" >
              </div>
              </div>
             <br><br><br><br><br>
		<div class="form-group">
                            <label class="col-sm-222 control-label">SP Inicial "W.G"</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="10" name="sp_ini_wg_f3" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-222 control-label">SP Cambio "W.G"</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="10" name="sp_can_wg_f3" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			 <!--/////////////////////////////////////////////////////////////////////////////////////////////-->
			
			<font size=4 color="green" FACE="arial"  class="col-sm-222 control-label">Filtro 4ta Etapa</font>
			<br>
			<div class="form-group">
                            <label class="col-sm-222 control-label">Velocidad paso por filtro</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="10" name="vel_filtro_f4" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>	
				<div class="form-group">
                            <label class="col-sm-222 control-label">Area Filtracion(ft)</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="10" name="area_filt_f4" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			<div class="form-group">
                            <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="70" name="modelo_f4" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="alto_f4">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="frente_f4" >
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="fondo_f4" >
              </div>
					<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
              <div class="col-sm-2">
                        <div class="input-group">
                            <select class="form-control" name="um_f4"  maxlength="20">              
								<option value=""></option>     
                                <option value="mm">Milimetros</option>                               
                                <option value="cm">Centimetros</option>
                                <option value="plg">Pulgadas</option>
                                <option value="m">Metros</option>
                                <option value="ft">Pies</option>
                            </select>
                        </div>
              </div>
					 <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="pz_f4" >
              </div>	
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/Filtro</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_filtro_f4" >
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/ Filtro a 500</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_fil_fab_f4" >
              </div>
              </div>   
               <br><br><br><br><br>
			   <!--////////////////////////////////////////////////////////////////////////////////////7-->
			   	
			<div class="form-group">
                            <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="70" name="modelo_f4_2" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="alto_f4_2">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="frente_f4_2" >
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="fondo_f4_2" >
              </div>
					<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
              <div class="col-sm-2">
                        <div class="input-group">
                            <select class="form-control" name="um_f4_2"  maxlength="20">              
								<option value=""></option>     
                                <option value="mm">Milimetros</option>                               
                                <option value="cm">Centimetros</option>
                                <option value="plg">Pulgadas</option>
                                <option value="m">Metros</option>
                                <option value="ft">Pies</option>
                            </select>
                        </div>
              </div>	
				 <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="pz_f4_2" >
              </div>	
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/Filtro</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_filtro_f4_2" >
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/ Filtro a 500</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_fil_fab_f4_2" >
              </div>
              </div>   
			  <br><br><br><br><br>
			   <!--////////////////////////////////////////////////////////////////////////////////////7-->
			   	
			<div class="form-group">
                            <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="70" name="modelo_f4_3" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="alto_f4_3">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="frente_f4_3" >
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="fondo_f4_3" >
              </div>
					<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
              <div class="col-sm-2">
                        <div class="input-group">
                            <select class="form-control" name="um_f4_3"  maxlength="20">              
								<option value=""></option>     
                                <option value="mm">Milimetros</option>                               
                                <option value="cm">Centimetros</option>
                                <option value="plg">Pulgadas</option>
                                <option value="m">Metros</option>
                                <option value="ft">Pies</option>
                            </select>
                        </div>
              </div>	
				 <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="pz_f4_3" >
              </div>	
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/Filtro</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_filtro_f4_3" >
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/ Filtro a 500</font>
              <div class="col-sm-2">
                  <input type="text" maxlength="10" class="form-control" name="cfm_fil_fab_f4_3" >
              </div>
              </div>
<br><br><br><br><br>			  
			<div class="form-group">
                            <label class="col-sm-222 control-label">SP Inicial "W.G"</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="10" name="sp_ini_wg_f4" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-222 control-label">SP Cambio "W.G"</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" maxlength="10" name="sp_can_wg_f4" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
                        <br><br>
						<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->
			
						
						
						<div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10 text-center">
                              <button type="submit" class="btn btn-info">Guardar</button>
                          </div>
                        </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
}else{
	header('Location: index.php');
}
?>
<script>
    $(document).ready(function(){
        $("#input_user").keyup(function(){
            $.ajax({
                url:"./process/val.php?id="+$(this).val(),
                success:function(data){
                    $("#com_form").html(data);
                }
            });
        });
    });
	
</script>
