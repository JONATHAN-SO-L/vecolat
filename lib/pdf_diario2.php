<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 03/2020 v1
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
/////////////////////////////////Marca////////////////////////////////////////////////
	$this->SetFont('Arial','B',16);
    $this->SetTextColor(221, 237, 254 );
	$this->SetXY(68,47);
    $this->cell(90,10,'Copia impresa por '.$_SESSION['nombre'],25);
/////////////////////////////////Marca////////////////////////////////////////////////	
 $this->SetTextColor(10,10,10);
$this->SetFillColor(194, 192, 192);

			$id = MysqlQuery::RequestGet('id');
$sql = Mysql::consulta("SELECT * FROM diario_serv WHERE id_diario= '$id'"); //////////////////////////////////////base de datos
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

$fecha_serv = $reg['fecha_servicio'];
$equi = $reg['equipo'];

$this->Ln();
$this->Ln();
$this->Ln();
$this->SetDrawColor(12, 11, 11 );
$this->SetFont("Arial","",9);
$this->SetXY(12,25);
$this->Cell (25,8,'Cliente',1,0,'C',true);
$this->SetXY(37,25);
$this->Cell (130,8,utf8_decode($reg['empresa']),1,1,'C');
$this->SetXY(147,25);
$this->Cell (25,8,'Fecha',1,0,'C',true);
$this->SetXY(172,25);
$this->Cell (30,8,utf8_decode($reg['fecha_servicio']),1,1,'L');
$this->SetXY(182,25);
$this->Cell (20,8,utf8_decode($reg['hora']),0,0,'R');

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
				$id = MysqlQuery::RequestGet('id');
$sql = Mysql::consulta("SELECT * FROM diario_serv WHERE id_diario= '$id'");  //////////////////////////////////////base de datos
$reg = mysqli_fetch_array($sql, MYSQLI_ASSOC);
			$this->SetXY(12,-30);
			$this->Cell (190,5,'Cuadro de Firmas del Servicio Realizado',1,0,'C',true);
			$this->SetXY(12,-25);
			$this->Cell (95,5,utf8_decode('Ejecutó Servicio'),1,0,'C',true);
			$this->SetXY(107,-25);
			$this->Cell (95,5,utf8_decode('Recibe Por The American British Cowdray'),1,0,'C',true);

			$this->SetXY(12,-25);
			$this->Cell (95,15, '' ,1,0,'C');
			$this->SetXY(12,-20);
			$this->Cell (95,15,'Tecnico '. $reg['tecnico'],0,0,'C');
			$this->SetXY(107,-25);
			$this->Cell (95,15,'',1,0,'C');

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

$fecha_serv = $reg['fecha_servicio'];
$equi = $reg['equipo'];
$carpeta = $reg['carpeta'];

#Primera Etapa
$pdf->SetFont("Arial","B",9);
$pdf->SetXY(12,55);
$pdf->Cell (190,1,utf8_decode(' '),1,0,'C',true);

$pdf->SetXY(12,56);
$pdf->SetFont("Arial","",8);
$pdf->Cell (25,16,utf8_decode('Datos '),1,1,'C',true);
$pdf->SetXY(37,56);
$pdf->SetFont("Arial","",9);
$pdf->Cell (29,4,utf8_decode('Día: '.utf8_decode('Lunes')),0,0,'L');
$pdf->SetXY(37,60);
$pdf->Cell (29,4,'Fecha: '.utf8_decode($reg['fecha_servicio']),1,0,'L');
$pdf->SetXY(37,64);
$pdf->Cell (29,4,utf8_decode('Realizó: '.utf8_decode($reg['tecnico'])),0,0,'L');
$pdf->SetXY(37,68);
$pdf->Cell (29,4,'Hora: '.utf8_decode($reg['hora']),1,0,'L');
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
$pdf->SetXY(66,64);
$pdf->Cell (20,4,utf8_decode($reg['tecnico']),1,0,'C');
$pdf->SetXY(66,60);
$pdf->Cell (136,12,'',1,0,'C');
$pdf->SetXY(86,60);
$pdf->Cell (20,4,'',1,0,'C');
$pdf->SetXY(106,64);
$pdf->Cell (20,4,'',1,0,'C');
$pdf->SetXY(126,60);
$pdf->Cell (20,4,'',1,0,'C');
$pdf->SetXY(146,64);
$pdf->Cell (20,4,'',1,0,'C');
$pdf->SetXY(166,60);
$pdf->Cell (19,4,'',1,0,'C');
$pdf->SetXY(185,64);
$pdf->Cell (17,4,'',1,0,'C');
$pdf->SetXY(86,68);
$pdf->Cell (20,4,'',1,0,'C');
$pdf->SetXY(126,68);
$pdf->Cell (20,4,'',1,0,'C');
$pdf->SetXY(166,68);
$pdf->Cell (19,4,'',1,0,'C');
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
$pdf->SetXY(66,76);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(66,84);
$pdf->Cell (20,4,'',1,1,'C');

$pdf->SetXY(86,72);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(86,80);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(86,88);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(106,76);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(106,84);
$pdf->Cell (20,4,'',1,1,'C');

$pdf->SetXY(126,72);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(126,80);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(126,88);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(146,76);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(146,84);
$pdf->Cell (20,4,'',1,1,'C');

$pdf->SetXY(166,72);
$pdf->Cell (19,4,'',1,1,'C');
$pdf->SetXY(166,80);
$pdf->Cell (19,4,'',1,1,'C');
$pdf->SetXY(166,88);
$pdf->Cell (19,4,'',1,1,'C');
$pdf->SetXY(185,76);
$pdf->Cell (17,4,'',1,1,'C');
$pdf->SetXY(185,84);
$pdf->Cell (17,4,'',1,1,'C');

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

$pdf->SetXY(66,92);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(66,100);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(66,108);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(66,116);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(66,124);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(66,132);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(66,140);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(66,148);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(66,156);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(66,164);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(66,172);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(66,180);
$pdf->Cell (20,4,'',1,1,'C');

$pdf->SetXY(86,96);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(86,104);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(86,112);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(86,120);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(86,128);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(86,136);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(86,144);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(86,152);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(86,160);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(86,168);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(86,176);
$pdf->Cell (20,4,'',1,1,'C');

$pdf->SetXY(106,92);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(106,100);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(106,108);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(106,116);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(106,124);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(106,132);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(106,140);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(106,148);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(106,156);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(106,164);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(106,172);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(106,180);
$pdf->Cell (20,4,'',1,1,'C');

$pdf->SetXY(126,96);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(126,104);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(126,112);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(126,120);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(126,128);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(126,136);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(126,144);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(126,152);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(126,160);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(126,168);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(126,176);
$pdf->Cell (20,4,'',1,1,'C');

$pdf->SetXY(146,92);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(146,100);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(146,108);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(146,116);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(146,124);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(146,132);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(146,140);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(146,148);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(146,156);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(146,164);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(146,172);
$pdf->Cell (20,4,'',1,1,'C');
$pdf->SetXY(146,180);
$pdf->Cell (20,4,'',1,1,'C');

$pdf->SetXY(166,96);
$pdf->Cell (19,4,'',1,1,'C');
$pdf->SetXY(166,104);
$pdf->Cell (19,4,'',1,1,'C');
$pdf->SetXY(166,112);
$pdf->Cell (19,4,'',1,1,'C');
$pdf->SetXY(166,120);
$pdf->Cell (19,4,'',1,1,'C');
$pdf->SetXY(166,128);
$pdf->Cell (19,4,'',1,1,'C');
$pdf->SetXY(166,136);
$pdf->Cell (19,4,'',1,1,'C');
$pdf->SetXY(166,144);
$pdf->Cell (19,4,'',1,1,'C');
$pdf->SetXY(166,152);
$pdf->Cell (19,4,'',1,1,'C');
$pdf->SetXY(166,160);
$pdf->Cell (19,4,'',1,1,'C');
$pdf->SetXY(166,168);
$pdf->Cell (19,4,'',1,1,'C');
$pdf->SetXY(166,176);
$pdf->Cell (19,4,'',1,1,'C');

$pdf->SetXY(185,92);
$pdf->Cell (17,4,'',1,1,'C');
$pdf->SetXY(185,100);
$pdf->Cell (17,4,'',1,1,'C');
$pdf->SetXY(185,108);
$pdf->Cell (17,4,'',1,1,'C');
$pdf->SetXY(185,116);
$pdf->Cell (17,4,'',1,1,'C');
$pdf->SetXY(185,124);
$pdf->Cell (17,4,'',1,1,'C');
$pdf->SetXY(185,132);
$pdf->Cell (17,4,'',1,1,'C');
$pdf->SetXY(185,140);
$pdf->Cell (17,4,'',1,1,'C');
$pdf->SetXY(185,148);
$pdf->Cell (17,4,'',1,1,'C');
$pdf->SetXY(185,156);
$pdf->Cell (17,4,'',1,1,'C');
$pdf->SetXY(185,164);
$pdf->Cell (17,4,'',1,1,'C');
$pdf->SetXY(185,172);
$pdf->Cell (17,4,'',1,1,'C');
$pdf->SetXY(185,180);
$pdf->Cell (17,4,'',1,1,'C');

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
$c_width = 175;  //define cell width
$c_height=4; 
$pdf->SetXY(15,196);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['observaciones']),0,'L');

$pdf->SetXY(201.6,55);
$pdf->Cell (0.3,129,'',1,1,'C',true);

$pdf->SetXY(12,55);
$pdf->Cell (0.3,129,'',1,1,'C',true);

$pdf->SetXY(12,72);
$pdf->Cell (190,0.3,'',1,1,'C',true);

$pdf->SetXY(12,92);
$pdf->Cell (190,0.3,'',1,1,'C',true);

$pdf->SetXY(12,108);
$pdf->Cell (190,0.3,'',1,1,'C',true);

$pdf->SetXY(12,136);
$pdf->Cell (190,0.3,'',1,1,'C',true);

$pdf->SetXY(12,152);
$pdf->Cell (190,0.3,'',1,1,'C',true);

$pdf->SetXY(12,168);
$pdf->Cell (190,0.3,'',1,1,'C',true);


$pdf->SetFont("Arial","",9);
$pdf->Output();
	

}else{
	header('Location: index.php');
}