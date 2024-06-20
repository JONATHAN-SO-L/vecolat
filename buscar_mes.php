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

	   $buscar = $_POST['busqueda'];
        
      if(!empty($buscar)) {
            buscar($buscar);
      }
        
      function buscar($bu) {
		  $usuario = "veco";
			$password = "Vec83Dv19iSa@";
			$servidor = "localhost";
		  $basededatos = "veco_sims_devecchi";
		  $equipo= $_POST['equipo_id'];
		  
		  $conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
	$conexion ->set_charset('utf8');
	$conexion->query("SET NAMES UTF8");
    $conexion->query("SET CHARACTER SET utf8");
	
	// Selección de la base de datos
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
		   
		   
		   
		   $consulta = "SELECT * FROM servicio2";
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
		   
        $consulta = "SELECT * from servicio2 
		WHERE equipo='$equipo' AND mes LIKE '%".$bu."%' or fecha_servicio LIKE '%".$bu."%'  ";
		
           $sql = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");  
		   
            $contar = @mysqli_num_rows($sql);
	
            //if($contar == 0){
				if($sql->num_rows == 0){
                  echo "No se han encontrado resultados para '<b>".$bu."</b>'.";
            }else{		
				ECHO "<table class='table table-hover table-striped table-bordered'><th>Acción</th><th>Id</th><th>Equipo</th><th>Fecha de Servicio</th><th>Mes</th>";

				 while($row=$sql->fetch_assoc()){
				  echo "<tr>";
      ?>
		<td class="text-center">
			<button id="save" class="btn btn-success" data-id="<?php echo $row['id_servicio']; ?>"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;PDF</button>
			<!--a href="seccion_consul_admin.php?id=<?php echo $row['id_servicio']; ?>" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a-->
		</td>
        <?php
		ECHO " <TD>".utf8_decode($row["id_servicio"])."</TD>";
        ECHO " <TD>".utf8_decode($row["equipo"])."</TD>";
        ECHO " <TD>".utf8_decode($row["fecha_servicio"])."</TD>";
		ECHO " <TD>".utf8_decode($row["mes"])."</TD>";
  echo "</tr>";
            }
        }
  }
  ?>
  <script>
  $(document).ready(function(){
    $("button#save").click(function (){
       window.open ("./lib/pdf_admin.php?id="+$(this).attr("data-id"));
    });
  });
</script>