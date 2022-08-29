-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 29, 2022 at 04:44 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

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
('1992e773-3e40-492d-a773-1ca8a73feee8', 'office', 'Estrada da santa cona do assobio<br />\r\nNº 69'),
('82507761-1134-4488-b503-2d78302141b4', 'phone', '+351 922 222 222'),
('89f09396-9237-4f24-9e86-e698a2cbdb73', 'email', 'email@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `finishes`
--

CREATE TABLE `finishes` (
  `id` char(36) NOT NULL,
  `image` text NOT NULL,
  `area` tinyint(4) NOT NULL
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
  `appartment_count` int(11) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `value` double NOT NULL,
  `has_elevator` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `realestate`
--

INSERT INTO `realestate` (`id`, `title`, `main_photo`, `photos`, `description`, `zone`, `county`, `city`, `building_type`, `appartment_count`, `state`, `value`, `has_elevator`) VALUES
('686eac4c-7464-4472-bd0a-fa310befc6ac', 'A title, why it has this idk', 'https://webdevtrick.com/wp-content/uploads/programming.jpg', 'https://webdevtrick.com/wp-content/uploads/programming.jpg,https://webdevtrick.com/wp-content/uploads/hardware.jpg,https://webdevtrick.com/wp-content/uploads/gadget.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum magnam dolores delectus nemo. Asperiores enim quibusdam cupiditate officiis, recusandae consequuntur est soluta eum id qui nobis. Doloribus saepe ipsam rerum aut. From db', 'Centro', 'Ourém', 'Vilar', 1, 12, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `typology`
--

CREATE TABLE `typology` (
  `id` char(36) NOT NULL,
  `area` int(11) NOT NULL,
  `photos` int(11) NOT NULL,
  `energy_category` text NOT NULL,
  `typology` text NOT NULL,
  `state` text NOT NULL,
  `has_garage` tinyint(4) NOT NULL,
  `rent_price` tinyint(4) NOT NULL,
  `sell_price` tinyint(4) NOT NULL,
  `floor` int(11) NOT NULL,
  `has_parking` tinyint(4) NOT NULL,
  `wc_count` int(11) NOT NULL,
  `available` tinyint(4) NOT NULL,
  `description` text NOT NULL,
  `rid` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` char(36) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
