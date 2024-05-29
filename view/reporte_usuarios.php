<?php

require('./fpdf.php');

class PDF extends FPDF
{

    // Cabecera de página
    function Header()
    {

        //creamos una celda o fila
        $this->Ln(3); // Salto de línea
        $this->SetTextColor(103); //color

        /* TITULO DE LA TABLA */
        //color
        $this->SetTextColor(52, 132, 234);
        $this->Cell(50); // mover a la derecha
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(100, 10, utf8_decode("REPORTE DE USUARIOS "), 0, 1, 'C', 0);
        $this->Ln(7);

        /* CAMPOS DE LA TABLA */
        //color
        $this->SetFillColor(26, 114, 227); //colorFondo
        $this->SetTextColor(255, 255, 255); //colorTexto
        $this->SetDrawColor(163, 163, 163); //colorBorde
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(18, 10, utf8_decode('ID'), 1, 0, 'C', 1);
        $this->Cell(40, 10, utf8_decode('NOMBRE'), 1, 0, 'C', 1);
        $this->Cell(40, 10, utf8_decode('APELLIDO'), 1, 0, 'C', 1);
        $this->Cell(40, 10, utf8_decode('USUARIO'), 1, 0, 'C', 1);
        $this->Cell(50, 10, utf8_decode('CLAVE'), 1, 1, 'C', 1);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15); // Posición: a 1,5 cm del final
        $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

        $this->SetY(-15); // Posición: a 1,5 cm del final
        $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
        $hoy = date('d/m/Y');
        $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
    }
}

include '../../model/conexion_usuario.php';
/* CONSULTA INFORMACION DE LA BASA DE DATOS */
$consulta_info = $conexion->query(" select * from usuario ");
$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

$consulta_reporte = $conexion->query(" select * from usuario ");

while ($datos_reporte = $consulta_reporte->fetch_object()) {
    $i = $i + 1;
    /* TABLA */
    $pdf->Cell(18, 10, utf8_decode("$datos_reporte->id_usuario"), 1, 0, 'C', 0);
    $pdf->Cell(40, 10, utf8_decode("$datos_reporte->nombre"), 1, 0, 'C', 0);
    $pdf->Cell(50, 10, utf8_decode("$datos_reporte->apellido"),1, 1, 'C', 0);
    $pdf->Cell(40, 10, utf8_decode("$datos_reporte->usuario"), 1, 0, 'C', 0);
    $pdf->Cell(50, 10, utf8_decode("$datos_reporte->clave"),1, 1, 'C', 0);
}


$pdf->Output('reporteUsuarios.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)

?>