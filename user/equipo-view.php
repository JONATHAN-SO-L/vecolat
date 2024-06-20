<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 04/2020 v1
 */
?>
<?php
/*
    if(isset($_POST['usuario_id']) && isset($_POST['email_reg']) && isset($_POST['equipo'])){
        $usuario_id=MysqlQuery::RequestPost('usuario_id');
        $email_reg=MysqlQuery::RequestPost('email_reg');
        $equipo=MysqlQuery::RequestPost('equipo');
         
        if(MysqlQuery::Guardar("equipo_usuario", "usuario, email_usuario, equipo", "'$usuario_id', '$email_reg', '$equipo'")){

		  echo '
               <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="equipo_view.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">Equipo Asignado al Usuario </h4>
                    <p class="text-center">
                        El Equipo ha sido Asignado exitosamente
                    </p>
                </div>
            ';
        }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        ERROR AL REGISTRAR el equipo: Por favor intente nuevamente.
                    </p>
                </div>
            '; 
        }
    }
    */
?>

<style>
.page-header{
display:none;
}
</style>
<script language="javascript" src="js/jquery-3.1.1.min.js"></script>
		
		<script language="javascript">
			$(document).ready(function(){
				$("#usuario_id").change(function () {
					$("#usuario_id option:selected").each(function () {
						id = $(this).val();
						$.post("./get_soporte_usuario.php", { id: id }, function(data){
							$("#email_reg").html(data);
						});            
					});
				})
			});
			
		</script>
 <!--/////////////////////////////////////////////////////////-->
 
 
 <?php include "./inc/links.php"; ?>   
   <?php include "./inc/navbarsop.php"; ?>
<title>Equipo de Usuarios</title>
        <!--************************************ Page content******************************-->
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Registro de Equipos de Usuarios</h1>
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
    <div class="col-sm-8">
      <div class="panel panel-success">
        <div class="panel-heading text-center"><strong>Para poder registrar un Equipo de algun usuario nuevo debes de llenar todos los campos de este formulario</strong></div>
        <div class="panel-body">
            <form role="form" action="add_equipo_soporte.php" method="POST">
			
			
            <div><label><i class="fa fa-hospital-o"></i>&nbsp;Usuario</label>
						<select class="form-control" name="usuario_id" id="usuario_id">
				<option class="form-control" required="" value="0">Seleccionar Usuario</option>
				<?php
								$connect = mysqli_connect("localhost","veco", "Vec83Dv19iSa@", "veco_sims_devecchi");
								$query = "SELECT * FROM usuario_sop";
								$result = mysqli_query($connect, $query);
								?>	
				<?php foreach($result as $row){ ?> 
					<option value="<?php echo $row['id_usuario']; ?>"><?php echo $row['nombre_usuario']; ?></option>
				<?php } ?>
            </select>
            </div>
            <br>
			
			<div><label><i class="fa fa-envelope"></i>&nbsp;Email</label>
			<select class="form-control" required="" name="email_reg" id="email_reg"></select></div>
			<br>
			
            <div class="form-group">
              <label class="control-label"><i class="fa fa-user"></i>&nbsp;Equipo</label>
              <input type="text" id="input_user" class="form-control" name="equipo" placeholder="Equipo a su cargo" required="" maxlength="50">
             </div>
            
            <button type="submit" class="btn btn-danger">Asignar Equipo</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-sm-4 text-center hidden-xs">
      <img src="img/equipos.png" class="img-responsive" alt="Image">
      <h2 class="text-primary">¡Gracias! Por preferirnos</h2>
    </div>

  </div>
</div>