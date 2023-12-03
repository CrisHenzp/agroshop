<?php
include_once '../config/config.php';
session_start();

$subtotal = 0;
$iva = 0.19;
$transporte = 7000;
$totalf= 0;
$usuario = $_SESSION['id_usuario'];

$query = "SELECT * FROM usuario WHERE id_usuario = '$usuario'";
$result = mysqli_query($conexion, $query);
$row = mysqli_fetch_assoc($result);



$totalFinal= 0;
$numero1 = rand();
$codec = rand();
# Incluyendo librerias necesarias #
require "./code128.php";

$pdf = new PDF_Code128('P', 'mm', 'Letter');
$pdf->SetMargins(17, 17, 17);
$pdf->AddPage();

# Logo de la empresa formato png #
$pdf->Image('./img/logo.png', 150, 12, 55, 35, 'PNG');

# Encabezado y datos de la empresa #
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor(32, 100, 210);
$pdf->Cell(150, 10, iconv("UTF-8", "ISO-8859-1", strtoupper("Informe de ventas")), 0, 0, 'L');

$pdf->Ln(9);

$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(39, 39, 51);
$pdf->Cell(13, 7, iconv("UTF-8", "ISO-8859-1", "Cliente: " .$row['usu_nombre']. ' ' .$row['usu_apellido']), 0, 0);

$pdf->Ln(5);

$pdf->Cell(8, 7, iconv("UTF-8", "ISO-8859-1", "RUT: ". $row['usu_rut']), 0, 0, 'L');

$pdf->Ln(5);

$pdf->Cell(7, 7, iconv("UTF-8", "ISO-8859-1", "Tel: ".$row['usu_telefono']), 0, 0, 'L');

$pdf->Ln(5);

$pdf->Cell(6, 7, iconv("UTF-8", "ISO-8859-1", "Dir: ".$row['usu_direccion']), 0, 0);


$pdf->Ln(10);

// Obtener la fecha y hora actual de Chile
$zona_horaria_chile = new DateTimeZone('America/Santiago');
$fecha_hora_chile = new DateTime('now', $zona_horaria_chile);
// Formatear la fecha y hora
$fecha_hora_formateada = $fecha_hora_chile->format('d/m/Y H:i:s');

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 7, iconv("UTF-8", "ISO-8859-1", "Fecha de emisión:"), 0, 0);
$pdf->SetTextColor(97, 97, 97);
$pdf->Cell(116, 7, iconv("UTF-8", "ISO-8859-1", $fecha_hora_formateada), 0, 1, 'L');


$pdf->Ln(7);


# Tabla de productos #
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(23, 83, 201);
$pdf->SetDrawColor(23, 83, 201);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(90, 8, iconv("UTF-8", "ISO-8859-1", "Descripción"), 1, 0, 'C', true);
$pdf->Cell(15, 8, iconv("UTF-8", "ISO-8859-1", "Cant."), 1, 0, 'C', true);
$pdf->Cell(25, 8, iconv("UTF-8", "ISO-8859-1", "Precio"), 1, 0, 'C', true);
$pdf->Cell(19, 8, iconv("UTF-8", "ISO-8859-1", "Desc."), 1, 0, 'C', true);
$pdf->Cell(32, 8, iconv("UTF-8", "ISO-8859-1", "Subtotal"), 1, 0, 'C', true);

$pdf->Ln(8);


$pdf->SetTextColor(39, 39, 51);

$sql = "SELECT a.pdd_nombre, a.pdd_cantidad, a.pdd_precio, a.pdd_total 
FROM pedidodatos a
INNER JOIN producto b ON a.id_producto = b.id_producto 
WHERE b.id_usuario = $usuario";
$resultado = mysqli_query($conexion, $sql); 
while ($producto = mysqli_fetch_assoc($resultado)) {
/*----------  Detalles de la tabla  ----------*/
$pdf->Cell(90, 7, iconv("UTF-8", "ISO-8859-1", $producto['pdd_nombre']), 'L', 0, 'C');
$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", $producto['pdd_cantidad']), 'L', 0, 'C');
$pdf->Cell(25, 7, iconv("UTF-8", "ISO-8859-1", "$ " .number_format($producto['pdd_precio'], 0, ',', '.')." CLP"), 'L', 0, 'C');
$pdf->Cell(19, 7, iconv("UTF-8", "ISO-8859-1", "$ 0.00 CLP"), 'L', 0, 'C');
$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "$ ". number_format($producto['pdd_total'], 0, ',', '.'). " CLP"), 'LR', 0, 'C');
$pdf->Ln(7);
/*----------  Fin Detalles de la tabla  ----------*/
$totalFinal += $producto['pdd_total'];
}



$pdf->SetFont('Arial', 'B', 9);

# Impuestos & totales #
$pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), 'T', 0, 'C');
$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), 'T', 0, 'C');
$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", ''), 'T', 0, 'C');
$pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", ''), 'T', 0, 'C');

$pdf->Ln(7);

$pdf->Cell(100, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');
$pdf->Cell(15, 7, iconv("UTF-8", "ISO-8859-1", ''), '', 0, 'C');


$pdf->Cell(32, 7, iconv("UTF-8", "ISO-8859-1", "TOTAL"), 'T', 0, 'C');
$pdf->Cell(34, 7, iconv("UTF-8", "ISO-8859-1", number_format($totalFinal, 0, ',', '.')."CLP"), 'T', 0, 'C');

$pdf->Ln(7);

$pdf->Ln(7);
$pdf->Ln(12);

$pdf->SetFont('Arial', '', 9);

$pdf->SetTextColor(39, 39, 51);
$pdf->MultiCell(0, 9, iconv("UTF-8", "ISO-8859-1", "*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe de presentar esta factura ***"), 0, 'C', false);

$pdf->Ln(9);

# Codigo de barras #
$pdf->SetFillColor(39, 39, 51);
$pdf->SetDrawColor(23, 83, 201);
$pdf->Code128(72, $pdf->GetY(), "$codec", 70, 20);
$pdf->SetXY(12, $pdf->GetY() + 21);
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "$codec"), 0, 'C', false);

# Nombre del archivo PDF #
$pdf->Output("I", "Informe_ventas_$numero1.pdf", true);