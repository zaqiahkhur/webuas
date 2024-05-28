<?php
// require("database.php");
$koneksi = mysqli_connect("localhost", "root", "", "peminjamanbarang") or die;

// session_start();
$xkodebarang=$_POST['kodebarang'];
$xbarang=$_POST['namabarang'];
$xjml=$_POST['jml'];
// var_dump($koneksi);
// $sql="INSERT INTO barang VALUES (null,$kodebarang','$barang','$kategori','$merk','$jumlah')";
$sql="INSERT INTO `barang`(`Kode_barang`, `Nama_barang`, `Jumlah_barang`) VALUES ('$xkodebarang','$xbarang','$xjml')";
$save=mysqli_query($koneksi,$sql);
if($save){
    header("location:barang.php");
}
?>