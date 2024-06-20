<?
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */

$buscar = $_POST['b'];
        
      if(!empty($buscar)) {
            buscar($buscar);
      }
        
      function buscar($b) {
/////// CONEXIÓN A LA BASE DE DATOS /////////
$host = 'localhost';
$basededatos = 'veco_sims_devecchi';
$usuario = 'veco';
$contraseña = "Vec83Dv19iSa@";

$conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}

//////////////// VALORES INICIALES ///////////////////////

$tabla="";
$query="SELECT * FROM empresas";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['b']))
{
	$b=$conexion->real_escape_string($_POST['b']);
	$query="SELECT * FROM empresa WHERE 
		id LIKE '%".$b."%' OR
		nombre_completo LIKE '%".$b."%' OR
		nombre_corto LIKE '%".$b."%' OR
		rfc LIKE '%".$b."%' OR
		entidad_federativa LIKE '%".$b."%'";
}

$buscarAlumnos=$conexion->query($query);
if ($buscarAlumnos->num_rows > 0)
{
	$tabla.= 
	'<table class="table">
		<tr class="bg-primary">
			<td>ID ALUMNO</td>
			<td>NOMBRE</td>
			<td>CARRERA</td>
			<td>GRUPO</td>
			<td>FECHA INGRESO</td>
		</tr>';

	while($filaAlumnos= $buscarAlumnos->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'.$filaAlumnos['id'].'</td>
			<td>'.$filaAlumnos['nombre_completo'].'</td>
			<td>'.$filaAlumnos['nombre_corto'].'</td>
			<td>'.$filaAlumnos['rfc'].'</td>
			<td>'.$filaAlumnos['entidad_federativa'].'</td>
		 </tr>
		';
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;
?>
