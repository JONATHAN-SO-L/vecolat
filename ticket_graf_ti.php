<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
?>
<!DOCTYPE HTML>
<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	    <div id="devecchi">
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
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="../../code/highcharts.js"></script>
<script src="../../code/highcharts-more.js"></script>
<script src="../../code/modules/exporting.js"></script>
<script src="../../code/highcharts.js"></script>
<script src="../../code/highcharts-3d.js"></script>
<script src="../../code/modules/exporting.js"></script>
<script src="../../code/modules/export-data.js"></script>



<div id="container"></div>

		<?php
	
	$mes = $_REQUEST['mes'];	
	$usuario = "veco";
	$password = "Vec83Dv19iSa@";
	$servidor = "localhost";
	$basededatos = "veco_sims_devecchi";
	$conexion = mysqli_connect( $servidor, $usuario, $password, $basededatos) or die ("No se ha podido conectar al servidor de Base de datos");
	$conexion ->set_charset('utf8');
	$conexion->query("SET NAMES UTF8");
    $conexion->query("SET CHARACTER SET utf8");
	//$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
	
	
	?>

	<script type="text/javascript">
Highcharts.chart('container', {

    title: {
        text: 'Tickets Resueltos en un mes'
    },
    subtitle: {
        text: '<?php echo $equipo; ?>'
    },
    
    yAxis: {
        title: {
            text: 'Hora'
        }
    },
     xAxis: {
        title: {
            text: 'Fecha'
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
        name: 'Gris',
        data: [	<?php
        $consulta = "SELECT * FROM ticket where observaciones = 'Griselda' AND mes='$mes' ";
	$resultado = mysqli_query( $conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos");
		while ($fila = mysqli_fetch_array( $resultado )){
	echo "['".$fila["fecha"]."',".$fila["hrs"]."],";
			}
		?>
            ],
    }, {
        name: 'Richard',
        data: [<?php
        $conr = "SELECT * FROM ticket where observaciones = 'Ricardo' AND mes='$mes' ";
	$res = mysqli_query( $conexion, $conr) or die ( "Algo ha ido mal en la consulta a la base de datos");
		while ($filaR = mysqli_fetch_array( $res )){
	echo "['".$filaR["fecha"]."',".$filaR["hrs"]."],";
			}
		?>],
    }, {
        name: 'Santos',
        data: [<?php
        $cons = "SELECT * FROM ticket where observaciones = 'Santos' AND mes='$mes' ";
	$resu = mysqli_query( $conexion, $cons) or die ( "Algo ha ido mal en la consulta a la base de datos");
		while ($filaS = mysqli_fetch_array( $resr )){
	echo "['".$filaS["fecha"]."',".$filaS["hrs"]."],";
			}
		?>],
    }, {
        name: 'Antonio',
        data: [<?php
        $cona = "SELECT * FROM ticket where observaciones = 'Antonio' AND mes='$mes' ";
	$re = mysqli_query( $conexion, $cona) or die ( "Algo ha ido mal en la consulta a la base de datos");
		while ($filaA = mysqli_fetch_array( $re )){
	echo "['".$filaA["fecha"]."',".$filaA["hrs"]."],";
			}
		?>],
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