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
  <title>Copiar Empresa</title>
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
		
    <?php
  include ("conexi.php");
  
  if(isset($_POST['rfc']) && isset($_POST['razon_social'])){        

        	if(isset($_POST['rfc'])){
			$rfc= $_POST['rfc'];
		}else{
			$rfc="";
		}
		if(isset($_POST['razon_social'])){
			$razon_social= $_POST['razon_social'];
		}else{
			$razon_social="";
		}
		if(isset($_POST['nombre_corto'])){
			$nombre_corto= $_POST['nombre_corto'];
		}else{
			$nombre_corto="";
		}
				
		if(isset($_POST['calle'])){
			$calle= $_POST['calle'];
		}else{
			$calle="";
		}
		
		/////////////////////////////////////////////////////////////////		
		/*$num_archivo=count($_FILES['archivo']['name']);
		for ($i=0; $i <=$num_archivo; $i++){
			if(!empty($_FILES['archivo']['name'][$i])){
				
				$ruta_nueva="files/empresas/$rfc"; //era rfc
				$rnombre=$_FILES['archivo']['name'][$i];
		if(!file_exists($ruta_nueva)){
						mkdir($ruta_nueva);
					}
				$ruta_nueva=$ruta_nueva."/".$_FILES['archivo']['name'][$i];
				if(file_exists($ruta_nueva)){
					echo "";
				}else{
					$ruta_temporal=$_FILES['archivo']['tmp_name'][$i];
					move_uploaded_file($ruta_temporal, $ruta_nueva);
					echo"";
				}
			}
		}	*/ 
		/////////////////////////////////////////////////////////////////
		
		
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
			$con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("INSERT INTO empresas(rfc, razon_social, nombre_corto, calle, numero_exterior, numero_interior, colonia, municipio, entidad_federativa, codigo_postal, pais, direccion_gps, contacto_nombre, contacto_apellido, contacto_puesto, contacto_email, contacto_telefono)VALUES('$rfc','$razon_social','$nombre_corto', '$calle','$numero_exterior','$numero_interior','$colonia','$municipio','$entidad_federativa','$codigo_postal','$pais','$direccion_gps','$contacto_nombre','$contacto_apellido','$contacto_puesto','$contacto_email','$contacto_telefono')"))){
			
            echo '
			<div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="empresa.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">Empresa GUARDADO</h4>
                    <p class="text-center">
                        La Empresa ha sido guardada exitosamente
                    </p>
                </div>
				';

          }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                  <a href="empresa.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido guardar la empresa.<br> Llave duplicada.
                    </p>
                </div>
            ';
          }
        }


	include './lib/class_mysql.php';
include './lib/config.php';

$id = MysqlQuery::RequestGet('id');
	$sql = Mysql::consulta("SELECT * FROM empresas WHERE id= '$id'");
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
       <a href="empresa.php" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
	   </tr>
	</td>
	   </table>
		<!--************************************ Page content******************************-->
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Copiar Empresa</h1>
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
                        
						<input type="hidden" readonly="" name="id_edit" readonly="" value="<?php echo $reg['id']?>">
						
                        <!--div class="form-group">
                            <label class="col-sm-222 control-label">RFC</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" required="" class="form-control" name="rfc" value="">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
								 <div id="com_form"></div>
                              </div>
                          </div>
                        </div-->
						<div class="form-group">
              <label class="control-label"><i class="fa fa-user"></i>&nbsp;RFC</label>
              <input type="text" id="input_user" class="form-control" name="rfc" placeholder="RFC" required=""  maxlength="20">
              <div id="com_form"></div>
            </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Razón Social</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" required="" class="form-control" name="razon_social" value="">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Nombre Corto</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" required="" type="text" name="nombre_corto" value="<?php echo utf8_decode($reg['nombre_corto'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<!--div class="form-group">
                            <label for="logotipo" class="col-sm-222 control-label">Logotipo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
								<img src="data:image/jpg;base64,<?php// echo base64_encode($reg['logotipo'])?>" width='100'/>								 				
                                </div>
                            </div>
                        </div-->
                    
                        <div class="form-group">
                            <label class="col-sm-222 control-label">calle</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" required="" type="text" name="calle" value="<?php echo utf8_decode($reg['calle'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>

						<div class="form-group">
                          <label  class="col-sm-222 control-label">Núm Exterior</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" required=""  name="numero_exterior" value="<?php echo utf8_decode($reg['numero_exterior'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
                        <div class="form-group">
                          <label  class="col-sm-222 control-label">Núm Interior</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control"  name="numero_interior" value="<?php echo utf8_decode($reg['numero_interior'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Colonia</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" required="" name="colonia" value="<?php echo utf8_decode($reg['colonia'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Municipio</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" required="" name="municipio" value="<?php echo utf8_decode($reg['municipio'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-222 control-label">Entidad Federativa</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input class="form-control" required="" name="entidad_federativa" value="<?php echo utf8_decode($reg['entidad_federativa'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-222 control-label">Codigo Postal</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" required=""  name="codigo_postal" value="<?php echo utf8_decode($reg['codigo_postal'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">País</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" required="" name="pais" value="<?php echo utf8_decode($reg['pais'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-222 control-label">Dirección GPS</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control"  name="direccion_gps" value="<?php echo utf8_decode($reg['direccion_gps'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Nombre del Contacto</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" required="" name="contacto_nombre" value="<?php echo utf8_decode($reg['contacto_nombre'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Apellido del Contacto</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" required="" name="contacto_apellido" value="<?php echo utf8_decode($reg['contacto_apellido'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Puesto del Contacto</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" required="" name="contacto_puesto" value="<?php echo utf8_decode($reg['contacto_puesto'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Email del Contacto</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" required="" name="contacto_email" value="<?php echo utf8_decode($reg['contacto_email'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Telefono del Contacto</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" required="" name="contacto_telefono" value="<?php echo utf8_decode($reg['contacto_telefono'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
						<!--div class="caja">
						<form method="post" action="" required="" enctype="multipart/form-data">
						<h3> Archivo 1</h3>
						<input type="file"  required="" name="archivo[]"/>
						</div>
						<div class="caja">
						<form method="post" action="" enctype="multipart/form-data">
						<h3> Archivo 2</h3>
						<input type="file" name="archivo[]"/>
						</div>
						<div class="caja">
						<form method="post" action="" enctype="multipart/form-data">
						<h3> Archivo 3</h3>
						<input type="file" name="archivo[]"/>
						</div-->
						
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
<script>
    $(document).ready(function(){
        $("#input_user").keyup(function(){
            $.ajax({
                url:"./process/val_empresa.php?id="+$(this).val(),
                success:function(data){
                    $("#com_form").html(data);
                }
            });
        });
    });
</script>

<footer></footer>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
</body>
</html>