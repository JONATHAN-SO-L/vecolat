<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
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
$sql = Mysql::consulta("SELECT * FROM servicio2 WHERE id_servicio= '$id'");
$reg = mysqli_fetch_array($sql, MYSQLI_ASSOC);

class PDF extends FPDF
{
	function Header()
		{
		    /////////////////////////////////Marca////////////////////////////////////////////////
	$this->SetFont('Arial','B',14);
    $this->SetTextColor(203, 226, 251);
	$this->SetXY(68,47);
    $this->cell(90,10,'Consulta realizada por '.$_SESSION['nombre'],25);
/////////////////////////////////Marca////////////////////////////////////////////////	
 $this->SetTextColor(10,10,10);
$this->SetFillColor(194, 192, 192);

			$id = MysqlQuery::RequestGet('id');
$sql = Mysql::consulta("SELECT * FROM servicio2 WHERE id_servicio= '$id'");
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
$sql = Mysql::consulta("SELECT * FROM servicio2 WHERE id_servicio= '$id'");
$reg = mysqli_fetch_array($sql, MYSQLI_ASSOC);
            $this->SetFont('Arial','B',8);
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

$cell_width = 31.5;  //define cell width
$cell_height=4;  


#Primera Etapa
$pdf->SetFont("Arial","B",9);
$pdf->SetXY(12,55);
$pdf->Cell (190,5,utf8_decode($reg['servicio']),1,0,'C',true);

$pdf->SetXY(12,60);
$pdf->SetFont("Arial","",8);
$pdf->Cell (63,5,utf8_decode('Lectura de Presión (InH2O) '),1,1,'C',true);

$e_width = 31.5;  //define cell width
$e_height=3; 
$pdf->SetXY(12,65);
$pdf->SetFont("Arial","",7);
$pdf->MultiCell ($e_width,$e_height,utf8_decode('Inicial: '.utf8_decode($reg['valor1'])),0,'C');
$pdf->SetXY(12,65);
$pdf->Cell (31.5,6,'',1,0,'C');
$pdf->SetXY(43.6,65);
$pdf->Cell (31.5,6,'',1,0,'C');
$pdf->SetXY(43.6,65);
$pdf->SetFont("Arial","",7);
$pdf->MultiCell ($e_width,$e_height,utf8_decode('Final: '.utf8_decode($reg['valor2'])),0,'C');

$pdf->SetXY(75,60);
$pdf->Cell (64,5,'Remplazo de Filtros',1,0,'C',true);
$pdf->SetXY(75,65);
$pdf->SetFont("Arial","",9);
$pdf->Cell (64,6,utf8_decode($reg['valor3']),1,0,'C');
$pdf->SetXY(139,60);
$pdf->SetFont("Arial","",9);
$pdf->Cell (63,5,'Limpieza',1,0,'C',true);
$pdf->SetXY(139,65);
$pdf->SetFont("Arial","",9);
$pdf->Cell (63,6,utf8_decode($reg['valor4']),1,0,'C');

$pdf->SetXY(12,71);
$pdf->Cell (31.5,27.5,'',1,1,'C');
$imagen1 = "../files/servicio/$fecha_serv/$equi/$carpeta/Etapa1/Lectura/Inicial/LectInicial.jpg";
$pdf->Image($imagen1,13,72,30,25);

$pdf->SetXY(43.5,71);
$pdf->Cell (31.5,27.5,'',1,1,'C');
$imagen2 = "../files/servicio/$fecha_serv/$equi/$carpeta/Etapa1/Lectura/Final/LectFinal.jpg";
$pdf->Image($imagen2,44.4,72,30,25);

$pdf->SetXY(75,71);
$pdf->Cell (64,27.5,'',1,1,'C');
$imagen3 = "../files/servicio/$fecha_serv/$equi/$carpeta/Etapa1/Cambio/Cambio.jpg";
$pdf->Image($imagen3,79,72,52,25);

$pdf->SetXY(139,71);
$pdf->Cell (63,27.5,'',1,1,'C');
$imagen4 = "../files/servicio/$fecha_serv/$equi/$carpeta/Etapa1/Limpieza/Limpieza.jpg";
$pdf->Image($imagen4,145,72,52,25);


#Segunda Etapa
$pdf->SetFont("Arial","B",9);
$pdf->SetXY(12,103);
$pdf->Cell (190,5,utf8_decode($reg['servicio2']),1,0,'C',true);

$pdf->SetXY(12,108);
$pdf->SetFont("Arial","",8);
$pdf->Cell (63,5,utf8_decode('Lectura de Presión (InH2O) '),1,1,'C',true);
$pdf->SetXY(12,113);
$pdf->SetFont("Arial","",9);
$pdf->Cell (31.6,6,'Inicial: '.utf8_decode($reg['valor1_s2']),1,0,'C');
$pdf->SetXY(43.6,113);
$pdf->Cell (31.5,6,'Final: '.utf8_decode($reg['valor2_s2']),1,0,'C');
$pdf->SetXY(75,108);
$pdf->Cell (64,5,'Remplazo de Filtros',1,0,'C',true);
$pdf->SetXY(75,113);
$pdf->SetFont("Arial","",9);
$pdf->Cell (64,6,utf8_decode($reg['valor3_s2']),1,0,'C');
$pdf->SetXY(139,108);
$pdf->SetFont("Arial","",9);
$pdf->Cell (63,5,'Limpieza',1,0,'C',true);
$pdf->SetXY(139,113);
$pdf->SetFont("Arial","",9);
$pdf->Cell (63,6,utf8_decode($reg['valor4_s2']),1,0,'C');

$pdf->SetXY(12,119);
$pdf->Cell (31.5,27.5,'',1,1,'C');
$imagen1_s2 = "../files/servicio/$fecha_serv/$equi/$carpeta/Etapa2/Lectura/Inicial/LectInicial.jpg";
$pdf->Image($imagen1_s2,13,120,30,25);

$pdf->SetXY(43.5,119);
$pdf->Cell (31.5,27.5,'',1,1,'C');
$imagen2_s2 = "../files/servicio/$fecha_serv/$equi/$carpeta/Etapa2/Lectura/Final/LectFinal.jpg";
$pdf->Image($imagen2_s2,44.4,120,30,25);

$pdf->SetXY(75,119);
$pdf->Cell (64,27.5,'',1,1,'C');
$imagen3_s2 = "../files/servicio/$fecha_serv/$equi/$carpeta/Etapa2/Cambio/Cambio.jpg";
$pdf->Image($imagen3_s2,79,120,52,25);

$pdf->SetXY(139,119);
$pdf->Cell (63,27.5,'',1,1,'C');
$imagen4_s2 = "../files/servicio/$fecha_serv/$equi/$carpeta/Etapa2/Limpieza/Limpieza.jpg";
$pdf->Image($imagen4_s2,145,120,52,25);


#Tercera Etapa
$pdf->SetFont("Arial","B",9);
$pdf->SetXY(12,153);
$pdf->Cell (190,5,utf8_decode($reg['servicio3']),1,0,'C',true);

$pdf->SetXY(12,158);
$pdf->SetFont("Arial","",8);
$pdf->Cell (63,5,utf8_decode('Lectura de Presión (InH2O) '),1,1,'C',true);
$pdf->SetXY(12,163);
$pdf->SetFont("Arial","",9);
$pdf->Cell (31.6,6,'Inicial: '.utf8_decode($reg['valor1_s3']),1,0,'C');
$pdf->SetXY(43.6,163);
$pdf->Cell (31.5,6,'Final: '.utf8_decode($reg['valor2_s3']),1,0,'C');
$pdf->SetXY(75,158);
$pdf->Cell (64,5,'Remplazo de Filtros',1,0,'C',true);
$pdf->SetXY(75,163);
$pdf->SetFont("Arial","",9);
$pdf->Cell (64,6,utf8_decode($reg['valor3_s3']),1,0,'C');
$pdf->SetXY(139,158);
$pdf->SetFont("Arial","",9);
$pdf->Cell (63,5,'Limpieza',1,0,'C',true);
$pdf->SetXY(139,163);
$pdf->SetFont("Arial","",9);
$pdf->Cell (63,6,utf8_decode($reg['valor4_s3']),1,0,'C');

$pdf->SetXY(12,169);
$pdf->Cell (31.5,27.5,'',1,1,'C');
$imagen1_s3 = "../files/servicio/$fecha_serv/$equi/$carpeta/Etapa3/Lectura/Inicial/LectInicial.jpg";
$pdf->Image($imagen1_s3,13,170,30,25);

$pdf->SetXY(43.5,169);
$pdf->Cell (31.5,27.5,'',1,1,'C');
$imagen2_s3 = "../files/servicio/$fecha_serv/$equi/$carpeta/Etapa3/Lectura/Final/LectFinal.jpg";
$pdf->Image($imagen2_s3,44.4,170,30,25);

$pdf->SetXY(75,169);
$pdf->Cell (64,27.5,'',1,1,'C');
$imagen3_s3 = "../files/servicio/$fecha_serv/$equi/$carpeta/Etapa3/Cambio/Cambio.jpg";
$pdf->Image($imagen3_s3,79,170,52,25);

$pdf->SetXY(139,169);
$pdf->Cell (63,27.5,'',1,1,'C');
$imagen4_s3 = "../files/servicio/$fecha_serv/$equi/$carpeta/Etapa3/Limpieza/Limpieza.jpg";
$pdf->Image($imagen4_s3,145,170,52,25);


$ce_width = 32;  //define cell width
$ce_height=3;

#Cuarta Etapa
$pdf->SetXY(12,203);
$pdf->Cell (190,10,'',0,1,'C');
$pdf->SetFont("Arial","B",9);
$pdf->SetXY(12,203);
$pdf->Cell (190,5,utf8_decode($reg['servicio4']),1,0,'C',true);

$pdf->SetXY(12,208);
$pdf->SetFont("Arial","",8);
$pdf->Cell (63,5,utf8_decode('Lectura de Presión (InH2O) '),1,1,'C',true);
$pdf->SetXY(12,213);
$pdf->SetFont("Arial","",9);
$pdf->Cell (31.6,6,'',1,0,'C');
$pdf->SetXY(12,213);
$pdf->SetFont("Arial","",7);
$pdf->MultiCell ($ce_width,$ce_height,'Inicial: '.utf8_decode($reg['valor1_s4']),0,'C');
$pdf->SetXY(43.6,213);
$pdf->Cell (31.5,6,'',1,0,'C');
$pdf->SetXY(43.6,213);
$pdf->SetFont("Arial","",7);
$pdf->MultiCell ($ce_width,$ce_height,'Final: '.utf8_decode($reg['valor2_s4']),0,'C');
$pdf->SetXY(75,208);
$pdf->SetFont("Arial","",9);
$pdf->Cell (64,5,'Remplazo de Filtros',1,0,'C',true);
$pdf->SetXY(75,213);
$pdf->SetFont("Arial","",9);
$pdf->Cell (64,6,'',1,0,'C');
$pdf->SetXY(75,213);
$pdf->SetFont("Arial","",9);
$pdf->MultiCell (64,6,utf8_decode($reg['valor3_s4']),0,'C');
$pdf->SetXY(139,208);
$pdf->SetFont("Arial","",9);
$pdf->Cell (63,5,'Limpieza',1,0,'C',true);
$pdf->SetXY(139,213);
$pdf->SetFont("Arial","",9);
$pdf->Cell (63,6,'',1,0,'C');
$pdf->SetXY(140,213);
$pdf->SetFont("Arial","",9);
$pdf->MultiCell (64,6,utf8_decode($reg['valor4_s4']),0,'C');

$pdf->SetXY(12,219);
$pdf->Cell (31.5,27.5,'',1,1,'C');
$imagen1_s4 = "../files/servicio/$fecha_serv/$equi/$carpeta/Etapa4/Lectura/Inicial/LectInicial.jpg";
$pdf->Image($imagen1_s4,13,220,30,25);

$pdf->SetXY(43.5,219);
$pdf->Cell (31.5,27.5,'',1,1,'C');
$imagen2_s4 = "../files/servicio/$fecha_serv/$equi/$carpeta/Etapa4/Lectura/Final/LectFinal.jpg";
$pdf->Image($imagen2_s4,44.4,220,30,25);

$pdf->SetXY(75,219);
$pdf->Cell (64,27.5,'',1,1,'C');
$imagen3_s4 = "../files/servicio/$fecha_serv/$equi/$carpeta/Etapa4/Cambio/Cambio.jpg";
$pdf->Image($imagen3_s4,79,220,52,25);

$pdf->SetXY(139,219);
$pdf->Cell (63,27.5,'',1,1,'C');
$imagen4_s4 = "../files/servicio/$fecha_serv/$equi/$carpeta/Etapa4/Limpieza/Limpieza.jpg";
$pdf->Image($imagen4_s4,145,220,52,25);

$pdf->Ln();
$pdf->Ln();

$pdf->Ln();
$pdf->Ln();

#Motoventilador
$pdf->SetXY(12,295);
$pdf->Cell (190,10,'',0,1,'C');
$pdf->SetFont("Arial","B",9);
$pdf->SetXY(12,55);
$pdf->Cell (190,5,utf8_decode($reg['servicio5']),1,0,'C',true);
$pdf->SetXY(12,60);
$pdf->Cell (190,55,'',1,1,'C');

$pdf->SetXY(12,63);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell (31.6,8,'',1,1,'C',true);
$pdf->SetXY(13,63);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell ($cell_width,$cell_height,utf8_decode('Lectura de Vibración (Axial) '),0,'C');
$pdf->SetXY(43.6,63);
$pdf->SetFont("Arial","",8);
$pdf->Cell (31.6,8,utf8_decode($reg['valor1_s5']),1,0,'C');
$pdf->SetXY(75.2,63);
$pdf->MultiCell (31.6,8,'',1,0,'C',true);
$pdf->SetXY(76,63);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell ($cell_width,$cell_height,utf8_decode('Lectura de Vibración (Vertical)'),0,'C');
$pdf->SetXY(106.8,63);
$pdf->Cell (31.6,8,utf8_decode($reg['valor2_s5']),1,0,'C');
$pdf->SetXY(138.4,63);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell (31.6,8,'',1,0,'C',true);
$pdf->SetXY(139.4,63);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell ($cell_width,$cell_height,utf8_decode('Lectura de Vibración (Horizontal)'),0,'C');
$pdf->SetXY(170,63);
$pdf->Cell (31.9,8,utf8_decode($reg['valor3_s5']),1,0,'C');

$cell_width = 31.5;  //define cell width
$cell_height=3.7;  

$pdf->SetXY(12,71);
$pdf->SetFont("Arial","",8);
$pdf->Cell (31.6,8,utf8_decode('Cambio de Bandas'),1,1,'C',true);
$pdf->SetXY(43.6,71);
$pdf->SetFont("Arial","",8);
$pdf->Cell (31.6,8,'',1,0,'C');
$pdf->SetXY(44,72);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell ($cell_width,$cell_height,utf8_decode($reg['valor6_s5']),0,'C');
$pdf->SetXY(75.2,71);
$pdf->Cell (31.6,8,'',1,0,'R',true);
$pdf->SetXY(76.3,72);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell ($cell_width,$cell_height,utf8_decode('Engrasado de Chumacera'),0,'C');
$pdf->SetXY(106.8,71);
$pdf->Cell (31.6,8,'',1,0,'R');
$pdf->SetXY(107,72);
$pdf->SetFont("Arial","",7.5);
$pdf->MultiCell (32,$cell_height,utf8_decode($reg['valor5_s5']),0,'C');
$pdf->SetXY(138.4,71);
$pdf->SetFont("Arial","",8);
$pdf->Cell (31.6,8,utf8_decode('Limpieza General'),1,0,'C',true);
$pdf->SetXY(170,71);
$pdf->Cell (31.9,8,'',1,0,'R');
$pdf->SetXY(171,72);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell ($cell_width,$cell_height,utf8_decode($reg['valor4_s5']),0,'C');

$pdf->SetFont("Arial","B",9);
$pdf->SetXY(12,83);
$pdf->Cell (190,5,utf8_decode('Evidencia Fotográfica Posterior al Servicio'),1,0,'C',true);

$pdf->SetXY(12,88);
$imag1_s5 = "../files/servicio/$fecha_serv/$equi/$carpeta/Motoventilador/posterior/Motoventilador.jpg";
$pdf->Image($imag1_s5,79,89,49,22.5);

#Mantenimiento a Serpentin
$pdf->SetFont("Arial","B",9);
$pdf->SetXY(12,117);
$pdf->Cell (190,5,utf8_decode($reg['servicio6']),1,0,'C',true);
$pdf->SetXY(12,122);
$pdf->Cell (190,45,'',1,1,'C');
$pdf->SetXY(12,125);
$pdf->SetFont("Arial","",9);
$pdf->Cell (31.6,8,utf8_decode('Limpieza General'),1,1,'C',true);
$pdf->SetXY(43.6,125);
$pdf->SetFont("Arial","",9);
$pdf->Cell (158.4,8,utf8_decode($reg['valor1_s6']),1,0,'L');
$pdf->SetXY(12,133);
$pdf->SetFont("Arial","B",9);
$pdf->Cell (190,5,utf8_decode('Evidencia Fotográfica Posterior al Servicio'),1,0,'C',true);
$pdf->SetXY(12,138);
$imag1_s6 = "../files/servicio/$fecha_serv/$equi/$carpeta/Serpentin/posterior/Serpentin.jpg";
$pdf->Image($imag1_s6,79,139,49,22.5);

#Mantenimiento a Evaporador, Charola
$pdf->SetFont("Arial","B",9);
$pdf->SetXY(12,170);
$pdf->Cell (190,5,utf8_decode('Charola de Condensados'),1,0,'C',true);
$pdf->SetXY(12,175);
$pdf->Cell (190,45,'',1,1,'C');
$pdf->SetXY(12,175);
$pdf->SetFont("Arial","",9);
$pdf->Cell (31.6,8,utf8_decode('Limpieza General'),1,1,'C',true);
$pdf->SetXY(43.6,175);
$pdf->SetFont("Arial","",9);
$pdf->Cell (158.4,8,utf8_decode($reg['valor1_s8']),1,0,'L');
$pdf->SetXY(12,183);
$pdf->SetFont("Arial","B",9);
$pdf->Cell (190,5,utf8_decode('Evidencia Fotográfica Posterior al Servicio'),1,0,'C',true);
$pdf->SetXY(12,188);
$imag1_s8 = "../files/servicio/$fecha_serv/$equi/$carpeta/Charola/posterior/Charola.jpg";
$pdf->Image($imag1_s8,79,189,49,22.5);
	
$pdf->SetXY(12,210);
$pdf->Cell (190,10,'',0,1,'C');
$pdf->SetXY(12,220);
$pdf->SetFont("Arial","B",9);
$pdf->Cell (190,10,utf8_decode('Down Time'),1,0,'C',true);
$pdf->SetXY(12,230);
$pdf->SetFont("Arial","",9);
$pdf->Cell (95,10,utf8_decode('Tiempo Fuera de Operación por Falla (00:00 hrs)'),1,0,'C');
$pdf->SetXY(107,230);
$pdf->Cell (95,10,utf8_decode($reg['valor_uptime']).':00 (hrs)',1,0,'C');

$pdf->Ln();
$pdf->Ln();
////////////////////////de aqui empieza la modificación///////////////////////////////////
 $pdf->SetXY(12,250);
$pdf->Cell (190,10,'',0,1,'C');

////////////////////////se quita por ordenes///////////////////////////////////
/*
$pdf->SetXY(12,90);
$pdf->Cell (190,8,utf8_encode('Observaciones'),1,0,'C',true);
/////////////
$c_width = 175;  //define cell width
$c_height=9; 

$pdf->SetXY(20,100);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['observaciones']),0,'L');
$pdf->SetXY(12,98);
$pdf->Cell (190,60,'',1,0,'C');
*/
////////////////////////Se agrega por orden///////////////////////////////////////
$pdf->SetXY(12,55);
$pdf->Cell (190,7,utf8_decode('Parametros / Estados'),1,0,'C',true);
$pdf->SetXY(12,62);
$pdf->Cell (95,18,'',1,0,'C');
$pdf->SetXY(107,62);
$pdf->Cell (95,18,'',1,0,'C');

$c_width = 30;  //define cell width
$c_height=9; 

$pdf->SetXY(12,61);
$pdf->SetFont("Arial","B",9);
$pdf->Cell (95,7,utf8_decode('Serpentin de Agua Helada'),0,0,'C');
$pdf->SetXY(107,61);
$pdf->Cell (95,7,utf8_decode('Serpentin de Agua Caliente'),0,0,'C');

#Serpentin de agua helada
$pdf->SetXY(50,65);
$pdf->SetFont("Arial","",9);
$pdf->Cell (30,7,utf8_decode('Entrada               Salida'),0,0,'L');
$pdf->SetXY(15,69);
$pdf->Cell (30,7,utf8_decode('Temperatura:'),0,0,'L');
$pdf->SetXY(15,73);
$pdf->Cell (30,7,utf8_decode('Presión:'),0,0,'L');
$pdf->SetXY(50,68);
$pdf->Cell (40,8,utf8_decode($reg['tempentrada']),0,'L');
$pdf->SetXY(75,68);
$pdf->Cell (40,8,utf8_decode($reg['tempsalida']),0,'L');
$pdf->SetXY(50,72);
$pdf->Cell (40,8,utf8_decode($reg['tempresion']),0,'L');

#Serpentin de agua Calinete
$pdf->SetXY(150,65);
$pdf->SetFont("Arial","",9);
$pdf->Cell (30,7,utf8_decode('Entrada               Salida'),0,0,'L');
$pdf->SetXY(110,69);
$pdf->Cell (30,7,utf8_decode('Temperatura:'),0,0,'L');
$pdf->SetXY(110,73);
$pdf->Cell (30,7,utf8_decode('Presión:'),0,0,'L');
$pdf->SetXY(150,68);
$pdf->Cell (40,8,utf8_decode($reg['tempentrada2']),0,'L');
$pdf->SetXY(175,68);
$pdf->Cell (40,8,utf8_decode($reg['tempsalida2']),0,'L');
$pdf->SetXY(150,72);
$pdf->Cell (40,8,utf8_decode($reg['tempresion2']),0,'L');

$pdf->SetXY(12,80);
$pdf->Cell (95,10,'',1,0,'C');
$pdf->SetXY(107,80);
$pdf->Cell (95,10,'',1,0,'C');


#Valvulas y Actuadores
$pdf->SetXY(12,82);
$pdf->SetFont("Arial","B",9);
$pdf->Cell (30,7,utf8_decode('Valvulas y actuadores:'),0,0,'L');
$pdf->SetXY(50,80);
$pdf->SetFont("Arial","",9);
$pdf->Cell (30,7,utf8_decode('Estado:'),0,0,'L');
$pdf->SetXY(50,83);
$pdf->Cell (30,7,utf8_decode('Modulacion:'),0,0,'L');
$pdf->SetXY(75,79);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['estadoval']),0,'L');
$pdf->SetXY(75,82);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['tipomodulacion']),0,'L');


#Manguera de Presion
$pdf->SetXY(108,81);
$pdf->SetFont("Arial","B",9);
$pdf->Cell (80,7,utf8_decode('Manguera de Pesión:'),0,0,'L');
$pdf->SetXY(143,81);
$pdf->SetFont("Arial","",9);
$pdf->Cell (30,7,utf8_decode('Estado: '),0,0,'L');
$pdf->SetXY(160,80);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['estamanguera']),0,'L');


$pdf->SetXY(12,92);
$pdf->SetFont("Arial","B",9);
$pdf->Cell (190,7,utf8_decode('Revisión Previo al Cambio'),1,0,'C',true);

#Amperaje Previo Cambio
$pdf->SetXY(15,100);
$pdf->SetFont("Arial","B",9);
$pdf->Cell (30,7,utf8_decode('Amperaje de Alimentación 3era Etapa:'),0,0,'L');
$pdf->SetXY(80,100);
$pdf->SetFont("Arial","",9);
$pdf->Cell (30,7,utf8_decode('L1-L2:'),0,0,'L');
$pdf->SetXY(115,100);
$pdf->Cell (30,7,utf8_decode('L2-L3:'),0,0,'L');
$pdf->SetXY(145,100);
$pdf->Cell (30,7,utf8_decode('L3-L1:'),0,0,'L');
$pdf->SetXY(90,99);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['amperaje1_s3']),0,'L');
$pdf->SetXY(125,99);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['amperaje2_s3']),0,'L');
$pdf->SetXY(155,99);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['amperaje3_s3']),0,'L');

$pdf->SetXY(15,106);
$pdf->SetFont("Arial","B",9);
$pdf->Cell (30,7,utf8_decode('Amperaje de Alimentación 4ta Etapa:'),0,0,'L');
$pdf->SetXY(80,106);
$pdf->SetFont("Arial","",9);
$pdf->Cell (30,7,utf8_decode('L1-L2:'),0,0,'L');
$pdf->SetXY(115,106);
$pdf->Cell (30,7,utf8_decode('L2-L3:'),0,0,'L');
$pdf->SetXY(145,106);
$pdf->Cell (30,7,utf8_decode('L3-L1:'),0,0,'L');
$pdf->SetXY(90,105);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['amperaje4_s3']),0,'L');
$pdf->SetXY(125,105);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['amperaje5_s3']),0,'L');
$pdf->SetXY(155,105);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['amperaje6_s3']),0,'L');

#
$pdf->SetXY(12,112);
$pdf->SetFont("Arial","B",9);
$pdf->Cell (190,7,utf8_decode('Revisión despues del Cambio'),1,0,'C',true);

#Amperaje Despues del Cambio
$pdf->SetXY(12,99);
$pdf->Cell (190,106.5,'',1,0,'C');
$pdf->SetXY(15,119);
$pdf->SetFont("Arial","B",9);
$pdf->Cell (30,7,utf8_decode('Amperaje de Alimentación 3era Etapa:'),0,0,'L');
$pdf->SetXY(80,119);
$pdf->SetFont("Arial","",9);
$pdf->Cell (30,7,utf8_decode('L1-L2:'),0,0,'L');
$pdf->SetXY(115,119);
$pdf->Cell (30,7,utf8_decode('L2-L3:'),0,0,'L');
$pdf->SetXY(145,119);
$pdf->Cell (30,7,utf8_decode('L3-L1:'),0,0,'L');
$pdf->SetXY(90,118);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['amperaje4_s3']),0,'L');
$pdf->SetXY(125,118);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['amperaje5_s3']),0,'L');
$pdf->SetXY(155,118);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['amperaje6_s3']),0,'L');

$pdf->SetXY(15,125);
$pdf->SetFont("Arial","B",9);
$pdf->Cell (30,7,utf8_decode('Amperaje de Alimentación 4ta Etapa:'),0,0,'L');
$pdf->SetXY(80,125);
$pdf->SetFont("Arial","",9);
$pdf->Cell (30,7,utf8_decode('L1-L2:'),0,0,'L');
$pdf->SetXY(115,125);
$pdf->Cell (30,7,utf8_decode('L2-L3:'),0,0,'L');
$pdf->SetXY(145,125);
$pdf->Cell (30,7,utf8_decode('L3-L1:'),0,0,'L');
$pdf->SetXY(90,124);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['amperaje4_s4']),0,'L');
$pdf->SetXY(125,124);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['amperaje5_s4']),0,'L');
$pdf->SetXY(155,124);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['amperaje6_s4']),0,'L');

#Tornilleria
$pdf->SetXY(12,132);
$pdf->Cell (190,5,'',1,0,'C');
$pdf->SetXY(15,131);
$pdf->SetFont("Arial","B",9);
$pdf->Cell (30,7,utf8_decode('Tornilleria'),0,0,'L');
$pdf->SetXY(80,131);
$pdf->SetFont("Arial","",9);
$pdf->Cell (30,7,utf8_decode('Completa:'),0,0,'L');
$pdf->SetXY(105,130);
$pdf->Cell ($c_width,$c_height,utf8_decode($reg['tornilleria']),0,'L');

#Cableado de alimentacion electrica
$pdf->SetXY(15,136);
$pdf->SetFont("Arial","B",9);
$pdf->Cell (30,7,utf8_decode('Cableado de Alimentación electrica'),0,0,'L');
$pdf->SetXY(80,136);
$pdf->SetFont("Arial","",9);
$pdf->Cell (30,7,utf8_decode('Estado de Conexión:'),0,0,'L');
$pdf->SetXY(115,135);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['estacable']),0,'L');

#Voltaje de alimentacion
$pdf->SetXY(12,142);
$pdf->Cell (190,5,'',1,0,'C');
$pdf->SetXY(15,141);
$pdf->SetFont("Arial","B",9);
$pdf->Cell (30,7,utf8_decode('Voltaje de Alimentación'),0,0,'L');
$pdf->SetXY(80,141);
$pdf->SetFont("Arial","",8);
$pdf->Cell (30,7,utf8_decode('L1-L2:'),0,0,'L');
$pdf->SetXY(115,141);
$pdf->Cell (30,7,utf8_decode('L2-L3:'),0,0,'L');
$pdf->SetXY(145,141);
$pdf->Cell (30,7,utf8_decode('L3-L1:'),0,0,'L');
$pdf->SetXY(90,140);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['amperaje1_3']),0,'L');
$pdf->SetXY(125,140);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['amperaje2_3']),0,'L');
$pdf->SetXY(155,140);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['amperaje3_3']),0,'L');


#Variador
$pdf->SetXY(15,146);
$pdf->SetFont("Arial","B",9);
$pdf->Cell (30,7,utf8_decode('Variador'),0,0,'L');
$pdf->SetXY(80,146);
$pdf->SetFont("Arial","",9);
$pdf->Cell (30,7,utf8_decode('Funcionamiento: '),0,0,'L');
$pdf->SetXY(107,145);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['funcionamiento']),0,'L');
$pdf->SetXY(145,146);
$pdf->Cell (30,7,utf8_decode('Tipo: '),0,0,'L');
$pdf->SetXY(155,145);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['tipovariador']),0,'L');

#Tipo filtros instalados
$cen_width = 30;  //define cell width
$cen=4;
//$equipo=reg['equipo'];

$sql2 = Mysql::consulta("SELECT * FROM equipo WHERE equipo= '$equi'");  //////////////////////////////////////base de datos
$reg2 = mysqli_fetch_array($sql2, MYSQLI_ASSOC);

//$pdf->SetXY(12,152);
//$pdf->Cell (190,5,'',1,0,'C');
//$pdf->SetXY(15,175);
//$pdf->SetFont("Arial","B",9);
//$pdf->Cell (30,7,utf8_decode('Tipo de Filtros Instalados'),0,0,'L');
//$pdf->SetXY(12,175);
//$pdf->Cell (25,24,'',1,0,'C');

$pdf->SetXY(12,153.4);
$pdf->Cell (190,5,'Tipo de Filtros Instalados',1,1,'C',true);
$pdf->SetXY(60,157.5);
$pdf->SetFont("Arial","",9);
$pdf->Cell (32,7,utf8_decode('Modelo:'),0,0,'L');
$pdf->SetXY(162,158.5);
$pdf->Cell (40,47,'',1,0,'C');//pz
$pdf->SetXY(177.5,157.5);
$pdf->Cell (30,7,utf8_decode('Pz: '),0,0,'L');
$pdf->SetXY(12,158.5);
$pdf->Cell (35,47,'',1,0,'C');//etapas
$pdf->SetXY(20,163.5);
$pdf->Cell (30,7,utf8_decode('Etapa 1: '),0,0,'L');
$pdf->SetXY(20,173.5);
$pdf->Cell (30,7,utf8_decode('Etapa 2: '),0,0,'L');
$pdf->SetXY(20,183.5);
$pdf->Cell (30,7,utf8_decode('Etapa 3: '),0,0,'L');
$pdf->SetXY(20,193.5);
$pdf->Cell (30,7,utf8_decode('Etapa 4: '),0,0,'L');
//Etapa 1
$pdf->SetXY(12,163.5);
$pdf->Cell (190,10,'',1,0,'C');
$pdf->SetXY(60,163);
$pdf->Cell (20,7,utf8_decode($reg2['modelo_f1']),0,'R');
$pdf->SetXY(177,163);
$pdf->Cell (20,7,utf8_decode($reg2['pz_f1']),0,'L');

$pdf->SetXY(60,167.5);
$pdf->Cell (20,7,utf8_decode($reg2['modelo_f1_2']),0,'R');
$pdf->SetXY(177,167.5);
$pdf->Cell (20,7,utf8_decode($reg2['pz_f1_2']),0,'L');
//Etapa 2
$pdf->SetXY(60,172.5);
$pdf->Cell (20,7,utf8_decode($reg2['modelo_f2']),0,'R');
$pdf->SetXY(177,172.5);
$pdf->Cell (20,7,utf8_decode($reg2['pz_f2']),0,'L');

$pdf->SetXY(60,177.5);
$pdf->Cell (20,7,utf8_decode($reg2['modelo_f2_2']),0,'R');
$pdf->SetXY(177,177.5);
$pdf->Cell (20,7,utf8_decode($reg2['pz_f2_2']),0,'L');
//Etapa 3
$pdf->SetXY(12,184);
$pdf->Cell (190,10,'',1,0,'C');
$pdf->SetXY(60,183);
$pdf->Cell (20,7,utf8_decode($reg2['modelo_f3']),0,'R');
$pdf->SetXY(177,183);
$pdf->Cell (20,7,utf8_decode($reg2['pz_f3']),0,'L');

$pdf->SetXY(60,186.5);
$pdf->Cell (30,7,utf8_decode($reg2['modelo_f3_2']),0,'R');
$pdf->SetXY(177,186.5);
$pdf->Cell (30,7,utf8_decode($reg2['pz_f3_2']),0,'L');
//Etapa 4
$pdf->SetXY(60,193.5);
$pdf->Cell (30,7,utf8_decode($reg2['modelo_f4']),0,'R');
$pdf->SetXY(177,193.5);
$pdf->Cell (30,7,utf8_decode($reg2['pz_f4']),0,'L');

$pdf->SetXY(60,197);
$pdf->Cell (30,7,utf8_decode($reg2['modelo_f4_2']),0,'R');
$pdf->SetXY(177,197);
$pdf->Cell (30,7,utf8_decode($reg2['pz_f4_2']),0,'L');


///////////////////////////////////////////////////////////////

$pdf->SetXY(12,202);
$pdf->SetFont("Arial","B",9);
$pdf->Cell (190,5,utf8_decode('Observaciones'),1,0,'C',true);
$c_width = 185;  //define cell width
$c_height=4; 
$pdf->SetXY(12,207);
$pdf->Cell (190,23,'',1,0,'C');
$pdf->SetXY(14,208);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['observaciones']),0,'L');

$pdf->SetXY(12,230);
$pdf->SetFont("Arial","B",9);
$pdf->Cell (190,5,utf8_decode('Improve (Mejora)'),1,0,'C',true);
$c_width = 175;  //define cell width
$c_height=4; 
$pdf->SetXY(12,235);
$pdf->Cell (190,15,'',1,0,'C');
$pdf->SetXY(20,236);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell ($c_width,$c_height,utf8_decode($reg['mejora']),0,'L');
//$pdf->SetXY(12,178);
//$pdf->Cell (190,60,'',1,0,'C');


$pdf->Output();
	

}else{
	header('Location: index.php');
}