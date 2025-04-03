<!DOCTYPE HTML>
<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	    <div id="devecchi">
	<img src="./img/logo_grafica.png" alt="Image" class="img-responsive" width="1100" height="70" />
	</div>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Highcharts Example</title>

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

<?php
$conexion = new mysqli("localhost","root","");
mysqli_select_db("veco_sims_devecchi",$conexion);
mysql_query("Set names 'utf-8'");

function uptime($equipo){
	$resultado = msql_query ("Select *from servicio2 WHERE 'equipo'='$equipo' ");
	while ($row=mysql_fetch_array($resultado)){
		echo "[";
		echo ($row["equipo"]);
		echo "],";
	}
}
?>


		<script type="text/javascript">
Highcharts.chart('container', {

    title: {
        text: 'Lectura de Manometros'
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
        name: 'AHU-1-03',
        data: [];
                    <?php
                       $equipo = 'AHU-1-03';
					   uptime($equipo);
					   ?>
                return data;
                })()
            },{

/*

		[
		<?php while ($row = mysql_fetch_array($con)){ 
		
			echo "['".$row["equipo"]."',".$row["update"]."],";
				} 
		?>
		//0.60, 0.60,0,0, 0.60, 0.60, 0.60, 0.60,0.40,0,0, 0.50, 0.50, 0.50, 0.50, 0.50,0,0, 0.50, 0.50,0, 0.50,0,0,0, 0.50, 0.50, 0.50, 0.50, 0.40]
    }/*, {
        name: 'Manufacturing',
        data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
    }, {
        name: 'Sales & Distribution',
        data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
    }, {
        name: 'Project Development',
        data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
    }, {
        name: 'Other',
        data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
    }*/
	
	]

    responsive: {
        rules: [{
            condition: {
                maxWidth: 2.00
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
