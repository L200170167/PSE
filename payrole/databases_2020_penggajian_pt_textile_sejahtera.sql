-- --------------------------------------------------------
-- Host:                         127.1.1.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table databases_2020_penggajian_pt_textile_sejahtera.data_admin
CREATE TABLE IF NOT EXISTS `data_admin` (
  `id_admin` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databases_2020_penggajian_pt_textile_sejahtera.data_admin: ~0 rows (approximately)
DELETE FROM `data_admin`;
/*!40000 ALTER TABLE `data_admin` DISABLE KEYS */;
INSERT INTO `data_admin` (`id_admin`, `username`, `password`) VALUES
	('ADM001', 'admin', '21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `data_admin` ENABLE KEYS */;

-- Dumping structure for table databases_2020_penggajian_pt_textile_sejahtera.data_jabatan
CREATE TABLE IF NOT EXISTS `data_jabatan` (
  `id_jabatan` varchar(10) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databases_2020_penggajian_pt_textile_sejahtera.data_jabatan: ~0 rows (approximately)
DELETE FROM `data_jabatan`;
/*!40000 ALTER TABLE `data_jabatan` DISABLE KEYS */;
INSERT INTO `data_jabatan` (`id_jabatan`, `jabatan`) VALUES
	('JAB001', 'OB');
/*!40000 ALTER TABLE `data_jabatan` ENABLE KEYS */;

-- Dumping structure for table databases_2020_penggajian_pt_textile_sejahtera.data_karyawan
CREATE TABLE IF NOT EXISTS `data_karyawan` (
  `id_karyawan` varchar(10) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `kpj` varchar(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `periode_kepesertaan` int(10) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databases_2020_penggajian_pt_textile_sejahtera.data_karyawan: ~3 rows (approximately)
DELETE FROM `data_karyawan`;
/*!40000 ALTER TABLE `data_karyawan` DISABLE KEYS */;
INSERT INTO `data_karyawan` (`id_karyawan`, `nik`, `kpj`, `nama`, `status_perkawinan`, `tanggal_lahir`, `periode_kepesertaan`, `jabatan`, `username`, `password`) VALUES
	('KAR001', '123', '123', '123', '123', '2019-01-14', 123, 'OB', '123', '202cb962ac59075b964b07152d234b70'),
	('KAR002', 'wer', 'wer', 'wer', 'wer', '2019-01-26', 0, 'OB', 'wer', '22c276a05aa7c90566ae2175bcc2a9b0'),
	('KAR003', '321312313', '213121', 'Umar', 'Jomblo', '1997-06-25', 2019, 'OB', 'umar', '92deb3f274aaee236194c05729bfa443');
/*!40000 ALTER TABLE `data_karyawan` ENABLE KEYS */;

-- Dumping structure for table databases_2020_penggajian_pt_textile_sejahtera.data_pembagian_gaji
CREATE TABLE IF NOT EXISTS `data_pembagian_gaji` (
  `id_pembagian_gaji` varchar(10) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `sistem_perhitungan_gaji` tinytext NOT NULL,
  `gaji` int(10) NOT NULL,
  `potongan_uang_makan_harian` int(10) NOT NULL,
  `potongan_tidak_masuk_kerja` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databases_2020_penggajian_pt_textile_sejahtera.data_pembagian_gaji: ~0 rows (approximately)
DELETE FROM `data_pembagian_gaji`;
/*!40000 ALTER TABLE `data_pembagian_gaji` DISABLE KEYS */;
INSERT INTO `data_pembagian_gaji` (`id_pembagian_gaji`, `jabatan`, `sistem_perhitungan_gaji`, `gaji`, `potongan_uang_makan_harian`, `potongan_tidak_masuk_kerja`) VALUES
	('PEM001', 'OB', 'bulanan\r\n', 5000000, 15000, 20000);
/*!40000 ALTER TABLE `data_pembagian_gaji` ENABLE KEYS */;

-- Dumping structure for table databases_2020_penggajian_pt_textile_sejahtera.data_profil
CREATE TABLE IF NOT EXISTS `data_profil` (
  `id_profil` varchar(10) NOT NULL,
  `tentang_perusahaan` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `no_telepon` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databases_2020_penggajian_pt_textile_sejahtera.data_profil: ~0 rows (approximately)
DELETE FROM `data_profil`;
/*!40000 ALTER TABLE `data_profil` DISABLE KEYS */;
INSERT INTO `data_profil` (`id_profil`, `tentang_perusahaan`, `visi`, `misi`, `nama`, `gambar`, `no_telepon`, `email`, `alamat`, `deskripsi`) VALUES
	('PRO001', 'PT. Textile Sejahtera ', 'PT. Textile Sejahtera ', 'PT. Textile Sejahtera ', 'PT. Textile Sejahtera ', 'slide_a.png', '0271345677', 'textilesejahtera@gmail.com', 'Jl. A Yani Pabelan Kartasura Surakarta 57102 Jawa Tengah - Indonesia', 'Toko Tekstil');
/*!40000 ALTER TABLE `data_profil` ENABLE KEYS */;

-- Dumping structure for table databases_2020_penggajian_pt_textile_sejahtera.data_telah_digaji
CREATE TABLE IF NOT EXISTS `data_telah_digaji` (
  `id_telah_digaji` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jumlah_gaji` int(10) NOT NULL,
  `jumlah_tunjangan` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databases_2020_penggajian_pt_textile_sejahtera.data_telah_digaji: ~6 rows (approximately)
DELETE FROM `data_telah_digaji`;
/*!40000 ALTER TABLE `data_telah_digaji` DISABLE KEYS */;
INSERT INTO `data_telah_digaji` (`id_telah_digaji`, `nama`, `jumlah_gaji`, `jumlah_tunjangan`, `total`) VALUES
	('TRA001', '123', 4965000, 0, 4965000),
	('TRA001', '123', 4825000, 0, 4825000),
	('TRA002', '123', 4930000, 0, 4930000),
	('TRA002', 'wer', 4915000, 0, 4915000),
	('TRA003', '123', 4945000, 0, 4945000),
	('TRA004', '123', 4530000, 0, 4530000);
/*!40000 ALTER TABLE `data_telah_digaji` ENABLE KEYS */;

-- Dumping structure for table databases_2020_penggajian_pt_textile_sejahtera.data_transaksi_gaji
CREATE TABLE IF NOT EXISTS `data_transaksi_gaji` (
  `id_transaksi_gaji` varchar(10) NOT NULL,
  `tanggal_penggajian` date NOT NULL,
  `nik` varchar(15) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `gaji` int(10) NOT NULL,
  `sistem_perhitungan_penggajian` tinytext NOT NULL,
  `jumlah_perhitungan` int(10) NOT NULL,
  `jumlah_gaji` int(10) NOT NULL,
  `jumlah_makan_harian` int(10) NOT NULL,
  `jumlah_potongan_uang_makan_harian` int(10) NOT NULL,
  `jumlah_tidak_masuk_kerja` int(10) NOT NULL,
  `jumlah_potongan_tidak_masuk_kerja` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databases_2020_penggajian_pt_textile_sejahtera.data_transaksi_gaji: ~4 rows (approximately)
DELETE FROM `data_transaksi_gaji`;
/*!40000 ALTER TABLE `data_transaksi_gaji` DISABLE KEYS */;
INSERT INTO `data_transaksi_gaji` (`id_transaksi_gaji`, `tanggal_penggajian`, `nik`, `nama`, `jabatan`, `gaji`, `sistem_perhitungan_penggajian`, `jumlah_perhitungan`, `jumlah_gaji`, `jumlah_makan_harian`, `jumlah_potongan_uang_makan_harian`, `jumlah_tidak_masuk_kerja`, `jumlah_potongan_tidak_masuk_kerja`) VALUES
	('TRA001', '2019-01-26', '123', '123', 'OB', 5000000, 'bulanan\r\n', 1, 4825000, 5, 15000, 5, 20000),
	('TRA002', '2019-01-26', 'wer', 'wer', 'OB', 5000000, 'bulanan\r\n', 1, 4915000, 3, 15000, 2, 20000),
	('TRA003', '2018-12-11', '123', '123', 'OB', 5000000, 'bulanan\r\n', 1, 4945000, 1, 15000, 2, 20000),
	('TRA004', '2019-07-22', '123', '123', 'OB', 5000000, 'bulanan\r\n', 1, 4530000, 26, 15000, 4, 20000);
/*!40000 ALTER TABLE `data_transaksi_gaji` ENABLE KEYS */;

-- Dumping structure for table databases_2020_penggajian_pt_textile_sejahtera.data_tunjangan
CREATE TABLE IF NOT EXISTS `data_tunjangan` (
  `id_tunjangan` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` varchar(10) NOT NULL,
  `nama_tunjanagn` varchar(10) NOT NULL,
  `jumlah_tunjangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table databases_2020_penggajian_pt_textile_sejahtera.data_tunjangan: ~2 rows (approximately)
DELETE FROM `data_tunjangan`;
/*!40000 ALTER TABLE `data_tunjangan` DISABLE KEYS */;
INSERT INTO `data_tunjangan` (`id_tunjangan`, `tanggal`, `nik`, `nama_tunjanagn`, `jumlah_tunjangan`) VALUES
	('TUN001', '2019-01-26', '123', 'hari raya', '100000'),
	('TUN002', '2019-07-22', '123', 'hari raya', '500000');
/*!40000 ALTER TABLE `data_tunjangan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
