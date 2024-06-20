<!--************
 * @author: Meraz Prudencio Griselda  
 
 * ghriz2811@gmail.com

 * @version: 08/2019 v1
 
 */********-->
<style>
#body{
    width: calc(100% + 500px);
    height: 193px;
    margin: -150px 0 0 -90px;
    background: white;
    padding: 50px;
}	  
table {
    background-color: #6ce42e52;
}
.table-striped > tbody > tr:nth-child(odd) > td, .table-striped > tbody > tr:nth-child(odd) > th {
    background-color: #32a3f354;
}
.buscar_index{
display: none;
}
</style>

<?php

	   $buscar = $_POST['bus_inc'];
        
      if(!empty($buscar)) {
            buscar($buscar);
      }
        
      function buscar($bus_inc) {
		  $usuario = "root";
			$password = "";
			$servidor = "localhost";
		  $basededatos = "veco_sims_devecchi";
            //$con = mysqli_connect('localhost','usuario', '');
			$con = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");
           $db = mysqli_select_db( $con, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
		   
		   
		   
		   $consulta = "SELECT * FROM ticket";
	$resultado = mysqli_query( $con, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
		   
        $consulta = "SELECT * FROM ticket WHERE serie LIKE '%".$bus_inc."%' or fecha LIKE '%".$bus_inc."%' or estado_ticket LIKE '%".$bus_inc."%' ";
            //$sql = mysqli_query("SELECT * FROM empresas WHERE nombre LIKE '%".$b."%' LIMIT 9" ,$con);
           $sql = mysqli_query( $con, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");  
		   
            $contar = @mysqli_num_rows($sql);
	
            //if($contar == 0){
				if($sql->num_rows == 0){
                  echo "No se han encontrado resultados para '<b>".$bus_inc."</b>'.";
            }else{		
				ECHO "<table class='table table-hover table-striped table-bordered'><th>Acción</th><th>Id</th><th>Fecha Cración</th><th>Nombre Equipo</th><th>Serie</th><th>Estado</th><th>Usuario</th><th>Correo</th><th>Área</th><th>Ubicación</th><th>Asunto</th><th>Mensaje</th><th>Solución</th><th>Fecha Solución</th><th>Up_Time</th>";
             // while($row=mysqli_fetch_array($sql)){
				 while($row=$sql->fetch_assoc()){
				  echo "<tr>";
      ?>
		<td class="text-center"><a href="edit_empresa.php?id=<?php echo $fila['id']; ?>" class="btn btn-sm btn-success" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				     <a href="edit_inc_tabla.php?id=<?php echo $fila['id']; ?>" class="btn btn-sm btn-success" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					<a href="process_inc_tabla.php?id=<?php echo $fila['id']; ?>" class="btn btn-sm btn-warning" title="Proceso"><i class="fa fa-spinner" aria-hidden="true"></i></a>
					<a href="cerrar_inc_tabla.php?id=<?php echo $fila['id']; ?>" class="btn btn-sm btn-close" title="Cerrar Incidencia"><i class="fa fa fa-window-close-o" aria-hidden="true"></i></a>				    
					<a href="borrar_inc_tabla.php?id=<?php echo $fila['id']; ?>"class="btn btn-sm btn-danger" title="Borrar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
					<a href="ver_inc_tabla.php?id=<?php echo $fila['id']; ?>" class="btn btn-info" title="Ver"><i class="fa fa-eye" aria-hidden="true"></i></a>
        </td>
        <?php
		ECHO " <TD>".utf8_encode($row["id"])."</TD>";
        ECHO " <TD>".utf8_decode($row["fecha"])."</TD>";
		ECHO " <TD>".utf8_encode($row["num_equipo"])."</TD>";
		ECHO " <TD>".utf8_encode($row["serie"])."</TD>";
        ECHO " <TD>".utf8_decode($row["estado_ticket"])."</TD>";
        ECHO " <TD>".utf8_decode($row["nombre_usuario"])."</TD>";	
        ECHO " <TD>".utf8_decode($row["email_cliente"])."</TD>";	
        ECHO " <TD>".utf8_decode($row["area"])."</TD>";	
        ECHO " <TD>".utf8_decode($row["ubicacion"])."</TD>";	
        ECHO " <TD>".utf8_decode($row["asunto"])."</TD>";	
        ECHO " <TD>".utf8_encode($row["mensaje"])."</TD>";
		ECHO " <TD>".utf8_decode($row["solucion"])."</TD>";
		ECHO " <TD>".utf8_decode($row["fecha_solucion"])."</TD>";
		ECHO " <TD>".utf8_decode($row["up_time"])."</TD>";	
  echo "</tr>";
            }
        }
  }
  ?>