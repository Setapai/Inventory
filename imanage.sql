-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2021 at 05:21 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imanage`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brands` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `addedBy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brands`, `addedBy`) VALUES
(1, 'TTGR', 'Admin Admin'),
(3, 'KITACO', 'Admin Admin'),
(4, 'TRITECH', 'Admin Admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `addedBy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `addedBy`) VALUES
(1, 'RUSI 125', 'Admin Admin'),
(2, 'XRM 110 ', 'Admin Admin'),
(4, 'XRM 125', 'Admin Admin'),
(5, 'RUSI', 'Admin Admin');

-- --------------------------------------------------------

--
-- Table structure for table `change`
--

CREATE TABLE `change` (
  `id` int(11) NOT NULL,
  `prodID` int(11) NOT NULL,
  `wprice` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `dateTime` datetime NOT NULL,
  `order_recID` int(11) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `loan_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `def_products`
--

CREATE TABLE `def_products` (
  `id` int(11) NOT NULL,
  `prodID` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dateTime` datetime NOT NULL,
  `acc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `updateAcc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastUpdate` datetime DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `discountedTotal` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `payments` int(11) NOT NULL,
  `dateTime` datetime NOT NULL,
  `order_recID` int(11) NOT NULL,
  `addedBy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `discountedTotal`, `total`, `payments`, `dateTime`, `order_recID`, `addedBy`) VALUES
(3, 2020, 2020, 150, '2021-05-14 15:25:55', 4, 'Admin Admin'),
(4, 2020, 2020, 1870, '2021-05-14 15:29:54', 4, 'Admin Admin');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `prodID` int(11) NOT NULL,
  `wprice` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `dateTime` datetime NOT NULL,
  `order_recID` int(11) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `loan_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `prodID`, `wprice`, `price`, `qty`, `dateTime`, `order_recID`, `status`, `loan_status`) VALUES
(1, 1, 130, 180, 1, '2021-05-14 15:18:24', 1, 'Retail', 'Paid'),
(2, 1, 130, 180, 3, '2021-05-14 15:19:14', 2, 'Retail', 'Paid'),
(3, 3, 400, 450, 4, '2021-05-14 15:19:14', 2, 'Retail', 'Paid'),
(5, 4, 200, 280, 2, '2021-05-14 15:25:29', 3, 'Retail', 'Paid'),
(6, 5, 150, 200, 1, '2021-05-14 15:25:29', 3, 'Retail', 'Paid'),
(8, 1, 130, 180, 5, '2021-05-14 15:25:55', 4, 'Retail', 'Inpass'),
(9, 4, 200, 280, 4, '2021-05-14 15:25:55', 4, 'Retail', 'Inpass');

-- --------------------------------------------------------

--
-- Table structure for table `orders_dummy`
--

CREATE TABLE `orders_dummy` (
  `id` int(11) NOT NULL,
  `prodID` int(11) NOT NULL,
  `wprice` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `dateTime` datetime NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_records`
--

CREATE TABLE `order_records` (
  `id` int(11) NOT NULL,
  `receipt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pnum` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL,
  `discount` int(11) NOT NULL,
  `sold_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `loan_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `oldLoan_status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `inpassDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_records`
--

INSERT INTO `order_records` (`id`, `receipt`, `name`, `pnum`, `date`, `discount`, `sold_by`, `loan_status`, `oldLoan_status`, `inpassDate`) VALUES
(1, '609e2440cb7a7', 'Amor', '09130910239', '2021-05-14 15:18:24', 0, 'Admin Admin', 'Paid', 'Refunded', '2021-05-14 15:18:24'),
(2, '609e24727938c', 'Raphael', '09043290492', '2022-07-14 00:00:00', 50, 'Admin Admin', 'Paid', 'Refunded', '2021-05-14 15:19:14'),
(3, '609e25e9856af', 'Gebhen', '09304920490', '2021-06-09 15:25:29', 25, 'Admin Admin', 'Paid', 'Refunded', '2021-05-14 15:25:29'),
(4, '609e26030d64e', 'Blaze', '02349029340', '2022-06-15 00:00:00', 0, 'Admin Admin', 'Inpass', 'Refunded', '2021-05-14 15:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `wprice` int(11) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dateTime` datetime NOT NULL,
  `addedBy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `updatedBy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastUpdate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product`, `brand`, `category`, `qty`, `price`, `wprice`, `description`, `image`, `dateTime`, `addedBy`, `updatedBy`, `lastUpdate`) VALUES
(1, 'SWITCH IGNITON ', 'TTGR', 'RUSI 125', 20, 180, 130, '', '', '2021-05-13 02:46:41', 'Admin Admin', 'Admin Admin', '2021-05-13 19:39:33'),
(2, 'SWITCH IGNITON ', 'TTGR', 'XRM 110 ', 11, 280, 230, '', '', '2021-05-13 02:46:41', 'Admin Admin', 'Admin Admin', '2021-05-13 02:46:50'),
(3, 'SWITCH IGNITON ', 'KITACO', 'XRM 110', 44, 450, 400, '', '', '2021-05-13 02:46:41', 'Admin Admin', 'pedro tarantado', '2021-05-14 02:44:50'),
(4, 'SWITCH IGNITON ', 'TRITECH', 'XRM 125', 3, 280, 200, '', '', '2021-05-13 02:46:41', 'Admin Admin', 'Admin Admin', '2021-05-13 02:46:47'),
(5, 'SWITCH  HANDLE ', 'TTGR', 'RUSI', 27, 200, 150, '', '', '2021-05-13 02:46:41', 'Admin Admin', 'Admin Admin', '2021-05-13 02:46:58'),
(6, 'NewProducts', 'TRITECH', 'RUSI', 18, 55, 50, 'hi', '', '2021-05-13 02:47:50', 'Admin Admin', 'Admin Admin', '2021-05-13 02:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `id` int(11) NOT NULL,
  `oID` int(11) NOT NULL,
  `prodID` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `order_recID` int(11) NOT NULL,
  `dateTime` datetime NOT NULL,
  `addedBy` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pWord` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pNum` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uName`, `pWord`, `email`, `fName`, `lName`, `pNum`, `gender`, `status`, `dateTime`) VALUES
(114, 'admin', 'admin', 'admin@admin.com', 'Admin', 'Admin', 'Admin', 'Admin', 'Admin', '2021-05-09 09:08:42'),
(128, 'staff', 'staff', 'newStaff@gmail.com', 'pedro', 'tarantado', '09661965783', 'male', 'Employee', '2021-05-14 02:29:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands` (`brands`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `change`
--
ALTER TABLE `change`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `def_products`
--
ALTER TABLE `def_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_dummy`
--
ALTER TABLE `orders_dummy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_records`
--
ALTER TABLE `order_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uName` (`uName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `change`
--
ALTER TABLE `change`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `def_products`
--
ALTER TABLE `def_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders_dummy`
--
ALTER TABLE `orders_dummy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_records`
--
ALTER TABLE `order_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
