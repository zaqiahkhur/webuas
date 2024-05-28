<?php
require_once('database.php');
$id =$_GET ['id'];
$jumlah=$_GET['Jumlah_barang'];   
$kd=$_GET['kd']; 
$data= kembalikanBarang($id,$jumlah,$kd);
if($data){
    header("location:peminjaman.php");
}

?>