<?php
// require("database.php");
$koneksi = mysqli_connect("localhost", "root", "", "peminjamanbarang") or die;

// session_start();
$xnama=$_POST['nama'];
$xemail=$_POST['email'];
$xunitkerja=$_POST['unitkerja'];
$xjabatan=$_POST['jabatan'];
// var_dump($koneksi);
// $sql="INSERT INTO barang VALUES (null,$kodebarang','$barang','$kategori','$merk','$jumlah')";
$sql="INSERT INTO `admin`(`id`, `Nama`, `Email`, `Unit_kerja`, `Jabatan`) VALUES
 (null,'$xnama','$xemail','$xunitkerja','$xjabatan')";
$save=mysqli_query($koneksi,$sql);
if($save){
    header("location:admin.php");
}
?>