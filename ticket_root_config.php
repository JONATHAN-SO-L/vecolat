<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
	 if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="superoot"){ 
?>
<!DOCTYPE html>
<?php include "./inc/links.php";
include ("conexi.php");
?> 
<html>
<head>
  <!--meta http-equiv="Content-type" content="text/html; charset=utf-8" /-->
  <meta charset="ISO-8859-1">
  <title>Configuracion</title>
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
		table {
    background-color: #91bad152;
}		
	@media (min-width: 768px){
	.busc_dato{
    float: right;
    margin-right: -5%;
}
	}
	@media all and (max-width:2400px){
  #main-header {
    left:0px;
  }
  body.open-menu {
    overflow-x:hidden;
    overflow-y:auto;
  }
  .open-menu #main-header {
    left:300px;
  }
 
  #menu-overlay {
    height:100%;
    position:fixed;
    top:0;
    right:0;
    left:100%;
    background:transparent;
    z-index:499;
  }
  .open-menu #menu-overlay {
    left:300px;
    background:rgba(255,255,255,.9);
  }
  #content {
    position:relative;
    left:0;
  }
  .open-menu #content {
    left:300px;
  }
  #sidenav {
    left:-300px;
  }
  .open-menu #sidenav {
    left:0;
  }
  #account-actions {
    left:0;
    top:100px;
    width:100%;
  }
  #menu-toggle {
    width:40px;
    height:40px;
    line-height:5px;
    border-radius:0 5px 5px 0;
    font-size:20px;
  }
  #main-header {
    position: fixed;
    height: 50px;
    box-shadow: 0 1px 0 #f1f1f1;
    background-color: #337ab7;
}
  .open-menu #menu-toggle {
    left:300px;
    color:#0f92d1;
  }
  #content {
    padding:10px 30px 30px 30px;
  }
  #main-nav {
    margin:1px 0 0 0;
  }
  #account-actions {
    padding:0px 0 0 25px;
    background:#337ab7;
    height:65px;
  }
  #account-actions a {
    color:#69c0ea;
  }
  #account-actions a:hover {
    color:white;
  }
  #content-header {
    width:calc(100% + 60px);
    height:193px;
    margin:-30px 0 0 -30px;
    background:white;
    padding:30px;
  }
  #tabs ul {
    width:calc(100% + 60px);
    margin:0 0 30px -30px;
  }
  #tabs li {
    margin:0 30px 0 0;
  }

  #tabs li:first-of-type {
    margin:0 30px 0 30px;
  }
  .tab-target {
    padding:0 50px 50px 50px;
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
      	<img src="img/root.png"/>
      </div>
       <a href="#" id="profile-link"><h4>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['nombre']; ?></h4>
    </div>
       
    <ul id="main-nav">
      <li>
        <a href="root.php?view=ticketroot">
          <i class="fa fa-envelope"></i>
          Tickets
        </a>
      </li>
      <li>
        <a href="ticket_mant.php">
          <i class="fa fa-wrench"></i>
          Mantenimientos
        </a>
      </li>
      <li>
        <a href="root.php?view=users">
          <i class="fa fa-users"></i>
          Todos los Usuarios
        </a>
      </li>
      <li class="active">
        <a href="ticket_root_config.php">
          <i class="fa fa-cogs"></i>
          Configuraci&#243;n
        </a>
      </li>
      <li>
        <a href="root.php?view=equipo">
          <i class="fa fa-desktop"></i>
          Equipos
        </a>
      </li>
      <li>
        <a href="ticket_preventivo.php">
          <i class="fa fa-calendar"></i>
          Soporte Preventivo
        </a>
      </li>
      <li>
        <a href="./process/logouti.php">
          <i class="fa fa-power-off"></i>
         Cerrar sesión
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
        	
<?php
    /* Guardar nuevo admin */
    if(isset($_POST['nom_admin_reg']) && isset($_POST['admin_reg']) ){

       	if(isset($_POST['admin_reg'])){
			$nom_root_save= $_POST['admin_reg'];
		}else{
			$nom_root_save="";
		}	
		if(isset($_POST['admin_clave_reg'])){
			$pass_save= $_POST['admin_clave_reg'];
		}else{
			$pass_save="";
		}
		$clave_reg=md5 ($pass_save);
		
		if(isset($_POST['nom_admin_reg'])){
			$nom_save= $_POST['nom_admin_reg'];
		}else{
			$nom_save="";
		}
		if(isset($_POST['admin_ape_reg'])){
			$ape_save= $_POST['admin_ape_reg'];
		}else{
			$ape_save="";
		}
		if(isset($_POST['admin_email_reg'])){
			$email_save= $_POST['admin_email_reg'];
		}else{
			$email_save="";
		}
		if(isset($_POST['admin_telefono_reg'])){
			$telefono_save= $_POST['admin_telefono_reg'];
		}else{
			$telefono_save="";
		}
		if(isset($_POST['ubicacion'])){
			$user_ubicacion= $_POST['ubicacion'];
		}else{
			$user_ubicacion="";
		}
 
       	$from="sistemas@veco.lat";
			 $cabecera="From:".$from;
			  $mensaje="Estimado usuario ha sido dado de alta en el portal Devinsa,\r\n Link: https://veco.lat/soporte.php 
			  \r\n Sus credenciales son: \r\n \r\n Correo: ".$email_reg." \r\n  Contraseña:  ".$clave_reg2." \r\n En cualquier momento puede cambiar su contraseña. \r\n \r\n
          Saludos Cordiales\r\n Area de sistemas \r\n sistemas@veco.mx \r\n \r\n 
Por favor, NO responda a este mensaje, es un envio automatico";
          $mensaje=wordwrap($mensaje, 70, "\r\n");
		  $asunto_admin= "Acceso Root a Portal de Soporte";
        
        	$con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("INSERT INTO superoot(nombre_root, clave, nombre, apellido, email_root, telefono, ubicacion)
			VALUES
			('$nom_root_save','$clave_reg', '$nom_save', '$ape_save',  '$email_save', '$telefono_save','$user_ubicacion')"))){
	
	 
      //  if(MysqlQuery::Guardar("superoot", "nombre_root, clave, nombre, apellido, email_root, telefono, ubicacion", "'$nom_root_save','$clave_reg', '$nom_save', '$ape_save',  '$email_save', '$telefono_save','$user_ubicacion'")){
    echo '
                 <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">REGISTRO EXITOSO</h4>
                    <p class="text-center">
                        Cuenta creada exitosamente, en breve recibira un correo con sus credenciales.
                    </p>
                </div>
            ';
       }else{
           echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido registrar el root
                    </p>
                </div>
            ';
       } 
    }
        
       /* Actualizar cuenta admin */
        
         if(isset($_POST['nom_admin_up']) && isset($_POST['old_nom_admin_up'])){
            $nom_complete_update=MysqlQuery::RequestPost('nom_admin_up');
            $old_nom_admin_update=MysqlQuery::RequestPost('old_nom_admin_up');
            $pass_admin_update=md5(MysqlQuery::RequestPost('admin_clave_up'));
            $old_pass_admin_uptade=md5(MysqlQuery::RequestPost('old_admin_clave_up'));
            $email_admin_update=MysqlQuery::RequestPost('admin_email_up');

            $sql=Mysql::consulta("SELECT * FROM superoot WHERE nombre_root= '$old_nom_admin_update' AND clave='$old_pass_admin_uptade'");
            if(mysqli_num_rows($sql)>=1){
                if(MysqlQuery::Actualizar("superoot", "clave='$pass_admin_update' ", "clave='$old_pass_admin_uptade' and clave='$old_pass_admin_uptade'")){
            
                    $_SESSION['clave']=$pass_admin_update;
                    echo '
                        <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="text-center">ROOT ACTUALIZADO</h4>
                            <p class="text-center">
                                El Root se actualizo con exito
                            </p>
                        </div>
                    ';
                }else{
                    echo '
                        <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                            <p class="text-center">
                                No hemos podido actualizar el Root
                            </p>
                        </div>
                    ';
                }
            }else{
                echo '
                    <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                        <p class="text-center">
                            Usuario y clave incorrectos
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
footer {
    display: none;
}
.fa-copyright:before {
    content: "\f1f9";
    display: none;
}
</style>

<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Alta de Nuevas Cuentas</h1>
                <span class="label label-danger">Sistemas</span>
                <p class="pull-right text-primary">
                  <strong>
                  <?php include "./inc/timezone.php"; ?>
                 </strong>
               </p>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-sm-3">
              <img src="./img/config.png" alt="Image" class="img-responsive">
            </div>
            <div class="col-sm-9">
              <p class="lead text-info">Bienvenido Root, aqui podra agregar nuevos Superusuarios.</p>
            </div>
          </div><!--fin row-->
          
          <br><br>        
          
          <div class="row">
              <di class="col-sm-8">
                 <div class="row">
                      <div class="col-sm-12">
                        <div class="panel panel-success">
                        <div class="panel-heading text-center"><i class="fa fa-plus"></i>&nbsp;<strong>Agregar nuevo Root</strong></div>
                        <div class="panel-body">
                            <form role="form" action="" method="post">
                            <div class="form-group">
                              <label><i class="fa fa-male"></i>&nbsp;Nombre</label>
                              <input type="text" class="form-control" name="nom_admin_reg" placeholder="Nombre" required="" title="Nombre" maxlength="40">
                            </div>
							<div class="form-group">
                              <label><i class="fa fa-male"></i>&nbsp;Apellidos</label>
                              <input type="text" class="form-control" name="admin_ape_reg" placeholder="Apellido" required="" title="Apellido" maxlength="40">
                            </div>
                            <div class="form-group">
                              <label class="control-label"><i class="fa fa-user"></i>&nbsp;Nombre de Root</label>
                              <input type="text" id="input_user" class="form-control" name="admin_reg" placeholder="Nombre de usuario" required="" pattern="[a-zA-Z0-9]{1,15}" title="Ejemplo7 maximo 15 caracteres" maxlength="15">
                              <div id="com_form"></div>
                            </div>
                            <div class="form-group">
                              <label><i class="fa fa-key"></i>&nbsp;Contraseña</label>
                              <input type="password" class="form-control" name="admin_clave_reg" placeholder="Contraseña" required="">
                            </div>
                            <div class="form-group">
                              <label><i class="fa fa-envelope"></i>&nbsp;Email</label>
                              <input type="email" class="form-control"  name="admin_email_reg"  placeholder="Email administrador" required="">
                            </div>
							<div class="form-group">
                              <label><i class="fa fa-phone"></i>&nbsp;Telefono</label>
                              <input type="text" class="form-control"  name="admin_telefono_reg"  placeholder="Telefono administrador" required="">
                            </div>
                            <div class="form-group">
              <label class="control-label"><i class="fa fa-hospital-o"></i>&nbsp;Ubicacion</label>
                <select class="form-control" name="ubicacion" required="">          
						<option value=""></option>									
                        <option value="Oficinas">Oficinas</option>
                        <option value="Planta">Planta</option>
                </select>
             </div>
                
                                <center><button type="submit" class="btn btn-success">Agregar Root</button></center>
                          </form>
                        </div>
                      </div>
                    </div>  
                  </div><!--Fin row 1 agregar-->
                  
                  <!--div class="row"> 
                      <div class="col-sm-12">
                        <div class="panel panel-danger">
                          <div class="panel-heading text-center"><i class="fa fa-trash-o"></i>&nbsp;<strong>Eliminar cuenta</strong></div>
                          <div class="panel-body">
                              <center><img class="img-responsive" src="./img/delete_user.png"></center><br>
                              <center><button class="btn btn-danger btn-sm" data-toggle="modal" data-target=".bs-example-modal-sm">Eliminar cuenta</button></center>

                                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-sm">
                                    <div class="modal-content">

                                         <div class="modal-header">
                                           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                           <h4 class="modal-title text-center text-danger" id="myModalLabel">¿Deseas eliminar tu cuenta?</h4>
                                        </div>
                                      <form action="" method="post" role="form" style="padding:20px;">
                                        <div class="input-group input-group-sm">
                                          <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                          <input type="text" class="form-control" name="nom_admin_delete" placeholder="Nombre de administrador" required="">
                                        </div><br>
                                        <div class="input-group input-group-sm">
                                          <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                          <input type="password" class="form-control" name="admin_clave__delete" placeholder="Contraseña" required="">
                                        </div><br>

                                        <center>
                                          <button type="submit" class="btn btn-danger btn-sm">Eliminar cuenta</button>
                                          <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancelar</button>
                                        </center>
                                      </form>

                                    </div>
                                  </div>
                                </div>
                          </div>
                        </div>
                      </div> 
                  </div--><!--Fin row 2 eliminar-->
              </di><!--Fin class col-md-8-->
              
              <div class="col-sm-4">
                  <div class="row">
                      <div class="col-sm-12">
                        <div class="panel panel-info">
                         <div class="panel-heading text-center"><i class="fa fa-refresh"></i>&nbsp;<strong>Actualizar datos de cuenta</strong></div>
                         <div class="panel-body">
                            <?php
                            $idad=$_SESSION['id'];                                
							$usuario = "veco";
							$password = "Vec83Dv19iSa@";
							$servidor = "localhost";
							$basededatos = "veco_sims_devecchi";							
							$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
							$conexion ->set_charset('utf8');
							$conexion->query("SET NAMES UTF8");
							$conexion->query("SET CHARACTER SET utf8");							
							$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
								$consulta = "SELECT * FROM superoot WHERE id='$idad'";
							$resultado = mysqli_query( $conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos");

							while ($reg1 = mysqli_fetch_array( $resultado )){
                            ?>
                             <form role="form" action="" method="POST">
                             <div class="form-group">
                               <label><i class="fa fa-male"></i>&nbsp;Nombre completo</label>
                               <input type="text" class="form-control" value="<?php echo $reg1['nombre']." ".$reg1['apellido']; ?>" name="nom_admin_up"  readonly="">
                             </div>
                             <div class="form-group">
                               <label><i class="fa fa-user"></i>&nbsp;Nombre de Root</label>
                               <input type="text" class="form-control" value="<?php echo $reg1['nombre_root']; ?>" name="old_nom_admin_up" readonly="">
                             </div>
                             <div class="form-group">
                               <label><i class="fa fa-key"></i>&nbsp;Contraseña anterior</label>
                               <input type="password" class="form-control" name="old_admin_clave_up" value="<?php echo $reg1['clave']; ?>"placeholder="Contraseña anterior" readonly="" required="">
                             </div>
                                 <!--div class="form-group">
                               <label><i class="fa fa-unlock-alt"></i>&nbsp;Nueva contraseña</label>
                               <input type="password" class="form-control" name="admin_clave_up" placeholder="Nueva contraseña" readonly="" required="">
                             </div-->
                             <div class="form-group">
                               <label><i class="fa fa-envelope"></i>&nbsp;Email</label>
                               <input type="email" class="form-control" value="<?php echo $reg1['email_root']; ?>" name="admin_email_up" readonly="">
                             </div>
                             <div class="form-group">
                               <label><i class="fa fa-phone"></i>&nbsp;Telefono</label>
                               <input type="email" class="form-control" value="<?php echo $reg1['telefono']; ?>" name="admin_email_up" readonly="">
                             </div>
                             <!--button type="submit" class="btn btn-info">Actualizar datos</button-->
                           </form>
	<?php } ?>
                         </div>
                       </div>
                       </div>
                  </div><!--Fin row-->
              </div><!--Fin class col-md-4-->
          </div><!-- Fin row-->
          
        </div>
<?php
}else{
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <img src="./img/Stop.png" alt="Image" class="img-responsive animated slideInDown"/><br>
                <img src="./img/SadTux.png" alt="Image" class="img-responsive"/>
                
            </div>
            <div class="col-sm-7 animated flip">
                <h1 class="text-danger">Lo sentimos esta página es solamente para root del Sistema</h1>
                <h3 class="text-info text-center">Inicia sesión como root para poder acceder</h3>
            </div>
            <div class="col-sm-1">&nbsp;</div>
        </div>
    </div>
<?php
}
?>
<footer></footer>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
	<script src="/devecchi/ejercicio/Resources/js/empresa.js"></script>
	<script src="/devecchi/ejercicio/Models/empresa.js"></script>
</body>
</html>