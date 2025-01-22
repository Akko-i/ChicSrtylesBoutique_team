-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2025 at 04:51 AM
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
-- Database: `chicstylesboutique`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_address`
--

CREATE TABLE `billing_address` (
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
-- Dumping data for table `billing_address`
--

INSERT INTO `billing_address` (`billing_id`, `user_id`, `first_name`, `last_name`, `company_name`, `phone`, `email`, `country`, `address_line1`, `address_line2`, `suburb`, `state`, `postcode`, `last_updated`) VALUES
('a3373ac8aacf212ed0fcca627082eef5', '2739fcba-d0b1-11ef-b9b3-5c5f67bf0a08', 'Test-33', 'Two-2', '', '+61499776622', 'test2@chicstyles.com', 'Australia', '28 Maria Asterdam St.,', '', 'Blacktown', 'NSW', '3202', '2025-01-17 01:25:04'),
('b1d8c8e3-d6b2-11ef-a076-acde48001122', 'aed4a610-d6b2-11ef-a076-acde48001122', 'Akiko', 'Ishijima', NULL, '+61 41234 5678', '20019026@students.koi.edu.au', 'Australia', 'Level 1/31 Market St', NULL, 'Sydney', 'NSW', '2000', '2025-01-20 09:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Dresses'),
(2, 'Accessories'),
(3, 'New Arrivals'),
(4, 'Latest Collection');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` char(36) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `status` enum('Pending','Processing','Completed','Cancelled') NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `shipping_address_id` char(36) NOT NULL,
  `billing_address_id` char(36) NOT NULL,
  `tracking_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `status`, `total_price`, `shipping_address_id`, `billing_address_id`, `tracking_number`) VALUES
(2, 'aed4a610-d6b2-11ef-a076-acde48001122', '2025-01-20 17:22:36', 'Completed', 300.00, 's1d8c8e4-d6b2-11ef-a076-acde48001122', 'b1d8c8e3-d6b2-11ef-a076-acde48001122', '12344');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `description`, `product_image`, `created_at`, `updated_at`) VALUES
(1, 'White cotton dress', 120.00, 'A breathable and stylish white cotton dress.', 'DR8.png', '2025-01-19 23:51:33', '2025-01-21 09:59:46'),
(2, 'Earth Tone Maxi Dress', 100.00, 'Elegant earth-toned maxi dress.', 'DR7.png', '2025-01-19 23:51:33', '2025-01-21 09:59:46'),
(3, 'Silky White dress', 80.00, 'Silky and smooth white dress for special occasions.', 'DR6.png', '2025-01-19 23:51:33', '2025-01-21 09:59:46'),
(4, 'Tropical flowy dress', 110.00, 'Perfect for summer, a tropical-themed flowy dress.', 'DR5.png', '2025-01-19 23:51:33', '2025-01-21 09:59:46'),
(5, 'Black mini dress', 80.00, 'A chic black mini dress for parties.', 'DR4.png', '2025-01-19 23:51:33', '2025-01-21 09:59:46'),
(6, 'Black slit dress', 100.00, 'A stunning black dress with a slit design.', 'DR3.png', '2025-01-19 23:51:33', '2025-01-21 09:59:46'),
(7, 'Feminine dots dress', 90.00, 'Playful and feminine polka dots dress.', 'DR2.png', '2025-01-19 23:51:33', '2025-01-21 09:59:46'),
(8, 'Navy long dress', 110.00, 'Sophisticated navy long dress.', 'DR1.png', '2025-01-19 23:51:33', '2025-01-21 09:59:46'),
(9, 'Double ring necklace', 120.00, 'A modern double ring necklace.', 'AC8.png', '2025-01-19 23:51:33', '2025-01-21 09:59:46'),
(10, 'Marble round earrings', 100.00, 'Stylish marble round earrings.', 'AC7.png', '2025-01-19 23:51:33', '2025-01-21 09:59:46'),
(11, 'Silver funk rings', 80.00, 'Trendy silver funk rings.', 'AC6.png', '2025-01-19 23:51:33', '2025-01-21 09:59:46'),
(12, 'Gold elegant anklet', 110.00, 'An elegant gold anklet for all occasions.', 'AC5.png', '2025-01-19 23:51:33', '2025-01-21 09:59:46'),
(13, 'Gold thin rings', 80.00, 'Minimalist and sleek gold thin rings.', 'AC4.png', '2025-01-19 23:51:33', '2025-01-21 09:59:46'),
(14, 'Silver ruby ring', 100.00, 'A silver ring with a beautiful ruby.', 'AC3.png', '2025-01-19 23:51:33', '2025-01-21 09:59:46'),
(15, 'Double thin necklace', 90.00, 'A layered double thin necklace.', 'AC2.png', '2025-01-19 23:51:33', '2025-01-21 09:59:46'),
(16, 'Beach vibes set', 110.00, 'Perfect for summer, a beach vibes jewelry set.', 'AC1.png', '2025-01-19 23:51:33', '2025-01-21 09:59:46'),
(17, 'test', 200.00, 'testtest', NULL, '2025-01-21 21:29:13', '2025-01-21 21:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `product_category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`product_category_id`, `product_id`, `category_id`) VALUES
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(9, 9, 2),
(10, 10, 2),
(11, 11, 2),
(12, 12, 2),
(13, 13, 2),
(14, 14, 2),
(15, 15, 2),
(16, 16, 2),
(18, 10, 3),
(19, 9, 3),
(29, 8, 1),
(35, 1, 1),
(36, 1, 3),
(37, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `product_size_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`product_size_id`, `product_id`, `size_id`, `stock`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 2),
(3, 1, 3, 2),
(4, 1, 4, 2),
(5, 2, 1, 2),
(6, 2, 2, 2),
(7, 2, 3, 2),
(8, 2, 4, 2),
(9, 3, 1, 3),
(10, 3, 2, 3),
(11, 3, 3, 3),
(12, 3, 4, 3),
(13, 4, 1, 3),
(14, 4, 2, 3),
(15, 4, 3, 3),
(16, 4, 4, 3),
(17, 5, 1, 5),
(18, 5, 2, 5),
(19, 5, 3, 5),
(20, 5, 4, 5),
(21, 6, 1, 2),
(22, 6, 2, 2),
(23, 6, 3, 2),
(24, 6, 4, 2),
(25, 7, 1, 4),
(26, 7, 2, 4),
(27, 7, 3, 4),
(28, 7, 4, 4),
(29, 8, 1, 1),
(30, 8, 2, 1),
(31, 8, 3, 1),
(32, 8, 4, 1),
(77, 17, 1, 0),
(78, 17, 2, 0),
(79, 17, 3, 0),
(80, 17, 4, 0);

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
('1', 'Member', '2025-01-11 18:34:30', '2025-01-11 18:34:30'),
('2', 'Admin', '2025-01-11 18:34:30', '2025-01-11 18:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `shipping_id` char(36) NOT NULL,
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
  `postcode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`shipping_id`, `user_id`, `first_name`, `last_name`, `company_name`, `phone`, `email`, `country`, `address_line1`, `address_line2`, `suburb`, `state`, `postcode`) VALUES
('g2d8c8e3-d6b2-11ef-a076-acde48001122', 'aed4a610-d6b2-11ef-a076-acde48001122', 'Akiko', 'Ishijima', NULL, '+61 41234 5678', '20019026@students.koi.edu.au', 'Australia', 'Level 1/31 Market St', NULL, 'Sydney', 'NSW', '2000'),
('s1d8c8e4-d6b2-11ef-a076-acde48001122', 'aed4a610-d6b2-11ef-a076-acde48001122', 'Akiko', 'Ishijima', NULL, '+61 41234 5678', '20019026@students.koi.edu.au', 'Australia', '15 Example Lane', NULL, 'Sydney', 'NSW', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `size_value` enum('S','M','L','XL') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size_value`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL');

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
('123d8b2d-d0df-11ef-9e3d-5c5f67bf0a08', 'Test', 'Three', 'test3@chicstyles.com', NULL, '$2y$10$MKJJO/N3vuClZ3j95TrFluT7GSRvwOV3tm6mg11mVieIXzFzXC6L2', '1', NULL, '2025-01-12 01:16:31', '2025-01-12 01:16:31', NULL, NULL),
('1fc181aa-d341-11ef-9e3d-5c5f67bf0a08', 'Test', 'Four', 'test4@chicstyles.com', NULL, '$2y$10$XDPBhFAirBB1CBWTff.om.MM02x7RrBsuhnHlbLw51H0kuNZkPv3K', '2', NULL, '2025-01-15 02:03:03', '2025-01-15 02:03:37', NULL, NULL),
('2739fcba-d0b1-11ef-b9b3-5c5f67bf0a08', 'Test', 'Sending', 'test2@chicstyles.com', '', '$2y$10$YsfETKMH2inM/rmC454rNuuw9o0KnxDjOv85aAjXaWoV4s852MG9K', '1', NULL, '2025-01-11 19:47:23', '2025-01-16 03:51:03', '5229bc9530dd8e14bb6506ee55882823e4790347ca1d5a1bb762af5925ac7976', '2025-01-12 09:04:39'),
('6e0fbc25-d0a8-11ef-b9b3-5c5f67bf0a08', 'Test', 'One', 'test1@chicstyles.com', NULL, '$2y$10$QQwUYyMhJFd.YqYyu8mOeOvOpQOI.nhW5E7Zk20E8EvTelf66FZju', '1', NULL, '2025-01-11 18:44:56', '2025-01-11 18:44:56', NULL, NULL),
('879d7fd0-d3e9-11ef-bead-5c5f67bf0a08', 'Test', 'Five-555', 'test5@chicstyles.com', '', '$2y$10$stejKY6vySfpDOa.zt2Vu.zGOd4SnZrStzo1ynL4fBtf0goP4k9Dq', '1', NULL, '2025-01-15 22:09:02', '2025-01-15 22:10:51', NULL, NULL),
('aed4a610-d6b2-11ef-a076-acde48001122', 'Akiko', 'Ishijima', '20019026@students.koi.edu.au', NULL, '$2y$10$Rw6b8t754U.H04X1LBygfOAumWx.4QatHpXgv.tNZxupGkzsnaggO', '1', NULL, '2025-01-19 22:13:59', '2025-01-19 22:13:59', NULL, NULL),
('bfc4fffa-d0b3-11ef-b9b3-5c5f67bf0a08', 'Comet', 'Xavier', 'cometxe@gmail.com', NULL, '$2y$10$WzOZteu0bVgdUggO6de8L.QgBdrLfd/VRmrzhsGL7UeGfCsbZRnQq', '1', NULL, '2025-01-11 20:05:58', '2025-01-11 23:57:01', 'be90d378820805a2e52df971812cdeec00ef13532cf8b97eb907b2ce68623cea', '2025-01-12 12:57:01'),
('d0cca8e2-d7ae-11ef-a094-acde48001122', 'Admin', 'Akiko', 'akikoishijima10@gmail.com', NULL, '$2y$10$46.eZM6PfofPFW87DwBC4.xh9SbDjGE7tNXLAs4Sii8pPRRrKO9KW', '2', NULL, '2025-01-21 04:18:49', '2025-01-21 04:20:26', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_address`
--
ALTER TABLE `billing_address`
  ADD PRIMARY KEY (`billing_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `shipping_address_id` (`shipping_address_id`),
  ADD KEY `billing_address_id` (`billing_address_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_category_id`),
  ADD KEY `idx_product_id` (`product_id`),
  ADD KEY `idx_category_id` (`category_id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`product_size_id`),
  ADD UNIQUE KEY `unique_product_size` (`product_id`,`size_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`shipping_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `user_role_id` (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `product_size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing_address`
--
ALTER TABLE `billing_address`
  ADD CONSTRAINT `billing_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`shipping_address_id`) REFERENCES `shipping_address` (`shipping_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`billing_address_id`) REFERENCES `billing_address` (`billing_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_size_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`) ON DELETE CASCADE;

--
-- Constraints for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD CONSTRAINT `shipping_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
