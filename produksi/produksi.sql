-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2020 pada 15.27
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `produksi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(2, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_keluar` int(11) NOT NULL,
  `kain` varchar(100) NOT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_keluar`, `kain`, `panjang`, `lebar`, `tanggal`, `jumlah`, `satuan`) VALUES
(1, 'katun supernova', 50, 150, '2020-06-25', 15, 'gulung'),
(2, 'katun jepang', 75, 130, '2020-06-25', 25, 'gulung'),
(3, 'katun toyobo', 30, 150, '2020-06-25', 10, 'gulung'),
(4, 'katun linen euro', 60, 150, '2020-06-26', 12, 'gulung'),
(5, 'katun supernova', 20, 130, '2020-06-26', 15, 'gulung'),
(6, 'katun jepang', 150, 150, '2020-06-26', 14, 'gulung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_barang`
--

CREATE TABLE `data_barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `berat` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_barang`
--

INSERT INTO `data_barang` (`id_barang`, `nama`, `berat`, `satuan`, `jumlah`) VALUES
(1, 'benang', 50, 'biji', 1000),
(2, 'pewarna kain', 100, 'biji', 800),
(3, 'mesin tenun', 0, 'biji', 30),
(4, 'meteran kain', 0, 'biji', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_produksi`
--

CREATE TABLE `data_produksi` (
  `id_produksi` int(11) NOT NULL,
  `kain` varchar(100) NOT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_produksi`
--

INSERT INTO `data_produksi` (`id_produksi`, `kain`, `panjang`, `lebar`, `tanggal`, `jumlah`, `satuan`) VALUES
(1, ' katun supernova', 50, 150, '2020-06-25', 10, 'gulung'),
(2, 'katun jepang', 75, 130, '2020-06-25', 30, 'gulung'),
(3, 'katun toyobo', 30, 150, '2020-06-25', 10, 'gulung'),
(4, 'katun linen euro', 60, 150, '2020-06-26', 20, 'gulung'),
(5, 'katun supernova', 20, 130, '2020-06-26', 15, 'gulung'),
(6, 'katun jepang', 150, 150, '2020-06-26', 12, 'gulung'),
(7, 'katun linen euro', 40, 130, '2020-06-26', 10, 'gulung'),
(8, 'katun toyobo', 80, 150, '2020-06-27', 18, 'gulung'),
(9, 'katun jepang', 100, 130, '2020-06-27', 20, 'gulung'),
(10, 'katun supernova', 80, 130, '2020-06-27', 11, 'gulung'),
(11, 'katun jepang', 110, 150, '2020-06-29', 12, 'gulung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_produksi`
--

CREATE TABLE `hasil_produksi` (
  `id_hasil` int(11) NOT NULL,
  `kain` varchar(100) NOT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil_produksi`
--

INSERT INTO `hasil_produksi` (`id_hasil`, `kain`, `panjang`, `lebar`, `tanggal`, `jumlah`, `satuan`) VALUES
(1, 'katun supernova', 50, 150, '2020-06-25', 15, 'gulung'),
(2, 'katun jepang', 75, 130, '2020-06-25', 30, 'gulung'),
(3, 'katun toyobo', 30, 150, '2020-06-25', 15, 'gulung'),
(4, 'katun supernova', 20, 130, '2020-06-26', 15, 'gulung'),
(5, 'katun jepang', 150, 150, '2020-06-26', 15, 'gulung'),
(6, 'katun toyobo', 80, 150, '2020-06-27', 20, 'gulung'),
(7, 'katun jepang', 100, 130, '2020-06-27', 25, 'gulung'),
(8, 'katun jepang', 110, 150, '2020-06-29', 30, 'gulung');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indeks untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `data_produksi`
--
ALTER TABLE `data_produksi`
  ADD PRIMARY KEY (`id_produksi`);

--
-- Indeks untuk tabel `hasil_produksi`
--
ALTER TABLE `hasil_produksi`
  ADD PRIMARY KEY (`id_hasil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
