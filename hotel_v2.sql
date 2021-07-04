-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2021 at 06:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `garancija_rezervacije`
--

CREATE TABLE `garancija_rezervacije` (
  `garancijaID` int(11) NOT NULL,
  `kreditna_kartica` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `broj_kartice` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cvn` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vredi_do_mesec` int(11) NOT NULL,
  `vredi_do_godina` int(11) NOT NULL,
  `ime` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gost`
--

CREATE TABLE `gost` (
  `gostID` int(11) NOT NULL,
  `ime` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresa` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postanski_broj` int(11) NOT NULL,
  `grad` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drzava` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `okupirane_sobe`
--

CREATE TABLE `okupirane_sobe` (
  `okupiranesobeID` int(11) NOT NULL,
  `prijava_od` date NOT NULL,
  `prijava_do` date NOT NULL,
  `sobaID` int(11) NOT NULL,
  `rezervacijaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `rezervacijaID` int(11) NOT NULL,
  `datum_od` date NOT NULL,
  `datum_do` date NOT NULL,
  `napravljeno` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukupna_cena` decimal(10,0) NOT NULL,
  `gostID` int(11) NOT NULL,
  `garancijaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija_sobe`
--

CREATE TABLE `rezervacija_sobe` (
  `rezervisanesobeID` int(11) NOT NULL,
  `broj_soba` int(11) NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipsobeID` int(11) NOT NULL,
  `rezervacijaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soba`
--

CREATE TABLE `soba` (
  `sobaID` int(11) NOT NULL,
  `broj` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipsobeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soba`
--

INSERT INTO `soba` (`sobaID`, `broj`, `status`, `tipsobeID`) VALUES
(1, '01', 'Slobodno', 1),
(2, '02', 'Slobodno', 1),
(3, '03', 'Slobodno', 1),
(4, '04', 'Slobodno', 1),
(5, '05', 'Slobodno', 1),
(6, '06', 'Slobodno', 2),
(7, '07', 'Slobodno', 2),
(8, '08', 'Slobodno', 2),
(9, '09', 'Slobodno', 2),
(10, '10', 'Slobodno', 2),
(11, '11', 'Slobodno', 3),
(12, '12', 'Slobodno', 3),
(13, '13', 'Slobodno', 3),
(14, '14', 'Slobodno', 3),
(15, '15', 'Slobodno', 4),
(16, '16', 'Slobodno', 4),
(17, '17', 'Slobodno', 4),
(18, '18', 'Slobodno', 5),
(19, '19', 'Slobodno', 5),
(20, '20', 'Slobodno', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tip_sobe`
--

CREATE TABLE `tip_sobe` (
  `tipsobeID` int(11) NOT NULL,
  `tip` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapacitet` int(11) NOT NULL,
  `cena` decimal(10,0) NOT NULL,
  `cena_doručak` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tip_sobe`
--

INSERT INTO `tip_sobe` (`tipsobeID`, `tip`, `kapacitet`, `cena`, `cena_doručak`) VALUES
(1, 'Jednokrevetna soba', 1, '90', '5'),
(2, 'Dvokrevetna ekonomska soba', 2, '120', '10'),
(3, 'Dvokrevetna duplex soba', 2, '140', '10'),
(4, 'Premium apartman', 3, '160', '15'),
(5, 'Royal apartman', 4, '190', '20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `garancija_rezervacije`
--
ALTER TABLE `garancija_rezervacije`
  ADD PRIMARY KEY (`garancijaID`);

--
-- Indexes for table `gost`
--
ALTER TABLE `gost`
  ADD PRIMARY KEY (`gostID`);

--
-- Indexes for table `okupirane_sobe`
--
ALTER TABLE `okupirane_sobe`
  ADD PRIMARY KEY (`okupiranesobeID`),
  ADD KEY `reservationID` (`rezervacijaID`),
  ADD KEY `roomID` (`sobaID`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`rezervacijaID`),
  ADD KEY `guestID` (`gostID`),
  ADD KEY `garancijaID` (`garancijaID`);

--
-- Indexes for table `rezervacija_sobe`
--
ALTER TABLE `rezervacija_sobe`
  ADD PRIMARY KEY (`rezervisanesobeID`),
  ADD KEY `roomtypeID` (`tipsobeID`),
  ADD KEY `reservationID` (`rezervacijaID`);

--
-- Indexes for table `soba`
--
ALTER TABLE `soba`
  ADD PRIMARY KEY (`sobaID`),
  ADD KEY `roomtypeID` (`tipsobeID`);

--
-- Indexes for table `tip_sobe`
--
ALTER TABLE `tip_sobe`
  ADD PRIMARY KEY (`tipsobeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `garancija_rezervacije`
--
ALTER TABLE `garancija_rezervacije`
  MODIFY `garancijaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gost`
--
ALTER TABLE `gost`
  MODIFY `gostID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `okupirane_sobe`
--
ALTER TABLE `okupirane_sobe`
  MODIFY `okupiranesobeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `rezervacijaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rezervacija_sobe`
--
ALTER TABLE `rezervacija_sobe`
  MODIFY `rezervisanesobeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soba`
--
ALTER TABLE `soba`
  MODIFY `sobaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tip_sobe`
--
ALTER TABLE `tip_sobe`
  MODIFY `tipsobeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `okupirane_sobe`
--
ALTER TABLE `okupirane_sobe`
  ADD CONSTRAINT `okupirane_sobe_ibfk_1` FOREIGN KEY (`rezervacijaID`) REFERENCES `rezervacija` (`rezervacijaID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `okupirane_sobe_ibfk_2` FOREIGN KEY (`sobaID`) REFERENCES `soba` (`sobaID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD CONSTRAINT `rezervacija_ibfk_1` FOREIGN KEY (`gostID`) REFERENCES `gost` (`gostID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rezervacija_ibfk_2` FOREIGN KEY (`garancijaID`) REFERENCES `garancija_rezervacije` (`garancijaID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rezervacija_sobe`
--
ALTER TABLE `rezervacija_sobe`
  ADD CONSTRAINT `rezervacija_sobe_ibfk_1` FOREIGN KEY (`tipsobeID`) REFERENCES `tip_sobe` (`tipsobeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rezervacija_sobe_ibfk_2` FOREIGN KEY (`rezervacijaID`) REFERENCES `rezervacija` (`rezervacijaID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soba`
--
ALTER TABLE `soba`
  ADD CONSTRAINT `soba_ibfk_1` FOREIGN KEY (`tipsobeID`) REFERENCES `tip_sobe` (`tipsobeID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
