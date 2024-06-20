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
      </li>>
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
      </li
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


 
  <!--/////////////////////////////////////////////////////////-->
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
						$.post("getubicacion.php", { id: id }, function(data){
							$("#ubicacion_id").html(data);
						});            
					});
				})
			});
		</script>
 <!--/////////////////////////////////////////////////////////-->
  <?php
 include ("conexi.php");

	if(isset($_POST['empresa']) && isset($_POST['edificio']) && isset($_POST['ubicacion'])){ 
			
			if(isset($_POST['empresa'])){
			$empresa= $_POST['empresa'];
		}else{
			$empresa="";
		}
		if(isset($_POST['edificio'])){
			$edificio= $_POST['edificio'];
		}else{
			$edificio="";
		}
		if(isset($_POST['ubicacion'])){
			$ubicacion= $_POST['ubicacion'];
		}else{
			$ubicacion="";
		}
		if(isset($_POST['equipo'])){
			$equipo= $_POST['equipo'];
		}else{
			$equipo="";
		}
		if(isset($_POST['num_fila'])){
			$num_fila= $_POST['num_fila'];
		}else{
			$num_fila="";
		}
		if(isset($_POST['servicio'])){
			$servicio= $_POST['servicio'];
		}else{
			$servicio="";
		}
		if(isset($_POST['etiqueta1'])){
			$etiqueta1= $_POST['etiqueta1'];
		}else{
			$etiqueta1="";
		}
		if(isset($_POST['etiqueta2'])){
			$etiqueta2= $_POST['etiqueta2'];
		}else{
			$etiqueta2="";
		}
		if(isset($_POST['etiqueta3'])){
			$etiqueta3= $_POST['etiqueta3'];
		}else{
			$etiqueta3="";
		}
		if(isset($_POST['etiqueta4'])){
			$etiqueta4= $_POST['etiqueta4'];
		}else{
			$etiqueta4="";
		}
		if(isset($_POST['etiqueta5'])){
			$etiqueta5= $_POST['etiqueta5'];
		}else{
			$etiqueta5="";
		}
		$con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("INSERT INTO config(empresa, edificio, ubicacion,  equipo, num_fila, servicio, etiqueta1, etiqueta2, etiqueta3, etiqueta4, etiqueta5)VALUES('$empresa','$edificio','$ubicacion', '$equipo','$num_fila','$servicio','$etiqueta1','$etiqueta2','$etiqueta3','$etiqueta4','$etiqueta5')"))){
		  echo '
                <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="tarea.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">Empresa GUARDADA</h4>
                    <p class="text-center">
                        La Empresa ha sido guardada exitosamente
                    </p>
                </div>
            ';

          }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                  <a href="tarea.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido guardar la empresa.<br> Llave duplicada.
                    </p>
                </div>
            ';
          }
        }
		?>
  <div id="header_logo">
    <a href=""></a>
  </div>
</header>
<section id="content">
  <header id="content-header">
  
  <table>  
    <td>
		<tr>
       <a href="seccion.php" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
	   </tr>
	</td>
	   </table>
		<!--************************************ Page content******************************-->
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Adicionar Servicio Config</h1>
                <span class="label label-danger"></span> 		 
				<p class="pull-right text-primary"></p>
		   </div>
            </div>
          </div>
        </div>
		<!--************************************ Page content******************************-->
			
		<div class="container">
  <div class="row">
    <div class="col-sm-8">
      <div class="panel panel-success">
        <div class="panel-heading text-center"><strong>Para poder Agregar un equipo y sus servicios es necesario llenar los siguientes campos</strong></div>
        <div class="panel-body">
            <form role="form" action="" method="POST" enctype="multipart/form-data">
            			
			<div class="form-group">
              <label class="control-label">&nbsp;Empresa</label>
              <select class="form-control" name="empresa" id="empresa">
				<option class="form-control" required="" value="">Seleccionar Empresa</option>
				<?php
								$connect = mysqli_connect("localhost", "veco", "Vec83Dv19iSa@", "veco_sims_devecchi");
								$query = "SELECT * FROM empresas Order by razon_social";
								$result = mysqli_query($connect, $query);
								?>	
				<?php foreach($result as $row){ ?> 
					<option value="<?php echo $row['razon_social']; ?>"><?php echo $row['razon_social']; ?></option>
				<?php } ?>
			</select>
            </div>
			
						<div class="form-group">
                            <label class="col-sm-222 control-label">Edificio</label>
                             <select class="form-control" name="edificio" id="edificio">
				<option class="form-control" required="" value="">Seleccionar Edificio</option>
				<?php
								$connect = mysqli_connect("localhost", "veco", "Vec83Dv19iSa@", "veco_sims_devecchi");
								$query = "SELECT * FROM edificio";
								$result = mysqli_query($connect, $query);
								?>	
				<?php foreach($result as $row){ ?> 
					<option value="<?php echo $row['descripcion']; ?>"><?php echo $row['descripcion']; ?></option>
				<?php } ?>
			</select>
                        </div>
                    
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Ubicación</label>
                            <select class="form-control" name="ubicacion" id="ubicacion">
				<option class="form-control" required="" value="">Seleccionar Ubicación</option>
				<?php
								$connect = mysqli_connect("localhost", "veco", "Vec83Dv19iSa@", "veco_sims_devecchi");
								$query = "SELECT * FROM ubicacion";
								$result = mysqli_query($connect, $query);
								?>	
				<?php foreach($result as $row){ ?> 
					<option value="<?php echo $row['ubicacion']; ?>"><?php echo $row['ubicacion']; ?></option>
				<?php } ?>
			</select>
                        </div>
						
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Equipo</label>
                            <select class="form-control" name="equipo" id="equipo">
				<option class="form-control" required="" value="">Seleccionar Equipo</option>
				<?php
								$connect = mysqli_connect("localhost", "veco", "Vec83Dv19iSa@", "veco_sims_devecchi");
								$query = "SELECT * FROM equipo";
								$result = mysqli_query($connect, $query);
								?>	
				<?php foreach($result as $row){ ?> 
					<option value="<?php echo $row['equipo']; ?>"><?php echo $row['equipo']; ?></option>
				<?php } ?>
			</select>
                        </div>

						<div class="form-group">
                          <label  class="col-sm-222 control-label">Núm Fila</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" required="" name="num_fila" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
                        <div class="form-group">
                            <label>&nbsp;Servicio</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="servicio">                                        
                                        <option value=""></option>                                        
                                        <option value="Pre-Filtro Etapa 1">Pre-Filtro Etapa 1</option>
                                        <option value="Pre-Filtro Etapa 2">Pre-Filtro Etapa 2</option>
										<option value="Filtro Mediano">Filtro Mediano</option>
										<option value="Filtro HEPA">Filtro HEPA</option>
										<option value="Motoventilador">Motoventilador</option>										
										<option value="Serpentín">Serpentín</option>
										<option value="Estructura">Estructura</option>
										<option value="Condensados Charola">Condensados Charola</option>
										<option value="Tuberias">Tuberias</option>										
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label>&nbsp;Etiquta 1</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="etiqueta1">                                        
                                        <option value=""></option>
                                        <option value="Lectura de presión (Max 1.90)">Lectura de presión (Max 1.90)</option>
										<option value="Limpieza">Limpieza</option>
										<option value="Vibración">Vibración</option>
										<option value="Integridad">Integridad</option>
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label>&nbsp;Etiquta 2</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="etiqueta2">                                        
                                        <option value=""></option>
                                        <option value="Cambio (Si / No)">Cambio (Si / No)</option>
										<option value="Limpieza">Limpieza</option>
										<option value="Sellos">Sellos</option>
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label>&nbsp;Etiquta 3</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="etiqueta3">                                        
                                        <option value=""></option>
                                        <option value="Limpieza">Limpieza</option>
										<option value="Vibración">Vibración</option>
										<option value="Engrasado">Engrasado</option>
										<option value="Niveles">Niveles</option>
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label>&nbsp;Etiquta 4</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="etiqueta4">                                        
                                        <option value=""></option>
                                        
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label>&nbsp;Etiquta 5</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="etiqueta5">                                        
                                        <option value=""></option>
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10 text-center">
                              <button type="submit" name="boton" class="btn btn-info">Guardar</button>
                          </div>
                        </div>
                    <br>
            </form>
            </div><!--col-md-12-->
          </div><!--container-->
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
