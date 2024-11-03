<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "peminjamanbarang") or die;

// Mengambil data dari POST
$xkodebarang = $_POST['kodebarang'];
$xbarang = $_POST['namabarang'];    
$xjml = $_POST['jml'];

// Mengecek apakah kode barang sudah ada
$cek_sql = "SELECT * FROM `barang` WHERE `nama_barang` = '$xbarang'";
$cek_result = mysqli_query($koneksi, $cek_sql);

if(mysqli_num_rows($cek_result) > 0) {
    // Jika kode barang sudah ada, tampilkan pesan error
   echo "<script>alert('Data gagal di input');location='barang.php';</script>";
} else {
    // Jika kode barang belum ada, lakukan INSERT
    $sql = "INSERT INTO `barang`(`Kode_barang`, `nama_barang`, `Jumlah_barang`) VALUES 
    ('$xkodebarang','$xbarang','$xjml')";
    $save = mysqli_query($koneksi, $sql);
    if($save) {
        header("location:barang.php");
    } else {
        echo "Terjadi kesalahan saat menyimpan data.";
    }
}
?>
