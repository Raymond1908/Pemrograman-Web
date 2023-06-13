-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2023 at 02:32 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20906801_useraccount`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `username` varchar(100) NOT NULL,
  `password` varchar(256) DEFAULT NULL,
  `picture` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`username`, `password`, `picture`) VALUES
('ariell', '$2y$10$J0imad655nHzoGFazgCi/e7j8dc/oiqSeQy0h9XsIOC9SlenlMNvW', 'default.jpg'),
('bravio', '$2y$10$6dD9zdfZfjCiy9ZywC1CJOV.mQMdTW8Rj/lOv/0nz9wUqhqUS8yH6', 'default.jpg'),
('mikael pemba', '$2y$10$kl2TURA2PnFWLS/4grORae3Lc9MBp6D/.xDdVuQVKq8Mut6owhumK', 'default.jpg'),
('raymond', '$2y$10$oFN9jQhOxB/C5IhOqnyMIONUoPxLCNYr.SAZb6keQJmcB9.lk2fnO', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `conversation_id` int(11) NOT NULL,
  `conversation_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`conversation_id`, `conversation_name`) VALUES
(1, 'global_chat');

-- --------------------------------------------------------

--
-- Table structure for table `group_member`
--

CREATE TABLE `group_member` (
  `username` varchar(50) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `joined_datetime` datetime DEFAULT NULL,
  `left_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_member`
--

INSERT INTO `group_member` (`username`, `conversation_id`, `joined_datetime`, `left_datetime`) VALUES
('devariel', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `isi_pesan` varchar(255) NOT NULL,
  `waktu_terkirim` datetime NOT NULL DEFAULT current_timestamp(),
  `isi_media` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `username`, `isi_pesan`, `waktu_terkirim`, `isi_media`) VALUES
(60, 'Bravio', 'Selamat malam kawan-kawan', '2023-06-13 14:28:36', NULL),
(61, 'raymond', 'Halo, apa kabar', '2023-06-13 14:29:34', NULL),
(63, 'ariell', 'Selamat malam bravio, selamat beristirahat', '2023-06-13 14:30:41', NULL),
(64, 'Mikael Pemba', 'hello bang', '2023-06-13 14:30:43', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`conversation_id`);

--
-- Indexes for table `group_member`
--
ALTER TABLE `group_member`
  ADD KEY `group_member_ibfk_1` (`username`),
  ADD KEY `group_member_ibfk_2` (`conversation_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `message_ibfk_1` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
