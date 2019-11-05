-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Nov 2019 pada 00.04
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.40

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
('BB-20192', 'BN-0003', 100000, 9, '2019-10-31', 900000),
('BL-201910080001', 'BN-0001', 12000, 20, '2019-10-09', 240000),
('BL-201910080002', 'BN-0002', 120000, 50, '2019-10-09', 6000000),
('BL-201910080003', 'BN-0002', 200000, 100, '2019-10-10', 2000000),
('PS-201910090002', 'BN-0004', 1000000, 3, '2019-10-09', 3000000);

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
-- Struktur dari tabel `tdetail_produksi`
--

CREATE TABLE `tdetail_produksi` (
  `id` int(11) NOT NULL,
  `no_produksi` varchar(16) NOT NULL,
  `kd_bahan` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tdetail_produksi`
--

INSERT INTO `tdetail_produksi` (`id`, `no_produksi`, `kd_bahan`, `jumlah`, `harga_satuan`) VALUES
(1, '1', 'BN-0001', 10, 0),
(2, '1', 'BN-0002', 30, 0),
(3, '1', 'BN-0002', 10, 0),
(35, 'PRD-00001', 'BN-0001', 10, 12000),
(37, 'PRD-00001', 'BN-0004', 1, 1000000),
(38, 'PRD-00002', 'BN-0003', 1, 100000);

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
('PS-201910090001', 'PL-0001', 'Kayu', 'Meja', '2019-10-09', 200000, '4x4', 2, 400000),
('PS-201910090002', 'PL-0002', 'Kayu', 'Lemari Dua Pintu', '2019-10-09', 1240000, '2x4', 2, 2480000);

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
  `harga_jual` int(11) NOT NULL,
  `upah_tukang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_untung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tproduksi`
--

INSERT INTO `tproduksi` (`no_produksi`, `no_pesanan`, `id_tukang`, `tanggalprod`, `ket`, `harga_jual`, `upah_tukang`, `jumlah`, `total_untung`) VALUES
('PRD-00001', 'PS-201910090001', 'TK-0002', '2019-10-31', '', 1440000, 160000, 1, 160000),
('PRD-00002', 'PS-201910090001', 'TK-0002', '2019-11-01', '', 260000, 80000, 1, 80000);

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
('UP-201910180001', 'PR-201910170001', 'TK-0001', 100000, '2019-10-18', 'Upah via transfer'),
('UP-20192', '', 'TK-0002', 100000, '2019-11-01', ''),
('UP-20193', '', 'TK-0002', 140000, '2019-11-01', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mbahan`
--
ALTER TABLE `mbahan`
  ADD PRIMARY KEY (`kd_bahan`);

--
-- Indeks untuk tabel `mpelanggan`
--
ALTER TABLE `mpelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `mtukang`
--
ALTER TABLE `mtukang`
  ADD PRIMARY KEY (`id_tukang`);

--
-- Indeks untuk tabel `tbelibahan`
--
ALTER TABLE `tbelibahan`
  ADD PRIMARY KEY (`no_beli`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`nm_user`);

--
-- Indeks untuk tabel `tdetailbahan`
--
ALTER TABLE `tdetailbahan`
  ADD PRIMARY KEY (`no_bahan`);

--
-- Indeks untuk tabel `tdetail_produksi`
--
ALTER TABLE `tdetail_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tkirim`
--
ALTER TABLE `tkirim`
  ADD PRIMARY KEY (`no_kirim`);

--
-- Indeks untuk tabel `tpemesanan`
--
ALTER TABLE `tpemesanan`
  ADD PRIMARY KEY (`no_pesanan`);

--
-- Indeks untuk tabel `tproduksi`
--
ALTER TABLE `tproduksi`
  ADD PRIMARY KEY (`no_produksi`);

--
-- Indeks untuk tabel `trusak`
--
ALTER TABLE `trusak`
  ADD PRIMARY KEY (`no_kerusakan`);

--
-- Indeks untuk tabel `tupah`
--
ALTER TABLE `tupah`
  ADD PRIMARY KEY (`no_upah`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tdetail_produksi`
--
ALTER TABLE `tdetail_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
