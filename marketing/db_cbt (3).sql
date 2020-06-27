-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2018 at 02:53 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

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
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `nama_admin` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`nama_admin`, `username`, `password`) VALUES
('admin', 'admin', 'admin'),
('mutiara rizkyna', 'mutiara', 'mutiara123'),
('rei', 'rei', 'rei');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(4) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `id_kategori`, `kategori`) VALUES
(1, 'k001', 'Makanan Ringan'),
(2, 'k002', 'Frozen Food');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_pemasukan` int(11) NOT NULL,
  `kode_pemasukan` varchar(10) NOT NULL,
  `id` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id_pemasukan`, `kode_pemasukan`, `id`, `jumlah`, `tgl_masuk`) VALUES
(1, 'p001', 1, 5, '2018-04-10 02:13:59'),
(2, 'p002', 1, 5, '2018-04-10 02:43:15'),
(3, 'p003', 6, 10, '2018-04-10 02:53:52'),
(4, 'p004', 7, 1, '2018-04-10 03:52:00');

--
-- Triggers `tbl_pembelian`
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
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `id` int(20) NOT NULL,
  `kode_penjualan` int(10) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tgl_pesan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`id`, `kode_penjualan`, `kode_barang`, `nama_barang`, `username`, `jumlah`, `harga`, `status`, `tgl_pesan`) VALUES
(1, 10, 'b001', 'Balung Kuwuk', 'jm', 2, 10000, 'Belum dikirim', '2018-04-11 06:53:04'),
(2, 10, 'b002', 'Rolanch', 'jm', 2, 20000, 'Belum dikirim', '2018-04-11 06:53:04'),
(3, 14, 'b007', 'Risoles lovelin', 'user', 2, 30000, 'Belum dikirim', '2018-04-11 07:05:40'),
(4, 14, 'b001', 'Balung Kuwuk', 'user', 3, 10000, 'Belum dikirim', '2018-04-11 07:05:40');

--
-- Triggers `tbl_penjualan`
--
DELIMITER $$
CREATE TRIGGER `batal_jual` AFTER DELETE ON `tbl_penjualan` FOR EACH ROW BEGIN
UPDATE tbl_stok
SET jumlah = jumlah + OLD.jumlah
WHERE 
kode_barang = OLD.kode_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `jual_barang` AFTER INSERT ON `tbl_penjualan` FOR EACH ROW BEGIN
UPDATE tbl_stok 
SET jumlah= jumlah - NEW.jumlah
WHERE
kode_barang = NEW.kode_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stok`
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
-- Dumping data for table `tbl_stok`
--

INSERT INTO `tbl_stok` (`id`, `kode_barang`, `nama_barang`, `harga`, `id_kategori`, `deskripsi`, `jumlah`, `gambar`) VALUES
(1, 'b001', 'Balung Kuwuk', 10000, 'k001', 'makanan ringan guruh dan halal', 24, '1.jpg'),
(2, 'b002', 'Rolanch', 20000, 'k001', 'terbuat dari ikan bilis yang gurih', 14, '2.jpg'),
(3, 'b003', 'Macabro.id', 12000, 'k001', 'never ending bites', 14, '3.jpg'),
(4, 'b004', 'Tri li li', 14000, 'k001', 'mie kremezzzz yang enak', 12, '4.jpg'),
(5, 'b005', 'Mamade', 160000, 'k001', 'makaroni berbagai rasa', 50, '5.jpg'),
(6, 'b006', 'Lele matrix', 19000, 'k001', 'Stik duri lele', 48, '6.jpg'),
(7, 'b007', 'Risoles lovelin', 30000, 'k002', 'Makanan beku', 29, 'gambar3.jpg'),
(8, 'b008', 'Kerupuk kornet sapi', 15000, 'k001', 'Kerupuk dari kornet sapi asli bogor', 123, 'gambar4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_struk`
--

CREATE TABLE `tbl_struk` (
  `kode_penjualan` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_struk`
--

INSERT INTO `tbl_struk` (`kode_penjualan`, `username`, `gambar`, `tanggal_upload`) VALUES
('6', 'jm', '1.jpg', '2018-04-11 06:47:51'),
('7', 'jm', '1.jpg', '2018-04-11 06:47:59'),
('8', 'jm', '1.jpg', '2018-04-11 06:48:18'),
('9', 'jm', '2.jpg', '2018-04-11 06:48:29'),
('2', 'user', '6.jpg', '2018-04-11 06:54:25'),
('3', 'user', '6.jpg', '2018-04-11 06:54:31'),
('4', 'user', '6.jpg', '2018-04-11 06:55:01'),
('5', 'user', 'gambar4.jpg', '2018-04-11 06:55:10'),
('6', 'user', 'gambar4.jpg', '2018-04-11 06:58:38'),
('12', 'user', 'gambar4.jpg', '2018-04-11 07:02:32'),
('13', 'user', 'gambar4.jpg', '2018-04-11 07:03:19'),
('14', 'user', '1.jpg', '2018-04-11 07:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimoni`
--

CREATE TABLE `tbl_testimoni` (
  `id_testi` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_telp` int(20) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`nama_user`, `username`, `password`, `no_telp`, `jenis_kelamin`, `alamat`) VALUES
('jm', 'jm', 'jm', 123, 'laki-laki', 'bogor'),
('user', 'user', 'user', 98765432, 'laki-laki', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indexes for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stok`
--
ALTER TABLE `tbl_stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  ADD PRIMARY KEY (`id_testi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  MODIFY `id_testi` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
