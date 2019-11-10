DROP TABLE mbahan;

CREATE TABLE `mbahan` (
  `kd_bahan` varchar(10) NOT NULL,
  `nm_bahan` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_bahan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO mbahan VALUES("BN-0001","Kayu Ulin 1x2");
INSERT INTO mbahan VALUES("BN-0002","Rotan");
INSERT INTO mbahan VALUES("BN-0003","Kayu Ubar");
INSERT INTO mbahan VALUES("BN-0004","Triplek");
INSERT INTO mbahan VALUES("BN-0005","Karet");
INSERT INTO mbahan VALUES("BN-0006","Kayu Sengon");
INSERT INTO mbahan VALUES("BN-0007","Paku");
INSERT INTO mbahan VALUES("BN-0008","Kayu Ulin 1x1");
INSERT INTO mbahan VALUES("BN-0009","Palu");



DROP TABLE mpelanggan;

CREATE TABLE `mpelanggan` (
  `id_pelanggan` varchar(10) NOT NULL,
  `nama_p` varchar(60) NOT NULL,
  `alamat_p` text NOT NULL,
  `telp_p` varchar(12) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO mpelanggan VALUES("PL-0001","Muhammad Fahmiriadi","Jln.Sei Andai, Blok C-D No.29 Rt.12 Banjarmasin Utara","081347224881");
INSERT INTO mpelanggan VALUES("PL-0002","Ruspiati","Banjarmasin Kota","088888811111");



DROP TABLE mtukang;

CREATE TABLE `mtukang` (
  `id_tukang` varchar(10) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(12) NOT NULL,
  PRIMARY KEY (`id_tukang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO mtukang VALUES("TK-0002","Muhammad Abdillah","Jln.Kemanapun Saja, Asal Kamu dan Aku Bersama","081928877789");



DROP TABLE tb_login;

CREATE TABLE `tb_login` (
  `nm_user` varchar(10) NOT NULL,
  `sandi` varchar(35) NOT NULL,
  PRIMARY KEY (`nm_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_login VALUES("admin","21232f297a57a5a743894a0e4a801fc3");



DROP TABLE tbelibahan;

CREATE TABLE `tbelibahan` (
  `no_beli` varchar(16) NOT NULL,
  `no_bahan` varchar(16) NOT NULL,
  `hbeli` int(11) NOT NULL,
  `jumbeli` int(11) NOT NULL,
  `tgl_beli` date NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`no_beli`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbelibahan VALUES("BB-00001","BN-0001","100000","9","2019-11-10","900000");



DROP TABLE tdetail_produksi;

CREATE TABLE `tdetail_produksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_produksi` varchar(16) NOT NULL,
  `kd_bahan` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

INSERT INTO tdetail_produksi VALUES("63","PRD-00001","BN-0001","1","100000");



DROP TABLE tdetailbahan;

CREATE TABLE `tdetailbahan` (
  `no_bahan` varchar(16) NOT NULL,
  `kd_bahan` varchar(10) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`no_bahan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tdetailbahan VALUES("20191006-DB0001","BN-0002","800000","150");
INSERT INTO tdetailbahan VALUES("20191006-DB0002","BN-0003","200000","130");



DROP TABLE tkirim;

CREATE TABLE `tkirim` (
  `no_kirim` varchar(16) NOT NULL,
  `no_pesanan` varchar(16) NOT NULL,
  `id_pelanggan` varchar(16) NOT NULL,
  `namabarang` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tujuan` varchar(55) NOT NULL,
  `tanggal` date NOT NULL,
  `ongkir` int(11) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`no_kirim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tkirim VALUES("KR-00001","PS-00001","PL-0002","Meja","1","Test","2019-11-10","10000","");



DROP TABLE tpemesanan;

CREATE TABLE `tpemesanan` (
  `no_pesanan` varchar(16) NOT NULL,
  `id_pelanggan` varchar(10) NOT NULL,
  `jenis` varchar(55) NOT NULL,
  `namabarang` varchar(55) NOT NULL,
  `tanggal` date NOT NULL,
  `biaya` int(11) NOT NULL,
  `jhitung` varchar(25) NOT NULL,
  `jpesanan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`no_pesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tpemesanan VALUES("PS-00001","PL-0002","Kayu","Meja","2019-11-10","0","2x2","1","0");
INSERT INTO tpemesanan VALUES("PS-00002","PL-0001","Kayu","Meja","2019-11-10","0","2x2","2","0");



DROP TABLE tproduksi;

CREATE TABLE `tproduksi` (
  `no_produksi` varchar(16) NOT NULL,
  `no_pesanan` varchar(16) NOT NULL,
  `id_tukang` varchar(10) NOT NULL,
  `tanggalprod` date NOT NULL,
  `ket` text NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `upah_tukang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_untung` int(11) NOT NULL,
  PRIMARY KEY (`no_produksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tproduksi VALUES("PRD-00001","PS-00001","TK-0002","2019-11-10","","180000","40000","1","40000");



DROP TABLE trusak;

CREATE TABLE `trusak` (
  `no_kerusakan` varchar(16) NOT NULL,
  `no_produksi` varchar(16) NOT NULL,
  `tgl_data` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jenis_rusak` decimal(10,0) NOT NULL,
  `total_rusak` int(11) NOT NULL,
  PRIMARY KEY (`no_kerusakan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO trusak VALUES("RS-00001","PRD-00001","2019-11-10","1","1","180000");



DROP TABLE tupah;

CREATE TABLE `tupah` (
  `no_upah` varchar(16) NOT NULL,
  `no_produksi` varchar(16) NOT NULL,
  `id_tukang` varchar(10) NOT NULL,
  `upah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`no_upah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




