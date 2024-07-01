<?php

require('./fpdf/fpdf.php');

$fecha_ingreso="29/06/2024";
$gerente = "MARBELLA NOHEMI CANELON  TORREALBA";
$cargo_gerente="GERENTE NACIONAL DE TALENTO HUMANO";
$gerencia = "GERENCIA DE TECNOLOGIA PARA LA INFORMACION";
   
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../assets/encabezado.png',28,5,160);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->image('../assets/footer.png', 28,275,0);
}
}

include '../model/conexion.php';
/* CONSULTA INFORMACION DE LA BASA DE DATOS */
$consulta_info = $conexion->query(" select * from persona ");
$dato_info = $consulta_info->fetch_object();



// Creación del objeto de la clase heredada
$pdf = new PDF();
$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

$consulta_reporte = $conexion->query(" select * from persona ");
$datos_reporte = $consulta_reporte->fetch_object();

$pdf->AliasNbPages();
$pdf->SetLeftMargin(20);
$pdf->AddPage();
$pdf->SetFont('Arial','B', 12);
$pdf->Ln(15);
$pdf->setY(35);
$pdf->cell(175,8,utf8_decode('CONSTANCIA DE TRABAJO'),0,0,'C',0);
$pdf->ln(15);
$pdf->SetXY(30, 50);
$pdf->SetFont('Arial','',12);
$pdf->cell(100,8,utf8_decode('Quien Suscribe, Ciudadano(a) '),0,0,'J',0);
$pdf->SetXY(90, 50);
$pdf->SetFont('Arial','B',12);
$pdf->cell(160,8, utf8_decode("$gerente,"),0,0,'J',0);
$pdf->SetXY(30, 56);
$pdf->SetFont('Arial','',12);
$pdf->cell(75,8,utf8_decode('en mi caracter de'),0,0,'J',0);
$pdf->SetXY(68, 56);
$pdf->SetFont('Arial','B',12);
$pdf->cell(55,8, utf8_decode("$cargo_gerente"),0,'J');
$pdf->SetXY(168, 56);
$pdf->SetFont('Arial','',12);
$pdf->cell(172,8,' de     la',0,0,'J',0);
$pdf->SetXY(30, 63);
$pdf->SetFont('Arial','',12);
$pdf->multicell(200,6,utf8_decode('Corporacion Nacional de Alimentacion Escolar y debidamente    facultada     para 
este acto, por  medio  de  la  presente  hago  constar   que   el(la)     ciudadano(a):'),30,'J');
$pdf->SetXY(30, 75);
$pdf->SetFont('Arial','B',12);
$pdf->multicell(200,6,utf8_decode("$datos_reporte->nombre"),0,'J');
$pdf->SetXY(51, 75);
$pdf->multicell(200,6,utf8_decode("$datos_reporte->apellido".','),0,'J');
$pdf->SetFont('Arial','',12);
$pdf->SetXY(66, 75);
$pdf->cell(172,6,utf8_decode('titular de la cedula de identidad número: '),0,'J');
$pdf->SetXY(142, 75);
$pdf->SetFont('Arial','B',12);
$pdf->cell(200,6,utf8_decode("$datos_reporte->cedula".','),0,'J');
$pdf->SetFont('Arial','',12);
$pdf->SetXY(163, 75);
$pdf->cell(172,6,utf8_decode('actualmente'),0,'J');
$pdf->SetFont('Arial','',12);
$pdf->SetXY(30, 81);
$pdf->cell(172,6,utf8_decode('se desempeña como:'),0,'J');
$pdf->SetXY(72, 81);
$pdf->SetFont('Arial','B',12);
$pdf->cell(200,6,utf8_decode("$datos_reporte->cargo".','),0,'J');
$pdf->SetFont('Arial','',12);
$pdf->SetXY(91, 81);
$pdf->cell(172,6,utf8_decode('  adscrito   a   la  dependencia: '),0,'J');
$pdf->SetXY(143, 81);
$pdf->SetFont('Arial','B',12);
$pdf->cell(0,6,utf8_decode("       GERENCIA DE"),0,'J');
$pdf->SetXY(30, 87);
$pdf->cell(0,6,utf8_decode("TECNOLOGIA DE LA INFORMACIÓN,"),0,'J');
$pdf->SetFont('Arial','',12);
$pdf->SetXY(107, 87);
$pdf->cell(0,6,utf8_decode("con fecha de ingreso: "),0,'J');
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(150, 87);
$pdf->cell(0,6,utf8_decode("$fecha_ingreso".'.'),0,'J');
$pdf->SetFont('Arial','',12);
$pdf->SetXY(30, 100);
$pdf->cell(0,6,utf8_decode("Constancia que se expide a peticion de la parte interesada al dia: "),0,'J');
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(154, 100);
$pdf->cell(0,6,utf8_decode("3 dias del mes"),0,'J');
$pdf->SetXY(30, 106);
$pdf->cell(0,6,utf8_decode("de junio del año 2024."),0,'J');
$pdf->SetFont('Arial','B',7);
$pdf->SetXY(135, 130);
$pdf->cell(0,6,utf8_decode("Por la Construcción de la Patria Socialista..."),0,'J');
$pdf->image('../assets/sello.png',28,140,0);
/*for($i=1;$i<=40;$i++)
$pdf->Cell(0,10,utf8_decode('imprimiendo linea de número'),0,1);*/
$pdf->Output();
?>