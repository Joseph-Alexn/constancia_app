<?php

require('./fpdf/fpdf.php');

$fecha_ingreso="29/06/2024";
$gerente = "MARBELLA NOHEMI CANELON  TORREALBA";
$cargo_gerente="GERENTE NACIONAL DE TALENTO HUMANO";
$gerencia = "GERENCIA DE TECNOLOGIA PARA LA INFORMACION";

    date_default_timezone_set("America/Argentina/Buenos_Aires");

        $fecha_dia = date("d");
        $fecha_mes = date("m");
        $fecha_year = date("Y");

        $dia_semana = [
            "Monday" => "lunes",
            "Tuesday" => "martes",
            "Wednesday" => "miercoles",
            "Thursday" => "jueves",
            "Friday" => "viernes",
            "Saturday" => "sabado",
            "Sunday" => "domingo"
        ];

        $meses_year = [
            "01" => "enero",
            "02" => "febrero",
            "03" => "marzo",
            "04" => "abril",
            "05" => "mayo",
            "06" => "junio",
            "07" => "julio",
            "08" => "agosto",
            "09" => "septiembre",
            "10" => "octubre",
            "11" => "noviembre",
            "12" => "diciembre"
        ];

        $fecha_final = $fecha_dia." de ".$meses_year[$fecha_mes]." de ".$fecha_year;
   
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../assets/encabezado.png',15,8,145);
    $this->Image('../assets/logo.png',168,8,18);
    $this->SetFont('Arial','B',10);
    $this->setXY(171,30);
    $this->multicell(0,0,utf8_decode('CNAE'),0,'J');
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
    $this->SetY(250);
    // Número de página
    $this->multicell(0,0,utf8_decode('Gerencia de Talento Humano -Edif. Sede del MPPPE piso 16. Esq. De Salas a Caja de Agua Parroquia Altagracia'),0,'C');
    $this->SetY(253);
    $this->multicell(0,0,utf8_decode('Dtto. Capital Caracas - Venezuela Telf. (0212)596-84-63 - RIF G-20011400-2'),0,'C');
}
}

include '../model/conexion.php';
/* CONSULTA INFORMACION DE LA BASE DE DATOS */
if(isset($_GET['id'])){
    // Obtén el ID de la persona de la URL
    $id_persona = $_GET['id'];

    $consulta_info = $conexion->query("SELECT * FROM persona WHERE id_persona = $id_persona");
    $datos_reporte = $consulta_info->fetch_object();
}

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
$pdf->Multicell(0,0,utf8_decode("$datos_reporte->gerencia"),0,'J');
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
$pdf->setXY(150,160);
$pdf->setfont('Arial','', 7);
$pdf->Multicell(0,0,utf8_decode("170,00"),0,'J');
$pdf->setXY(150,165);
$pdf->setfont('Arial','B', 7);
$pdf->Multicell(0,0,utf8_decode("170,00"),0,'J');
$pdf->setXY(150,175);
$pdf->setfont('Arial','B', 7);
$pdf->Multicell(0,0,utf8_decode("170,00"),0,'J');
$pdf->setXY(44,190);
$pdf->setfont('Arial','', 7);
$pdf->Multicell(0,0,utf8_decode("Caracas "."$fecha_final"),0,'J');
$pdf->image('../assets/sello2.png',100,178,80);
$pdf->setXY(20,218);
$pdf->setfont('Arial','', 7);
$pdf->Multicell(0,0,utf8_decode("Toda Constancia expedida antes de la fecha señalada, cuyos datos no"),0,'J');
$pdf->setXY(25,221);
$pdf->setfont('Arial','', 7);
$pdf->Multicell(0,0,utf8_decode("coincidan con los contenidos en la presente queda sin efecto."),0,'J');
$pdf->setXY(38,226);
$pdf->setfont('Arial','B', 7);
$pdf->Multicell(0,0,utf8_decode("VÁLIDA POR NOVENTA(90) DÍAS"),0,'J');
$pdf->setXY(31,229);
$pdf->setfont('Arial','B', 7);
$pdf->Multicell(0,0,utf8_decode("VA SIN TACHADURAS NI ENMENDADURAS"),0,'J');
$pdf->setXY(28,232);
$pdf->setfont('Arial','B', 7);
$pdf->Multicell(0,0,utf8_decode("CUALQUIER ALTERACIÓN ANULA SU VALIDEZ"),0,'J');



/*for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);*/
$pdf->Output();
?>