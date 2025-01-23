-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 23, 2025 at 11:42 AM
-- Server version: 9.1.0
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ChicStylesBoutique`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_address`
--

CREATE TABLE `billing_address` (
  `billing_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `address_line1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address_line2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `suburb` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `postcode` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `last_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `billing_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `address_line1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address_line2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `suburb` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `postcode` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `last_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `CartItems`
--

CREATE TABLE `CartItems` (
  `UserID` int NOT NULL,
  `ProductID` int NOT NULL,
  `ProductAmount` int NOT NULL,
  `ProductSize` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `CategoryID` int NOT NULL,
  `CategoryName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`CategoryID`, `CategoryName`) VALUES
(2, 'Accessories'),
(3, 'New Arrivals'),
(4, 'Dresses'),
(5, 'Latest Collection');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `order_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Pending','Processing','Completed','Cancelled') COLLATE utf8mb4_general_ci NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `shipping_address_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `billing_address_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `tracking_number` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ProductCategories`
--

CREATE TABLE `ProductCategories` (
  `ProductID` int NOT NULL,
  `CategoryID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ProductCategories`
--

INSERT INTO `ProductCategories` (`ProductID`, `CategoryID`) VALUES
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(2, 3),
(3, 3),
(5, 3),
(8, 3),
(9, 3),
(12, 3),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(3, 5),
(6, 5),
(8, 5),
(11, 5),
(12, 5),
(15, 5),
(16, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `ProductID` int NOT NULL,
  `ProductName` varchar(30) NOT NULL,
  `ProductPrice` float NOT NULL,
  `ProductImg` varchar(200) NOT NULL,
  `ProductImgLarge` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ProductDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ProductStock` int NOT NULL DEFAULT '0',
  `ProductDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`ProductID`, `ProductName`, `ProductPrice`, `ProductImg`, `ProductImgLarge`, `ProductDate`, `ProductStock`, `ProductDescription`) VALUES
(1, 'White cotton dress', 120, 'DR8.png', 'DR8_large.png', '2025-01-23 11:07:36', 1, 'A breathable and stylish white cotton dress.'),
(2, 'Earth Tone Maxi Dress', 100, 'DR7.png', 'DR7_large.png', '2025-01-23 11:07:36', 0, 'Elegant earth-toned maxi dress.'),
(3, 'Silky White dress', 80, 'DR6.png', 'DR6_large.png', '2025-01-23 11:07:36', 0, 'Silky and smooth white dress for special occasions.'),
(4, 'Tropical flowy dress', 110, 'DR5.png', 'DR5_large.png', '2025-01-23 11:07:36', 0, 'Perfect for summer, a tropical-themed flowy dress.'),
(5, 'Black mini dress', 80, 'DR4.png', 'DR4_large.png', '2025-01-23 11:07:36', 0, 'A chic black mini dress for parties.'),
(6, 'Black slit dress', 100, 'DR3.png', 'DR3_large.png', '2025-01-23 11:07:36', 0, 'A stunning black dress with a slit design.'),
(7, 'Feminine dots dress', 90, 'DR2.png', 'DR2_large.png', '2025-01-23 11:07:36', 0, 'Playful and feminine polka dots dress.'),
(8, 'Navy long dress', 110, 'DR1.png', 'DR1_large.png', '2025-01-23 11:07:36', 0, 'Sophisticated navy long dress.'),
(9, 'Double ring necklace', 120, 'AC8.png', 'AC8_large.png', '2025-01-23 11:07:36', 0, 'A modern double ring necklace.'),
(10, 'Marble round earrings', 100, 'AC7.png', 'AC7_large.png', '2025-01-23 11:07:36', 0, 'Stylish marble round earrings.'),
(11, 'Silver funk rings', 80, 'AC6.png', 'AC6_large.png', '2025-01-23 11:07:36', 0, 'Trendy silver funk rings.'),
(12, 'Gold elegant anklet', 110, 'AC5.png', 'AC5_large.png', '2025-01-23 11:07:36', 0, 'An elegant gold anklet for all occasions.'),
(13, 'Gold thin rings', 80, 'AC4.png', 'AC4_large.png', '2025-01-23 11:07:36', 0, 'Minimalist and sleek gold thin rings.'),
(14, 'Silver ruby ring', 100, 'AC3.png', 'AC3_large.png', '2025-01-23 11:07:36', 0, 'A silver ring with a beautiful ruby.'),
(15, 'Double thin necklace', 90, 'AC2.png', 'AC2_large.png', '2025-01-23 11:07:36', 0, 'A layered double thin necklace.'),
(16, 'Beach vibes set', 110, 'AC1.png', 'AC1_large.png', '2025-01-23 11:07:36', 0, 'Perfect for summer, a beach vibes jewelry set.');

-- --------------------------------------------------------

--
-- Table structure for table `ProductSizes`
--

CREATE TABLE `ProductSizes` (
  `ProductID` int NOT NULL,
  `SizeID` int NOT NULL,
  `Stock` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ProductSizes`
--

INSERT INTO `ProductSizes` (`ProductID`, `SizeID`, `Stock`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(2, 1, 0),
(2, 2, 0),
(2, 3, 0),
(2, 4, 0),
(3, 1, 0),
(3, 2, 0),
(3, 3, 0),
(3, 4, 0),
(4, 1, 0),
(4, 2, 0),
(4, 3, 0),
(4, 4, 0),
(5, 1, 0),
(5, 2, 0),
(5, 3, 0),
(5, 4, 0),
(6, 1, 0),
(6, 2, 0),
(6, 3, 0),
(6, 4, 0),
(7, 1, 0),
(7, 2, 0),
(7, 3, 0),
(7, 4, 0),
(8, 1, 0),
(8, 2, 0),
(8, 3, 0),
(8, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `shipping_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `address_line1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address_line2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `suburb` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `postcode` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Sizes`
--

CREATE TABLE `Sizes` (
  `SizeID` int NOT NULL,
  `SizeName` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Sizes`
--

INSERT INTO `Sizes` (`SizeID`, `SizeName`) VALUES
(1, 'Small'),
(2, 'Medium'),
(3, 'Large'),
(4, 'X-Large'),
(5, 'NONE');

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE `USER` (
  `user_id` int NOT NULL,
  `user_first_name` varchar(30) NOT NULL,
  `user_last_name` varchar(30) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '',
  `user_role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`user_id`, `user_first_name`, `user_last_name`, `user_password`, `user_email`, `user_phone`, `user_role_id`) VALUES
(6, 'Yuka', 'T', '$2y$10$AcuLL4zm0e9mHvcFvYb4/eHWzWMY.4iInyxmqoFssbISIESViAmAm', 'yuka@y.com', '', 2),
(7, 'P', 'G', '$2y$10$b3i/ZD3.em7/7HgkAKXrkugRRqb7WGddDsfLSUXjUxfne0oyNPEka', 'pg@p.com', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CartItems`
--
ALTER TABLE `CartItems`
  ADD PRIMARY KEY (`UserID`,`ProductID`,`ProductSize`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProductSize` (`ProductSize`);

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `ProductCategories`
--
ALTER TABLE `ProductCategories`
  ADD PRIMARY KEY (`ProductID`,`CategoryID`),
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `ProductSizes`
--
ALTER TABLE `ProductSizes`
  ADD PRIMARY KEY (`ProductID`,`SizeID`),
  ADD KEY `ProductID` (`ProductID`,`SizeID`),
  ADD KEY `SizeID` (`SizeID`);

--
-- Indexes for table `Sizes`
--
ALTER TABLE `Sizes`
  ADD PRIMARY KEY (`SizeID`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `CategoryID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `ProductID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `Sizes`
--
ALTER TABLE `Sizes`
  MODIFY `SizeID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `USER`
--
ALTER TABLE `USER`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CartItems`
--
ALTER TABLE `CartItems`
  ADD CONSTRAINT `cartitems_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `Products` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cartitems_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `USER` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cartitems_ibfk_3` FOREIGN KEY (`ProductSize`) REFERENCES `Sizes` (`SizeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ProductCategories`
--
ALTER TABLE `ProductCategories`
  ADD CONSTRAINT `productcategories_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `Categories` (`CategoryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productcategories_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `Products` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ProductSizes`
--
ALTER TABLE `ProductSizes`
  ADD CONSTRAINT `productsizes_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `Products` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productsizes_ibfk_2` FOREIGN KEY (`SizeID`) REFERENCES `Sizes` (`SizeID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
