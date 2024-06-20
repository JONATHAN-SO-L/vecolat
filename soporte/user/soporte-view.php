<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
 ?>
<div class="container">
  <div class="row well">
    <div class="col-sm-3">
      <img src="img/tecnico.png" class="img-responsive" alt="Image">
    </div>
    <div class="col-sm-9 lead">
      <h2 class="text-info">Bienvenido al Soporte Dvi</h2>
<p class="text-justify">Si tienes un problema con cualquiera de nuestros equipos reportalo creando un Ticket y te ayudaremos a solucionarlo.O si desea actualizar un Ticket utiliza el formulario de la derecha <em>Comprobar estado del Ticket</em>, solamente los <strong>usuarios registrados</strong> pueden crear un Ticket.</p>   
   </div>
  </div><!--fin row 1-->

  <div class="row">
    <div class="col-sm-6">
      <div class="panel panel-info">
        <div class="panel-heading text-center"><i class="fa fa-file-text"></i>&nbsp;<strong>Nuevo Ticket</strong></div>
        <div class="panel-body text-center">
          <img src="./img/new_ticket.png" alt="">
          <h4>Crear un nuevo Ticket</h4>
          
          <p>Para crear un <strong>Ticket</strong> has click en el siguiente boton</p>
          <a type="button" class="btn btn-info" href="./soporte.php?view=ticket">Nuevo Ticket</a>
		  
        </div>
      </div>
    </div><!--fin col-md-6-->
    
    <div class="col-sm-6">
      <div class="panel panel-danger">
        <div class="panel-heading text-center"><i class="fa fa-link"></i>&nbsp;<strong>Comprobar estado del Ticket</strong></div>
        <div class="panel-body text-center">
          <img src="./img/old_ticket.png" alt="">
          <h4>Colsultar estado del Ticket</h4>
          <form class="form-horizontal" role="form" method="GET" action="./soporte.php">
            <input type="hidden" name="view" value="ticketcon">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                  <input type="email" class="form-control" name="email_consul" placeholder="Email" required="">
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-2 control-label">ID Ticket</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="id_consul" placeholder="ID Ticket" required="">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Colsultar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div><!--fin col-md-6-->
  </div><!--fin row 2-->
</div><!--fin container-->