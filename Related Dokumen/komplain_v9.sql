-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2015 at 04:57 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `komplain`
--

-- --------------------------------------------------------

--
-- Table structure for table `komplain`
--

CREATE TABLE IF NOT EXISTS `komplain` (
`ID_KOMPLAIN` int(11) NOT NULL,
  `NAMA_MEDIA` varchar(20) NOT NULL,
  `NAMA_LAYANAN` varchar(20) NOT NULL,
  `JENIS_KOMPLAIN` varchar(20) NOT NULL,
  `TGL_KOMPLAIN` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TGL_CLOSE` date NOT NULL,
  `KELUHAN` text,
  `SOLUSI` text,
  `STATUS_KOMPLAIN` tinyint(1) NOT NULL DEFAULT '0',
  `KETERANGAN` text,
  `DOKUMEN` longblob,
  `NO_POTS` varchar(7) NOT NULL,
  `NO_INTERNET` varchar(12) NOT NULL,
  `NAMA_PELAPOR` varchar(50) NOT NULL,
  `ALAMAT_PELAPOR` varchar(200) NOT NULL,
  `PIC_PELAPOR` varchar(7) NOT NULL,
  `DEADLINE` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komplain`
--

INSERT INTO `komplain` (`ID_KOMPLAIN`, `NAMA_MEDIA`, `NAMA_LAYANAN`, `JENIS_KOMPLAIN`, `TGL_KOMPLAIN`, `TGL_CLOSE`, `KELUHAN`, `SOLUSI`, `STATUS_KOMPLAIN`, `KETERANGAN`, `DOKUMEN`, `NO_POTS`, `NO_INTERNET`, `NAMA_PELAPOR`, `ALAMAT_PELAPOR`, `PIC_PELAPOR`, `DEADLINE`) VALUES
(3, '147', 'INDIEHOME', 'Gangguan', '2015-07-01 21:05:39', '2015-07-09', 'Gakbisa konek ke internet', 'Dicek pada modemnya', 1, 'Lampu menyala merah', NULL, '123456', '123456789', 'Fariz Aulia Pradipta', 'Jl. Nangka no 47 Malang', '234567', '2015-07-02 03:07:19'),
(4, '147', 'INDIEHOME', 'Gangguan', '2015-07-06 09:55:02', '2015-07-04', '', '', 1, '', NULL, '123', '', '', '', '', '0000-00-00 00:00:00'),
(5, '147', 'INDIEHOME', 'Gangguan', '2015-07-07 00:00:00', '2015-07-14', '', '', 0, '', NULL, '123', '', '', '', '', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komplain`
--
ALTER TABLE `komplain`
 ADD PRIMARY KEY (`ID_KOMPLAIN`), ADD KEY `FK_RELATIONSHIP_3` (`NAMA_LAYANAN`), ADD KEY `FK_RELATIONSHIP_6` (`JENIS_KOMPLAIN`), ADD KEY `FK_RELATIONSHIP_7` (`NAMA_MEDIA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komplain`
--
ALTER TABLE `komplain`
MODIFY `ID_KOMPLAIN` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `komplain`
--
ALTER TABLE `komplain`
ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`NAMA_LAYANAN`) REFERENCES `layanan` (`NAMA_LAYANAN`),
ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`JENIS_KOMPLAIN`) REFERENCES `jenis_komplain` (`JENIS_KOMPLAIN`),
ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`NAMA_MEDIA`) REFERENCES `media` (`NAMA_MEDIA`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
