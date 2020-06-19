-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 04:07 PM
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
  `id_transaksi` int(11) DEFAULT NULL,
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
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Biaya Perjalanan Dinas'),
(2, 'Sewa Assets'),
(3, 'Biaya Operasional');

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
(2019, '2019-11-10', 20, 'Sewa Gedung &amp; Charge Foto/Shooting (Hj. Rahmatia)<br>', 'DEBIT', 6450000, 1, 2, '2020-06-19 08:29:53'),
(2019, '2019-11-14', 21, '<p>Sewa Gedung &amp; Charge Foto/Shooting (FATIMAH)<br></p>', 'DEBIT', 7950000, 1, 2, '2020-06-19 08:32:45'),
(2019, '2019-11-14', 22, '<p>Biaya pembayaran pemain elekton bulan Oktober 2019<br></p>', 'KREDIT', 4480000, 1, 3, '2020-06-19 08:36:18'),
(2019, '2019-11-01', 23, '<p>Saldo Awal<br></p>', 'DEBIT', 14432643, 1, 3, '2020-06-19 08:39:04'),
(2019, '2019-11-14', 24, '<p>Terima PPH 21<br></p>', 'DEBIT', 268800, 1, 3, '2020-06-19 08:40:39'),
(2019, '2019-11-14', 25, '<p>Biaya Belanja Keperluan Gedung Baruga Lappo Ase Bulan November 2019<br></p>', 'KREDIT', 2000000, 1, 3, '2020-06-19 08:42:11'),
(2019, '2019-11-14', 26, '<p>Biaya Pembelian Air Mineral Sebanyak 225 Dos Bulan Oktober 2019<br></p>', 'KREDIT', 3375000, 1, 3, '2020-06-19 08:44:08'),
(2019, '2019-11-14', 27, '<p>Biaya Laundry Baruga Lappo Ase<br></p>', 'KREDIT', 525000, 1, 3, '2020-06-19 08:48:24'),
(2019, '2019-11-14', 28, '<p>Biaya upah petugas kebersihan baruga lappo ase&nbsp; November a/n Adim Yusuf BBA<br></p>', 'KREDIT', 1040000, 1, 3, '2020-06-19 08:53:27'),
(2019, '2019-11-14', 29, '<p>Terima PPH 21<br></p>', 'DEBIT', 72300, 1, 3, '2020-06-19 08:54:40'),
(2019, '2019-12-14', 30, '<p>MUSSUARDI<br></p>', 'DEBIT', 1000000, 1, 3, '2020-06-19 08:56:07'),
(2019, '2019-12-01', 31, '<p>INDRIANY<br></p>', 'DEBIT', 1000000, 1, 3, '2020-06-19 08:59:18'),
(2019, '2019-12-01', 32, '<p>Terima dari fotografer mahkota Oktober 2019<br></p>', 'DEBIT', 2100000, 1, 3, '2020-06-19 09:01:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id_files`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `tb_aset`
--
ALTER TABLE `tb_aset`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

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
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`transaksi_id_kategori`) REFERENCES `tb_kategori` (`id_kategori`),
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`transaksi_id_aset`) REFERENCES `tb_aset` (`id_aset`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
