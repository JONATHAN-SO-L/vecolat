<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 03/2020 v1
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
	 //if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="admin"){ 
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
		.btno { 
        padding: 30px;
		}
		
    .btn { 
        padding: 10px;
		}
		busc_dato{
			text-align:re
		}
		table {
    background-color: #91bad152;
}
.boton_personalizado{
    text-decoration: none;
    padding: 10px;
    font-weight: 600;
    font-size: 20px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 26px;
    border: 2px solid #0016b0;
  }
   .col-sm-6 {
    width: 50%;
}

  @media (max-width: 900px){
#content {
    padding: 130px 30px 30px 30px;
}
.col-sm-6 {
    width: 90%;
}
  }
  @media (min-width: 1200px){
.container {
    width: 1320px;
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
      	<img src="img/veco.png"/>
      </div>
       <a href="#" id="profile-link"><h4>&nbsp;&nbsp;&nbsp;<?php //echo $_SESSION['nombre']; ?></h4>
    </div>
    <div id="account-actions">
    <a href="checador.php" ><button class="btn btn-success" title="Salir"><i class="fa fa-home"></i></button></a>
        </div>
       
    <ul id="main-nav">
      <li>
        <a href="inicio_admin.php">
          <i class="fa fa-pencil-square"></i>
          Inicio
        </a>
      </li>
	  <li>
        <a href="checador2.php">
          <i class="fa fa-clock-o"></i>
          Checador
        </a>
      </li>
	 <li class="active">
        <a href="usuarios.php">
          <i class="fa fa-user"></i>
        Usuarios
        </a>
      </li>
      <li>
        <a href="reporteChecador.php">
          <i class="fa fa-file-excel-o"></i>
        Reporte
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
<a class="boton_personalizado" href="usuarios.php"><i class="fa fa-pencil"></i></a><strong>&nbsp;&nbsp;&nbsp;&nbsp;Usuario Veco</strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="boton_personalizado" href="che_usuarios.php"><i class="fa fa-pencil"></i></a><strong>&nbsp;&nbsp;&nbsp;&nbsp;Checador</strong>

				</div>
            </div>
          </div>
        </div>
  <br>
  <table>  
    <td>
		<tr>
       <a href="usuarios.php" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
	   </tr>
	</td>
	   </table>
		<!--************************************ Page content******************************-->
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Adicionar Usuario</h1>
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
 
 if(isset($_POST['nombre_comp']) && isset($_POST['usuario'])){        
        	
		if(isset($_POST['nombre_comp'])){
			$nombre_comp= $_POST['nombre_comp'];
		}else{
			$nombre_comp="";
		}
		if(isset($_POST['clave'])){
			$clave= $_POST['clave'];
			$clave2=md5 ($clave);
		}else{
			$clave2="";
		}		 
		if(isset($_POST['usuario'])){
			$usuario= $_POST['usuario'];
		}else{
			$usuario="";
		}
		if(isset($_POST['email'])){
			$email= $_POST['email'];
		}else{
			$email="";
		}
		if(isset($_POST['ip'])){
			$ip= $_POST['ip'];
		}else{
			$ip="";
		}
		
			$con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("INSERT INTO usuarios(nombre_comp, usuario, contrasena, email, ip)VALUES('$nombre_comp','$usuario','$clave2','$email','$ip')"))){
			
            echo '
                <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="usuarios.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">Usuario GUARDADO</h4>
                    <p class="text-center">
                        El usuario ha sido guardada exitosamente
                    </p>
                </div>
            ';

          }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="usuarios.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">OCURRIO UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido guardar el usuario. Por favor intente nuevamente.
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
        <div class="panel-heading text-center"><strong>Para poder registrar un usuario nuevo debes de llenar todos los campos de este formulario</strong></div>
        <div class="panel-body">
            <form role="form" action="" method="POST">
			
						<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->
						
                        <div class="form-group">
              <label class="control-label"><i class="fa fa-user"></i>&nbsp;Nombre de Usuario</label>
              <input type="text" id="input_user" required="" class="form-control" name="usuario" placeholder="Nombre de usuario" required=""  maxlength="10">
              <div id="com_form"></div>
            </div>

                        <div class="form-group">
                          <label  class="col-sm-222 control-label">Password</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
								  <input type="password" required="" class="form-control" name="clave" placeholder="Contraseña" required="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
												
						<div class="form-group">
                            <label class="col-sm-222 control-label">Nombre</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" required="" type="text" placeholder="Nombre" name="nombre_comp" maxlength="30">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Correo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" required="" type="email" placeholder="Escriba su Correo" name="email" maxlength="100">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Telefono IP</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" required="" type="text" placeholder="IP" name="ip" maxlength="20">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
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
//}else{
	//header('Location: index.php');
//}
?>
<script>
    $(document).ready(function(){
        $("#input_user").keyup(function(){
            $.ajax({
                url:"./process/val_veco.php?id="+$(this).val(),
                success:function(data){
                    $("#com_form").html(data);
                }
            });
        });
    });
</script>