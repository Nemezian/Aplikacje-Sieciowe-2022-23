-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2023 at 11:39 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zadanie08`
--

-- --------------------------------------------------------

--
-- Table structure for table `wynik`
--

CREATE TABLE `wynik` (
  `Id` int(11) NOT NULL,
  `kwota` float NOT NULL,
  `ile_lat` int(11) NOT NULL,
  `procent` float NOT NULL,
  `rata` float NOT NULL,
  `data` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `wynik`
--

INSERT INTO `wynik` (`Id`, `kwota`, `ile_lat`, `procent`, `rata`, `data`) VALUES
(1, 10000, 3, 3, 286.11, '2023-01-28'),
(2, 3123120000, 12, 2.5, 22230600, '2023-01-28'),
(3, 12312, 2, 2, 523.26, '2023-01-28'),
(4, 12312, 2, 3.5, 530.96, '2023-01-28'),
(5, 12312, 2, 3, 528.39, '2023-01-28'),
(6, 12312, 2, 2.5, 525.83, '2023-01-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wynik`
--
ALTER TABLE `wynik`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wynik`
--
ALTER TABLE `wynik`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
