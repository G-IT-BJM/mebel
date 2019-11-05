-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2019 at 12:36 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
('BN-0001', 'Kayu Ulin 1x2'),
('BN-0002', 'Rotan'),
('BN-0003', 'Kayu Ubar'),
('BN-0004', 'Triplek'),
('BN-0005', 'Karet'),
('BN-0006', 'Kayu Sengon'),
('BN-0007', 'Paku'),
('BN-0008', 'Kayu Ulin 1x1'),
('BN-0009', 'Palu');

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
('PL-00003', 'Miko', 'Dqfef', '081339674916'),
('PL-00004', 'Rifki', 'Qwdqdq', '081339222222'),
('PL-00005', 'Ruspiati', 'Qwdqwd', '081339222264'),
('PL-00006', 'Gaga', 'Feffe', '08728663434');

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
('TK-00001', 'Habi', 'Jln.Kemuning Raya No.389', '089822326786'),
('TK-00002', 'Lalo', 'Jln.Kemanapun Saja, Asal Kamu Dan Aku Bersama', '081928877789'),
('TK-00003', 'Abdan', 'Dfe', '081339');

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
('BB-20192', 'BN-0003', 100000, 9, '2019-10-31', 900000),
('BL-201910080001', 'BN-0001', 12000, 20, '2019-10-09', 240000),
('BL-201910080002', 'BN-0002', 120000, 50, '2019-10-09', 6000000),
('BL-201910080003', 'BN-0002', 200000, 100, '2019-10-10', 2000000),
('PS-201910090002', 'BN-0004', 1000000, 3, '2019-10-09', 3000000);

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

-- --------------------------------------------------------

--
-- Table structure for table `tdetail_produksi`
--

CREATE TABLE `tdetail_produksi` (
  `id` int(11) NOT NULL,
  `no_produksi` varchar(16) NOT NULL,
  `kd_bahan` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tdetail_produksi`
--

INSERT INTO `tdetail_produksi` (`id`, `no_produksi`, `kd_bahan`, `jumlah`, `harga_satuan`) VALUES
(75, 'PRD-00002', 'BN-0001', 2, 12000),
(76, 'PRD-00002', 'BN-0002', 2, 200000),
(77, 'PRD-00003', 'BN-0003', 1, 100000),
(78, 'PRD-00003', 'BN-0004', 1, 1000000),
(79, 'PRD-00004', 'BN-0002', 7, 200000),
(80, 'PRD-00005', 'BN-0003', 3, 100000),
(81, 'PRD-00005', 'BN-0004', 1, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `tkirim`
--

CREATE TABLE `tkirim` (
  `no_kirim` varchar(16) NOT NULL,
  `no_pesanan` varchar(16) NOT NULL,
  `id_pelanggan` varchar(16) NOT NULL,
  `namabarang` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tujuan` varchar(55) NOT NULL,
  `tanggal` date NOT NULL,
  `ongkir` int(11) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tkirim`
--

INSERT INTO `tkirim` (`no_kirim`, `no_pesanan`, `id_pelanggan`, `namabarang`, `jumlah`, `tujuan`, `tanggal`, `ongkir`, `ket`) VALUES
('KR-00001', 'PS-00001', 'PL-00003', 'Kursi', 2, 'Sqs', '2019-11-04', 20000, ''),
('KR-00003', 'PS-00002', 'PL-00004', 'Meja', 3, 'Qsq', '2019-11-04', 50000, ''),
('KR-00004', 'PS-00003', 'PL-00003', 'Lemari', 1, 'Qw', '2019-11-04', 300000, '');

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
('PS-00001', 'PL-00003', 'Kayu', 'Kursi', '2019-11-02', 0, '2 x 4', 2, 0),
('PS-00002', 'PL-00004', 'Kayu', 'Meja', '2019-11-03', 0, '2 x 5', 3, 0),
('PS-00003', 'PL-00003', 'Kayu', 'Lemari', '2019-11-03', 0, '5 x 6', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tproduksi`
--

CREATE TABLE `tproduksi` (
  `no_produksi` varchar(16) NOT NULL,
  `no_pesanan` varchar(16) NOT NULL,
  `id_tukang` varchar(10) NOT NULL,
  `tanggalprod` date NOT NULL,
  `ket` text NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `upah_tukang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_untung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tproduksi`
--

INSERT INTO `tproduksi` (`no_produksi`, `no_pesanan`, `id_tukang`, `tanggalprod`, `ket`, `harga_jual`, `upah_tukang`, `jumlah`, `total_untung`) VALUES
('PRD-00002', 'PS-00002', 'TK-00003', '2019-11-03', '', 624000, 100000, 2, 100000),
('PRD-00003', 'PS-00002', 'TK-00002', '2019-11-03', '', 1200000, 50000, 1, 50000),
('PRD-00004', 'PS-00001', 'TK-00001', '2019-11-03', '', 1400000, 0, 2, 0),
('PRD-00005', 'PS-00003', 'TK-00001', '2019-11-03', '', 1600000, 150000, 1, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `trusak`
--

CREATE TABLE `trusak` (
  `no_kerusakan` varchar(16) NOT NULL,
  `no_produksi` varchar(16) NOT NULL,
  `tgl_data` date NOT NULL,
  `tgl_produksi` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trusak`
--

INSERT INTO `trusak` (`no_kerusakan`, `no_produksi`, `tgl_data`, `tgl_produksi`, `jumlah`, `ket`) VALUES
('RS-201910180001', 'PR-201910170001', '2019-10-18', '2019-10-17', 120000, 'Rusak Berat');

-- --------------------------------------------------------

--
-- Table structure for table `tupah`
--

CREATE TABLE `tupah` (
  `no_upah` varchar(16) NOT NULL,
  `no_produksi` varchar(16) NOT NULL,
  `id_tukang` varchar(10) NOT NULL,
  `upah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `tdetail_produksi`
--
ALTER TABLE `tdetail_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tkirim`
--
ALTER TABLE `tkirim`
  ADD PRIMARY KEY (`no_kirim`);

--
-- Indexes for table `tpemesanan`
--
ALTER TABLE `tpemesanan`
  ADD PRIMARY KEY (`no_pesanan`);

--
-- Indexes for table `tproduksi`
--
ALTER TABLE `tproduksi`
  ADD PRIMARY KEY (`no_produksi`);

--
-- Indexes for table `trusak`
--
ALTER TABLE `trusak`
  ADD PRIMARY KEY (`no_kerusakan`);

--
-- Indexes for table `tupah`
--
ALTER TABLE `tupah`
  ADD PRIMARY KEY (`no_upah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tdetail_produksi`
--
ALTER TABLE `tdetail_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
