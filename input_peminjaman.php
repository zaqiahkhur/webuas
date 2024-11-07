<?php
// require("database.php");
$koneksi = mysqli_connect("localhost", "root", "", "peminjamanbarang") or die("Gagal terhubung ke database");

// session_start();
$xkodepinjam = $_POST['kodepinjam'];
$xkodebarang = $_POST['kodebarang'];
$xnoiden = $_POST['noiden'];
$xjmlbrg = $_POST['jml'];
$xtglkembali = $_POST['tglkembali'];
$xstatus = $_POST['status'];
$xkeperluan = $_POST['keperluan'];

// Cek jumlah stok barang yang tersedia
$queryStok = "SELECT Jumlah_barang FROM barang WHERE kode_barang = '$xkodebarang'";
$resultStok = mysqli_query($koneksi, $queryStok);
$dataStok = mysqli_fetch_assoc($resultStok);
$stokTersedia = $dataStok['Jumlah_barang'];

// Jika jumlah barang yang dipinjam lebih besar dari stok yang tersedia
if ($xjmlbrg > $stokTersedia) {
    // Tampilkan alert bahwa jumlah barang melebihi stok
    echo "<script>alert('Jumlah barang yang dipinjam melebihi jumlah stok yang tersedia.');location='peminjaman.php';</script>";
} else {
    // Query untuk menyimpan data ke tabel peminjaman
    $sql = "INSERT INTO `peminjaman`(`Kode_pinjam`, `kode_barang`, `no_identitas`, `Jumlah_barang`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `keperluan`) VALUES 
    ('$xkodepinjam','$xkodebarang','$xnoiden','$xjmlbrg',now(),'$xtglkembali','$xstatus','$xkeperluan')";

    $save = mysqli_query($koneksi, $sql);

    if ($save) {
        // Jika data berhasil disimpan, redirect ke halaman peminjaman
        header("location:peminjaman.php");
    } else {
        // Jika ada error, tampilkan alert
        echo "<script>alert('Terjadi kesalahan saat menyimpan data');location='peminjaman.php';</script>";
    }
}
?>
