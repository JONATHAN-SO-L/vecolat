<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 06/2021 v1
 */
 ?>
<?php if($_SESSION['nombre']!="" && $_SESSION['tipo']=="superoot"){ 
     include ("conexi.php");
          /* Actualizar cuenta admin */
        
         if(isset($_POST['id_edit']) && isset($_POST['id_edit'])){
            if(isset($_POST['id_edit'])){
			$id_edit= $_POST['id_edit'];
		}else{
			$id_edit="";
		}
		if(isset($_POST['nombre_usuario'])){
			$nombre_usuario= $_POST['nombre_usuario'];
		}else{
			$nombre_usuario="";
		}
		if(isset($_POST['nombre_comp'])){
			$nombre_comp= $_POST['nombre_comp'];
		}else{
			$nombre_comp="";
		}
		if(isset($_POST['email_usuario'])){
			$email_usuario= $_POST['email_usuario'];
		}else{
			$email_usuario="";
		}
		if(isset($_POST['area'])){
			$area= $_POST['area'];
		}else{
			$area="";
		}
		if(isset($_POST['ubicacion'])){
			$ubicacion= $_POST['ubicacion'];
		}else{
			$ubicacion="";
		}
		if(isset($_POST['telefono'])){
			$telefono= $_POST['telefono'];
		}else{
			$telefono="";
		}

    $tecnico = $_SESSION['nombre'];
    $fecha_mod = date("Y-m-d H:i:s");

        	$con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("UPDATE usuario_sop set nombre_usuario='$nombre_usuario', nombre_comp='$nombre_comp', email_usuario='$email_usuario', area='$area', ubicacion='$ubicacion', telefono='$telefono', tecnico='$tecnico', fecha_mod='$fecha_mod'
			WHERE id ='$id_edit' "))){

			echo '
                <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">Datos Actualizados</h4>
                    <p class="text-center">
                        Los datos fueron actualizados con exito
                    </p>
                </div>
            ';
		
		}else{
			echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido actualiza los datos
                    </p>
                </div>
            '; 
		}
	}     
        
	$id = MysqlQuery::RequestGet('id');
	$sql = Mysql::consulta("SELECT * FROM usuario_sop WHERE id= '$id' ");
	$reg=mysqli_fetch_array($sql, MYSQLI_ASSOC);

?>

        <!--************************************ Page content******************************-->
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
<?php include "./inc/navbarsop.php"; ?>
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Actualización de datos del usuario RH</h1>
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
		<!--************************************ Page content******************************-->
		
        <div class="container">
          <div class="row">
            <div class="col-sm-3">
                <img src="./img/Edit.png" alt="Image" class="img-responsive animated tada">
            </div>
            <div class="col-sm-9">
                <a href="root.php?view=users" class="btn btn-primary btn-sm pull-right"><i class="fa fa-reply"></i>&nbsp;&nbsp;Volver</a>
            </div>
          </div>
        </div>
            
            
          <div class="container">
            <div class="col-sm-12">
                <form class="form-horizontal" role="form" action="" method="POST">
                		<input type="hidden" name="id_edit" value="<?php echo $reg['id']?>">
                        <div class="form-group">
                            
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Nombre Usuario</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" class="form-control"  name="nombre_usuario"  value="<?php echo $reg['nombre_usuario']?>">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              </div>
                          </div>
                        </div>
                    
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Nombre Completo</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" class="form-control"  name="nombre_comp"  value="<?php echo $reg['nombre_comp']?>">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              </div>
                          </div>
                        </div>
						

                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="email" class="form-control"  name="email_usuario" value="<?php echo utf8_decode($reg['email_usuario'])?>">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Área</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" class="form-control"  name="area" value="<?php echo $reg['area']?>">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                              </div> 
                          </div>
                        </div>
						
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Ubicacion</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" class="form-control"  name="ubicacion" value="<?php echo $reg['ubicacion']?>">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                              </div> 
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Extención</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" class="form-control"  name="telefono" value="<?php echo $reg['telefono']?>">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                              </div> 
                          </div>
                        </div>
                        
                             <button type="submit" class="btn btn-info">Actualizar Datos</button>
                        
                    <br>
                    

                      </form>
            </div><!--col-md-12-->
          </div><!--container-->
          
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
                    <h1 class="text-danger">Lo sentimos esta página es solamente para Superoot de Veco</h1>
                    <h3 class="text-info text-center">Inicia sesión como Superoot para poder acceder</h3>
                </div>
                <div class="col-sm-1">&nbsp;</div>
            </div>
        </div>
<?php
}
?>