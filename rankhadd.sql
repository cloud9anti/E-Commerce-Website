-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 18, 2019 at 06:59 AM
-- Server version: 5.6.34
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rankhadd`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Product_ID` int(11) NOT NULL,
  `Vendor_ID` int(11) NOT NULL,
  `Order_ID` int(11) NOT NULL,
  `Booking_ID` varchar(16) NOT NULL,
  `Shipper_ID` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sku` int(255) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `image` varchar(50) NOT NULL,
  `datecreation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Product_ID`, `Vendor_ID`, `Order_ID`, `Booking_ID`, `Shipper_ID`, `status`, `username`, `name`, `sku`, `price`, `image`, `datecreation`) VALUES
(1, 0, 35, '', 0, '1', 'myuser2', 'Coffee', 1, '0.00', 'images/coffee.png', '2019-09-30'),
(4, 0, 36, '', 0, '1', 'myuser2', 'Rice', 1, '0.00', 'images/rice.jpg', '2019-09-30'),
(1, 0, 37, '', 0, '1', 'myuser2', 'Coffee', 1, '0.00', 'images/coffee.png', '2019-09-30'),
(2, 0, 38, '', 0, '1', 'myuser2', 'Paper', 3, '2.00', 'images/paper.jpg', '2019-09-30'),
(3, 0, 39, '', 0, '1', 'myuser2', 'Chocolate Donut', 4, '4.00', 'images/donut.jpg', '2019-09-30'),
(2, 0, 40, '', 0, '1', 'myuser', 'Paper', 1, '2.00', 'images/paper.jpg', '2019-10-04'),
(3, 0, 41, '', 0, '1', 'myuser', 'Chocolate Donut', 2, '2.00', 'images/donut.jpg', '2019-10-04'),
(2, 0, 42, '', 0, '1', 'myuser', 'Paper', 1, '2.00', 'images/paper.jpg', '2019-10-16'),
(2, 0, 43, '', 0, '1', 'myuser', 'Paper', 1, '2.00', 'images/paper.jpg', '2019-10-16'),
(2, 0, 44, '', 0, '1', 'myuser', 'Paper', 1, '2.00', 'images/paper.jpg', '2019-10-16'),
(1, 0, 45, '', 0, '1', 'myuser', 'Coffee', 1, '3.00', 'images/coffee.png', '2019-10-16'),
(2, 0, 46, '', 0, '1', 'myuser', 'Paper', 1, '2.00', 'images/paper.jpg', '2019-10-16'),
(2, 0, 47, '', 0, '1', 'myuser', 'Paper', 1, '2.00', 'images/paper.jpg', '2019-10-16'),
(1, 0, 48, '', 0, '1', 'myuser', 'Coffee', 1, '3.00', 'images/coffee.png', '2019-10-16'),
(3, 0, 49, '', 0, '1', 'myuser', 'Chocolate Donut', 1, '1.00', 'images/donut.jpg', '2019-10-16'),
(3, 0, 50, '', 0, '1', 'myuser', 'Chocolate Donut', 1, '1.00', 'images/donut.jpg', '2019-10-16'),
(3, 0, 51, '', 0, '1', 'myuser', 'Chocolate Donut', 1, '1.00', 'images/donut.jpg', '2019-10-16'),
(2, 4, 52, '', 0, '1', 'myuser', 'Paper', 1, '2.00', 'images/paper.jpg', '2019-10-16'),
(2, 4, 53, '', 0, '1', 'myuser', 'Paper', 1, '2.00', 'images/paper.jpg', '2019-10-16'),
(2, 4, 54, 'BOOK', 0, '1', 'myuser', 'Paper', 1, '2.00', 'images/paper.jpg', '2019-10-17'),
(2, 4, 55, '0', 0, '1', 'myuser', 'Paper', 1, '2.00', 'images/paper.jpg', '2019-10-17'),
(2, 4, 56, '0', 0, '1', 'myuser', 'Paper', 1, '2.00', 'images/paper.jpg', '2019-10-17'),
(2, 4, 57, 'BOOKa', 0, '1', 'myuser', 'Paper', 1, '2.00', 'images/paper.jpg', '2019-10-17'),
(3, 3, 58, 'BOOK2019-10-17', 0, '1', 'myuser', 'Chocolate Donut', 1, '1.00', 'images/donut.jpg', '2019-10-17'),
(4, 4, 59, 'BOOK20191017', 0, '1', 'myuser', 'Rice', 1, '2.00', 'images/rice.jpg', '2019-10-17'),
(2, 4, 60, 'BOOK20191710', 0, '1', 'myuser', 'Paper', 1, '2.00', 'images/paper.jpg', '2019-10-17'),
(2, 4, 61, 'BOOK201917105', 0, '1', 'myuser', 'Paper', 1, '2.00', 'images/paper.jpg', '2019-10-17'),
(2, 4, 62, 'BOOK201917105', 0, '1', 'myuser', 'Paper', 1, '2.00', 'images/paper.jpg', '2019-10-17'),
(3, 3, 63, 'BOOK201917101', 0, '1', 'myuser', 'Chocolate Donut', 1, '1.00', 'images/donut.jpg', '2019-10-17'),
(1, 3, 64, 'BOOK201917101', 0, '1', 'myuser', 'Coffee', 1, '3.00', 'images/coffee.png', '2019-10-17'),
(1, 3, 65, 'BOOK201917101', 0, '1', 'myuser', 'Coffee', 1, '3.00', 'images/coffee.png', '2019-10-17'),
(2, 4, 66, 'BOOK201917101', 0, '1', 'myuser', 'Paper', 1, '2.00', 'images/paper.jpg', '2019-10-17'),
(1, 3, 67, 'BOOK201917101', 0, '1', 'myuser', 'Coffee', 1, '3.00', 'images/coffee.png', '2019-10-17'),
(1, 3, 68, 'BOOK201917101', 0, '1', 'myuser', 'Coffee', 1, '3.00', 'images/coffee.png', '2019-10-17'),
(3, 3, 69, 'BOOK201917101', 0, '1', 'myuser', 'Chocolate Donut', 1, '1.00', 'images/donut.jpg', '2019-10-17'),
(3, 3, 70, 'BOOK201917101', 0, '1', 'myuser', 'Chocolate Donut', 1, '1.00', 'images/donut.jpg', '2019-10-17'),
(2, 4, 71, 'BOOK201917101', 0, '1', 'myuser', 'Paper', 1, '2.00', 'images/paper.jpg', '2019-10-17'),
(1, 3, 72, 'BOOK201917101', 0, '1', 'myuser', 'Coffee', 1, '3.00', 'images/coffee.png', '2019-10-17'),
(1, 3, 73, 'BOOK201917101', 0, '1', 'myuser', 'Coffee', 1, '3.00', 'images/coffee.png', '2019-10-17'),
(1, 3, 74, 'BOOK201917101', 0, '1', 'myuser', 'Coffee', 1, '3.00', 'images/coffee.png', '2019-10-17'),
(1, 3, 75, 'BOOK201917101', 0, '1', 'myuser', 'Coffee', 1, '3.00', 'images/coffee.png', '2019-10-17'),
(2, 4, 76, 'BOOK201917101', 0, '1', 'myuser', 'Paper', 1, '2.00', 'images/paper.jpg', '2019-10-17'),
(1, 3, 77, 'BOOK201917101', 0, '1', 'myuser', 'Coffee', 1, '3.00', 'images/coffee.png', '2019-10-17'),
(2, 4, 78, 'BOOK201917101', 0, '1', 'myuser', 'Paper', 1, '2.00', 'images/paper.jpg', '2019-10-17'),
(2, 4, 79, 'BOOK201917101', 0, '1', 'myuser', 'Paper', 1, '2.00', 'images/paper.jpg', '2019-10-17'),
(1, 3, 80, 'BOOK201918101', 0, '1', 'myuser', 'Coffee', 2, '6.00', 'images/coffee.png', '2019-10-18'),
(13, 4, 81, 'BOOK201918101', 0, '1', 'myuser', 'Coffee', 1, '5.00', 'images/default.png', '2019-10-18'),
(5, 0, 82, 'BOOK201918101', 0, '1', 'myuser', 'Coffee', 1, '70.00', 'images/default.png', '2019-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `groups` varchar(255) NOT NULL,
  `community` varchar(255) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `name`, `groups`, `community`, `venue`, `active`, `industry`, `category`, `subcategory`, `email`) VALUES
(3, 'Dunkin Donuts', 'group 1', 'Alexander', 'My street', 'Inactive', '', '', '', 'dunkindonuts@gmail.com\r\n'),
(4, '7/11', 'group 2', 'Alexander', 'My street', 'Active', '', '', '', 'seveneleven@gmail.com'),
(5, 'McDonalds', 'group 1', 'Alexander', 'My street', 'Active', '', '', '', 'mcdonalds@gmail.com'),
(8, 'Krispy Kreme', 'group 2', 'Alexander', 'My street', 'Active', '', '', '', 'krispykreme@gmail.com'),
(10, 'Pizza Hut', 'group 4', 'Alexander', 'Main road', 'Active', '', '', '', 'pizzahut@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_ID` int(255) NOT NULL,
  `Vendor_ID` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `sku` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_ID`, `Vendor_ID`, `name`, `details`, `sku`, `price`, `image`) VALUES
(1, 3, 'Coffee', 'A cup of coffee', 1, 3, 'images/coffee.png'),
(2, 4, 'Paper', 'A stack of papers', 12, 2, 'images/paper.jpg'),
(3, 3, 'Chocolate Donut', 'A single chocolate donut with sprinkles', 1, 1, 'images/donut.jpg'),
(4, 4, 'Rice', '500 grams of white rice', 1, 2, 'images/rice.jpg'),
(5, 0, 'Coffee', 'a cup of hot coffee', 6, 70, 'images/default.png'),
(13, 4, 'Coffee', 'a nice, hot cup of 7/11 coffee', 5, 5, 'images/default.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `admin`) VALUES
(1, 'myuser', '$2y$10$Sh8FCZbKEvT.KGlpf8hzyuEyT/js3qT8n8x3WAeW3JHdlKgA3whOK', '2019-09-20 09:33:26', 'no'),
(2, 'newuser', '$2y$10$EZoIhwvTGHqVA/NqLw7lCOMEW8Kf1x6M9u/IL2Gl3ZDaSWgnttopK', '2019-09-20 10:14:11', 'no'),
(3, '123123', '$2y$10$VQzrU/BeF1ngVSbRzMAFE.7htJOt2C6K6ur5IG2TU23Ax416ABtvu', '2019-09-20 10:16:37', 'no'),
(6, 'asdasd', 'asdasd', '2019-10-05 11:20:42', ''),
(8, 'admin', '$2y$10$0Qh.tnAfcRq4THd7zySNL.HypTQcrxtXYHtndOJopAqUAfyUwgDJu', '2019-10-18 13:11:10', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
