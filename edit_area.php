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
  <title>Editar Área</title>
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
	   <li class="active">
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
  
  <table>  
    <td>
		<tr>
       <a href="area.php" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
	   </tr>
	</td>
	   </table>
		<!--************************************ Page content******************************-->
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Editar Área</h1>
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
        <div class="panel-heading text-center"><strong>Edite la información que se muestra a continuación</strong></div>
        <div class="panel-body">
            <form role="form" action="" method="POST">
		
    <?php
	include './lib/class_mysql.php';
include './lib/config.php';
include ("conexi.php");
/*
if(isset($_POST['rfc']) && isset($_POST['razon_social']) && isset($_POST['nombre_corto'])){
		$id_edit=MysqlQuery::RequestPost('id_edit');
		$rfc=  MysqlQuery::RequestPost('rfc');
		$razon_social=  MysqlQuery::RequestPost('razon_social');
		$nombre_corto=  MysqlQuery::RequestPost('nombre_corto');
		$calle=  MysqlQuery::RequestPost('calle');
		$numero_interior=  MysqlQuery::RequestPost('numero_interior');
		$numero_exterior=  MysqlQuery::RequestPost('numero_exterior');
		$colonia=  MysqlQuery::RequestPost('colonia');
		$municipio=  MysqlQuery::RequestPost('municipio');
		$entidad_federativa = MysqlQuery::RequestPost('entidad_federativa');
		$codigo_postal=  MysqlQuery::RequestPost('codigo_postal');
		$pais=  MysqlQuery::RequestPost('pais');
		$direccion_gps=  MysqlQuery::RequestPost('direccion_gps');
		$contacto_nombre=  MysqlQuery::RequestPost('contacto_nombre');
		$contacto_apellido=  MysqlQuery::RequestPost('contacto_apellido');
		$contacto_puesto=  MysqlQuery::RequestPost('contacto_puesto');
		$contacto_email=  MysqlQuery::RequestPost('contacto_email');
		$contacto_telefono=  MysqlQuery::RequestPost('contacto_telefono');
		
		//if(MysqlQuery::Actualizar("empresas", "nom_largo='$nom_largo', nom_corto='$nom_corto', telefono='$telefono'", "id='$id_edit'")){
	if(MysqlQuery::Actualizar("empresas", "rfc='$rfc', razon_social='$razon_social', nombre_corto='$nombre_corto', logotipo='ruta', calle='$calle', numero_interior='$numero_interior', numero_exterior='$numero_exterior', colonia='$colonia', municipio='$municipio', entidad_federativa='$entidad_federativa', codigo_postal='$codigo_postal', pais='$pais', direccion_gps='$direccion_gps', contacto_nombre='$contacto_nombre', contacto_apellido='$contacto_apellido', contacto_puesto='$contacto_puesto', contacto_email='$contacto_email', contacto_telefono='$contacto_telefono'", "id='$id_edit'")){
		
		*/
		include ("conexi.php");
 
 if(isset($_POST['prioridad']) && isset($_POST['area'])){ 
			
		if(isset($_POST['id_edit'])){
			$id_edit= $_POST['id_edit'];
		}else{
			$id_edit="";
		}
		/*
        	if(isset($_POST['empresa_id'])){
			$empresa_id= $_POST['empresa_id'];
		}else{
			$empresa_id="";
		}
		
		if(isset($_POST['edificio_id'])){
			$edificio_id= $_POST['edificio_id'];
		}else{
			$edificio_id="";
		}
		*/
		if(isset($_POST['area'])){
			$descripcion= $_POST['area'];
		}else{
			$descripcion="";
		}
		if(isset($_POST['prioridad'])){
			$prioridad= $_POST['prioridad'];
		}else{
			$prioridad="";
		}
			$con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("UPDATE area set area='$descripcion', prioridad='$prioridad' WHERE id_area='$id_edit'"))){
		

		
			echo  '<div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="area.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">Cambios Guardados</h4>
                    <p class="text-center">
                        Favor de verificar antes de CERRAR esta ventana
                    </p>
                </div>
            ';
		}else{
			echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="area.php"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido Actualizar el área.
                    </p>
                </div>
            '; 
		}
}
$id = MysqlQuery::RequestGet('id');
	$sql = Mysql::consulta("SELECT * FROM area WHERE id_area= '$id'");
	$reg=mysqli_fetch_array($sql, MYSQLI_ASSOC);

?>
	  <fieldset>
                		<input type="hidden" readonly="" name="id_edit" readonly="" value="<?php echo $reg['id_area']?>">
						
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Empresa</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
							  <?php
							  $sql2 = Mysql::consulta("SELECT * FROM area inner join empresas on area.empresa_id=empresas.id 
																		  inner join edificio on area.edificio_id=edificio.id_edificio WHERE id_area= '$id'");
								$reg2=mysqli_fetch_array($sql2, MYSQLI_ASSOC);
								?>
                                <input type="text" class="form-control" readonly="" name="empresa_id" value="<?php echo utf8_decode($reg2['razon_social'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Edificio</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="edificio_id" value="<?php echo utf8_decode($reg2['descripcion'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Descripción</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" required="" type="text" placeholder="Descripción" maxlength="30" name="area" value="<?php echo utf8_decode($reg['area'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label>&nbsp;Prioridad</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" required="" name="prioridad">
										<option value="<?php echo $reg['prioridad']?>"><?php echo utf8_decode($reg['prioridad'])?> (Actual)</option>
                                        <option value="Rojo-Emergencia">Rojo - Emergencia</option>
                                        <option value="Ambar-En Alerta">Ambar - En Alerta</option>
                                        <option value="Verde-Normal">Verde - Normal</option>
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			</fieldset>			
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