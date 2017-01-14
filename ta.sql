-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 05:34 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta`
--
CREATE DATABASE IF NOT EXISTS `ta` DEFAULT CHARACTER SET utf8 COLLATE utf8_slovenian_ci;
USE `ta`;

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE `anketa` (
  `id` int(11) NOT NULL,
  `ocjena` varchar(100) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`id`, `ocjena`) VALUES
(1, 'jedan'),
(2, 'dva'),
(3, 'dva'),
(4, 'cetiri'),
(5, 'cetiri'),
(6, 'pet'),
(7, 'pet'),
(8, 'cetiri'),
(9, 'cetiri'),
(10, 'pet'),
(11, 'pet'),
(12, 'tri'),
(13, 'pet'),
(14, 'pet'),
(15, 'cetiri'),
(16, 'tri'),
(17, 'jedan');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `profile` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `username`, `password`, `profile`) VALUES
(1, 'admin', '123', 'profile.php');

-- --------------------------------------------------------

--
-- Table structure for table `ponuda`
--

CREATE TABLE `ponuda` (
  `id` int(11) NOT NULL,
  `naziv` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `opis` varchar(200) COLLATE utf8_slovenian_ci NOT NULL,
  `detaljanOpis` text COLLATE utf8_slovenian_ci NOT NULL,
  `slika` text COLLATE utf8_slovenian_ci NOT NULL,
  `cijena` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `ponuda`
--

INSERT INTO `ponuda` (`id`, `naziv`, `opis`, `detaljanOpis`, `slika`, `cijena`) VALUES
(1, 'Venecija', 'Predivno putovanje', '5 dana u prelijepoj Italiji', 'ponuda1.jpg', 123),
(2, 'London', 'Predivno putovanje', '4 dana u prelijepoj Engleskoj', 'London.jpg', 400),
(3, 'Berlin', 'Predivno putovanje', '5 dana u prelijepoj Njemackoj', 'berlin1.jpg', 350),
(4, 'Amsterdam', 'Studentski pohod', '5 dana dobrog provoda', 'amsterdam1.jpg', 350);

-- --------------------------------------------------------

--
-- Table structure for table `poruka`
--

CREATE TABLE `poruka` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `poruka`
--

INSERT INTO `poruka` (`id`, `email`, `tekst`) VALUES
(187, 'amina.puce@gmail.com', 'najj ste'),
(188, 'neki.mail@gmail.com', 'bilo je divno iskustvo putovati sa vama. najj agencija'),
(189, 'proba@gmail.com', 'proba'),
(190, 'probaBaza@gmail.com', 'probaBaza'),
(191, 'probaBaza2@gmail.com', 'probaBaza2'),
(192, 'probaBaza3@gmail.com', 'probaBaza3'),
(193, 'probaBaza@gmail.com', 'probaaBAza');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `id` int(11) NOT NULL,
  `idPonude` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `ime` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `prezime` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `brTelefona` varchar(100) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `rezervacija`
--

INSERT INTO `rezervacija` (`id`, `idPonude`, `email`, `ime`, `prezime`, `brTelefona`) VALUES
(1, 1, 'amina.p@gmail.com', 'Amina', 'Puce', '061/302-919'),
(2, 1, 'proba@gmail.com', 'ProbaIme', 'ProbaPrezime', '061/000-111'),
(3, 2, 'dljevo@gmail.com', 'Dzenita', 'Ljevo', '061/000-222');

-- --------------------------------------------------------

--
-- Table structure for table `slika`
--

CREATE TABLE `slika` (
  `id` int(11) NOT NULL,
  `idPonude` int(11) NOT NULL,
  `naziv` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `slika`
--

INSERT INTO `slika` (`id`, `idPonude`, `naziv`) VALUES
(168, 1, 'venecija2.jpg'),
(169, 1, 'venecija3.jpg'),
(170, 1, 'venecija4.jpg'),
(171, 2, 'london1.jpg'),
(172, 2, 'london2.jpg'),
(173, 2, 'london3.jpg'),
(174, 3, 'berlin2.jpg'),
(175, 3, 'berlin3.jpg'),
(176, 3, 'berlin4.jpg'),
(177, 4, 'amsterdam2.jpg'),
(178, 4, 'amsterdam3.jpg'),
(179, 4, 'amsterdam4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ponuda`
--
ALTER TABLE `ponuda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poruka`
--
ALTER TABLE `poruka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPonude` (`idPonude`);

--
-- Indexes for table `slika`
--
ALTER TABLE `slika`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPonude` (`idPonude`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketa`
--
ALTER TABLE `anketa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ponuda`
--
ALTER TABLE `ponuda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `poruka`
--
ALTER TABLE `poruka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `slika`
--
ALTER TABLE `slika`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD CONSTRAINT `rezervacija_ibfk_1` FOREIGN KEY (`idPonude`) REFERENCES `ponuda` (`id`);

--
-- Constraints for table `slika`
--
ALTER TABLE `slika`
  ADD CONSTRAINT `slika_ibfk_1` FOREIGN KEY (`idPonude`) REFERENCES `ponuda` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
