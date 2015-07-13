-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Jul 2015 pada 04.56
-- Versi Server: 5.6.21
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

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkClose`()
BEGIN
UPDATE komplain SET STATUS_KOMPLAIN = 1 WHERE DATEDIFF(TGL_CLOSE,CURDATE()) < 0 AND STATUS_KOMPLAIN = 0 AND DEADLINE IS NOT NULL;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
`ID_AKUN` int(11) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `NAMA_LENGKAP` varchar(50) NOT NULL,
  `JABATAN` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`ID_AKUN`, `USERNAME`, `PASSWORD`, `NAMA_LENGKAP`, `JABATAN`) VALUES
(1, 'admin', '13d2c27d75f43e084f96904768e10fee', 'Administrator', 'Admin'),
(2, 'dinarwm', '5e4d2365a27d9a94ba26a2a9d3c6198e', 'Dinar Winia Mahandhira M', 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_komplain`
--

CREATE TABLE IF NOT EXISTS `jenis_komplain` (
  `JENIS` varchar(20) NOT NULL,
  `STATUS` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_komplain`
--

INSERT INTO `jenis_komplain` (`JENIS`, `STATUS`) VALUES
('Balik Nama', 1),
('Gangguan', 1),
('Lain-lain', 1),
('Migrasi Paket', 1),
('PSB', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komplain`
--

CREATE TABLE IF NOT EXISTS `komplain` (
`ID_KOMPLAIN` int(11) NOT NULL,
  `NAMA_MEDIA` varchar(20) NOT NULL,
  `NAMA_LAYANAN` varchar(20) NOT NULL,
  `JENIS_KOMPLAIN` varchar(20) NOT NULL,
  `TGL_KOMPLAIN` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TGL_CLOSE` date DEFAULT NULL,
  `KELUHAN` text,
  `SOLUSI` text,
  `STATUS_KOMPLAIN` varchar(15) NOT NULL DEFAULT 'In Progress',
  `KETERANGAN` text,
  `DOKUMEN` longblob,
  `NO_POTS` varchar(20) NOT NULL,
  `NO_INTERNET` varchar(20) DEFAULT NULL,
  `NAMA_PELAPOR` varchar(50) NOT NULL DEFAULT '-',
  `ALAMAT_PELAPOR` varchar(200) NOT NULL,
  `PIC_PELAPOR` varchar(7) NOT NULL,
  `DEADLINE` datetime DEFAULT NULL,
  `STATUS_JANJI` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komplain`
--

INSERT INTO `komplain` (`ID_KOMPLAIN`, `NAMA_MEDIA`, `NAMA_LAYANAN`, `JENIS_KOMPLAIN`, `TGL_KOMPLAIN`, `TGL_CLOSE`, `KELUHAN`, `SOLUSI`, `STATUS_KOMPLAIN`, `KETERANGAN`, `DOKUMEN`, `NO_POTS`, `NO_INTERNET`, `NAMA_PELAPOR`, `ALAMAT_PELAPOR`, `PIC_PELAPOR`, `DEADLINE`, `STATUS_JANJI`) VALUES
(65, '147', 'INDIE HOME', 'Migrasi Paket', '2013-03-27 07:00:00', '2015-01-22', '', '', 'In Progress', '', NULL, '0341594878', '152707203059', 'Fakhrian Noor', 'JL CIKAMPEK TER NO 11 MALANG', '1527072', NULL, 0),
(66, 'Plasa', 'POTS', 'Gangguan', '2013-03-22 07:00:00', '2015-01-22', '', '', 'In Progress', '', NULL, '152707202899', '0341511882', 'Dinar Winia M', 'JL. BUNGA MERAK 2 NO 12 MALANG', '1527072', NULL, 0),
(67, '147', 'Lain-lain', 'Balik Nama', '2013-04-19 07:00:00', '2015-01-22', '', '', 'In Progress', '', NULL, '03412991235', '', 'Ariel Kristanto', 'JL.YOS SUDARSO 18 DESA BEDALI', '0341299', NULL, 0),
(68, 'Twitter', 'INDIE HOME', 'PSB', '2013-04-19 07:00:00', '2015-01-22', '', '', 'In Progress', '', NULL, '0341593984', '152707203944', 'Andrean Hutama K', 'JL. ARGO TUNGGAL NO 44 LAWANG', '1527072', NULL, 0),
(69, 'Twitter', 'POTS', 'Lain-lain', '2013-05-29 07:00:00', '2015-01-22', '', '', 'In Progress', '', NULL, '152707204560', '03415025957', 'Nur Mei Nugraheni', 'JL.IMAM BONJOL NO 885 ', '0341502', NULL, 0),
(70, 'Twitter', 'Lain-lain', 'Migrasi Paket', '2013-03-02 07:00:00', '2015-01-22', '', '', 'In Progress', '', NULL, '0341512631', '152707201887', 'Vicky Christian', 'DESA ADIMULIO MALANG', '1527072', NULL, 0),
(71, 'Twitter', 'INDIE HOME', 'Gangguan', '2015-03-23 07:00:00', '2015-01-22', '', '', 'In Progress', '', NULL, '03412990825', '152707200943', 'Novita Laksmi Devi', 'JL.SUGIONO NO.535 MALANG', '0341592', NULL, 0),
(72, 'Twitter', 'POTS', 'Balik Nama', '2013-04-19 07:00:00', '2015-01-22', '', '', 'In Progress', '', NULL, '0341598595', '152707209930', 'Rahmat Irfan', 'JL. DR WAHIDIN 23 LAWANG', '1527072', NULL, 0),
(73, '147', 'Lain-lain', 'PSB', '2013-04-19 07:00:00', '2015-01-22', '', '', 'In Progress', '', NULL, '03412991339', '152707206117', 'Fajar Setiawan', 'JL KARANG JUWET 3 NO 86', '0341590', NULL, 0),
(74, '147', 'INDIE HOME', 'Lain-lain', '2013-05-19 07:00:00', '2015-01-22', '', '', 'In Progress', '', NULL, '03413077093', '152707206480', 'Leli Maharani', 'JL. TAMAN SULFAT', '1527072', NULL, 0),
(75, '147', 'POTS', 'Migrasi Paket', '2014-04-19 07:00:00', '2015-01-22', '', '', 'In Progress', '', NULL, '0341594436', '152707201776', 'M. Izzuddin', 'JL.LANDUNGSARI SARI E 25', '0341299', NULL, 0),
(76, '147', 'Lain-lain', 'Gangguan', '2013-05-29 07:00:00', '2015-01-22', '', '', 'In Progress', '', NULL, '03412990946', '152707206119', 'Fransiskus Gusti Ngurah Dwika', 'JL KEMUNING IV NO 12', '0341299', NULL, 0),
(77, '147', 'INDIE HOME', 'Balik Nama', '2014-05-29 07:00:00', '2015-01-22', '', '', 'In Progress', '', NULL, '03412990801', '152707200779', 'Peni Sriwahyu Natasari', 'JL. BANTARAN BAR 3 28 KEL TULUSREJO', '0341594', NULL, 0),
(78, 'Plasa', 'POTS', 'PSB', '2013-04-19 07:00:00', '2015-01-22', '', '', 'In Progress', '', NULL, '03412990800', '152707200780', 'Ruchi Intan Tantra', 'JL.JAYA SERANI 5 NO 11 ', '0341592', NULL, 0),
(79, 'Plasa', 'Lain-lain', 'Lain-lain', '2013-04-19 07:00:00', '2015-01-22', '', '', 'In Progress', '', NULL, '0341512867', '152707205117', 'Luthfi Firmansyah S', 'JL. BEND SUTAMI 1/376', '0341299', NULL, 0),
(80, 'Plasa', 'INDIE HOME', 'Migrasi Paket', '2015-04-19 07:00:00', '2015-01-22', '', '', 'In Progress', '', NULL, '0341524176', '152707202239', 'Welly Setiawan', 'JL.SEXOFONE KAV 10 ', '1527072', NULL, 0),
(81, 'Plasa', 'POTS', 'Gangguan', '2012-04-19 07:00:00', '2015-01-22', '', '', 'In Progress', '', NULL, '152707206143', '03413077094', 'Fariz Aulia P', 'JL. PROGO NO 11', '0341299', NULL, 0),
(82, 'Plasa', 'Lain-lain', 'Balik Nama', '2015-04-19 07:00:00', '2015-01-22', '', '', 'In Progress', '', NULL, '0341596446', '152707203047', 'Rr. Ajeng Sofiana', 'JL.KP.ABRI DAM V BRAWIJAYA PERUM TA 22 MALANG', '0341593', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE IF NOT EXISTS `layanan` (
  `NAMA_LAYANAN` varchar(20) NOT NULL,
  `STATUS` binary(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`NAMA_LAYANAN`, `STATUS`) VALUES
('INDIE HOME', 0x31),
('Lain-lain', 0x31),
('POTS', 0x31);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_pots_master`
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
-- Struktur dari tabel `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `NAMA_MEDIA` varchar(20) NOT NULL,
  `STATUS` binary(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `media`
--

INSERT INTO `media` (`NAMA_MEDIA`, `STATUS`) VALUES
('147', 0x31),
('Plasa', 0x31),
('Twitter', 0x31);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
 ADD PRIMARY KEY (`ID_AKUN`);

--
-- Indexes for table `jenis_komplain`
--
ALTER TABLE `jenis_komplain`
 ADD PRIMARY KEY (`JENIS`);

--
-- Indexes for table `komplain`
--
ALTER TABLE `komplain`
 ADD PRIMARY KEY (`ID_KOMPLAIN`), ADD KEY `FK_RELATIONSHIP_3` (`NAMA_LAYANAN`), ADD KEY `FK_RELATIONSHIP_6` (`JENIS_KOMPLAIN`), ADD KEY `FK_RELATIONSHIP_7` (`NAMA_MEDIA`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
 ADD PRIMARY KEY (`NAMA_LAYANAN`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
 ADD PRIMARY KEY (`NAMA_MEDIA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
MODIFY `ID_AKUN` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `komplain`
--
ALTER TABLE `komplain`
MODIFY `ID_KOMPLAIN` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `komplain`
--
ALTER TABLE `komplain`
ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`NAMA_LAYANAN`) REFERENCES `layanan` (`NAMA_LAYANAN`) ON UPDATE CASCADE,
ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`NAMA_MEDIA`) REFERENCES `media` (`NAMA_MEDIA`) ON UPDATE CASCADE,
ADD CONSTRAINT `FK_komplain_wawa` FOREIGN KEY (`JENIS_KOMPLAIN`) REFERENCES `jenis_komplain` (`JENIS`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
