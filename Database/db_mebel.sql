-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Okt 2019 pada 00.08
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

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
-- Struktur dari tabel `mbahan`
--

CREATE TABLE `mbahan` (
  `kd_bahan` varchar(10) NOT NULL,
  `nm_bahan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mbahan`
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
('BN-0009', 'Palu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mpelanggan`
--

CREATE TABLE `mpelanggan` (
  `id_pelanggan` varchar(10) NOT NULL,
  `nama_p` varchar(60) NOT NULL,
  `alamat_p` text NOT NULL,
  `telp_p` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mpelanggan`
--

INSERT INTO `mpelanggan` (`id_pelanggan`, `nama_p`, `alamat_p`, `telp_p`) VALUES
('PL-0001', 'Muhammad Fahmiriadi', 'Jln.Sei Andai, Blok C-D No.29 Rt.12 Banjarmasin Utara', '081347224881'),
('PL-0002', 'Ruspiati', 'Banjarmasin Kota', '088888811111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mtukang`
--

CREATE TABLE `mtukang` (
  `id_tukang` varchar(10) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mtukang`
--

INSERT INTO `mtukang` (`id_tukang`, `nama`, `alamat`, `telp`) VALUES
('TK-0001', 'Uji coba sistem mebel', 'Jln.Kemuning Raya No.389', '089822326786'),
('TK-0002', 'Muhammad Abdillah', 'Jln.Kemanapun Saja, Asal Kamu dan Aku Bersama', '081928877789');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbelibahan`
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
-- Dumping data untuk tabel `tbelibahan`
--

INSERT INTO `tbelibahan` (`no_beli`, `no_bahan`, `hbeli`, `jumbeli`, `tgl_beli`, `total`) VALUES
('BL-201910080001', '20191006-DB0002', 12000, 20, '2019-10-09', 240000),
('BL-201910080002', '20191006-DB0001', 120000, 50, '2019-10-09', 6000000),
('BL-201910080003', '20191006-DB0002', 20000, 100, '2019-10-10', 2000000),
('PS-201910090002', 'PL-0002', 1000000, 3, '2019-10-09', 3000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `nm_user` varchar(10) NOT NULL,
  `sandi` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`nm_user`, `sandi`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tdetailbahan`
--

CREATE TABLE `tdetailbahan` (
  `no_bahan` varchar(16) NOT NULL,
  `kd_bahan` varchar(10) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tdetailbahan`
--

INSERT INTO `tdetailbahan` (`no_bahan`, `kd_bahan`, `harga_satuan`, `stok`) VALUES
('20191006-DB0001', 'BN-0002', 800000, 150),
('20191006-DB0002', 'BN-0003', 200000, 130);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tkirim`
--

CREATE TABLE `tkirim` (
  `no_kirim` varchar(16) NOT NULL,
  `no_produksi` varchar(16) NOT NULL,
  `tujuan` varchar(55) NOT NULL,
  `tanggal` date NOT NULL,
  `ongkir` int(11) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tkirim`
--

INSERT INTO `tkirim` (`no_kirim`, `no_produksi`, `tujuan`, `tanggal`, `ongkir`, `ket`) VALUES
('KR-201910180001', 'PR-201910170001', 'Banjarmasin', '2019-10-18', 35000, 'Kirim via Expedisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tpemesanan`
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
-- Dumping data untuk tabel `tpemesanan`
--

INSERT INTO `tpemesanan` (`no_pesanan`, `id_pelanggan`, `jenis`, `namabarang`, `tanggal`, `biaya`, `jhitung`, `jpesanan`, `total`) VALUES
('PS-201910090001', 'PL-0001', 'Kayu', 'Meja', '2019-10-09', 200000, 'meter', 2, 400000),
('PS-201910090002', 'PL-0002', 'Kayu', 'Lemari Dua Pintu', '2019-10-09', 1240000, 'Meter Persegi', 2, 2480000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tproduksi`
--

CREATE TABLE `tproduksi` (
  `no_produksi` varchar(16) NOT NULL,
  `no_pesanan` varchar(16) NOT NULL,
  `id_tukang` varchar(10) NOT NULL,
  `tanggalprod` date NOT NULL,
  `ket` text NOT NULL,
  `bprod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tproduksi`
--

INSERT INTO `tproduksi` (`no_produksi`, `no_pesanan`, `id_tukang`, `tanggalprod`, `ket`, `bprod`) VALUES
('PR-201910170001', 'PS-201910090001', 'TK-0001', '2019-10-18', 'Oke', 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trusak`
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
-- Dumping data untuk tabel `trusak`
--

INSERT INTO `trusak` (`no_kerusakan`, `no_produksi`, `tgl_data`, `tgl_produksi`, `jumlah`, `ket`) VALUES
('RS-201910180001', 'PR-201910170001', '2019-10-18', '2019-10-17', 120000, 'Rusak Berat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tupah`
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
-- Dumping data untuk tabel `tupah`
--

INSERT INTO `tupah` (`no_upah`, `no_produksi`, `id_tukang`, `upah`, `tanggal`, `ket`) VALUES
('UP-201910180001', 'PR-201910170001', 'TK-0001', 100000, '2019-10-18', 'Upah via transfer');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
