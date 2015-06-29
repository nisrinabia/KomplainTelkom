-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2015 at 10:34 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

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
-- Table structure for table `pots`
--

CREATE TABLE IF NOT EXISTS `pots` (
  `ID_POTS` varbinary(16) NOT NULL,
  `ID_PELANGGAN` int(11) NOT NULL,
  `NO_POTS` char(7) NOT NULL,
  `NO_INTERNET` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`ID_POTS`),
  KEY `FK_MEMPUNYAI` (`ID_PELANGGAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pots`
--
ALTER TABLE `pots`
  ADD CONSTRAINT `FK_MEMPUNYAI` FOREIGN KEY (`ID_PELANGGAN`) REFERENCES `pelanggan` (`ID_PELANGGAN`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
