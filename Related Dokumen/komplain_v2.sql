-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27 Jun 2015 pada 13.22
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`ID_AKUN`, `USERNAME`, `PASSWORD`, `NAMA_LENGKAP`, `JABATAN`) VALUES
(1, 'admin', '13d2c27d75f43e084f96904768e10fee', 'Administrator', 'Admin'),
(2, 'dinarwm', '5e4d2365a27d9a94ba26a2a9d3c6198e', 'Dinar Winia Mahandhira M', 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_komplain`
--

CREATE TABLE IF NOT EXISTS `data_komplain` (
  `ID_POTS` varbinary(16) NOT NULL,
  `ID_KOMPLAIN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_komplain`
--

CREATE TABLE IF NOT EXISTS `jenis_komplain` (
`ID_JENIS_KOMPLAIN` int(11) NOT NULL,
  `JENIS_KOMPLAIN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komplain`
--

CREATE TABLE IF NOT EXISTS `komplain` (
`ID_KOMPLAIN` int(11) NOT NULL,
  `ID_MEDIA` int(11) NOT NULL,
  `ID_LAYANAN` int(11) NOT NULL,
  `ID_JENIS_KOMPLAIN` int(11) NOT NULL,
  `TGL_KOMPLAIN` datetime NOT NULL,
  `TGL_CLOSE` datetime NOT NULL,
  `KELUHAN` text,
  `SOLUSI` text,
  `STATUS_KOMPLAIN` tinyint(1) NOT NULL,
  `KETERANGAN` text,
  `DOKUMEN` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE IF NOT EXISTS `layanan` (
`ID_LAYANAN` int(11) NOT NULL,
  `NAMA_LAYANAN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `media`
--

CREATE TABLE IF NOT EXISTS `media` (
`ID_MEDIA` int(11) NOT NULL,
  `NAMA_MEDIA` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
`ID_PELANGGAN` int(11) NOT NULL,
  `NO_INTERNET` varchar(12) DEFAULT NULL,
  `NAMA_PELANGGAN` varchar(50) NOT NULL,
  `ALAMAT_PELANGGAN` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pots`
--

CREATE TABLE IF NOT EXISTS `pots` (
  `ID_POTS` varbinary(16) NOT NULL,
  `ID_PELANGGAN` int(11) NOT NULL,
  `NO_POTS` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
 ADD PRIMARY KEY (`ID_AKUN`);

--
-- Indexes for table `data_komplain`
--
ALTER TABLE `data_komplain`
 ADD PRIMARY KEY (`ID_POTS`,`ID_KOMPLAIN`), ADD KEY `FK_RELATIONSHIP_5` (`ID_KOMPLAIN`);

--
-- Indexes for table `jenis_komplain`
--
ALTER TABLE `jenis_komplain`
 ADD PRIMARY KEY (`ID_JENIS_KOMPLAIN`);

--
-- Indexes for table `komplain`
--
ALTER TABLE `komplain`
 ADD PRIMARY KEY (`ID_KOMPLAIN`), ADD KEY `FK_RELATIONSHIP_3` (`ID_LAYANAN`), ADD KEY `FK_RELATIONSHIP_6` (`ID_JENIS_KOMPLAIN`), ADD KEY `FK_RELATIONSHIP_7` (`ID_MEDIA`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
 ADD PRIMARY KEY (`ID_LAYANAN`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
 ADD PRIMARY KEY (`ID_MEDIA`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`ID_PELANGGAN`);

--
-- Indexes for table `pots`
--
ALTER TABLE `pots`
 ADD PRIMARY KEY (`ID_POTS`), ADD KEY `FK_MEMPUNYAI` (`ID_PELANGGAN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
MODIFY `ID_AKUN` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `jenis_komplain`
--
ALTER TABLE `jenis_komplain`
MODIFY `ID_JENIS_KOMPLAIN` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `komplain`
--
ALTER TABLE `komplain`
MODIFY `ID_KOMPLAIN` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
MODIFY `ID_LAYANAN` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
MODIFY `ID_MEDIA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
MODIFY `ID_PELANGGAN` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_komplain`
--
ALTER TABLE `data_komplain`
ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_POTS`) REFERENCES `pots` (`ID_POTS`),
ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_KOMPLAIN`) REFERENCES `komplain` (`ID_KOMPLAIN`);

--
-- Ketidakleluasaan untuk tabel `komplain`
--
ALTER TABLE `komplain`
ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_LAYANAN`) REFERENCES `layanan` (`ID_LAYANAN`),
ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_JENIS_KOMPLAIN`) REFERENCES `jenis_komplain` (`ID_JENIS_KOMPLAIN`),
ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`ID_MEDIA`) REFERENCES `media` (`ID_MEDIA`);

--
-- Ketidakleluasaan untuk tabel `pots`
--
ALTER TABLE `pots`
ADD CONSTRAINT `FK_MEMPUNYAI` FOREIGN KEY (`ID_PELANGGAN`) REFERENCES `pelanggan` (`ID_PELANGGAN`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
