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
  <title>Copiar Sección</title>
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
    width: 100%;
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
					//$('#ubicacion_id').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
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
				//	$('#area_id').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					$("#cbx_municipio option:selected").each(function () {
						id = $(this).val();
						$.post("getubicacion.php", { id: id }, function(data){
							$("#ubicacion_id").html(data);
						});            
					});
				})
			});
			
			$(document).ready(function(){
				$("#ubicacion_id").change(function () {
					$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					$("#ubicacion_id option:selected").each(function () {
						id = $(this).val();
						$.post("get_seccion.php", { id: id }, function(data){
							$("#equipo_id").html(data);
						});            
					});
				})
			});
			$(document).ready(function(){
				$("#equipo_id").change(function () {
					$("#equipo_id option:selected").each(function () {
						id = $(this).val();
						$.post("includes/getLocalidad.php", { id: id }, function(data){
							$("#cbx_localidad").html(data);
						});            
					});
				})
			});
		</script>
 <!--/////////////////////////////////////////////////////////-->
    <?php
  include ("conexi.php");
  
  if(isset($_POST['empresa_id']) && isset($_POST['seccion'])){        

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
		if(isset($_POST['equipo_id'])){
			$equipo_id= $_POST['equipo_id'];
		}else{
			$equipo_id="";
		}
		if(isset($_POST['seccion'])){
			$descripcion= $_POST['seccion'];
		}else{
			$descripcion="";
		}
		
			$con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("INSERT INTO seccion(empresa_id, edificio_id, ubicacion_id, equipo_id, seccion)VALUES('$empresa_id','$edificio_id','$ubicacion_id', '$equipo_id','$descripcion')"))){
			
            echo '
			<div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="seccion.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">Sección GUARDADO</h4>
                    <p class="text-center">
                        La Sección ha sido guardada exitosamente
                    </p>
                </div>
				';

          }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="seccion.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido guardar la sección. Por favor intente nuevamente.
                    </p>
                </div>
            ';
          }
        }


	include './lib/class_mysql.php';
include './lib/config.php';

$id = MysqlQuery::RequestGet('id');
	$sql = Mysql::consulta("SELECT * FROM seccion WHERE id_seccion= '$id'");
	$reg=mysqli_fetch_array($sql, MYSQLI_ASSOC);

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
                <h1 class="animated lightSpeedIn">Copiar Sección</h1>
                <span class="label label-danger"></span>
                <p class="pull-right text-primary">
                </p>
			  </div>
			</div>
		  </div>
		</div>
		<!--************************************ Page content******************************-->
<div class="container">
  <div class="row">
    <div class="col-sm-8">
      <div class="panel panel-success">
        <div class="panel-heading text-center"><strong>Modifique la información necesaria en la siguiente copia</strong></div>
        <div class="panel-body">
			<form role="form" action="" method="POST">
                        
						<input type="hidden" readonly="" name="id_edit" readonly="" value="<?php echo $reg['id_seccion']?>">
						
                        <!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->
						<div><label><i class="fa fa-hospital-o"></i>&nbsp;Empresa</label>
						<select class="form-control" name="empresa_id" id="empresa_id">
				<option class="form-control" required="" value="0">Seleccionar Empresa</option>
				<?php
								$connect = mysqli_connect("localhost", "veco", "Vec83Dv19iSa@", "veco_sims_devecchi");
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
			
			<div><label><i class="fa fa-hospital-o"></i>&nbsp;Equipo</label>
			<select class="form-control" required="" name="equipo_id" id="equipo_id"></select></div>
			
						<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Descripción</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" required="" type="text" placeholder="Descripción" name="seccion" value="<?php echo utf8_decode($reg['seccion'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10 text-center">
                              <button type="submit" class="btn btn-info">Guardar</button>
                          </div>
                        </div>
                    
                    <br>
            </form>
            </div><!--col-md-12-->
          </div><!--container-->
		</div>
	  </div>
      </div>
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