-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2019 at 05:39 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ket_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  `level` int(1) NOT NULL,
  `RT` int(2) NOT NULL,
  `RW` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `foto`, `role`, `level`, `RT`, `RW`) VALUES
(1, 'agus', '21232f297a57a5a743894a0e4a801fc3', 'Agus Supriyanto', 'IMG20151225122130.jpg', 'Ketua RW 2', 2, 1, 2),
(2, '2', '8f03046831b570af354070c98661d844', 'Krisna Murti W', 'IMG20151225121915.jpg', 'Ketua RT 2', 3, 2, 1),
(3, 'shoichi', '21232f297a57a5a743894a0e4a801fc3', 'Inaba Shoichi', '7ui6i1.jpg', 'Kelurahan', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE IF NOT EXISTS `penduduk` (
`id` int(6) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `NIK` bigint(20) DEFAULT NULL,
  `jenis_kel` varchar(11) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` varchar(15) DEFAULT NULL,
  `kewarganegaraan` varchar(10) DEFAULT NULL,
  `agama` varchar(15) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `pendidikan_ter` varchar(17) DEFAULT NULL,
  `pekerjaan` varchar(25) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `RT` int(2) NOT NULL,
  `RW` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id`, `nama`, `NIK`, `jenis_kel`, `tempat_lahir`, `tgl_lahir`, `kewarganegaraan`, `agama`, `status`, `pendidikan_ter`, `pekerjaan`, `alamat`, `RT`, `RW`) VALUES
(1, 'Shoichi', 3374050403920001, 'Laki-Laki', 'Chiba Prefekture', '1992/03/04', 'WNA', 'Islam', 'Belum Menikah', 'Perguruan Tinggi', 'Pengusaha', 'Semarang', 2, 1),
(2, 'Agus Supriyanto', 3374050602900001, 'Laki-Laki', 'Semarang', '1990/06/02', 'WNI', 'Islam', 'Belum Kawin', 'Perguruan Tinggi', 'Programer', 'Bangetayu wetan rt 06 rw 05 Genuk Semarang', 1, 2),
(3, 'Edi Saiful Hadi', 3374052112920001, 'Laki-Laki', 'Semarang', '1992/21/12', 'WNI', 'Kristen', 'Belum Kawin', 'Perguruan Tinggi', 'Programer', 'Jl. Bugen Utara', 2, 1),
(4, 'Arun Stiadi', 3374050807960041, 'Laki-Laki', 'Rembang', '1996/30/06', 'WNI', 'Islam', 'Belum Kawin', 'Perguruan Tinggi', 'PNS', 'Semarang', 2, 1),
(5, 'Zakaria Adi', 3374053007940008, 'Laki-Laki', 'Semarang', '1994/30/07', 'WNI', 'Islam', 'Belum Kawin', 'Perguruan Tinggi', 'IT', 'Semarang', 1, 1),
(6, 'Selamet F', 3374053007930005, 'Laki-Laki', 'Semarang', '1993/30/08', 'WNI', 'Islam', 'Belum Kawin', 'Perguruan Tinggi', 'IT', 'Semarang', 2, 2),
(7, 'Tyas', 6655673566563735, 'Laki-Laki', 'semarang', '01/01/1995', 'WNI', '', 'Belum Menikah', '', 'PNS', 'purwodadi', 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pengantar`
--

CREATE TABLE IF NOT EXISTS `pengantar` (
  `no_pengantar` varchar(20) NOT NULL,
  `keperluan` text NOT NULL,
  `lain_lain` text NOT NULL,
  `tanggal_berlaku` varchar(15) DEFAULT NULL,
  `tgl_pengantar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `NIK` bigint(20) NOT NULL,
  `RT` int(2) NOT NULL,
  `RW` int(2) NOT NULL,
  `status_rt` int(1) DEFAULT NULL,
  `status_rw` int(1) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengantar`
--

INSERT INTO `pengantar` (`no_pengantar`, `keperluan`, `lain_lain`, `tanggal_berlaku`, `tgl_pengantar`, `NIK`, `RT`, `RW`, `status_rt`, `status_rw`, `keterangan`) VALUES
('PNTR-2019-0006', 'mengusus surat tidak mampu', 'permohonan surat pengantar tidak mampu', '07/02/2019', '2019-02-06 13:11:17', 3374050807960041, 0, 0, 2, 1, 'jhkhkjhahfljaf'),
('PNTR-2019-0007', 'mengurus ktp', 'mengurus keterangan ktp', '07/02/2019', '2019-02-06 13:11:17', 3374050807960041, 0, 0, 2, 1, 'jhkhkjhahfljaf'),
('PNTR-2019-0008', 'kkjhkjhkj', 'mkhgkg', NULL, '2019-02-06 13:09:37', 3374053007940008, 0, 0, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `id_petugas` varchar(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `rt` int(2) NOT NULL,
  `rw` int(2) NOT NULL,
  `no_tel` bigint(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `jabatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `alamat`, `rt`, `rw`, `no_tel`, `email`, `jabatan`) VALUES
('PTGS-0001', 'Agus Supriyanto', 'Semarang', 1, 2, 89147483647, 'agussuprie70@gmail.com', 'Ketua RW'),
('PTGS-0002', 'Krisna', 'Mangkang no9', 2, 1, 8967566540, 'Krisna@yahoo.com', 'Ketua RT'),
('PTGS-0003', 'Inaba Shoichi', 'Bangetayu Wetan No 77', 1, 2, 84789878798, 'as.inaba@yahoo.com', 'IT Kelurah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
 ADD PRIMARY KEY (`id`), ADD KEY `NIK` (`NIK`);

--
-- Indexes for table `pengantar`
--
ALTER TABLE `pengantar`
 ADD PRIMARY KEY (`no_pengantar`), ADD KEY `NIK` (`NIK`), ADD KEY `no_pengantar` (`no_pengantar`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
 ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
