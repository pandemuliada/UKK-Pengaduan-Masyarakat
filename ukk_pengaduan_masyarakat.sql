-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 02, 2020 at 12:46 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_pengaduan_masyarakat`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_laporan` (IN `id_pengaduan_param` INT(35))  NO SQL
BEGIN
    SELECT * FROM v_laporan WHERE id_pengaduan = id_pengaduan_param;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telepon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telepon`) VALUES
('2', 'Pande', 'pande', '9a3856de24797a250024edd5847b5de0', '08952852936'),
('3', 'Wayan Alex', 'wayanalex', 'f7c8ce496db21e9ba7fb5ce9095f5cb8', '08952852936'),
('5102060405020001', 'Muliada', 'muliada', 'd7bc0db0a46a1843b4dd67f4f85d9d27', '089528529936'),
('5102060405020002', 'Joko', 'joko', '9ba0009aa81e794e628a04b51eaf7d7f', '089528529936');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `judul_pengaduan` varchar(35) NOT NULL,
  `isi_pengaduan` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('ditolak','proses','selesai') NOT NULL DEFAULT 'proses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `judul_pengaduan`, `isi_pengaduan`, `foto`, `status`) VALUES
(1, '2020-02-12', '5102060405020001', 'Sampah di Kediri', 'Isi pengaduan tentang sampah di kediri', '', 'selesai'),
(15, '2020-02-12', '5102060405020001', 'Sampah Masyarakat', 'Isi pengaduan tentang sampah masyarakat', '', 'selesai'),
(16, '2020-02-12', '5102060405020001', 'Artha mulai gila', 'Pengadaksjdlkaj asdjalkj asdakjalsk', '', 'selesai'),
(17, '2020-02-12', '5102060405020001', 'Sampah', 'Sampah banyak bangsat', '', 'selesai'),
(18, '2020-02-13', '5102060405020001', 'Sampah', 'asdasdadasdas', '', 'selesai'),
(19, '2020-02-13', '3', 'SAYA JOMBLOO KAPAN SAYA NIKAHHH !!!', 'Halo mas dan mbak di perkantoran daerah, saya jomblo barangkali ada yang mau bisa hubungi nomor berikut 089563889xxx. SAYA LAGI CARI JODOH!! DITUNTUT NIKAHHH!!', '', 'selesai'),
(20, '2020-02-14', '5102060405020001', 'dekana ribut', 'dekana suka ribut, suka buat tiktok uwu', 'vkVajfRz_400x400.jpg', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telepon`, `level`) VALUES
(1, 'Petugas Alex', 'petugasalex', 'b1fab1114b34f379b8f7af3047391fc0', '089528529936', 'admin'),
(2, 'Petugas Wayan Update', 'petugaswayan', 'e00a8c1ac5b921c120a497a48ba81060', '089528529936', 'petugas'),
(3, 'Joko Solo', 'jokosolo', 'e00a8c1ac5b921c120a497a48ba81060', '089528529936', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `isi_tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `isi_tanggapan`, `id_petugas`) VALUES
(1, 15, '2020-02-12', 'Terima kasih atas aduan anda, kami akan berusaha mengatasinya secepat mungkin', 2),
(5, 16, '2020-02-12', 'asdas asdkfkahsnd a dsfsaf asdfkjlka asdjflka asdfjaklj', 1),
(6, 17, '2020-02-13', 'Sekarempu ae lah mas~', 1),
(8, 18, '2020-02-13', 'Lapor ae teroos sampe mampos lee!', 2),
(9, 19, '2020-02-13', 'NGAPAIN LAPOR KESINI GOBLOK!!, NOH IKUT SANA ACARA MATA BATINNYA UYA KUYA!!!!', 2),
(10, 20, '2020-02-14', 'sekap aja temennya', 1),
(11, 1, '2020-02-17', 'Terima kasih sudah melapor anda telah memberi saya pekerjaan lagi, mantap banget syekali dech', 3);

--
-- Triggers `tanggapan`
--
DELIMITER $$
CREATE TRIGGER `after_insert_on_tanggapan` AFTER INSERT ON `tanggapan` FOR EACH ROW BEGIN
UPDATE pengaduan
	SET pengaduan.status = "selesai"
WHERE id_pengaduan = NEW.id_pengaduan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_laporan`
-- (See below for the actual view)
--
CREATE TABLE `v_laporan` (
`isi_tanggapan` text
,`tgl_tanggapan` date
,`id_petugas` int(11)
,`id_pengaduan` int(11)
,`judul_pengaduan` varchar(35)
,`isi_pengaduan` text
,`nik` char(16)
,`foto` varchar(255)
,`status` enum('ditolak','proses','selesai')
,`tgl_pengaduan` date
,`nama_petugas` varchar(35)
,`level` enum('admin','petugas')
,`nama_masyarakat` varchar(35)
);

-- --------------------------------------------------------

--
-- Structure for view `v_laporan`
--
DROP TABLE IF EXISTS `v_laporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_laporan`  AS  select `tanggapan`.`isi_tanggapan` AS `isi_tanggapan`,`tanggapan`.`tgl_tanggapan` AS `tgl_tanggapan`,`tanggapan`.`id_petugas` AS `id_petugas`,`tanggapan`.`id_pengaduan` AS `id_pengaduan`,`pengaduan`.`judul_pengaduan` AS `judul_pengaduan`,`pengaduan`.`isi_pengaduan` AS `isi_pengaduan`,`pengaduan`.`nik` AS `nik`,`pengaduan`.`foto` AS `foto`,`pengaduan`.`status` AS `status`,`pengaduan`.`tgl_pengaduan` AS `tgl_pengaduan`,`petugas`.`nama_petugas` AS `nama_petugas`,`petugas`.`level` AS `level`,`masyarakat`.`nama` AS `nama_masyarakat` from (((`tanggapan` join `pengaduan` on((`tanggapan`.`id_pengaduan` = `pengaduan`.`id_pengaduan`))) join `petugas` on((`tanggapan`.`id_petugas` = `petugas`.`id_petugas`))) join `masyarakat` on((`pengaduan`.`nik` = `masyarakat`.`nik`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`);

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`),
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
