<?php
// require("database.php");
$koneksi = mysqli_connect("localhost", "root", "", "peminjamanbarang") or die;

// session_start();
$xkodepinjam=$_POST['kodepinjam'];
$xkodebarang=$_POST['kodebarang'];
$xnoiden=$_POST['noiden'];
$xjmlbrg=$_POST['jml'];
$xtglpinjam=$_POST['tglpinjam'];
$xtglkembali=$_POST['tglkembali'];
$xstatus=$_POST['status'];
$xkeperluan=$_POST['keperluan'];
// var_dump($koneksi);
// $sql="INSERT INTO barang VALUES (null,$kodebarang','$barang','$kategori','$merk','$jumlah')";
$sql="INSERT INTO `peminjaman`(`Kode_pinjam`, `kode_barang`, `no_identitas`, `Jumlah_barang`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `keperluan`) VALUES 
('$xkodepinjam','$xkodebarang','$xnoiden','$xjmlbrg','$xtglpinjam','$xtglkembali','$xstatus','$xkeperluan')";
$save=mysqli_query($koneksi,$sql);
if($save){
    header("location:peminjaman.php");
}
?>  