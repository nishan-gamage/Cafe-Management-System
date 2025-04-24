-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2024 at 07:36 PM
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
-- Database: `harvestmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE `accountant` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `passowrd` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `contact` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `name`, `password`) VALUES
(2, 'Rimshad', 'Rimshad', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `created-at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created-at`) VALUES
(56, 4, 6, 1, '2023-12-30 13:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) NOT NULL,
  `meta_tittle` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keyword` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_tittle`, `meta_description`, `meta_keyword`, `created_at`) VALUES
(2, 'T-shirts', 't-shirts', 't-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirts', 0, 1, '1702238407.jpg', '', 't-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirts', 't-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirts', '2023-12-10 20:00:07'),
(7, 'Trouser', 'trouser', 'trousertrousertrousertrousertrousertrousertrousertrousertrousertrouser', 0, 1, '1702241768.jpg', '', 'trousertrousertrousertrousertrousertrousertrousertrousertrousertrouser', 'trousertrousertrousertrousertrousertrousertrousertrousertrousertrouser', '2023-12-09 23:14:23'),
(8, 'Shirts', 'shirts', 'Shirts', 0, 1, '1702294683.jpg', '', 'Shirts Shirts Shirts Shirts Shirts Shirts Shirts Shirts Shirts', 'ShirtsShirtsShirtsShirtsShirtsShirtsShirtsShirtsShirtsShirts', '2023-12-09 23:14:23'),
(9, 'Frock', 'frock', 'frockfrockfrockfrockfrockfrockfrockfrockfrockfrockfrockfrockfrockfrockfrock', 0, 1, '1702374718.webp', '', 'frockfrockfrockfrockfrockfrockfrockfrockfrockfrockfrockfrockfrock', 'frockfrockfrockfrockfrockfrockfrockfrockfrockfrockfrockfrock', '2023-12-12 09:51:58'),
(10, 'Shorts', 'short', 'Shorts Shorts Shorts Shorts', 0, 1, '1702879210.jpg', 'Shorts', 'Shorts Shorts Shorts Shorts', 'Shorts Shorts Shorts Shorts', '2023-12-18 06:00:10'),
(11, 'Saree', 'saree', 'Saree Saree Saree Saree Saree', 0, 1, '1702879400.jpg', 'Saree', 'Saree Saree Saree Saree Saree', 'Saree Saree Saree Saree Saree', '2023-12-18 06:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `clerk`
--

CREATE TABLE `clerk` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `contact` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `contact` varchar(191) NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `postal_code` int(20) NOT NULL,
  `address` mediumtext NOT NULL,
  `price` int(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comment` varchar(255) DEFAULT NULL,
  `Date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `contact`, `payment_mode`, `payment_id`, `postal_code`, `address`, `price`, `status`, `comment`, `Date`) VALUES
(2, 4, 'Rimshad', 'rimshad581@gmail.com', '765432', 'COD', '', 4532, 'address', 9700, 0, NULL, '2023-12-26 00:00:00'),
(3, 5, 'Ahamed', 'ahamed@gmail.com', '847540538267', 'COD', '', 475529, 'Address', 5800, 0, NULL, '2023-12-27 00:00:00'),
(4, 5, 'Rimshad', 'rimshad581@gmail.com', '873657', 'COD', '', 345, 'sdgdygd', 1300, 0, NULL, '2023-12-29 00:00:00'),
(5, 5, 'Rimshad', 'rimshad581@gmail.com', '456789', 'COD', '', 456, 'address', 1300, 0, NULL, '2023-10-10 00:00:00'),
(6, 4, 'Rimshad', 'ahamed@gmail.com', '652364', 'COD', '', 72364, 'Address', 25300, 0, NULL, '2023-12-28 00:00:00'),
(7, 4, 'Rimshad', 'rimshad581@gmail.com', '3265346', 'COD', '', 453, 'Address\r\n', 1300, 0, NULL, '2023-12-30 14:56:21'),
(8, 4, 'Rimshad', 'rimshad581@gmail.com', '0767878581', 'COD', '', 81000, 'Muddiyansege waththa thalalla gandara', 1300, 0, NULL, '2023-12-30 19:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(20) NOT NULL,
  `prod_id` int(191) NOT NULL,
  `qty` int(191) NOT NULL,
  `price` int(191) NOT NULL,
  `created-at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created-at`) VALUES
(4, 2, 11, 1, 2500, '2023-12-27 20:47:51'),
(5, 2, 8, 1, 2000, '2023-12-27 20:47:51'),
(6, 2, 6, 4, 1300, '2023-12-27 20:47:51'),
(7, 3, 11, 1, 2500, '2023-12-28 07:26:47'),
(8, 3, 8, 1, 2000, '2023-12-28 07:26:47'),
(9, 3, 6, 1, 1300, '2023-12-28 07:26:47'),
(10, 4, 6, 1, 1300, '2023-12-28 10:02:12'),
(11, 5, 6, 1, 1300, '2023-12-28 10:18:51'),
(12, 6, 8, 5, 2000, '2023-12-28 17:26:22'),
(13, 6, 11, 3, 2500, '2023-12-28 17:26:22'),
(14, 6, 6, 6, 1300, '2023-12-28 17:26:22'),
(15, 7, 6, 1, 1300, '2023-12-29 09:26:21'),
(16, 8, 6, 1, 1300, '2023-12-30 13:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`) VALUES
(6, 2, 'T-shirts', 't-shirts', 't-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirts', 't-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirts', 1500, 1300, '1702372692.jpg', 20, 0, 1, 'T-shirts', 't-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirts', 't-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirtst-shirts', '2023-12-12 07:11:26'),
(8, 8, 'Shirts', 'shirts', 'shirtsshirtsshirtsshirtsshirtsshirtsshirtsshirtsshirtsshirts', 'shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts shirts', 2300, 2000, '1702372871.webp', 20, 0, 1, 'Shirts', 'shirtsshirtsshirtsshirtsshirtsshirtsshirtsshirtsshirtsshirtsshirtsshirtsshirts', 'shirtsshirtsshirtsshirtsshirtsshirtsshirtsshirtsshirtsshirtsshirtsshirtsshirts', '2023-12-12 09:21:11'),
(10, 8, 'Shirts', 'shirts', 'shirtsshirtsshirtsshirtsshirtsshirtsshirtsshirtsshirtsshirtsshirtsshirtsshirts', 'shirtsshirtsshirtsshirtsshirtsshirtsshirtsshirtsshirtsshirtsshirts', 2300, 1300, '1702375151.webp', 10, 0, 1, 'Shirts', 'shirtsshirtsshirtsshirtsshirtsshirtsshirts', 'shirtsshirtsshirts', '2023-12-12 09:59:11'),
(11, 7, 'Trouser', 'trouser', 'trouser trouser trouser trouser trouser trouser trouser trouser trouser', 'trouser trouser trouser trouser trouser trouser trouser trouser trouser', 3000, 2500, '1702805290.png', 20, 0, 1, 'Trouser', 'trouser trouser trouser trouser trouser trouser trouser trouser trouser', 'trouser trouser trouser trouser trouser trouser trouser trouser trouser', '2023-12-17 09:28:10'),
(12, 9, 'long frock', 'frock', 'fghjil', 'vhjkl', 2300, 2500, '1703847928.jpeg', 9, 0, 1, 'Frock', 'cgvhbjnm', 'ghijkl', '2023-12-29 10:59:48'),
(13, 10, 'short ', 'short', 'baebfauefhauiefgaoughPIAehwfuah0QTQ(3tuQA0(TUq9#tu\r\n', 'oiadhfpiehdgiuarypg8uarog@jaro@thapt', 2300, 2000, '1703848258.avif', 9, 0, 1, 'Shorts', 'HFQEYT80QYT0Q8', 'GAEUOFAOEIHGAPIUGRPUQ)TQ08E', '2023-12-29 11:10:58'),
(14, 7, 'Trouser', 'trouser', 'AUGFAUGEFEADGDGFAEGFR', 'EUFGUAEGFGAEF:F:', 2300, 2000, '1703848600.avif', 11, 0, 1, 'Trouser', 'DBHCIASGf9agef97aEfrAUfra', 'HBCADGFIAYEGFAEGFA8E', '2023-12-29 11:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `product_manager`
--

CREATE TABLE `product_manager` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `passowrd` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `contact` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `created-at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(191) NOT NULL,
  `contact` varchar(191) NOT NULL,
  `contact2` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `address`, `contact`, `contact2`, `created_at`) VALUES
(4, 'rima@gmail.com', '1212', 'Rimshad', 'Matara', '0725625', '0872652', '2023-12-18 10:49:03'),
(5, 'ahamed@gmail.com', '1234', 'Ahamed', 'Mudiyanselage waththa thalalla Gandara', '07345763', '37645738', '2023-12-18 11:08:24'),
(6, 'nethun@gmail.com', '1234', 'Nethun', 'Weligama', '749365', '768345', '2023-12-18 11:10:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountant`
--
ALTER TABLE `accountant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clerk`
--
ALTER TABLE `clerk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_manager`
--
ALTER TABLE `product_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountant`
--
ALTER TABLE `accountant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `clerk`
--
ALTER TABLE `clerk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_manager`
--
ALTER TABLE `product_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
