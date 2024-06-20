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

	   $buscar = $_POST['bu'];
        
      if(!empty($buscar)) {
            buscar($buscar);
      }
        
      function buscar($bu) {
		  $usuario = "veco";
			$password = "Vec83Dv19iSa@";
			$servidor = "localhost";
		  $basededatos = "veco_sims_devecchi";
			$con = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
           $db = mysqli_select_db( $con, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
		   
		   
		   
		   $consulta = "SELECT * FROM servicio2";
	$resultado = mysqli_query( $con, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
		   
        $consulta = "SELECT * FROM servicio2 
	WHERE id_servicio LIKE '%".$bu."%' or equipo LIKE '%".$bu."%' or fecha_servicio LIKE '%".$bu."%' or mes LIKE '%".$bu."%' or tecnico LIKE '%".$bu."%'";
             $sql = mysqli_query( $con, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");  
		   
            $contar = @mysqli_num_rows($sql);
	
            //if($contar == 0){
				if($sql->num_rows == 0){
                  echo "No se han encontrado resultados para '<b>".$bu."</b>'.";
            }else{		
				ECHO "<table class='table table-hover table-striped table-bordered'><th>Acción</th><th>Id</th><th>Empresa</th><th>Edificio</th><th>Ubicación</th><th>Área</th><th>Equipo</th><th>Fecha</th><th>Tecnico</th>";
				while($fila=$sql->fetch_assoc()){
				  echo "<tr>";
      ?>
		<td class="text-center">
					<a href="edit_servicio.php?id=<?php echo $fila['id_servicio']; ?>" class="btn btn-sm btn-success" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					<a href="eliminar_servicio.php?id=<?php echo $fila['id_servicio']; ?>"class="btn btn-sm btn-danger" title="Borrar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
					<a href="ver_servicio.php?id=<?php echo $fila['id_servicio']; ?>" class="btn btn-info" title="Ver"><i class="fa fa-eye" aria-hidden="true"></i></a>
        </td>
        <?php
		ECHO " <TD>".utf8_decode($fila["id_servicio"])."</TD>";
        ECHO " <TD>".utf8_decode($fila["empresa"])."</TD>";
        ECHO " <TD>".utf8_decode($fila["edificio"])."</TD>";
		ECHO " <TD>".utf8_decode($fila["ubicacion"])."</TD>";
        ECHO " <TD>".utf8_decode($fila["area"])."</TD>";
		ECHO " <TD>".utf8_decode($fila["equipo"])."</TD>"; 
        ECHO " <TD>".utf8_decode($fila["fecha_servicio"])."</TD>";
        ECHO " <TD>".utf8_decode($fila["tecnico"])."</TD>";
  echo "</tr>";
            }
        }
  }
  ?>