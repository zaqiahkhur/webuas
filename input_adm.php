<?php
// require("database.php");
$koneksi = mysqli_connect("localhost", "root", "", "peminjamanbarang") or die;

// session_start();
$xnamaleng=$_POST['namal'];
$xnama=$_POST['nama'];
$password=$_POST['password'];
$xnoidentitas=$_POST['no_identitas'];
$xunitkerja=$_POST['unitkerja'];
$xrole=$_POST['role'];

// var_dump($koneksi);
// $sql="INSERT INTO barang VALUES (null,$kodebarang','$barang','$kategori','$merk','$jumlah')";
$sql="INSERT INTO `admin`(`id`, `no_identitas`, `nama_lengkap`, `username`, `password`, `Unit_kerja`, `role`) 
VALUES (null,'$xnoidentitas','$xnamaleng','$xnama','$password','$xunitkerja','$xrole')";
$save=mysqli_query($koneksi,$sql);
if($save){
    header("location:admin.php");
}
?>