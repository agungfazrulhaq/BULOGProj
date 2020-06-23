-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2020 at 08:39 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `jenis_transaksi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori_laba_rugi`
--

INSERT INTO `tb_kategori_laba_rugi` (`id_kat_laba_rugi`, `nama_kat_lr`, `jenis_transaksi`) VALUES
(7, 'pendapatan', 'DEBIT'),
(8, 'biaya usaha', 'KREDIT'),
(9, 'biaya umum', 'KREDIT'),
(10, 'pendapatan diluar usaha', 'DEBIT'),
(11, 'biaya bunga & penyusutan', 'KREDIT');

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
  `waktuupdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`tahun`, `tanggal`, `id_transaksi`, `uraian`, `ref`, `saldo`, `transaksi_id_aset`, `transaksi_id_kategori`, `waktuupdate`) VALUES
(2019, '2019-11-01', 30, '<p>Saldo awal bulan November 2019<br></p>', 'D1', 14432643, 1, 28, '2020-06-22 07:16:59'),
(2019, '2019-11-01', 31, '<p>Gedung & Charge Foto/Shooting (Hj. Rahmatia)<br></p>', 'D22', 6450000, 1, 12, '2020-06-23 00:35:58'),
(2019, '2019-11-01', 32, '<p>Gedung & Charge Foto/Shooting (FATIMAH)<br></p>', 'D2', 7950000, 1, 12, '2020-06-23 00:36:27'),
(2019, '2019-11-01', 33, '<p>Biaya pembayaran pemain elekton bulan Oktober 2019<br></p>', 'K18', 4480000, 1, 14, '2020-06-23 00:37:32'),
(2019, '2019-11-01', 34, '<p>Terima PPH 21<br></p>', 'D3', 268800, 1, 28, '2020-06-23 00:38:48'),
(2019, '2019-11-01', 35, '<p>Biaya belanja keperluan Gedung Lappo Ase Bulan November 2019<br></p>', 'K1', 2000000, 1, 14, '2020-06-23 00:39:23'),
(2019, '2019-11-01', 36, '<p>Biaya Pembelian Air mineral sebanyak 225 dus Bulan November 2019<br></p>', 'K2', 3375000, 1, 14, '2020-06-23 00:39:57'),
(2019, '2019-11-01', 37, '<p>Biaya Laundry Baruga Lappo Ase<br></p>', 'K3', 525000, 1, 26, '2020-06-23 00:40:41'),
(2019, '2019-11-03', 38, '<p>Biaya upah petugas kebersihan Baruga Lappo Ase November a/n Adim Yusuf BBA<br></p>', 'K4', 1040000, 1, 20, '2020-06-23 00:41:08'),
(2019, '2019-11-03', 39, '<p>Terima PPH 21<br></p>', 'D5', 72300, 1, 28, '2020-06-23 00:41:19'),
(2019, '2019-11-04', 40, '<p>MUSSUARDI<br></p>', 'D4', 1000000, 1, 28, '2020-06-23 00:42:07'),
(2019, '2019-11-04', 41, '<p>INDRIANY<br></p>', 'D6', 1000000, 1, 28, '2020-06-23 00:42:29'),
(2019, '2019-11-04', 42, '<p>Terima dari fotografer mahkota Oktober 2019<br></p>', 'D21', 2100000, 1, 28, '2020-06-23 00:56:17'),
(2019, '2019-11-04', 43, '<p>Gedung (RULY SUYANTO)<br></p>', 'D8', 7550000, 1, 12, '2020-06-23 00:43:09'),
(2019, '2019-11-05', 44, '<p>GUSMAN<br></p>', 'D9', 1000000, 1, 28, '2020-06-23 00:43:40'),
(2019, '2019-11-05', 45, '<p>HARDI PRASETYO<br></p>', 'D10', 1000000, 1, 28, '2020-06-23 00:43:59'),
(2019, '2019-11-06', 46, '<p>DEWI ANAGUSTIWI<br></p>', 'D11', 1000000, 1, 28, '2020-06-23 00:44:24'),
(2019, '2019-11-06', 47, '<p>Biaya pembelian bensin dan e-toll<br></p>', 'K5', 150000, 1, 19, '2020-06-23 00:44:55'),
(2019, '2019-11-06', 48, '<p>Biaya Laundry Baruga Lappo Ase<br></p>', 'K6', 476000, 1, 20, '2020-06-23 00:45:41'),
(2019, '2019-11-06', 49, '<p>Biaya upah pemasangan listrik untuk ruko<br></p>', 'K7', 500000, 1, 18, '2020-06-23 00:46:09'),
(2019, '2019-11-08', 50, '<p>Biaya pemasangan baru KWH token Ruko Kompleks Bulog (HALID)<br></p>', 'K8', 4456000, 1, 18, '2020-06-23 00:46:42'),
(2019, '2019-11-08', 51, '<p>Biaya Laundry Baruga Lappo Ase<br></p>', 'K9', 364000, 1, 20, '2020-06-23 00:47:03'),
(2019, '2019-11-08', 52, '<p>Bayar PPH 21 Baruga Oktober 2019<br></p>', 'K10', 1313700, 1, 23, '2020-06-23 00:47:31'),
(2019, '2019-11-08', 53, '<p>Biaya PPH Pasal 22 Atas pembelian Cover Kursi Baruga<br></p>', 'K11', 595362, 1, 26, '2020-06-23 00:47:53'),
(2019, '2019-11-08', 54, '<p>Bayar PPH Pasal 4 Ayat 2 Baruga Oktober 2019<br></p>', 'K12', 12000000, 1, 22, '2020-06-23 00:48:27'),
(2019, '2019-11-08', 55, '<p>Biaya makan tamu<br></p>', 'K13', 128000, 1, 26, '2020-06-23 00:48:42'),
(2019, '2019-11-09', 56, '<p>Biaya upah petugas kebersihan Baruga Lappo Ase November a/n Denan<br></p>', 'K14', 1040000, 1, 20, '2020-06-23 00:49:22'),
(2019, '2019-11-09', 57, '<p>Terima PPH 21<br></p>', 'D12', 72300, 1, 28, '2020-06-23 00:49:42'),
(2019, '2019-11-09', 58, '<p>Biaya upah petugas kebersihan Baruga Lappo Ase November a/n Fatma<br></p>', 'K15', 1040000, 1, 20, '2020-06-23 00:52:04'),
(2019, '2019-11-09', 59, '<p>Terima PPH 21<br></p>', 'D13', 72300, 1, 28, '2020-06-23 00:50:31'),
(2019, '2019-11-10', 60, '<p>Biaya upah petugas kebersihan Baruga Lappo Ase November a/n Hj Rahmatiah<br></p>', 'K17', 1040000, 1, 20, '2020-06-23 00:51:35'),
(2019, '2019-11-10', 61, '<p>Terima PPH 21<br></p>', 'D14', 72300, 1, 28, '2020-06-23 00:52:34'),
(2019, '2019-11-11', 62, '<p>ADNAN TAHIR<br></p>', 'D15', 1000000, 1, 28, '2020-06-23 00:52:52'),
(2019, '2019-11-11', 63, '<p>LEVI<br></p>', 'D16', 1000000, 1, 28, '2020-06-23 00:53:19'),
(2019, '2019-11-11', 64, '<p>Gedung & Charge Foto/Shooting (Hj. SARAWIAH)<br></p>', 'D17', 7950000, 1, 12, '2020-06-23 00:53:36'),
(2019, '2019-11-11', 65, '<p>Gedung & Charge Foto/Shooting (GUSMAN)<br></p>', 'D18', 7950000, 1, 12, '2020-06-23 00:53:52'),
(2019, '2019-11-12', 66, '<p>MIRNAWATI<br></p>', 'D19', 1000000, 1, 28, '2020-06-23 00:54:07'),
(2019, '2019-11-12', 67, '<p>Gedung & Charge Catering (SUTRIANI RIFAI)<br></p>', 'D20', 8550000, 1, 12, '2020-06-23 00:54:29'),
(2019, '2019-11-12', 68, '<p>Biaya pembelian kabel IB dan SLO ATM Center<br></p>', 'K16', 210000, 1, 14, '2020-06-23 00:57:54'),
(2019, '2019-11-12', 69, '<p>Biaya penambahan pipa jalur kilometer PDAM<br></p>', 'K19', 400000, 1, 20, '2020-06-23 00:58:46'),
(2019, '2019-11-13', 70, '<p>Biaya pembelian AC Ruko ATM Center<br></p>', 'K20', 3550000, 1, 14, '2020-06-23 00:59:35'),
(2019, '2019-11-13', 71, '<p>Biaya Laundry Baruga Lappo Ase<br></p>', 'K21', 744000, 1, 20, '2020-06-23 01:02:17'),
(2019, '2019-11-14', 72, '<p>Biaya penyambungan penambahan pipa ke masing-masing ruko<br></p>', 'K22', 1000000, 1, 20, '2020-06-23 01:03:48'),
(2019, '2019-11-14', 73, 'Biaya pembelian Neon BOX ATM Center<br>', 'K23', 1500000, 1, 14, '2020-06-23 03:44:02'),
(2019, '2019-11-14', 74, '<p>Biaya upah petugas kebersihan baruga lappo ase November a/n Fatima<br></p>', 'K24', 1040000, 1, 20, '2020-06-23 03:45:57'),
(2019, '2019-11-14', 75, '<p>Terima PPH 21<br></p>', 'D7', 72300, 1, 28, '2020-06-23 03:46:35'),
(2019, '2019-11-15', 76, '<p>Biaya pembelian bahan instalasi listrik ATM Center<br></p>', 'K25', 2022500, 1, 14, '2020-06-23 03:47:56'),
(2019, '2019-11-15', 77, '<p>Biaya pembayaran upah tukang pengerjaan instalasi listrik ATM CENTER<br></p>', 'K26', 1300000, 1, 20, '2020-06-23 03:49:16'),
(2019, '2019-11-17', 78, '<p>Biaya upah petugas kebersihan Baruga Lappo Ase November a/n Ruly Suyanto<br></p>', 'K27', 1040000, 1, 20, '2020-06-23 03:51:13'),
(2019, '2019-11-17', 79, '<p>Terima PPH 21<br></p>', 'D23', 72300, 1, 28, '2020-06-23 03:52:28'),
(2019, '2019-11-18', 80, '<p>Gedung (NURDIAH)<br></p>', 'D24', 8000000, 1, 12, '2020-06-23 03:53:54'),
(2019, '2019-11-18', 81, '<p>Gedung &amp; Charge foto/shooting (INDRIANI SE)<br></p>', 'D25', 7950000, 1, 12, '2020-06-23 03:54:37');

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
  MODIFY `id_files` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_aset`
--
ALTER TABLE `tb_aset`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_kategori_laba_rugi`
--
ALTER TABLE `tb_kategori_laba_rugi`
  MODIFY `id_kat_laba_rugi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

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
