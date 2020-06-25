-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 12:17 AM
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
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `gost`
--

CREATE TABLE `gost` (
  `GostID` int(11) NOT NULL,
  `Ime` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prezime` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Adresa` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Grad` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_broj` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `HotelID` int(11) NOT NULL,
  `Naziv` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Grad` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Adresa` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Broj_tel` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Slogan` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Website_adresa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `placanje`
--

CREATE TABLE `placanje` (
  `PlacanjeID` int(11) NOT NULL,
  `SobaID` int(11) NOT NULL,
  `Datum_placanja` datetime NOT NULL,
  `Iznos` decimal(10,0) NOT NULL,
  `Tip_placanjaID` int(11) NOT NULL,
  `Status_placanjaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `RezervacijaID` int(11) NOT NULL,
  `HotelID` int(11) NOT NULL,
  `GostID` int(11) NOT NULL,
  `Datum_od` datetime NOT NULL,
  `Datum_do` datetime NOT NULL,
  `Broj_rez_soba` int(11) NOT NULL,
  `Status_rezID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rezervisane_sobe`
--

CREATE TABLE `rezervisane_sobe` (
  `Rez_sobeID` int(11) NOT NULL,
  `RezervacijaID` int(11) NOT NULL,
  `SobaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smestaj`
--

CREATE TABLE `smestaj` (
  `SmestajID` int(11) NOT NULL,
  `Tip` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Opis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sortiranje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soba`
--

CREATE TABLE `soba` (
  `SobaID` int(11) NOT NULL,
  `HotelID` int(11) NOT NULL,
  `Sprat` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Broj_sobe` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SmestajID` int(11) NOT NULL,
  `Opis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status_sobeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_placanja`
--

CREATE TABLE `status_placanja` (
  `Status_placanjaID` int(11) NOT NULL,
  `Status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Opis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sortiranje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_rezervacije`
--

CREATE TABLE `status_rezervacije` (
  `Status_rezID` int(11) NOT NULL,
  `Status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Opis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sortiranje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_sobe`
--

CREATE TABLE `status_sobe` (
  `Status_sobeID` int(11) NOT NULL,
  `Status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Opis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sortiranje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tip_placanja`
--

CREATE TABLE `tip_placanja` (
  `Tip_placanjaID` int(11) NOT NULL,
  `Tip` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sortiranje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gost`
--
ALTER TABLE `gost`
  ADD PRIMARY KEY (`GostID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`HotelID`);

--
-- Indexes for table `placanje`
--
ALTER TABLE `placanje`
  ADD PRIMARY KEY (`PlacanjeID`),
  ADD KEY `SobaID` (`SobaID`),
  ADD KEY `Tip_placanjaID` (`Tip_placanjaID`),
  ADD KEY `Status_placanjaID` (`Status_placanjaID`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`RezervacijaID`),
  ADD KEY `HotelID` (`HotelID`),
  ADD KEY `GostID` (`GostID`),
  ADD KEY `Status_rezID` (`Status_rezID`);

--
-- Indexes for table `rezervisane_sobe`
--
ALTER TABLE `rezervisane_sobe`
  ADD PRIMARY KEY (`Rez_sobeID`),
  ADD KEY `RezervacijaID` (`RezervacijaID`),
  ADD KEY `SobaID` (`SobaID`);

--
-- Indexes for table `smestaj`
--
ALTER TABLE `smestaj`
  ADD PRIMARY KEY (`SmestajID`);

--
-- Indexes for table `soba`
--
ALTER TABLE `soba`
  ADD PRIMARY KEY (`SobaID`),
  ADD KEY `HotelID` (`HotelID`),
  ADD KEY `SmestajID` (`SmestajID`),
  ADD KEY `Status_sobeID` (`Status_sobeID`);

--
-- Indexes for table `status_placanja`
--
ALTER TABLE `status_placanja`
  ADD PRIMARY KEY (`Status_placanjaID`);

--
-- Indexes for table `status_rezervacije`
--
ALTER TABLE `status_rezervacije`
  ADD PRIMARY KEY (`Status_rezID`);

--
-- Indexes for table `status_sobe`
--
ALTER TABLE `status_sobe`
  ADD PRIMARY KEY (`Status_sobeID`);

--
-- Indexes for table `tip_placanja`
--
ALTER TABLE `tip_placanja`
  ADD PRIMARY KEY (`Tip_placanjaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gost`
--
ALTER TABLE `gost`
  MODIFY `GostID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `HotelID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `placanje`
--
ALTER TABLE `placanje`
  MODIFY `PlacanjeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `RezervacijaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rezervisane_sobe`
--
ALTER TABLE `rezervisane_sobe`
  MODIFY `Rez_sobeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smestaj`
--
ALTER TABLE `smestaj`
  MODIFY `SmestajID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soba`
--
ALTER TABLE `soba`
  MODIFY `SobaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_placanja`
--
ALTER TABLE `status_placanja`
  MODIFY `Status_placanjaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_rezervacije`
--
ALTER TABLE `status_rezervacije`
  MODIFY `Status_rezID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_sobe`
--
ALTER TABLE `status_sobe`
  MODIFY `Status_sobeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tip_placanja`
--
ALTER TABLE `tip_placanja`
  MODIFY `Tip_placanjaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `placanje`
--
ALTER TABLE `placanje`
  ADD CONSTRAINT `placanje_ibfk_1` FOREIGN KEY (`SobaID`) REFERENCES `soba` (`SobaID`),
  ADD CONSTRAINT `placanje_ibfk_2` FOREIGN KEY (`Tip_placanjaID`) REFERENCES `tip_placanja` (`Tip_placanjaID`),
  ADD CONSTRAINT `placanje_ibfk_3` FOREIGN KEY (`Status_placanjaID`) REFERENCES `status_placanja` (`Status_placanjaID`);

--
-- Constraints for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD CONSTRAINT `rezervacija_ibfk_1` FOREIGN KEY (`GostID`) REFERENCES `gost` (`GostID`),
  ADD CONSTRAINT `rezervacija_ibfk_2` FOREIGN KEY (`HotelID`) REFERENCES `hotel` (`HotelID`),
  ADD CONSTRAINT `rezervacija_ibfk_3` FOREIGN KEY (`Status_rezID`) REFERENCES `status_rezervacije` (`Status_rezID`);

--
-- Constraints for table `rezervisane_sobe`
--
ALTER TABLE `rezervisane_sobe`
  ADD CONSTRAINT `rezervisane_sobe_ibfk_1` FOREIGN KEY (`RezervacijaID`) REFERENCES `rezervacija` (`RezervacijaID`),
  ADD CONSTRAINT `rezervisane_sobe_ibfk_2` FOREIGN KEY (`SobaID`) REFERENCES `soba` (`SobaID`);

--
-- Constraints for table `soba`
--
ALTER TABLE `soba`
  ADD CONSTRAINT `soba_ibfk_1` FOREIGN KEY (`HotelID`) REFERENCES `hotel` (`HotelID`),
  ADD CONSTRAINT `soba_ibfk_2` FOREIGN KEY (`SmestajID`) REFERENCES `smestaj` (`SmestajID`),
  ADD CONSTRAINT `soba_ibfk_3` FOREIGN KEY (`Status_sobeID`) REFERENCES `status_sobe` (`Status_sobeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
