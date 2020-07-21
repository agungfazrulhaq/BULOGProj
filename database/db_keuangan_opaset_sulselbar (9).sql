-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2020 at 02:41 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `saldo_awal_mutasi`
--

CREATE TABLE `saldo_awal_mutasi` (
  `id_saldo_awal` int(11) NOT NULL,
  `saldo_awal` float NOT NULL,
  `bulan` varchar(5) NOT NULL
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
(3, 'GEDUNG OLAH RAGA (GOR)'),
(4, 'MESS MALINO'),
(6, 'UNIT RUKO DAN LAHAN'),
(7, 'OPERASIONAL ATM'),
(8, 'RUMAH DINAS'),
(9, 'BANK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurnal`
--

CREATE TABLE `tb_jurnal` (
  `id_jurnal` int(11) NOT NULL,
  `nama_jurnal` varchar(255) NOT NULL,
  `pyd_stat` tinyint(1) NOT NULL,
  `jurnal_id_aset` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `jenistransaksi_jurnal` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jurnal`
--

INSERT INTO `tb_jurnal` (`id_jurnal`, `nama_jurnal`, `pyd_stat`, `jurnal_id_aset`, `bulan`, `tahun`, `jenistransaksi_jurnal`) VALUES
(9, 'Jurnal Pencatatan . . .', 1, 1, 1, 2020, 1),
(10, 'Jurnal untuk pencatatan . . . .', 0, 1, 1, 2020, 0),
(13, 'Jurnal untuk pencatatan PPN', 0, 6, 1, 2020, 0),
(14, 'Jurnal untuk pencatatan...', 0, 7, 1, 2020, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurnal_transaksi`
--

CREATE TABLE `tb_jurnal_transaksi` (
  `id_jt` int(11) NOT NULL,
  `nama_jt` varchar(255) NOT NULL,
  `jt_id_kategori` int(11) NOT NULL,
  `jt_id_jurnal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jurnal_transaksi`
--

INSERT INTO `tb_jurnal_transaksi` (`id_jt`, `nama_jt`, `jt_id_kategori`, `jt_id_jurnal`) VALUES
(3, 'Hutang PPN', 33, 10),
(6, 'Pendapatan sewa', 28, 9),
(11, 'PPN', 33, 13),
(12, 'Pembelian voucher', 35, 14);

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
(1, 'Saldo Awal', 12),
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
(31, 'Biaya Penyusutan', 11),
(32, 'Biaya PPH', 13),
(33, 'PPN', 14),
(34, 'PPH', 14),
(35, 'HUTANG LAINNYA', 13);

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
(11, 'biaya bunga & penyusutan', 'KREDIT', 'lain'),
(12, 'saldo awal', 'DEBIT', 'none'),
(13, 'hutang', 'DEBIT', 'none'),
(14, 'bayar pajak', 'KREDIT', 'none');

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
  `waktuupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `transaksi_id_user` int(11) DEFAULT NULL,
  `saldoawal` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`tahun`, `tanggal`, `id_transaksi`, `uraian`, `ref`, `saldo`, `transaksi_id_aset`, `transaksi_id_kategori`, `waktuupdate`, `transaksi_id_user`, `saldoawal`) VALUES
(2019, '2019-11-01', 34, 'Terima PPH 21', 'D77', 268800, 1, 32, '2020-07-09 06:23:05', 1, NULL),
(2019, '2019-11-01', 37, 'Biaya Laundry Baruga Lappo Ase', 'K3', 525000, 1, 26, '2020-06-22 17:40:41', NULL, NULL),
(2019, '2019-11-03', 38, 'Biaya upah petugas kebersihan Baruga Lappo Ase November a/n Adim Yusuf BBA', 'K4', 1040000, 1, 20, '2020-06-22 17:41:08', NULL, NULL),
(2019, '2019-11-03', 39, 'Terima PPH 21', 'D78', 72300, 1, 32, '2020-07-09 06:23:17', 1, NULL),
(2019, '2019-11-04', 40, 'MUSSUARDI', 'D4', 1000000, 1, 28, '2020-06-22 17:42:07', NULL, NULL),
(2019, '2019-11-04', 41, 'INDRIANY', 'D6', 1000000, 1, 28, '2020-06-22 17:42:29', NULL, NULL),
(2019, '2019-11-04', 42, 'Terima dari fotografer mahkota Oktober 2019', 'D21', 2100000, 1, 28, '2020-06-22 17:56:17', NULL, NULL),
(2019, '2019-11-04', 43, 'Gedung (RULY SUYANTO)', 'D8', 7550000, 1, 12, '2020-06-22 17:43:09', NULL, NULL),
(2019, '2019-11-05', 44, 'GUSMAN', 'D9', 1000000, 1, 28, '2020-06-22 17:43:40', NULL, NULL),
(2019, '2019-11-05', 45, 'HARDI PRASETYO', 'D10', 1000000, 1, 28, '2020-06-22 17:43:59', NULL, NULL),
(2019, '2019-11-06', 46, 'DEWI ANAGUSTIWI', 'D11', 1000000, 1, 28, '2020-06-22 17:44:24', NULL, NULL),
(2019, '2019-11-06', 47, 'Biaya pembelian bensin dan e-toll', 'K5', 150000, 1, 19, '2020-06-22 17:44:55', NULL, NULL),
(2019, '2019-11-06', 48, 'Biaya Laundry Baruga Lappo Ase', 'K6', 476000, 1, 20, '2020-06-22 17:45:41', NULL, NULL),
(2019, '2019-11-06', 49, 'Biaya upah pemasangan listrik untuk ruko', 'K7', 500000, 1, 18, '2020-06-22 17:46:09', NULL, NULL),
(2019, '2019-11-08', 50, 'Biaya pemasangan baru KWH token Ruko Kompleks Bulog (HALID)', 'K8', 4456000, 1, 18, '2020-06-22 17:46:42', NULL, NULL),
(2019, '2019-11-08', 51, 'Biaya Laundry Baruga Lappo Ase', 'K9', 364000, 1, 20, '2020-06-22 17:47:03', NULL, NULL),
(2019, '2019-11-08', 52, 'Bayar PPH 21 Baruga Oktober 2019', 'K10', 1313700, 1, 34, '2020-07-09 07:05:50', NULL, NULL),
(2019, '2019-11-08', 53, 'Biaya PPH Pasal 22 Atas pembelian Cover Kursi Baruga', 'K11', 595362, 1, 26, '2020-06-22 17:47:53', NULL, NULL),
(2019, '2019-11-08', 54, 'Bayar PPH Pasal 4 Ayat 2 Baruga Oktober 2019', 'K12', 12000000, 1, 34, '2020-07-09 07:05:50', NULL, NULL),
(2019, '2019-11-08', 55, 'Biaya makan tamu', 'K13', 128000, 1, 26, '2020-06-22 17:48:42', NULL, NULL),
(2019, '2019-11-09', 56, 'Biaya upah petugas kebersihan Baruga Lappo Ase November a/n Denan', 'K14', 1040000, 1, 20, '2020-06-22 17:49:22', NULL, NULL),
(2019, '2019-11-09', 57, 'Terima PPH 21', 'D79', 72300, 1, 32, '2020-07-09 06:23:29', 1, NULL),
(2019, '2019-11-09', 58, 'Biaya upah petugas kebersihan Baruga Lappo Ase November a/n Fatma', 'K15', 1040000, 1, 20, '2020-06-22 17:52:04', NULL, NULL),
(2019, '2019-11-09', 59, 'Terima PPH 21', 'D13', 72300, 1, 32, '2020-07-09 06:32:05', NULL, NULL),
(2019, '2019-11-10', 60, 'Biaya upah petugas kebersihan Baruga Lappo Ase November a/n Hj Rahmatiah', 'K17', 1040000, 1, 20, '2020-06-22 17:51:35', NULL, NULL),
(2019, '2019-11-10', 61, 'Terima PPH 21', 'D14', 72300, 1, 32, '2020-07-09 06:32:05', NULL, NULL),
(2019, '2019-11-11', 62, 'ADNAN TAHIR', 'D15', 1000000, 1, 28, '2020-06-22 17:52:52', NULL, NULL),
(2019, '2019-11-11', 63, 'LEVI', 'D16', 1000000, 1, 28, '2020-06-22 17:53:19', NULL, NULL),
(2019, '2019-11-11', 64, 'Gedung & Charge Foto/Shooting (Hj. SARAWIAH)', 'D17', 7950000, 1, 12, '2020-06-22 17:53:36', NULL, NULL),
(2019, '2019-11-11', 65, 'Gedung & Charge Foto/Shooting (GUSMAN)', 'D18', 7950000, 1, 12, '2020-06-22 17:53:52', NULL, NULL),
(2019, '2019-11-12', 66, 'MIRNAWATI', 'D19', 1000000, 1, 28, '2020-06-22 17:54:07', NULL, NULL),
(2019, '2019-11-12', 67, 'Gedung & Charge Catering (SUTRIANI RIFAI)', 'D20', 8550000, 1, 12, '2020-06-22 17:54:29', NULL, NULL),
(2019, '2019-11-12', 69, 'Biaya penambahan pipa jalur kilometer PDAM', 'K19', 400000, 1, 20, '2020-06-22 17:58:46', NULL, NULL),
(2019, '2019-11-13', 71, 'Biaya Laundry Baruga Lappo Ase', 'K21', 744000, 1, 20, '2020-06-22 18:02:17', NULL, NULL),
(2019, '2019-11-14', 72, 'Biaya penyambungan penambahan pipa ke masing-masing ruko', 'K22', 1000000, 1, 20, '2020-06-22 18:03:48', NULL, NULL),
(2019, '2019-11-14', 74, 'Biaya upah petugas kebersihan baruga lappo ase November a/n Fatima', 'K24', 1040000, 1, 20, '2020-06-22 20:45:57', NULL, NULL),
(2019, '2019-11-14', 75, 'Terima PPH 21', 'D7', 72300, 1, 32, '2020-07-09 06:32:05', NULL, NULL),
(2019, '2019-11-15', 77, 'Biaya pembayaran upah tukang pengerjaan instalasi listrik ATM CENTER', 'K26', 1300000, 1, 20, '2020-06-22 20:49:16', NULL, NULL),
(2019, '2019-11-17', 78, 'Biaya upah petugas kebersihan Baruga Lappo Ase November a/n Ruly Suyanto', 'K27', 1040000, 1, 20, '2020-06-22 20:51:13', NULL, NULL),
(2019, '2019-11-17', 79, 'Terima PPH 21', 'D23', 72300, 1, 32, '2020-07-09 06:32:05', NULL, NULL),
(2019, '2019-11-18', 80, 'Gedung (NURDIAH)', 'D24', 8000000, 1, 12, '2020-06-22 20:53:54', NULL, NULL),
(2019, '2019-11-18', 81, 'Gedung & Charge foto/shooting (INDRIANI SE) ex', 'D59', 7950000, 1, 12, '2020-07-14 06:27:13', 1, NULL),
(2020, '2020-09-16', 85, 'this is a testing datax', 'D22', 213944.22, 3, 28, '2020-06-29 02:09:57', 2, NULL),
(2019, '2019-11-12', 86, 'dsjasjdasja', 'K29', 222111, 1, 15, '2020-07-01 07:29:47', 1, NULL),
(2020, '2020-07-20', 87, 'kldkldasd', 'D2', 2244422, 1, 12, '2020-07-01 07:30:14', 1, NULL),
(2019, '2019-11-01', 115, 'Saldo awal bulan November 2019', '-', 2000000, 1, 1, '2020-07-02 07:29:40', 1, 1),
(2019, '2019-04-19', 116, 'Saldo Awal Bulan April 2019', '-', 11000000, 1, 1, '2020-07-03 02:16:07', 1, 1),
(2020, '2020-01-01', 117, 'Saldo awal bulan Januari 2020\r\n', '-', 17971268, 1, 1, '2020-07-07 20:50:03', 1, 1),
(2020, '2020-01-02', 118, 'Gedung - FATMAWATI (Rabu 15 Januari 20 Siang)', 'D1', 7145000, 1, 12, '2020-07-07 21:02:28', 1, 1),
(2020, '2020-01-02', 119, 'Charge Catering - FATMAWATI (Rabu 15 Januari 20 Siang)\r\n', 'D2', 1000000, 1, 12, '2020-07-07 21:02:36', 1, 1),
(2020, '2020-01-02', 120, 'Biaya belanja keperluan gedung baruga lappo Ase Januari 2020																\r\n', 'K1', 2000000, 1, 14, '2020-07-07 21:01:30', 1, 1),
(2020, '2020-01-02', 121, 'Pembayaran listrik gedung Baruga lappo ase Januari 2020																\r\n', 'K2', 3697009, 1, 14, '2020-07-07 21:24:01', 1, NULL),
(2020, '2020-01-02', 122, 'Biaya Laundry Baruga Lappo Ase  																\r\n', 'K3', 700000, 1, 14, '2020-07-07 21:24:37', 1, NULL),
(2020, '2020-01-06', 124, 'Biaya upah petugas kebersihan baruga lappo Ase Januari a/n Diyan																\r\n', 'K4', 1040000, 1, 20, '2020-07-07 21:26:43', 1, NULL),
(2020, '2020-01-06', 125, 'Terima PPH 21																\r\n', 'D4', 72300, 1, 32, '2020-07-09 06:32:05', 1, NULL),
(2020, '2020-01-06', 126, 'Gedung - ADNAN TAHIR (Rabu 12 Januari 20 Siang)\r\n', 'D5', 7325000, 1, 12, '2020-07-07 21:29:25', 1, NULL),
(2020, '2020-01-06', 127, 'Charge foto/shooting - ADNAN TAHIR (Rabu 12 Januari 20 Siang)\r\n', 'D6', 400000, 1, 12, '2020-07-07 21:30:45', 1, NULL),
(2020, '2020-01-06', 128, 'Pembelian Kabel Utuk Gedung Baruga LappoAse																\r\n', 'K5', 200000, 1, 14, '2020-07-07 21:31:30', 1, NULL),
(2020, '2020-01-08', 129, 'Terima Cetring Fatimah 500 Fax januari 2020																\r\n', 'D7', 500000, 1, 28, '2020-07-07 21:32:15', 1, NULL),
(2020, '2020-01-08', 130, 'Hj. MURNI (Sabtu 07 Maret 20 Siang)\r\n', 'D8', 1000000, 1, 28, '2020-07-07 21:33:07', 1, NULL),
(2020, '2020-01-09', 131, 'Gedung - ANDI SIFA (Sabtu 25 Januari 20 Siang)\r\n', 'D9', 7325000, 1, 12, '2020-07-07 21:34:48', 1, NULL),
(2020, '2020-01-10', 132, 'Biaya Laundry Baruga Lappo Ase  																\r\n', 'K6', 616000, 1, 14, '2020-07-07 21:35:27', 1, NULL),
(2020, '2020-01-10', 133, 'Bayar PPN Baruga Lappo Ase Bulan Desember 2019																\r\n', 'K53', 9466364, 1, 33, '2020-07-09 06:53:55', 1, NULL),
(2020, '2020-01-10', 134, 'Bayar PPH 21 Baruga Lappo Ase Bulan Desember 2019																\r\n', 'K8', 1274400, 1, 34, '2020-07-09 07:05:50', 1, NULL),
(2020, '2020-01-10', 135, 'Pembayaran PPH Pasal 4 (2) Baruga Bulan Desember 2019																\r\n', 'K9', 9466364, 1, 22, '2020-07-07 21:37:45', 1, NULL),
(2020, '2020-01-11', 136, 'Biaya upah petugas kebersihan baruga lappo Ase Januari a/n Haerullah																\r\n', 'K10', 1040000, 1, 20, '2020-07-07 21:38:38', 1, NULL),
(2020, '2020-01-11', 137, 'Terima PPH 21																\r\n', 'D10', 72300, 1, 32, '2020-07-09 06:32:05', 1, NULL),
(2020, '2020-01-11', 138, 'Biaya upah petugas kebersihan baruga lappo Ase Januari a/n Adnan Tahir																\r\n', 'K11', 1040000, 1, 20, '2020-07-07 21:39:53', 1, NULL),
(2020, '2020-01-11', 139, 'Terima PPH 21																\r\n', 'D11', 72300, 1, 32, '2020-07-09 06:32:05', 1, NULL),
(2020, '2020-01-11', 140, 'Biaya upah petugas kebersihan baruga lappo Ase Januari a/n Fatma																\r\n', 'K12', 1040000, 1, 20, '2020-07-07 21:40:44', 1, NULL),
(2020, '2020-01-11', 141, 'Terima PPH 21																\r\n', 'D12', 72300, 1, 32, '2020-07-09 06:32:05', 1, NULL),
(2020, '2020-01-12', 142, 'Gedung - ROSMIAH/LAODE (Minggu 26 Januari 20 Siang)\r\n', 'D13', 7775000, 1, 12, '2020-07-07 21:43:20', 1, NULL),
(2020, '2020-01-12', 143, 'Charge Catering - ROSMIAH/LAODE (Minggu 26 Januari 20 Siang)\r\n', 'D14', 1000000, 1, 12, '2020-07-07 21:44:29', 1, NULL),
(2020, '2020-01-13', 144, 'HERIADI MARDI (Sabtu 11 April 20 Siang)\r\n', 'D15', 1000000, 1, 28, '2020-07-07 21:47:22', 1, NULL),
(2020, '2020-01-15', 145, 'Pembayaran Air mineral 120 dos Baruga Lappo Ase Januari 2020																\r\n', 'K22', 1800000, 1, 14, '2020-07-07 22:35:42', 1, NULL),
(2020, '2020-01-21', 146, 'Terima Cetring Balqis 500 Fax  januari 2020																\r\n', 'D40', 500000, 1, 28, '2020-07-07 22:36:14', 1, NULL),
(2020, '2020-01-21', 147, 'Wahyu Panco Sentosa												\r\n', 'D16', 1000000, 1, 28, '2020-07-07 22:36:29', 1, NULL),
(2020, '2020-01-22', 148, 'Bayar Gaji Petugas Kebersihan Baruga Lappo Ase Bulan Januari 2020', 'K13', 1900000, 1, 16, '2020-07-07 22:36:42', 1, NULL),
(2020, '2020-01-22', 149, 'Terima PPH 21', 'D17', 114000, 1, 32, '2020-07-09 06:32:05', 1, NULL),
(2020, '2020-01-22', 150, 'Biaya Makan Petugas Baruga Lappo Ase Bulan Januari 2020																\r\n', 'K14', 440000, 1, 16, '2020-07-07 22:37:11', 1, NULL),
(2020, '2020-01-22', 151, 'Terima PPH 21', 'D18', 26400, 1, 32, '2020-07-09 06:32:05', 1, NULL),
(2020, '2020-01-22', 152, 'Bayar Biaya Pemain Elekton Bulan Januari 2020																\r\n', 'K15', 1920000, 1, 14, '2020-07-07 22:37:36', 1, NULL),
(2020, '2020-01-22', 153, 'Terima PPH 21', 'D20', 115200, 1, 32, '2020-07-09 06:32:05', 1, NULL),
(2020, '2020-01-23', 155, 'DARMAWAN (Djamila)', 'D19', 1000000, 1, 12, '2020-07-07 22:37:55', 1, NULL),
(2020, '2020-01-24', 156, 'ERNAWATI', 'D21', 1000000, 1, 12, '2020-07-07 22:38:05', 1, NULL),
(2020, '2020-01-24', 157, 'Gedung - MAERIDORA MAKIOLOHA', 'D22', 7325000, 1, 12, '2020-07-07 22:38:34', 1, NULL),
(2020, '2020-01-24', 158, 'Gedung - MARDIA, BSC', 'D23', 7325000, 1, 12, '2020-07-07 22:38:44', 1, NULL),
(2020, '2020-01-24', 159, 'Charge Foto/Shooting - MARDIA, BSC', 'D24', 400000, 1, 12, '2020-07-07 22:38:54', 1, NULL),
(2020, '2020-01-24', 160, 'Gedung - SUTRIANI', 'D25', 7325000, 1, 12, '2020-07-07 22:39:02', 1, NULL),
(2020, '2020-01-24', 161, 'Charge Catering - SUTRIANI', 'D26', 1000000, 1, 12, '2020-07-07 22:39:10', 1, NULL),
(2020, '2020-01-24', 162, 'Charge Foto/Shooting - SUTRIANI', 'D35', 400000, 1, 12, '2020-07-07 22:39:33', 1, NULL),
(2020, '2020-01-25', 171, 'Biaya upah petugas kebersihan baruga lappo Ase Januari a/n Andi Sira																\r\n', 'K21', 1040000, 1, 16, '2020-07-07 22:39:42', 1, NULL),
(2020, '2020-01-25', 172, 'Terima PPH 21', 'D28', 72300, 1, 32, '2020-07-09 06:32:05', 1, NULL),
(2020, '2020-01-25', 173, 'Biaya upah petugas kebersihan baruga lappo Ase Januari a/n Rosmiah																\r\n', 'K16', 1040000, 1, 16, '2020-07-07 22:40:58', 1, NULL),
(2020, '2020-01-25', 174, 'Terima PPH 21', 'D36', 72300, 1, 32, '2020-07-09 06:32:05', 1, NULL),
(2020, '2020-01-28', 175, 'TITIN INDRIANI', 'D37', 1000000, 1, 12, '2020-07-07 22:41:36', 1, NULL),
(2020, '2020-01-28', 176, 'Gedung - NIRWANA', 'D31', 7775000, 1, 12, '2020-07-07 22:41:45', 1, NULL),
(2020, '2020-01-28', 177, 'Charge Catering - NIRWANA', 'D32', 1000000, 1, 12, '2020-07-07 22:41:54', 1, NULL),
(2020, '2020-01-28', 178, 'Charge Foto/Shooting - NIRWANA', 'D33', 400000, 1, 12, '2020-07-07 22:42:04', 1, NULL),
(2020, '2020-01-29', 179, 'WARDA PUSPITA', 'D27', 1000000, 1, 12, '2020-07-07 22:39:23', 1, NULL),
(2020, '2020-01-29', 180, 'Gedung - ST DAHYATUL QULBI', 'D29', 7325000, 1, 12, '2020-07-07 22:40:02', 1, NULL),
(2020, '2020-01-27', 181, 'Biaya Tehnisi Gedung Baruga Lappo Ase Januari 2020																\r\n', 'K18', 480000, 1, 16, '2020-07-07 22:41:20', 1, NULL),
(2020, '2020-01-27', 183, 'Terima PPH 21', 'D30', 28800, 1, 32, '2020-07-09 06:32:05', 1, NULL),
(2020, '2020-01-28', 184, 'Terima Cetring Balkis 450 Fax januari 2020																\r\n', 'D34', 450000, 1, 28, '2020-07-07 22:42:13', 1, NULL),
(2020, '2020-01-28', 185, 'Pembyaran Biaya Sewa AC Bulan Juli & Agustus Tahun 2019																\r\n', 'K19', 13000000, 1, 20, '2020-07-07 22:42:22', 1, NULL),
(2020, '2020-01-28', 186, ' Terima Biiaya Penggantian Ac dan Neon Boks ATM Center 																\r\n', 'D38', 10660000, 1, 28, '2020-07-07 22:42:30', 1, NULL),
(2020, '2020-01-31', 187, 'Pembayaran Denda Pajak Tahun 2019																\r\n', 'K17', 12480, 1, 26, '2020-07-07 22:38:16', 1, NULL),
(2020, '2020-01-01', 188, 'Saldo Awal Bulan Januari 2020', '-', 15755353, 2, 1, '2020-07-07 22:35:23', 1, 1),
(2020, '2020-01-02', 189, 'Pembayaran listrik Wisma lappo ase Januari 2020																\r\n', 'K24', 3872935, 2, 18, '2020-07-07 22:45:03', 1, NULL),
(2020, '2020-01-02', 190, 'Pembayaran Air Wisma lappo ase Desember 2020																\r\n', 'K23', 791620, 2, 18, '2020-07-07 22:44:49', 1, NULL),
(2020, '2020-01-02', 191, 'Terima Sewa Kamar dari Acara Baruga Lappo Ase an (Fatmawati) tgl 15 Januari 2020																\r\n', 'D42', 225000, 2, 13, '2020-07-07 22:46:22', 1, NULL),
(2020, '2020-01-06', 192, 'Terima Sewa Kamar dari Acara Baruga Lappo Ase an (Adnan Tahir) tgl 12 Januari 2020																\r\n', 'D41', 225000, 2, 13, '2020-07-07 22:46:08', 1, NULL),
(2020, '2020-01-06', 193, 'Biaya Laundry Wisma   Lappo Ase																\r\n', 'K20', 679000, 2, 20, '2020-07-07 22:48:26', 1, NULL),
(2020, '2020-01-09', 194, 'Terima Sewa Kamar dari Acara Baruga Lappo Ase an ( Andi Sifa) tgl 25 Januari 2020																\r\n', 'D39', 225000, 2, 13, '2020-07-07 22:49:06', 1, NULL),
(2020, '2020-01-10', 195, 'Biaya Laundry Wisma   Lappo Ase																\r\n', 'K25', 975000, 2, 20, '2020-07-07 22:49:44', 1, NULL),
(2020, '2020-01-10', 196, 'Bayar PPN Wisma Lappo Ase Bulan Desember 2019																\r\n', 'K26', 515909, 2, 33, '2020-07-09 06:58:57', 1, NULL),
(2020, '2020-01-10', 197, 'Bayar PPH 21 Wisma Lappo Ase Bulan Desember 2019																\r\n', 'K27', 204000, 2, 34, '2020-07-09 07:05:50', 1, NULL),
(2020, '2020-01-10', 198, 'Pembayran PPH Pasal 4 (2) Wisma Bulan Desember 2019																\r\n', 'K28', 515909, 2, 22, '2020-07-07 22:51:47', 1, NULL),
(2020, '2020-01-12', 199, 'Terima Sewa Kamar dari Acara Baruga Lappo Ase an ( Rosmiah) tgl 26 Januari 2020																\r\n', 'D44', 225000, 2, 13, '2020-07-07 22:53:16', 1, NULL),
(2020, '2020-01-22', 200, 'Bayar Gaji Petugas Kebersihan Wisma Lappo Ase Bulan Januari 2020 (IRWAN)																\r\n', 'K29', 1500000, 2, 16, '2020-07-07 22:53:45', 1, NULL),
(2020, '2020-01-22', 201, 'Terima PPH 21', 'D43', 90000, 2, 32, '2020-07-09 06:32:05', 1, NULL),
(2020, '2020-01-22', 202, 'Bayar Gaji Petugas Kebersihan Wisma Lappo Ase Bulan Januari 2020 (M. NUR HALIK.)																\r\n', 'K30', 1500000, 2, 16, '2020-07-07 22:54:44', 1, NULL),
(2020, '2020-01-22', 203, 'Terima PPH 21', 'D45', 90000, 2, 32, '2020-07-09 06:32:05', 1, NULL),
(2020, '2020-01-22', 204, 'Biaya Makan Petugas Wisma Lappo Ase Bulan Januari 2020																\r\n', 'K31', 440000, 2, 16, '2020-07-07 22:55:36', 1, NULL),
(2020, '2020-01-22', 205, 'Terima PPH 21', 'D46', 26400, 2, 32, '2020-07-09 06:32:05', 1, NULL),
(2020, '2020-01-24', 206, 'Terima Sewa Kamar dari Acara Baruga Lappo Ase an ( Maridora) tgl 02 Februari 2020																\r\n', 'D47', 225000, 2, 13, '2020-07-07 22:56:27', 1, NULL),
(2020, '2020-01-24', 207, 'Terima Sewa Kamar dari Acara Baruga Lappo Ase an ( Mardia, BSC) tgl 02 Februari 2020																\r\n', 'D48', 225000, 2, 13, '2020-07-07 22:56:45', 1, NULL),
(2020, '2020-01-24', 208, 'Terima Sewa Kamar dari Acara Baruga Lappo Ase an (Sutriani) tgl 01 Februari 2020																\r\n', 'D49', 225000, 2, 13, '2020-07-07 22:57:01', 1, NULL),
(2020, '2020-01-24', 209, 'Biaya Laundry Wisma   Lappo Ase																\r\n', 'K32', 672000, 2, 20, '2020-07-07 22:57:28', 1, NULL),
(2020, '2020-01-28', 210, 'Terima Sewa Kamar dari Acara Baruga Lappo Ase an (Nirwana) 15 Maret 2020																\r\n', 'D50', 225000, 2, 13, '2020-07-07 22:58:31', 1, NULL),
(2020, '2020-01-28', 211, 'Terima sewa kamar 1 satu malam an. Pa Mahcmud																\r\n', 'D53', 250000, 2, 13, '2020-07-07 23:00:42', 1, NULL),
(2020, '2020-01-28', 212, 'Terima sewa kamar 1 satu malam an. Ibu Badra																\r\n', 'D52', 225000, 2, 13, '2020-07-07 22:59:05', 1, NULL),
(2020, '2020-01-28', 213, 'Terima Tambahan AP Gred Kamar an. Siti Dahyawi																\r\n', 'D54', 50000, 2, 13, '2020-07-07 23:00:16', 1, NULL),
(2020, '2020-01-28', 214, 'Biaya Kebutuhan Wisma Lappo Ase																\r\n', 'K33', 792300, 2, 20, '2020-07-07 22:59:50', 1, NULL),
(2020, '2020-07-29', 215, 'Terima Sewa Kamar dari Acara Baruga Lappo Ase an (ST. Dayatul Qolbi) tgl 23 Februari 2020																\r\n', 'D51', 225000, 2, 13, '2020-07-07 23:01:11', 1, NULL),
(2020, '2020-01-10', 217, 'Pembayaran listrik Lapangan tennis Januari 2020																\r\n', 'K38', 432098, 3, 18, '2020-07-07 23:04:08', 1, NULL),
(2020, '2020-01-02', 218, 'Pembayaran listrik Gedung Serba Guna Pr Dolog  Januari 2020																\r\n', 'K35', 2367066, 3, 18, '2020-07-07 23:03:11', 1, NULL),
(2020, '2020-01-10', 219, 'Bayar PPN GOR Bulan Desember 2019																\r\n', 'K36', 1220000, 3, 33, '2020-07-09 06:58:57', 1, NULL),
(2020, '2020-01-10', 220, 'Pembayaran PPH Pasal 4 (2) GOR Bulan Desember 2019																\r\n', 'K37', 1220000, 3, 22, '2020-07-07 23:03:58', 1, NULL),
(2020, '2020-01-10', 221, 'Bayar PPH 21 GOR Bulan Desember 2019																\r\n', 'K34', 30000, 3, 34, '2020-07-09 07:05:50', 1, NULL),
(2020, '2020-01-24', 222, 'Terima Sewa Lapangan Bulutangkis Bulan Januari BRI SUNGGUMINASA																\r\n', 'D55', 480000, 3, 12, '2020-07-07 23:04:58', 1, NULL),
(2020, '2020-01-27', 223, 'Bayar Upah kebersihan GOR Januari 2020																\r\n', 'K39', 500000, 3, 16, '2020-07-07 23:05:24', 1, NULL),
(2020, '2020-01-27', 224, 'Terima PPH 21', 'D56', 30000, 3, 32, '2020-07-09 06:32:05', 1, NULL),
(2020, '2020-01-27', 225, 'Terima sewa lapangan bulutangkis bulan Januari 2020 an. PB ERICK																\r\n', 'D57', 480000, 3, 12, '2020-07-07 23:06:14', 1, NULL),
(2020, '2020-01-27', 226, 'Terima Sewa Lapangan Perjam Bulutangkis Bulan Januari 2020 an. SYAMSUDDIN																\r\n', 'D58', 840000, 3, 12, '2020-07-07 23:06:38', 1, NULL),
(2020, '2020-01-27', 228, 'Terima sewa lapangan bulutangkis bulan Januari 2020 an. PB AAUI																\r\n', 'D60', 480000, 3, 12, '2020-07-07 23:10:37', 1, NULL),
(2020, '2020-01-27', 229, 'Terima sewa lapangan bulutangkis bulan Januari 2020 an. PB ADHI KARYA																\r\n', 'D61', 720000, 3, 12, '2020-07-07 23:10:54', 1, NULL),
(2020, '2020-01-27', 230, 'Terima sewa lapangan bulutangkis bulan Januari 2020 an. PB PALLAWA																\r\n', 'D62', 960000, 3, 12, '2020-07-07 23:11:10', 1, NULL),
(2020, '2020-01-27', 231, 'Terima sewa lapangan bulutangkis bulan Januari 2020 an. PB RONIN																\r\n', 'D63', 480000, 3, 12, '2020-07-07 23:11:29', 1, NULL),
(2020, '2020-01-27', 232, 'Terima sewa lapangan bulutangkis bulan Januari 2020 an. PB RERENA																\r\n', 'D64', 480000, 3, 12, '2020-07-07 23:11:44', 1, NULL),
(2020, '2020-01-27', 233, 'Terima sewa lapangan bulutangkis bulan Januari 2020 an. PB BAPENDA																\r\n', 'D65', 960000, 3, 12, '2020-07-07 23:12:01', 1, NULL),
(2020, '2020-01-27', 234, 'Terima sewa lapangan bulutangkis bulan Januari 2020 an. PB DEPAG																\r\n', 'D66', 1200000, 3, 12, '2020-07-07 23:12:17', 1, NULL),
(2020, '2020-01-28', 236, 'Terima sewa lapangan bulutangkis bulan Januari 2020 an. PB LASTON																\r\n', 'D68', 2500000, 3, 12, '2020-07-07 23:12:49', 1, NULL),
(2020, '2020-01-28', 237, 'Terima sewa lapangan bulutangkis bulan Januari 2020 an. PB SILOAM																\r\n', 'D69', 1080000, 3, 12, '2020-07-07 23:13:05', 1, NULL),
(2020, '2020-01-01', 242, 'Saldo Awal Bulan Januari 2020', '-', 7839844, 6, 1, '2020-07-07 23:16:52', 1, 1),
(2020, '2020-01-10', 243, 'Bayar PPN CAFE Desember 2019																\r\n', 'K40', 50000, 6, 33, '2020-07-09 06:58:57', 1, NULL),
(2020, '2020-01-10', 244, 'Bayar PPhPasal 4 Ayat 2 CAFE Desember 2019																\r\n', 'K41', 50000, 6, 34, '2020-07-09 07:05:50', 1, NULL),
(2020, '2020-01-01', 245, 'Saldo Awal Bulan Januari 2020', '-', 3190000, 7, 1, '2020-07-07 23:18:26', 1, 1),
(2020, '2020-01-20', 246, 'Pembelian Voucher Listrik ATM Center Bulan Januari 2020																\r\n', 'D80', 1002500, 7, 35, '2020-07-09 07:12:33', 1, NULL),
(2020, '2020-01-01', 247, 'Saldo Awal Bulan Januari 2020', '-', 1100000, 8, 1, '2020-07-07 23:19:36', 1, 1),
(2020, '2020-01-02', 248, 'Terima sewa rumah an Sanas  bulan Desember 2019 s/d Mei 2020																\r\n', 'D70', 5500000, 8, 12, '2020-07-07 23:20:04', 1, NULL),
(2020, '2020-01-10', 249, 'Bayar PPN rumah Dinas Bulan Desember 2019																\r\n', 'K43', 100000, 8, 33, '2020-07-09 06:58:57', 1, NULL),
(2020, '2020-01-10', 250, 'Bayar PPh Pasal 4 Ayat 2 Rumdis Desember 2019																\r\n', 'K44', 100000, 8, 34, '2020-07-09 07:05:50', 1, NULL),
(2020, '2020-01-31', 251, 'Terima sewa rumah an Muhammad Rifai bulan Januari 2020																\r\n', 'D71', 1100000, 8, 12, '2020-07-07 23:21:14', 1, NULL),
(2020, '2020-01-01', 252, 'Saldo Awal Bulan Januari 2020', '-', 335866413.54, 9, 1, '2020-07-07 23:28:51', 1, 1),
(2020, '2020-01-09', 253, 'Jaminan Sewa PT. Trimasindo Global Perkasa\r\n', 'D72', 6500000, 9, 12, '2020-07-07 23:29:24', 1, NULL),
(2020, '2020-01-09', 254, 'Pendapatan sewa Ruko PT. Trimasindo Global Perkasa\r\n', 'D73', 65000000, 9, 12, '2020-07-07 23:29:48', 1, NULL),
(2020, '2020-01-25', 255, 'Bunga Rekening\r\n', 'D74', 318558, 9, 27, '2020-07-07 23:30:34', 1, NULL),
(2020, '2020-01-25', 256, 'Pajak\r\n', 'K45', 63712, 9, 29, '2020-07-07 23:31:18', 1, NULL),
(2020, '2020-01-28', 257, 'Pendapatan sewa lahan & bangunan Mess Malino Jan - Feb 2020\r\n', 'D75', 7200000, 9, 12, '2020-07-07 23:31:48', 1, NULL),
(2020, '2020-01-28', 258, 'Penerimaan Dropping biaya pembangunan penggantian AC ATM Center\r\n', 'D76', 34693000, 9, 12, '2020-07-07 23:32:15', 1, NULL),
(2020, '2020-01-28', 259, 'Setor Pendapatan Sewa Mess Malino Jan 2020 ke Rek RM\r\n', 'K46', 7200000, 9, 26, '2020-07-07 23:33:12', 1, NULL),
(2020, '2020-01-28', 260, 'Setor Pendapatan Sewa PT. Trimasindo Global Perkasa ke Rek RM\r\n', 'K47', 58500000, 9, 14, '2020-07-07 23:33:42', 1, NULL),
(2020, '2020-01-28', 261, 'Setor Pendapatan Sewa ATM Center BRI ke Rek RM\r\n', 'K48', 18181818, 9, 14, '2020-07-07 23:34:06', 1, NULL),
(2020, '2020-01-28', 262, 'Setor Pendapatan Sewa ATM Center BNI ke Rek RM\r\n', 'K49', 50000000, 9, 14, '2020-07-07 23:34:29', 1, NULL),
(2020, '2020-01-28', 263, 'Penarikan Ke Kas PPh 4(2) atas sewa lahan PT Trimasindo Global Perkasa \r\n', 'K50', 6500000, 9, 22, '2020-07-07 23:34:54', 1, NULL),
(2020, '2020-01-28', 264, 'Penarikan Ke Kas atas jaminan sewa Mess Malino 2019\r\n', 'K51', 875000, 9, 14, '2020-07-07 23:36:41', 1, NULL),
(2020, '2020-01-28', 265, 'Penarikan ke Kas atas Penerimaan Dropping biaya pembangunan penggantian AC ATM Center\r\n', 'K52', 34693000, 9, 14, '2020-07-07 23:37:02', 1, NULL),
(2020, '2020-02-01', 266, 'Saldo awal bulan Februari 2020', '-', 57831851, 1, 1, '2020-07-13 08:33:16', NULL, 1),
(2020, '2020-02-01', 267, 'Saldo awal bulan Februari 2020', '-', 5828080, 2, 1, '2020-07-13 08:33:40', NULL, 1),
(2020, '2020-02-01', 268, 'Saldo awal bulan Februari 2020', '-', 21217795, 3, 1, '2020-07-14 00:22:32', NULL, 1),
(2020, '2020-02-01', 269, 'Saldo awal bulan Februari 2020', '-', 7580900, 1, 1, '2020-07-14 06:29:29', 1, 1),
(2020, '2020-01-01', 270, 'Saldo awal bulan Januari 2020', '-', 13896595, 3, 1, '2020-07-14 06:24:11', 1, 1),
(2020, '2020-07-03', 271, 'Dummy', 'D67', 20000, 1, 27, '2020-07-15 00:28:51', 1, NULL),
(2020, '2020-07-10', 272, 'Dummy data', 'D81', 240000, 6, 12, '2020-07-15 04:05:06', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(255) NOT NULL,
  `file_foto` varchar(255) NOT NULL,
  `bidang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nip`, `password`, `nama`, `file_foto`, `bidang`) VALUES
(1, '123456789', '$2y$10$tonZkQrnGnp9n38rWeMTieLPNxtDfvy4Z/35Q4rlFObsm/xFnSae.', 'John Doe', 'profile.jpeg', NULL),
(2, '1301171750', '$2y$10$RrxqFGgF0NftmKw7HsixD.ipK9LIgVbFWamuCTi3we0yisl78uW2a', 'Muhammad Agung Fazrulhaq', 'profile-agung.jpg', 'MAGANG'),
(3, '1103174125', '$2y$10$BD75fMd0Pijqe9UUUOHZkuZB9ABibGlcpfgD3wJRhSuU8mj.XCqxi', 'Muhammad Fachrizal Ramdani', 'formal.jpg', 'INTERNSHIP');

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
-- Indexes for table `saldo_awal_mutasi`
--
ALTER TABLE `saldo_awal_mutasi`
  ADD PRIMARY KEY (`id_saldo_awal`);

--
-- Indexes for table `tb_aset`
--
ALTER TABLE `tb_aset`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `fk_jurnal_aset` (`jurnal_id_aset`);

--
-- Indexes for table `tb_jurnal_transaksi`
--
ALTER TABLE `tb_jurnal_transaksi`
  ADD PRIMARY KEY (`id_jt`),
  ADD KEY `fk_jt_jurnal` (`jt_id_jurnal`),
  ADD KEY `fk_kat_jt` (`jt_id_kategori`);

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
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id_files` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saldo_awal_mutasi`
--
ALTER TABLE `saldo_awal_mutasi`
  MODIFY `id_saldo_awal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_aset`
--
ALTER TABLE `tb_aset`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_jurnal_transaksi`
--
ALTER TABLE `tb_jurnal_transaksi`
  MODIFY `id_jt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_kategori_laba_rugi`
--
ALTER TABLE `tb_kategori_laba_rugi`
  MODIFY `id_kat_laba_rugi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_transaksi_fkid` FOREIGN KEY (`file_id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`) ON DELETE CASCADE;

--
-- Constraints for table `tb_jurnal`
--
ALTER TABLE `tb_jurnal`
  ADD CONSTRAINT `fk_jurnal_aset` FOREIGN KEY (`jurnal_id_aset`) REFERENCES `tb_aset` (`id_aset`);

--
-- Constraints for table `tb_jurnal_transaksi`
--
ALTER TABLE `tb_jurnal_transaksi`
  ADD CONSTRAINT `fk_jt_jurnal` FOREIGN KEY (`jt_id_jurnal`) REFERENCES `tb_jurnal` (`id_jurnal`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_kat_jt` FOREIGN KEY (`jt_id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE;

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
