<?php
require_once("fpdf/fpdf.php");

//membuat pdf
$pdf =new FPDF  ('p','mm','A4');

//membuat halaman baru
$pdf->AddPage();


//judul
$pdf->Cell(190,7,'peminjaman barang',0,1,'C');
$pdf->Output();
?>