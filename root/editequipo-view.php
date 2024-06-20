<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 07/2021 v1
 */
 ?>
<?php

if($_SESSION['nombre']!="" && $_SESSION['tipo']=="superoot"){
    include ("conexi.php");
header('Content-Type: text/html; charset=UTF-8');

	if(isset($_POST['id_edit']) && isset($_POST['id_edit']) ){

		if(isset($_POST['id_edit'])){
			$id_edit= $_POST['id_edit'];
		}else{
			$id_edit="";
		}
		if(isset($_POST['nombre_comp'])){
			$nombre_comp= $_POST['nombre_comp'];
		}else{
			$nombre_comp="";
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
		if(isset($_POST['equipo'])){
			$equipo= $_POST['equipo'];
		}else{
			$equipo="";
		}
		if(isset($_POST['num_serie'])){
			$num_serie= $_POST['num_serie'];
		}else{
			$num_serie="";
		}
		if(isset($_POST['marca'])){
			$marca= $_POST['marca'];
		}else{
			$marca="";
		}
		if(isset($_POST['tipo'])){
			$tipo= $_POST['tipo'];
		}else{
			$tipo="";
		}
		if(isset($_POST['procesador'])){
			$procesador= $_POST['procesador'];
		}else{
			$procesador="";
		}
		if(isset($_POST['sis_ope'])){
			$sis_ope= $_POST['sis_ope'];
		}else{
			$sis_ope="";
		}
		if(isset($_POST['disco'])){
			$disco= $_POST['disco'];
		}else{
			$disco="";
		}
		if(isset($_POST['ram'])){
			$ram= $_POST['ram'];
		}else{
			$ram="";
		}

        $tecnico = $_SESSION['nombre'];
        $fecha_mod = date("Y-m-d H:i:s");
	
		$con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("UPDATE equipo_usuario set nombre_comp='$nombre_comp', area='$area',ubicacion='$ubicacion', equipo='$equipo', num_serie='$num_serie', marca='$marca', 
			tipo='$tipo', procesador='$procesador', sis_ope='$sis_ope', disco='$disco', ram='$ram', tecnico='$tecnico', fecha_mod='$fecha_mod'
			WHERE id_eq_us ='$id_edit' "))){

			echo '
                <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">Equipo Actualizado</h4>
                    <p class="text-center">
                        El Equipo fue actualizado con exito
                    </p>
                </div>
            ';
			
		}else{
			echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido actualiza el Equipo
                    </p>
                </div>
            '; 
		}
	}     

	     
	$id = MysqlQuery::RequestGet('id');
	$sql = Mysql::consulta("SELECT * FROM equipo_usuario WHERE id_eq_us= '$id' ");
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
                <h1 class="animated lightSpeedIn">Actualización</h1>
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
                <a href="root.php?view=listaequipo" class="btn btn-primary btn-sm pull-right"><i class="fa fa-reply"></i>&nbsp;&nbsp;Volver a lista de equipos</a>
            </div>
          </div>
        </div>
            
            
          <div class="container">
            <div class="col-sm-12">
                <form class="form-horizontal" role="form" action="" method="POST">
                		<input type="hidden" name="id_edit" value="<?php echo $reg['id_eq_us']?>">
                        
                        
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Usuario</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" class="form-control"  name="nombre_comp" value="<?php echo $reg['nombre_comp']?>">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
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
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-2 control-label">Equipo</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" class="form-control"  name="equipo" value="<?php echo $reg['equipo']?>">
                                <span class="input-group-addon"><i class="fa fa-desktop"></i></span>
                              </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Serie</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="num_serie" value="<?php echo $reg['num_serie']?>">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                </div>
                            </div>
                        </div>

						
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Marca</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="marca" value="<?php echo $reg['marca']?>">
                                    <span class="input-group-addon"><i class="fa fa-meetup"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tipo</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="tipo" value="<?php echo $reg['tipo']?>">
                                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Procesador</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="procesador" value="<?php echo $reg['procesador']?>">
                                    <span class="input-group-addon"><i class="fa fa-microchip"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Sistema Operativo</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="sis_ope" value="<?php echo $reg['sis_ope']?>">
                                    <span class="input-group-addon"><i class="fa fa-windows"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Disco Duro</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="disco" value="<?php echo $reg['disco']?>">
                                    <span class="input-group-addon"><i class="fa fa-hdd-o"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Memoria Ram</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="ram" value="<?php echo $reg['ram']?>">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                </div>
                            </div>
                        </div>
						
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10 text-center">
                              <button type="submit" class="btn btn-info">Actualizar datos</button>
                          </div>
                        </div>
                    
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