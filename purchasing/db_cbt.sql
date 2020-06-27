-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 09:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

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
-- Table structure for table `tbl_bukti`
--

CREATE TABLE `tbl_bukti` (
  `id` int(11) NOT NULL,
  `kode_penjualan` int(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `no_resi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bukti`
--

INSERT INTO `tbl_bukti` (`id`, `kode_penjualan`, `nama_user`, `no_resi`) VALUES
(19, 1, 'Bpk JM', 'JPH110032111');

--
-- Triggers `tbl_bukti`
--
DELIMITER $$
CREATE TRIGGER `ganti_status` AFTER INSERT ON `tbl_bukti` FOR EACH ROW BEGIN
UPDATE tbl_penjualan SET `status`='terkirim' WHERE kode_penjualan = NEW.kode_penjualan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ganti_status2` AFTER DELETE ON `tbl_bukti` FOR EACH ROW BEGIN
UPDATE tbl_penjualan SET `status`='belum terkirim' WHERE kode_penjualan = OLD.kode_penjualan;
END
$$
DELIMITER ;

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
(1, 'k001', 'Katun');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_pemasukan` int(11) NOT NULL,
  `kode_pemasukan` varchar(10) NOT NULL,
  `id` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `tgl_pesan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`id`, `kode_penjualan`, `kode_barang`, `nama_barang`, `username`, `jumlah`, `harga`, `status`, `tgl_pesan`) VALUES
(27, 1, 'b005', 'Katun toyobo', 'jm', 1, 1000000, 'terkirim', '2020-06-24 14:57:51'),
(29, 2, 'b005', 'Katun toyobo', 'jm', 1, 1000000, 'Belum dikirim', '2020-06-25 17:57:38');

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
(1, 'b001', 'Katun Supernova', 1000000, 'k001', 'Harga per roll\r\nbahan katun enak dipakai', 32, 'bahan-katun-bambu-950x703.jpg'),
(2, 'b002', 'Katun ima polos', 800000, 'k001', 'Harga per roll', 16, 'Kain-Katun-Viscose.jpg'),
(3, 'b003', 'Katun ima slub', 1000000, 'k001', 'Harga per roll', 10, 'Bahan-katun-Ima-Royal-Platinum-berkualitas-by-Mizutex.jpg'),
(4, 'b004', 'Katun ima platinum', 900000, 'k001', 'Harga per roll', 10, '100-CM-140-Cm-Bahan-Katun-Linen-untuk-Sprei-Jahit-Elegan-Hijau-Kain-Linen-Kapas.jpg'),
(5, 'b005', 'Katun toyobo', 1000000, 'k001', 'Harga per roll', 8, 'Jersey.jpg'),
(6, 'b006', 'Katun madinah', 1000000, 'k001', 'harga per roll', 0, 'hipwee-katun-640x416.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_struk`
--

CREATE TABLE `tbl_struk` (
  `kode_penjualan` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_struk`
--

INSERT INTO `tbl_struk` (`kode_penjualan`, `username`, `gambar`, `tanggal_upload`) VALUES
('1', 'jm', 'bukti.JPG', '2020-06-24 00:47:33');

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

--
-- Dumping data for table `tbl_testimoni`
--

INSERT INTO `tbl_testimoni` (`id_testi`, `nama`, `email`, `komentar`) VALUES
(1, 'user', 'user@gmail.com', 'hahahaha');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `no_telp` int(20) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kode` varchar(225) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`nama_user`, `username`, `password`, `email`, `no_telp`, `jenis_kelamin`, `alamat`, `kode`, `status`) VALUES
('Bpk JM', 'jm', 'jm', 'reinandyf@gmail.cm', 123, 'laki-laki', 'bogor', '', 'S'),
('qq', 'qq', 'qq', 'reinandyf@gmail.com', 988909, 'laki-laki', 'sjaha', 'CSwIr', 'T'),
('userrrrrrrrrrr', 'user', 'user', 'user@gmail.com', 98765432, 'laki-laki', 'user', '', 'S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_resi` (`no_resi`),
  ADD UNIQUE KEY `kode_penjualan` (`kode_penjualan`);

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
-- Indexes for table `tbl_struk`
--
ALTER TABLE `tbl_struk`
  ADD PRIMARY KEY (`kode_penjualan`),
  ADD UNIQUE KEY `gambar` (`gambar`);

--
-- Indexes for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  ADD PRIMARY KEY (`id_testi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  MODIFY `id_testi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
