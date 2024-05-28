<?php
$koneksi = mysqli_connect("localhost", "root", "", "peminjamanbarang") or die;

function getalldata($tablename)
{
  global $koneksi;
  $hasil= mysqli_query($koneksi, "SELECT * FROM $tablename");
   $rows = [];
    while ($row = mysqli_fetch_assoc($hasil)) 
    {
        $rows[] = $row;
    }
    return $rows;
}
  function editdata($tablename,$id)
          {
            global $koneksi;
            $hasil=mysqli_query($koneksi, "select * from $tablename where id = $id");
            return $hasil;
          }
            function updatedata($tabel,$kode,$nama,$jml,$id)
          {
            global $koneksi;
            $sql = "UPDATE $tabel SET Kode_barang = '$kode', nama_barang = '$nama' , Jumlah_barang = '$jml' WHERE id = '$id'";
            $hasil=mysqli_query($koneksi,$sql);
            return $hasil;
          } 
             function updatepeminjaman($tabel,$kodep,$kodeb,$noiden,$jml,$tglp,$tglk,$status,$keperluan,$id)
          {
            global $koneksi;
            $sql = "UPDATE $tabel SET Kode_pinjam = '$kodep', kode_barang = '$kodeb' , no_identitas = '$noiden' , Jumlah_barang = '$jml' , tanggal_pinjam = '$tglp' ,
             tanggal_kembali = '$tglk' , status = '$status' , keperluan = '$keperluan' WHERE id = '$id'";
            $hasil=mysqli_query($koneksi,$sql);
            return $hasil;
          } 
            function updatepeminjam($tabel,$noiden,$nama,$kelas,$jml,$jrs,$id)
          {
            global $koneksi;
            $sql = "UPDATE `$tabel` SET `No_identitas`='$noiden',`Nama`='$nama',`Kelas`='$kelas',`Jurusan`='$jrs' WHERE id ='id'";
            $hasil=mysqli_query($koneksi,$sql);
            return $hasil;
          } 
            function Delete($tablename,$id)
          {
            global $koneksi;
            $hasil=mysqli_query($koneksi,"delete from $tablename where id='$id'");
            return $hasil;
          }
            function jumlah()
          {
            global $koneksi;
            $getBarang=mysqli_query($koneksi,"SELECT COUNT(*) AS jumlah FROM barang") ;
            $rowCount = $getBarang->fetch_assoc();
            $rowCount['jumlah'];
            return $rowCount ;
          }
            function jumlahUser()
          {
            global $koneksi;
            $getuser=mysqli_query($koneksi,"SELECT COUNT(*) AS jumlah FROM peminjam") ;
            $rowCountuser = $getuser->fetch_assoc();
            $rowCountuser['jumlah'];
            return $rowCountuser;
          }
           function jumlahpinjam()
          {
            global $koneksi;
             $getpeminjaman=mysqli_query($koneksi,"SELECT COUNT(*) AS jumlah FROM peminjaman") ;
            $rowCountpeminjaman = $getpeminjaman->fetch_assoc();
            $rowCountpeminjaman['jumlah'];
            return $rowCountpeminjaman;
          } 
          function getTopPinjam() {
    global $koneksi;
    $sql2= mysqli_query($koneksi,"SELECT peminjaman.kode_barang, barang.nama_barang, COUNT(peminjaman.kode_barang) as Jumlah FROM barang INNER JOIN peminjaman ON barang.kode_barang = peminjaman.kode_barang GROUP BY barang.kode_barang, barang.nama_barang;");
    $rows = [];
    while ($row = mysqli_fetch_assoc($sql2)) {
        $rows[] = $row;
    }
    return $rows;
  }
           function kembalikanBarang($id,$jumlah,$kd)
          {
            global $koneksi;
            $updateTanggalKembali = "UPDATE peminjaman AS pm SET pm.tanggal_kembali  = NOW(),
            pm.status='kembali'
             WHERE id = '$id'";
            $excecutionTglkembali=mysqli_query($koneksi,$updateTanggalKembali);
            
            $updatestok="UPDATE barang SET Jumlah_barang  = Jumlah_barang+'$jumlah' WHERE kode_barang = '$kd'";
            $excecutionUpdateStock=mysqli_query($koneksi,$updatestok);
            
            return $excecutionTglkembali;
          }
          function cek_login($username,$password)
          {
            global $koneksi;
            $uname = $username;
            $upass = $password;

            $hasil= mysqli_query($koneksi,"select * from admin where username='$uname' and password='$upass'");
            $cek=mysqli_num_rows($hasil);
            if($cek > 0){
              $sql= mysqli_fetch_array($hasil);
                $_SESSION ['id']=$sql['id'];
                $_SESSION ['username']=$sql['username'];
                $_SESSION['no_identitas']=$sql['no_identitas'];
                $_SESSION ['role']=$sql['role'];
                $_SESSION ['isLogin']='true';
              return $_SESSION;
            }else{
              return false;
            }

          }


?>