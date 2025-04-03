<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
?>
<!DOCTYPE HTML>
<html>
	<head>
	<div id="devecchi">
	<img src="./img/logo_grafica.png" alt="Image" class="img-responsive" width="1100" height="70" />
	</div>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Grafica</title>

		<style type="text/css">
#container {
	min-width: 310px;
	max-width: 800px;
	height: 400px;
	margin: 0 auto
}
		</style>
	</head>
	<body>
<script src="code/highcharts.js"></script>
<script src="code/modules/series-label.js"></script>
<script src="code/modules/exporting.js"></script>
<script src="code/modules/export-data.js"></script>

<div id="container"></div>


		<script type="text/javascript">
Highcharts.chart('container', {

    title: {
        text: 'Lectura de Uptime'
    },

    subtitle: {
        text: 'De Vecchi'
    },

    yAxis: {
        title: {
            text: 'Saturación'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 1
        }
    },

    series: [{
        
        name: 'AHU-3-02',
        data: [
		<?php
	
	$equipo = $_REQUEST['equipo'];
	$anio = $_REQUEST['anio'];	
	$usuario = "veco_dvi";
	$password = "Vec83Dv19iSa@";
	$servidor = "localhost";
	$basededatos = "veco_sims_devecchi";
	$conexion = mysqli_connect( $servidor, $usuario, $password, $basededatos) or die ("No se ha podido conectar al servidor de Base de datos");
	$conexion ->set_charset('utf8');
	$conexion->query("SET NAMES UTF8");
    $conexion->query("SET CHARACTER SET utf8");
	//$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
	$consulta = "SELECT * FROM servicio2 WHERE equipo = '$equipo' AND anio = '$anio' ";
	$resultado = mysqli_query( $conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos");
		while ($fila = mysqli_fetch_array( $resultado )){
	echo "['".$fila["equipo"]."',".$fila["valor_uptime"]."],";
			}
		?>
		]
   
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 31
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
		</script>
	</body>
</html>
