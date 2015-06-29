-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2015 at 07:59 AM
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
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `ID_AKUN` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `NAMA_LENGKAP` varchar(50) NOT NULL,
  `JABATAN` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_AKUN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`ID_AKUN`, `USERNAME`, `PASSWORD`, `NAMA_LENGKAP`, `JABATAN`) VALUES
(1, 'admin', '13d2c27d75f43e084f96904768e10fee', 'Administrator', 'Admin'),
(2, 'dinarwm', '5e4d2365a27d9a94ba26a2a9d3c6198e', 'Dinar Winia Mahandhira M', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `data_komplain`
--

CREATE TABLE IF NOT EXISTS `data_komplain` (
  `ID_POTS` varbinary(16) NOT NULL,
  `ID_KOMPLAIN` int(11) NOT NULL,
  PRIMARY KEY (`ID_POTS`,`ID_KOMPLAIN`),
  KEY `FK_RELATIONSHIP_5` (`ID_KOMPLAIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_komplain`
--

CREATE TABLE IF NOT EXISTS `jenis_komplain` (
  `ID_JENIS_KOMPLAIN` int(11) NOT NULL AUTO_INCREMENT,
  `JENIS_KOMPLAIN` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_JENIS_KOMPLAIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `komplain`
--

CREATE TABLE IF NOT EXISTS `komplain` (
  `ID_KOMPLAIN` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MEDIA` int(11) NOT NULL,
  `ID_LAYANAN` int(11) NOT NULL,
  `ID_JENIS_KOMPLAIN` int(11) NOT NULL,
  `TGL_KOMPLAIN` datetime NOT NULL,
  `TGL_CLOSE` datetime NOT NULL,
  `KELUHAN` text,
  `SOLUSI` text,
  `STATUS_KOMPLAIN` tinyint(1) NOT NULL,
  `KETERANGAN` text,
  `DOKUMEN` longblob,
  `DEADLINE` date DEFAULT NULL,
  PRIMARY KEY (`ID_KOMPLAIN`),
  KEY `FK_RELATIONSHIP_3` (`ID_LAYANAN`),
  KEY `FK_RELATIONSHIP_6` (`ID_JENIS_KOMPLAIN`),
  KEY `FK_RELATIONSHIP_7` (`ID_MEDIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE IF NOT EXISTS `layanan` (
  `ID_LAYANAN` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_LAYANAN` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_LAYANAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `list_pots_master`
--

CREATE TABLE IF NOT EXISTS `list_pots_master` (
  `YEAR_ID` int(11) DEFAULT NULL,
  `MONTH_ID` int(11) DEFAULT NULL,
  `NCLI` int(11) DEFAULT NULL,
  `NDOS` int(11) DEFAULT NULL,
  `NOTEL` int(11) DEFAULT NULL,
  `ND_REFERENCE` int(11) DEFAULT NULL,
  `NIP_NAS` int(11) DEFAULT NULL,
  `DATEL_ID` int(11) DEFAULT NULL,
  `LOCATION_ID` int(11) DEFAULT NULL,
  `MDF_ID` int(11) DEFAULT NULL,
  `LINECATS_ITEM_ID` int(11) DEFAULT NULL,
  `PRODUCT_LINE_ID` int(11) DEFAULT NULL,
  `CPRIO_DRGT` int(11) DEFAULT NULL,
  `OWNER` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `CGEST` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `CGEST_TREMS` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `PLBLCL` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `PLBLCL_TREMS` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `CLUSTER_ID` int(11) DEFAULT NULL,
  `CLASS_ID` varchar(22) CHARACTER SET utf8 DEFAULT NULL,
  `COPER_RS` int(11) DEFAULT NULL,
  `COPER_MS` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `VALID_FROM` datetime DEFAULT NULL,
  `VALID_UNTIL` datetime DEFAULT NULL,
  `CPROD` int(11) DEFAULT NULL,
  `CART` int(11) DEFAULT NULL,
  `NARTHCONS` int(11) DEFAULT NULL,
  `AREA_CODE` int(11) DEFAULT NULL,
  `SEGMENT_KD13` int(11) DEFAULT NULL,
  `CTYPDOS` int(11) DEFAULT NULL,
  `IND_RVT` int(11) DEFAULT NULL,
  `DIVRE_ID` int(11) DEFAULT NULL,
  `LINECATS_ITEM_ID_NAS` int(11) DEFAULT NULL,
  `REPART` int(11) DEFAULT NULL,
  `LEQPT_RESEAU` varchar(9) CHARACTER SET utf8 DEFAULT NULL,
  `ABRV_REPART` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `R2BB` varchar(4) CHARACTER SET utf8 DEFAULT NULL,
  `STO_ID` int(11) DEFAULT NULL,
  `CS_ID` int(11) DEFAULT NULL,
  `CS_AREA` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `IS_LIS` tinyint(1) DEFAULT NULL,
  `IS_SALES` tinyint(1) DEFAULT NULL,
  `IS_CHURN` tinyint(1) DEFAULT NULL,
  `IS_PAST` tinyint(1) DEFAULT NULL,
  `IS_CURRENT` tinyint(1) DEFAULT NULL,
  `IS_FUTURE` tinyint(1) DEFAULT NULL,
  `IS_RADIUS` tinyint(1) DEFAULT NULL,
  `IS_BD12` tinyint(1) DEFAULT NULL,
  `IS_FACTURE` tinyint(1) DEFAULT NULL,
  `FF_PERIODE` int(11) DEFAULT NULL,
  `FF_NCLI` int(11) DEFAULT NULL,
  `FF_NDOS` int(11) DEFAULT NULL,
  `FF_DATEL_ID` int(11) DEFAULT NULL,
  `BPSK_REV` int(11) DEFAULT NULL,
  `CICIL_REV` int(11) DEFAULT NULL,
  `BPSB_REV` int(11) DEFAULT NULL,
  `DENDA_REV` int(11) DEFAULT NULL,
  `DEPOS_REV` int(11) DEFAULT NULL,
  `MTR_REV` int(11) DEFAULT NULL,
  `PPN_REV` int(11) DEFAULT NULL,
  `RGBO_REV` int(11) DEFAULT NULL,
  `TKT_C_REV` int(11) DEFAULT NULL,
  `TKT_D_REV` int(11) DEFAULT NULL,
  `DISCO_REV` int(11) DEFAULT NULL,
  `SLG_REV` int(11) DEFAULT NULL,
  `VOC_REV` int(11) DEFAULT NULL,
  `REST_REV` int(11) DEFAULT NULL,
  `COMFE_REV` int(11) DEFAULT NULL,
  `DISCM_REV` int(11) DEFAULT NULL,
  `UNDEF_REV` int(11) DEFAULT NULL,
  `ABN_L_REV` int(11) DEFAULT NULL,
  `ABN_S_REV` int(11) DEFAULT NULL,
  `INTAG_REV` int(11) DEFAULT NULL,
  `SEWA_REV` int(11) DEFAULT NULL,
  `EVOU_REV` int(11) DEFAULT NULL,
  `AIRTM_REV` int(11) DEFAULT NULL,
  `IN_REV` int(11) DEFAULT NULL,
  `ILOK_REV` int(11) DEFAULT NULL,
  `INAS_REV` int(11) DEFAULT NULL,
  `INET_REV` int(11) DEFAULT NULL,
  `ISDN_REV` int(11) DEFAULT NULL,
  `LOKAL_REV` int(11) DEFAULT NULL,
  `MUMED_REV` int(11) DEFAULT NULL,
  `OTHER_REV` int(11) DEFAULT NULL,
  `SLJJ_REV` int(11) DEFAULT NULL,
  `VAS_REV` int(11) DEFAULT NULL,
  `VOIP_REV` int(11) DEFAULT NULL,
  `REVSH_REV` int(11) DEFAULT NULL,
  `TBPB_REV` int(11) DEFAULT NULL,
  `TBP_REV` int(11) DEFAULT NULL,
  `TSP_REV` int(11) DEFAULT NULL,
  `INS01_REV` int(11) DEFAULT NULL,
  `INS08_REV` int(11) DEFAULT NULL,
  `INS17_REV` int(11) DEFAULT NULL,
  `INS07_REV` int(11) DEFAULT NULL,
  `C2STB_REV` int(11) DEFAULT NULL,
  `JJ2F_REV` int(11) DEFAULT NULL,
  `JJ2C_REV` int(11) DEFAULT NULL,
  `ADSL_REV` int(11) DEFAULT NULL,
  `SOURCE` varchar(7) CHARACTER SET utf8 DEFAULT NULL,
  `UPDATE_BY` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `UPDATE_DATE` datetime DEFAULT NULL,
  `IS_PW` tinyint(1) DEFAULT NULL,
  `PORTOFOLIO_ID` int(11) DEFAULT NULL,
  `WITEL` varchar(22) CHARACTER SET utf8 DEFAULT NULL,
  `KANDATEL` varchar(4) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `ID_MEDIA` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_MEDIA` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_MEDIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `ID_PELANGGAN` int(11) NOT NULL AUTO_INCREMENT,
  `NO_INTERNET` varchar(12) DEFAULT NULL,
  `NAMA_PELANGGAN` varchar(50) NOT NULL,
  `ALAMAT_PELANGGAN` varchar(200) NOT NULL,
  PRIMARY KEY (`ID_PELANGGAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pots`
--

CREATE TABLE IF NOT EXISTS `pots` (
  `ID_POTS` varbinary(16) NOT NULL,
  `ID_PELANGGAN` int(11) NOT NULL,
  `NO_POTS` char(7) NOT NULL,
  PRIMARY KEY (`ID_POTS`),
  KEY `FK_MEMPUNYAI` (`ID_PELANGGAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_komplain`
--
ALTER TABLE `data_komplain`
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_POTS`) REFERENCES `pots` (`ID_POTS`),
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_KOMPLAIN`) REFERENCES `komplain` (`ID_KOMPLAIN`);

--
-- Constraints for table `komplain`
--
ALTER TABLE `komplain`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_LAYANAN`) REFERENCES `layanan` (`ID_LAYANAN`),
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_JENIS_KOMPLAIN`) REFERENCES `jenis_komplain` (`ID_JENIS_KOMPLAIN`),
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`ID_MEDIA`) REFERENCES `media` (`ID_MEDIA`);

--
-- Constraints for table `pots`
--
ALTER TABLE `pots`
  ADD CONSTRAINT `FK_MEMPUNYAI` FOREIGN KEY (`ID_PELANGGAN`) REFERENCES `pelanggan` (`ID_PELANGGAN`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
