<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
 ?>
<?php 
include ("conexi.php");
include "./inc/navbarsop.php"; 
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
	 if( $_SESSION['nombre_admin']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="admin"){ 


        if(isset($_POST['fecha_ticket']) && isset($_POST['name_ticket'])){

          /*Este codigo nos servira para generar un numero diferente para cada ticket*/
          $codigo = ""; 
          $longitud = 2; 
          for ($i=1; $i<=$longitud; $i++){ 
            $numero = rand(0,9); 
            $codigo .= $numero; 
          } 
          $num=Mysql::consulta("SELECT * FROM ticket");
          $numero_filas = mysqli_num_rows($num);

          $numero_filas_total=$numero_filas+1;
          $id_ticket="TK".$codigo."N".$numero_filas_total;
          /*Fin codigo numero de ticket*/
/*
          $fecha_ticket=  MysqlQuery::RequestPost('fecha_ticket');
		  $equipo_ticket=  MysqlQuery::RequestPost('equipo_ticket');
		  $estado_ticket="Pendiente";
          $nombre_ticket=  MysqlQuery::RequestPost('name_ticket');
          $email_ticket= MysqlQuery::RequestPost('email_ticket');
          $area_ticket= MysqlQuery::RequestPost('area_ticket');
		  $ubicacion_ticket= MysqlQuery::RequestPost('ubicacion_ticket');
          $asunto_ticket= MysqlQuery::RequestPost('');        
          $mensaje_ticket=  MysqlQuery::RequestPost('mensaje_ticket');
          
          if(MysqlQuery::Guardar("INSERT INTO ticket(fecha, num_equipo,serie, estado_ticket, nombre_usuario, email_cliente, area, ubicacion, asunto, mensaje)VALUES('$fecha_ticket','$equipo_ticket','$id_ticket','$estado_ticket','$nombre_ticket','$email_ticket','$area_ticket','$ubicacion_ticket','$asunto_ticket')")){
		

          if(MysqlQuery::Guardar("ticket", "fecha, num_equipo,serie ,estado_ticket , nombre_usuario, email_cliente, area, ubicacion, asunto, mensaje", "'$fecha_ticket',  $equipo_ticket, '$id_ticket', '$estado_ticket', '$nombre_ticket', '$email_ticket', '$area_ticket','$ubicacion_ticket', '$asunto_ticket', '$mensaje_ticket'")){
*/


			
    ///////////////////////////////////////////////////////////////////////////
	
			$estado_ticket="Pendiente";
		
        	if(isset($_POST['fecha_ticket'])){
			$fecha_ticket= $_POST['fecha_ticket'];
		}else{
			$fecha_ticket="";
		}
		if(isset($_POST['equipo_ticket'])){
			$equipo_ticket= $_POST['equipo_ticket'];
		}else{
			$equipo_ticket="";
		}
		if(isset($_POST['name_ticket'])){
			$name_ticket= $_POST['name_ticket'];
		}else{
			$name_ticket="";
		}
		if(isset($_POST['email_ticket'])){
			$email_ticket= $_POST['email_ticket'];
		}else{
			$email_ticket="";
		}
		if(isset($_POST['area_ticket'])){
			$area_ticket= $_POST['area_ticket'];
		}else{
			$area_ticket="";
		}
		if(isset($_POST['asunto_ticket'])){
			$asunto_ticket= $_POST['asunto_ticket'];
		}else{
			$asunto_ticket="";
		}
		if(isset($_POST['mensaje_ticket'])){
			$mensaje_ticket= $_POST['mensaje_ticket'];
		}else{
			$mensaje_ticket="";
		}
		
			$solucion="";
		
			$fecha_solucion="";
		
			$observaciones="";
			 $cabecera="From: Soporte Dvi <sistemas@veco.com.mx>";
          $mensaje_mail="¡Gracias por reportarnos su problema! Buscaremos una solución para su reporte lo mas pronto posible. Su ID ticket es: ".$id_ticket;
          //$mensaje_mail=wordwrap($mensaje_mail, 70, "\r\n");
		
		$con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("INSERT INTO ticket(fecha, num_equipo, serie, estado_ticket, nombre_usuario, email_cliente, area, asunto, mensaje,solucion, fecha_solucion, observaciones)
			VALUES
			('$fecha_ticket','$equipo_ticket','$id_ticket','$estado_ticket','$name_ticket','$email_ticket','$area_ticket','$asunto_ticket','$mensaje_ticket', '$solucion','$fecha_solucion','$observaciones')"))){
		
		
		/////////////////////////////////////////////////////////////////////////////////////
	/*----------  Enviar correo con los datos del ticket----------*/
            mail($email_ticket, $asunto_ticket, $mensaje_mail, $cabecera);
            
			
            echo '
                <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">TICKET CREADO</h4>
                    <p class="text-center">
                        Ticket creado con exito '.$_SESSION['nombre'].'<br>Su Ticket ID es: <strong>'.$id_ticket.'</strong>
                    </p>
					 <p class="text-center">
                        Se recomienda guardar su ID
                    </p>
                </div>
            ';
//TK08N21
          }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido crear su Ticket. Por favor intente nuevamente.
                    </p>
                </div>
            ';
		  }
 }
		  
?>

        <div class="container">
          <div class="row well">
            <div class="col-sm-3">
              <img src="img/ticket.png" class="img-responsive" alt="Image">
            </div>
            <div class="col-sm-9 lead">
              <h3 class="text-info">¿Cómo abrir un nuevo Ticket?</h3>
              <p>Para abrir un Ticket deberá de llenar todos los campos de el siguiente formulario. Usted podra verificar el estado de su Ticket mediante la <strong>Ticket ID</strong> que se le proporcionara a usted cuando llene y nos envie el siguiente formulario.</p>
            </div>
          </div><!--fin row 1-->

          <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title text-center"><strong><i class="fa fa-ticket"></i>&nbsp;&nbsp;&nbsp;Ticket</strong></h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-sm-4 text-center">
                      <br><br><br>
                      <img src="img/write_email.png" alt=""><br><br>
                      <p class="text-primary text-justify">Por favor llene todos los datos de este formulario para abrir su Ticket. Se recomienda que guarde la <strong>Ticket ID</strong> que se le asignara para futuras consultas.</p>
                    </div>
                    <div class="col-sm-8">
                      <form class="form-horizontal" role="form" action="" method="POST">
                          <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Fecha</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="fechainput" placeholder="Fecha" name="fecha_ticket" required="" readonly>
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Usuario</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <input type="text" class="form-control" placeholder="Nombre" readonly="" value="<?php echo $_SESSION['nombre_usuario']; ?>" name="name_ticket" title="Nombre Apellido">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <input type="email" class="form-control" id="inputEmail3" value="<?php isset($_SESSION['email_usuario']) ?>" name="email_ticket" readonly="" title="Ejemplo@dominio.com">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-2 control-label">Equipo</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <input type="text" class="form-control" placeholder="Equipo" required="" name="equipo_ticket" title="Nombre Equipo">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                             <label  class="col-sm-2 control-label">Área</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                    <select class="form-control" name="area_ticket">                                        
                                        <option value=""></option>   
										<option value="Contabilidad">Contabilidad</option>
										<option value="Facturacion">Facturación</option>
										<option value="Administracion">Administracion</option>	                                     
                                        <option value="Ventas">Ventas</option>
                                        <option value="Vendedores">Vendedores</option>									
										<option value="Servicios">Servicios</option>
										<option value="Ingenieria">Ingenieria</option>									
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                </div>
                            </div>
                        </div>
						
						
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Asunto</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                <input type="text" class="form-control" placeholder="Asunto" name="asunto_ticket" required="">
                                <span class="input-group-addon"><i class="fa fa-paperclip"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Describa su problema </label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Escriba el problema que presenta" name="mensaje_ticket" required=""></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-info">Crear Ticket</button>
                
							  </div>
							   </div>
                             </fieldset> 
                      </form>
					  <div class="col-sm-6">
                                   <a href="./soporte.php?view=soporte" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center; width: 100%;"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
                              </div>
                    </div>
                  </div>
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
                <img src="./img/SadTux.png" alt="Image" class="img-responsive"/>
                
            </div>
            <div class="col-sm-7 text-center">
                <h1 class="text-danger">Lo sentimos esta página es solamente para usuarios registrados en Devecchi</h1>
                <h3 class="text-info">Inicia sesión para poder acceder</h3>
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