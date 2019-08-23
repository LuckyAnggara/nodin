-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2019 at 11:44 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nodin`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `user` varchar(256) NOT NULL,
  `isi` text NOT NULL,
  `date_created` datetime NOT NULL,
  `deleteStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `user`, `isi`, `date_created`, `deleteStatus`) VALUES
(1, '1', 'sdasda', '2019-08-09 04:30:10', 0),
(2, '9', 'asdjahsdjahskd', '2019-08-09 04:30:13', 1),
(3, '9', 'TAI LUU\nanjeng kampre', '2019-08-09 05:00:56', 0),
(4, '9', 'asdadsasd', '2019-08-09 05:01:35', 0),
(5, '8', 'asdasd', '2019-08-12 08:04:36', 0),
(6, '5', '123123', '2019-08-12 08:05:06', 1),
(7, '4', 'asdasdas', '2019-08-12 08:55:41', 0),
(8, '4', 'jdjdjsnsnsnd', '2019-08-12 09:27:31', 0),
(9, '7', 'jckckxkx', '2019-08-12 09:27:40', 0),
(10, '7', 'asdasdas', '2019-08-12 10:49:56', 0),
(11, '9', 'asdada', '2019-08-13 03:39:53', 1),
(12, '9', '123123\n1231231\n', '2019-08-13 03:42:19', 0),
(13, '9', '12312312', '2019-08-13 03:44:02', 0),
(14, '9', 'asdasd', '2019-08-23 05:58:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id` int(11) NOT NULL,
  `id_no_surat` int(11) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_upload` date NOT NULL,
  `date_kirim` date NOT NULL,
  `lampiran2` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id`, `id_no_surat`, `lampiran`, `status`, `date_upload`, `date_kirim`, `lampiran2`, `comment`) VALUES
(1, 1, '', 0, '0000-00-00', '0000-00-00', 0, ',1,2,3,4,5,6'),
(2, 2, '2.pdf', 0, '0000-00-00', '0000-00-00', 0, ',7,10'),
(3, 3, '3.pdf', 1, '2019-08-13', '2019-08-13', 0, ',8,9,11,12,13'),
(4, 7, '', 0, '0000-00-00', '0000-00-00', 0, ''),
(5, 5, '', 0, '0000-00-00', '0000-00-00', 0, ''),
(6, 8, '', 0, '2019-08-23', '0000-00-00', 0, ',14'),
(7, 4, '', 0, '0000-00-00', '0000-00-00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `nodin`
--

CREATE TABLE `nodin` (
  `id_nodin` int(11) NOT NULL,
  `nosurat_nodin` int(11) NOT NULL,
  `prefix` varchar(256) NOT NULL,
  `dari_nodin` varchar(255) NOT NULL,
  `ke_nodin` varchar(255) NOT NULL,
  `perihal_nodin` text NOT NULL,
  `tanggal_nodin` date NOT NULL,
  `date_created` datetime NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `deleteStatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nodin`
--

INSERT INTO `nodin` (`id_nodin`, `nosurat_nodin`, `prefix`, `dari_nodin`, `ke_nodin`, `perihal_nodin`, `tanggal_nodin`, `date_created`, `lampiran`, `deleteStatus`) VALUES
(1, 1, '', '9', 'Inspektorat Wilayah I', 'ASDASDASD\nasdasdasd\nasdasdasda', '2019-08-20', '2019-08-09 04:29:57', '', 0),
(2, 2, '', '9', 'Inspektorat Wilayah II,Inspektorat Wilayah VI', 'Laporan pelaksanaan RDK di Lingkungan Inspektorat Jenderal', '2019-08-12', '2019-08-12 08:31:54', '', 0),
(3, 3, '', '9', 'Inspektorat Wilayah I, Inspektorat Wilayah V', 'permohonan masukan dan saran', '2019-08-12', '2019-08-12 09:28:11', '', 0),
(4, 4, '', '9', '8', '123123', '2019-08-05', '2019-08-13 04:11:12', '', 0),
(5, 5, '', '9', '11', '123123123', '2019-08-20', '2019-08-13 04:11:30', '', 0),
(6, 6, '', '9', '4', 'asdasd', '2019-08-26', '2019-08-13 04:12:57', '', 0),
(7, 7, '', '9', '4,5', 'asdasdas', '2019-08-07', '2019-08-13 04:18:07', '', 0),
(8, 8, '', '9', 'Bagian Program Humas dan Pelaporan,Bagian Keuangan', 'asdasd', '2019-08-14', '2019-08-13 05:01:46', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nomor`
--

CREATE TABLE `nomor` (
  `id_nodin` int(11) NOT NULL,
  `nosurat_nodin` int(11) NOT NULL,
  `prefix` varchar(256) NOT NULL,
  `dari_nodin` varchar(255) NOT NULL,
  `ke_nodin` varchar(255) NOT NULL,
  `perihal_nodin` text NOT NULL,
  `tanggal_nodin` date NOT NULL,
  `date_created` datetime NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `deleteStatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `no` int(11) NOT NULL,
  `nama_setting` varchar(255) NOT NULL,
  `setting` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tujuanintern`
--

CREATE TABLE `tujuanintern` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_telepon` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tujuanintern`
--

INSERT INTO `tujuanintern` (`id`, `nama`, `no_telepon`, `alamat`) VALUES
(1, 'Sekertaris Inspektorat Jenderal', 0, ''),
(2, 'Inspektorat Wilayah I', 0, ''),
(3, 'Inspektorat Wilayah II', 0, ''),
(4, 'Inspektorat Wilayah III', 0, ''),
(5, 'Inspektorat Wilayah IV', 0, ''),
(6, 'Inspektorat Wilayah V', 0, ''),
(7, 'Inspektorat Wilayah VI', 0, ''),
(8, 'Bagian Sistem Informasi Pengawasan', 0, ''),
(9, 'Bagian Program Humas dan Pelaporan', 0, ''),
(10, 'Bagian Umum', 0, ''),
(11, 'Bagian Keuangan', 0, ''),
(12, 'Bagian Kepegawaian', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(128) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_user` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama_user`, `password`, `image`, `date_user`) VALUES
('1', '', 'Sekertaris Inspektorat Jenderal', '123', 'avatar-1.jpg', '0000-00-00'),
('10', '', 'Bagian Umum', '123', 'avatar-6.jpg', '0000-00-00'),
('11', '', 'Bagian Keuangan', '123', 'avatar-6.jpg', '0000-00-00'),
('12', '', 'Bagian Kepegawaian', '123', 'avatar-6.jpg', '0000-00-00'),
('2', '', 'Inspektorat Wilayah I', '123', 'avatar-2.jpg', '0000-00-00'),
('3', '', 'Inspektorat Wilayah II', '123', 'avatar-3.jpg', '0000-00-00'),
('4', '', 'Inspektorat Wilayah III', '123', 'avatar-4.jpg', '0000-00-00'),
('5', '', 'Inspektorat Wilayah IV', '123', 'avatar-5.jpg', '0000-00-00'),
('6', '', 'Inspektorat Wilayah V', '123', 'avatar-9.jpg', '0000-00-00'),
('7', '', 'Inspektorat Wilayah VI', '123', 'avatar-7.jpg', '0000-00-00'),
('8', '', 'Bagian Sistem Informasi Pengawasan', '123', 'avatar-8.jpg', '0000-00-00'),
('9', 'asd', 'Bagian Program Humas dan Pelaporan', '123', 'avatar-6.jpg', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nodin`
--
ALTER TABLE `nodin`
  ADD PRIMARY KEY (`id_nodin`),
  ADD UNIQUE KEY `nosurat_nodin` (`nosurat_nodin`);

--
-- Indexes for table `nomor`
--
ALTER TABLE `nomor`
  ADD PRIMARY KEY (`id_nodin`),
  ADD UNIQUE KEY `nosurat_nodin` (`nosurat_nodin`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tujuanintern`
--
ALTER TABLE `tujuanintern`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nodin`
--
ALTER TABLE `nodin`
  MODIFY `id_nodin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nomor`
--
ALTER TABLE `nomor`
  MODIFY `id_nodin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tujuanintern`
--
ALTER TABLE `tujuanintern`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
