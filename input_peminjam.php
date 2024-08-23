<?php
// require("database.php");
$koneksi = mysqli_connect("localhost", "root", "", "peminjamanbarang") or die;

// session_start();
$xkodebarang=$_POST['noidentitas'];
$xbarang=$_POST['nama'];
$xjml=$_POST['kelas'];
$xjrs=$_POST['jrs'];
// var_dump($koneksi);
// $sql="INSERT INTO barang VALUES (null,$kodebarang','$barang','$kategori','$merk','$jumlah')";
$sql="INSERT INTO `peminjam`(`id`, `No_identitas`, `Nama`, `Kelas`, `Jurusan`) VALUES (null,'$xkodebarang','$xbarang','$xjml','$xjrs')";
$save=mysqli_query($koneksi,$sql);
if($save){
    header("location:peminjam.php");
}
?>