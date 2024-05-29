<?php

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {

      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(109, 160, 159);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE REGISTROS "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(208, 244, 252); //colorFondo
      $this->SetTextColor(0, 0, 0); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(18, 10, utf8_decode('ID'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('NOMBRE'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('APELLIDO'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('CEDULA'), 1, 0, 'C', 1);
      $this->Cell(50, 10, utf8_decode('CARGO'), 1, 0, 'C', 1);
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

include '../../model/conexion.php';
/* CONSULTA INFORMACION DE LA BASA DE DATOS */
$consulta_info = $conexion->query(" select * from persona ");
$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

$consulta_reporte = $conexion->query(" select * from persona ");

while ($datos_reporte = $consulta_reporte->fetch_object()) {
   $i = $i + 1;
   /* TABLA */
   $pdf->Cell(18, 10, utf8_decode("$datos_reporte->id_persona"), 1, 0, 'C', 0);
   $pdf->Cell(20, 10, utf8_decode("$datos_reporte->nombre"), 1, 0, 'C', 0);
   $pdf->Cell(30, 10, utf8_decode("$datos_reporte->apellido"), 1, 0, 'C', 0);
   $pdf->Cell(25, 10, utf8_decode("$datos_reporte->cedula"), 1, 0, 'C', 0);
   $pdf->Cell(50, 10, utf8_decode("$datos_reporte->cargo"), 1, 0, 'C', 0);
}


$pdf->Output('reporteRegistros.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)

?>