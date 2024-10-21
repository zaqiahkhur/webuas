<?php
require_once("fpdf/fpdf.php");
require_once("database.php");
$dari = $_POST['dari'];
$sampai = $_POST['sampai'];
$data=getalldatalaporan('peminjaman', $dari, $sampai);

//membuat pdf
$pdf =new FPDF  ('p','mm','A3');

// $pdf->AddPage(); // Tambahkan kode ini



//membuat halaman baru
$pdf->AddPage();
$pdf->SetFont('helvetica','',16);
$pdf->Image('fpdf/images/logo.jpeg', 10, 10, 30); 
//judul
$pdf->Cell(300,10,'LAPORAN PEMINJAMAN BARANG BAKTI NUSANTARA 666',0,1,'C');
// $pdf->Cell(190,7,"Priode : '$_POST['dari']." s/d ". $_POST['sampai]",0,1,'C');
$pdf->SetLeftMargin(50); // Atur margin kiri
$pdf->SetRightMargin(50); // Atur margin kanan

//judul tabel
$pdf->SetFont('helvetica','',10);
$pdf->Cell(8,6,'No',1,0,'C');
$pdf->Cell(25,6,'Kode Pinjam',1,0,'C');
$pdf->Cell(25,6,'Kode Barang',1,0,'C');
$pdf->Cell(25,6,'No Identitas',1,0,'C');
$pdf->Cell(25,6,'Jumlah Barang',1,0,'C');
$pdf->Cell(40,6,'Tanggal Pinjam',1,0,'C');
$pdf->Cell(40,6,'Tanggal Kembali',1,0,'C');
$pdf->Cell(25,6,'Keperluan',1,0,'C');
$pdf->Ln(); // Tambah jarak antara judul tabel dan kolom

$pdf->SetFont('helvetica','',10);
$no = 1;
foreach ($data as $item) {

  $pdf->Cell(8,6,$no++,1,0,'C');
  $pdf->Cell(25,6,$item['Kode_pinjam'],1,0,'C'); // Perbaiki kolom Kode Pinjam
  $pdf->Cell(25,6,$item['kode_barang'],1,0,'C'); // Perbaiki kolom Kode Barang
  $pdf->Cell(25,6,$item['no_identitas'],1,0,'C');
  $pdf->Cell(25,6,$item['Jumlah_barang'],1,0,'C');
  $pdf->Cell(40,6,date('d-m-Y', strtotime($item['tanggal_pinjam'])),1,0,'C'); // Format tanggal
  $pdf->Cell(40,6,date('d-m-Y', strtotime($item['tanggal_kembali'])),1,0,'C'); // Format tanggal
  $pdf->Cell(25,6,$item['keperluan'],1,0,'C');
     $pdf->Ln();

   }

$pdf->Output();
?>