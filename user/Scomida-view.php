<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 10/2020 v1
 */
?>
<?php if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="user" ){ ?>
<?php

?>

<style>
.page-header{
display:none;
}
</style>

<title>Checador Devinsa</title>

        <!--************************************ Page content******************************-->
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Salida Comida</h1>
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
 	
<?php
 include ("conexi.php");
	

	if(isset($_POST['name_usuario']) && isset($_POST['fecha_checador'])){ 
			
			$nombre= $_POST['name_usuario'];
			$fecha= $_POST['fecha_checador'];
			$salida_comer= $_POST['salida_comer'];
			
			$con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("UPDATE reg_checador2 set salida_comer='$salida_comer' WHERE usuario='$nombre' AND fecha='$fecha' "))){
			
		
			echo  '<script language="javascript">
				alert("Se ha checado su salida a comer. Gracias");
				window.location.href="./soporte.php?view=Ccomida"</script>';
		}else{
			echo '<script language="javascript">
				alert("Su checada fue incorrecta favor de intentarlo. Gracias");
				window.location.href="./soporte.php?view=Scomida"</script>';
		}
	}
?>	
<div class="container">
  <div class="row">
    <div class="col-sm-8">
      <div class="panel panel-success">
        <div class="panel-heading text-center"><strong></strong></div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" action="" method="POST" enctype="multipart/form-data">
                          <fieldset>
                      <div class="form-group">
                            <label class="col-sm-2 control-label">Hora</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="salida_comer"  readonly value="<?php echo date("h:i A");?>">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Fecha</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="fecha_checador"  readonly value="<?php echo date("Y-m-d");?>">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        
                       <div class="form-group">
                          <label  class="col-sm-2 control-label">Usuario</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" value="<?php echo $_SESSION['nombre_completo']; ?>" name="name_usuario" >
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              </div>
                          </div>
                        </div> 
			 <fieldset>
            </div>
            <center><button type="submit" class="btn btn-success">Checar</button>
            <input type="button" class="btn btn-danger" name="cancel" value="Cancelar" onClick="window.location='./soporte.php?view=Ccomida';" /></center>
          </form>
        </div>
      </div>
    <div class="col-sm-4 text-center hidden-xs">
      <img src="img/Ccomida.png" class="img-responsive" alt="Image">
    </div>

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
                    <h1 class="text-danger">Lo sentimos esta p谩gina es solamente para Usuarios del Sistema</h1>
                    <h3 class="text-info text-center">Inicia sesi贸n para poder acceder</h3>
                </div>
                <div class="col-sm-1">&nbsp;</div>
            </div>
        </div>
<?php
}
?>
<script type="text/javascript">
  $(document).ready(function(){
      $("#fechainput").datepicker();
  });
</script>