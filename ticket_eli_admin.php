<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 05/2020 v1
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
	 if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="superoot"){ 
?>
<!DOCTYPE html>
<?php include "./inc/links.php"; ?> 
<html>
<head>
  <!--meta http-equiv="Content-type" content="text/html; charset=utf-8" /-->
  <meta charset="ISO-8859-1">
  <title>Tickets</title>
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
        <a href="ticket.php">
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
        <a href="ticket_usuarios.php">
          <i class="fa fa-users"></i>
          Usuarios
        </a>
      </li>
      <li class="active">
        <a href="ticket_admin.php">
          <i class="fa fa-user"></i>
          Administradores
        </a>
      </li>
      <li>
        <a href="ticket_root_config.php">
          <i class="fa fa-cogs"></i>
          Configuracion
        </a>
      </li>
      <li>
        <a href="./soporte.php?view=registro">
          <i class="fa fa-users"></i>
          Registrar Usuario
        </a>
      </li>
      <li>
        <a href="ticket_add_equi.php">
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
</header>
<section id="content">      
      <table>  
    <td>
		<tr>
       <a href="ticket_admin.php" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
	   </tr>
	</td>
	   </table>
		<!--************************************ Page content******************************-->
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Eliminar Administrador</h1>
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
        <div class="panel-heading text-center"><strong>Verifique la información que se muestra a continuación antes de eliminar</strong></div>
        <div class="panel-body">
            <form role="form" action="" method="POST">
		
    <?php
	include './lib/class_mysql.php';
include './lib/config.php';

if(isset($_POST['nombre_admin']) && isset($_POST['email_admin'])){
		$id=MysqlQuery::RequestPost('id');
		$nombre_admin=  MysqlQuery::RequestPost('nombre_admin');
		$email_admin=  MysqlQuery::RequestPost('email_admin');

	if(isset($_POST['nombre_admin']) && isset($_POST['email_admin'])){
          $empresa_delete=MysqlQuery::RequestPost('nombre_admin');
          $corto_delete=MysqlQuery::RequestPost('email_admin');
         
          $sql=Mysql::consulta("SELECT * FROM admin_soporte WHERE nombre_admin= '$empresa_delete' AND email_admin='$corto_delete'");

          if(mysqli_num_rows($sql)>=1){
             MysqlQuery::Eliminar("admin_soporte", "nombre_admin='$empresa_delete' and email_admin='$corto_delete'");
			 
			 echo 
			 '<script language="javascript">
				alert("Administrador Eliminado");
				window.location.href="ticket_admin.php"</script>';
          }else{
            echo'
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="ticket_admin.php"><button type="button" class="close"  data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido eliminar el Administrador por que los datos son incorrectos.
                    </p>
                </div>
            '; 
          }
        }
}
$id = MysqlQuery::RequestGet('id');
	$sql = Mysql::consulta("SELECT * FROM admin_soporte WHERE id= '$id'");
	$reg=mysqli_fetch_array($sql, MYSQLI_ASSOC);

?>
	  <fieldset>
                		<input type="hidden" readonly="" name="id" readonly="" value="<?php echo $reg['id']?>">
						
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Fecha</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
							     <input type="text" class="form-control" readonly="" name="nombre_admin" value="<?php echo utf8_decode($reg['nombre_admin'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Clave</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="clave" value="<?php echo utf8_decode($reg['clave'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Nombre</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" readonly="" type="text" name="nombre" value="<?php echo utf8_decode($reg['nombre'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Apellido</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control"  type="text" readonly="" name="apellido" value="<?php echo utf8_decode($reg['apellido'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Email</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control"  type="text" readonly="" name="email_admin" value="<?php echo utf8_decode($reg['email_admin'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Telefono</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control"  type="text" readonly="" name="telefono" value="<?php echo utf8_decode($reg['telefono'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        
			</fieldset>			
                         <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10 text-center">
						  <div class="form-group">
                          <label  class="col-sm-222 control-label text-center"> *Confirme borrado de registro* </label>
                        </div>   
                <input type="hidden" name="id_edit" value="<?php echo $row['id']; ?>">
                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"> Borrar</i></button>
				 </div>
                        </div>
            </form>
            </div><!--col-md-12-->
          </div><!--container-->
		</div>
	  </div>
      </div>
    </div>
      
      
       <?php
}else{
	header('Location: soporte.php');
}
?>

<footer></footer>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
	<script src="/devecchi/ejercicio/Resources/js/empresa.js"></script>
	<script src="/devecchi/ejercicio/Models/empresa.js"></script>
</body>
</html>