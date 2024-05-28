<?php
 require_once("database.php");
 $id=$_POST['id'];
 $xbrg = $_POST['noidentitas'];
 $nama_brg =$_POST['nama'];
 $jumlah =$_POST['kelas'];
$jrs =$_POST['jrs'];

 $sql2=updatepeminjam("peminjam",$xbrg,$nama_brg,$jumlah,$id,$jrs);
 var_dump ($sql2);
 if ($sql2) {
    header("location:peminjam.php");
 }
?>