<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 04/2020 v1
 */
 ?>
<?php
 include ("conexi.php");
   include "./inc/links.php";   
   include "./inc/navbarsop.php"; ?>
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
			
			
             <div><label><i class="fa fa-user"></i>&nbsp;Usuario</label>
						<select class="form-control" name="usuario_id" id="usuario_id">
				<option class="form-control" required="" value="0">Seleccionar Usuario</option>
				<?php
								$connect = mysqli_connect("localhost","veco_dvi", "Vec83Dv19iSa@", "veco_sims_devecchi");
								$query = "SELECT * FROM usuario_sop Order by nombre_comp ASC";
								$result = mysqli_query($connect, $query);
								?>	
				<?php foreach($result as $row){ ?> 
					<option value="<?php echo $row['id_usuario']; ?>"><?php echo $row['nombre_comp']; ?></option>
				<?php } ?>
            </select>
            </div>
            <br>
            <div class="form-group">
              <label class="control-label"><i class="fa fa-hospital-o"></i>&nbsp;Ubicacion</label>
                <select class="form-control" name="ubicacion" required="">          
						<option value=""></option>									
                        <option value="Oficinas">Oficinas</option>
                        <option value="Planta">Planta</option>
                </select>
             </div>
			
			<div><label><i class="fa fa-envelope"></i>&nbsp;Email</label>
			<select class="form-control" required="" name="email_reg" id="email_reg"></select></div>
			<br>
			
            <div class="form-group">
              <label class="control-label">&nbsp;Equipo</label>
              <input type="text" class="form-control" name="equipo" placeholder="Equipo a su cargo" required="" maxlength="50">
             </div>
             
             <div class="form-group">
              <label class="control-label">&nbsp;No. Serie</label>
              <input type="text" class="form-control" name="num_serie" placeholder="# Serie" required="" maxlength="50">
             </div>
             
             <div class="form-group">
              <label class="control-label">&nbsp;Marca</label>
              <input type="text" class="form-control" name="marca" placeholder="Marca" required="" maxlength="50">
             </div>
             
             <div class="form-group">
              <label class="control-label">&nbsp;Tipo</label>
              <input type="text" class="form-control" name="tipo" placeholder="Tipo" maxlength="50">
             </div>
             
             <div class="form-group">
              <label class="control-label">&nbsp;Procesador</label>
              <input type="text" class="form-control" name="procesador" placeholder="Procesador"  maxlength="50">
             </div>
             
             <div class="form-group">
              <label class="control-label">&nbsp;Sistema Operativo</label>
              <input type="text" class="form-control" name="sis_ope" placeholder="Escriba el S.O" maxlength="50">
             </div>
             
             <div class="form-group">
              <label class="control-label">&nbsp;Ram</label>
              <input type="text" class="form-control" name="ram" placeholder="Ram del Equipo"  maxlength="50">
             </div>
             
             <div class="form-group">
              <label class="control-label">&nbsp;Tamaño de Monitor</label>
              <input type="text" class="form-control" name="tam_monitor" placeholder="Solo si se trata de un Equipo"  maxlength="50">
             </div> 
            
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
  <?php
    if(isset($_POST['usuario']) && isset($_POST['email_reg']) && isset($_POST['equipo'])){ 
		
	    $usuario_id= $_POST['usuario_id'];
		$usuario= $_POST['usuario'];
		$area= $_POST['area'];
		$email_reg= $_POST['email_reg'];
		$equipo= $_POST['equipo'];
		$ubicacion= $_POST['ubicacion'];
		$num_serie= $_POST['num_serie'];
		$marca= $_POST['marca'];
		$tipo= $_POST['tipo'];
		$procesador= $_POST['procesador'];
		$sis_ope= $_POST['sis_ope'];
		$disco= $_POST['disco'];
		
		$ram= $_POST['ram'];
		
        //$usuario_id=MysqlQuery::RequestPost('usuario_id');
        //$email_reg=MysqlQuery::RequestPost('email_reg');
        //$equipo=MysqlQuery::RequestPost('equipo');
         
       // if(MysqlQuery::Guardar("equipo_usuario", "usuario, email_usuario, equipo", "'$usuario_id', '$email_reg', '$equipo'")){
    	$con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,(
			    "INSERT INTO equipo_usuario(usuario, nombre_comp, area, ubicacion, email_usuario, equipo, num_serie, marca, tipo, procesador, sis_ope, disco, ram )
			    VALUES('$usuario_id','$usuario','$area','$ubicacion', '$email_reg', '$equipo','$num_serie', '$marca', '$tipo', '$procesador', '$sis_ope', '$disco','$ram' )"))){
		  echo '
              <script language="javascript">
				alert("Equipo asignado correctamente");
				window.location.href="admin.php?view=equipo"</script>
            ';
        }else{
            echo '
               <script language="javascript">
				alert("Error al asignado equipo a usuario");
				window.location.href="admin.php?view=equipo"</script>
            '; 
        }
    }
    
?>