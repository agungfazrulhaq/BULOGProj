-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 04:53 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_keuangan_opaset_sulselbar`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id_files` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `file_id_transaksi` int(11) DEFAULT NULL,
  `ukuran_file` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id_files`, `nama_file`, `file_id_transaksi`, `ukuran_file`) VALUES
(11, 'Webslesson_17.pdf', 30, 14454),
(12, 'Webslesson_10.pdf', 38, 1341),
(13, 'Webslesson_20.pdf', 31, 2681),
(16, 'Webslesson_13.pdf', 36, 919);

-- --------------------------------------------------------

--
-- Table structure for table `tb_aset`
--

CREATE TABLE `tb_aset` (
  `id_aset` int(11) NOT NULL,
  `nama_aset` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_aset`
--

INSERT INTO `tb_aset` (`id_aset`, `nama_aset`) VALUES
(1, 'BARUGA LAPPO ASE'),
(2, 'WISMA LAPPO ASE'),
(3, 'GEDUNG OLAH RAGA (GOR)');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `id_kat_lr_kat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `id_kat_lr_kat`) VALUES
(12, 'Sewa Asset', 7),
(13, 'Sewa Asset dari PYD/Hotel', 7),
(14, 'Biaya Operasional', 8),
(15, 'Harga Pokok Penjualan', 8),
(16, 'Biaya Pegawai', 9),
(17, 'Biaya Kantor, ATK', 9),
(18, 'Biaya Listrik/Telp/Air', 9),
(19, 'Biaya Perjalanan Dinas', 9),
(20, 'Biaya Perbaikan/Pemeliharaan', 9),
(21, 'Biaya PPN', 9),
(22, 'Biaya Pajak PPh Pasal 4(2)', 9),
(23, 'Biaya Pajak PPh Pasal 21', 9),
(24, 'Biaya Pajak Restoran & Hotel', 9),
(25, 'PBB', 9),
(26, 'Biaya Lain-Lain', 9),
(27, 'Pendapatan Bunga Bank', 10),
(28, 'Pendapatan Lain-Lain', 10),
(29, 'Biaya Bank', 11),
(30, 'Biaya ADM', 11),
(31, 'Biaya Penyusutan', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_laba_rugi`
--

CREATE TABLE `tb_kategori_laba_rugi` (
  `id_kat_laba_rugi` int(11) NOT NULL,
  `nama_kat_lr` varchar(255) NOT NULL,
  `jenis_transaksi` varchar(25) NOT NULL,
  `jenis_laba_rugi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori_laba_rugi`
--

INSERT INTO `tb_kategori_laba_rugi` (`id_kat_laba_rugi`, `nama_kat_lr`, `jenis_transaksi`, `jenis_laba_rugi`) VALUES
(7, 'pendapatan', 'DEBIT', 'kotor'),
(8, 'biaya usaha', 'KREDIT', 'kotor'),
(9, 'biaya umum', 'KREDIT', 'usaha'),
(10, 'pendapatan diluar usaha', 'DEBIT', 'lain'),
(11, 'biaya bunga & penyusutan', 'KREDIT', 'lain');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `tahun` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `ref` varchar(10) NOT NULL,
  `saldo` double NOT NULL,
  `transaksi_id_aset` int(11) DEFAULT NULL,
  `transaksi_id_kategori` int(11) DEFAULT NULL,
  `waktuupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`tahun`, `tanggal`, `id_transaksi`, `uraian`, `ref`, `saldo`, `transaksi_id_aset`, `transaksi_id_kategori`, `waktuupdate`) VALUES
(2019, '2019-11-01', 30, 'Saldo awal bulan November 2019', 'D1', 14432643, 1, 28, '2020-06-22 00:16:59'),
(2019, '2019-11-01', 31, 'Gedung & Charge Foto/Shooting (Hj. Rahmatia)', 'D22', 6450000, 1, 12, '2020-06-22 17:35:58'),
(2019, '2019-11-01', 32, 'Gedung & Charge Foto/Shooting (FATIMAH)', 'D2', 7950000, 1, 12, '2020-06-22 17:36:27'),
(2019, '2019-11-01', 33, 'Biaya pembayaran pemain elekton bulan Oktober 2019', 'K18', 4480000, 1, 14, '2020-06-22 17:37:32'),
(2019, '2019-11-01', 34, 'Terima PPH 21', 'D3', 268800, 1, 28, '2020-06-22 17:38:48'),
(2019, '2019-11-01', 35, 'Biaya belanja keperluan Gedung Lappo Ase Bulan November 2019', 'K1', 2000000, 1, 14, '2020-06-22 17:39:23'),
(2019, '2019-11-01', 36, 'Biaya Pembelian Air mineral sebanyak 225 dus Bulan November 2019', 'K2', 3375000, 1, 14, '2020-06-22 17:39:57'),
(2019, '2019-11-01', 37, 'Biaya Laundry Baruga Lappo Ase', 'K3', 525000, 1, 26, '2020-06-22 17:40:41'),
(2019, '2019-11-03', 38, 'Biaya upah petugas kebersihan Baruga Lappo Ase November a/n Adim Yusuf BBA', 'K4', 1040000, 1, 20, '2020-06-22 17:41:08'),
(2019, '2019-11-03', 39, 'Terima PPH 21', 'D5', 72300, 1, 28, '2020-06-22 17:41:19'),
(2019, '2019-11-04', 40, 'MUSSUARDI', 'D4', 1000000, 1, 28, '2020-06-22 17:42:07'),
(2019, '2019-11-04', 41, 'INDRIANY', 'D6', 1000000, 1, 28, '2020-06-22 17:42:29'),
(2019, '2019-11-04', 42, 'Terima dari fotografer mahkota Oktober 2019', 'D21', 2100000, 1, 28, '2020-06-22 17:56:17'),
(2019, '2019-11-04', 43, 'Gedung (RULY SUYANTO)', 'D8', 7550000, 1, 12, '2020-06-22 17:43:09'),
(2019, '2019-11-05', 44, 'GUSMAN', 'D9', 1000000, 1, 28, '2020-06-22 17:43:40'),
(2019, '2019-11-05', 45, 'HARDI PRASETYO', 'D10', 1000000, 1, 28, '2020-06-22 17:43:59'),
(2019, '2019-11-06', 46, 'DEWI ANAGUSTIWI', 'D11', 1000000, 1, 28, '2020-06-22 17:44:24'),
(2019, '2019-11-06', 47, 'Biaya pembelian bensin dan e-toll', 'K5', 150000, 1, 19, '2020-06-22 17:44:55'),
(2019, '2019-11-06', 48, 'Biaya Laundry Baruga Lappo Ase', 'K6', 476000, 1, 20, '2020-06-22 17:45:41'),
(2019, '2019-11-06', 49, 'Biaya upah pemasangan listrik untuk ruko', 'K7', 500000, 1, 18, '2020-06-22 17:46:09'),
(2019, '2019-11-08', 50, 'Biaya pemasangan baru KWH token Ruko Kompleks Bulog (HALID)', 'K8', 4456000, 1, 18, '2020-06-22 17:46:42'),
(2019, '2019-11-08', 51, 'Biaya Laundry Baruga Lappo Ase', 'K9', 364000, 1, 20, '2020-06-22 17:47:03'),
(2019, '2019-11-08', 52, 'Bayar PPH 21 Baruga Oktober 2019', 'K10', 1313700, 1, 23, '2020-06-22 17:47:31'),
(2019, '2019-11-08', 53, 'Biaya PPH Pasal 22 Atas pembelian Cover Kursi Baruga', 'K11', 595362, 1, 26, '2020-06-22 17:47:53'),
(2019, '2019-11-08', 54, 'Bayar PPH Pasal 4 Ayat 2 Baruga Oktober 2019', 'K12', 12000000, 1, 22, '2020-06-22 17:48:27'),
(2019, '2019-11-08', 55, 'Biaya makan tamu', 'K13', 128000, 1, 26, '2020-06-22 17:48:42'),
(2019, '2019-11-09', 56, 'Biaya upah petugas kebersihan Baruga Lappo Ase November a/n Denan', 'K14', 1040000, 1, 20, '2020-06-22 17:49:22'),
(2019, '2019-11-09', 57, 'Terima PPH 21', 'D12', 72300, 1, 28, '2020-06-22 17:49:42'),
(2019, '2019-11-09', 58, 'Biaya upah petugas kebersihan Baruga Lappo Ase November a/n Fatma', 'K15', 1040000, 1, 20, '2020-06-22 17:52:04'),
(2019, '2019-11-09', 59, 'Terima PPH 21', 'D13', 72300, 1, 28, '2020-06-22 17:50:31'),
(2019, '2019-11-10', 60, 'Biaya upah petugas kebersihan Baruga Lappo Ase November a/n Hj Rahmatiah', 'K17', 1040000, 1, 20, '2020-06-22 17:51:35'),
(2019, '2019-11-10', 61, 'Terima PPH 21', 'D14', 72300, 1, 28, '2020-06-22 17:52:34'),
(2019, '2019-11-11', 62, 'ADNAN TAHIR', 'D15', 1000000, 1, 28, '2020-06-22 17:52:52'),
(2019, '2019-11-11', 63, 'LEVI', 'D16', 1000000, 1, 28, '2020-06-22 17:53:19'),
(2019, '2019-11-11', 64, 'Gedung & Charge Foto/Shooting (Hj. SARAWIAH)', 'D17', 7950000, 1, 12, '2020-06-22 17:53:36'),
(2019, '2019-11-11', 65, 'Gedung & Charge Foto/Shooting (GUSMAN)', 'D18', 7950000, 1, 12, '2020-06-22 17:53:52'),
(2019, '2019-11-12', 66, 'MIRNAWATI', 'D19', 1000000, 1, 28, '2020-06-22 17:54:07'),
(2019, '2019-11-12', 67, 'Gedung & Charge Catering (SUTRIANI RIFAI)', 'D20', 8550000, 1, 12, '2020-06-22 17:54:29'),
(2019, '2019-11-12', 68, 'Biaya pembelian kabel IB dan SLO ATM Center', 'K16', 210000, 1, 14, '2020-06-22 17:57:54'),
(2019, '2019-11-12', 69, 'Biaya penambahan pipa jalur kilometer PDAM', 'K19', 400000, 1, 20, '2020-06-22 17:58:46'),
(2019, '2019-11-13', 70, 'Biaya pembelian AC Ruko ATM Center', 'K20', 3550000, 1, 14, '2020-06-22 17:59:35'),
(2019, '2019-11-13', 71, 'Biaya Laundry Baruga Lappo Ase', 'K21', 744000, 1, 20, '2020-06-22 18:02:17'),
(2019, '2019-11-14', 72, 'Biaya penyambungan penambahan pipa ke masing-masing ruko', 'K22', 1000000, 1, 20, '2020-06-22 18:03:48'),
(2019, '2019-11-14', 73, 'Biaya pembelian Neon BOX ATM Center', 'K23', 1500000, 1, 14, '2020-06-22 20:44:02'),
(2019, '2019-11-14', 74, 'Biaya upah petugas kebersihan baruga lappo ase November a/n Fatima', 'K24', 1040000, 1, 20, '2020-06-22 20:45:57'),
(2019, '2019-11-14', 75, 'Terima PPH 21', 'D7', 72300, 1, 28, '2020-06-22 20:46:35'),
(2019, '2019-11-15', 76, 'Biaya pembelian bahan instalasi listrik ATM Center', 'K25', 2022500, 1, 14, '2020-06-22 20:47:56'),
(2019, '2019-11-15', 77, 'Biaya pembayaran upah tukang pengerjaan instalasi listrik ATM CENTER', 'K26', 1300000, 1, 20, '2020-06-22 20:49:16'),
(2019, '2019-11-17', 78, 'Biaya upah petugas kebersihan Baruga Lappo Ase November a/n Ruly Suyanto', 'K27', 1040000, 1, 20, '2020-06-22 20:51:13'),
(2019, '2019-11-17', 79, 'Terima PPH 21', 'D23', 72300, 1, 28, '2020-06-22 20:52:28'),
(2019, '2019-11-18', 80, 'Gedung (NURDIAH)', 'D24', 8000000, 1, 12, '2020-06-22 20:53:54'),
(2019, '2019-11-18', 81, 'Gedung &amp; Charge foto/shooting (INDRIANI SE)', 'D25', 7950000, 1, 12, '2020-06-22 20:54:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id_files`),
  ADD KEY `id_transaksi` (`file_id_transaksi`);

--
-- Indexes for table `tb_aset`
--
ALTER TABLE `tb_aset`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `fk_kat_kat_id` (`id_kat_lr_kat`);

--
-- Indexes for table `tb_kategori_laba_rugi`
--
ALTER TABLE `tb_kategori_laba_rugi`
  ADD PRIMARY KEY (`id_kat_laba_rugi`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_kategori` (`transaksi_id_kategori`),
  ADD KEY `id_aset` (`transaksi_id_aset`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id_files` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_aset`
--
ALTER TABLE `tb_aset`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_kategori_laba_rugi`
--
ALTER TABLE `tb_kategori_laba_rugi`
  MODIFY `id_kat_laba_rugi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_transaksi_fkid` FOREIGN KEY (`file_id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`) ON DELETE CASCADE;

--
-- Constraints for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD CONSTRAINT `fk_kat_kat_id` FOREIGN KEY (`id_kat_lr_kat`) REFERENCES `tb_kategori_laba_rugi` (`id_kat_laba_rugi`) ON DELETE CASCADE;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `transaksi_aset_id` FOREIGN KEY (`transaksi_id_aset`) REFERENCES `tb_aset` (`id_aset`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_kategori_idfk` FOREIGN KEY (`transaksi_id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
