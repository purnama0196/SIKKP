-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2020 at 11:47 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sikkp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `id_user` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `id_role` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_user`, `username`, `password`, `id_role`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(2, 'purnama', '$2y$13$0ZHAJwvjhby6ivByR.wp0.162kTjNqqus.E67weB5QYO2BgS6dw..', 4),
(8, 'adel', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(9, 'ani', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(14, 'test', '827ccb0eea8a706c4c34a16891f84e7b', 4),
(15, 'test1', '827ccb0eea8a706c4c34a16891f84e7b', 4),
(16, 'purnama2', '827ccb0eea8a706c4c34a16891f84e7b', 4),
(17, 'apriani', '827ccb0eea8a706c4c34a16891f84e7b', 4),
(18, 'jun', '827ccb0eea8a706c4c34a16891f84e7b', 4);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `nama_dosen` varchar(500) NOT NULL,
  `email` varchar(200) NOT NULL,
  `id_akun` int(20) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `id_prodi` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nik`, `nama_dosen`, `email`, `id_akun`, `jabatan`, `id_prodi`) VALUES
(4, 655, 'adel', 'adel@gmail.om', 8, 'kaprodi', 3),
(5, 4232, 'ani', 'ani@gmail.com', 9, 'kaprodi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `form_bimbingan`
--

CREATE TABLE IF NOT EXISTS `form_bimbingan` (
  `id_form_bimbingan` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `materi_bahasan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form_pengajuan_dopim`
--

CREATE TABLE IF NOT EXISTS `form_pengajuan_dopim` (
  `id_form_dopim` int(20) NOT NULL,
  `kaprodi` varchar(200) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `topik` varchar(200) NOT NULL,
  `tujuan_tema` varchar(1000) NOT NULL,
  `judul_laporan_kkp` varchar(1000) NOT NULL,
  `konten` varchar(100) DEFAULT NULL,
  `status_approval` int(11) NOT NULL,
  `id_pengaju` int(20) NOT NULL,
  `id_kkp` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_pengajuan_dopim`
--

INSERT INTO `form_pengajuan_dopim` (`id_form_dopim`, `kaprodi`, `id_dosen`, `topik`, `tujuan_tema`, `judul_laporan_kkp`, `konten`, `status_approval`, `id_pengaju`, `id_kkp`) VALUES
(5, '4', 5, 'tedt', 'tret', 'test', NULL, 0, 16, 8),
(6, '4', 4, 'testq', 'testwq', 'Pembangunan aplikasi abc', NULL, 0, 17, 9);

-- --------------------------------------------------------

--
-- Table structure for table `form_pengajuan_dopim_detail`
--

CREATE TABLE IF NOT EXISTS `form_pengajuan_dopim_detail` (
  `id_form_dopim_detail` int(20) NOT NULL,
  `id_form_pengajuan` int(20) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `jenjang_pendidikan` varchar(10) NOT NULL,
  `program_studi` varchar(10) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `telepon` varchar(14) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form_pengajuan_kkp`
--

CREATE TABLE IF NOT EXISTS `form_pengajuan_kkp` (
  `id_form` int(20) NOT NULL,
  `judul` varchar(500) NOT NULL,
  `penerima_satu` varchar(300) NOT NULL,
  `penerima_dua` varchar(300) DEFAULT NULL,
  `nama_perusahaan` varchar(500) NOT NULL,
  `alamat_perusahaan` varchar(1000) NOT NULL,
  `jenjang_pendidikan` varchar(100) NOT NULL,
  `prodi` int(20) NOT NULL,
  `divisi` varchar(200) DEFAULT NULL,
  `status_approval` int(30) NOT NULL,
  `pengaju` varchar(200) DEFAULT NULL,
  `id_pengaju` int(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_pengajuan_kkp`
--

INSERT INTO `form_pengajuan_kkp` (`id_form`, `judul`, `penerima_satu`, `penerima_dua`, `nama_perusahaan`, `alamat_perusahaan`, `jenjang_pendidikan`, `prodi`, `divisi`, `status_approval`, `pengaju`, `id_pengaju`) VALUES
(1, 'KKP (Kuliah Kerja Praktek)', 'Manajer SDM Keuangan & IT', NULL, 'UTP Balai Yasa Manggarai', 'Manggarai, Jl.Bukit Duri, Tebet', 'S1', 0, 'IT', 4, NULL, 1),
(2, 'KKP Sistem Informasi', 'IT Head', NULL, 'PT. Internasional', 'Gambir, Jl. Fachrudin,No. 18', 'S1', 0, 'IT', 1, NULL, 2),
(3, 'Judul KKP', 'Penerima Satu', '', 'Nama Perusahaan', 'Alamat', 'S1', 1, 'IT', 1, NULL, 1),
(9, 'Pembangunan aplikasi abc', 'test', 'test', 'test1', 'test', 'D3', 3, 'IT', 3, NULL, 17),
(10, 'Analisis sistem abc', 'test', 'test', 'test', 'test', 'D3', 1, 'IT', 0, NULL, 18),
(11, 'test65', 'test52', 'test51', 'test', 'test45', 'D3', 3, 'IT', 0, NULL, 16);

-- --------------------------------------------------------

--
-- Table structure for table `form_pengajuan_kkp_detail`
--

CREATE TABLE IF NOT EXISTS `form_pengajuan_kkp_detail` (
  `id_form_detail` int(30) NOT NULL,
  `id_form` int(20) NOT NULL,
  `nim_mahasiswa` varchar(200) NOT NULL,
  `nama_mahasiswa` varchar(300) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `jenjang_pendidikan` varchar(10) DEFAULT NULL,
  `program_studi` varchar(10) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_pengajuan_kkp_detail`
--

INSERT INTO `form_pengajuan_kkp_detail` (`id_form_detail`, `id_form`, `nim_mahasiswa`, `nama_mahasiswa`, `email`, `telepon`, `jenjang_pendidikan`, `program_studi`, `tempat_lahir`, `tanggal_lahir`, `alamat`) VALUES
(1, 1, '11314055', 'Purnama Pasaribu', 'purnama@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, '11314056', 'Prety Girsang', 'pretty@yahoo.co.id', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 2, '11314057', 'Bernike Sitanggang', 'bernike@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 2, '11314058', 'Aditya Pranata', 'aditya@yahoo.co.id', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 2, '11314059', 'Maykana Sagala', 'maykana@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 3, '111', '111', '111', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1, '3324323', 'test', 'testse@gsg.gsg', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 4, '111111111', 'nama', 'email@asas.voon', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 9, '11314002', 'Apriani Simanjuntak', 'test', '123', 'D3', 'Sistem Inf', 'Jakarta', '2019-01-01', 'Alamat apriani'),
(13, 9, '11314001', 'Purnama Pasaribu', 'test', '234', 'D3', 'Sistem Inf', 'Jakarta', '2019-01-01', 'Test'),
(14, 10, '11314003', 'Jun', 'test', '345', 'D3', 'Sistem Aku', 'Jakarta', '2019-01-01', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_kkp`
--

CREATE TABLE IF NOT EXISTS `laporan_kkp` (
  `id_laporan` int(20) NOT NULL,
  `id_form_pengajuan_dopim` int(20) DEFAULT NULL,
  `nama_laporan` varchar(50) DEFAULT NULL,
  `content` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_kkp`
--

INSERT INTO `laporan_kkp` (`id_laporan`, `id_form_pengajuan_dopim`, `nama_laporan`, `content`) VALUES
(1, 1, 'test', ''),
(2, 1, 'testt', ''),
(3, 1, 'testt', ''),
(4, 1, 'testt', ''),
(5, 1, 'testt', ''),
(6, 1, 'testt', ''),
(7, 1, 'testt', 'File Laporan Kkp/testt.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id_mahasiswa` bigint(20) NOT NULL,
  `nim` bigint(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kode_prodi` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `tempat_lahir`, `tanggal_lahir`, `kode_prodi`, `id_akun`) VALUES
(1, 1710535, 'test', 'batu', '1991-12-01', 3, 14),
(2, 11314001, 'Purnama Pasaribu', 'Jakarta', '2019-01-01', 3, 16),
(3, 11314002, 'Apriani Simanjuntak', 'Jakarta', '2019-01-01', 3, 17),
(4, 11314003, 'jun', 'Jakarta', '2019-01-01', 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE IF NOT EXISTS `prodi` (
  `id_prodi` int(20) NOT NULL,
  `prodi` varchar(200) NOT NULL,
  `kaprodi` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `prodi`, `kaprodi`) VALUES
(1, 'Sistem Akuntasi', 'ani'),
(3, 'Sistem Informasi', 'adel');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(20) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'koordinator'),
(2, 'kaprodi'),
(3, 'dosen'),
(4, 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `status_approval`
--

CREATE TABLE IF NOT EXISTS `status_approval` (
  `id_approval` int(20) NOT NULL,
  `status_approval` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_approval`
--

INSERT INTO `status_approval` (`id_approval`, `status_approval`) VALUES
(1, 'submited'),
(2, 'approved by admin'),
(3, 'rejected by admin'),
(4, 'approved by kaprodi'),
(5, 'rejected by kaprodi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_user`), ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `form_bimbingan`
--
ALTER TABLE `form_bimbingan`
  ADD PRIMARY KEY (`id_form_bimbingan`);

--
-- Indexes for table `form_pengajuan_dopim`
--
ALTER TABLE `form_pengajuan_dopim`
  ADD PRIMARY KEY (`id_form_dopim`), ADD KEY `status_approval` (`status_approval`);

--
-- Indexes for table `form_pengajuan_dopim_detail`
--
ALTER TABLE `form_pengajuan_dopim_detail`
  ADD PRIMARY KEY (`id_form_dopim_detail`), ADD KEY `id_form_pengajuan` (`id_form_pengajuan`);

--
-- Indexes for table `form_pengajuan_kkp`
--
ALTER TABLE `form_pengajuan_kkp`
  ADD PRIMARY KEY (`id_form`), ADD KEY `status_approval` (`status_approval`), ADD KEY `form_pengajuan_kkp_ibfk_2` (`id_pengaju`);

--
-- Indexes for table `form_pengajuan_kkp_detail`
--
ALTER TABLE `form_pengajuan_kkp_detail`
  ADD PRIMARY KEY (`id_form_detail`), ADD KEY `id_form` (`id_form`);

--
-- Indexes for table `laporan_kkp`
--
ALTER TABLE `laporan_kkp`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `status_approval`
--
ALTER TABLE `status_approval`
  ADD PRIMARY KEY (`id_approval`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_user` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `form_bimbingan`
--
ALTER TABLE `form_bimbingan`
  MODIFY `id_form_bimbingan` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `form_pengajuan_dopim`
--
ALTER TABLE `form_pengajuan_dopim`
  MODIFY `id_form_dopim` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `form_pengajuan_dopim_detail`
--
ALTER TABLE `form_pengajuan_dopim_detail`
  MODIFY `id_form_dopim_detail` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `form_pengajuan_kkp`
--
ALTER TABLE `form_pengajuan_kkp`
  MODIFY `id_form` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `form_pengajuan_kkp_detail`
--
ALTER TABLE `form_pengajuan_kkp_detail`
  MODIFY `id_form_detail` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `laporan_kkp`
--
ALTER TABLE `laporan_kkp`
  MODIFY `id_laporan` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `status_approval`
--
ALTER TABLE `status_approval`
  MODIFY `id_approval` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
