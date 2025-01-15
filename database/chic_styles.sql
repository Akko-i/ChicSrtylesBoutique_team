-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2025 at 01:38 PM
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
('2739fcba-d0b1-11ef-b9b3-5c5f67bf0a08', 'Test30', 'Two-32', 'test2@chicstyles.com', '', '$2y$10$AGtpf2BzbBU71OlLzKcZZuRcE3piUzLkPF4SPnHEe/6du0Uqfy536', '1', NULL, '2025-01-12 06:47:23', '2025-01-15 12:25:51', '5229bc9530dd8e14bb6506ee55882823e4790347ca1d5a1bb762af5925ac7976', '2025-01-12 09:04:39'),
('6e0fbc25-d0a8-11ef-b9b3-5c5f67bf0a08', 'Test', 'One', 'test1@chicstyles.com', NULL, '$2y$10$QQwUYyMhJFd.YqYyu8mOeOvOpQOI.nhW5E7Zk20E8EvTelf66FZju', '1', NULL, '2025-01-12 05:44:56', '2025-01-12 05:44:56', NULL, NULL),
('bfc4fffa-d0b3-11ef-b9b3-5c5f67bf0a08', 'Comet', 'Xavier', 'cometxe@gmail.com', NULL, '$2y$10$WzOZteu0bVgdUggO6de8L.QgBdrLfd/VRmrzhsGL7UeGfCsbZRnQq', '1', NULL, '2025-01-12 07:05:58', '2025-01-12 10:57:01', 'be90d378820805a2e52df971812cdeec00ef13532cf8b97eb907b2ce68623cea', '2025-01-12 12:57:01');

--
-- Indexes for dumped tables
--

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
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`user_role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
