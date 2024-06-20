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
  <title>Referencia</title>
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
	 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<link rel="stylesheet" href="estilos.css">
	<link rel="stylesheet" href="font-awesome.css">

	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="main.js"></script>
<script>
$(function () {
$("#datepicker").datepicker();
});
</script>


    
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
        <a href="#">
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
        <a href="area.php">
          <i class="fa fa-rss-square"></i>
          Área
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
        <a href="seccion.php">
          <i class="fa fa-pie-chart"></i>
        Sección
        </a>
      </li>
	  <li>
        <a href="componente.php">
          <i class="fa fa-codepen"></i>
        Componente
        </a>
      </li>
	   <li>
        <a href="instrumento.php">
          <i class="fa fa-tachometer"></i>
        Instrumento
        </a>
      </li>
	  <li>
        <a href="tarea.php">
          <i class="fa fa-cogs"></i>
          Servicio
        </a>
      </li>
	  <li>
        <a href="./index.php?view=soporte">
          <i class="fa fa-file-archive-o"></i>
        Incidencia
        </a>
      </li>
        <li>
        <a href="tabla_usuarios.php">
          <i class="fa fa-user"></i>
          Usuario
        </a>
		 </li>
	  <li>
        <a href="new_incidencia.php">
          <i class="fa fa-handshake-o"></i>
          Pru Incidencia
        </a>
      </li>
	   <li class="active">
        <a href="list_incidencia.php">
          <i class="fa fa-list"></i>
          Lista Incidencia
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
  
  <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Editar Incidencia</h1>
                <span class="label label-danger"></span>
                <p class="pull-right text-primary">
               </p>
              </div>
            </div>
          </div>
        </div>
  
  <label><select name="" class="fore-control">
  
  <?php
  $connect = mysqli_connect("localhost", "root", "", "veco_sims_devecchi");
$query = "SELECT * FROM usuario";
$result = mysqli_query($connect, $query);
   ?>
  
  <?php foreach($result as $opciones){ ?> 
  <option value="<?php echo $opciones['id_cliente']?>"><?php echo $opciones['nombre_completo']?></option>
  <?php } ?>
  </select></label>
  
						<div class="form-group">
                            <label class="col-sm-2 control-label">Fecha1</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="fechainput" placeholder="Fecha" name="fecha_ticket" required="" readonly>
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
	
Fecha2:
<div id="datepicker"></div>

  Fecha nacimiento: 
  <input type="date" name="fecha_ticket" step="3" min="2019-01-01" max="<?php date("Y-m-d");?>" value="<?php echo date("Y-m-d");?>">
  <!--value="2019-01-01"-->


<div class="wrap">
		<ul class="tabs">
			<li><a href="#tab1"><span class="fa fa-home"></span><span class="tab-text">Inicio</span></a></li>
			<li><a href="#tab2"><span class="fa fa-group"></span><span class="tab-text">Nosotros</span></a></li>
			<li><a href="#tab3"><span class="fa fa-briefcase"></span><span class="tab-text">Servicios</span></a></li>
			<li><a href="#tab4"><span class="fa fa-bookmark"></span><span class="tab-text">Blog</span></a></li>
		</ul>

		<div class="secciones">
			<article id="tab1">
				<div class="container">
  <div class="row">
    <div class="col-sm-8">
      <div class="panel panel-success">
        <div class="panel-heading text-center"><strong>Para poder Agregar una nueva empresa es necesario llenar los siguientes campos</strong></div>
        <div class="panel-body">
            <form role="form" action="" method="POST">
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Nombre Largo</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" required="" class="form-control" name="nom_largo"  >
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Nombre Corto</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" required="" type="text" name="nom_corto" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Giro Comercial</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" name="giro" >
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-222 control-label">RFC</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control"  name="rfc" >
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Dirección</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control"  name="direccion" >
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-222 control-label">Entidad Federativa</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input  class="form-control" name="entidad" >
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-222 control-label">Telefono</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control"  name="telefono" >
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Pagina Web</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control"  name="pagina_web" >
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-222 control-label">Dirección GPS</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control"  name="direccion_gps" >
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-222 control-label">Observaciones</label>
                          <div class="col-sm-110">
                            <textarea class="form-control" rows="1"  name="observaciones" ></textarea>
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
				</article>
			<article id="tab2">
			<?php
			include("class_mysql.php");
			
if(isset($_POST['del_ticket'])){
  $id=MysqlQuery::RequestPost('del_ticket');

  if(MysqlQuery::Eliminar("ticket", "serie='$id'")){
    echo '
        <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="text-center">TICKET ELIMINADO</h4>
            <p class="text-center">
                La incidencia fue eliminada con exito
            </p>
        </div>
    ';
  }else{
    echo '
        <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="text-center">OCURRIÓ UN ERROR</h4>
            <p class="text-center">
                Lo sentimos, no hemos podido eliminar la incidencia
            </p>
        </div>
    ';
  }
}
$email_consul=  MysqlQuery::RequestGet('email_consul');
$id_colsul= MysqlQuery::RequestGet('id_consul');

$consulta_tablaTicket=Mysql::consulta("SELECT * FROM ticket WHERE serie= '$id_colsul' AND email_cliente='$email_consul'");
if(mysqli_num_rows($consulta_tablaTicket)>=1){
  $lsT=mysqli_fetch_array($consulta_tablaTicket, MYSQLI_ASSOC);   
?>
<style>
@media (min-width: 768px)
.col-sm-6 {
    width: 33%;
}
</style>
        <div class="container">
            <div class="row well">
            <div class="col-sm-2">
                <img src="img/status.png" class="img-responsive" alt="Image">
            </div>
            <div class="col-sm-10 lead text-justify">
              <h2 class="text-info">Estado de incidencia</h2>
              <p>Si su <strong>incidencia</strong> no ha sido solucionado aún, espere pacientemente, estamos trabajando para poder resolver su problema y darle una solución.</p>
            </div>
          </div><!--fin row well-->
          <div class="row">
              <div class="col-sm-12">
                    <div class="panel panel-success">
                        <div class="panel-heading text-center"><h4><i class="fa fa-ticket"></i> Incidencia &nbsp;#<?php echo $lsT['serie']; ?></h4></div>
                      <div class="panel-body">
                          <div class="container">
                              <div class="col-sm-12">
                                  <div class="row">
                                      <div class="col-sm-4">
                                          <img class="img-responsive" alt="Image" src="img/tux_repair.png">
										  
                                      </div>
                                      <div class="col-sm-8">
                                          <div class="row">
                                              <div class="col-sm-6"><strong>Fecha:</strong> <?php echo utf8_encode($lsT['fecha']); ?></div>
											  <div class="col-sm-6"><strong>Equipo:</strong> <?php echo utf8_encode($lsT['num_equipo']); ?></div>
                                              
                                          </div>
                                          <br>
                                          <div class="row">
                                              <div class="col-sm-6"><strong>usuario:</strong> <?php echo utf8_encode($lsT['nombre_usuario']); ?></div>
                                              <div class="col-sm-6"><strong>Estado:</strong> <?php echo utf8_encode($lsT['estado_ticket']); ?></div>
                                          </div>
                                          <br>
                                          <div class="row">
											  <div class="col-sm-6"><strong>Email:</strong> <?php echo utf8_encode($lsT['email_cliente']); ?></div>
                                              <div class="col-sm-6"><strong>Problema:</strong> <?php echo utf8_encode($lsT['mensaje']); ?></div>                                              
                                          </div>
                                          <br>
                                          <div class="row">
                                              <div class="col-sm-6"><strong>Área:</strong> <?php echo utf8_encode($lsT['area']); ?></div>
											  <div class="col-sm-6"><strong>Ubicación:</strong> <?php echo utf8_encode($lsT['ubicacion']); ?></div>
                                          </div>
                                          <br>
                                          <div class="row">
                                              <div class="col-sm-12"><strong>Solución:</strong> <?php echo utf8_encode($lsT['solucion']); ?></div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="panel-footer text-center">
                          <div class="row">
                              <h4>Opciones</h4>
							  <div class="col-sm-6">
                                   <a href="./index.php?view=soporte" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
                              </div>
							  
                              <br class="hidden-lg hidden-md hidden-sm">
							  <div class="col-sm-6">
                              <div class="col-sm-6">
                                  <form action="" method="POST">
                                      <input type="text" value="<?php echo $lsT['serie']; ?>" name="del_ticket" hidden="">
                                      <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;  Eliminar Incidencia</button>
                                  </form>
                              </div>
                              <br class="hidden-lg hidden-md hidden-sm">
                              <div class="col-sm-6">
                                   <button id="save" class="btn btn-success" data-id="<?php echo $lsT['serie']; ?>"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp; Guardar incidencia en PDF</button>
                              </div>
							  </div>
                          </div>
                      </div>
                    </div>
              </div>
          </div>
        </div>
 <?php }else{ ?>
        <div class="container">
            <div class="row  animated fadeInDownBig">
                <div class="col-sm-4">
                    <img src="img/error.png" alt="Image" class="img-responsive"/><br>
                    <img src="img/SadTux.png" alt="Image" class="img-responsive"/>
                    
                </div>
                <div class="col-sm-7 text-center">
                    <h1 class="text-danger">Lo sentimos ha ocurrido un error al hacer la consulta, esto se debe a lo siguiente:</h1>
                    <h3 class="text-warning"><i class="fa fa-check"></i> La Incidencia ha sido eliminado completamente.</h3>
                    <h3 class="text-warning"><i class="fa fa-check"></i> Los datos ingresados no son correctos.</h3>
                    <br>
                    <h3 class="text-primary"> Por favor verifique que su <strong>id </strong> y <strong>email</strong> sean correctos, e intente nuevamente.</h3>
                    <h4><a href="./index.php?view=soporte" class="btn btn-primary"><i class="fa fa-reply"></i> Regresar a Incidencia</a></h4>
                </div>
                <div class="col-sm-1">&nbsp;</div>
            </div>
        </div>
<?php } ?>
<script>
  $(document).ready(function(){
    $("button#save").click(function (){
       window.open ("./lib/pdf_user.php?id="+$(this).attr("data-id"));
    });
  });
</script>
			</article>
			<article id="tab3">
				<h1>Servicios</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea numquam odio voluptate. Aliquam incidunt similique, et quasi ducimus quos aut autem non dignissimos dicta sit provident, voluptatibus ut blanditiis perspiciatis cum, vel temporibus minima enim. Asperiores omnis placeat officiis a tenetur sit recusandae, reprehenderit neque. Tempora quibusdam, perferendis id ratione culpa dolorum! Nemo, animi?</p><br>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum dignissimos at esse, ipsum rerum assumenda nisi obcaecati! Aliquam iure voluptatem incidunt, explicabo sit labore, perferendis eius ad vel quia. Praesentium, doloribus. Quisquam provident nostrum totam itaque debitis, minima, tempore dolores!</p>
			</article>
			<article id="tab4">
				<h1>Blog</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea numquam odio voluptate. Aliquam incidunt similique, et quasi ducimus quos aut autem non dignissimos dicta sit provident, voluptatibus ut blanditiis perspiciatis cum, vel temporibus minima enim. Asperiores omnis placeat officiis a tenetur sit recusandae, reprehenderit neque. Tempora quibusdam, perferendis id ratione culpa dolorum! Nemo, animi? Eveniet eaque perspiciatis, libero quia, pariatur iusto, ipsum porro quod, ut tempora cum quo non illum. Non eligendi incidunt sequi, molestias quia perspiciatis architecto repudiandae quod.</p><br>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam ipsa ducimus amet at cumque sed numquam, explicabo impedit optio quas iste aperiam quidem ipsam rerum libero voluptatibus perferendis officiis voluptatum!</p>
			</article>
		</div>
	</div>
	
  <?php
}else{
	header('Location: index.php');
}
?>

<script type="text/javascript">
  $(document).ready(function(){
      $("#fechainput").datepicker();
  });
</script>