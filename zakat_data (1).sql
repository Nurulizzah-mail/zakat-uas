-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2025 pada 06.28
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakat_data`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hargaberas`
--

CREATE TABLE `hargaberas` (
  `id` int(7) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id` int(7) NOT NULL,
  `jumlahjiwa` int(7) NOT NULL,
  `jeniszakat` varchar(10) NOT NULL,
  `nama` int(10) NOT NULL,
  `metodepembayaran` varchar(10) NOT NULL,
  `nominaldibayar` int(10) NOT NULL,
  `kembalian` int(10) NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  `tanggal bayar` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_zakat`
--

CREATE TABLE `tb_zakat` (
  `id` int(7) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jeniszakat` varchar(15) NOT NULL,
  `totalbayar` bigint(10) NOT NULL,
  `tanggalbayar` datetime(6) NOT NULL,
  `jumlahjiwa` int(10) NOT NULL,
  `metode` varchar(255) NOT NULL,
  `dibayar` int(15) NOT NULL,
  `kembalian` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_zakat`
--

INSERT INTO `tb_zakat` (`id`, `nama`, `jeniszakat`, `totalbayar`, `tanggalbayar`, `jumlahjiwa`, `metode`, `dibayar`, `kembalian`) VALUES
(1, 'nurul', 'fitrah', 100, '2025-06-04 10:44:26.000000', 1, 'cash', 100, 10),
(2, 'kentang', 'Zakat Fitrah', 350000, '2025-06-21 10:49:00.000000', 10, 'Goreng', 1000, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_zakat`
--
ALTER TABLE `tb_zakat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_zakat`
--
ALTER TABLE `tb_zakat`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
