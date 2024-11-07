<?php
require_once('database.php');
$id =$_GET ['id'];
$jumlah=$_GET['Jumlah_barang'];   
$kd=$_GET['kd']; 

$query = "UPDATE peminjaman SET status='Kembali' WHERE id = $id";
$data = mysqli_query($koneksi, $query);

if ($data) {
    header("Location: peminjaman.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}

?>