<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 10/2020 v1
 */
?>
<?php if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="RH" ){ ?>

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
                <h1 class="animated lightSpeedIn">Reporte de Checadas</h1>
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
                
            </div>
            <div class="col-sm-9">
                 <input type="button" class="btn btn-danger btn-sm pull-right" name="Volver atras" value="Volver atras" onClick="window.location='soporte.php?view=checadas';" />
            </div>
          </div>
        </div>
        <div class="container">
  <div class="row">
    <div class="col-sm-8">
      <div class="panel panel-success">
        <div class="panel-heading text-center"><strong>Introduzca de que fecha a que fecha requiere el Reporte de Checadas</strong></div>
        <div class="panel-body">
			
		  <form method="POST" class="form" action="excel.php">
                <input type="date" name="fecha1">
                <input type="date" name="fecha2">
                 <input type="hidden" class="form-control" readonly="" value="<?php echo $_SESSION['ubi']; ?>" name="ubi" >
                <input type="submit" name="generar_reporte">
           
			 </form>
        </div>
      </div>
    </div>
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
                    <h1 class="text-danger">Lo sentimos esta página es solamente para administradores del Sistema</h1>
                    <h3 class="text-info text-center">Inicia sesión como administrador para poder acceder</h3>
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
