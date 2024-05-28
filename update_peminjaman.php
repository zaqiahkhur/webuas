<?php
 require_once("database.php");
 $id=$_POST['id'];
 $xbrg = $_POST['kodepinjam'];
 $kbrg = $_POST['kodebarang'];
 $noiden =$_POST['noiden'];
 $jml = $_POST['jmlbrg'];
 $tglp =$_POST['tglpinjam'];
 $tglk = $_POST['tglkembali'];
 $status = $_POST['status'];
 $keperluan = $_POST['keperluan'];

 $sql2=updatepeminjaman("peminjaman",$xbrg,$kbrg,$noiden,$jml,$tglp,$tglk,$status,$keperluan,$id);
 if ($sql2) {
    header("location:peminjaman.php");
 }
?>
