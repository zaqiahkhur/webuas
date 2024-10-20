<?php
// Include function yang berisi koneksi dan query
include 'database.php'; // Pastikan file ini berisi function yang sudah kita buat

// Cek apakah form dikirim dengan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $dari = $_POST['dari'];
    $sampai = $_POST['sampai'];

    // Ambil data peminjaman berdasarkan rentang tanggal
    $dataPeminjaman = ambilDataPeminjaman($dari, $sampai);

    // Tampilkan hasilnya
    tampilkanDataPeminjaman($dataPeminjaman);
}
?>
