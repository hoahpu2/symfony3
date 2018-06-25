-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2018 at 03:52 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_symfuny`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pro_images` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `number`, `avatar`, `pro_images`) VALUES
(10, 'nameaaa', '3411.00', 'value="value="value="value="value="rfr"\r\n							"\r\n							"\r\n							"\r\n							"\r\n							', 111, '184c5f51d37cb1e90321a95de9d7fc77.jpeg', ''),
(11, 'name12332', '111.00', 'value="value="hihi"\r\n							"\r\n							', 0, '88ada5151d90086920e95b39d495e37b.jpeg', ''),
(12, 'name45', '34.00', 'value="hihihi"\r\n							', 0, '9bbe1e3c568992e944326623c40888b1.jpeg', ''),
(16, 'sp123', '123.00', '**Markdown Editor** inside a *widget box*\r\n\r\n								- list item 1\r\n								- list item 2\r\n								- list item 3', 23, '3cc98d2a8df40d4b12ea0eb224505903.jpeg', '[]'),
(20, '111', '11.00', '**Markdown Editor** inside a *widget box*\r\n\r\n								- list item 1\r\n								- list item 2\r\n								- list item 3', 0, 'a988a4efc35495b1d876c8f8431b613f.jpeg', '[]'),
(21, 'sss', '11.00', '**Markdown Editor** inside a *widget box*\r\n\r\n								- list item 1\r\n								- list item 2\r\n								- list item 3', 12, '93ae992f8847c1b39e6e47ec3c682414.jpeg', '[]'),
(22, '2332', '2323.00', '	2323						', 23, '102de4fc74fd70492ad4974f74312509.jpeg', '[]'),
(23, '145d4802010011', '34.00', '	34						', 34, 'b30114f3d997b99b23aa92c5f4a3a099.jpeg', '[]'),
(24, '145d4802010011', '23.00', '	23						', 23, '887809a882154ad927bf48457a67f646.jpeg', '[]'),
(25, '145d4802010011', '1111.00', '	1111						', 111, '2171766bcf4bbf8b1ddb7700ac152c48.jpeg', '[]'),
(26, '145d4802010011', '1111.00', '	1111						', 111, '0c28b58c9abcc76a1803752090df95ac.jpeg', '[]'),
(27, '145d4802010011', '12.00', '	12						', 12, 'f1fd7b5e3c0238ab04d6f4e4e917c2f1.jpeg', '[]'),
(28, '1221', '1221.00', '	1221						', 1221, 'cb18b5c5b3f8856dcb74ba98147ebbab.jpeg', '[]'),
(29, '121@fdfdfdf.com', '1212.00', '121212', 1212, 'ahihi', 'ahihi'),
(30, '12121', '1212.00', '121212', 12122, 'ahihi', 'ahihi'),
(31, '2323', '2323.00', '23232', 2323, 'ahihi', 'ahihi'),
(32, '121@fdfdfdf.com', '1212.00', '121212', 1212, 'ahihi', 'ahihi'),
(33, '121@fdfdfdf.com', '1212.00', '121212', 1212, 'ahihi', 'ahihi'),
(34, '1212121', '121212.00', '121212', 1212, 'ahihi', 'ahihi'),
(35, '1212121', '121212.00', '121212', 1212, 'ahihi', 'ahihi'),
(36, '12121211', '11111.00', '111', 1212, 'ahihi', 'ahihi'),
(37, 'ưewe', '0.00', '1212', 1212, 'ahihi', 'ahihi'),
(38, 'sdsd', '0.00', 'sdsd', 0, '64887c1bad79892cbebdcd9c0cd29874.jpeg', 'ahihi');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `password`, `token`) VALUES
(19, 'hoanguyen', 'Ergonomic and stylish!!', '$2y$13$yepBpK63R8CBot6HOneezeSD0UUcjJGvz', '121212');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
