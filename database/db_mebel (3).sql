-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2020 at 08:22 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

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
('BN-0005', 'Karet'),
('BN-0006', 'Kayu Sengon'),
('BN-0003', 'Kayu Ubar'),
('BN-0008', 'Kayu Ulin 1x1'),
('BN-0001', 'Kayu Ulin 1x2'),
('BN-0007', 'Paku'),
('BN-0009', 'Palu'),
('BN-0002', 'Rotan'),
('BN-0004', 'Triplek');

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
('PL-00001', 'Bambang', 'Test', '12345567899');

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
('TK-00003', 'Agus', '-', '123123123'),
('TK-0001', 'Andi', 'Jln.Kemuning Raya No.389', '089822326786');

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
-- Table structure for table `tdetail_pemesanan`
--

CREATE TABLE `tdetail_pemesanan` (
  `id` int(11) NOT NULL,
  `no_pesanan` varchar(8) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ket` text NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `tdetail_tukang`
--

CREATE TABLE `tdetail_tukang` (
  `id` int(11) NOT NULL,
  `id_tukang` varchar(10) NOT NULL,
  `no_pesanan` varchar(10) NOT NULL,
  `pesanan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tkirim`
--

CREATE TABLE `tkirim` (
  `no_kirim` varchar(16) NOT NULL,
  `no_pesanan` varchar(16) NOT NULL,
  `id_pelanggan` varchar(16) NOT NULL,
  `namabarang` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tujuan` varchar(55) NOT NULL,
  `tanggal` date NOT NULL,
  `ongkir` int(11) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tpemesanan`
--

CREATE TABLE `tpemesanan` (
  `no_pesanan` varchar(16) NOT NULL,
  `id_pelanggan` varchar(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tproduksi`
--

CREATE TABLE `tproduksi` (
  `no_produksi` varchar(16) NOT NULL,
  `no_pesanan` varchar(16) NOT NULL,
  `id_detail_pesanan` varchar(10) NOT NULL,
  `tanggalprod` date NOT NULL,
  `ket` text NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `upah_tukang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_untung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trusak`
--

CREATE TABLE `trusak` (
  `no_kerusakan` varchar(16) NOT NULL,
  `no_produksi` varchar(16) NOT NULL,
  `tgl_data` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jenis_rusak` decimal(10,2) NOT NULL,
  `total_rusak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`kd_bahan`),
  ADD UNIQUE KEY `nm_bahan` (`nm_bahan`);

--
-- Indexes for table `mpelanggan`
--
ALTER TABLE `mpelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `telp_p` (`telp_p`);

--
-- Indexes for table `mtukang`
--
ALTER TABLE `mtukang`
  ADD PRIMARY KEY (`id_tukang`),
  ADD UNIQUE KEY `telp` (`telp`);

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
-- Indexes for table `tdetail_pemesanan`
--
ALTER TABLE `tdetail_pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tdetail_produksi`
--
ALTER TABLE `tdetail_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tdetail_tukang`
--
ALTER TABLE `tdetail_tukang`
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
-- AUTO_INCREMENT for table `tdetail_pemesanan`
--
ALTER TABLE `tdetail_pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tdetail_produksi`
--
ALTER TABLE `tdetail_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tdetail_tukang`
--
ALTER TABLE `tdetail_tukang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
