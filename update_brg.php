<?php
 require_once("database.php");
 $id=$_POST['id'];
 $xbrg = $_POST['kodeBarang'];
 $nama_brg =$_POST['namabarang'];
 $jumlah =$_POST['jml'];

 $sql2=updatedata("barang",$xbrg,$nama_brg,$jumlah,$id);
 //var_dump ($sql2);
 if ($sql2) {
    header("location:barang.php");
 }
?>
