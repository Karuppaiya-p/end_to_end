-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2020 at 02:58 AM
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
-- Database: `endtoend`
--

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `file` text COLLATE utf8_unicode_ci NOT NULL,
  `key_value` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `share_with` text COLLATE utf8_unicode_ci NOT NULL,
  `public` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `username`, `file`, `key_value`, `type`, `share_with`, `public`, `date`) VALUES
(1, 'Karuppaiya', 'board-3153023_19205e67f300dd23d.jpg', '', 'jpg', '', 1, '2020-03-10 20:45:38'),
(2, 'Karuppaiya', 'favicon5e67f3589b877.jpeg', '', 'jpeg', 'Karuppaiya,user1', 0, '2020-03-10 20:44:25'),
(3, 'Karuppaiya', 'favicon5e67f37a21cca.jpeg', '', 'jpeg', 'Karuppaiya', 0, '2020-03-10 20:07:22'),
(4, 'Karuppaiya', 'shivasetup5e67fa604839e.exe', '123456', 'exe', 'Karuppaiya', 0, '2020-03-10 20:36:48'),
(5, 'user1', '11.Chennai 2 Singapore Songs - Pogadhe Video Song - Gokul Anand, Anju Kurian - Ghibran5e683726de2d5.mp4', '123456', 'mp4', 'Karuppaiya', 0, '2020-03-11 00:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(17) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `public` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `mobile`, `email`, `address`, `public`) VALUES
(1, 'Karuppaiya', 'KARUPPAIYA', '09750905375', 'er.karuppaiya@gmail.com', '48, Coconut tree compound, karupparayan temple street, kumaranandhapuram, Tiruppur.', 1),
(2, 'user1', 'user1', '09750905375', 'test@gmail.com', 'add', 1),
(3, 'user2', 'user2', '97509805', 'ert@ggmail.com', 'asdaasd', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
