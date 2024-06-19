<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 03/2020 v2
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
	 if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="devecchi"){ 
?>
<?php
require "./fpdf/fpdf.php";
include './class_mysql.php';
//include './db.php';
include './config.php';



class PDF extends FPDF
{
	function Header()
		{
	$this->SetFont('Arial','B',16);
    $this->SetTextColor(221, 237, 254 );
	$this->SetXY(68,47);
    $this->cell(90,10,'Copia impresa por '.$_SESSION['nombre'],25);
/////////////////////////////////Marca////////////////////////////////////////////////	
 $this->SetTextColor(10,10,10);
$this->SetFillColor(194, 192, 192);

	$equipo=MysqlQuery::RequestPost('equipo');
    $semana=MysqlQuery::RequestPost('semana');


$sql = Mysql::consulta("SELECT * FROM servicio2 WHERE equipo= '$equipo'"); //////////////////////////////////////base de datos
$reg = mysqli_fetch_array($sql, MYSQLI_ASSOC);
	$this->SetFillColor(194, 192, 192);
	$this->SetFont("Arial","b",9);
$this->Image('../img/Logo-DV-final.png',15,10,40);
$this->Image('../img/abc_logo.png',175,8,25);
$this->SetFont("Arial","B",14);
$this->SetXY(95,15);
$this->Cell (30,5,utf8_decode('Reporte de Servicio'),0,1,'C');

$this->SetDrawColor(0,88,147,1);
$this->SetXY(5,5);
$this->Cell (205,270,'',1,0,'C');

$this->Ln();
$this->Ln();
$this->Ln();
$this->SetDrawColor(12, 11, 11 );
$this->SetFont("Arial","",9);
$this->SetXY(12,25);
$this->Cell (25,8,'Cliente',1,0,'C',true);
$this->SetXY(37,25);
$this->Cell (165,8,utf8_decode($reg['empresa']),1,1,'C');

$this->SetXY(12,33);
$this->Cell (25,8,'Campus',1,0,'C',true);
$this->SetXY(37,33);
$this->Cell (130,8,utf8_decode('Observatorio'),1,1,'C');
$this->SetXY(147,33);
$this->Cell (25,8,'Edificio',1,0,'C',true);
$this->SetXY(172,33);
$this->Cell (30,8,utf8_decode($reg['edificio']),1,1,'C');

$this->SetXY(12,41);
$this->Cell (25,8,'Equipo',1,0,'C',true);
$this->SetXY(37,41);
$this->Cell (25,8,utf8_decode($reg['equipo']),1,1,'C');
$this->SetXY(62,41);
$this->Cell (25,8,utf8_decode('Área'),1,0,'C',true);
$this->SetXY(87,41);
$this->Cell (60,8,utf8_decode($reg['area']),1,1,'C');
$this->SetXY(147,41);
$this->Cell (25,8,utf8_decode('ubicacion'),1,0,'C',true);
$this->SetXY(172,41);
$this->Cell (30,8,utf8_decode($reg['ubicacion']),1,1,'C');
}
	

	function Footer()
		{			
			$this->SetXY(12,-50);
			$this->Cell (190,5,'Cuadro de Firmas del Servicio Realizado',1,0,'C',true);
			$this->SetXY(12,-45);
			$this->Cell (95,5,utf8_decode('Ejecutó Servicio'),1,0,'C',true);
			$this->SetXY(107,-45);
			$this->Cell (95,5,utf8_decode('Recibe Por The American British Cowdray'),1,0,'C',true);

			$this->SetXY(12,-45);
			$this->Cell (95,15, '' ,1,0,'C');
			$this->SetXY(12,-40);
			//$this->Cell (95,15,'Tecnico '. $reg1['tecnico'],0,0,'C');
			$this->SetXY(107,-45);
			$this->Cell (95,15,'',1,0,'C');
			$this->SetXY(107,-25);
			$this->Image('../img/pie.jpg',20,250,170);
			// Posición: a 1,5 cm del final
			$this->SetY(-12);
			// Arial italic 8
			$this->SetFont('Arial','I',8);
			// Número de página
			$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}
	
}

//////////////////////////////////////////////////////////////////////////////////////////////77

$pdf=new PDF('P','mm','Letter');
$pdf->SetMargins(20,20);

#Establecemos el margen inferior:
$pdf->SetAutoPageBreak(true,25); 
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetTextColor(10,10,10);
$pdf->SetFillColor(194, 192, 192);
$pdf->SetDrawColor(0,0,0);

#Primera Etapa
$pdf->SetFont("Arial","B",9);
$pdf->SetXY(12,55);
$pdf->Cell (190,1,utf8_decode(' '),1,0,'C',true);

$pdf->SetXY(12,56);
$pdf->SetFont("Arial","",8);
$pdf->Cell (25,16,utf8_decode('Datos '),1,1,'C',true);
$pdf->SetXY(37,56);
$pdf->SetFont("Arial","",9);
$pdf->Cell (29,4,utf8_decode('Día: '),0,0,'L');
$pdf->SetXY(37,60);
$pdf->Cell (29,4,'Fecha: ',0,0,'L');
$pdf->SetXY(37,64);
$pdf->Cell (29,4,utf8_decode('Realizó:'),0,0,'L');
$pdf->SetXY(37,68);
$pdf->Cell (29,4,'Hora: ',0,0,'L');
$pdf->SetXY(66,56);
$pdf->Cell (20,4,'Lunes',1,0,'C',true);
$pdf->SetXY(86,56);
$pdf->Cell (20,4,'Martes',1,0,'C',true);
$pdf->SetXY(106,56);
$pdf->Cell (20,4,'Miercoles',1,0,'C',true);
$pdf->SetXY(126,56);
$pdf->Cell (20,4,'Jueves',1,0,'C',true);
$pdf->SetXY(146,56);
$pdf->Cell (20,4,'Viernes',1,0,'C',true);
$pdf->SetXY(166,56);
$pdf->Cell (19,4,'Sabado',1,0,'C',true);
$pdf->SetXY(185,56);
$pdf->Cell (17,4,'Domingo',1,0,'C',true);
$pdf->SetXY(66,60);
$pdf->Cell (136,12,'',1,0,'C');
$pdf->SetXY(86,60);
$pdf->Cell (20,4,'',1,0,'C');
$pdf->SetXY(106,64);
$pdf->Cell (20,4,'',1,0,'C');
$pdf->SetXY(126,60);
$pdf->Cell (20,4,'',1,0,'C');
$pdf->SetXY(12,72);
$pdf->Cell (20,20,'',1,1,'C',true);
$pdf->SetXY(14,75);
$pdf->MultiCell (15,4,utf8_decode('Datos del Variador'),0,1,'R');
$pdf->SetXY(32,72);
$pdf->SetFont("Arial","",8);
$pdf->Cell (34,4,'Frecuencia (Hz)',1,1,'C');
$pdf->SetXY(32,76);
$pdf->Cell (34,4,'Potencia (HP)',0,0,'C');
$pdf->SetXY(32,80);
$pdf->Cell (34,4,'Velocidad Motor (RPM)',1,1,'C');
$pdf->SetXY(32,84);
$pdf->Cell (34,4,utf8_decode('% de Operación'),0,0,'C');
$pdf->SetXY(32,88);
$pdf->Cell (34,4,'Amperaje',1,1,'C');
$pdf->SetXY(12,92);
$pdf->MultiCell (20,4,utf8_decode('Caida de Presión Estática de Filtros'),1,1,'R');
$pdf->SetXY(32,92);
$pdf->Cell (34,4,'MERV 8 (in. Wg.',0,0,'C');
$pdf->SetXY(32,96);
$pdf->SetFont("Arial","",8);
$pdf->Cell (34,4,'Carbon Activado (in. Wg.)',1,1,'C');
$pdf->SetXY(32,100);
$pdf->Cell (34,4,'MERV 15 (in. Wg.)',0,0,'C');
$pdf->SetXY(32,104);
$pdf->Cell (34,4,'MERV 17 (in. Wg.)',1,1,'C');

$pdf->SetXY(12,108);
$pdf->MultiCell (20,28.4,utf8_decode('Eléctrico'),1,1,'R',true);
$pdf->SetXY(32,108);
$pdf->Cell (17,12,'Amperaje',1,1,'C');
$pdf->SetXY(32,120);
$pdf->Cell (17,16,'Voltaje',1,1,'C');
$pdf->SetXY(49,108);
$pdf->Cell (17,4,'L1',0,0,'C');
$pdf->SetXY(49,112);
$pdf->Cell (17,4,'L2',1,1,'C');
$pdf->SetXY(49,116);
$pdf->Cell (17,4,'L3',0,0,'C');
$pdf->SetXY(49,120);
$pdf->Cell (17,4,'L1-L2',1,1,'C');
$pdf->SetXY(49,124);
$pdf->Cell (17,4,'L1-L3',0,0,'C');
$pdf->SetXY(49,128);
$pdf->Cell (17,4,'L2-L3',1,1,'C');
$pdf->SetXY(49,132);
$pdf->Cell (17,4,'Neutro',0,0,'C');
$pdf->SetXY(12,136);
$pdf->MultiCell (20,8,utf8_decode('Serpentín de Agua Helada'),1,1,'R',true);
$pdf->SetXY(32,136);
$pdf->Cell (17,8,'A.A.H',1,1,'C');
$pdf->SetXY(32,144);
$pdf->Cell (17,8,'R.A.H',1,1,'C');
$pdf->SetXY(49,136);
$pdf->Cell (17,4,utf8_decode('Temp. C°'),1,1,'C');
$pdf->SetXY(49,140);
$pdf->Cell (17,4,'Psi',0,0,'C');
$pdf->SetXY(49,144);
$pdf->Cell (17,4,utf8_decode('Temp. °C'),1,1,'C');
$pdf->SetXY(49,148);
$pdf->Cell (17,4,'Psi',0,0,'C');

$pdf->SetXY(12,152);
$pdf->MultiCell (20,8,utf8_decode('Serpentín de Agua Caliente'),1,1,'R',true);
$pdf->SetXY(32,152);
$pdf->Cell (17,8,'A.A.C',1,1,'C');
$pdf->SetXY(32,160);
$pdf->Cell (17,8,'R.A.C',1,1,'C');
$pdf->SetXY(49,152);
$pdf->Cell (17,4,utf8_decode('Temp. C°'),1,1,'C');
$pdf->SetXY(49,156);
$pdf->Cell (17,4,'Psi',0,0,'C');
$pdf->SetXY(49,160);
$pdf->Cell (17,4,utf8_decode('Temp. °C'),1,1,'C');
$pdf->SetXY(49,164);
$pdf->Cell (17,4,'Psi',0,0,'C');

$pdf->SetXY(12,168);
$pdf->MultiCell (20,8,utf8_decode('Revisión Visual'),1,1,'R',true);
$pdf->SetXY(32,168);
$pdf->Cell (34,4,utf8_decode('Estado de Manómetros'),1,1,'R');
$pdf->SetXY(32,172);
$pdf->Cell (34,4,utf8_decode('Estado de Mangueras'),0,0,'R');
$pdf->SetXY(32,176);
$pdf->Cell (34,4,utf8_decode('Estado de Filtros'),1,1,'R');
$pdf->SetXY(32,180);
$pdf->Cell (34,4,utf8_decode('Drenajes'),0,0,'R');

$pdf->SetXY(12,184);
$pdf->MultiCell (190,8,utf8_decode('Observaciones:'),1,1,'R',true);
$pdf->SetXY(12,192);
$pdf->Cell (190,35,'',1,1,'C');

		
/*	$equipo= $_POST['equipo'];
//	$semana= $_POST['semana'];
	//$fecha = $_POST['fecha_i'];
	//$semana= date('W', strtotime($fecha)) . PHP_EOL; 
	

	$sql = Mysql::consulta("SELECT * FROM diario_serv WHERE equipo = '$equipo' AND dia = 'Monday' "); /////////////////////////////AND semana = '$semana'  AND dia= 'Monday'
	$dat = mysqli_fetch_array($sql, MYSQLI_ASSOC);

	$sqlm = Mysql::consulta("SELECT * FROM diario_serv WHERE equipo = '$equipo'  AND dia = 'Tuesday' "); //////////////////////////AND semana = '$semana' AND dia ='Tuesday' 
	$datm = mysqli_fetch_array($sqlm, MYSQLI_ASSOC);

	$sqlw = Mysql::consulta("SELECT * FROM diario_serv WHERE equipo = '$equipo' AND dia ='Wednesday' "); ////////////////// AND semana = '$semana' 
	$datw = mysqli_fetch_array($sqlw, MYSQLI_ASSOC);

	$sqlj = Mysql::consulta("SELECT * FROM diario_serv WHERE equipo = '$equipo' AND dia ='Thursday' "); ////////////////// AND semana = '$semana' 
	$datj = mysqli_fetch_array($sqlj, MYSQLI_ASSOC);

	$sqlv = Mysql::consulta("SELECT * FROM diario_serv WHERE equipo = '$equipo' AND dia ='Friday' "); ///////////////////////////////////// AND semana = '$semana'
	$datv = mysqli_fetch_array($sqlv, MYSQLI_ASSOC);

	$sqls = Mysql::consulta("SELECT * FROM diario_serv WHERE equipo = '$equipo' AND dia ='Saturday' "); ///////////////////////////////////  AND semana = '$semana'
	$dats = mysqli_fetch_array($sqls, MYSQLI_ASSOC);

	$sqld = Mysql::consulta("SELECT * FROM diario_serv WHERE equipo = '$equipo' AND dia ='Sunday' "); ///////////////////////////////  AND semana = '$semana'
	$datd = mysqli_fetch_array($sqld, MYSQLI_ASSOC);
*/
$equipo=MysqlQuery::RequestPost('equipo');
    $semana=MysqlQuery::RequestPost('semana');
	$sql = Mysql::consulta("SELECT * FROM diario_serv WHERE equipo = '$equipo' AND semana = '$semana' AND dia = 'Monday'");
	$dat=mysqli_fetch_array($sql, MYSQLI_ASSOC);

		$pdf->SetXY(66,60);
		$pdf->Cell (20,4,$dat['fecha_servicio'],1,1,'C');
		$pdf->SetXY(66,64);
		$pdf->Cell (20,4,$dat['tecnico'],1,1,'C');
		$pdf->SetXY(66,68);
		$pdf->Cell (20,4,$dat['hora'],1,1,'C');
		$pdf->SetXY(66,72);
		$pdf->Cell (20,4,$dat['frecuencia'],1,1,'C');
		$pdf->SetXY(66,76);
		$pdf->Cell (20,4,$dat['potencia'],1,1,'C');
		$pdf->SetXY(66,80);
		$pdf->Cell (20,4,$dat['vel_moto'],1,1,'C');
		$pdf->SetXY(66,84);
		$pdf->Cell (20,4,$dat['operacion'],1,1,'C');
		$pdf->SetXY(66,88);
		$pdf->Cell (20,4,$dat['amperaje'],1,1,'C');
		$pdf->SetXY(66,92);
		$pdf->Cell (20,4,$dat['caida_merv8'],1,1,'C');
		$pdf->SetXY(66,96);
		$pdf->Cell (20,4,$dat['car_act'],1,1,'C');
		$pdf->SetXY(66,100);
		$pdf->Cell (20,4,$dat['caida_merv15'],1,1,'C');
		$pdf->SetXY(66,104);
		$pdf->Cell (20,4,$dat['caida_merv17'],1,1,'C');
		$pdf->SetXY(66,108);
		$pdf->Cell (20,4,$dat['l1'],1,1,'C');
		$pdf->SetXY(66,112);
		$pdf->Cell (20,4,$dat['l2'],1,1,'C');
		$pdf->SetXY(66,116);
		$pdf->Cell (20,4,$dat['l3'],1,1,'C');
		$pdf->SetXY(66,120);
		$pdf->Cell (20,4,$dat['l1_l2'],1,1,'C');
		$pdf->SetXY(66,124);
		$pdf->Cell (20,4,$dat['l1_l3'],1,1,'C');
		$pdf->SetXY(66,128);
		$pdf->Cell (20,4,$dat['l2_l3'],1,1,'C');
		$pdf->SetXY(66,132);
		$pdf->Cell (20,4,$dat['neutro'],1,1,'C');
		$pdf->SetXY(66,136);
		$pdf->Cell (20,4,$dat['aah_temp'],1,1,'C');
		$pdf->SetXY(66,140);
		$pdf->Cell (20,4,$dat['aah_psi'],1,1,'C');
		$pdf->SetXY(66,144);
		$pdf->Cell (20,4,$dat['rah_temp'],1,1,'C');
		$pdf->SetXY(66,148);
		$pdf->Cell (20,4,$dat['rah_psi'],1,1,'C');
		$pdf->SetXY(66,152);
		$pdf->Cell (20,4,$dat['aac_temp'],1,1,'C');
		$pdf->SetXY(66,156);
		$pdf->Cell (20,4,$dat['aac_psi'],1,1,'C');
		$pdf->SetXY(66,160);
		$pdf->Cell (20,4,$dat['rac_temp'],1,1,'C');
		$pdf->SetXY(66,164);
		$pdf->Cell (20,4,$dat['rac_psi'],1,1,'C');
		$pdf->SetXY(66,168);
		$pdf->Cell (20,4,$dat['manometro'],1,1,'C');
		$pdf->SetXY(66,172);
		$pdf->Cell (20,4,$dat['manguera'],1,1,'C');
		$pdf->SetXY(66,176);
		$pdf->Cell (20,4,$dat['filtro'],1,1,'C');
		$pdf->SetXY(66,180);
		$pdf->Cell (20,4,$dat['drenajes'],1,1,'C');

$equipo=MysqlQuery::RequestPost('equipo');
    $semana=MysqlQuery::RequestPost('semana');
	$sqlw = Mysql::consulta("SELECT * FROM diario_serv WHERE equipo = '$equipo' AND semana = '$semana' AND dia = 'Tuesday'");
	$datm=mysqli_fetch_array($sqlw, MYSQLI_ASSOC);
	
		$pdf->SetXY(86,60);
		$pdf->Cell (20,4,$datm['fecha_servicio'],1,1,'C');
		$pdf->SetXY(86,64);
		$pdf->Cell (20,4,$datm['tecnico'],1,1,'C');
		$pdf->SetXY(86,68);
		$pdf->Cell (20,4,$datm['hora'],1,1,'C');
		$pdf->SetXY(86,72);
		$pdf->Cell (20,4,$datm['frecuencia'],1,1,'C');
		$pdf->SetXY(86,76);
		$pdf->Cell (20,4,$datm['potencia'],1,1,'C');
		$pdf->SetXY(86,80);
		$pdf->Cell (20,4,$datm['vel_moto'],1,1,'C');
		$pdf->SetXY(86,84);
		$pdf->Cell (20,4,$datm['operacion'],1,1,'C');
		$pdf->SetXY(86,88);
		$pdf->Cell (20,4,$datm['amperaje'],1,1,'C');
		$pdf->SetXY(86,92);
		$pdf->Cell (20,4,$datm['caida_merv8'],1,1,'C');
		$pdf->SetXY(86,96);
		$pdf->Cell (20,4,$datm['car_act'],1,1,'C');
		$pdf->SetXY(86,100);
		$pdf->Cell (20,4,$datm['caida_merv15'],1,1,'C');
		$pdf->SetXY(86,104);
		$pdf->Cell (20,4,$datm['caida_merv17'],1,1,'C');
		$pdf->SetXY(86,108);
		$pdf->Cell (20,4,$datm['l1'],1,1,'C');
		$pdf->SetXY(86,112);
		$pdf->Cell (20,4,$datm['l2'],1,1,'C');
		$pdf->SetXY(86,116);
		$pdf->Cell (20,4,$datm['l3'],1,1,'C');
		$pdf->SetXY(86,120);
		$pdf->Cell (20,4,$datm['l1_l2'],1,1,'C');
		$pdf->SetXY(86,124);
		$pdf->Cell (20,4,$datm['l1_l3'],1,1,'C');
		$pdf->SetXY(86,128);
		$pdf->Cell (20,4,$datm['l2_l3'],1,1,'C');
		$pdf->SetXY(86,132);
		$pdf->Cell (20,4,$datm['neutro'],1,1,'C');
		$pdf->SetXY(86,136);
		$pdf->Cell (20,4,$datm['aah_temp'],1,1,'C');
		$pdf->SetXY(86,140);
		$pdf->Cell (20,4,$datm['aah_psi'],1,1,'C');
		$pdf->SetXY(86,144);
		$pdf->Cell (20,4,$datm['rah_temp'],1,1,'C');
		$pdf->SetXY(86,148);
		$pdf->Cell (20,4,$datm['rah_psi'],1,1,'C');
		$pdf->SetXY(86,152);
		$pdf->Cell (20,4,$datm['aac_temp'],1,1,'C');
		$pdf->SetXY(86,156);
		$pdf->Cell (20,4,$datm['aac_psi'],1,1,'C');
		$pdf->SetXY(86,160);
		$pdf->Cell (20,4,$datm['rac_temp'],1,1,'C');
		$pdf->SetXY(86,164);
		$pdf->Cell (20,4,$datm['rac_psi'],1,1,'C');
		$pdf->SetXY(86,168);
		$pdf->Cell (20,4,$datm['manometro'],1,1,'C');
		$pdf->SetXY(86,172);
		$pdf->Cell (20,4,$datm['manguera'],1,1,'C');
		$pdf->SetXY(86,176);
		$pdf->Cell (20,4,$datm['filtro'],1,1,'C');
		$pdf->SetXY(86,180);
		$pdf->Cell (20,4,$datm['drenajes'],1,1,'C');
		
		$equipo=MysqlQuery::RequestPost('equipo');
    $semana=MysqlQuery::RequestPost('semana');
	$sqlw = Mysql::consulta("SELECT * FROM diario_serv WHERE equipo = '$equipo' AND semana = '$semana' AND dia = 'Wednesday'");
	$datw=mysqli_fetch_array($sqlw, MYSQLI_ASSOC);
	
		$pdf->SetXY(106,60);
		$pdf->Cell (20,4,$datw['fecha_servicio'],1,1,'C');
		$pdf->SetXY(106,64);
		$pdf->Cell (20,4,$datw['tecnico'],1,1,'C');
		$pdf->SetXY(106,68);
		$pdf->Cell (20,4,$datw['hora'],1,1,'C');
		$pdf->SetXY(106,72);
		$pdf->Cell (20,4,$datw['frecuencia'],1,1,'C');
		$pdf->SetXY(106,76);
		$pdf->Cell (20,4,$datw['potencia'],1,1,'C');
		$pdf->SetXY(106,80);
		$pdf->Cell (20,4,$datw['vel_moto'],1,1,'C');
		$pdf->SetXY(106,84);
		$pdf->Cell (20,4,$datw['operacion'],1,1,'C');
		$pdf->SetXY(106,88);
		$pdf->Cell (20,4,$datw['amperaje'],1,1,'C');
		$pdf->SetXY(106,92);
		$pdf->Cell (20,4,$datw['caida_merv8'],1,1,'C');
		$pdf->SetXY(106,96);
		$pdf->Cell (20,4,$datw['car_act'],1,1,'C');
		$pdf->SetXY(106,100);
		$pdf->Cell (20,4,$datw['caida_merv15'],1,1,'C');
		$pdf->SetXY(106,104);
		$pdf->Cell (20,4,$datw['caida_merv17'],1,1,'C');
		$pdf->SetXY(106,108);
		$pdf->Cell (20,4,$datw['l1'],1,1,'C');
		$pdf->SetXY(106,112);
		$pdf->Cell (20,4,$datw['l2'],1,1,'C');
		$pdf->SetXY(106,116);
		$pdf->Cell (20,4,$datw['l3'],1,1,'C');
		$pdf->SetXY(106,120);
		$pdf->Cell (20,4,$datw['l1_l2'],1,1,'C');
		$pdf->SetXY(106,124);
		$pdf->Cell (20,4,$datw['l1_l3'],1,1,'C');
		$pdf->SetXY(106,128);
		$pdf->Cell (20,4,$datw['l2_l3'],1,1,'C');
		$pdf->SetXY(106,132);
		$pdf->Cell (20,4,$datw['neutro'],1,1,'C');
		$pdf->SetXY(106,136);
		$pdf->Cell (20,4,$datw['aah_temp'],1,1,'C');
		$pdf->SetXY(106,140);
		$pdf->Cell (20,4,$datw['aah_psi'],1,1,'C');
		$pdf->SetXY(106,144);
		$pdf->Cell (20,4,$datw['rah_temp'],1,1,'C');
		$pdf->SetXY(106,148);
		$pdf->Cell (20,4,$datw['rah_psi'],1,1,'C');
		$pdf->SetXY(106,152);
		$pdf->Cell (20,4,$datw['aac_temp'],1,1,'C');
		$pdf->SetXY(106,156);
		$pdf->Cell (20,4,$datw['aac_psi'],1,1,'C');
		$pdf->SetXY(106,160);
		$pdf->Cell (20,4,$datw['rac_temp'],1,1,'C');
		$pdf->SetXY(106,164);
		$pdf->Cell (20,4,$datw['rac_psi'],1,1,'C');
		$pdf->SetXY(106,168);
		$pdf->Cell (20,4,$datw['manometro'],1,1,'C');
		$pdf->SetXY(106,172);
		$pdf->Cell (20,4,$datw['manguera'],1,1,'C');
		$pdf->SetXY(106,176);
		$pdf->Cell (20,4,$datw['filtro'],1,1,'C');
		$pdf->SetXY(106,180);
		$pdf->Cell (20,4,$datw['drenajes'],1,1,'C');

$equipo=MysqlQuery::RequestPost('equipo');
    $semana=MysqlQuery::RequestPost('semana');
	$sqlj = Mysql::consulta("SELECT * FROM diario_serv WHERE equipo = '$equipo' AND semana = '$semana' AND dia = 'Thursday'");
	$datj=mysqli_fetch_array($sqlj, MYSQLI_ASSOC);
	
		$pdf->SetXY(126,60);
		$pdf->Cell (20,4,$datj['fecha_servicio'],1,1,'C');
		$pdf->SetXY(126,64);
		$pdf->Cell (20,4,$datj['tecnico'],1,1,'C');
		$pdf->SetXY(126,68);
		$pdf->Cell (20,4,$datj['hora'],1,1,'C');
		$pdf->SetXY(126,72);
		$pdf->Cell (20,4,$datj['frecuencia'],1,1,'C');
		$pdf->SetXY(126,76);
		$pdf->Cell (20,4,$datj['potencia'],1,1,'C');
		$pdf->SetXY(126,80);
		$pdf->Cell (20,4,$datj['vel_moto'],1,1,'C');
		$pdf->SetXY(126,84);
		$pdf->Cell (20,4,$datj['operacion'],1,1,'C');
		$pdf->SetXY(126,88);
		$pdf->Cell (20,4,$datj['amperaje'],1,1,'C');
		$pdf->SetXY(126,92);
		$pdf->Cell (20,4,$datj['caida_merv8'],1,1,'C');
		$pdf->SetXY(126,96);
		$pdf->Cell (20,4,$datj['car_act'],1,1,'C');
		$pdf->SetXY(126,100);
		$pdf->Cell (20,4,$datj['caida_merv15'],1,1,'C');
		$pdf->SetXY(126,104);
		$pdf->Cell (20,4,$datj['caida_merv17'],1,1,'C');
		$pdf->SetXY(126,108);
		$pdf->Cell (20,4,$datj['l1'],1,1,'C');
		$pdf->SetXY(126,112);
		$pdf->Cell (20,4,$datj['l2'],1,1,'C');
		$pdf->SetXY(126,116);
		$pdf->Cell (20,4,$datj['l3'],1,1,'C');
		$pdf->SetXY(126,120);
		$pdf->Cell (20,4,$datj['l1_l2'],1,1,'C');
		$pdf->SetXY(126,124);
		$pdf->Cell (20,4,$datj['l1_l3'],1,1,'C');
		$pdf->SetXY(126,128);
		$pdf->Cell (20,4,$datj['l2_l3'],1,1,'C');
		$pdf->SetXY(126,132);
		$pdf->Cell (20,4,$datj['neutro'],1,1,'C');
		$pdf->SetXY(126,136);
		$pdf->Cell (20,4,$datj['aah_temp'],1,1,'C');
		$pdf->SetXY(126,140);
		$pdf->Cell (20,4,$datj['aah_psi'],1,1,'C');
		$pdf->SetXY(126,144);
		$pdf->Cell (20,4,$datj['rah_temp'],1,1,'C');
		$pdf->SetXY(126,148);
		$pdf->Cell (20,4,$datj['rah_psi'],1,1,'C');
		$pdf->SetXY(126,152);
		$pdf->Cell (20,4,$datj['aac_temp'],1,1,'C');
		$pdf->SetXY(126,156);
		$pdf->Cell (20,4,$datj['aac_psi'],1,1,'C');
		$pdf->SetXY(126,160);
		$pdf->Cell (20,4,$datj['rac_temp'],1,1,'C');
		$pdf->SetXY(126,164);
		$pdf->Cell (20,4,$datj['rac_psi'],1,1,'C');
		$pdf->SetXY(126,168);
		$pdf->Cell (20,4,$datj['manometro'],1,1,'C');
		$pdf->SetXY(126,172);
		$pdf->Cell (20,4,$datj['manguera'],1,1,'C');
		$pdf->SetXY(126,176);
		$pdf->Cell (20,4,$datj['filtro'],1,1,'C');
		$pdf->SetXY(126,180);
		$pdf->Cell (20,4,$datj['drenajes'],1,1,'C');
		
	$equipo=MysqlQuery::RequestPost('equipo');
    $semana=MysqlQuery::RequestPost('semana');
	$sqlv = Mysql::consulta("SELECT * FROM diario_serv WHERE equipo = '$equipo' AND semana = '$semana' AND dia = 'Friday'");
	$datv=mysqli_fetch_array($sqlv, MYSQLI_ASSOC);

	
		$pdf->SetXY(146,60);
		$pdf->Cell (20,4,$datv['fecha_servicio'],1,1,'C');
		$pdf->SetXY(146,64);
		$pdf->Cell (20,4,$datv['tecnico'],1,1,'C');
		$pdf->SetXY(146,68);
		$pdf->Cell (20,4,$datv['hora'],1,1,'C');
		$pdf->SetXY(146,72);
		$pdf->Cell (20,4,$datv['frecuencia'],1,1,'C');
		$pdf->SetXY(146,76);
		$pdf->Cell (20,4,$datv['potencia'],1,1,'C');
		$pdf->SetXY(146,80);
		$pdf->Cell (20,4,$datv['vel_moto'],1,1,'C');
		$pdf->SetXY(146,84);
		$pdf->Cell (20,4,$datv['operacion'],1,1,'C');
		$pdf->SetXY(146,88);
		$pdf->Cell (20,4,$datv['amperaje'],1,1,'C');
		$pdf->SetXY(146,92);
		$pdf->Cell (20,4,$datv['caida_merv8'],1,1,'C');
		$pdf->SetXY(146,96);
		$pdf->Cell (20,4,$datv['car_act'],1,1,'C');
		$pdf->SetXY(146,100);
		$pdf->Cell (20,4,$datv['caida_merv15'],1,1,'C');
		$pdf->SetXY(146,104);
		$pdf->Cell (20,4,$datv['caida_merv17'],1,1,'C');
		$pdf->SetXY(146,108);
		$pdf->Cell (20,4,$datv['l1'],1,1,'C');
		$pdf->SetXY(146,112);
		$pdf->Cell (20,4,$datv['l2'],1,1,'C');
		$pdf->SetXY(146,116);
		$pdf->Cell (20,4,$datv['l3'],1,1,'C');
		$pdf->SetXY(146,120);
		$pdf->Cell (20,4,$datv['l1_l2'],1,1,'C');
		$pdf->SetXY(146,124);
		$pdf->Cell (20,4,$datv['l1_l3'],1,1,'C');
		$pdf->SetXY(146,128);
		$pdf->Cell (20,4,$datv['l2_l3'],1,1,'C');
		$pdf->SetXY(146,132);
		$pdf->Cell (20,4,$datv['neutro'],1,1,'C');
		$pdf->SetXY(146,136);
		$pdf->Cell (20,4,$datv['aah_temp'],1,1,'C');
		$pdf->SetXY(146,140);
		$pdf->Cell (20,4,$datv['aah_psi'],1,1,'C');
		$pdf->SetXY(146,144);
		$pdf->Cell (20,4,$datv['rah_temp'],1,1,'C');
		$pdf->SetXY(146,148);
		$pdf->Cell (20,4,$datv['rah_psi'],1,1,'C');
		$pdf->SetXY(146,152);
		$pdf->Cell (20,4,$datv['aac_temp'],1,1,'C');
		$pdf->SetXY(146,156);
		$pdf->Cell (20,4,$datv['aac_psi'],1,1,'C');
		$pdf->SetXY(146,160);
		$pdf->Cell (20,4,$datv['rac_temp'],1,1,'C');
		$pdf->SetXY(146,164);
		$pdf->Cell (20,4,$datv['rac_psi'],1,1,'C');
		$pdf->SetXY(146,168);
		$pdf->Cell (20,4,$datv['manometro'],1,1,'C');
		$pdf->SetXY(146,172);
		$pdf->Cell (20,4,$datv['manguera'],1,1,'C');
		$pdf->SetXY(146,176);
		$pdf->Cell (20,4,$datv['filtro'],1,1,'C');
		$pdf->SetXY(146,180);
		$pdf->Cell (20,4,$datv['drenajes'],1,1,'C');
		
		$equipo=MysqlQuery::RequestPost('equipo');
    $semana=MysqlQuery::RequestPost('semana');
	$sqls = Mysql::consulta("SELECT * FROM diario_serv WHERE equipo = '$equipo' AND semana = '$semana' AND dia = 'Saturday'");
	$dats=mysqli_fetch_array($sqls, MYSQLI_ASSOC);
	
		$pdf->SetXY(166,60);
		$pdf->Cell (19,4,$dats['fecha_servicio'],1,1,'C');
		$pdf->SetXY(166,64);
		$pdf->Cell (19,4,$dats['tecnico'],1,1,'C');
		$pdf->SetXY(166,68);
		$pdf->Cell (19,4,$dats['hora'],1,1,'C');
		$pdf->SetXY(166,72);
		$pdf->Cell (19,4,$dats['frecuencia'],1,1,'C');
		$pdf->SetXY(166,76);
		$pdf->Cell (19,4,$dats['potencia'],1,1,'C');
		$pdf->SetXY(166,80);
		$pdf->Cell (19,4,$dats['vel_moto'],1,1,'C');
		$pdf->SetXY(166,84);
		$pdf->Cell (19,4,$dats['operacion'],1,1,'C');
		$pdf->SetXY(166,88);
		$pdf->Cell (19,4,$dats['amperaje'],1,1,'C');
		$pdf->SetXY(166,92);
		$pdf->Cell (19,4,$dats['caida_merv8'],1,1,'C');
		$pdf->SetXY(166,96);
		$pdf->Cell (19,4,$dats['car_act'],1,1,'C');
		$pdf->SetXY(166,100);
		$pdf->Cell (19,4,$dats['caida_merv15'],1,1,'C');
		$pdf->SetXY(166,104);
		$pdf->Cell (19,4,$dats['caida_merv17'],1,1,'C');
		$pdf->SetXY(166,108);
		$pdf->Cell (19,4,$dats['l1'],1,1,'C');
		$pdf->SetXY(166,112);
		$pdf->Cell (19,4,$dats['l2'],1,1,'C');
		$pdf->SetXY(166,116);
		$pdf->Cell (19,4,$dats['l3'],1,1,'C');
		$pdf->SetXY(166,120);
		$pdf->Cell (19,4,$dats['l1_l2'],1,1,'C');
		$pdf->SetXY(166,124);
		$pdf->Cell (19,4,$dats['l1_l3'],1,1,'C');
		$pdf->SetXY(166,128);
		$pdf->Cell (19,4,$dats['l2_l3'],1,1,'C');
		$pdf->SetXY(166,132);
		$pdf->Cell (19,4,$dats['neutro'],1,1,'C');
		$pdf->SetXY(166,136);
		$pdf->Cell (19,4,$dats['aah_temp'],1,1,'C');
		$pdf->SetXY(166,140);
		$pdf->Cell (19,4,$dats['aah_psi'],1,1,'C');
		$pdf->SetXY(166,144);
		$pdf->Cell (19,4,$dats['rah_temp'],1,1,'C');
		$pdf->SetXY(166,148);
		$pdf->Cell (19,4,$dats['rah_psi'],1,1,'C');
		$pdf->SetXY(166,152);
		$pdf->Cell (19,4,$dats['aac_temp'],1,1,'C');
		$pdf->SetXY(166,156);
		$pdf->Cell (19,4,$dats['aac_psi'],1,1,'C');
		$pdf->SetXY(166,160);
		$pdf->Cell (19,4,$dats['rac_temp'],1,1,'C');
		$pdf->SetXY(166,164);
		$pdf->Cell (19,4,$dats['rac_psi'],1,1,'C');
		$pdf->SetXY(166,168);
		$pdf->Cell (19,4,$dats['manometro'],1,1,'C');
		$pdf->SetXY(166,172);
		$pdf->Cell (19,4,$dats['manguera'],1,1,'C');
		$pdf->SetXY(166,176);
		$pdf->Cell (19,4,$dats['filtro'],1,1,'C');
		$pdf->SetXY(166,180);
		$pdf->Cell (19,4,$dats['drenajes'],1,1,'C');
		
		$equipo=MysqlQuery::RequestPost('equipo');
    $semana=MysqlQuery::RequestPost('semana');
	$sqld = Mysql::consulta("SELECT * FROM diario_serv WHERE equipo = '$equipo' AND semana = '$semana' AND dia = 'Sunday'");
	$datd=mysqli_fetch_array($sqld, MYSQLI_ASSOC);	
	
		$pdf->SetXY(185,60);
		$pdf->Cell (17,4,$datd['fecha_servicio'],1,1,'C');
		$pdf->SetXY(185,64);
		$pdf->Cell (17,4,$datd['tecnico'],1,1,'C');
		$pdf->SetXY(185,68);
		$pdf->Cell (17,4,$datd['hora'],1,1,'C');
		$pdf->SetXY(185,72);
		$pdf->Cell (17,4,$datd['frecuencia'],1,1,'C');
		$pdf->SetXY(185,76);
		$pdf->Cell (17,4,$datd['potencia'],1,1,'C');
		$pdf->SetXY(185,80);
		$pdf->Cell (17,4,$datd['vel_moto'],1,1,'C');
		$pdf->SetXY(185,84);
		$pdf->Cell (17,4,$datd['operacion'],1,1,'C');
		$pdf->SetXY(185,88);
		$pdf->Cell (17,4,$datd['amperaje'],1,1,'C');
		$pdf->SetXY(185,92);
		$pdf->Cell (17,4,$datd['caida_merv8'],1,1,'C');
		$pdf->SetXY(185,96);
		$pdf->Cell (17,4,$datd['car_act'],1,1,'C');
		$pdf->SetXY(185,100);
		$pdf->Cell (17,4,$datd['caida_merv15'],1,1,'C');
		$pdf->SetXY(185,104);
		$pdf->Cell (17,4,$datd['caida_merv17'],1,1,'C');
		$pdf->SetXY(185,108);
		$pdf->Cell (17,4,$datd['l1'],1,1,'C');
		$pdf->SetXY(185,112);
		$pdf->Cell (17,4,$datd['l2'],1,1,'C');
		$pdf->SetXY(185,116);
		$pdf->Cell (17,4,$datd['l3'],1,1,'C');
		$pdf->SetXY(185,120);
		$pdf->Cell (17,4,$datd['l1_l2'],1,1,'C');
		$pdf->SetXY(185,124);
		$pdf->Cell (17,4,$datd['l1_l3'],1,1,'C');
		$pdf->SetXY(185,128);
		$pdf->Cell (17,4,$datd['l2_l3'],1,1,'C');
		$pdf->SetXY(185,132);
		$pdf->Cell (17,4,$datd['neutro'],1,1,'C');
		$pdf->SetXY(185,136);
		$pdf->Cell (17,4,$datd['aah_temp'],1,1,'C');
		$pdf->SetXY(185,140);
		$pdf->Cell (17,4,$datd['aah_psi'],1,1,'C');
		$pdf->SetXY(185,144);
		$pdf->Cell (17,4,$datd['rah_temp'],1,1,'C');
		$pdf->SetXY(185,148);
		$pdf->Cell (17,4,$datd['rah_psi'],1,1,'C');
		$pdf->SetXY(185,152);
		$pdf->Cell (17,4,$datd['aac_temp'],1,1,'C');
		$pdf->SetXY(185,156);
		$pdf->Cell (17,4,$datd['aac_psi'],1,1,'C');
		$pdf->SetXY(185,160);
		$pdf->Cell (17,4,$datd['rac_temp'],1,1,'C');
		$pdf->SetXY(185,164);
		$pdf->Cell (17,4,$datd['rac_psi'],1,1,'C');
		$pdf->SetXY(185,168);
		$pdf->Cell (17,4,$datd['manometro'],1,1,'C');
		$pdf->SetXY(185,172);
		$pdf->Cell (17,4,$datd['manguera'],1,1,'C');
		$pdf->SetXY(185,176);
		$pdf->Cell (17,4,$datd['filtro'],1,1,'C');
		$pdf->SetXY(185,180);
		$pdf->Cell (17,4,$datd['drenajes'],1,1,'C');




$pdf->SetFont("Arial","",9);
$pdf->Output();
	

}else{
	header('Location: index.php');
}