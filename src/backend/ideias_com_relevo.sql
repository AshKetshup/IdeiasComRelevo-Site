-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 31, 2022 at 06:25 PM
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
CREATE DATABASE IF NOT EXISTS `ideas_com_relevo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ideas_com_relevo`;

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

--
-- Dumping data for table `associates`
--

INSERT INTO `associates` (`id`, `logo`, `name`, `website`) VALUES
('da4c7351-e282-4b06-9561-23a79a8cd7e7', '354ff668-9e3b-4633-b7a3-676397465c50.png', 'Moogle Inc', 'moogle.pcdev.pt');

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
('1992e773-3e40-492d-a773-1ca8a73feee8', 'office', 'Entroncamento da santa cona do assobio\r\nNº 69'),
('82507761-1134-4488-b503-2d78302141b4', 'phone', '+351 922 222 233'),
('89f09396-9237-4f24-9e86-e698a2cbdb73', 'email', 'email@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `finishes`
--

CREATE TABLE `finishes` (
  `id` char(36) NOT NULL,
  `image` text NOT NULL,
  `area` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `finishes`
--

INSERT INTO `finishes` (`id`, `image`, `area`) VALUES
('877ce98e-20eb-4998-9cda-cb38dcd2d5ae', '316d26c1-3279-4534-9ca7-8048dbbba2c7.jpg', 1),
('f053648e-6e92-4089-8a69-5daf3bcb219c', '0e612904-59fc-405c-a7f7-de8467815ecc.jpg', 0);

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

--
-- Dumping data for table `realestate`
--

INSERT INTO `realestate` (`id`, `title`, `main_photo`, `photos`, `description`, `zone`, `county`, `city`, `building_type`, `floor_count`, `state`, `value`, `has_elevator`) VALUES
('7d9165c4-9e12-4366-8aa9-3b0bce0f2745', 'Small house', '', '', 'Big house', 'Centro', 'Figueira da Foz', 'Alhadas', 2, 1, 1, '200000', 0);

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
  `rent_price` text,
  `sell_price` text,
  `floor` int(11) DEFAULT NULL,
  `has_parking` tinyint(4) DEFAULT NULL,
  `wc_count` int(11) DEFAULT NULL,
  `description` text,
  `rid` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typology`
--

INSERT INTO `typology` (`id`, `area`, `photos`, `energy_category`, `typology`, `state`, `has_garage`, `rent_price`, `sell_price`, `floor`, `has_parking`, `wc_count`, `description`, `rid`) VALUES
('552c10e9-606c-4938-b767-a5cbcd6286c9', 2000, '', 'A++', 'T4', '1', 1, '', '', 0, 1, 4, 'Big house', '7d9165c4-9e12-4366-8aa9-3b0bce0f2745');

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
('537a913f-ad48-47e1-9110-9f17c1f12f64', 'Pedro Cavaleiro', 'pm.cavaleiro@hotmail.com', '$2y$10$uTldF2zNDvpPCyOs15dsYeyeNU3RGI.OADHlJSDdrzJ3R6ZeNnCLe'),
('5a672782-9efe-4fd0-8c6f-8ec398765343', '', '', '$2y$10$zrg8vH.v1Y1r.9QtGsue3OXxpDG.TRnEIXxFVF8EShB9eItJmZ4eq'),
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
