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

-- Dumping structure for table database_2020_pt_textile_sejahtera.data_admin
CREATE TABLE IF NOT EXISTS `data_admin` (
  `id_admin` varchar(10) NOT NULL,
  `hak_akses` enum('pemilik','admin') NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table database_2020_pt_textile_sejahtera.data_admin: ~1 rows (approximately)
DELETE FROM `data_admin`;
/*!40000 ALTER TABLE `data_admin` DISABLE KEYS */;
INSERT INTO `data_admin` (`id_admin`, `hak_akses`, `username`, `password`) VALUES
	('ADM001', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `data_admin` ENABLE KEYS */;

-- Dumping structure for table database_2020_pt_textile_sejahtera.data_disposisi_surat_keluar
CREATE TABLE IF NOT EXISTS `data_disposisi_surat_keluar` (
  `id_pegawai` varchar(10) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `disposisi_dari` varchar(100) NOT NULL,
  `disposisikan_kepada` varchar(100) NOT NULL,
  `catatan` text NOT NULL,
  `status` enum('belum_dibaca','dibaca') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table database_2020_pt_textile_sejahtera.data_disposisi_surat_keluar: ~8 rows (approximately)
DELETE FROM `data_disposisi_surat_keluar`;
/*!40000 ALTER TABLE `data_disposisi_surat_keluar` DISABLE KEYS */;
INSERT INTO `data_disposisi_surat_keluar` (`id_pegawai`, `nomor_surat`, `disposisi_dari`, `disposisikan_kepada`, `catatan`, `status`) VALUES
	('DIS004', '005/480/trantib/2017', '196012151986031007', '197712212002121004', '<p>bpk camat</p>\r\n', 'dibaca'),
	('DIS005', '474.3/57/kesra', 'ADM001', '197712212002121004', '<p>bpk camat</p>\r\n', 'dibaca'),
	('DIS006', '503/49/pelum', 'ADM001', '197712212002121004', '<p>bpk camat</p>\r\n', 'dibaca'),
	('DIS007', '503/45/pelum', 'ADM001', '197712212002121004', '<p>bpk camat</p>\r\n', 'dibaca'),
	('DIS008', '503/47/Pelum', 'ADM001', '197712212002121004', '<p>bpk camat</p>\r\n', 'dibaca'),
	('DIS009', '503/47/Pelum', 'ADM001', '197712212002121004', '<p>bpk camat sadu</p>\r\n', 'dibaca'),
	('DIS010', '503/37-21', 'ADM001', '197712212002121004', '<p>bpk camat</p>\r\n', 'belum_dibaca'),
	('DIS013', '300/430/trantib/2017', '1971112242006041006', '197712212002121004', '<p>bpk camat</p>\r\n', 'belum_dibaca');
/*!40000 ALTER TABLE `data_disposisi_surat_keluar` ENABLE KEYS */;

-- Dumping structure for table database_2020_pt_textile_sejahtera.data_disposisi_surat_masuk
CREATE TABLE IF NOT EXISTS `data_disposisi_surat_masuk` (
  `id_pegawai` varchar(10) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `disposisi_dari` varchar(100) NOT NULL,
  `disposisikan_kepada` varchar(100) NOT NULL,
  `catatan` text NOT NULL,
  `status` enum('belum_dibaca','dibaca') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table database_2020_pt_textile_sejahtera.data_disposisi_surat_masuk: ~18 rows (approximately)
DELETE FROM `data_disposisi_surat_masuk`;
/*!40000 ALTER TABLE `data_disposisi_surat_masuk` DISABLE KEYS */;
INSERT INTO `data_disposisi_surat_masuk` (`id_pegawai`, `nomor_surat`, `disposisi_dari`, `disposisikan_kepada`, `catatan`, `status`) VALUES
	('DIS001', '470.1/11B/1999', 'ADM001', '196012151986031007', '<p>bpk sekcam</p>\r\n', 'dibaca'),
	('DIS002', '470.1/11B/1999', '196012151986031007', '197712212002121004', '', 'dibaca'),
	('DIS003', '470.1/11B/1999', '197712212002121004', '196012151986031007', '<p>telah diteliti sesuai aslinya</p>\r\n', 'dibaca'),
	('DIS004', '870/02/Umum', 'ADM001', '196012151986031007', '<p>bpk sekcam</p>\r\n', 'dibaca'),
	('DIS005', '268', 'ADM001', '196012151986031007', '<p>bpk sekcam</p>\r\n', 'dibaca'),
	('DIS006', '460/95/Umum/2014', 'ADM001', '196012151986031007', '<p>bpk sekcam</p>\r\n', 'dibaca'),
	('DIS007', '810/1183.a/BKD/2014', 'ADM001', '196012151986031007', '<p>bpk sekcam</p>\r\n', 'belum_dibaca'),
	('DIS008', '870/02/Umum', '196012151986031007', '197712212002121004', '', 'belum_dibaca'),
	('DIS009', '268', '196012151986031007', '197712212002121004', '<p>bpk sekcam</p>\r\n', 'belum_dibaca'),
	('DIS010', '460/95/Umum/2014', '196012151986031007', '197712212002121004', '<p>telah diteliti sesuai dengan aslinya</p>\r\n', 'dibaca'),
	('DIS011', '460/95/Umum/2014', '196012151986031007', '198002142010011005', '<p>kasi kessos</p>\r\n', 'dibaca'),
	('DIS012', '460/95/Umum/2014', '198002142010011005', '196012151986031007', '<p>telah diteliti sesaui aslinya</p>\r\n', 'belum_dibaca'),
	('DIS013', '820/992/Bkd/2015', 'ADM001', '196012151986031007', '<p>Bpk Sekcam</p>\r\n', 'dibaca'),
	('DIS014', '820/992/Bkd/2015', '196012151986031007', '197712212002121004', '<p>Bpk Camat</p>\r\n', 'dibaca'),
	('DIS015', '400/27/2015', 'ADM001', '196012151986031007', '<p>bpk sekcam</p>\r\n', 'dibaca'),
	('DIS016', '400/27/2015', '196012151986031007', '197712212002121004', '<p>Bpak Camat</p>\r\n', 'belum_dibaca'),
	('DIS017', '407 tahun 2016', 'ADM001', '196012151986031007', '<p>Bpk sekcam</p>\r\n', 'dibaca'),
	('DIS018', '407 tahun 2016', '196012151986031007', '197712212002121004', '<p>Bpk Camat</p>\r\n', 'belum_dibaca');
/*!40000 ALTER TABLE `data_disposisi_surat_masuk` ENABLE KEYS */;

-- Dumping structure for table database_2020_pt_textile_sejahtera.data_pegawai
CREATE TABLE IF NOT EXISTS `data_pegawai` (
  `id_pegawai` varchar(10) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table database_2020_pt_textile_sejahtera.data_pegawai: ~6 rows (approximately)
DELETE FROM `data_pegawai`;
/*!40000 ALTER TABLE `data_pegawai` DISABLE KEYS */;
INSERT INTO `data_pegawai` (`id_pegawai`, `NIP`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `jabatan`, `username`, `password`) VALUES
	('PEG001', '197712212002121004', 'Helmi Agustinius, SE', '<p>-</p>\r\n', '<p>-</p>\r\n', '1977-12-21', 'laki-laki', 'camat', 'camat', 'e0dc1c969db5fa159c0e3ccc290e2314'),
	('PEG002', '196012151986031007', 'Muslim,A.Md', '<p>-</p>\r\n', '<p>-</p>\r\n', '1960-12-15', 'laki-laki', 'sekcam', 'sekcam', '3de0c935622cc80ed0f5998c327036e5'),
	('PEG003', '19611008198203 1 006', 'Junaidi, A.Ma.Pd', '<p>-</p>\r\n', '<p>-</p>\r\n', '1961-10-08', 'laki-laki', 'kasi trantib', 'trantib', 'b76ef4fdc7cb1946829caa8479a89b65'),
	('PEG004', '198002142010011005', 'Sulfa, ST', '<p>-</p>\r\n', '<p>-</p>\r\n', '1980-02-14', 'perempuan', 'kasi kessos', 'kessos', '84d393e99f3813c2330258b725e4a60e'),
	('PEG005', '19760720201001 1 005', 'Ambo Unga', '<p>-</p>\r\n', '<p>-</p>\r\n', '1976-07-20', 'laki-laki', 'kasi ppm', 'ppm', 'a06e2d2a6164447fcb3aca27b61afd34'),
	('PEG006', '1971112242006041006', 'kasubag', '<p>-</p>\r\n', '<p>-</p>\r\n', '1971-02-14', 'laki-laki', 'kasubag', 'kasubag', '143ad2695caf8f2368b5d9ef03d37ee8');
/*!40000 ALTER TABLE `data_pegawai` ENABLE KEYS */;

-- Dumping structure for table database_2020_pt_textile_sejahtera.data_surat_keluar
CREATE TABLE IF NOT EXISTS `data_surat_keluar` (
  `id_surat_keluar` varchar(10) NOT NULL,
  `pembuat_surat` varchar(50) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `sifat_surat` varchar(50) NOT NULL,
  `tanggal_surat_keluar` date NOT NULL,
  `sumber_surat` varchar(50) NOT NULL,
  `tujuan_surat` varchar(50) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `lampiran` text NOT NULL,
  `perihal` text NOT NULL,
  `keterangan` text NOT NULL,
  `file_surat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table database_2020_pt_textile_sejahtera.data_surat_keluar: ~36 rows (approximately)
DELETE FROM `data_surat_keluar`;
/*!40000 ALTER TABLE `data_surat_keluar` DISABLE KEYS */;
INSERT INTO `data_surat_keluar` (`id_surat_keluar`, `pembuat_surat`, `no_surat`, `sifat_surat`, `tanggal_surat_keluar`, `sumber_surat`, `tujuan_surat`, `kategori`, `lampiran`, `perihal`, `keterangan`, `file_surat`) VALUES
	('SUR001', 'ADM001', '474.3/57/kesra', '-', '2007-05-01', 'Kepdes Sungai Jambat', 'camat', 'Surat Masuk', '<p>-</p>\r\n', '<p>Surat keterangan ahli waris</p>\r\n', '<p>-</p>\r\n', '1551090809-78395-004.jpg'),
	('SUR002', 'ADM001', '503/49/pelum', '-', '2008-02-04', 'Kecamatan Sadu', 'camat', 'Situ IMB', '<p>2 lembar</p>\r\n', '<p>Izin tempat usaha toko kelontong</p>\r\n', '<p>-</p>\r\n', '1549936560-86253-Doc1.pdf'),
	('SUR003', 'ADM001', '503/45/pelum', '-', '2008-02-11', 'Kecamatan Sadu', 'camat', 'Situ IMB', '<p>2 berkas</p>\r\n', '<p>Izin tempat usaha penampungan kopra&nbsp;</p>\r\n', '<p>-</p>\r\n', '1549936736-82553-Doc1.pdf'),
	('SUR004', 'ADM001', '503/47/Pelum', '-', '2008-02-20', 'Kecamatan Sadu', 'camat', 'Situ IMB', '<p>-</p>\r\n', '<p>Izin tempat usaha pangkal minyak solar</p>\r\n', '<p>-</p>\r\n', '1549936880-48641-Doc1.pdf'),
	('SUR005', 'ADM001', '503/47/Pelum', '-', '2018-05-30', 'Kecamatan Sadu', 'camat', 'Situ IMB', '<p>-</p>\r\n', '<p>Izin tewmpat usaha pangkalan minyak solar</p>\r\n', '<p>-</p>\r\n', '1549945434-75124-Doc1.pdf'),
	('SUR006', 'ADM001', '503/37-21', '-', '2009-03-24', 'kantor pelayanan perizinan terpadu', 'sekcam', 'Situ IMB', '<p>-</p>\r\n', '<p>izin undang-undang gangguan (ho)</p>\r\n', '<p>-</p>\r\n', '1549945706-52566-Doc1.pdf'),
	('SUR007', 'ADM001', '080/141/Pmd', 'Biasa', '2015-03-04', 'Kecamatan Sadu', 'sekcam', 'Berita Daerah', '<p>2 lembar</p>\r\n', '<p>bahan berita daerah</p>\r\n', '<p>-</p>\r\n', '1549945821-27696-Doc1.pdf'),
	('SUR008', 'ADM001', '485/183/umum/2015', 'Biasa', '2015-03-19', 'Kecamatan Sadu', 'camat', 'Berita Daerah', '<p>2 lembar</p>\r\n', '<p>bahan berita daerah</p>\r\n', '<p>-</p>\r\n', '1549945936-11076-Doc1.pdf'),
	('SUR009', 'ADM001', '485/183/umum/2015', 'Biasa', '2015-03-19', 'Kecamatan Sadu', 'camat', 'Berita Daerah', '<p>2 lembar</p>\r\n', '<p>bahan berita acara</p>\r\n', '<p>-</p>\r\n', '1549946238-22601-Doc1.pdf'),
	('SUR010', 'ADM001', '020/136/Sd/2016', '-', '2016-05-13', 'Kecamatan Sadu', 'camat', 'Investasi', '<p>-</p>\r\n', '<p>berita acara serah terima barang</p>\r\n', '', '1549946322-12095-DATABASE MENGGUNAKAN ACCES.pdf'),
	('SUR011', 'ADM001', '384 tahun 2016', '-', '2016-07-29', 'Bupati Tanjabtim', 'sekcam', 'Surat Masuk', '<p>-</p>\r\n', '<p>perubahan atas keputusan bupati tanjabtim no 103 tahun 2016&nbsp;</p>\r\n', '<p>-</p>\r\n', '1549946499-54761-11 001.jpg'),
	('SUR012', 'ADM001', '05.07.040.05/08/imb/', '-', '2016-12-20', 'Kecamatan Sadu', 'camat', 'Arsip Situ', '<p>-</p>\r\n', '<p>izin mendirian bangunan</p>\r\n', '<p>-</p>\r\n', '1549946662-50575-12 001.jpg'),
	('SUR013', 'ADM001', '01', '-', '2016-12-27', 'Kecamatan Sadu', 'camat', 'Arsip Situ', '<p>-</p>\r\n', '<p>izin mendirikan bangunan</p>\r\n', '<p>-</p>\r\n', '1549946756-54200-13-19 001.jpg'),
	('SUR014', 'ADM001', '02', '-', '2016-12-27', 'Kecamatan Sadu', 'camat', 'Arsip Situ', '<p>-</p>\r\n', '<p>isin mendirikan bangunan</p>\r\n', '<p>-</p>\r\n', '1549946962-60012-13-19 002.jpg'),
	('SUR015', 'ADM001', '03', '-', '2016-12-27', 'Kecamatan Sadu', 'camat', 'Arsip Situ', '<p>-</p>\r\n', '<p>izin mendirikan bangunan</p>\r\n', '<p>-</p>\r\n', '1549947058-15114-13-19 003.jpg'),
	('SUR016', 'ADM001', '04', '-', '2016-12-27', 'Kecamatan Sadu', 'camat', 'Arsip Situ', '<p>-</p>\r\n', '<p>izin mendirikan bangunan</p>\r\n', '<p>-</p>\r\n', '1549947122-88112-13-19 004.jpg'),
	('SUR017', 'ADM001', '05', '-', '2016-12-27', 'Kecamatan Sadu', 'camat', 'Arsip Situ', '<p>-</p>\r\n', '<p>izin mendirikan bangunan</p>\r\n', '<p>-</p>\r\n', '1549947175-30409-13-19 005.jpg'),
	('SUR018', 'ADM001', '06', '-', '2016-12-27', 'Kecamatan Sadu', 'camat', 'Arsip Situ', '<p>-</p>\r\n', '<p>izin mendirikan bangunan</p>\r\n', '<p>-</p>\r\n', '1549947244-61454-13-19 006.jpg'),
	('SUR019', 'ADM001', '07', '-', '2016-12-27', 'Kecamatan Sadu', 'camat', 'Arsip Situ', '<p>-</p>\r\n', '<p>izin mendirikan bangunan</p>\r\n', '<p>-</p>\r\n', '1549947309-64450-13-19 007.jpg'),
	('SUR020', 'ADM001', '10', '-', '2016-03-08', 'Kecamatan Sadu', 'camat', 'Arsip Situ', '<p>-</p>\r\n', '<p>izin mendirikan bangunan</p>\r\n', '<p>-</p>\r\n', '1549947606-75256-20 001.jpg'),
	('SUR021', 'ADM001', '41', '-', '2016-04-16', 'Kecamatan Sadu', 'camat', 'Situ IMB', '<p>-</p>\r\n', '<p>izim tempat usaha kios minyak</p>\r\n', '<p>-</p>\r\n', '1549947706-42486-Doc1.pdf'),
	('SUR022', 'ADM001', '11', '-', '2016-05-04', 'Kecamatan Sadu', 'camat', 'Arsip Situ', '<p>-</p>\r\n', '<p>izin mendirikan bangunan</p>\r\n', '<p>-</p>\r\n', '1549947829-59471-22 001.jpg'),
	('SUR023', 'ADM001', '05.07.042.05.471/05/', '-', '2017-05-09', 'Kecamatan Sadu', 'camat', 'Arsip Situ', '<p>-</p>\r\n', '<p>siup mikro</p>\r\n', '<p>-</p>\r\n', '1549948013-41918-Doc1.pdf'),
	('SUR024', 'ADM001', '72', '-', '2017-07-13', 'Kecamatan Sadu', 'camat', 'SK Camat', '<p>-</p>\r\n', '<p>pembentukan panitia peringatan&nbsp;ultah ke 712</p>\r\n', '<p>-</p>\r\n', '1549948154-62190-Doc1.pdf'),
	('SUR025', 'ADM001', '13', '-', '2017-08-04', 'Kecamatan Sadu', 'camat', 'Arsip Situ', '<p>-</p>\r\n', '<p>izin mendirikan bangunan</p>\r\n', '<p>-</p>\r\n', '1549948267-46817-25 001.jpg'),
	('SUR026', 'ADM001', '15', '-', '2017-10-09', 'Kecamatan Sadu', 'camat', 'Arsip Situ', '<p>-</p>\r\n', '<p>imb</p>\r\n', '<p>-</p>\r\n', '1549948337-62256-26 001.jpg'),
	('SUR027', 'ADM001', '001', '-', '2018-01-01', 'Kecamatan Sadu', 'camat', 'Arsip Situ', '<p>-</p>\r\n', '<p>izin reklame</p>\r\n', '<p>-</p>\r\n', '1549948407-67529-Doc1.pdf'),
	('SUR028', 'ADM001', '05.07.042.05.471/04/', '-', '2018-01-01', 'Kecamatan Sadu', 'camat', 'Arsip Situ', '<p>-</p>\r\n', '<p>surat izin tempat usaha</p>\r\n', '<p>-</p>\r\n', '1549948539-26408-Doc1.pdf'),
	('SUR029', 'ADM001', '39 tahun 2018', '-', '2018-01-19', 'Kecamatan Sadu', 'camat', 'Arsip Situ', '<p>-</p>\r\n', '<p>penetapan peserta fasi dan official</p>\r\n', '<p>-</p>\r\n', '1549948670-67049-Doc1.pdf'),
	('SUR030', 'ADM001', '37 tahun 2018', '-', '2018-03-01', 'Kecamatan Sadu', 'camat', 'SK Camat', '<p>-</p>\r\n', '<p>pembentukan pengurus tim pkk</p>\r\n', '<p>-</p>\r\n', '1549948762-93614-Doc1.pdf'),
	('SUR031', 'ADM001', '300/285/Trantib/2018', 'Penting', '2018-10-16', 'Kecamatan Sadu', 'Kasi Kassos', 'Surat Keluar', '<p>1 berkas</p>\r\n', '<p>lap. data satlinmas</p>\r\n', '<p>-</p>\r\n', '1549948913-68949-Doc1.pdf'),
	('SUR032', 'ADM001', '300/389/trantib/2018', '-', '2018-11-01', 'Kecamatan Sadu', 'sekcam', 'Surat Keluar', '<p>-</p>\r\n', '<p>penyampaian data satlinmas</p>\r\n', '<p>-</p>\r\n', '1549949017-80850-Doc1.pdf'),
	('SUR033', 'ADM001', '800/388/set/2018', 'Penting', '2018-11-01', 'Kecamatan Sadu', 'sekcam', 'Surat Keluar', '<p>1 lembar</p>\r\n', '<p>lap.surat masuk dan keluar bulan oktober</p>\r\n', '<p>-</p>\r\n', '1549949138-86135-Doc1.pdf'),
	('SUR034', 'ADM001', '300/391/trantib/2018', 'Biasa', '2018-11-19', 'Kecamatan Sadu', 'camat', 'Surat Masuk', '', '<p>Lap.trantibwil bulan oktober 2018</p>\r\n', '<p>-</p>\r\n', '1551090944-71732-1549949252-11853-Doc1.pdf'),
	('SUR035', '196012151986031007', '005/480/trantib/2017', 'Penting', '2017-11-21', 'Kecamatan Sadu', 'camat', 'Kasus-Kasus Daerah', '<p>-</p>\r\n', '<p>Undangan</p>\r\n', '<p>-</p>\r\n', '1549951315-95517-4.jpg'),
	('SUR036', '1971112242006041006', '300/430/trantib/2017', 'Penting', '2017-11-21', 'Kecamatan Sadu', 'camat', 'Kasus-Kasus Daerah', '<p>-</p>\r\n', '<p>undangan</p>\r\n', '<p>-</p>\r\n', '1549957373-63107-Doc2.pdf');
/*!40000 ALTER TABLE `data_surat_keluar` ENABLE KEYS */;

-- Dumping structure for table database_2020_pt_textile_sejahtera.data_surat_masuk
CREATE TABLE IF NOT EXISTS `data_surat_masuk` (
  `id_surat_masuk` varchar(10) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `sifat_surat` varchar(50) NOT NULL,
  `tanggal_surat_masuk` date NOT NULL,
  `sumber_surat` varchar(50) NOT NULL,
  `tujuan_surat` varchar(50) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `lampiran` text NOT NULL,
  `prihal` text NOT NULL,
  `keterangan` text NOT NULL,
  `file_surat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table database_2020_pt_textile_sejahtera.data_surat_masuk: ~21 rows (approximately)
DELETE FROM `data_surat_masuk`;
/*!40000 ALTER TABLE `data_surat_masuk` DISABLE KEYS */;
INSERT INTO `data_surat_masuk` (`id_surat_masuk`, `no_surat`, `sifat_surat`, `tanggal_surat_masuk`, `sumber_surat`, `tujuan_surat`, `kategori`, `lampiran`, `prihal`, `keterangan`, `file_surat`) VALUES
	('SUR001', '470.1/11B/1999', 'Biasa', '1999-10-30', 'Desa Sungai Itik', 'Camat', 'Arsip Leges', '<p>2 lembar</p>\r\n', '<p>Surat Keterangan Meninggal</p>\r\n', '<p>-</p>\r\n', '1549897065-77381-jpg2pdf.pdf'),
	('SUR002', '870/02/Umum', 'Biasa', '2010-02-08', 'Bupati Tanjabtim', 'sekcam', 'Arsip Leges', '<p>1 lembar</p>\r\n', '<p>Penempatan Calon PNS pelamar umum formasi Tahun 2009</p>\r\n', '<p>-</p>\r\n', '1549897477-61932-2 001.jpg'),
	('SUR003', '268', 'Biasa', '2014-05-05', 'Bupati Tanjabtim', 'sekcam', 'SK Bupati', '<p>1 Lembar</p>\r\n', '<p>Perubahan atas keputusan bupati tanjung jabung timur no 104 tahun 2014</p>\r\n', '<p>-</p>\r\n', '1549898243-40160-2 001.jpg'),
	('SUR004', '460/95/Umum/2014', 'Biasa', '2014-11-03', 'Desa Sungai Itik', 'camat', 'Arsip Leges', '<p>1 Berkas</p>\r\n', '<p>Surat Keterangn ahli waris</p>\r\n', '<p>-</p>\r\n', '1549898495-43769-4 001.jpg'),
	('SUR005', '810/1183.a/BKD/2014', 'Biasa', '2015-01-05', 'Bupati Tanjabtim', 'sekcam', 'SK Bupati', '<p>3 Lembar</p>\r\n', '<p>Penempatan Calon PNS&nbsp;</p>\r\n', '<p>-</p>\r\n', '1549900163-58658-5.pdf'),
	('SUR006', '820/992/Bkd/2015', 'Penting', '2015-03-02', 'Bkd', 'sekcam', 'SK Bupati', '<p>1 lembar</p>\r\n', '<p>surat perintah tugas</p>\r\n', '<p>-</p>\r\n', '1549907891-35760-6 001.jpg'),
	('SUR007', '400/27/2015', 'Biasa', '2015-12-30', 'Desa Sungai Itik', 'sekcam', 'Arsip Leges', '<p>1 Lembar</p>\r\n', '<p>surat keterangan ahli waris</p>\r\n', '<p>-</p>\r\n', '1549908503-96522-7 001.jpg'),
	('SUR008', '407 tahun 2016', 'Biasa', '2016-08-24', 'Bupati Tanjabtim', 'sekcam', 'SK Bupati', '<p>1 lembar</p>\r\n', '<p>Mutasi PNS</p>\r\n', '<p>-</p>\r\n', '1549927024-43851-8 001.jpg'),
	('SUR009', '503/14/Reg/21/2017', 'Biasa', '2017-04-12', 'Desa Sungai Cemara', 'Kasi Kassos', 'Arsip Leges', '<p>1 lembar</p>\r\n', '<p>Surat Keterangan Usaha</p>\r\n', '<p>-</p>\r\n', '1549927189-92952-9 001.jpg'),
	('SUR010', '528/330/P2KP', 'Biasa', '2018-08-13', 'Dinas Ketahanan Pangan', 'camat', 'Surat Masuk', '<p>-</p>\r\n', '<p>Nama-Nama Kader Pangan sekabupaten tanjabtim</p>\r\n', '<p>-</p>\r\n', '1549927454-16918-Doc1.pdf'),
	('SUR011', '555/360/Diskominfo-I', 'Penting', '2018-09-03', 'Sekretariat Daerah', 'kasubag ', 'Surat Masuk', '<p>-</p>\r\n', '<p>Undangan</p>\r\n', '<p>-</p>\r\n', '1549927762-26641-11 001.jpg'),
	('SUR012', '364', 'Biasa', '2018-09-28', 'Uptd tanaman pangan dan hortikultura', 'camat', 'Surat Masuk', '<p>-</p>\r\n', '<p>Undangan</p>\r\n', '<p>-</p>\r\n', '1549927885-79444-12 001.jpg'),
	('SUR013', '441', 'Biasa', '2018-10-08', 'Stikom DB Jambi', 'camat', 'Surat Masuk', '<p>-</p>\r\n', '<p>Izin Penelitian</p>\r\n', '<p>-</p>\r\n', '1549928047-92740-13 001.jpg'),
	('SUR014', '430', 'Penting', '2018-10-11', 'Bakeuda', 'trantib', 'Surat Masuk', '<p>3 lembar</p>\r\n', '<p>Lap.Realisasi PBB TA 2018</p>\r\n', '<p>-</p>\r\n', '1549928216-10620-14 001.jpg'),
	('SUR015', '463/367/SKTM-SJ/2018', 'Biasa', '2018-10-26', 'Desa Sungai Jambat', 'camat', 'Surat Masuk', '<p>-</p>\r\n', '<p>surat keterangan tidak mampu</p>\r\n', '<p>-</p>\r\n', '1549928416-76115-Doc1.pdf'),
	('SUR016', '555/434/Diskominfo-I', 'Penting', '2018-10-31', 'Diskominfo', 'camat', 'Surat Masuk', '<p>-</p>\r\n', '<p>Peminjaman aula</p>\r\n', '<p>-</p>\r\n', '1549928992-60256-15 001.jpg'),
	('SUR017', '413', 'Penting', '2018-10-31', 'Gerakan Pramuka Muara sabak', 'camat', 'Surat Masuk', '<p>-</p>\r\n', '<p>partisipasi penggalang</p>\r\n', '<p>-</p>\r\n', '1549928717-94215-17 001.jpg'),
	('SUR018', '436', 'Biasa', '2018-11-02', 'Satker balai penyuluhan Pertanian kec.sadu', 'camat', 'Surat Masuk', '<p>1 berkas</p>\r\n', '<p>Monografi desa/Kel. tahun 2018</p>\r\n', '<p>-</p>\r\n', '1549928879-12480-Doc1.pdf'),
	('SUR019', '425', 'Biasa', '2018-11-02', 'Uptd tanaman pangan dan hortikultura', 'camat', 'Surat Masuk', '<p>1 berkas</p>\r\n', '<p>Lap. Laku dan Rekab Laku Penyuluhan UPTD TPH kec.Sadu</p>\r\n', '<p>-</p>\r\n', '1549929182-92718-Doc1.pdf'),
	('SUR020', 'Istimewa ', 'Biasa', '2018-11-07', 'Desa Sungai Itik', 'camat', 'Surat Masuk', '<p>-</p>\r\n', '<p>Undangan</p>\r\n', '<p>-</p>\r\n', '1549929322-19475-18 001.jpg'),
	('SUR021', '420', 'Penting', '2018-11-08', 'Panitia pemilihan kec.Sadu', 'camat', 'Surat Masuk', '<p>-hghg</p>\r\n', '<p>Undangan rapat pleno DPTH-1 Pmilu Tahun 2019</p>\r\n', '<p>hghf</p>\r\n', '1551087753-79101-001.jpg');
/*!40000 ALTER TABLE `data_surat_masuk` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
