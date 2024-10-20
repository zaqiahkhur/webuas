-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Okt 2024 pada 09.26
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peminjamanbarang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `no_identitas` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Unit_kerja` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `no_identitas`, `username`, `password`, `Unit_kerja`, `role`) VALUES
(1, 2, 'qias', '123', 'SMK', 'admin'),
(3, 0, 'udin', '1234', 'SMP', 'admin'),
(4, 0, 'yuyus', '1309', 'SMK', 'admin'),
(7, 7, 'loli', '1234', 'smk', 'member'),
(12, 8, 'abdul', '1234', 'SMK', 'member'),
(13, 13, 'kaka', '1209', 'SMK', 'member'),
(16, 0, 'rara', '123', 'SMK', 'admin'),
(17, 0, 'risaaa', '1234', 'SMP', 'admin'),
(20, 10, 'lala', '0909', 'SMK', 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `Kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `Jumlah_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `Kode_barang`, `nama_barang`, `Jumlah_barang`) VALUES
(14, '5678', 'bola baskett', '10'),
(29, '2346', 'bola voli', '38'),
(33, '1290', 'Terminal', '2'),
(39, '1213', 'proyektor', '5'),
(40, '', 'bola futsal', '10'),
(41, 'BRG009', 'laptop', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `Kode_pinjam` varchar(50) NOT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `no_identitas` int(11) NOT NULL,
  `Jumlah_barang` int(11) NOT NULL,
  `tanggal_pinjam` datetime NOT NULL,
  `tanggal_kembali` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `keperluan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `Kode_pinjam`, `kode_barang`, `no_identitas`, `Jumlah_barang`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `keperluan`) VALUES
(1, '1254', '234', 1, 1, '2024-05-07 00:00:00', '2024-09-11 08:27:46', 'kembali', 'belajarrr'),
(2, '125', '567A', 1, 2, '2024-05-01 00:00:00', '2024-05-02 00:00:00', 'belum kembali', 'belajar'),
(19, '123', '5678', 2, 3, '2024-05-14 00:00:00', '2024-05-26 00:00:00', 'kembali', 'praktik'),
(20, '80', '910', 3, 5, '2024-05-27 00:00:00', '2024-05-26 00:00:00', 'kembali', 'duduk'),
(22, '009', '2346', 3, 13, '2024-05-23 00:00:00', '2024-09-11 08:28:21', 'kembali', 'olahraga'),
(23, '125', '2346', 2, 14, '2024-05-29 00:00:00', '2024-05-29 00:00:00', 'kembali', 'olahraga'),
(24, '125', '123', 2, 12, '2024-05-31 00:00:00', '2024-05-29 00:00:00', 'belum kembali', 'olahraga'),
(25, '123456', '2346', 0, 0, '2024-05-06 00:00:00', '2024-05-29 00:00:00', 'kembali', '-'),
(26, '125', '2346', 2, 2, '2024-05-29 00:00:00', '2024-05-29 00:00:00', 'kembali', '-'),
(27, '125', '2346', 2, 12, '2024-05-28 00:00:00', '2024-05-29 00:00:00', 'kembali', '-'),
(32, 'PMJ001', '2346', 0, 3, '2024-06-04 00:00:00', '2024-06-06 00:00:00', 'belum kembali', '-'),
(33, 'PMJ002', '2346', 0, 3, '2024-06-05 00:00:00', '2024-06-07 00:00:00', 'belum kembali', '-'),
(34, 'PMJ003', '2346', 0, 3, '2024-06-04 00:00:00', '2024-06-10 00:00:00', 'kembali', '-'),
(35, 'PMJ004', '2346', 2, 1, '2024-06-04 00:00:00', '2024-06-11 00:00:00', ' kembali', '-'),
(36, 'PMJ005', '1290', 3, 3, '2024-06-05 00:00:00', '2024-06-07 00:00:00', 'belum kembali', '-'),
(37, 'PMJ006', '1290', 3, 3, '2024-06-11 00:00:00', '2024-06-03 00:00:00', 'kembali', '-'),
(38, 'PMJ007', '1290', 3, 3, '2024-06-03 00:00:00', '2024-06-04 00:00:00', 'kembali', '-'),
(46, 'PMJ008', '1290', 3, 3, '2024-06-04 00:00:00', '2024-06-04 00:00:00', 'kembali', '-'),
(47, '', '099', 2, 3, '2024-06-04 00:00:00', '2024-06-05 00:00:00', 'belum kembali', 'praktik'),
(48, 'PMJ009', '1213', 2, 2, '2024-07-31 00:00:00', '2024-07-31 00:00:00', 'kembali', '-'),
(49, 'PMJ010', '1213', 7, 3, '2024-08-04 00:00:00', '2024-08-06 00:00:00', 'belum kembali', '-'),
(50, 'PMJ011', '1213', 7, 1, '2024-08-04 00:00:00', '2024-08-09 00:00:00', 'belum kembali', '-'),
(51, 'PMJ012', '1290', 7, 10, '2024-08-04 00:00:00', '2024-08-10 00:00:00', 'belum kembali', '-'),
(52, 'PMJ013', '1213', 1, 3, '2024-08-23 21:29:22', '2024-08-23 21:29:46', 'kembali', '-'),
(53, 'PMJ014', '5678', 0, 3, '2024-09-07 10:42:24', '2024-09-07 10:42:54', 'kembali', '-'),
(54, 'PMJ015', '5678', 0, 3, '2024-09-07 11:27:05', '2024-09-07 11:29:54', 'kembali', '-'),
(55, 'PMJ016', '5678', 0, 3, '2024-09-07 11:30:30', '2024-09-07 12:07:11', 'kembali', ''),
(56, 'PMJ017', '5678', 7, 3, '2024-09-07 12:07:41', '2024-09-08 22:22:34', 'kembali', ''),
(57, '', '5678', 2, 3, '2024-09-09 22:26:41', '2024-09-10 00:00:00', 'belum kembali', '-'),
(58, 'PMJ018', '5678', 8, 12, '2024-09-11 08:54:28', '2024-09-11 22:54:58', 'kembali', 'belajar'),
(59, 'PMJ019', '5678', 13, 4, '2024-10-14 21:51:26', '2024-10-14 21:51:50', 'kembali', '-'),
(60, 'PMJ020', '5678', 8, 3, '2024-10-14 22:34:06', '2024-10-14 22:35:30', 'kembali', '-');

--
-- Trigger `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `ambil_barang` AFTER INSERT ON `peminjaman` FOR EACH ROW BEGIN
UPDATE barang SET Jumlah_barang = Jumlah_barang -NEW.Jumlah_barang WHERE Kode_barang = NEW.Kode_barang;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
