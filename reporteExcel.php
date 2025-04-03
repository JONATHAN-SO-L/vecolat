<?
include('conexion1');
$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];

if(isset($_POST['generar_reporte']))
{
	//Nombre del Archivo
	header('Content-Type:text/csv; charset=latin1');
	header('Content-Disposition: attachment; filename="Reporte_checador.csv"');
	
	//Salida del Archivo
	$salida=fopen('php://output','w');
	//Encabezados
	fputcsv($salida, array('Nombre Usuario','Fecha','Hora Entrada', 'Hora Salida'));
	
		$usuario = "veco";
	$password = "Vec83Dv19iSa@";
	$servidor = "localhost";
	$basededatos = "veco_sims_devecchi";
	
	// creaci贸n de la conexi贸n a la base de datos con mysql_connect()
	$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
	
	// Selecci贸n de la base de datos
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
	$reporteCsv = "SELECT * from reg_checador where fecha BETWEEN '$fecha1' AND '$fecha2' ORDER BY usuario ASC, fecha ASC";
	
	$resultado = mysqli_query( $conexion, $reporteCsv ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	
while ($filaR = mysqli_fetch_array( $resultado )){
    
    
	
//	$reporteCsv=$conexion->query("Select *from reg_checador where fecha BETWEEN '$fecha1' AND '$fecha2' ORDER BY id");
//	while ($filaR=$reporteCsv->fetch_assoc())
		fputcsv($salida, array($filaR['usuario'],
				$filaR['fecha'],
				$filaR['hora_entrada'],
				$filaR['hora_salida']));
}
}
?>
