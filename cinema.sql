-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 11:14 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `cinemas`
--

CREATE TABLE `cinemas` (
  `id` int(11) NOT NULL,
  `places_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cinemas`
--

INSERT INTO `cinemas` (`id`, `places_id`, `name`, `slug`, `description`, `city`, `image`, `address`) VALUES
(3, 3, 'Prince Charles Cinema', 'prince-charles-cinema', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum', 'London', '1920.jpg', '7 Leicester Pl, West End, London WC2H 7BY, United Kingdom'),
(4, 4, 'Le Brady', 'le-brady', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum', 'Paris', 'def452d8be5295356a0e1a9acdec31ea.jpg', '39 Boulevard de Strasbourg, 75010 Paris, France'),
(5, 3, 'UGC Cine Cite les Halles', 'ugc-cine-cite-les-halles', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum', 'Paris', 'SP-3773-CinemaParis-Inn.jpg', '101 Rue Berger, 75001 Paris, France'),
(6, 3, 'Rome Cinemas 8', 'rome-cinemas-8', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum', 'Rome', 'rome-theaters-770x578.jpg', 'Rome St 548');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `cinema_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `places_cine_cite`
--

CREATE TABLE `places_cine_cite` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `places_cine_cite`
--

INSERT INTO `places_cine_cite` (`id`, `status`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `places_le_brady`
--

CREATE TABLE `places_le_brady` (
  `id` int(11) NOT NULL,
  `cinema_table_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `places_le_brady`
--

INSERT INTO `places_le_brady` (`id`, `cinema_table_id`, `status`) VALUES
(1, 4, 1),
(2, 4, 1),
(3, 4, 1),
(4, 4, 1),
(5, 4, 1),
(6, 4, 1),
(7, 4, 1),
(8, 4, 1),
(9, 4, 1),
(10, 4, 1),
(13, 4, 1),
(14, 4, 1),
(15, 4, 1),
(16, 4, 1),
(17, 4, 1),
(18, 4, 1),
(19, 4, 1),
(20, 4, 1),
(21, 4, 1),
(22, 4, 1),
(23, 4, 1),
(24, 4, 1),
(25, 4, 1),
(26, 4, 1),
(27, 4, 1),
(28, 4, 1),
(29, 4, 1),
(30, 4, 1),
(31, 4, 1),
(32, 4, 1),
(33, 4, 1),
(34, 4, 1),
(35, 4, 1),
(36, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `places_prince`
--

CREATE TABLE `places_prince` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `places_prince`
--

INSERT INTO `places_prince` (`id`, `status`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1);

-- --------------------------------------------------------

--
-- Table structure for table `place_rome_cinema`
--

CREATE TABLE `place_rome_cinema` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place_rome_cinema`
--

INSERT INTO `place_rome_cinema` (`id`, `status`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1);

-- --------------------------------------------------------

--
-- Table structure for table `presents`
--

CREATE TABLE `presents` (
  `id` int(11) NOT NULL,
  `cinemas_id` int(11) NOT NULL,
  `film_name` varchar(100) NOT NULL,
  `film_year` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `show_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `presents`
--

INSERT INTO `presents` (`id`, `cinemas_id`, `film_name`, `film_year`, `image`, `show_date`) VALUES
(1, 5, 'The King of Staten Island', '2020', 'joker.jpg', '2020-06-15'),
(2, 4, 'Artemis Fowl', '2020', 'once-upon.jpg', '2020-06-16'),
(3, 3, 'Little Women', '2019', 'wonder.jpg', '2020-06-17'),
(4, 3, 'Uncut Gems', '2020', 'joker.jpg', '2020-06-16'),
(5, 4, 'Joker 2019', '2019', 'joker.jpg', '2020-06-16'),
(6, 6, 'Wonder Woman 1984', '2020', '58585.jpg', '2020-06-17'),
(7, 3, 'Booksmart', '2020', 'wonder.jpg', '2020-06-18'),
(8, 6, 'Portrait of a Lady on Fire', '2020', 'once-upon.jpg', '2020-06-16'),
(9, 5, 'Once Upon a Time in Hollywood', '2020', 'joker.jpg', '2020-06-16'),
(10, 6, 'Once Upon a Time in Hollywood', '2020', 'once-upon.jpg', '2020-06-17'),
(11, 3, 'Booksmart', '2020', 'wonder.jpg', '2020-06-18'),
(12, 4, 'Little Women', '2019', 'joker.jpg', '2020-06-17'),
(13, 6, 'Artemis Fowl', '2020', 'once-upon.jpg', '2020-06-16'),
(14, 4, 'Once Upon a Time in Hollywood', '2020', 'joker.jpg', '2020-06-18'),
(15, 3, 'Artemis Fowl', '2020', 'once-upon.jpg', '2020-06-19'),
(16, 3, 'Artemis Fowl', '2020', 'once-upon.jpg', '2020-06-17'),
(17, 5, 'Portrait of a Lady on Fire', '2020', 'once-upon.jpg', '2020-06-18'),
(18, 5, 'Artemis Fowl', '2020', 'once-upon.jpg', '2020-06-16'),
(19, 4, 'Artemis Fowl', '2020', 'wonder.jpg', '2020-06-16'),
(20, 6, 'Artemis Fowl', '2020', 'joker.jpg', '2020-06-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cinemas`
--
ALTER TABLE `cinemas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `places_id` (`places_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places_cine_cite`
--
ALTER TABLE `places_cine_cite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places_le_brady`
--
ALTER TABLE `places_le_brady`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cinema_table_id` (`cinema_table_id`);

--
-- Indexes for table `places_prince`
--
ALTER TABLE `places_prince`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place_rome_cinema`
--
ALTER TABLE `place_rome_cinema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presents`
--
ALTER TABLE `presents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cinemas_id` (`cinemas_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cinemas`
--
ALTER TABLE `cinemas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `places_cine_cite`
--
ALTER TABLE `places_cine_cite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `places_le_brady`
--
ALTER TABLE `places_le_brady`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `places_prince`
--
ALTER TABLE `places_prince`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `place_rome_cinema`
--
ALTER TABLE `place_rome_cinema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `presents`
--
ALTER TABLE `presents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cinemas`
--
ALTER TABLE `cinemas`
  ADD CONSTRAINT `cinemas_ibfk_1` FOREIGN KEY (`id`) REFERENCES `presents` (`cinemas_id`);

--
-- Constraints for table `places_le_brady`
--
ALTER TABLE `places_le_brady`
  ADD CONSTRAINT `places_le_brady_ibfk_1` FOREIGN KEY (`cinema_table_id`) REFERENCES `cinemas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;