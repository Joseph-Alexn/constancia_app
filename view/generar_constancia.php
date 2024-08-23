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
    $this->Image('../assets/encabezado.png',15,8,145);
    $this->setY(50);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(65);
    // Título
    $this->MultiCell(0,0,'CONSTANCIA DE TRABAJO','C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Número de página
    $this->Image('../assets/footer.png',28);
}
}

include '../model/conexion.php';
/* CONSULTA INFORMACION DE LA BASA DE DATOS */
$consulta_info = $conexion->query(" select * from persona ");
$dato_info = $consulta_info->fetch_object();
$consulta_reporte = $conexion->query(" select * from persona ");

$datos_reporte = $consulta_reporte->fetch_object();

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetRightMargin(20);
$pdf->SetLeftMargin(10);
$pdf->setXY(23,60);
$pdf->SetFont('Arial','',8);
$pdf->MultiCell(0,0,'Quien suscribe,',0,'J');
$pdf->setXY(44,60);
$pdf->SetFont('Arial','B',8);
$pdf->MultiCell(0,0,utf8_decode('GERENTE NACIONAL DE LA OFICINA DE TALENTO HUMANO  DE  LA "CORPORACIÓN    NACIONAL'),0,'J');
$pdf->setXY(23,65);
$pdf->SetFont('Arial','B',8);
$pdf->MultiCell(0,0,utf8_decode('DE ALIMENTACION ESCOLAR CNAE S,A.",'),0,'J');
$pdf->setXY(83,65);
$pdf->SetFont('Arial','',8);
$pdf->MultiCell(0,0,utf8_decode('hace   constar   mediante    el   presente,   que   el  (la)  ciudadano  (a)  abajo'),0,'J');
$pdf->setXY(23,70);
$pdf->SetFont('Arial','',8);
$pdf->MultiCell(0,0,utf8_decode('ciudadano (a) abajo mencionado (a) presta sus servicios en esta Corporación, con una remuneración  mensual  detallada  de'),0,'J');
$pdf->setXY(23,75);
$pdf->SetFont('Arial','',8);
$pdf->MultiCell(0,0,utf8_decode('la siguiente manera.'),0,'J');
$pdf->setXY(81, 85);
$pdf->SetFont('Arial','B', 10);
$pdf->Multicell(0,0,utf8_decode('DATOS DEL TRABAJADOR'),0,'J');
$pdf->setXY(30, 90);
$pdf->SetFont('Arial','', 8);
$pdf->Multicell(0,0,utf8_decode('APELLIDOS Y NOMBRES'),0,'J');
$pdf->setXY(90, 90);
$pdf->SetFont('Arial','', 8);
$pdf->Multicell(0,0,utf8_decode('CEDULA DE IDENTIDAD'),0,'J');
$pdf->setXY(146, 90);
$pdf->SetFont('Arial','', 8);
$pdf->Multicell(0,0,utf8_decode('FECHA DE INGRESO'),0,'J');
$pdf->setXY(25, 95);
$pdf->SetFont('Arial','B', 8);
$pdf->Multicell(0,0,utf8_decode("$datos_reporte->nombre"." $datos_reporte->apellido"),0,'J');
$pdf->setXY(108, 95);
$pdf->SetFont('Arial','B', 8);
$pdf->Multicell(0,0,utf8_decode("$datos_reporte->cedula"),0,'J');
$pdf->setXY(152, 95);
$pdf->SetFont('Arial','B', 8);
$pdf->Multicell(0,0,utf8_decode("21/08/2024"),0,'J');
$pdf->setXY(30, 100);
$pdf->SetFont('Arial','', 7);
$pdf->Multicell(0,0,utf8_decode('DEPENDENCIA DE ADSCRIPCION'),0,'J');
$pdf->setXY(25,105);
$pdf->setfont('Arial','B', 8);
$pdf->Multicell(0,0,utf8_decode("GERENCIA DE TECNOLOGIA DE LA INFORMACION"),0,'J');
$pdf->setXY(149,100);
$pdf->setfont('Arial','', 7);
$pdf->Multicell(0,0,utf8_decode("UBICACION REAL"),0,'J');
$pdf->setXY(146,105);
$pdf->setfont('Arial','B', 8);
$pdf->Multicell(0,0,utf8_decode("DISTRITO CAPITAL"),0,'J');
$pdf->setXY(40,110);
$pdf->setfont('Arial','', 7);
$pdf->Multicell(0,0,utf8_decode("CONDICION"),0,'J');
$pdf->setXY(104,110);
$pdf->setfont('Arial','', 7);
$pdf->Multicell(0,0,utf8_decode("CARGO"),0,'J');
$pdf->setXY(147,110);
$pdf->setfont('Arial','', 7);
$pdf->Multicell(0,0,utf8_decode("SALARIO MENSUAL"),0,'J');
$pdf->setXY(30,115);
$pdf->setfont('Arial','B', 8);
$pdf->Multicell(0,0,utf8_decode($datos_reporte->cargo),0,'C');
$pdf->setXY(150,115);
$pdf->setfont('Arial','B', 8);
$pdf->Multicell(0,0,utf8_decode("Bs.S 247,40"),0,'J');
$pdf->setXY(30,120);
$pdf->setfont('Arial','B', 8);
$pdf->Multicell(0,0,utf8_decode("DESGLOSE DE CONCEPTOS MENSUALES"),0,'C');
$pdf->setXY(95,130);
$pdf->setfont('Arial','', 7);
$pdf->Multicell(0,0,utf8_decode("SALARIO BASICO                   BS."),0,'J');
$pdf->setXY(80,135);
$pdf->setfont('Arial','', 7);
$pdf->Multicell(0,0,utf8_decode("PRIMA PROFESIONALIZACIÓN                   BS."),0,'J');
$pdf->setXY(95,140);
$pdf->setfont('Arial','', 7);
$pdf->Multicell(0,0,utf8_decode("PRIMA POR HIJOS                  BS."),0,'J');
$pdf->setXY(86,145);
$pdf->setfont('Arial','', 7);
$pdf->Multicell(0,0,utf8_decode("PRIMA POR ANTIGÜEDAD                  BS."),0,'J');
$pdf->setXY(87,150);
$pdf->setfont('Arial','', 7);
$pdf->Multicell(0,0,utf8_decode("PRIMA COMPENSATORIA                  BS."),0,'J');
$pdf->setXY(79,155);
$pdf->setfont('Arial','', 7);
$pdf->Multicell(0,0,utf8_decode("PRIMA DE AYUDA Y ASISTENCIA                 BS."),0,'J');
$pdf->setXY(74,160);
$pdf->setfont('Arial','', 7);
$pdf->Multicell(0,0,utf8_decode("DEPENDENCIA POR ENCARGADURIA                BS."),0,'J');
$pdf->setXY(90,165);
$pdf->setfont('Arial','B', 7);
$pdf->Multicell(0,0,utf8_decode("REMUNERACION TOTAL               BS."),0,'J');
$pdf->setXY(53,175);
$pdf->setfont('Arial','B', 7);
$pdf->Multicell(0,0,utf8_decode("CESTATICKET SOCIALISTA(SIN INCIDENCIA SALARIAL)              BS."),0,'J');
$pdf->setXY(150,130);
$pdf->setfont('Arial','', 7);
$pdf->Multicell(0,0,utf8_decode("170,00"),0,'J');
$pdf->setXY(150,135);
$pdf->setfont('Arial','', 7);
$pdf->Multicell(0,0,utf8_decode("170,00"),0,'J');
$pdf->setXY(150,140);
$pdf->setfont('Arial','', 7);
$pdf->Multicell(0,0,utf8_decode("170,00"),0,'J');
$pdf->setXY(150,145);
$pdf->setfont('Arial','', 7);
$pdf->Multicell(0,0,utf8_decode("170,00"),0,'J');
$pdf->setXY(150,150);
$pdf->setfont('Arial','', 7);
$pdf->Multicell(0,0,utf8_decode("170,00"),0,'J');
$pdf->setXY(150,155);
$pdf->setfont('Arial','', 7);
$pdf->Multicell(0,0,utf8_decode("170,00"),0,'J');


/*for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);*/
$pdf->Output();
?>