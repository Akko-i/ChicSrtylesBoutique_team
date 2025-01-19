-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2025 at 03:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chic_styles`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `billing_id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `suburb` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `last_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`billing_id`, `user_id`, `first_name`, `last_name`, `company_name`, `phone`, `email`, `country`, `address_line1`, `address_line2`, `suburb`, `state`, `postcode`, `last_updated`) VALUES
('a3373ac8aacf212ed0fcca627082eef5', '2739fcba-d0b1-11ef-b9b3-5c5f67bf0a08', 'Test-33', 'Two-2', '', '+61499776622', 'test2@chicstyles.com', 'Australia', '28 Maria Asterdam St.,', '', 'Blacktown', 'NSW', '3202', '2025-01-17 01:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` char(36) NOT NULL DEFAULT uuid(),
  `role_name` varchar(20) NOT NULL,
  `role_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_created_at`, `role_updated_at`) VALUES
('1', 'Member', '2025-01-12 05:34:30', '2025-01-12 05:34:30'),
('2', 'Admin', '2025-01-12 05:34:30', '2025-01-12 05:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` char(36) NOT NULL DEFAULT uuid(),
  `user_first_name` varchar(50) NOT NULL,
  `user_last_name` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` varchar(15) DEFAULT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role_id` char(36) NOT NULL,
  `user_reset_token` varchar(255) DEFAULT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reset_token` varchar(64) DEFAULT NULL,
  `reset_token_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_first_name`, `user_last_name`, `user_email`, `user_phone`, `user_password`, `user_role_id`, `user_reset_token`, `user_created_at`, `user_updated_at`, `reset_token`, `reset_token_expiry`) VALUES
('123d8b2d-d0df-11ef-9e3d-5c5f67bf0a08', 'Test', 'Three', 'test3@chicstyles.com', NULL, '$2y$10$MKJJO/N3vuClZ3j95TrFluT7GSRvwOV3tm6mg11mVieIXzFzXC6L2', '1', NULL, '2025-01-12 12:16:31', '2025-01-12 12:16:31', NULL, NULL),
('1fc181aa-d341-11ef-9e3d-5c5f67bf0a08', 'Test', 'Four', 'test4@chicstyles.com', NULL, '$2y$10$XDPBhFAirBB1CBWTff.om.MM02x7RrBsuhnHlbLw51H0kuNZkPv3K', '2', NULL, '2025-01-15 13:03:03', '2025-01-15 13:03:37', NULL, NULL),
('2739fcba-d0b1-11ef-b9b3-5c5f67bf0a08', 'Test', 'Sending', 'test2@chicstyles.com', '', '$2y$10$YsfETKMH2inM/rmC454rNuuw9o0KnxDjOv85aAjXaWoV4s852MG9K', '1', NULL, '2025-01-12 06:47:23', '2025-01-16 14:51:03', '5229bc9530dd8e14bb6506ee55882823e4790347ca1d5a1bb762af5925ac7976', '2025-01-12 09:04:39'),
('6e0fbc25-d0a8-11ef-b9b3-5c5f67bf0a08', 'Test', 'One', 'test1@chicstyles.com', NULL, '$2y$10$QQwUYyMhJFd.YqYyu8mOeOvOpQOI.nhW5E7Zk20E8EvTelf66FZju', '1', NULL, '2025-01-12 05:44:56', '2025-01-12 05:44:56', NULL, NULL),
('879d7fd0-d3e9-11ef-bead-5c5f67bf0a08', 'Test', 'Five-555', 'test5@chicstyles.com', '', '$2y$10$stejKY6vySfpDOa.zt2Vu.zGOd4SnZrStzo1ynL4fBtf0goP4k9Dq', '1', NULL, '2025-01-16 09:09:02', '2025-01-16 09:10:51', NULL, NULL),
('bfc4fffa-d0b3-11ef-b9b3-5c5f67bf0a08', 'Comet', 'Xavier', 'cometxe@gmail.com', NULL, '$2y$10$WzOZteu0bVgdUggO6de8L.QgBdrLfd/VRmrzhsGL7UeGfCsbZRnQq', '1', NULL, '2025-01-12 07:05:58', '2025-01-12 10:57:01', 'be90d378820805a2e52df971812cdeec00ef13532cf8b97eb907b2ce68623cea', '2025-01-12 12:57:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`billing_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `fk_user_role` (`user_role_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD CONSTRAINT `billing_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`user_role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
