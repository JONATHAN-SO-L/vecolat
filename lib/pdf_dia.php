<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 03/2020 v2
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
	 if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="admin"){ 
?>
<?php
require "./fpdf/fpdf.php";
include './class_mysql.php';
include './config.php';
$id = MysqlQuery::RequestGet('id');
$sql = Mysql::consulta("SELECT * FROM diario_serv WHERE id_diario= '$id'"); //////////////////////////////////////base de datos
$reg = mysqli_fetch_array($sql, MYSQLI_ASSOC);

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

		
$id = MysqlQuery::RequestGet('id');
$con4 = Mysql::consulta("SELECT * FROM diario_serv WHERE id_diario= '$id'"); //////////////////////////////////////base de datos
$reg = mysqli_fetch_array($con4, MYSQLI_ASSOC);

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
$this->Cell (130,8,utf8_decode($reg['equipo']),1,1,'C');
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
$id = MysqlQuery::RequestGet('id');
$restec = Mysql::consulta("SELECT * FROM diario_serv WHERE id_diario= '$id'"); //////////////////////////////////////base de datos
	$tec=mysqli_fetch_array($restec);
	
			$this->SetXY(12,-45);
			$this->Cell (95,15, '' ,1,0,'C');
			$this->SetXY(12,-40);
			$this->Cell (95,15,'Tecnico '. $tec['tecnico'],0,0,'C');
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

$pdf->SetFont("Arial","B",9);
$pdf->SetXY(12,55);
$pdf->Cell (190,1,utf8_decode(' '),1,0,'C',true);
$pdf->SetXY(12,56);
$pdf->SetFont("Arial","",8);
$pdf->Cell (50,16,utf8_decode('Datos '),1,1,'C',true);
$pdf->SetXY(62,56);
$pdf->SetFont("Arial","",9);
$pdf->Cell (78,4,utf8_decode('Día: '),0,0,'C');
$pdf->SetXY(62,60);
$pdf->Cell (78,4,'Fecha: ',0,0,'C');
$pdf->SetXY(62,64);
$pdf->Cell (78,4,utf8_decode('Realizó:'),0,0,'C');
$pdf->SetXY(62,68);
$pdf->Cell (78,4,'Hora: ',0,0,'C');
$pdf->SetXY(12,72);
$pdf->Cell (50,20,'',1,1,'C',true);
$pdf->SetXY(25,75);
$pdf->MultiCell (15,4,utf8_decode('Datos del Variador'),0,1,'R');
$pdf->SetXY(62,72);
$pdf->SetFont("Arial","",8);
$pdf->Cell (78,4,'Frecuencia (Hz)',1,1,'C');
$pdf->SetXY(62,76);
$pdf->Cell (78,4,'Potencia (HP)',0,0,'C');
$pdf->SetXY(62,80);
$pdf->Cell (78,4,'Velocidad Motor (RPM)',1,1,'C');
$pdf->SetXY(62,84);
$pdf->Cell (78,4,utf8_decode('% de Operación'),0,0,'C');
$pdf->SetXY(62,88);
$pdf->Cell (78,4,'Amperaje',1,1,'C');
$pdf->SetXY(12,92);
$pdf->Cell (50,18,'',1,1,'C',true);
$pdf->SetXY(20,95);
$pdf->MultiCell (25,6,utf8_decode('Caida de Presión Estática de Filtros'),0,0,'R');
$pdf->SetXY(62,92);
$pdf->Cell (78,4,'MERV 8 (in. Wg.',0,0,'C');
$pdf->SetXY(62,96);
$pdf->SetFont("Arial","",8);
$pdf->Cell (78,4,'Carbon Activado (in. Wg.)',1,1,'C');
$pdf->SetXY(62,100);
$pdf->Cell (78,4,'MERV 15 (in. Wg.)',0,0,'C');
$pdf->SetXY(62,104);
$pdf->Cell (78,4,'MERV 17 (in. Wg.)',1,1,'C');
$pdf->SetXY(12,108);
$pdf->Cell (50,28.4,'',1,1,'C',true);
$pdf->SetXY(12,110);
$pdf->MultiCell (25,20,utf8_decode('Eléctrico'),0,0,'C');
$pdf->SetXY(62,108);
$pdf->Cell (39,12,'Amperaje',1,1,'C');
$pdf->SetXY(62,120);
$pdf->Cell (39,16,'Voltaje',1,1,'C');
$pdf->SetXY(101,108);
$pdf->Cell (39,4,'L1',0,0,'C');
$pdf->SetXY(101,112);
$pdf->Cell (39,4,'L2',1,1,'C');
$pdf->SetXY(101,116);
$pdf->Cell (39,4,'L3',0,0,'C');
$pdf->SetXY(101,120);
$pdf->Cell (39,4,'L1-L2',1,1,'C');
$pdf->SetXY(101,124);
$pdf->Cell (39,4,'L1-L3',0,0,'C');
$pdf->SetXY(101,128);
$pdf->Cell (39,4,'L2-L3',1,1,'C');
$pdf->SetXY(101,132);
$pdf->Cell (39,4,'Neutro',0,0,'C');
$pdf->SetXY(12,136);
$pdf->Cell (50,18,'',1,1,'C',true);
$pdf->SetXY(21,139);
$pdf->MultiCell (20,4,utf8_decode('Serpentín de Agua Helada'),0,0,'c');
$pdf->SetXY(62,136);
$pdf->Cell (39,8,'A.A.H',1,1,'C');
$pdf->SetXY(62,144);
$pdf->Cell (39,8,'R.A.H',1,1,'C');
$pdf->SetXY(101,136);
$pdf->Cell (39,4,utf8_decode('Temp. C°'),1,1,'C');
$pdf->SetXY(101,140);
$pdf->Cell (39,4,'Psi',0,0,'C');
$pdf->SetXY(101,144);
$pdf->Cell (39,4,utf8_decode('Temp. °C'),1,1,'C');
$pdf->SetXY(101,148);
$pdf->Cell (39,4,'Psi',0,0,'C');
$pdf->SetXY(12,152);
$pdf->Cell (50,18,'',1,1,'C',true);
$pdf->SetXY(18,156);
$pdf->MultiCell (30,4,utf8_decode('Serpentín de Agua Caliente'),0,0,'c');
$pdf->SetXY(62,152);
$pdf->Cell (39,8,'A.A.C',1,1,'C');
$pdf->SetXY(62,160);
$pdf->Cell (39,8,'R.A.C',1,1,'C');
$pdf->SetXY(101,152);
$pdf->Cell (39,4,utf8_decode('Temp. C°'),1,1,'C');
$pdf->SetXY(101,156);
$pdf->Cell (39,4,'Psi',0,0,'C');
$pdf->SetXY(101,160);
$pdf->Cell (39,4,utf8_decode('Temp. °C'),1,1,'C');
$pdf->SetXY(101,164);
$pdf->Cell (39,4,'Psi',0,0,'C');
$pdf->SetXY(12,168);
$pdf->Cell (50,18,'',1,1,'C',true);
$pdf->SetXY(21,171);
$pdf->MultiCell (20,4,utf8_decode('Revisión Visual'),0,0,'R');
$pdf->SetXY(62,168);
$pdf->Cell (78,4,utf8_decode('Estado de Manómetros'),1,1,'C');
$pdf->SetXY(62,172);
$pdf->Cell (78,4,utf8_decode('Estado de Mangueras'),0,0,'C');
$pdf->SetXY(62,176);
$pdf->Cell (78,4,utf8_decode('Estado de Filtros'),1,1,'C');
$pdf->SetXY(62,180);
$pdf->Cell (78,4,utf8_decode('Drenajes'),0,0,'C');

$pdf->SetXY(12,184);
$pdf->MultiCell (190,8,utf8_decode('Observaciones:'),1,1,'R',true);
$pdf->SetXY(12,192);
$pdf->Cell (190,35,'',1,1,'C');

 $id = MysqlQuery::RequestGet('id');
$con = Mysql::consulta("SELECT * FROM diario_serv WHERE id_diario= '$id'"); //////////////////////////////////////base de datos
	$dat = mysqli_fetch_array($con, MYSQLI_ASSOC);
	
		$pdf->SetXY(140,56);
		$pdf->Cell (62,4,$dat['dia'],1,0,'C',true);
		$pdf->SetXY(140,60);
		$pdf->Cell (62,4,$dat['fecha_servicio'],1,1,'C');
		$pdf->SetXY(140,64);
		$pdf->Cell (62,4,$dat['tecnico'],1,1,'C');
		$pdf->SetXY(140,68);
		$pdf->Cell (62,4,$dat['hora'],1,1,'C');
		$pdf->SetXY(140,72);
		$pdf->Cell (62,4,$dat['frecuencia'],1,1,'C');
		$pdf->SetXY(140,76);
		$pdf->Cell (62,4,$dat['potencia'],1,1,'C');
		$pdf->SetXY(140,80);
		$pdf->Cell (62,4,$dat['vel_moto'],1,1,'C');
		$pdf->SetXY(140,84);
		$pdf->Cell (62,4,$dat['operacion'],1,1,'C');
		$pdf->SetXY(140,88);
		$pdf->Cell (62,4,$dat['amperaje'],1,1,'C');
		$pdf->SetXY(140,92);
		$pdf->Cell (62,4,$dat['caida_merv8'],1,1,'C');
		$pdf->SetXY(140,96);
		$pdf->Cell (62,4,$dat['car_act'],1,1,'C');
		$pdf->SetXY(140,100);
		$pdf->Cell (62,4,$dat['caida_merv15'],1,1,'C');
		$pdf->SetXY(140,104);
		$pdf->Cell (62,4,$dat['caida_merv17'],1,1,'C');
		$pdf->SetXY(140,108);
		$pdf->Cell (62,4,$dat['l1'],1,1,'C');
		$pdf->SetXY(140,112);
		$pdf->Cell (62,4,$dat['l2'],1,1,'C');
		$pdf->SetXY(140,116);
		$pdf->Cell (62,4,$dat['l3'],1,1,'C');
		$pdf->SetXY(140,120);
		$pdf->Cell (62,4,$dat['l1_l2'],1,1,'C');
		$pdf->SetXY(140,124);
		$pdf->Cell (62,4,$dat['l1_l3'],1,1,'C');
		$pdf->SetXY(140,128);
		$pdf->Cell (62,4,$dat['l2_l3'],1,1,'C');
		$pdf->SetXY(140,132);
		$pdf->Cell (62,4,$dat['neutro'],1,1,'C');
		$pdf->SetXY(140,136);
		$pdf->Cell (62,4,$dat['aah_temp'],1,1,'C');
		$pdf->SetXY(140,140);
		$pdf->Cell (62,4,$dat['aah_psi'],1,1,'C');
		$pdf->SetXY(140,144);
		$pdf->Cell (62,4,$dat['rah_temp'],1,1,'C');
		$pdf->SetXY(140,148);
		$pdf->Cell (62,4,$dat['rah_psi'],1,1,'C');
		$pdf->SetXY(140,152);
		$pdf->Cell (62,4,$dat['aac_temp'],1,1,'C');
		$pdf->SetXY(140,156);
		$pdf->Cell (62,4,$dat['aac_psi'],1,1,'C');
		$pdf->SetXY(140,160);
		$pdf->Cell (62,4,$dat['rac_temp'],1,1,'C');
		$pdf->SetXY(140,164);
		$pdf->Cell (62,4,$dat['rac_psi'],1,1,'C');
		$pdf->SetXY(140,168);
		$pdf->Cell (62,4,$dat['manometro'],1,1,'C');
		$pdf->SetXY(140,172);
		$pdf->Cell (62,4,$dat['manguera'],1,1,'C');
		$pdf->SetXY(140,176);
		$pdf->Cell (62,4,$dat['filtro'],1,1,'C');
		$pdf->SetXY(140,180);
		$pdf->Cell (62,4,$dat['drenajes'],1,1,'C');
		$pdf->SetXY(15,194);
		$pdf->Cell (175,4,$dat['observaciones'],0,0,'L');


$pdf->SetFont("Arial","",9);
$pdf->Output();
	

}else{
	header('Location: index.php');
}