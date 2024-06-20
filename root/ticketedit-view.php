<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
 ?>
<?php

if($_SESSION['nombre']!="" && $_SESSION['tipo']=="superoot"){
    include ("conexi.php");
header('Content-Type: text/html; charset=UTF-8');

	if(isset($_POST['id_edit']) && isset($_POST['serie_ticket']) && isset($_POST['asunto_ticket'])){
/*
		$id_edit=MysqlQuery::RequestPost('id_edit');
		$estado_edit=  MysqlQuery::RequestPost('estado_ticket');
		$solucion_edit=  MysqlQuery::RequestPost('solucion_ticket');
		$solucion_fecha=  MysqlQuery::RequestPost('fecha_solucion');
		$solucion_usuario=  MysqlQuery::RequestPost('sistemas');
		$serie_ticket=  MysqlQuery::RequestPost('serie_ticket');
		$email=  MysqlQuery::RequestPost('email_ticket');
	    $asunto=  MysqlQuery::RequestPost('asunto_ticket');
	    $estatus=  MysqlQuery::RequestPost('estatus_ticket');
		$radio_email=  MysqlQuery::RequestPost('optionsRadios');
*/
		if(isset($_POST['id_edit'])){
			$id_edit= $_POST['id_edit'];
		}else{
			$id_edit="";
		}
		if(isset($_POST['estado_ticket'])){
			$estado_edit= $_POST['estado_ticket'];
		}else{
			$estado_edit="";
		}
		if(isset($_POST['solucion_ticket'])){
			$solucion_edit= $_POST['solucion_ticket'];
		}else{
			$solucion_edit="";
		}
		if(isset($_POST['fecha_solucion'])){
			$solucion_fecha= $_POST['fecha_solucion'];
		}else{
			$solucion_fecha="";
		}
		if(isset($_POST['hora_solucion'])){
			$hora_solucion= $_POST['hora_solucion'];
		}else{
			$hora_solucion="";
		}
		if(isset($_POST['sistemas'])){
			$solucion_usuario= $_POST['sistemas'];
		}else{
			$solucion_usuario="";
		}
		if(isset($_POST['serie_ticket'])){
			$serie_ticket= $_POST['serie_ticket'];
		}else{
			$serie_ticket="";
		}
		if(isset($_POST['email_ticket'])){
			$email= $_POST['email_ticket'];
		}else{
			$email="";
		}
		if(isset($_POST['asunto_ticket'])){
			$asunto= $_POST['asunto_ticket'];
		}else{
			$asunto="";
		}
		if(isset($_POST['estatus_ticket'])){
			$estatus= $_POST['estatus_ticket'];
		}else{
			$estatus="";
		}
		if(isset($_POST['optionsRadios'])){
			$radio_email= $_POST['optionsRadios'];
		}else{
			$radio_email="";
		}
		$from="sistemas@veco.lat";
		$cabecera="From:".$from;
		$mensaje_mail=utf8_decode("Estimado usuario, se ha solucionado su ticket \r\n la solución es la siguiente : ".$solucion_edit."\r\n \r\n
		Saludos Cordiales.\r\n Área de sistemas \r\n sistemas@veco.mx \r\n \r\n 
        Por favor, responda a este mensaje de la solución aprobado");
		$mensaje_mail=wordwrap($mensaje_mail, 70, "\r\n");
		
		$status_mail=utf8_decode("Estimado usuario, se ha revisado su ticket \r\n el Estatus es el siguiente : ".$estatus."\r\n \r\n 
		Saludos Cordiales\r\n Área de sistemas \r\n sistemas@veco.mx \r\n \r\n 
        Por favor, NO responda a este mensaje, es un envío automático");
		$status_mail=wordwrap($status_mail, 70, "\r\n");
		
		$email_root=" a.lorenzana@devinsa.com";
		$asunto_root="Ticket resuelto";
		$mensaje_root=utf8_decode("Estimado Gerente \r\n El ticket ".$serie_ticket."  ha sido resuelto por  ".$solucion_usuario."\r\n \r\n
		Saludos Cordiales.\r\n Área de sistemas \r\n sistemas@veco.mx \r\n \r\n 
        Por favor, NO responda a este mensaje, es un envío automático");
        
        $asunto_status="Estatus de Ticket";
        $mensaje_root_status=utf8_decode("Estimado Gerente \r\n El ticket ".$serie_ticket."  ha sido revisado por  ".$solucion_usuario."\r\n 
        el Estatus es el siguiente : ".$estatus."\r\n \r\n
		Saludos Cordiales.\r\n Área de sistemas \r\n sistemas@veco.mx \r\n \r\n 
        Por favor, NO responda a este mensaje, es un envío automático");

	//	if(MysqlQuery::Actualizar("ticket", "estado_ticket='$estado_edit', estatus='$estatus', solucion='$solucion_edit', fecha_solucion='$solucion_fecha', observaciones='$solucion_usuario'", "id='$id_edit'")){
    
    $con=mysqli_connect($host,$user,$pw,$db);

    switch ($_POST['estado_ticket']) {

      case 'En proceso':
      $proceso = date('Y-m-d H:i:s');
      if(mysqli_query($con,("UPDATE ticket set estado_ticket='$estado_edit', estatus='$estatus', solucion='$solucion_edit', fecha_solucion='',hora_solucion='', observaciones='$solucion_usuario', proceso ='$proceso'
        WHERE id ='$id_edit' "))){

        echo '
      <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      <h4 class="text-center">Incidencia Actualizada</h4>
      <p class="text-center">
      El Ticket fue actualizado con exito
      </p>
      </div>
      ';
      if($radio_email=="option2"){
        mail($email_root, $asunto_root, $mensaje_root, $cabecera);
        mail($email, $asunto_root, $mensaje_mail, $cabecera);
      }
      if($radio_email=="option3"){
        mail($email_root, $asunto_status, $mensaje_root_status, $cabecera);
        mail($email, $asunto_status, $status_mail, $cabecera);
      }

    }else{
      echo '
      <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      <h4 class="text-center">OCURRIÓ UN ERROR</h4>
      <p class="text-center">
      No hemos podido actualiza el Ticket
      </p>
      </div>
      '; 
    }
    break;

    case 'Resuelto':
    $fecha_hora_sol = date('Y-m-d H:i:s');
    if(mysqli_query($con,("UPDATE ticket set estado_ticket='$estado_edit', estatus='$estatus', solucion='$solucion_edit', fecha_solucion='$solucion_fecha',hora_solucion='$hora_solucion', observaciones='$solucion_usuario', fecha_hora_sol= '$fecha_hora_sol'
      WHERE id ='$id_edit' "))){

      echo '
    <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    <h4 class="text-center">Incidencia Actualizada</h4>
    <p class="text-center">
    El Ticket fue actualizado con exito
    </p>
    </div>
    ';
    if($radio_email=="option2"){
      mail($email_root, $asunto_root, $mensaje_root, $cabecera);
      mail($email, $asunto_root, $mensaje_mail, $cabecera);
    }
    if($radio_email=="option3"){
      mail($email_root, $asunto_status, $mensaje_root_status, $cabecera);
      mail($email, $asunto_status, $status_mail, $cabecera);
    }

  }else{
    echo '
    <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
    <p class="text-center">
    No hemos podido actualiza el Ticket
    </p>
    </div>
    '; 
  }
  break;

  case 'Requisicion de compra':
  $req_compra = date('Y-m-d H:i:s');
  if(mysqli_query($con,("UPDATE ticket set estado_ticket='$estado_edit', estatus='$estatus', solucion='$solucion_edit', fecha_solucion='',hora_solucion='', observaciones='$solucion_usuario', fecha_hora_sol=NULL, req_compra = '$req_compra'
    WHERE id ='$id_edit' "))){

    echo '
  <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  <h4 class="text-center">Incidencia Actualizada</h4>
  <p class="text-center">
  El Ticket fue actualizado con exito
  </p>
  </div>
  ';
  if($radio_email=="option2"){
    mail($email_root, $asunto_root, $mensaje_root, $cabecera);
    mail($email, $asunto_root, $mensaje_mail, $cabecera);
  }
  if($radio_email=="option3"){
    mail($email_root, $asunto_status, $mensaje_root_status, $cabecera);
    mail($email, $asunto_status, $status_mail, $cabecera);
  }

}else{
  echo '
  <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  <h4 class="text-center">OCURRIÓ UN ERROR</h4>
  <p class="text-center">
  No hemos podido actualiza el Ticket
  </p>
  </div>
  '; 
}
break;

case 'Reparacion en Garantia':
$garantia = date('Y-m-d H:i:s');
if(mysqli_query($con,("UPDATE ticket set estado_ticket='$estado_edit', estatus='$estatus', solucion='$solucion_edit', fecha_solucion='',hora_solucion='', observaciones='$solucion_usuario', fecha_hora_sol= NULL, garantia = '$garantia'
  WHERE id ='$id_edit' "))){

  echo '
<div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
<h4 class="text-center">Incidencia Actualizada</h4>
<p class="text-center">
El Ticket fue actualizado con exito
</p>
</div>
';
if($radio_email=="option2"){
  mail($email_root, $asunto_root, $mensaje_root, $cabecera);
  mail($email, $asunto_root, $mensaje_mail, $cabecera);
}
if($radio_email=="option3"){
  mail($email_root, $asunto_status, $mensaje_root_status, $cabecera);
  mail($email, $asunto_status, $status_mail, $cabecera);
}

}else{
  echo '
  <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  <h4 class="text-center">OCURRIÓ UN ERROR</h4>
  <p class="text-center">
  No hemos podido actualiza el Ticket
  </p>
  </div>
  '; 
}
break;

case 'Cancelado':
$mensaje_root_cancel=utf8_decode("Estimado Gerente \r\n El ticket ".$serie_ticket." ha sido CANCELADO por el técnico: ".$solucion_usuario."\r\n \r\n
  El motivo es el siguiente: ".$solucion_edit."\r\n\r\n
  Saludos Cordiales.\r\n Área de sistemas \r\n sistemas@veco.mx \r\n \r\n 
  Por favor, NO responda a este mensaje, es un envío automático");

$fecha_hora_sol = date('Y-m-d H:i:s');
if(mysqli_query($con,("UPDATE ticket set estado_ticket='$estado_edit', estatus='$estatus', solucion='$solucion_edit', fecha_solucion='$solucion_fecha',hora_solucion='$hora_solucion', observaciones='$solucion_usuario', fecha_hora_sol= '$fecha_hora_sol'
  WHERE id ='$id_edit' "))){

  echo '
<div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
<h4 class="text-center">Incidencia Actualizada</h4>
<p class="text-center">
El Ticket fue actualizado con exito
</p>
</div>
';
if($radio_email=="option2"){
  mail($email_root, $asunto_root, $mensaje_root, $cabecera);
  mail($email, $asunto_root, $mensaje_mail, $cabecera);
}
if($radio_email=="option3"){
  mail($email_root, $asunto_status, $mensaje_root_status, $cabecera);
  mail($email, $asunto_status, $status_mail, $cabecera);
}
}else{
  echo '
  <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  <h4 class="text-center">OCURRIÓ UN ERROR</h4>
  <p class="text-center">
  No hemos podido actualiza el Ticket
  </p>
  </div>
  '; 
}
break;

case 'Resuelto compra':
$fecha_hora_sol = date('Y-m-d H:i:s');
if(mysqli_query($con,("UPDATE ticket set estado_ticket='$estado_edit', estatus='$estatus', solucion='$solucion_edit', fecha_solucion='$solucion_fecha',hora_solucion='$hora_solucion', observaciones='$solucion_usuario', fecha_hora_sol= '$fecha_hora_sol'
  WHERE id ='$id_edit' "))){

  echo '
<div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
<h4 class="text-center">Incidencia Actualizada</h4>
<p class="text-center">
El Ticket fue actualizado con exito
</p>
</div>
';
if($radio_email=="option2"){
  mail($email_root, $asunto_root, $mensaje_root, $cabecera);
  mail($email, $asunto_root, $mensaje_mail, $cabecera);
}
if($radio_email=="option3"){
  mail($email_root, $asunto_status, $mensaje_root_status, $cabecera);
  mail($email, $asunto_status, $status_mail, $cabecera);
}
}else{
  echo '
  <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  <h4 class="text-center">OCURRIÓ UN ERROR</h4>
  <p class="text-center">
  No hemos podido actualiza el Ticket
  </p>
  </div>
  '; 
}
break;

default:
$fecha_hora_sol = date('Y-m-d H:i:s');
if(mysqli_query($con,("UPDATE ticket set estado_ticket='$estado_edit', estatus='$estatus', solucion='$solucion_edit', fecha_solucion='$solucion_fecha',hora_solucion='$hora_solucion', observaciones='$solucion_usuario', fecha_hora_sol= '$fecha_hora_sol'
  WHERE id ='$id_edit' "))){

  echo '
<div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
<h4 class="text-center">Incidencia Actualizada</h4>
<p class="text-center">
El Ticket fue actualizado con exito
</p>
</div>
';
if($radio_email=="option2"){
  mail($email_root, $asunto_root, $mensaje_root, $cabecera);
  mail($email, $asunto_root, $mensaje_mail, $cabecera);
}
if($radio_email=="option3"){
  mail($email_root, $asunto_status, $mensaje_root_status, $cabecera);
  mail($email, $asunto_status, $status_mail, $cabecera);
}
}else{
  echo '
  <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  <h4 class="text-center">OCURRIÓ UN ERROR</h4>
  <p class="text-center">
  No hemos podido actualiza el Ticket
  </p>
  </div>
  '; 
}
break;
}
}
	     
	$id = MysqlQuery::RequestGet('id');
	$sql = Mysql::consulta("SELECT * FROM ticket WHERE id= '$id' ");
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
                <a href="root.php?view=ticketroot" class="btn btn-primary btn-sm pull-right"><i class="fa fa-reply"></i>&nbsp;&nbsp;Volver administrar Ticket</a>
            </div>
          </div>
        </div>
            
            
          <div class="container">
            <div class="col-sm-12">
                <form class="form-horizontal" role="form" action="" method="POST">
                		<input type="hidden" name="id_edit" value="<?php echo $reg['id']?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Fecha</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                    <input class="form-control" readonly="" type="text" name="fecha_ticket" readonly="" value="<?php echo $reg['fecha']?>">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Serie</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                    <input class="form-control" readonly="" type="text" name="serie_ticket" readonly="" value="<?php echo $reg['serie']?>">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Estado</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                <select class="form-control" name="estado_ticket">
              <option value="<?php echo $reg['estado_ticket']?>"><?php echo $reg['estado_ticket']?> (Actual)</option>
              <option value="Pendiente">Pendiente</option>
              <option value="En proceso">En proceso</option>
              <option value="Requisicion de compra">Requisición de compra</option>
              <option value="Resuelto">Resuelto</option>
              <option value="Reparacion en Garantia">Reparacion en Garantia</option>
              <option value="Cancelado">Cancelado</option>
              <option value="Resuelto compra">Resuelto compra</option>
            </select>
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Usuario</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="name_usuario" readonly="" value="<?php echo $reg['nombre_usuario']?>">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-2 control-label">Equipo</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="name_equipo" readonly="" value="<?php echo $reg['equipo']?>">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="email" readonly="" class="form-control"  name="email_ticket" readonly="" value="<?php echo utf8_decode($reg['email_cliente'])?>">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Área</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="departamento_ticket" readonly="" value="<?php echo $reg['area']?>">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                              </div> 
                          </div>
                        </div>
						
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Asunto</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="asunto_ticket" readonly="" value="<?php echo utf8_decode($reg['asunto'])?>">
                                <span class="input-group-addon"><i class="fa fa-paperclip"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Mensaje</label>
                          <div class="col-sm-10">
                              <textarea class="form-control" readonly="" rows="3"  name="mensaje_ticket" readonly=""><?php echo utf8_decode($reg['mensaje'])?></textarea>
                          </div>
                        </div>
                    
                    <div class="form-group">
                          <label  class="col-sm-2 control-label">Seguimiento</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3" title="Favor de introducir Mayusculas y Minusculas" name="estatus_ticket" ><?php echo utf8_decode($reg['estatus'])?></textarea>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Solución</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3" title="Favor de introducir Mayusculas y Minusculas" name="solucion_ticket" ><?php echo utf8_decode($reg['solucion'])?></textarea>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-2 control-label">Fecha Solución</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="1"  name="fecha_solucion" readonly="" required=""><?php echo date("d/m/Y");?></textarea>
                          </div>
                        </div>
                        
                         <div class="form-group">
                          <label  class="col-sm-2 control-label">Hora Solución</label>
                          <div class="col-sm-10">
                          <div class="input-group">
                            <input type="text" readonly=""  class="form-control" name="hora_solucion" readonly="" value="<?php echo date("h:i:s A");?>">
                            <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                          </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Resuelto por:</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="sistemas" readonly="" value="<?php echo $_SESSION['nombre_completo'];?>">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              </div>
                          </div>
                        </div>
						
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10 text-center">
                              <button type="submit" class="btn btn-info">Actualizar ticket</button>
                          </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-sm-offset-5">
								<div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" value="option3" checked>
                                         Enviar estatus al email del usuario y Gerente
                                    </label>
                                 </div>
								<div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" value="option2">
                                         Enviar solución al email del usuario y Gerente
                                    </label>
                                 </div>
                                
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
                    <h1 class="text-danger">Lo sentimos esta página es solamente para administradores de Veco</h1>
                    <h3 class="text-info text-center">Inicia sesión como administrador para poder acceder</h3>
                </div>
                <div class="col-sm-1">&nbsp;</div>
            </div>
        </div>
<?php
}
?>