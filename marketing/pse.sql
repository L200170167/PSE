-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2020 pada 14.09
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
-- Database: `pse`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `nama_admin` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`nama_admin`, `username`, `password`) VALUES
('admin', 'admin', 'admin'),
('mutiara rizkyna', 'mutiara', 'mutiara123'),
('rei', 'rei', 'rei');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(4) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `id_kategori`, `kategori`) VALUES
(1, 'k001', 'Makanan Ringan'),
(2, 'k002', 'Frozen Food');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_stok`
--

CREATE TABLE `tbl_stok` (
  `id` int(4) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` int(20) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `jumlah` int(3) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_stok`
--

INSERT INTO `tbl_stok` (`id`, `kode_barang`, `nama_barang`, `harga`, `id_kategori`, `deskripsi`, `jumlah`, `gambar`) VALUES
(2, 'b002', 'Katun Supernova', 20000, 'k001', 'super tebal', 5, 'katun1.jpg'),
(3, 'b003', 'Katun Ima Polos', 12000, 'k001', 'never ending bites', 15, 'katun2.jpg'),
(4, 'b004', 'Katun Ima Slub', 14000, 'k001', 'mie kremezzzz yang enak', 12, 'katun3.jpg'),
(5, 'b005', 'Katun Ima Royal Platinum', 160000, 'k001', 'makaroni berbagai rasa', 50, 'katun4.jpg'),
(6, 'b006', 'Katun Toyobo', 19000, 'k001', 'Stik duri lele', 50, 'katun5.jpg'),
(7, 'b007', 'Katun Madinah', 30000, 'k002', 'Makanan beku', 19, 'katun6.jpg'),
(8, 'b008', 'Katun Linen Euro', 15000, 'k001', 'Kerupuk dari kornet sapi asli bogor', 119, 'katun7.jpg'),
(11, 'b003', 'Katun Jepang', 20000, 'k003', 'katun dengan kualitas lembut', 3, 'katun8.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indeks untuk tabel `tbl_stok`
--
ALTER TABLE `tbl_stok`
  ADD PRIMARY KEY (`id`);

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
