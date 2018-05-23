-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 23 Mei 2018 pada 09.43
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
  `id_pegawai` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_surat_keluar`
--

INSERT INTO `tb_detail_surat_keluar` (`id_surat_keluar`, `id_pegawai`) VALUES
('SUK1001', 'PEG1006'),
('SUK1001', 'PEG1007');

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
(5, 'BKPPD.890/182/VII/2017', 'Pengambilan Sertifikat Diklat', '<p style=\"text-align:justify\">&nbsp; &nbsp; &nbsp; &nbsp;Sesuai perihal surat diatas, maka dengna ini disampaikan bahwa&nbsp;Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat totam ipsum iure accusamus officia quod veniam laborum. Rerum libero consequatur quo laborum reiciendis officia id? Aperiam similique dicta quod vitae.&nbsp;Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat totam ipsum iure accusamus officia quod veniam laborum. Rerum libero consequatur quo laborum reiciendis officia id? Aperiam similique dicta quod vitae.&nbsp;Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat totam ipsum iure accusamus officia quod veniam laborum. Rerum libero consequatur quo laborum reiciendis officia id? Aperiam similique dicta quod vitae.</p>\r\n\r\n<p style=\"text-align:justify\">Demikian untuk maklum dan atas kerjasamanya diucapkan terima kasih.</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `kata_sandi` varchar(50) NOT NULL,
  `id_pegawai` varchar(11) NOT NULL,
  `status` enum('ADMIN','TU','DINAS','KEPALA BADAN','PEGAWAI') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id`, `nama_pengguna`, `kata_sandi`, `id_pegawai`, `status`) VALUES
(1, 'kepala', 'kepala', 'PEG1001', 'KEPALA BADAN'),
(2, 'admin', 'admin', 'PEG1002', 'ADMIN'),
(3, 'tu', 'tu', 'PEG1003', 'TU'),
(10, 'dinbinmar', 'dinbinmar', 'PEG1005', 'DINAS'),
(11, 'dispen', 'dispen', 'PEG1006', 'DINAS'),
(12, 'dispenduk', 'dispenduk', 'PEG1007', 'DINAS'),
(13, 'seker', 'seker', 'PEG1008', 'PEGAWAI'),
(14, 'kabidmutasi', 'kabidmutasi', 'PEG1009', 'PEGAWAI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` varchar(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nip`, `nama`, `id_jabatan`) VALUES
('PEG1001', '196508041997031002', 'IR. SEBASTIANUS WATUNG', 1),
('PEG1002', '198705292014021002', 'MAKSIMUS E. APEN, SE', 4),
('PEG1003', '198301302010012017', 'MARIA P.ERNI, A.MD', 4),
('PEG1004', '198506262006041005', 'WILHELMINA O. JAMI', 4),
('PEG1005', '', 'dinas bina marga', 5),
('PEG1006', '', 'Dinas Pendidikan', 5),
('PEG1007', '', 'Dinas Kependudukan', 5),
('PEG1008', '198506262006041005', 'NAMA SEKRETARIS', 2),
('PEG1009', '198506262006041005', 'NAMA KABID MUTASI', 9);

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
  `id_pegawai` varchar(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `no_agenda` varchar(50) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_surat_penerimaan` date NOT NULL,
  `file_surat` varchar(100) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_surat_masuk`
--

INSERT INTO `tb_surat_masuk` (`id_surat_masuk`, `id_pegawai`, `no_surat`, `no_agenda`, `perihal`, `tanggal_surat`, `tanggal_surat_penerimaan`, `file_surat`, `id_jabatan`, `status`) VALUES
(1, 'PEG1006', '1', '1', '1', '2018-05-12', '2018-05-11', 'Screenshot from 2018-05-03 14-24-59.png', 1, 0),
(2, 'PEG1007', '1_sek', '1', '1', '2018-05-11', '2018-05-11', '2a4b49db-52c8-45c9-9d96-551500c7c9e1.jpeg', 2, 1),
(3, 'PEG1006', '1_kab', '1', '1', '2018-05-23', '0001-01-01', 'Screenshot from 2017-11-21 15-53-14.png', 9, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_surat_keluar`
--
ALTER TABLE `tb_detail_surat_keluar`
  ADD KEY `id_surat_keluar` (`id_surat_keluar`),
  ADD KEY `id_pegawai` (`id_pegawai`);

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
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `tb_surat_keluar`
--
ALTER TABLE `tb_surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`),
  ADD KEY `id_jenis_surat` (`id_jenis_surat`);

--
-- Indexes for table `tb_surat_masuk`
--
ALTER TABLE `tb_surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `id_jenis_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_surat_masuk`
--
ALTER TABLE `tb_surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detail_surat_keluar`
--
ALTER TABLE `tb_detail_surat_keluar`
  ADD CONSTRAINT `tb_detail_surat_keluar_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_surat_keluar_ibfk_3` FOREIGN KEY (`id_surat_keluar`) REFERENCES `tb_surat_keluar` (`id_surat_keluar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD CONSTRAINT `tb_login_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD CONSTRAINT `tb_pegawai_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_surat_keluar`
--
ALTER TABLE `tb_surat_keluar`
  ADD CONSTRAINT `tb_surat_keluar_ibfk_1` FOREIGN KEY (`id_jenis_surat`) REFERENCES `tb_jenis_surat` (`id_jenis_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_surat_masuk`
--
ALTER TABLE `tb_surat_masuk`
  ADD CONSTRAINT `tb_surat_masuk_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_surat_masuk_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
