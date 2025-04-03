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
	min-width: 1310px;
	max-width: 800px;
	height: 550px;
	margin: 0 auto
	
	#highcharts-legend-item highcharts-line-series highcharts-color-1 highcharts-series-1  highcharts-legend-item-hidden{
		color:#cccccc;
		cursor:pointer;
		font-size:12px;
		font-weight:bold;
		fill:#cccccc;
	}
}
.highcharts-credits{
	    display: none;
	}
	 
	.highcharts-xaxis-labels{
	    display: none;
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
        text: 'Motoventilador'
    },

    subtitle: {
        text: 'De Vecchi'
    },

    yAxis: {
        title: {
            text: 'Saturacion'
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
	$consulta = "SELECT * FROM servicio2 WHERE equipo = '$equipo' AND anio = '$anio' Order by fecha_servicio";
	$resultado = mysqli_query( $conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos");
	
	?>
	name: 'Vibracion Axial',
        data: [
	<?php
		while ($fila = mysqli_fetch_array( $resultado )){
	echo "['".$fila["equipo"]."',".$fila["valor1_s5"]."],";
		}
		?>
		]
		 }, {
        name: 'Vibracion Vertical',
        data: [
		<?php
		$consulta2 = "SELECT * FROM servicio2 WHERE equipo = '$equipo' AND anio = '$anio' Order by fecha_servicio";
		$resul = mysqli_query( $conexion, $consulta2) or die ( "Algo ha ido mal en la consulta a la base de datos");
		while ($row = mysqli_fetch_array( $resul )){
	echo "['".$row["equipo"]."',".$row["valor2_s5"]."],";
		}
		?>
		]
		 }, {
        name: 'Vibracion Horizontal',
        data: [
		<?php
		$con = "SELECT * FROM servicio2 WHERE equipo = '$equipo' AND anio = '$anio' Order by fecha_servicio";
		$res = mysqli_query( $conexion, $con) or die ( "Algo ha ido mal en la consulta a la base de datos");
		while ($rin = mysqli_fetch_array( $res )){
	echo "['".$rin["equipo"]."',".$rin["valor3_s5"]."],";
			}
		?>
		]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 365
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