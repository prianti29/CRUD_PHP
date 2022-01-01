-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 01, 2022 at 12:15 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `modified_at`, `created_at`) VALUES
(2, 'Prianti Banik ', 'priantibanik@gmail.com', '5354', '2021-12-20 10:46:25', '2021-12-20 10:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `promotional_message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL,
  `is_draft` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `promotional_message`, `link`, `picture`, `created_at`, `modified_at`, `is_active`, `is_draft`) VALUES
(6, 'Banner 2', 'afiagudhaj', 'https://www.instagram.com/?hl=en', '160397464_3451648094939801_5401873305523090594_n.jpg', '2021-12-20 11:02:20', '2021-12-21 09:21:08', 1, 0),
(7, 'Banner 3', 'vseygcfaiusdca', 'https://www.instagram.com/?hl=en', 'IMG_1639547953_161798936_3808755165909931_7895868483209200296_n.jpg', '2021-12-20 11:02:20', '2021-12-20 11:02:46', 0, 0),
(10, 'Banner 4', 'jsagasjf', 'https://www.instagram.com/?hl=en', '03BRODY-SAD-superJumbo.jpg', '2021-12-20 11:02:20', '2021-12-20 11:02:46', 0, 0),
(11, 'Banner 5', 'new', 'https://www.instagram.com/?hl=en', 'IMG_1639548034_173161622_1384400631933027_5128709808641724171_n.jpg', '2021-12-20 11:02:20', '2021-12-20 11:02:46', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `product_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `product_title`, `picture`, `qty`) VALUES
(1, 404, 'flower vase', 'HTB1rfouai6guuRjy0Fmq6y0DXXaX.jpg', 58);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_draft` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `link`, `created_at`, `modified_at`, `is_draft`) VALUES
(2, 'Prianti Banik Turna', 'https://www.instagram.com/?hl=en', '2021-12-21 09:26:35', '2021-12-21 10:18:54', 1),
(3, 'bunny', 'asdga', '2021-12-21 09:27:11', '2021-12-21 09:27:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `subject`) VALUES
('Prianti Banik ', 'priantibanik@gmail.com', 'cse'),
('Prianti Banik Turna', 'priantibanik29@gmail.com', 'cse'),
('bunny', 'bunny@gmail.com', 'Civil'),
('Prianti Banik ', 'priantibanik29@gmail.com', 'Civil');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `created_at`, `modified_at`, `picture`, `is_active`, `is_deleted`) VALUES
(64, 'Product 2', '2021-12-20 09:47:32', '2021-12-20 10:10:09', '03BRODY-SAD-superJumbo.jpg', 0, 1),
(66, 'product 4', '2021-12-20 09:47:32', '2021-12-21 12:02:12', '<?$product[\'picture\'];?>', 0, 1),
(67, 'product 5 ', '2021-12-20 09:47:32', '2021-12-21 12:02:12', '<?$product[\'picture\'];?>', 1, 1),
(72, 'product 6', '2021-12-20 09:47:32', '2021-12-22 12:18:12', 'IMG_1639893745 28da8a249ee95f52f37b806cc535a361.jpg', 1, 1),
(73, 'product 7', '2021-12-20 09:47:32', '2021-12-20 10:10:09', '<?$product[\'picture\'];?>', 0, 0),
(74, 'product 8', '2021-12-20 09:47:32', '2021-12-20 10:10:09', '<?$product[\'picture\'];?>', 0, 0),
(75, 'product 9', '2021-12-20 09:47:32', '2021-12-21 12:01:12', '<?$product[\'picture\'];?>', 1, 1),
(76, 'product 10', '2021-12-20 09:47:32', '2021-12-20 10:10:09', 'IMG_1639896029 159871978_3921473841252199_3725146403489973350_n.jpg', 0, 0),
(78, 'product 11', '2021-12-20 10:04:12', '2021-12-20 10:10:09', 'IMG_1639973045 160397464_3451648094939801_5401873305523090594_n.jpg', 1, 0),
(80, 'product 12', '2021-12-20 10:24:12', '2021-12-20 10:24:01', NULL, 1, 0),
(81, 'c AS', '2021-12-22 12:10:31', '2021-12-22 00:10:31', '03BRODY-SAD-superJumbo.jpg', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
