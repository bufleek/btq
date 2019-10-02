-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2019 at 05:20 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btq`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `itemId` int(11) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `itemSize` varchar(25) NOT NULL,
  `itemCode` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `priceTag` int(25) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`itemId`, `itemName`, `itemSize`, `itemCode`, `description`, `priceTag`, `image1`, `customer_id`, `customer_name`, `customer_email`, `customer_number`) VALUES
(8, '', '', '', '', 0, '', '1569780203.6673', 'jericho', 'brunookiprop@gmail.com', '0798690957'),
(9, 'gdf', '0', 'hn', 'tent', 454, '80832_img_273871_46956_Azmogen_Touch.jpg', '1569778978.9342', 'jericho', 'brunookiprop@gmail.com', '0798690957'),
(9, 'gdf', '0', 'hn', 'tent', 454, '80832_img_273871_46956_Azmogen_Touch.jpg', '1569818792.5273', 'domnic', 'brunookiprop@gmail.com', '7890'),
(9, 'gdf', '0', 'hn', 'tent', 454, '80832_img_273871_46956_Azmogen_Touch.jpg', '1569823279.957', 'tyui', 'hghgujk', '6789'),
(6, 'okwiri', '33', 'eeef', 'dvd', 344, 'sublime logo.png', '1569841330.5767', 'bruno', 'brunookiprop@gmail.com', '0798690957'),
(6, 'okwiri', '33', 'eeef', 'dvd', 344, 'sublime logo.png', '1569866339.713', 'bruno', 'brunookiprop@gmail.com', '0798690957'),
(9, 'gdf', '0', 'hn', 'tent', 454, '80832_img_273871_46956_Azmogen_Touch.jpg', '1569871347.532', 'brayo', 'brunookiprop@gmail.com', '0798690957'),
(9, 'gdf', '0', 'hn', 'tent', 454, '80832_img_273871_46956_Azmogen_Touch.jpg', '1569872047.9039', 'brayo', 'brunookiprop@gmail.com', '0798690957');

-- --------------------------------------------------------

--
-- Table structure for table `cloths`
--

CREATE TABLE `cloths` (
  `itemId` int(11) NOT NULL,
  `priceTag` varchar(255) NOT NULL,
  `itemCode` varchar(255) NOT NULL,
  `itemSize` int(11) NOT NULL,
  `description` text,
  `image1` varchar(255) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `image2` varchar(255) DEFAULT '0',
  `image3` varchar(255) DEFAULT '0',
  `image4` varchar(255) DEFAULT '0',
  `image5` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cloths`
--

INSERT INTO `cloths` (`itemId`, `priceTag`, `itemCode`, `itemSize`, `description`, `image1`, `itemName`, `image2`, `image3`, `image4`, `image5`) VALUES
(6, '344', 'eeef', 33, 'dvd', 'sublime logo.png', 'okwiri', '0', '0', '0', '0'),
(7, 'y', 'yh', 0, 't7gg', 'love.png', 'brunos', '0', '0', '0', '0'),
(9, '454', 'hn', 0, 'tent', '80832_img_273871_46956_Azmogen_Touch.jpg', 'gdf', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `perf`
--

CREATE TABLE `perf` (
  `item-id` int(11) NOT NULL,
  `item-name` varchar(255) NOT NULL,
  `item-code` varchar(255) NOT NULL,
  `desription` text NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL DEFAULT 'none',
  `image3` varchar(255) NOT NULL DEFAULT 'none',
  `image4` varchar(255) NOT NULL DEFAULT 'none',
  `image5` varchar(255) NOT NULL DEFAULT 'none',
  `other-info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shoes`
--

CREATE TABLE `shoes` (
  `item-id` int(11) NOT NULL,
  `item-name` varchar(255) NOT NULL,
  `price-tag` varchar(255) NOT NULL,
  `item-code` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL DEFAULT 'none',
  `image3` varchar(255) NOT NULL DEFAULT 'none',
  `image4` varchar(255) NOT NULL DEFAULT 'none',
  `image5` varchar(255) NOT NULL DEFAULT 'none',
  `other-info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cloths`
--
ALTER TABLE `cloths`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `perf`
--
ALTER TABLE `perf`
  ADD PRIMARY KEY (`item-id`),
  ADD UNIQUE KEY `item-code` (`item-code`);

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`item-id`),
  ADD UNIQUE KEY `item-code` (`item-code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cloths`
--
ALTER TABLE `cloths`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `perf`
--
ALTER TABLE `perf`
  MODIFY `item-id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
  MODIFY `item-id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
