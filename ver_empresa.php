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
  <title>Ver Empresa</title>
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
      <li  class="active">
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
 
  <div id="header_logo">
    <a href=""></a>
  </div>
</header>
<section id="content">
  <header id="content-header">
  
  <table>  
    <td>
		<tr>
       <a href="empresa.php" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
	   </tr>
	</td>
	   </table>
		<!--************************************ Page content******************************-->
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Ver Empresa </h1>
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
        <div class="panel-heading text-center"><strong></strong></div>
        <div class="panel-body">
            <form role="form" action="" method="POST" enctype="multipart/form-data">
		
    <?php
	include './lib/class_mysql.php';
include './lib/config.php';

$id = MysqlQuery::RequestGet('id');
	$sql = Mysql::consulta("SELECT * FROM empresas WHERE id= '$id'");
	$reg=mysqli_fetch_array($sql, MYSQLI_ASSOC);

?>
	  <fieldset>
						<div class="form-group">
                            <label class="col-sm-222 control-label">Id</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="id_edit" readonly=""  value="<?php echo utf8_decode($reg['id'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
                        <div class="form-group">
                            <label class="col-sm-222 control-label">RFC</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="rfc" readonly="" value="<?php echo utf8_decode($reg['rfc'])?>">
                                <span class="input-group-addon"></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Razón Social</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="razon_social" readonly="" value="<?php echo utf8_decode($reg['razon_social'])?>">
                                <span class="input-group-addon"></span>
                              </div>
                          </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Nombre Corto</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" readonly="" type="text" name="nombre_corto" readonly="" value="<?php echo utf8_decode($reg['nombre_corto'])?>">
								   <span class="input-group-addon"></span>
                                </div>
                            </div>
                        </div>
						
						<!--div class="form-group">
                            <label for="logotipo" class="col-sm-222 control-label">Logotipo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
								<img src="data:image/jpg;base64,<?php //echo base64_encode($reg['logotipo'])?>" width='100'/>
								   <?php 
								   //funciona para mostrar imagenes que estan en el servidor mas no en la base de datos
						/*
							$path = "files/".$id;
							if(file_exists($path)){
								$directorio = opendir($path);
								while ($archivo = readdir($directorio))
								{
									if (!is_dir($archivo)){
										//echo "<div data='".$path."/".$archivo."'><a href='".$path."/".$archivo."' title='Ver Archivo Adjunto'><span class='glyphicon glyphicon-picture'></span></a>";
										//echo "$archivo <a href='#' class='delete' title='Ver Archivo Adjunto' ><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></div>";
										echo "<img src='files/$id/$archivo' width='150' />";
									}
								}
							}
							*/
							?>						
                                </div>
                            </div>
                        </div-->
                    
                        <div class="form-group">
                            <label class="col-sm-222 control-label">calle</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" readonly="" type="text" name="calle" readonly="" value="<?php echo utf8_decode($reg['calle'])?>">
								   <span class="input-group-addon"></span>
                                </div>
                            </div>
                        </div>

						<div class="form-group">
                          <label  class="col-sm-222 control-label">Núm Exterior</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="numero_exterior" readonly="" value="<?php echo utf8_decode($reg['numero_exterior'])?>">
								  <span class="input-group-addon"></span>
                              </div>
                          </div>
                        </div>
						
                        <div class="form-group">
                          <label  class="col-sm-222 control-label">Núm Interior</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="numero_interior" readonly="" value="<?php echo utf8_decode($reg['numero_interior'])?>">
								  <span class="input-group-addon"></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Colonia</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="colonia" readonly="" value="<?php echo utf8_decode($reg['colonia'])?>">
                                <span class="input-group-addon"></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Municipio</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="municipio" readonly="" value="<?php echo utf8_decode($reg['municipio'])?>">
                                <span class="input-group-addon"></span>
                              </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-222 control-label">Entidad Federativa</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input class="form-control" readonly=""  name="entidad_federativa" readonly="" value="<?php echo utf8_decode($reg['entidad_federativa'])?>">
								  <span class="input-group-addon"></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-222 control-label">Codigo Postal</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="codigo_postal" readonly=""  value="<?php echo utf8_decode($reg['codigo_postal'])?>">
								  <span class="input-group-addon"></span>
                              </div> 
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">País</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="pais" readonly="" value="<?php echo utf8_decode($reg['pais'])?>">
								  <span class="input-group-addon"></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-222 control-label">Dirección GPS</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="direccion_gps" readonly="" value="<?php echo utf8_decode($reg['direccion_gps'])?>">
								  <span class="input-group-addon"></span>
                              </div> 
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Nombre del Contacto</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="contacto_nombre" readonly="" value="<?php echo utf8_decode($reg['contacto_nombre'])?>">
                                <span class="input-group-addon"></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Apellido del Contacto</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="contacto_apellido" readonly="" value="<?php echo utf8_decode($reg['contacto_apellido'])?>">
                                <span class="input-group-addon"></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Puesto del Contacto</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="contacto_puesto" readonly="" value="<?php echo utf8_decode($reg['contacto_puesto'])?>">
                                <span class="input-group-addon"></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Email del Contacto</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="email" class="form-control" readonly="" name="contacto_email" readonly="" value="<?php echo utf8_decode($reg['contacto_email'])?>">
                                <span class="input-group-addon"></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Telefono del Contacto</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="contacto_telefono" readonly="" value="<?php echo utf8_decode($reg['contacto_telefono'])?>">
                                <span class="input-group-addon"></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
							<label for="archivo" class="col-sm-2 control-label">Archivo</label>
							<br/>
							<br/>
							<?php
								$rfc = $reg['rfc'];
								
					$ruta = "files/empresas/$rfc/"; //era $rfc
					if(!file_exists($ruta)){
						mkdir($ruta);
					}
					if($dir = opendir($ruta)){
						while($archivo = readdir($dir)){
							if($archivo != '.' && $archivo != '..'){
								echo "<a href='files/empresas/$rfc/$archivo' target='_blank'><img src='./img/documento.png' width='60' height='60'/> <strong>$archivo</strong><br/></a> ";
							}
						}
					}
						?>
						</div>
							
						</fieldset>		
</form>			
                    <br>
            
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