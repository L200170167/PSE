-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 27, 2020 at 08:56 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jual`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail`
--

DROP TABLE IF EXISTS `tbl_detail`;
CREATE TABLE IF NOT EXISTS `tbl_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_produk_id` int(11) DEFAULT NULL,
  `detail_produk_nama` varchar(100) DEFAULT NULL,
  `detail_harjul` double DEFAULT NULL,
  `detail_jumlah` int(11) DEFAULT NULL,
  `detail_subtotal` double DEFAULT NULL,
  `detail_inv_no` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `detail_inv_no` (`detail_inv_no`),
  KEY `detail_menu_id` (`detail_produk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail`
--

INSERT INTO `tbl_detail` (`detail_id`, `detail_produk_id`, `detail_produk_nama`, `detail_harjul`, `detail_jumlah`, `detail_subtotal`, `detail_inv_no`) VALUES
(1, 2, 'Katun Ima Polos', 16000, 1, 16000, 'INV270620000001');

--
-- Triggers `tbl_detail`
--
DROP TRIGGER IF EXISTS `TG_STOK`;
DELIMITER $$
CREATE TRIGGER `TG_STOK` AFTER INSERT ON `tbl_detail` FOR EACH ROW BEGIN
 UPDATE tbl_produk SET stok=stok-NEW.detail_jumlah
 WHERE produk_id=NEW.detail_produk_id;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info`
--

DROP TABLE IF EXISTS `tbl_info`;
CREATE TABLE IF NOT EXISTS `tbl_info` (
  `id` int(2) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `diskripsi` varchar(250) NOT NULL,
  `penjelasan` varchar(400) NOT NULL,
  `alamat` varchar(450) NOT NULL,
  `nohp` varchar(30) NOT NULL,
  `email` varchar(250) NOT NULL,
  `google` varchar(25) NOT NULL,
  `fb` varchar(25) NOT NULL,
  `twitter` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_info`
--

INSERT INTO `tbl_info` (`id`, `nama`, `diskripsi`, `penjelasan`, `alamat`, `nohp`, `email`, `google`, `fb`, `twitter`) VALUES
(1, 'PT. Textile Sejahtera', 'Merupakan perusahan textile yang memproduksi kain ternama', 'Berdiri sejak 2000 dan berfokus pada pembuatan textile berkualitas', 'Jl Ahmad Yani No Pabelan Kartasura Surakarta 57162 Jawa Tengah Indonesia', '0271 345677', 'textilesejahtera@email.com', 'www.google.com', 'www.fb.com', 'www.twitter.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

DROP TABLE IF EXISTS `tbl_invoice`;
CREATE TABLE IF NOT EXISTS `tbl_invoice` (
  `inv_no` varchar(15) NOT NULL,
  `inv_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `inv_plg_id` int(11) DEFAULT NULL,
  `inv_plg_nama` varchar(80) DEFAULT NULL,
  `inv_status` int(2) NOT NULL DEFAULT 1,
  `inv_total` double DEFAULT NULL,
  PRIMARY KEY (`inv_no`),
  KEY `inv_plg_id` (`inv_plg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`inv_no`, `inv_tanggal`, `inv_plg_id`, `inv_plg_nama`, `inv_status`, `inv_total`) VALUES
('INV270620000001', '2020-06-27 07:34:25', 1, 'Kama', 1, 16000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

DROP TABLE IF EXISTS `tbl_kategori`;
CREATE TABLE IF NOT EXISTS `tbl_kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Kain'),
(2, 'Benang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

DROP TABLE IF EXISTS `tbl_pelanggan`;
CREATE TABLE IF NOT EXISTS `tbl_pelanggan` (
  `plg_id` int(11) NOT NULL AUTO_INCREMENT,
  `plg_nama` varchar(80) DEFAULT NULL,
  `plg_alamat` varchar(60) DEFAULT NULL,
  `plg_notelp` varchar(30) DEFAULT NULL,
  `plg_email` varchar(40) DEFAULT NULL,
  `plg_register` timestamp NULL DEFAULT current_timestamp(),
  `plg_password` varchar(35) DEFAULT NULL,
  `plg_status` int(11) DEFAULT 0,
  PRIMARY KEY (`plg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`plg_id`, `plg_nama`, `plg_alamat`, `plg_notelp`, `plg_email`, `plg_register`, `plg_password`, `plg_status`) VALUES
(1, 'Kama', NULL, NULL, 'kams@id', '2020-06-27 00:55:56', '27a4bf2bb865ec17d3acdc7dba9a6c16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

DROP TABLE IF EXISTS `tbl_pengguna`;
CREATE TABLE IF NOT EXISTS `tbl_pengguna` (
  `pengguna_id` int(11) NOT NULL AUTO_INCREMENT,
  `pengguna_nama` varchar(60) DEFAULT NULL,
  `pengguna_username` varchar(30) DEFAULT NULL,
  `pengguna_password` varchar(35) DEFAULT NULL,
  `pengguna_email` varchar(50) DEFAULT NULL,
  `pengguna_nohp` varchar(30) DEFAULT NULL,
  `pengguna_status` int(2) DEFAULT 1,
  `pengguna_level` varchar(2) DEFAULT NULL,
  `pengguna_photo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`pengguna_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_username`, `pengguna_password`, `pengguna_email`, `pengguna_nohp`, `pengguna_status`, `pengguna_level`, `pengguna_photo`) VALUES
(2, 'Admins', 'admin', '27a4bf2bb865ec17d3acdc7dba9a6c16', 'kama@ad.min', '081277159401', 1, '1', 'file_1481349520.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesan`
--

DROP TABLE IF EXISTS `tbl_pesan`;
CREATE TABLE IF NOT EXISTS `tbl_pesan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  `subjek` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  `isi` varchar(500) COLLATE latin1_general_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_pesan`
--

INSERT INTO `tbl_pesan` (`id`, `nama`, `email`, `subjek`, `isi`, `status`, `time`) VALUES
(2, 'Kams', 'kas@sd.c', 'Test', 'Test Mas', '1', '2020-06-26 22:48:43'),
(3, 'Kams', 'kams@id', 'Test', 'Test ', '0', '2020-06-27 07:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

DROP TABLE IF EXISTS `tbl_produk`;
CREATE TABLE IF NOT EXISTS `tbl_produk` (
  `produk_id` int(11) NOT NULL AUTO_INCREMENT,
  `produk_nama` varchar(100) DEFAULT NULL,
  `produk_deskripsi` varchar(1200) DEFAULT NULL,
  `produk_harga_lama` double NOT NULL DEFAULT 0,
  `produk_harga_baru` double DEFAULT NULL,
  `produk_likes` int(11) DEFAULT 0,
  `stok` int(11) NOT NULL DEFAULT 10,
  `produk_kategori_id` int(11) DEFAULT NULL,
  `produk_kategori_nama` varchar(30) DEFAULT NULL,
  `produk_status` int(11) DEFAULT 1,
  `produk_gambar` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`produk_id`),
  KEY `menu_kategori_id` (`produk_kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`produk_id`, `produk_nama`, `produk_deskripsi`, `produk_harga_lama`, `produk_harga_baru`, `produk_likes`, `stok`, `produk_kategori_id`, `produk_kategori_nama`, `produk_status`, `produk_gambar`) VALUES
(1, 'Katun Supernova', 'Kain Supernova – Supernova, jenis kain yang terbuat dari katun, memiliki tekstur yang halus, lembut, adem dan tidak tembus pandang. Kain ini biasanya digunakan untuk bahan pakaian gamis wanita. Dikarenakan teksturnya yang adem, kain supernova ini bermotif misty, (seperti gerimis).', 21500, 20000, 0, 70, 1, 'Kain', 1, 'file_1593214026.jpg'),
(2, 'Katun Ima Polos', 'Kain katun ima merupakan salah satu jenis kain katun yang mempunyai sifat halus dan rapi. Apabila digunakan menjadi pakaian akan memberikan rasa dingin yang menyejukkan. Kain katun ini memiliki garis-garis kecil dengan warna senada yang menjadi warna dasar kain.', 0, 16000, 0, 69, 1, 'Kain', 1, 'file_1593214175.jpg'),
(3, 'Katun Ima Slub', 'Kain katun Ima Slub merupakan bahan kain katun yang diimpor langsung dari Jepang. Kainnya adem dan cocok untuk bahan baju koko, jilbab dan gamis Syari.', 16000, 15500, 0, 70, 1, 'Kain', 1, 'file_1593214251.jpg'),
(4, 'Katun Ima Royal Platinum', 'Ima Royal Platinum adalah kain dari keluarga katun yang memiliki ciri berupa tekstur kotak-kotak kecil pada permukaan kainnya. Karakteristik kainnya adalah ringan, namun tidak terlalu jatuh.', 90000, 75000, 0, 70, 1, 'Kain', 1, 'file_1593214340.jpg'),
(5, 'Katun Toyobo', 'Bahan Kain katun Toyobo adalah bahan kain yang diimpor langsung dari Jepang, atau istilah lainnya adalah Toyobo Original from Japan. Bahan kain katun Toyobo merupakan kain dengan tekstur yang halus dan lembut. Serat kainnya tidak memiliki ciri-ciri khusus seperti katun Linen atau jenis kain Crepe.', 0, 21500, 0, 70, 1, 'Kain', 1, 'file_1593214402.jpg'),
(6, 'Katun Madinah', 'Kain katun Madinah merupakan kain yang mempunyai ciri ringan, tidak menerawang, dan jatuh. Ketebalan kainnya sangat pas untuk digunakan untuk membuat gamis. Bahan kain ini juga seperti bahan katun yang lainnya yaitu menyerap keringat dan adem ketika digunakan. Sehingga cocok sekali digunakan ketika cuaca panas.', 0, 16000, 0, 70, 1, 'Kain', 1, 'file_1593214466.jpg'),
(8, 'Katun Jepang', 'Sesuai dengan namanya kain katun Jepang merupakan sejenis bahan kain tekstil yang berasal dari Jepang atau dibuat oleh pabrik tekstil diluar negara Jepang yang sudah mendapatkan lisensi resmi dari pemegang hak patennya di Jepang.', 0, 21500, 0, 70, 1, 'Kain', 1, 'file_1593215980.jpg'),
(9, 'Katun Linen Euro', 'Bahan Linen Euro adalah jenis kain katun Linen yang memiliki karakteristik casual, yaitu mudah kusut, kaku, namun adem dan halus. ... Karakter kain yang gampang kusut seperti Linen Euro ini, rupanya memiliki daya tarik tersendiri bagi sebagian orang. Bahannya adem, menyerap keringat dan nyaman ketika dipakai.', 0, 70000, 0, 70, 1, 'Kain', 1, 'file_1593216278.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

DROP TABLE IF EXISTS `tbl_status`;
CREATE TABLE IF NOT EXISTS `tbl_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_nama` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`status_id`, `status_nama`) VALUES
(1, 'Menunggu Konfirmasi'),
(2, 'Menunggu Pembayaran'),
(3, 'Pembayaran Selesai'),
(4, 'Dalam Pembuatan'),
(5, 'Dalam Pengemasan'),
(6, 'Dalam Pengiriman'),
(7, 'Transaksi Selesai');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_detail`
--
ALTER TABLE `tbl_detail`
  ADD CONSTRAINT `tbl_detail_ibfk_1` FOREIGN KEY (`detail_inv_no`) REFERENCES `tbl_invoice` (`inv_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_ibfk_2` FOREIGN KEY (`detail_produk_id`) REFERENCES `tbl_produk` (`produk_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD CONSTRAINT `tbl_invoice_ibfk_1` FOREIGN KEY (`inv_plg_id`) REFERENCES `tbl_pelanggan` (`plg_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD CONSTRAINT `tbl_produk_ibfk_1` FOREIGN KEY (`produk_kategori_id`) REFERENCES `tbl_kategori` (`kategori_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
