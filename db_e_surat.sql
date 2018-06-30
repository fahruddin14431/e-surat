-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 30 Jun 2018 pada 12.05
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
  `id` int(11) NOT NULL,
  `id_surat_keluar` varchar(11) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_format_surat`
--

CREATE TABLE `tb_format_surat` (
  `id_format_surat` int(11) NOT NULL,
  `nama_kop` varchar(50) NOT NULL,
  `kop_surat` varchar(255) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_format_surat`
--

INSERT INTO `tb_format_surat` (`id_format_surat`, `nama_kop`, `kop_surat`, `logo`) VALUES
(1, 'Kop Surat BKPPD Manggarai Barat', '<h2 style=\"text-align:center\"><span style=\"font-size:14px\"><strong>PEMERINTAH KEBUPATEN MANGGARAI BARAT BADANG KEPEGAWAIAN PENDIDIKAN DAN PELATAHIAN DAERAH Jln. Frans Sales Lega Labuhan Bajo NTT, email:bkdmabar@gmail.com</strong></span></h2>\r\n', 'logo.jpg');

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
(5, 'Instansi'),
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
(5, 'BKPPD.890', 'Pengambilan Sertifikat Diklat', '<p><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Sesuai Perihal Surat Edaran diatas, maka dengan ini disampaikan bhwa sertifikat Pendidikan dan Pelatihan Teknis Tugas dan Fungsi PNS Lingkup Pemerintah Kabupaten Manggarai Barat sudah ada, oleh karena itu diminta bantuan pimpinan OPD agar menyampaikan kepada staf untuk segera mengambil sertifikat di Badan Kepegawaian Pendidikan dan Pelatihan Daerah Kabupaten Mangarai Barat cq. Bidang Perencanaan dan Diklat BKPPD Kabupaten Manggarai Barat setiap jam kerja.</span></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Demikian untuk maklum dan atas kerjasamamya diucapkan terima kasih.</span></span></p>\r\n'),
(6, 'BKPPD.822', 'Kenaikan Gaji Berkala', '<p>Dengan ini diberitahukan bahwa berhubung dengan telah dipenuhi masa kerja dan syarat-syarat lain nya kepada :</p>\r\n\r\n<p>1. Nama&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: .........<br />\r\n2. Nomor Induk Pegawai (NIP)&nbsp; &nbsp; &nbsp; : .........<br />\r\n3. Pangkat/Golongan Ruang Gaji &nbsp;: .........<br />\r\n4. Unit Kerja&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Badan Kepegawaian, Pendidikan dan Pelatihan Daerah Kabupaten Manggarai Barat<br />\r\n5. Gaji Pokok Lama&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Rp. ......</p>\r\n\r\n<p>&nbsp; &nbsp; (Atas dasar SKP terakhir tentang gaji/pangkat yang ditetapkan):<br />\r\n&nbsp; &nbsp;&nbsp;<br />\r\n&nbsp; &nbsp; a. Oleh Pejabat&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Bupati Manggarai Barat<br />\r\n&nbsp; &nbsp; b. Tanggal&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: .......<br />\r\n&nbsp; &nbsp; c. Nomor&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: .......<br />\r\n&nbsp; &nbsp; d. Tanggal berlakunya Gaji tersebut&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp;.......<br />\r\n&nbsp; &nbsp; e. Masa Kerja Golongan pada tanggal tersebut : .......</p>\r\n\r\n<p>&nbsp; &nbsp; Diberikan gaji berkala hingga memperoleh :</p>\r\n\r\n<p>6. Gaji Pokok Baru&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Rp. ......<br />\r\n7. Berdasarkan Maasa Kerja&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : ......<br />\r\n8. Pangkat/Golongan ruang&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : ......<br />\r\n9. Terhitung Mulai Tanggal&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : ......<br />\r\n10.TMT Gaji Berkala berikutnya&nbsp; &nbsp; &nbsp; : ......</p>\r\n\r\n<p>Diharapkan agar sesuai dengan peraturan pemerintah Nomor 30 Tahun 2015, maka kepada pegawai negeri sipil tersebut dapat dibayarkan penghasilan nya sebesar gaji yang baru.</p>\r\n'),
(10, 'BKPPD.823', 'Kenaikan Pangkat', '<ol>\r\n	<li style=\"text-align:justify\">Bersama ini kami sampikan dengan hormat, usul kenaikan pangkat Pegawai Negeri Sipil dilingkungan Pemerintah Kabupaten Manggarai Barat sebagaimana tersebut di bawah ini.&nbsp;</li>\r\n</ol>\r\n\r\n<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"text-align:justify; width:700px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:center\">NO</td>\r\n			<td rowspan=\"1\" style=\"text-align:center\">NAMA/NIP</td>\r\n			<td colspan=\"2\" rowspan=\"1\" style=\"text-align:center\">PANGKAT/GOLONGAN RUANG</td>\r\n			<td style=\"text-align:center\">JABATAN</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td rowspan=\"1\">&nbsp;</td>\r\n			<td rowspan=\"1\">&nbsp;</td>\r\n			<td rowspan=\"1\">&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style=\"text-align:justify\">Sesuai ketentuan dalam Peraturan Pemerintah Nomor 99 tahun 2000 j0 Peraturan Pemerintah Nomor 12 Tahun 2002, yang bersangkutan telah memenuhi syarat untuk dapat dipertimbangkan kenaikan pangkatnya setingkat lebih tinggi</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\">2.&nbsp;Demikian atas perhatian dan perkenaanya, kami ucapkan terima kasih.</p>\r\n'),
(11, 'BKPPD.875', ' Usulan Karpeg', '<table border=\"1\" cellspacing=\"0\" class=\"MsoTableGrid\" style=\"border-collapse:collapse; border:solid windowtext 1.0pt\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:33.75pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"color:black\">No</span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:205.65pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"color:black\">Jenis Surat yang dikirim</span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:119.7pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"color:black\">Banyaknya</span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:119.7pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"color:black\">Keterangan</span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:33.75pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"color:black\">1</span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:205.65pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"color:black\">Usulan Penerbitan kembali KARPEG an. Daniel Pardi</span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:119.7pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"color:black\">1 Orang</span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:119.7pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"color:black\">Dikirim dengan hormat untuk diproses selanjutnya</span></span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(14, 'BKPPD.810', 'Kelengkapan Berkas CPNS', '<p>Menunjuk surat Kepala Bidang Pengangkatan dan Pensiun Kantor Regional X BKN Nomor : 007/KR.X.C1/VII/2017, tanggal 17 Juli 2017. Perihal Pengembalian Berkas Usul Penetapan NIP GGD Kemendikbud Tahun 2017 ( sebayak 12 orang) a.n Laurensius Logot, dkk, maka setelah ke 12 CPNS tersebut memperbaiki bahan-bahan yang kurang dengan ini kami menyampaikan kembali kelengkapan berkas-berkasnya untuk diverifikasi guna penetapan NIPnya.</p>\r\n\r\n<p>Demikian penyampaian kami, atas perhatian Bapak kami sampaikan terimakasih.</p>\r\n'),
(17, 'BKPPD.870', 'Undangan', '<p>Dengan hormat, Badan Kepegawaian Pendidikan Pelatihan Daerah Kabupaten Manggarai Barat akan menggadakan rapat pembentukan panitia penerimaan CPNS Tahun 2018 yang akan dilaksanakan pada:</p>\r\n\r\n<p>Hari/ tanggal : Senin 25 Juni 2018<br />\r\nwaktu : pukul 08.00 pagi - Selesai<br />\r\nTempat : Kantor BKPPD<br />\r\nAcara : Pembentukan Panitia Penerimaan CPNS</p>\r\n\r\n<p>Sehubungan dengan hal tersebut diatas sangat penting, maka kami mohon dengan hormat untuk hadir tepat waktu dan tidak bisa diwakili.</p>\r\n\r\n<p>Demikian untuk maklum dan atas kerjasamamya diucapkan terima kasih.</p>\r\n'),
(20, 'BKPPD.841', 'Laporan Keuangan', '<table border=\"1\" cellspacing=\"0\" class=\"MsoTableGrid\" style=\"border-collapse:collapse; border:solid windowtext 1.0pt\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:33.75pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\"><span style=\"color:black\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">No</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:205.65pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\"><span style=\"color:black\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">Jenis Surat yang dikirim</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:119.7pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\"><span style=\"color:black\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">Banyaknya</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:119.7pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\"><span style=\"color:black\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">Keterangan</span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:33.75pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\"><span style=\"color:black\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">1</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:205.65pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\"><span style=\"color:black\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">Laporan Data Realisasi Belanja langsung APBD, kedaan s/d tanggal 30 Juni 2017 pada BKPPD</span></span></span></span></p>\r\n\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\">&nbsp;</p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:119.7pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\"><span style=\"color:black\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">1(satu) jepit</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:119.7pt\">\r\n			<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\"><span style=\"color:black\"><span style=\"font-family:&quot;Times New Roman&quot;,&quot;serif&quot;\">Dikirim dengan hormat untuk diproses selanjutnya</span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `kata_sandi` varchar(50) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `status` enum('ADMIN','TU','INSTANSI','KEPALA BADAN','BIDANG') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id`, `nama_pengguna`, `kata_sandi`, `id_user`, `status`) VALUES
(1, 'kepala', 'kepala', 'PEG1001', 'KEPALA BADAN'),
(2, 'admin', 'admin', 'PEG1002', 'ADMIN'),
(11, 'dispen', 'dispen', 'PEG1006', 'INSTANSI'),
(15, 'BAU', 'BAU', 'PEG1010', 'INSTANSI'),
(16, 'humas', 'HUMAS', 'PEG1011', 'INSTANSI'),
(17, 'hukum', 'hukum', 'PEG1012', 'INSTANSI'),
(18, 'organisasi', 'organisasi', 'PEG1013', 'INSTANSI'),
(19, 'kesra', 'kesra', 'PEG1014', 'INSTANSI'),
(20, 'SDA', 'sda', 'PEG1015', 'INSTANSI'),
(21, 'pembangunan', 'pembangunan', 'PEG1016', 'INSTANSI'),
(22, 'pemerintahan', 'pemerintahan', 'PEG1017', 'INSTANSI'),
(23, 'sekwan', 'sekwan', 'PEG1018', 'INSTANSI'),
(24, 'korpri', 'korpri', 'PEG1019', 'INSTANSI'),
(25, 'polpp', 'polpp', 'PEG1020', 'INSTANSI'),
(26, 'inspektorat', 'inspektorat', 'PEG1021', 'INSTANSI'),
(27, 'rsud', 'rsud', 'PEG1022', 'INSTANSI'),
(28, 'bapeda', 'bapeda', 'PEG1023', 'INSTANSI'),
(29, 'kesbangpol', 'kesbangpol', 'PEG1024', 'INSTANSI'),
(30, 'bencana', 'bencana', 'PEG1025', 'INSTANSI'),
(31, 'keuangan', 'keuangan', 'PEG1026', 'INSTANSI'),
(32, 'pu', 'pu', 'PEG1027', 'INSTANSI'),
(33, 'infokom', 'infokom', 'PEG1028', 'INSTANSI'),
(34, 'dipe', 'dipe', 'PEG1029', 'INSTANSI'),
(35, 'dinkes', 'dinkes', 'PEG1030', 'INSTANSI'),
(36, 'ketahanan ', 'ketahanan', 'PEG1031', 'INSTANSI'),
(37, 'diperizinan', 'diperizinan', 'PEG1032', 'INSTANSI'),
(38, 'perkebunan', 'perkebunan', 'PEG1033', 'INSTANSI'),
(39, 'LHK', 'LHK', 'PEG1034', 'INSTANSI'),
(40, 'perhubungan', 'perhubungan', 'PEG1035', 'INSTANSI'),
(41, 'capil', 'capil', 'PEG1036', 'INSTANSI'),
(42, 'sosial', 'sosial', 'PEG1037', 'INSTANSI'),
(43, 'nakertrans', 'nakertrans', 'PEG1038', 'INSTANSI'),
(44, 'pariwisata', 'pariwisata', 'PEG1039', 'INSTANSI'),
(45, 'perumahan', 'perumahan', 'PEG1040', 'INSTANSI'),
(46, 'perindagkop', 'perindagkop', 'PEG1041', 'INSTANSI'),
(47, 'peternakan', 'peternakan', 'PEG1042', 'INSTANSI'),
(48, 'pemberdayaan', 'pemberdayaan', 'PEG1043', 'INSTANSI'),
(49, 'kb', 'kb', 'PEG1044', 'INSTANSI'),
(50, 'Komodo', 'Komodo', 'PEG1045', 'INSTANSI'),
(51, ' Mbeliling', ' Mbeliling', 'PEG1046', 'INSTANSI'),
(52, 'Boleng', 'Boleng', 'PEG1047', 'INSTANSI'),
(53, 'Sano Nggoang', 'Sano Nggoang', 'PEG1048', 'INSTANSI'),
(54, 'Lembor', 'Lembor', 'PEG1049', 'INSTANSI'),
(55, 'Lembor Selatan', 'Lembor Selatan', 'PEG1050', 'INSTANSI'),
(56, 'Kuwus', 'Kuwus', 'PEG1051', 'INSTANSI'),
(57, 'Welak', 'Welak', 'PEG1052', 'INSTANSI'),
(58, 'Ndoso', 'Ndoso', 'PEG1053', 'INSTANSI'),
(59, 'Macang Pacar', 'Macang Pacar', 'PEG1054', 'INSTANSI'),
(60, 'Pacar', 'Pacar', 'PEG1055', 'INSTANSI'),
(61, 'Kuwus Barat', 'Kuwus Barat', 'PEG1056', 'INSTANSI'),
(62, 'Labuah Bajo', 'Labuah Bajo', 'PEG1057', 'INSTANSI'),
(63, 'Wae Kelambu', 'Wae Kelambu', 'PEG1058', 'INSTANSI'),
(64, 'Nantal', 'Nantal', 'PEG1059', 'INSTANSI'),
(65, 'Tangge', 'Tangge', 'PEG1060', 'INSTANSI'),
(66, 'Bagian Umum', 'BagianUmum', 'PEG1061', 'BIDANG'),
(67, 'Bagian Keuangan', 'BagianKeuangan', 'PEG1062', 'BIDANG'),
(68, 'INKA', 'INKA', 'PEG1063', 'BIDANG'),
(69, 'Bidang Diklat', 'BidangDiklat', 'PEG1064', 'BIDANG'),
(70, 'mutasi', 'mutasi', 'PEG1065', 'BIDANG'),
(71, 'tu', 'tu', 'PEG1066', 'TU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat_keluar`
--

CREATE TABLE `tb_surat_keluar` (
  `id_surat_keluar` varchar(11) NOT NULL,
  `id_jenis_surat` int(11) NOT NULL,
  `id_format_surat` int(11) NOT NULL,
  `lampiran` varchar(50) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `tembusan` text NOT NULL,
  `tanggal` date NOT NULL,
  `file_surat` varchar(100) NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `dari` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat_masuk`
--

CREATE TABLE `tb_surat_masuk` (
  `id_surat_masuk` varchar(11) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `no_agenda` varchar(50) NOT NULL,
  `indeks_masalah` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_surat_penerimaan` date NOT NULL,
  `file_surat` varchar(100) DEFAULT NULL,
  `scan_surat` varchar(100) NOT NULL,
  `scan_surat2` varchar(100) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `instruksi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_surat_masuk`
--

INSERT INTO `tb_surat_masuk` (`id_surat_masuk`, `id_user`, `no_surat`, `no_agenda`, `indeks_masalah`, `perihal`, `tanggal_surat`, `tanggal_surat_penerimaan`, `file_surat`, `scan_surat`, `scan_surat2`, `id_jabatan`, `status`, `instruksi`) VALUES
('SUM1001', 'PEG1006', 'no surat', 'no agenda', 'indeks masalah', 'perihal', '2018-12-31', '2018-12-31', 'SUM1001.pdf', 'SUM1001-1.png', 'SUM1001-2.png', 6, 0, 'instruksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nip`, `nama`, `id_jabatan`, `gambar`) VALUES
('PEG1001', '19650804 199703 1 002', 'IR. Sebastianus Wantung', 1, ''),
('PEG1002', '', 'MAKSIMUS E. JAPEN, SE', 4, ''),
('PEG1004', '', 'WILHELMINA O. JAMI', 4, ''),
('PEG1006', '', 'Dinas Pendidikan Pemuda dan Olahraga', 5, 'pko.png'),
('PEG1010', '', 'Bagian Administrasi Umum', 5, ''),
('PEG1011', '', 'Bagian Humas dan Protokol', 5, ''),
('PEG1012', '', 'Bagian Hukum', 5, ''),
('PEG1013', '', 'Bagian Organisasi', 5, ''),
('PEG1014', '', 'Bagian Adm.Kesejahteraan Rakyat dan Kemasyarakatan', 5, ''),
('PEG1015', '', 'Bagian Adm.Perekonomian dan Sumber Daya Alam', 5, ''),
('PEG1016', '', 'Bagian Administrasi Pembangunan', 5, ''),
('PEG1017', '', 'Bagian Adm.Pemerintahan Umum', 5, ''),
('PEG1018', '', 'Sekertariat Dewan Perwakilan Rakyat ', 5, ''),
('PEG1019', '', 'Sekertariat KORPRI', 5, ''),
('PEG1020', '', 'Satuan Polisi Pamong Praja', 5, 'pamong_praja.png'),
('PEG1021', '', 'Inspektorat', 5, ''),
('PEG1022', '', 'RSUD Komodo', 5, 'rsud_komodo.png'),
('PEG1023', '', 'Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah', 5, 'perencanaan.png'),
('PEG1024', '', 'Badan Kesatuan Bangsa dan Politik', 5, 'kesatuan_bangsa.png'),
('PEG1025', '', 'Badan Penanggulangan Bencana Daerah', 5, ''),
('PEG1026', '', 'Badan Pengelolah Keuangan Daerah', 5, 'pengelola_keuangan.png'),
('PEG1027', '', 'Dinas Pekerjaan Umum dan Penata Ruang', 5, 'pekerjaan_umum.png'),
('PEG1028', '', 'Dinas Komunikasi dan Informatika', 5, 'kominfo.png'),
('PEG1029', '', 'Dinas Kearsipan dan Perpustakaan ', 5, 'kearsiapan.png'),
('PEG1030', '', 'Dinas Kesehatan', 5, 'dinkes.png'),
('PEG1031', '', 'Dinas Ketahanan Pangan dan Perikanan', 5, 'ketahanan_pangan.png'),
('PEG1032', '', 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 5, 'penanaman_modal.png'),
('PEG1033', '', 'Dinas Tanaman Pangan,Holtikultura dan Perkebunan', 5, 'tanaman_pangan.png'),
('PEG1034', '', 'Dinas Lingkungan Hidup dan Kebersihan', 5, 'lingkungan_hidup.png'),
('PEG1035', '', 'Dinas Perhubungan', 5, 'dishbub.png'),
('PEG1036', '', 'Dinas Kependudukan dan Pencatatan Sipil', 5, 'dispenduk.png'),
('PEG1037', '', 'Dinas Sosial', 5, 'dinsos.png'),
('PEG1038', '', 'Dinas Tenaga Kerja dan Transmigrasi', 5, 'tenaga_kerja.png'),
('PEG1039', '', 'Dinas Pariwisata dan Kebudayaan', 5, 'pariwisata.png'),
('PEG1040', '', 'Dinas Perumahan Rakyat Kawasan Pemukiman dan Pertanahan', 5, 'perumahan_rakyat.png'),
('PEG1041', '', 'Dinas Perdagangan dan Perindustrian, Koperasi dan Usaha Kecil Menengah', 5, 'perdangangan.png'),
('PEG1042', '', 'Dinas Peternakan dan Kesehatan Hewan', 5, 'peternakan.png'),
('PEG1043', '', 'Dinas Pemberdayaan Masyarakat dan Desa', 5, 'pemberdayaan_masyarakat.png'),
('PEG1044', '', 'Dinas Pengendalian Penduduk, Keluarga Berencana Pemberdayaan Perempuan dan Perlindungan Anak', 5, 'pengendalian_penduduk.png'),
('PEG1045', '', 'Kecamatan Komodo', 5, ''),
('PEG1046', '', 'Kecamatan Mbeliling', 5, ''),
('PEG1047', '', 'Kecamatam Boleng', 5, ''),
('PEG1048', '', 'Kecamatan Sano Nggoang', 5, ''),
('PEG1049', '', 'Kecamatan Lembor', 5, ''),
('PEG1050', '', 'Kecamatan Lembor Selatan', 5, ''),
('PEG1051', '', 'Kecamatan Kuwus', 5, ''),
('PEG1052', '', 'Kecamatan Welak', 5, ''),
('PEG1053', '', 'Kecamatan Ndoso', 5, ''),
('PEG1054', '', 'Kecamatan Macang Pacar', 5, ''),
('PEG1055', '', 'Kecamatan Pacar', 5, ''),
('PEG1056', '', 'Kecamatan Kuwus Barat', 5, ''),
('PEG1057', '', 'Kelurahan Labuah Bajo', 5, ''),
('PEG1058', '', 'Kelurahan Wae Kelambu', 5, ''),
('PEG1059', '', 'Kelurahan Nantal', 5, ''),
('PEG1060', '', 'Kelurahan Tangge', 5, ''),
('PEG1061', '', 'Wihelmina Imelda Pano, SE', 6, ''),
('PEG1062', '', 'Timotius Patrik Mariahma,SE', 7, ''),
('PEG1063', '', 'Viktor Budi,SH', 8, ''),
('PEG1064', '', 'Herman Nantu,S.IP', 10, ''),
('PEG1065', '', 'Kristina Nala, SH', 9, ''),
('PEG1066', '', 'Marselina J.Endang, SE', 4, ''),
('PEG1067', '19630404 19610 1 001', 'Drs.Bernadus Dandur, M.Si', 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_surat_keluar`
--
ALTER TABLE `tb_detail_surat_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_surat_keluar` (`id_surat_keluar`),
  ADD KEY `id_pegawai` (`id_user`),
  ADD KEY `id_jabatan` (`id_jabatan`);

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

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pegawai` (`id_user`);

--
-- Indexes for table `tb_surat_keluar`
--
ALTER TABLE `tb_surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`),
  ADD KEY `id_jenis_surat` (`id_jenis_surat`),
  ADD KEY `id_format_surat` (`id_format_surat`);

--
-- Indexes for table `tb_surat_masuk`
--
ALTER TABLE `tb_surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_pegawai` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_surat_keluar`
--
ALTER TABLE `tb_detail_surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_format_surat`
--
ALTER TABLE `tb_format_surat`
  MODIFY `id_format_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_jenis_surat`
--
ALTER TABLE `tb_jenis_surat`
  MODIFY `id_jenis_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detail_surat_keluar`
--
ALTER TABLE `tb_detail_surat_keluar`
  ADD CONSTRAINT `tb_detail_surat_keluar_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_surat_keluar_ibfk_3` FOREIGN KEY (`id_surat_keluar`) REFERENCES `tb_surat_keluar` (`id_surat_keluar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_surat_keluar_ibfk_4` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`);

--
-- Ketidakleluasaan untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD CONSTRAINT `tb_login_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_surat_keluar`
--
ALTER TABLE `tb_surat_keluar`
  ADD CONSTRAINT `tb_surat_keluar_ibfk_1` FOREIGN KEY (`id_jenis_surat`) REFERENCES `tb_jenis_surat` (`id_jenis_surat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_surat_keluar_ibfk_2` FOREIGN KEY (`id_format_surat`) REFERENCES `tb_format_surat` (`id_format_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_surat_masuk`
--
ALTER TABLE `tb_surat_masuk`
  ADD CONSTRAINT `tb_surat_masuk_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_surat_masuk_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
