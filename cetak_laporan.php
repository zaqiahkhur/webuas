<?php
require_once("fpdf/fpdf.php");

//membuat pdf
$pdf =new FPDF  ('p','mm','A4');

//membuat halaman baru
$pdf->AddPage();
$pdf->SetFont('helvetica','',16);

//judul
$pdf->Cell(190,7,'LAPORAN PEMINJAMAN BARANG',0,1,'C');
// $pdf->Cell(190,7,"Priode : '$_POST['dari']." s/d ". $_POST['sampai]",0,1,'C');

//judul tabel
$pdf->SetFont('helvetica','',10);
$pdf->Cell(8,6,'No',1,0,'C');
$pdf->Cell(30,6,'Kode Pinjam',1,0,'C');
$pdf->Cell(35,6,'Kode Barang',1,0,'C');
$pdf->Cell(18,6,'No Identitas',1,0,'C');
$pdf->Cell(18,6,'Jumlah Barang',1,0,'C');
$pdf->Cell(18,6,'Tanggal Pinjam',1,0,'C');
$pdf->Cell(18,6,'Tanggal Kembali',1,0,'C');
$pdf->Cell(18,6,'Keperluan',1,0,'C');

$pdf->SetFont('helvetica','',10);
$no = 1;
 $tampil = mysqli_query("SELECT * FROM barang, peminjaman WHERE barang.Kode_barang = peminjaman.kode_barang AND
  tanggal_pinjam BETWEEN '$_POST[dari]' AND '$_POST[sampai]'"
);
 while ($hasil = mysql_feth_array($tampil)) {
  $pdf->Cell(8,6,$n0++,1,0,'C');
  $pdf->Cell(30,6,$hasil['kode_barang'],1,0,'C');
  $pdf->Cell(35,6,$hasil['Kode_pinjam'],1,0,'C');
  $pdf->Cell(18,6,$hasil['no_identitas'],1,0,'C');
  $pdf->Cell(18,6,$hasil['jumlah'],1,0,'C');
  $pdf->Cell(18,6,$hasil['tanggal_pinjam'],1,0,'C');
  $pdf->Cell(18,6,$hasil['tanggal_kembali'],1,0,'C');
  $pdf->Cell(18,6,$hasil['keperluan'],1,0,'C');
  }

$pdf->Output();
?>