-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 03, 2026 at 11:47 PM
-- Server version: 10.11.19-MariaDB-cll-lve
-- PHP Version: 8.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aau_products`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `url` varchar(256) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(32) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_modify` datetime NOT NULL,
  `thumbnail` varchar(128) NOT NULL,
  `images` varchar(256) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `email`, `url`, `price`, `category`, `date_create`, `date_modify`, `thumbnail`, `images`, `description`) VALUES
(1, 'Forma Necklace', 'hello@example.com', 'https://example.com/forma-necklace', 275.00, 'necklace', '2026-11-03 23:44:47', '2026-11-03 23:44:47', 'forma-necklace.jpg', 'forma-1.jpg,forma-2.jpg', 'Freshwater pearl necklace with a modern design.'),
(2, 'Forma Bracelet', 'hello@example.com', 'https://example.com/forma-bracelet', 195.00, 'bracelet', '2026-11-03 23:44:47', '2026-11-03 23:44:47', 'forma-bracelet.jpg', 'forma-bracelet-1.jpg', 'Freshwater pearl bracelet.'),
(3, 'Forma Earrings', 'hello@example.com', 'https://example.com/forma-earrings', 175.00, 'earrings', '2026-11-03 23:44:47', '2026-11-03 23:44:47', 'forma-earrings.jpg', 'forma-earrings-1.jpg', 'Modern pearl drop earrings.'),
(4, 'Sabine Earrings', 'hello@example.com', 'https://example.com/sabine-earrings', 175.00, 'earrings', '2026-11-03 23:44:47', '2026-11-03 23:44:47', 'sabine-earrings.jpg', 'sabine-1.jpg', 'Baroque pearl drop earrings.'),
(5, 'Sabine Bracelet', 'hello@example.com', 'https://example.com/sabine-bracelet', 265.00, 'bracelet', '2026-11-03 23:44:47', '2026-11-03 23:44:47', 'sabine-bracelet.jpg', 'sabine-bracelet-1.jpg', 'Elegant freshwater pearl bracelet.'),
(6, 'Arden Earrings', 'hello@example.com', 'https://example.com/arden-earrings', 245.00, 'earrings', '2026-11-03 23:44:47', '2026-11-03 23:44:47', 'arden-earrings.jpg', 'arden-1.jpg', 'Statement pearl earrings.'),
(7, 'Nira Pendant', 'hello@example.com', 'https://example.com/nira-pendant', 325.00, 'necklace', '2026-11-03 23:44:47', '2026-11-03 23:44:47', 'nira-pendant.jpg', 'nira-1.jpg', 'Unique pearl pendant necklace.'),
(8, 'Echo Collar Necklace', 'hello@example.com', 'https://example.com/echo-collar', 295.00, 'necklace', '2026-11-03 23:44:47', '2026-11-03 23:44:47', 'echo-collar.jpg', 'echo-1.jpg', 'Modern pearl collar necklace.'),
(9, 'Lumi Bracelet', 'hello@example.com', 'https://example.com/lumi-bracelet', 345.00, 'bracelet', '2026-11-03 23:44:47', '2026-11-03 23:44:47', 'lumi-bracelet.jpg', 'lumi-1.jpg', 'Round freshwater pearl bracelet.'),
(10, 'Kelyn Necklace', 'hello@example.com', 'https://example.com/kelyn-necklace', 285.00, 'necklace', '2026-11-03 23:44:47', '2026-11-03 23:44:47', 'kelyn-necklace.jpg', 'kelyn-1.jpg', 'Long pearl pendant necklace.'),
(11, 'Elara Round Studs', 'hello@example.com', 'https://example.com/elara-studs', 175.00, 'earrings', '2026-11-03 23:44:47', '2026-11-03 23:44:47', 'elara-studs.jpg', 'elara-1.jpg', 'Classic round pearl stud earrings.'),
(12, 'Ayla Necklace', 'hello@example.com', 'https://example.com/ayla-necklace', 275.00, 'necklace', '2026-11-03 23:44:47', '2026-11-03 23:44:47', 'ayla-necklace.jpg', 'ayla-1.jpg', 'Petal-shaped freshwater pearl necklace.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
