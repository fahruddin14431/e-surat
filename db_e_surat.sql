-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 29 Mei 2018 pada 10.22
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_e_surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_surat_keluar`
--

CREATE TABLE `tb_detail_surat_keluar` (
  `id_surat_keluar` varchar(11) NOT NULL,
  `id_user` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_format_surat`
--

CREATE TABLE `tb_format_surat` (
  `id_format_surat` int(11) NOT NULL,
  `kop_surat` varchar(255) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_format_surat`
--

INSERT INTO `tb_format_surat` (`id_format_surat`, `kop_surat`, `logo`) VALUES
(1, '<h2 style=\"text-align:center\"><span style=\"font-size:14px\"><strong>PEMERINTAH KEBUPATEN MANGGARAI BARAT BADANG KEPEGAWAIAN PENDIDIKAN DAN PELATAHIAN DAERAH Jln. Frans Sales Lega Labuhan Bajo NTT, email:bkdmabar@gmail.com</strong></span></h2>\r\n', 'logo.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Kepala BKPPD'),
(2, 'Sekretaris'),
(4, 'STAFF'),
(5, 'Dinas'),
(6, 'Kasubag Umum, Kepegawaian dan Perlengkapan'),
(7, 'Kasubag Keuangan dan Pelaporan'),
(8, 'Kepala BidangINKA & Pemeberhentian PNS'),
(9, 'Kepala Bidang Mutasi & Pengembangan Pegawai'),
(10, 'Kepala Bidang Perencanaan & Diklat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_surat`
--

CREATE TABLE `tb_jenis_surat` (
  `id_jenis_surat` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `isi_surat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_surat`
--

INSERT INTO `tb_jenis_surat` (`id_jenis_surat`, `no_surat`, `jenis_surat`, `isi_surat`) VALUES
(5, 'BKPPD.890/182/VII/2017', 'Pengambilan Sertifikat Diklat', '<p style=\"text-align:justify\">&nbsp; &nbsp; &nbsp; &nbsp;Sesuai perihal surat diatas, maka dengna ini disampaikan bahwa&nbsp;Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat totam ipsum iure accusamus officia quod veniam laborum. Rerum libero consequatur quo laborum reiciendis officia id? Aperiam similique dicta quod vitae.&nbsp;Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat totam ipsum iure accusamus officia quod veniam laborum. Rerum libero consequatur quo laborum reiciendis officia id? Aperiam similique dicta quod vitae.&nbsp;Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat totam ipsum iure accusamus officia quod veniam laborum. Rerum libero consequatur quo laborum reiciendis officia id? Aperiam similique dicta quod vitae.</p>\r\n\r\n<p style=\"text-align:justify\">Demikian untuk maklum dan atas kerjasamanya diucapkan terima kasih.</p>\r\n'),
(6, 'BKPPD/822', 'Kenaikan Gaji Berkala', '                                                                                                                                                                                                                                 \r\n                                                                                                   <p style=\"text-align:justify\">Â    Labuan Bajo,.......,..........,........</p>\r\n\r\n<p style=\"text-align:justify\">Â Nomor		:BKPPD.822/.../...../....</p>			Kepada Yth.\r\nLampiran	: .......						.................................\r\nPerihal		:Kenaikan Gaji Berkala			di-\r\n								    .......................\r\n\r\n    <p style=\"text-align:justify\">Â Dengan ini diberitahukan bahwa berhubung dengan telah dipenuhi masa kerja dan syarat-syarat lainya kepada :\r\n1.	Nama 					:..................................................\r\n2.	NIP					:..................................................\r\n3.	Pangkat / Golongan Ruang Gaji	: .................................................\r\n4.	Unit Kerja				: .................................................\r\n5.	Gaji Pokok Lama			:..................................................\r\n(Atas dasar SKP terakhir tentang gaji/Pangkat yang ditetapkan):\r\na.	Oleh Pejabat					:..................................\r\nb.	Tanggal						:..................................\r\nc.	Nomor						:..................................\r\nd.	Tanggal Berlakunya Gaji tersebut			:..................................\r\ne.	Masa Kerja Golongan pada tanggal tersebut	:..................................\r\nDiberikan gaji berkala hingga memperoleh	:\r\n6.	Gaji Pokok Baru			:..............................\r\n7.	Berdasarkan Masa Kerja		:.............................\r\n8.	Pangkat/Golongan Ruang		:.............................\r\n9.	Terhitung Mulai Tanggal		:............................\r\n10.	TMT Gaji Berkala Berikutnya	:.............................\r\nDiharapkan agar sesuai dengan Peraturan Pemerintah Nomor 30 Tahun 2015, maka kepada Pegawai Negeri Spil tersebut dapat dibayarkan penghasilanya berdasarkan gaji yang baru.</p>\r\n\r\n				 A.n.Bupati Manggarai Barat\r\n	Kepala BadanKepegawaianPendidikan dan\r\n               Pelatihan Daerah Kab.Manggarai Barat,\r\n\r\n\r\nIr.Sebastianus Wantung\r\n   Pembina Utama Muda\r\n   NIP 19650841199703 1 002\r\n\r\nTembusan:disampaikan dengan hormat kepada:\r\n1............\r\n2............\r\n3............\r\n'),
(7, 'BKPPD/813', 'Surat Keputusan 80%', 'PETIKAN KEPUTUSAN BUPATI MANGGARAI BARAT\r\nNOMOR: BKPPD.813/..../..../.....\r\n\r\nBUPATI MANGGARAI BARAT,\r\nMenimbang		:   dst;\r\nMengingat		:   dst;\r\nMemperhatikan		:  Penetapan NIP.....................................atas nama ........................................oleh\r\n			   Kepala badan Kepegawaian Pendidikan dan Pelatihan Negara tanggal..............\r\n\r\nMEMUTUSKAN\r\nMenetapkan		: \r\nPERTAMA		Mengangkat yang tersebut dibawah ini, nomor urut	:...............\r\n			Nama 				:............................................................................\r\n			NIP				:............................................................................\r\n			Tempat/Tanggal Lahir		:............................................................................\r\n			Jenis Kelamin			:...........................................................................\r\n			Pendidikan			:............................................................................\r\n			Menjadi Calon Pegawai Negeri Sipil dalam masa percobaan dengan:\r\n			Golongan Ruang		:............................................................................\r\n			Masa Kerja Golongan		:............................................................................\r\n			Jabatan				:............................................................................\r\n			Unit Kerja			:............................................................................\r\n\r\n		Dan kepadanya diberikan gaji pokok setiap bulan sebesar Rp......................; serta ditambah dengan penghasilan lain yang sah berdasarkan Peraturan Undang-undang yang berlaku, terhitung mulai tanggal.........................................\r\nKEDUA	: Apabila dikemudian hari ternyata terdapat kekeliruan dalam keputusan ini, akan diadakan perbaikan dan perhitungan kembali sebagaimana mestinya.\r\n	PETIKAN Keputusan ini disampaikan kepada:\r\n1.	Kepala Badan Kepegawaian Negara;\r\n2.	Direktur Jenderal Anggaran Depertemen Keuangan;\r\n3.	Kepala Regional X Badan Kepegawaian Negara Denpasar;\r\n4.	Kepala Dinas Pendapatan, Pengelolaan Keuangan dan Aset Daerah Kabupaten Manggarai Barat;\r\n5.	Calon Pegawai Negeri Sipil yang bersangkutan.\r\nDitetapkan di Labuan Bajo\r\nPada tanggal......................\r\nPetikan yang sesuai dengan aslinya\r\n        Sekretaris Daerah, 					BUPATI MANGGARAI BARAT\r\n\r\n      TTD\r\n Mbon Rofinus,SH,M.Si                                                              DRS. AGUSTINUS Ch.DULA\r\nPembina Utama Madya\r\nNip.19591122 198603 1 010\r\n'),
(8, 'BKPPD/821', 'Surat Keputusan 100%', 'PETIKAN\r\nKEPUTUSAN BUPATI MANGGARAI BARAT\r\nNOMOR: BKPPD.821 /..../..../.....\r\n\r\nBUPATI MANGGARAI BARAT,\r\nMenimbang		:   dst;\r\nMengingat		:   dst;\r\nMEMUTUSKAN :\r\nMenetapkan		: \r\nPERTAMA		Calon pegawai Negeri Sipil  nomor urut	:...............\r\n			Nama 				:............................................................................\r\n			NIP				:............................................................................\r\n			Pendidikan			:............................................................................\r\nTempat/Tanggal Lahir		:............................................................................\r\n			TMT CPNS			:...........................................................................\r\n			Golongan Ruang		:............................................................................\r\n			Masa Kerja Golongan		:............................................................................\r\n			Gaji Pokok			:............................................................................\r\n			Unit Kerja			:............................................................................\r\n			Surat Keterangan Tim		:............................................................................\r\n			Penguji Kesehatan		:...........................................................................\r\n			STTPL				:..........................................................................\r\n\r\n		Terhitung mulai tanggal.......................diangkat menjadi Pegawai Negeri Sipil dalam pangkat.........................Golongan Ruang............,dengan masa kerja Golongan.......Tahun........Bulan dan diberikan gaji pokok sebesar Rp.............................; ditambah dengan penghasilan lain yang sah berdasarkan Peraturan Undang-undangan  yang berlaku.\r\nKEDUA	: Apabila dikemudian hari ternyata terdapat kekeliruan dalam keputusan ini, akan diadakan perbaikan dan perhitungan kembali sebagaimana mestinya.\r\n	PETIKAN Keputusan ini disampaikan kepada:\r\n1.	Kepala Badan Kepegawaian Negara;\r\n2.	Direktur Jenderal Anggaran Depertemen Keuangan;\r\n3.	Kepala Regional X Badan Kepegawaian Negara Denpasar;\r\n4.	Kepala Dinas Pendapatan, Pengelolaan Keuangan dan Aset Daerah Kabupaten Manggarai Barat;\r\n5.	Calon Pegawai Negeri Sipil yang Bersangkutan.\r\nDitetapkan di Labuan Bajo\r\nPada tanggal......................\r\nPetikan yang sesuai dengan aslinya\r\n        Sekretaris Daerah, 					BUPATI MANGGARAI BARAT\r\n      TTD\r\n Mbon Rofinus,SH,M.Si                                                              DRS. AGUSTINUS Ch.DULA\r\nPembina Utama Madya\r\nNip.19591122 198603 1 010\r\n'),
(10, 'BKPPD/823', 'Kenaikan Pangkat', 'gfdg'),
(11, 'BKPPD/875', 'Karpeg', 'hfghhh'),
(12, 'BKPPD/874', 'Usulan Perbaikan Data Pegawai', 'gfddd'),
(13, 'BKPPD/890', 'Pengambilan Sertifikat', 'hddfgh'),
(14, 'BKPPD/810', 'Kelengkapan Berkas CPNS', 'hgdd'),
(15, 'BKPPD/870', 'undangan, pengantar, surat panggilan', 'PEMERINTAH KABUPATEN MANGGARAI BARAT\r\nBADAN KEPEGAWAIAN PENDIDIKAN DAN PELATIHAN DAERAH\r\n		Jl. FransLega Labuan Bajo-Flores-NTT Tlp.(0385) 41883\r\n\r\n\r\n\r\nNomor : BKPPD.870 /../../../â€¦							(Tgl.,Bln.,Thn)\r\nSifat :\r\nLampiran :\r\nHal :\r\n\r\nYth. â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦.â€¦\r\nâ€¦â€¦.â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦.â€¦\r\nâ€¦â€¦â€¦â€¦.â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦.â€¦\r\n\r\nâ€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦(Alinea Pembuka dan isi)..â€¦â€¦â€¦â€¦â€¦â€¦â€¦..\r\nâ€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦..â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦\r\npada hari, tanggal   	: â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦\r\nwaktu			 : pukulâ€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦\r\ntempat			 : â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦\r\nacara 			: â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦..\r\nâ€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦(Alinea Penutup)â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦..\r\nâ€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦..â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦\r\nâ€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦..â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦â€¦\r\n\r\n\r\nKepala BadanKepegawaianPendidikan dan\r\n               Pelatihan Daerah Kab.Manggarai Barat,\r\n\r\n\r\nIr.Sebastianus Wantung\r\n   Pembina Utama Muda\r\n   NIP 19650841199703 1 002\r\n\r\nTembusan:\r\n1. â€¦â€¦â€¦â€¦â€¦â€¦â€¦.\r\n2. â€¦â€¦â€¦â€¦â€¦â€¦â€¦.\r\n3. â€¦â€¦â€¦â€¦â€¦â€¦â€¦.\r\n\r\n\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `kata_sandi` varchar(50) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `status` enum('ADMIN','TU','DINAS','KEPALA BADAN','PEGAWAI') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id`, `nama_pengguna`, `kata_sandi`, `id_user`, `status`) VALUES
(1, 'kepala', 'kepala', 'PEG1001', 'KEPALA BADAN'),
(2, 'admin', 'admin', 'PEG1002', 'ADMIN'),
(11, 'dispen', 'dispen', 'PEG1006', 'DINAS'),
(15, 'BAU', 'BAU', 'PEG1010', 'DINAS'),
(16, 'humas', 'HUMAS', 'PEG1011', 'DINAS'),
(17, 'hukum', 'hukum', 'PEG1012', 'DINAS'),
(18, 'organisasi', 'organisasi', 'PEG1013', 'DINAS'),
(19, 'kesra', 'kesra', 'PEG1014', 'DINAS'),
(20, 'SDA', 'sda', 'PEG1015', 'DINAS'),
(21, 'pembangunan', 'pembangunan', 'PEG1016', 'DINAS'),
(22, 'pemerintahan', 'pemerintahan', 'PEG1017', 'DINAS'),
(23, 'sekwan', 'sekwan', 'PEG1018', 'DINAS'),
(24, 'korpri', 'korpri', 'PEG1019', 'DINAS'),
(25, 'polpp', 'polpp', 'PEG1020', 'DINAS'),
(26, 'inspektorat', 'inspektorat', 'PEG1021', 'DINAS'),
(27, 'rsud', 'rsud', 'PEG1022', 'DINAS'),
(28, 'bapeda', 'bapeda', 'PEG1023', 'DINAS'),
(29, 'kesbangpol', 'kesbangpol', 'PEG1024', 'DINAS'),
(30, 'bencana', 'bencana', 'PEG1025', 'DINAS'),
(31, 'keuangan', 'keuangan', 'PEG1026', 'DINAS'),
(32, 'pu', 'pu', 'PEG1027', 'DINAS'),
(33, 'infokom', 'infokom', 'PEG1028', 'DINAS'),
(34, 'dipe', 'dipe', 'PEG1029', 'DINAS'),
(35, 'dinkes', 'dinkes', 'PEG1030', 'DINAS'),
(36, 'ketahanan ', 'ketahanan', 'PEG1031', 'DINAS'),
(37, 'diperizinan', 'diperizinan', 'PEG1032', 'DINAS'),
(38, 'perkebunan', 'perkebunan', 'PEG1033', 'DINAS'),
(39, 'LHK', 'LHK', 'PEG1034', 'DINAS'),
(40, 'perhubungan', 'perhubungan', 'PEG1035', 'DINAS'),
(41, 'capil', 'capil', 'PEG1036', 'DINAS'),
(42, 'sosial', 'sosial', 'PEG1037', 'DINAS'),
(43, 'nakertrans', 'nakertrans', 'PEG1038', 'DINAS'),
(44, 'pariwisata', 'pariwisata', 'PEG1039', 'DINAS'),
(45, 'perumahan', 'perumahan', 'PEG1040', 'DINAS'),
(46, 'perindagkop', 'perindagkop', 'PEG1041', 'DINAS'),
(47, 'peternakan', 'peternakan', 'PEG1042', 'DINAS'),
(48, 'pemberdayaan', 'pemberdayaan', 'PEG1043', 'DINAS'),
(49, 'kb', 'kb', 'PEG1044', 'DINAS'),
(50, 'Komodo', 'Komodo', 'PEG1045', 'DINAS'),
(51, ' Mbeliling', ' Mbeliling', 'PEG1046', 'DINAS'),
(52, 'Boleng', 'Boleng', 'PEG1047', 'DINAS'),
(53, 'Sano Nggoang', 'Sano Nggoang', 'PEG1048', 'DINAS'),
(54, 'Lembor', 'Lembor', 'PEG1049', 'DINAS'),
(55, 'Lembor Selatan', 'Lembor Selatan', 'PEG1050', 'DINAS'),
(56, 'Kuwus', 'Kuwus', 'PEG1051', 'DINAS'),
(57, 'Welak', 'Welak', 'PEG1052', 'DINAS'),
(58, 'Ndoso', 'Ndoso', 'PEG1053', 'DINAS'),
(59, 'Macang Pacar', 'Macang Pacar', 'PEG1054', 'DINAS'),
(60, 'Pacar', 'Pacar', 'PEG1055', 'DINAS'),
(61, 'Kuwus Barat', 'Kuwus Barat', 'PEG1056', 'DINAS'),
(62, 'Labuah Bajo', 'Labuah Bajo', 'PEG1057', 'DINAS'),
(63, 'Wae Kelambu', 'Wae Kelambu', 'PEG1058', 'DINAS'),
(64, 'Nantal', 'Nantal', 'PEG1059', 'DINAS'),
(65, 'Tangge', 'Tangge', 'PEG1060', 'DINAS'),
(66, 'Bagian Umum', 'BagianUmum', 'PEG1061', 'TU'),
(67, 'Bagian Keuangan', 'BagianKeuangan', 'PEG1062', 'PEGAWAI'),
(68, 'INKA', 'INKA', 'PEG1063', 'PEGAWAI'),
(69, 'Bidang Diklat', 'BidangDiklat', 'PEG1064', 'PEGAWAI'),
(70, 'mutasi', 'mutasi', 'PEG1065', 'PEGAWAI'),
(71, 'tu', 'tu', 'PEG1066', 'TU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat_keluar`
--

CREATE TABLE `tb_surat_keluar` (
  `id_surat_keluar` varchar(11) NOT NULL,
  `id_jenis_surat` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `file_surat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_surat_keluar`
--

INSERT INTO `tb_surat_keluar` (`id_surat_keluar`, `id_jenis_surat`, `tanggal`, `file_surat`) VALUES
('SUK1001', 5, '2018-04-24', 'SUK1001.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat_masuk`
--

CREATE TABLE `tb_surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `no_agenda` varchar(50) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_surat_penerimaan` date NOT NULL,
  `file_surat` varchar(100) DEFAULT NULL,
  `scan_surat` varchar(100) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `instruksi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_surat_masuk`
--

INSERT INTO `tb_surat_masuk` (`id_surat_masuk`, `id_user`, `no_surat`, `no_agenda`, `perihal`, `tanggal_surat`, `tanggal_surat_penerimaan`, `file_surat`, `scan_surat`, `id_jabatan`, `status`, `instruksi`) VALUES
(3, 'PEG1006', 'm', 'm', 'm', '2018-12-31', '2018-12-31', 'icon.jpg', '', 2, 0, NULL),
(6, 'PEG1006', 'l', 'l', 'l', '2018-12-31', '0000-00-00', '6.pdf', '20170506122014666200.png', 10, 1, 'instruksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nip`, `nama`, `id_jabatan`) VALUES
('PEG1001', '19650804 199703 1 00', 'IR. Sebastianus Wantung', 1),
('PEG1002', '198705292014021002', 'MAKSIMUS E. JAPEN, SE', 4),
('PEG1004', '198506262006041005', 'WILHELMINA O. JAMI', 4),
('PEG1006', '', 'Dinas Pendidikan Pemuda dan Olahraga', 5),
('PEG1010', '', 'Bagian Administrasi Umum', 5),
('PEG1011', '', 'Bagian Humas dan Protokol', 5),
('PEG1012', '', 'Bagian Hukum', 5),
('PEG1013', '', 'Bagian Organisasi', 5),
('PEG1014', '', 'Bagian Adm.Kesejahteraan Rakyat dan Kemasyarakatan', 5),
('PEG1015', '', 'Bagian Adm.Perekonomian dan Sumber Daya Alam', 5),
('PEG1016', '', 'Bagian Administrasi Pembangunan', 5),
('PEG1017', '', 'Bagian Adm.Pemerintahan Umum', 5),
('PEG1018', '', 'Sekertariat Dewan Perwakilan Rakyat ', 5),
('PEG1019', '', 'Sekertariat KORPRI', 5),
('PEG1020', '', 'Satuan Polisi Pamong Praja', 5),
('PEG1021', '', 'Inspektorat', 5),
('PEG1022', '', 'RSUD Komodo', 5),
('PEG1023', '', 'Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah', 5),
('PEG1024', '', 'Badan Kesatuan Bangsa dan Politik', 5),
('PEG1025', '', 'Badan Penanggulangan Bencana Daerah', 5),
('PEG1026', '', 'Badan Pengelolah Keuangan Daerah', 5),
('PEG1027', '', 'Dinas Pekerjaan Umum dan Penata Ruang', 5),
('PEG1028', '', 'Dinas Komunikasi dan Informatika', 5),
('PEG1029', '', 'Dinas Kearsipan dan Perpustakaan ', 5),
('PEG1030', '', 'Dinas Kesehatan', 5),
('PEG1031', '', 'Dinas Ketahanan Pangan dan Perikanan', 5),
('PEG1032', '', 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 5),
('PEG1033', '', 'Dinas Tanaman Pangan,Holtikultura dan Perkebunan', 5),
('PEG1034', '', 'Dinas Lingkungan Hidup dan Kebersihan', 5),
('PEG1035', '', 'Dinas Perhubungan', 5),
('PEG1036', '', 'Dinas Kependudukan dan Pencatatan Sipil', 5),
('PEG1037', '', 'Dinas Sosial', 5),
('PEG1038', '', 'Dinas Tenaga Kerja dan Transmigrasi', 5),
('PEG1039', '', 'Dinas Pariwisata dan Kebudayaan', 5),
('PEG1040', '', 'Dinas Perumahan Rakyat Kawasan Pemukiman dan Pertanahan', 5),
('PEG1041', '', 'Dinas Perdagangan dan Perindustrian, Koperasi dan Usaha Kecil Menengah', 5),
('PEG1042', '', 'Dinas Peternakan dan Kesehatan Hewan', 5),
('PEG1043', '', 'Dinas Pemberdayaan Masyarakat dan Desa', 5),
('PEG1044', '', 'Dinas Pengendalian Penduduk, Keluarga Berencana Pemberdayaan Perempuan dan Perlindungan Anak', 5),
('PEG1045', '', 'Kecamatan Komodo', 5),
('PEG1046', '', 'Kecamatan Mbeliling', 5),
('PEG1047', '', 'Kecamatam Boleng', 5),
('PEG1048', '', 'Kecamatan Sano Nggoang', 5),
('PEG1049', '', 'Kecamatan Lembor', 5),
('PEG1050', '', 'Kecamatan Lembor Selatan', 5),
('PEG1051', '', 'Kecamatan Kuwus', 5),
('PEG1052', '', 'Kecamatan Welak', 5),
('PEG1053', '', 'Kecamatan Ndoso', 5),
('PEG1054', '', 'Kecamatan Macang Pacar', 5),
('PEG1055', '', 'Kecamatan Pacar', 5),
('PEG1056', '', 'Kecamatan Kuwus Barat', 5),
('PEG1057', '', 'Kelurahan Labuah Bajo', 5),
('PEG1058', '', 'Kelurahan Wae Kelambu', 5),
('PEG1059', '', 'Kelurahan Nantal', 5),
('PEG1060', '', 'Kelurahan Tangge', 5),
('PEG1061', '19750228 200903 2 00', 'Wihelmina Imelda Pano, SE', 6),
('PEG1062', '19740125 200904 1 00', 'Timotius Patrik Mariahma,SE', 7),
('PEG1063', '19650721 199803 1 00', 'Viktor Budi,SH', 8),
('PEG1064', '19650620 198603 1 01', 'Herman Nantu,S.IP', 10),
('PEG1065', '19660222 199402 2 00', 'Kristina Nala, SH', 9),
('PEG1066', '19850110 201212 2 00', 'Marselina J.Endang, SE', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_surat_keluar`
--
ALTER TABLE `tb_detail_surat_keluar`
  ADD KEY `id_surat_keluar` (`id_surat_keluar`),
  ADD KEY `id_pegawai` (`id_user`);

--
-- Indexes for table `tb_format_surat`
--
ALTER TABLE `tb_format_surat`
  ADD PRIMARY KEY (`id_format_surat`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_jenis_surat`
--
ALTER TABLE `tb_jenis_surat`
  ADD PRIMARY KEY (`id_jenis_surat`);

