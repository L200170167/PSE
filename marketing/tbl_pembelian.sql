-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2020 pada 09.01
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cbt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_pemasukan` int(11) NOT NULL,
  `kode_pemasukan` varchar(10) NOT NULL,
  `id` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id_pemasukan`, `kode_pemasukan`, `id`, `jumlah`, `tgl_masuk`) VALUES
(1, 'p001', 1, 5, '2018-04-10 02:13:59'),
(2, 'p002', 1, 5, '2018-04-10 02:43:15'),
(3, 'p003', 6, 10, '2018-04-10 02:53:52'),
(4, 'p004', 7, 1, '2018-04-10 03:52:00');

--
-- Trigger `tbl_pembelian`
--
DELIMITER $$
CREATE TRIGGER `batal_tambah` AFTER DELETE ON `tbl_pembelian` FOR EACH ROW BEGIN
UPDATE tbl_stok
SET jumlah=jumlah-OLD.jumlah
WHERE
id = OLD.id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_barang` AFTER INSERT ON `tbl_pembelian` FOR EACH ROW BEGIN
INSERT INTO tbl_stok SET
id = NEW.id, jumlah=NEW.jumlah
ON DUPLICATE KEY UPDATE jumlah=jumlah+NEW.jumlah;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
