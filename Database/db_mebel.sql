-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2019 at 11:35 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mebel`
--

-- --------------------------------------------------------

--
-- Table structure for table `mbahan`
--

CREATE TABLE `mbahan` (
  `kd_bahan` varchar(10) NOT NULL,
  `nm_bahan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mbahan`
--

INSERT INTO `mbahan` (`kd_bahan`, `nm_bahan`) VALUES
('BN-0001', 'Kayu Ulin'),
('BN-0002', 'Rotan'),
('BN-0003', 'Kayu Ubar'),
('BN-0004', 'Triplek'),
('BN-0005', 'Karet'),
('BN-0006', 'Kayu Sengon'),
('BN-0007', 'Paku'),
('BN-0008', 'Gergaji'),
('BN-0009', 'Palu'),
('BN-0010', 'Kayu 2x2'),
('BN-0011', 'Kayu 2 x 2'),
('BN-0012', 'Kayu 4 x 4');

-- --------------------------------------------------------

--
-- Table structure for table `mpelanggan`
--

CREATE TABLE `mpelanggan` (
  `id_pelanggan` varchar(10) NOT NULL,
  `nama_p` varchar(60) NOT NULL,
  `alamat_p` text NOT NULL,
  `telp_p` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mpelanggan`
--

INSERT INTO `mpelanggan` (`id_pelanggan`, `nama_p`, `alamat_p`, `telp_p`) VALUES
('PL-0001', 'Muhammad Fahmiriadi', 'Jln.Sei Andai, Blok C-D No.29 Rt.12 Banjarmasin Utara', '081347224881'),
('PL-0002', 'Ruspiati', 'Banjarmasin Kota', '088888811111');

-- --------------------------------------------------------

--
-- Table structure for table `mtukang`
--

CREATE TABLE `mtukang` (
  `id_tukang` varchar(10) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mtukang`
--

INSERT INTO `mtukang` (`id_tukang`, `nama`, `alamat`, `telp`) VALUES
('TK-0001', 'Uji coba sistem mebel', 'Jln.Kemuning Raya No.389', '089822326786'),
('TK-0002', 'Muhammad Abdillah', 'Jln.Kemanapun Saja, Asal Kamu dan Aku Bersama', '081928877789'),
('TK-0003', 'asd', 'asd', '99');

-- --------------------------------------------------------

--
-- Table structure for table `tbelibahan`
--

CREATE TABLE `tbelibahan` (
  `no_beli` varchar(16) NOT NULL,
  `no_bahan` varchar(16) NOT NULL,
  `hbeli` int(11) NOT NULL,
  `jumbeli` int(11) NOT NULL,
  `tgl_beli` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbelibahan`
--

INSERT INTO `tbelibahan` (`no_beli`, `no_bahan`, `hbeli`, `jumbeli`, `tgl_beli`, `total`) VALUES
('BL-201910080001', '20191006-DB0002', 12000, 20, '2019-10-09', 240000),
('BL-201910080002', '20191006-DB0001', 120000, 50, '2019-10-09', 6000000),
('BL-201910080003', '20191006-DB0002', 20000, 100, '2019-10-10', 2000000),
('BL-201910200003', '20191006-DB0001', 1, 10, '2019-10-22', 10),
('PS-201910090002', 'PL-0002', 1000000, 3, '2019-10-09', 3000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `nm_user` varchar(10) NOT NULL,
  `sandi` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`nm_user`, `sandi`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tdetailbahan`
--

CREATE TABLE `tdetailbahan` (
  `no_bahan` varchar(16) NOT NULL,
  `kd_bahan` varchar(10) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tdetailbahan`
--

INSERT INTO `tdetailbahan` (`no_bahan`, `kd_bahan`, `harga_satuan`, `stok`) VALUES
('20191006-DB0001', 'BN-0002', 800000, 160),
('20191006-DB0002', 'BN-0003', 200000, 130);

-- --------------------------------------------------------

--
-- Table structure for table `tpemesanan`
--

CREATE TABLE `tpemesanan` (
  `no_pesanan` varchar(16) NOT NULL,
  `id_pelanggan` varchar(10) NOT NULL,
  `jenis` varchar(55) NOT NULL,
  `namabarang` varchar(55) NOT NULL,
  `tanggal` date NOT NULL,
  `biaya` int(11) NOT NULL,
  `jhitung` varchar(25) NOT NULL,
  `jpesanan` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tpemesanan`
--

INSERT INTO `tpemesanan` (`no_pesanan`, `id_pelanggan`, `jenis`, `namabarang`, `tanggal`, `biaya`, `jhitung`, `jpesanan`, `total`) VALUES
('PS-201910090001', 'PL-0001', 'Kayu', 'Meja', '2019-10-09', 200000, 'meter', 2, 400000),
('PS-201910090002', 'PL-0002', 'Kayu', 'Lemari Dua Pintu', '2019-10-09', 1240000, 'Meter Persegi', 2, 2480000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mbahan`
--
ALTER TABLE `mbahan`
  ADD PRIMARY KEY (`kd_bahan`);

--
-- Indexes for table `mpelanggan`
--
ALTER TABLE `mpelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `mtukang`
--
ALTER TABLE `mtukang`
  ADD PRIMARY KEY (`id_tukang`);

--
-- Indexes for table `tbelibahan`
--
ALTER TABLE `tbelibahan`
  ADD PRIMARY KEY (`no_beli`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`nm_user`);

--
-- Indexes for table `tdetailbahan`
--
ALTER TABLE `tdetailbahan`
  ADD PRIMARY KEY (`no_bahan`);

--
-- Indexes for table `tpemesanan`
--
ALTER TABLE `tpemesanan`
  ADD PRIMARY KEY (`no_pesanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
