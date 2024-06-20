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
            //$con = mysqli_connect('localhost','usuario', '');
			$con = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
           $db = mysqli_select_db( $con, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
		   
		   
		   
		   $consulta = "SELECT * FROM equipo";
	$resultado = mysqli_query( $con, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
		   
        $consulta = "SELECT * FROM equipo inner join empresas on equipo.empresa_id=empresas.id
	inner join edificio on equipo.edificio_id=edificio.id_edificio
	inner join ubicacion on equipo.ubicacion_id=ubicacion.id_ubicacion
	inner join area on equipo.area_id=area.id_area 
	WHERE id_equipo LIKE '%".$bu."%' or equipo LIKE '%".$bu."%' or nombre_corto LIKE '%".$bu."%' or descripcion LIKE '%".$bu."%' or ubicacion LIKE '%".$bu."%'";
            //$sql = mysqli_query("SELECT * FROM empresas WHERE nombre LIKE '%".$b."%' LIMIT 9" ,$con);
           $sql = mysqli_query( $con, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");  
		   
            $contar = @mysqli_num_rows($sql);
	
            //if($contar == 0){
				if($sql->num_rows == 0){
                  echo "No se han encontrado resultados para '<b>".$bu."</b>'.";
            }else{		
				ECHO "<table class='table table-hover table-striped table-bordered'><th WIDTH=20% >Acción</th><th>Id</th><th>Empresa</th><th>Edificio</th><th>Ubicación</th><th>Número de Serie</th><th>Área 1</th><th>Área 2</th><th>Área 3</th><th>Área 4</th><th>Área 5</th>";
             // while($row=mysqli_fetch_array($sql)){
				 while($row=$sql->fetch_assoc()){
				  echo "<tr>";
      ?>
		<td class="text-center"><a href="edit_empresa.php?id=<?php echo $row['id_equipo']; ?>" class="btn btn-sm btn-success" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				    <a href="copy_empresa.php?id=<?php echo $row['id_equipo']; ?>"class="btn btn-sm btn-warning" title="Copiar"><i class="fa fa-clone" aria-hidden="true"></i></a>
					<a href="eliminar_empresa.php?id=<?php echo $row['id_equipo']; ?>"class="btn btn-sm btn-danger" title="Borrar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
					<a href="ver_empresa.php?id=<?php echo $row['id_equipo']; ?>" class="btn btn-info" title="Ver"><i class="fa fa-eye" aria-hidden="true"></i></a>
         </td>
        <?php
		ECHO " <TD>".utf8_decode($row["id_equipo"])."</TD>";
        ECHO " <TD>".utf8_decode($row["nombre_corto"])."</TD>";
        ECHO " <TD>".utf8_decode($row["descripcion"])."</TD>";
		ECHO " <TD>".utf8_decode($row["ubicacion"])."</TD>";
        ECHO " <TD>".utf8_decode($row["equipo"])."</TD>";
		ECHO " <TD>".utf8_decode($row["area"])."</TD>"; 
		ECHO " <TD>".utf8_decode($row["area_id2"])."</TD>";		
		ECHO " <TD>".utf8_decode($row["area_id3"])."</TD>";
		ECHO " <TD>".utf8_decode($row["area_id4"])."</TD>";
		ECHO " <TD>".utf8_decode($row["area_id5"])."</TD>";  
  echo "</tr>";
            }
        }
  }
  ?>