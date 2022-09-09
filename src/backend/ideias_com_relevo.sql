-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 09, 2022 at 01:14 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ideas_com_relevo`
--
CREATE DATABASE IF NOT EXISTS `ideias_com_relevo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ideias_com_relevo`;

-- --------------------------------------------------------

--
-- Table structure for table `associates`
--

CREATE TABLE `associates` (
  `id` char(36) NOT NULL,
  `logo` text NOT NULL,
  `name` text NOT NULL,
  `website` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` char(36) NOT NULL,
  `field` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `field`, `value`) VALUES
('1992e773-3e40-492d-a773-1ca8a73feee8', 'office', ''),
('19a6cf16-2e47-11ed-96ff-4f2be91094b7', 'aboutus', ''),
('82507761-1134-4488-b503-2d78302141b4', 'phone', ''),
('89f09396-9237-4f24-9e86-e698a2cbdb73', 'email', '');

-- --------------------------------------------------------

--
-- Table structure for table `finishes`
--

CREATE TABLE `finishes` (
  `id` char(36) NOT NULL,
  `image` text NOT NULL,
  `area` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `realestate`
--

CREATE TABLE `realestate` (
  `id` char(36) NOT NULL,
  `title` text NOT NULL,
  `main_photo` text NOT NULL,
  `photos` text NOT NULL,
  `description` text NOT NULL,
  `zone` text NOT NULL,
  `county` text NOT NULL,
  `city` text NOT NULL,
  `building_type` int(11) NOT NULL,
  `floor_count` int(11) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `value` text,
  `has_elevator` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `typology`
--

CREATE TABLE `typology` (
  `id` char(36) NOT NULL,
  `area` int(11) DEFAULT NULL,
  `photos` text,
  `energy_category` text,
  `typology` text,
  `state` text,
  `has_garage` tinyint(4) DEFAULT NULL,
  `rent_price` text NOT NULL,
  `sell_price` text NOT NULL,
  `floor` int(11) DEFAULT NULL,
  `has_parking` tinyint(4) DEFAULT NULL,
  `wc_count` int(11) DEFAULT NULL,
  `description` text,
  `rid` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
('bcd28c29-700d-4c4f-946b-a1b3277d546b', 'Super Admin', 'root@server.com', '$2y$10$ebxFpYqweJFm6BTJNh3NqOyr.ehcjpGlRC31WwT/zXV3Avh.XK9Cq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `associates`
--
ALTER TABLE `associates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finishes`
--
ALTER TABLE `finishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realestate`
--
ALTER TABLE `realestate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typology`
--
ALTER TABLE `typology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
