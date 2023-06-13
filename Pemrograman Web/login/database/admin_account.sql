-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 01:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `useraccount`
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
('ariel2', '$2y$10$F9KHZRMFJO81s/b4J402BuuNIksuJVS96MKJVzCdP8v36itSoRtbS', 'default.jpg'),
('ariel3', '$2y$10$oAonTVhEA8G/5yfKYAENDuomTGIWhRWD7eVmwq912ovHfoZoSLSY6', 'default.jpg'),
('devariel', '$2y$10$w6mRIgC5MC.hxSts8d1acewKNrR18MzoGYiuZirNQE9bFK9zm92aq', 'CB_img6487eb994cf6f.png'),
('tes', '$2y$10$DPHA4GCYfFD1/m04NuduMezshm92G0jJBqeYEHw4GT5m1PJQSdcOm', 'default.jpg');

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
(1, 'ariel2', 'lorem ipsum new text', '2023-06-13 12:36:35', NULL),
(2, 'devariel', 'Ya ya ouwteiwei', '2023-06-13 12:36:35', NULL),
(4, 'devariel', ',', '2023-06-13 15:10:13', NULL),
(5, 'devariel', 'tes', '2023-06-13 15:13:16', NULL),
(6, 'devariel', 'tes123', '2023-06-13 15:13:50', NULL),
(7, 'ariel3', 'halo', '2023-06-13 15:15:53', NULL),
(8, 'ariel3', 'selamat malam', '2023-06-13 19:15:06', NULL),
(9, 'ariel3', 'selamat malam', '2023-06-13 19:15:38', NULL),
(10, 'devariel', 'selamat beristirahat sahabatku', '2023-06-13 19:16:17', NULL),
(11, 'ariel3', 'selamat malam', '2023-06-13 19:16:43', NULL),
(12, 'devariel', 'iyiuyioiyu', '2023-06-13 19:24:49', NULL),
(13, 'devariel', 'iyiuyioiyu', '2023-06-13 19:25:00', NULL),
(14, 'ariel3', 'selamat malam', '2023-06-13 19:25:24', NULL),
(15, 'ariel3', 'selamat malam', '2023-06-13 19:25:54', NULL),
(16, 'devariel', 'dlj', '2023-06-13 19:27:15', NULL),
(17, 'ariel3', 'selamat malam', '2023-06-13 19:27:26', NULL),
(18, 'devariel', 'dlj', '2023-06-13 19:27:35', NULL);

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
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `group_member`
--
ALTER TABLE `group_member`
  ADD CONSTRAINT `group_member_ibfk_1` FOREIGN KEY (`username`) REFERENCES `admin_account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_member_ibfk_2` FOREIGN KEY (`conversation_id`) REFERENCES `conversation` (`conversation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`username`) REFERENCES `admin_account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
