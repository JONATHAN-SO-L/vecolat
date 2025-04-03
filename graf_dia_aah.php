<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 03/2020 v2
 */
?>
<!DOCTYPE HTML>
<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	    <div id="devecchi">
	<img src="./img/logo_grafica.png" alt="Image" class="img-responsive" width="1100" height="70" />
	</div>
		
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

<div id="container"></div>

<?php
	
	$equipo = $_REQUEST['equipo'];
	//$mes = $_REQUEST['mes'];
	$usuario = "veco_dvi";
	$password = "Vec83Dv19iSa@";
	$servidor = "localhost";
	$basededatos = "veco_sims_devecchi";
	$conexion = mysqli_connect( $servidor, $usuario, $password, $basededatos) or die ("No se ha podido conectar al servidor de Base de datos");
	
	$consulta = "SELECT * FROM diario_serv WHERE equipo = '$equipo'  ORDER by fecha_servicio";
	$resultado = mysqli_query( $conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos");
	
	?>
	
		<script type="text/javascript">
Highcharts.chart('container', {

    title: {
        text: 'Serpentin Agua Helada A.A.H'
    },
    subtitle: {
        text: '<?php echo $equipo; ?>'
    },
    
    yAxis: {
        title: {
            text: 'Datos'
        }
    },
     xAxis: {
        title: {
            text: 'Dias'
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
        
	name: 'A.A.H Temp',
        data: [
	<?php
		while ($fila = mysqli_fetch_array( $resultado )){
	echo "['".$fila["equipo"]."',".$fila["aah_temp"]."],";
			}
		?>
		]
		 },{
		 
        name: 'A.A.H Psi',
        data: [
		<?php
		$consulta2 = "SELECT * FROM diario_serv WHERE equipo = '$equipo' ORDER by fecha_servicio";
		$resul = mysqli_query( $conexion, $consulta2) or die ( "Algo ha ido mal en la consulta a la base de datos");
		while ($row = mysqli_fetch_array( $resul )){
	echo "['".$row["equipo"]."',".$row["aah_psi"]."],";
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
