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
			$id = MysqlQuery::RequestGet('id');
$sql = Mysql::consulta("SELECT * FROM servicio2 WHERE id_servicio= '$id'");
$reg = mysqli_fetch_array($sql, MYSQLI_ASSOC);
	$this->SetFillColor(194, 192, 192);
	$this->SetFont("Arial","b",9);
$this->Image('../img/Logo-DV-final.png',15,10,40);
$this->Image('../img/abc_logo.png',175,8,25);
$this->Image('../img/base.png',4,4,206);
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
$this->Cell (25,8,'Sucursal',1,0,'C',true);
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
			
			$this->SetXY(12,-30);
			$this->Cell (190,5,'Cuadro de Firmas del Servicio Realizado',1,0,'C',true);
			$this->SetXY(12,-25);
			$this->Cell (95,5,utf8_decode('Ejecutó Servicio'),1,0,'C',true);
			$this->SetXY(107,-25);
			$this->Cell (95,5,utf8_decode('Recibe Por The American British Cowdray'),1,0,'C',true);

			$this->SetXY(12,-25);
			$this->Cell (95,15, '' ,1,0,'C');
			$this->SetXY(12,-20);
			$this->Cell (95,15,'Tecnico '. $_SESSION['nombre'],0,0,'C');
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

$id = MysqlQuery::RequestGet('id');
$sql = Mysql::consulta("SELECT * FROM ser_img WHERE id_ser_img= '$id' AND fecha_servicio = '$fecha_serv' AND equipo ='$equi'");
$rim = mysqli_fetch_array($sql, MYSQLI_ASSOC);

$cell_width = 31.5;  //define cell width
$cell_height=4;  

#Primera Etapa
$pdf->SetFont("Arial","B",9);
$pdf->SetXY(12,55);
$pdf->Cell (190,5,utf8_decode($reg['servicio']),1,0,'C',true);

$pdf->SetXY(12,60);
$pdf->SetFont("Arial","",8);
$pdf->Cell (63,5,utf8_decode('Lectura de Presión (In H2O/Pa) '),1,1,'C',true);
$pdf->SetXY(12,65);
$pdf->SetFont("Arial","",9);
$pdf->Cell (31.6,6,utf8_decode($reg['valor1']),1,0,'C');
$pdf->SetXY(43.6,65);
$pdf->Cell (31.5,6,utf8_decode($reg['valor2']),1,0,'C');
$pdf->SetXY(75,60);
$pdf->Cell (64,5,'Remplazo de Filtros',1,0,'C',true);
$pdf->SetXY(75,65);
$pdf->SetFont("Arial","",7);
$pdf->Cell (64,6,utf8_decode($reg['valor3']),1,0,'C');
$pdf->SetXY(139,60);
$pdf->SetFont("Arial","",9);
$pdf->Cell (63,5,'Limpieza',1,0,'C',true);
$pdf->SetXY(139,65);
$pdf->SetFont("Arial","",7);
$pdf->Cell (63,6,utf8_decode($reg['valor4']),1,0,'C');

$pdf->SetXY(12,71);
$pdf->Cell (31.5,27.5,'',1,1,'C');
$imagen1 = $rim['img1'];
$pdf->Image($imagen1,13,72,30,25);

$pdf->SetXY(43.5,71);
$pdf->Cell (31.5,27.5,'',1,1,'C');
$imagen2 = $rim['img2'];
$pdf->Image($imagen2,44.4,72,30,25);

$pdf->SetXY(75,71);
$pdf->Cell (64,27.5,'',1,1,'C');
$imagen3 = $rim['img3'];
$pdf->Image($imagen3,79,72,52,25);

$pdf->SetXY(139,71);
$pdf->Cell (63,27.5,'',1,1,'C');
$imagen4 = $rim['img4'];
$pdf->Image($imagen4,145,72,52,25);


#Segunda Etapa
$pdf->SetFont("Arial","B",9);
$pdf->SetXY(12,103);
$pdf->Cell (190,5,utf8_decode($reg['servicio2']),1,0,'C',true);

$pdf->SetXY(12,108);
$pdf->SetFont("Arial","",8);
$pdf->Cell (63,5,utf8_decode('Lectura de Presión (In H2O/Pa) '),1,1,'C',true);
$pdf->SetXY(12,113);
$pdf->SetFont("Arial","",9);
$pdf->Cell (31.6,6,utf8_decode($reg['valor1_s2']),1,0,'C');
$pdf->SetXY(43.6,113);
$pdf->Cell (31.5,6,utf8_decode($reg['valor2_s2']),1,0,'C');
$pdf->SetXY(75,108);
$pdf->Cell (64,5,'Remplazo de Filtros',1,0,'C',true);
$pdf->SetXY(75,113);
$pdf->SetFont("Arial","",7);
$pdf->Cell (64,6,utf8_decode($reg['valor3_s2']),1,0,'C');
$pdf->SetXY(139,108);
$pdf->SetFont("Arial","",9);
$pdf->Cell (63,5,'Limpieza',1,0,'C',true);
$pdf->SetXY(139,113);
$pdf->SetFont("Arial","",7);
$pdf->Cell (63,6,utf8_decode($reg['valor4_s2']),1,0,'C');

$pdf->SetXY(12,119);
$pdf->Cell (31.5,27.5,'',1,1,'C');
$imagen1_s2 = $rim['img1_s2'];
$pdf->Image($imagen1_s2,13,120,30,25);

$pdf->SetXY(43.5,119);
$pdf->Cell (31.5,27.5,'',1,1,'C');
$imagen2_s2 = $rim['img2_s2'];
$pdf->Image($imagen2_s2,44.4,120,30,25);

$pdf->SetXY(75,119);
$pdf->Cell (64,27.5,'',1,1,'C');
$imagen3_s2 = $rim['img3_s2'];
$pdf->Image($imagen3_s2,79,120,52,25);

$pdf->SetXY(139,119);
$pdf->Cell (63,27.5,'',1,1,'C');
$imagen4_s2 = $rim['img4_s2'];
$pdf->Image($imagen4_s2,145,120,52,25);


#Tercera Etapa
$pdf->SetFont("Arial","B",9);
$pdf->SetXY(12,153);
$pdf->Cell (190,5,utf8_decode($reg['servicio3']),1,0,'C',true);

$pdf->SetXY(12,158);
$pdf->SetFont("Arial","",8);
$pdf->Cell (63,5,utf8_decode('Lectura de Presión (In H2O/Pa) '),1,1,'C',true);
$pdf->SetXY(12,163);
$pdf->SetFont("Arial","",9);
$pdf->Cell (31.6,6,utf8_decode($reg['valor1_s3']),1,0,'C');
$pdf->SetXY(43.6,163);
$pdf->Cell (31.5,6,utf8_decode($reg['valor2_s3']),1,0,'C');
$pdf->SetXY(75,158);
$pdf->Cell (64,5,'Remplazo de Filtros',1,0,'C',true);
$pdf->SetXY(75,163);
$pdf->SetFont("Arial","",7);
$pdf->Cell (64,6,utf8_decode($reg['valor3_s3']),1,0,'C');
$pdf->SetXY(139,158);
$pdf->SetFont("Arial","",9);
$pdf->Cell (63,5,'Limpieza',1,0,'C',true);
$pdf->SetXY(139,163);
$pdf->SetFont("Arial","",7);
$pdf->Cell (63,6,utf8_decode($reg['valor4_s3']),1,0,'C');

$pdf->SetXY(12,169);
$pdf->Cell (31.5,27.5,'',1,1,'C');
$imagen1_s3 = $rim['img1_s3'];
$pdf->Image($imagen1_s3,13,170,30,25);

$pdf->SetXY(43.5,169);
$pdf->Cell (31.5,27.5,'',1,1,'C');
$imagen2_s3 = $rim['img2_s3'];
$pdf->Image($imagen2_s3,44.4,170,30,25);

$pdf->SetXY(75,169);
$pdf->Cell (64,27.5,'',1,1,'C');
$imagen3_s3 = $rim['img3_s3'];
$pdf->Image($imagen3_s3,79,170,52,25);

$pdf->SetXY(139,169);
$pdf->Cell (63,27.5,'',1,1,'C');
$imagen4_s3 = $rim['img4_s3'];
$pdf->Image($imagen4_s3,145,170,52,25);


#Cuarta Etapa
$pdf->SetXY(12,203);
$pdf->Cell (190,10,'',0,1,'C');
$pdf->SetFont("Arial","B",9);
$pdf->SetXY(12,203);
$pdf->Cell (190,5,utf8_decode($reg['servicio4']),1,0,'C',true);

$pdf->SetXY(12,208);
$pdf->SetFont("Arial","",8);
$pdf->Cell (63,5,utf8_decode('Lectura de Presión (In H2O/Pa) '),1,1,'C',true);
$pdf->SetXY(12,213);
$pdf->SetFont("Arial","",9);
$pdf->Cell (31.6,6,utf8_decode($reg['valor1_s4']),1,0,'C');
$pdf->SetXY(43.6,213);
$pdf->Cell (31.5,6,utf8_decode($reg['valor2_s4']),1,0,'C');
$pdf->SetXY(75,208);
$pdf->Cell (64,5,'Remplazo de Filtros',1,0,'C',true);
$pdf->SetXY(75,213);
$pdf->SetFont("Arial","",7);
$pdf->Cell (64,6,utf8_decode($reg['valor3_s4']),1,0,'C');
$pdf->SetXY(139,208);
$pdf->SetFont("Arial","",9);
$pdf->Cell (63,5,'Limpieza',1,0,'C',true);
$pdf->SetXY(139,213);
$pdf->SetFont("Arial","",7);
$pdf->Cell (63,6,utf8_decode($reg['valor4_s4']),1,0,'C');

$pdf->SetXY(12,219);
$pdf->Cell (31.5,27.5,'',1,1,'C');
$imagen1_s4 = $rim['img1_s4'];
$pdf->Image($imagen1_s4,13,220,30,25);

$pdf->SetXY(43.5,219);
$pdf->Cell (31.5,27.5,'',1,1,'C');
$imagen2_s4 = $rim['img2_s4'];
$pdf->Image($imagen2_s4,44.4,220,30,25);

$pdf->SetXY(75,219);
$pdf->Cell (64,27.5,'',1,1,'C');
$imagen3_s4 = $rim['img3_s4'];
$pdf->Image($imagen3_s4,79,220,52,25);

$pdf->SetXY(139,219);
$pdf->Cell (63,27.5,'',1,1,'C');
$imagen4_s4 = $rim['img4_s4'];
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
$pdf->MultiCell (31.6,4,utf8_decode('Lectura de Vibración   (Axial)   '),1,1,'C',true);
$pdf->SetXY(43.6,63);
$pdf->SetFont("Arial","",8);
$pdf->Cell (31.6,8,utf8_decode($reg['valor1_s5']),1,0,'C');
$pdf->SetXY(75.2,63);
$pdf->MultiCell (31.6,4,utf8_decode('Lectura de Vibración   (Vertical)  '),1,0,'C',true);
$pdf->SetXY(106.8,63);
$pdf->Cell (31.6,8,utf8_decode($reg['valor2_s5']),1,0,'C');
$pdf->SetXY(138.4,63);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell (31.6,4,utf8_decode('Lectura de Vibración   (Horizontal)   '),1,0,'C',true);
$pdf->SetXY(170,63);
$pdf->Cell (31.9,8,utf8_decode($reg['valor3_s5']),1,0,'C');

$pdf->SetXY(12,71);
$pdf->SetFont("Arial","",8);
$pdf->Cell (31.6,8,utf8_decode('Cambio de Bandas'),1,1,'C',true);
$pdf->SetXY(43.6,71);
$pdf->SetFont("Arial","",8);
$pdf->Cell (31.6,8,utf8_decode($reg['valor1_s5']),1,0,'C');
$pdf->SetXY(75.2,71);
$pdf->MultiCell (31.6,4,utf8_decode('Engrasado        de     Chumacera         '),1,0,'R',true);
$pdf->SetXY(106.8,71);
$pdf->Cell (31.6,8,utf8_decode($reg['valor2_s5']),1,0,'C');
$pdf->SetXY(138.4,71);
$pdf->SetFont("Arial","",8);
$pdf->Cell (31.6,8,utf8_decode('Limpieza General'),1,0,'C',true);
$pdf->SetXY(170,71);
$pdf->Cell (31.9,8,utf8_decode($reg['valor3_s5']),1,0,'C');

$pdf->SetFont("Arial","B",9);
$pdf->SetXY(12,83);
$pdf->Cell (190,5,utf8_decode('Evidencia Fotográfica Posterior al Servicio'),1,0,'C',true);

$pdf->SetXY(12,88);
$imagen3 = $rim['img1_s5'];
$pdf->Image($imagen3,79,89,49,22.5);

#Mantenimiento a Serpentin
$pdf->SetFont("Arial","B",9);
$pdf->SetXY(12,117);
$pdf->Cell (190,5,utf8_decode($reg['servicio6']),1,0,'C',true);
$pdf->SetXY(12,122);
$pdf->Cell (190,45,'',1,1,'C');
$pdf->SetXY(12,125);
$pdf->SetFont("Arial","",8);
$pdf->Cell (31.6,8,utf8_decode('Limpieza General'),1,1,'C',true);
$pdf->SetXY(43.6,125);
$pdf->SetFont("Arial","",8);
$pdf->Cell (158.4,8,utf8_decode($reg['valor1_s6']),1,0,'L');
$pdf->SetXY(12,133);
$pdf->SetFont("Arial","B",9);
$pdf->Cell (190,5,utf8_decode('Evidencia Fotográfica Posterior al Servicio'),1,0,'C',true);
$pdf->SetXY(12,138);
$imagen3 = $rim['img1_s6'];
$pdf->Image($imagen3,79,139,49,22.5);

#Mantenimiento a Evaporador, Charola
$pdf->SetFont("Arial","B",9);
$pdf->SetXY(12,170);
$pdf->Cell (190,5,utf8_decode($reg['servicio8']),1,0,'C',true);
$pdf->SetXY(12,175);
$pdf->Cell (190,45,'',1,1,'C');
$pdf->SetXY(12,175);
$pdf->SetFont("Arial","",8);
$pdf->Cell (31.6,8,utf8_decode('Limpieza General'),1,1,'C',true);
$pdf->SetXY(43.6,175);
$pdf->SetFont("Arial","",8);
$pdf->Cell (158.4,8,utf8_decode($reg['valor1_s8']),1,0,'L');
$pdf->SetXY(12,183);
$pdf->SetFont("Arial","B",9);
$pdf->Cell (190,5,utf8_decode('Evidencia Fotográfica Posterior al Servicio'),1,0,'C',true);
$pdf->SetXY(12,188);
$imagen3 = $rim['img1_s8'];
$pdf->Image($imagen3,79,189,49,22.5);
	

$pdf->Ln();
$pdf->Ln();



$pdf->SetXY(12,295);
$pdf->Cell (190,10,'',0,1,'C');
$pdf->SetXY(12,60);
$pdf->SetFont("Arial","B",9);
$pdf->Cell (190,10,utf8_decode('Up Time'),1,0,'C',true);
$pdf->SetXY(12,70);
$pdf->Cell (95,10,utf8_decode('Tiempo Fuera de Operación por Falla (Hrs)'),1,0,'C');
$pdf->SetXY(107,70);
$pdf->Cell (95,10,utf8_decode($reg['valor_uptime']),1,0,'C');

$pdf->SetXY(12,90);
$pdf->Cell (190,8,utf8_decode('Observaciones'),1,0,'C',true);
$pdf->SetXY(12,98);
$pdf->Cell (190,8,'',1,0,'C');
$pdf->SetXY(12,98);
$pdf->Cell (190,47.9,'',1,0,'C');
$pdf->SetXY(12,114);
$pdf->Cell (190,8,'',1,0,'C');
$pdf->SetXY(12,130);
$pdf->Cell (190,8,'',1,0,'C');
$pdf->SetXY(12,146);
$pdf->Cell (190,8,'',1,0,'C');


$pdf->SetXY(12,170);
$pdf->Cell (190,8,utf8_decode('Improve (Mejora)'),1,0,'C',true);
$pdf->SetXY(12,178);
$pdf->Cell (190,8,'',1,0,'C');
$pdf->SetXY(12,178);
$pdf->Cell (190,57,'',1,0,'C');
$pdf->SetXY(12,194);
$pdf->Cell (190,8,'',1,0,'C');
$pdf->SetXY(12,202);
$pdf->Cell (190,8,'',1,0,'C');
$pdf->SetXY(12,218);
$pdf->Cell (190,8,'',1,0,'C');


$pdf->Output();

}else{
	header('Location: index.php');
}