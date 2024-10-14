<?php
// require("database.php");
$koneksi = mysqli_connect("localhost", "root", "", "peminjamanbarang") or die;

// session_start();
$xnama=$_POST['nama'];
$password=$_POST['password'];

$xunitkerja=$_POST['unitkerja'];
$xrole=$_POST['role'];
// var_dump($koneksi);
// $sql="INSERT INTO barang VALUES (null,$kodebarang','$barang','$kategori','$merk','$jumlah')";
$sql="INSERT INTO `admin`(`id`, `username`, `password`, `Unit_kerja`, `role`) 
VALUES (null,'$xnama','$password','$xunitkerja','$xrole')";
$save=mysqli_query($koneksi,$sql);
if($save){
    header("location:admin.php");
}
?>