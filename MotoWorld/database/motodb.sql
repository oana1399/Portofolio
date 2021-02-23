-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2020 at 01:14 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactemails`
--

CREATE TABLE `contactemails` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactemails`
--

INSERT INTO `contactemails` (`id`, `firstname`, `email`, `reg_date`) VALUES
(1, 'blabla', 'dada', '2020-08-29 12:38:04'),
(2, 'Oana', 'oana.magherusan@gmail.com', '2020-08-29 12:39:32'),
(3, 'Oana', 'oanaa.magherusan@gmail.com', '2020-08-29 13:05:09'),
(4, 'Oana', 'safas@adaaf.da', '2020-08-29 13:09:41'),
(5, 'Oana', 'oana.magherusan@gm.ail', '2020-08-29 13:13:28'),
(6, 'Oana', 'oangherusan@gmail.com', '2020-08-29 13:14:03'),
(7, 'Oana', 'oanagherusan@gmail.com', '2020-08-29 13:21:24'),
(8, 'Oana', 'oana.magherusan@gm.m', '2020-08-29 13:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nickname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `firstname`, `lastname`, `email`, `password`, `reg_date`, `nickname`) VALUES
(1, 'Oana', 'Magherusan', 'oana.magherusan@gmail.com', 'Asdasd12a', '2020-08-29 14:21:47', NULL),
(2, 'Oana', 'Magherusan', 'oana.agherusan@gmail.com', 'Asdasd12a', '2020-08-29 14:22:49', NULL),
(3, 'Oana', 'Magherusan', 'oanaaagherusan@gmail.com', 'Asdasd12a', '2020-08-29 14:23:50', NULL),
(4, 'Oana', 'LAla', 'ruja_david77@yahoo.m', 'asfasfgasg1A', '2020-08-31 08:27:11', NULL),
(5, 'Oana', 'LAla', 'ruja_daavid77@yahoo.com', '8c205bcb7d5136b8864d', '2020-08-31 08:37:03', NULL),
(6, 'Oana', 'LAla', 'ruj_david77@yahoo.com', 'c8d24e79e6fb84a38a7aa62c1249d7b3', '2020-08-31 09:36:51', NULL),
(7, 'Oana', 'LAla', 'ruja_david77@yahoo.com', 'c8d24e79e6fb84a38a7aa62c1249d7b3', '2020-08-31 10:57:05', 'blabla'),
(8, 'Oana', 'LAla', 'ruja_davd77@yahoo.com', 'c8d24e79e6fb84a38a7aa62c1249d7b3', '2020-08-31 10:56:59', 'lulu'),
(9, 'Oana', 'LAla', 'ruja_david77@yaoo.com', 'e587466319da83fe4bdf4ceae9746357', '2020-08-31 10:22:16', 'lala12'),
(10, 'Oana', 'LAla', 'rja_david77@yahoo.m', '92ba8a84d0e715210533571f72dbabdc', '2020-08-31 11:13:23', 'blabl');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactemails`
--
ALTER TABLE `contactemails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactemails`
--
ALTER TABLE `contactemails`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
