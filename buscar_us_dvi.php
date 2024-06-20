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

	   $buscar = $_POST['busc'];
        
      if(!empty($buscar)) {
            buscar($buscar);
      }
        
      function buscar($busc) {
		  $usuario = "veco_dvi";
			$password = "Vec83Dv19iSa@";
			$servidor = "localhost";
		  $basededatos = "veco_sims_devecchi";
            //$con = mysqli_connect('localhost','usuario', '');
			$con = mysqli_connect( $servidor, $usuario, $password) or die ("No se ha podido conectar al servidor de Base de datos");
           $db = mysqli_select_db( $con, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
		   
		   
		   
		   $consulta = "SELECT * FROM usuario_devecchi";
	$resultado = mysqli_query( $con, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
		   
        $consulta = "SELECT * FROM usuario_devecchi WHERE nombre_usuario LIKE '%".$busc."%' or nombre LIKE '%".$busc."%' or id LIKE '%".$busc."%' ";
            //$sql = mysqli_query("SELECT * FROM empresas WHERE nombre LIKE '%".$b."%' LIMIT 9" ,$con);
           $sql = mysqli_query( $con, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");  
		   
            $contar = @mysqli_num_rows($sql);
	
            //if($contar == 0){
				if($sql->num_rows == 0){
                  echo "No se han encontrado resultados para '<b>".$busc."</b>'.";
            }else{		
				ECHO "<table class='table table-hover table-striped table-bordered'><th WIDTH=10% >Acción</th><th WIDTH=2%>Id</th><th WIDTH=10%>Nombre Usuario</th><th WIDTH=12%>Clave</th><th WIDTH=12%>Fotografia</th><th>Nombre</th><th>Apellido</th><th>Especialidad</th><th>Horario</th><th>Email</th><th>Telefono</th>";
             // while($row=mysqli_fetch_array($sql)){
				 while($row=$sql->fetch_assoc()){
				  echo "<tr>";
      ?>
		<td class="text-center">
                    <a href="edit_empresa.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					<a href="eliminar_empresa.php?id=<?php echo $row['id']; ?>"class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
					<a href="ver_empresa.php?id=<?php echo $row['id']; ?>" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
        </td>
        <?php
		ECHO " <TD>".utf8_decode($row["id"])."</TD>";
        ECHO " <TD>".utf8_decode($row["nombre_usuario"])."</TD>";
		ECHO " <TD>".utf8_decode($row["clave"])."</TD>";
		ECHO " <TD>".utf8_decode($row["fotografia"])."</TD>";
        ECHO " <TD>".utf8_decode($row["nombre"])."</TD>";	
        ECHO " <TD>".utf8_decode($row["apellido"])."</TD>";	
        ECHO " <TD>".utf8_decode($row["especialidad"])."</TD>";	
        ECHO " <TD>".utf8_decode($row["horario"])."</TD>";	
        ECHO " <TD>".utf8_decode($row["email_devecchi"])."</TD>";	
        ECHO " <TD>".utf8_decode($row["telefono"])."</TD>";	
  echo "</tr>";
            }
        }
  }
  ?>