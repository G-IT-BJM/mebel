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

INSERT INTO mpelanggan VALUES("PL-00001","Bambang","Test","12345567899");



DROP TABLE mtukang;

CREATE TABLE `mtukang` (
  `id_tukang` varchar(10) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(12) NOT NULL,
  PRIMARY KEY (`id_tukang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO mtukang VALUES("TK-00003","Agus","-","123123123");
INSERT INTO mtukang VALUES("TK-0001","Andi","Jln.Kemuning Raya No.389","089822326786");



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

INSERT INTO tbelibahan VALUES("BB-00001","BN-0001","150000","30","2019-11-14","4500000");
INSERT INTO tbelibahan VALUES("BB-00002","BN-0007","20000","200","2019-11-17","400000");



DROP TABLE tdetail_pemesanan;

CREATE TABLE `tdetail_pemesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pesanan` varchar(8) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO tdetail_pemesanan VALUES("1","PS-00003","Meja Kayu","100 x 200 x 300","3","warna biru");
INSERT INTO tdetail_pemesanan VALUES("5","PS-00003","Kursi Kayu","100 x 100 x 100","4","Warna putih");
INSERT INTO tdetail_pemesanan VALUES("6","PS-00004","Pintu","100 x 100 x 100","1","warna kayu");
INSERT INTO tdetail_pemesanan VALUES("7","PS-00004","Lemari","100 x 100 x 100","1","warna putih");



DROP TABLE tdetail_produksi;

CREATE TABLE `tdetail_produksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_produksi` varchar(16) NOT NULL,
  `kd_bahan` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

INSERT INTO tdetail_produksi VALUES("21","PRD-00001","BN-0001","6","150000");
INSERT INTO tdetail_produksi VALUES("22","PRD-00001","BN-0007","9","20000");
INSERT INTO tdetail_produksi VALUES("23","PRD-00002","BN-0001","4","150000");
INSERT INTO tdetail_produksi VALUES("24","PRD-00003","BN-0001","1","150000");
INSERT INTO tdetail_produksi VALUES("25","PRD-00004","BN-0001","1","150000");



DROP TABLE tdetail_tukang;

CREATE TABLE `tdetail_tukang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tukang` varchar(10) NOT NULL,
  `no_pesanan` varchar(10) NOT NULL,
  `pesanan` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO tdetail_tukang VALUES("9","TK-0001","1","PS-00003");
INSERT INTO tdetail_tukang VALUES("10","TK-00003","1","PS-00003");
INSERT INTO tdetail_tukang VALUES("11","TK-0001","5","PS-00003");
INSERT INTO tdetail_tukang VALUES("12","TK-0001","6","PS-00004");
INSERT INTO tdetail_tukang VALUES("13","TK-00003","7","PS-00004");



DROP TABLE tdetailbahan;

CREATE TABLE `tdetailbahan` (
  `no_bahan` varchar(16) NOT NULL,
  `kd_bahan` varchar(10) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`no_bahan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




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

INSERT INTO tkirim VALUES("KR-00001","PS-00001","PL-00001","Meja Makan","2","Komplek Beringin","2019-11-24","20000","");



DROP TABLE tpemesanan;

CREATE TABLE `tpemesanan` (
  `no_pesanan` varchar(16) NOT NULL,
  `id_pelanggan` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`no_pesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tpemesanan VALUES("PS-00003","PL-00001","2019-12-20");
INSERT INTO tpemesanan VALUES("PS-00004","PL-00001","2019-12-20");



DROP TABLE tproduksi;

CREATE TABLE `tproduksi` (
  `no_produksi` varchar(16) NOT NULL,
  `no_pesanan` varchar(16) NOT NULL,
  `id_detail_pesanan` varchar(10) NOT NULL,
  `tanggalprod` date NOT NULL,
  `ket` text NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `upah_tukang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_untung` int(11) NOT NULL,
  PRIMARY KEY (`no_produksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tproduksi VALUES("PRD-00001","PS-00003","1","2019-12-22","","1800000","360000","3","360000");
INSERT INTO tproduksi VALUES("PRD-00002","PS-00003","5","2019-12-22","","1080000","240000","4","240000");
INSERT INTO tproduksi VALUES("PRD-00003","PS-00004","6","2019-12-22","","270000","60000","1","60000");
INSERT INTO tproduksi VALUES("PRD-00004","PS-00004","7","2019-12-22","","270000","60000","1","60000");



DROP TABLE trusak;

CREATE TABLE `trusak` (
  `no_kerusakan` varchar(16) NOT NULL,
  `no_produksi` varchar(16) NOT NULL,
  `tgl_data` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jenis_rusak` decimal(10,2) NOT NULL,
  `total_rusak` int(11) NOT NULL,
  PRIMARY KEY (`no_kerusakan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO trusak VALUES("RS-00001","PRD-00001","2019-12-22","1","0.25","150000");



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

INSERT INTO tupah VALUES("UP-00001","","TK-00003","60000","2019-12-22","");



