-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2023 at 07:10 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qrcodewebapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `foodmenu`
--

CREATE TABLE `foodmenu` (
  `id` int(11) NOT NULL,
  `foodname` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foodimage` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fooddesc` varchar(355) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_status` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foodmenu`
--

INSERT INTO `foodmenu` (`id`, `foodname`, `foodimage`, `fooddesc`, `category`, `price`, `currency_type`, `food_status`) VALUES
(19, 'Baasto Iyo Khudaar', 'ben-lei-flFd8L7_B3g-unsplash.jpg', 'baasto khudaar , baasto macan', 'food', '11000', 'shilling', 'U Dhamaday'),
(20, 'Pizaa Hilib', 'chad-montano-MqT0asuoIcU-unsplash.jpg', 'Pizza hilib , Pizza Macan', 'food', '40000', 'shilling', 'Wan Haynaa'),
(21, 'Sanwaji Beed', 'joseph-gonzalez-fdlZBWIP0aM-unsplash.jpg', 'Sanwaji Beed , Cunto Macan', 'food', '20000', 'shilling', 'Wan Haynaa'),
(22, 'Cake Macaan', 'anna-tukhfatullina-food-photographer-stylist-Mzy-OjtCI70-unsplash.jpg', 'Cake Macaan', 'food', '35000', 'shilling', 'Wan Haynaa'),
(23, 'Pancake Macaan', 'food1.jpg', 'Quraac Pancake , Aad U Macan', 'food', '65000', 'shilling', 'Wan Haynaa'),
(25, 'Sharaab', 'whitney-wright-TgQkxQc-t_U-unsplash.jpg', 'desc Sharab', 'drink', '5000', 'shilling', 'Wan Haynaa');

-- --------------------------------------------------------

--
-- Table structure for table `foodorder`
--

CREATE TABLE `foodorder` (
  `id` int(4) NOT NULL,
  `foodid` int(50) NOT NULL,
  `quantity` int(2) NOT NULL DEFAULT 1,
  `user_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complete_order` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `print_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_printed',
  `customer_phone` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'undefined',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foodorder`
--

INSERT INTO `foodorder` (`id`, `foodid`, `quantity`, `user_id`, `complete_order`, `print_status`, `customer_phone`, `created_at`) VALUES
(95, 20, 1, '69967', 'Accepted', 'not_printed', '095435678', '2023-08-09 18:12:52'),
(96, 23, 1, '69967', 'Accepted', 'not_printed', '095435678', '2023-08-09 18:19:55'),
(97, 20, 1, '79367', 'hide', 'not_printed', 'undefined', '2023-08-10 16:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(4) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_logged_in` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restinfo`
--

CREATE TABLE `restinfo` (
  `restlogo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(20) NOT NULL,
  `restname` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restid` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restemail` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restorg` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restphone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaddress` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restinfo`
--

INSERT INTO `restinfo` (`restlogo`, `id`, `restname`, `restid`, `restemail`, `restorg`, `restphone`, `restaddress`, `pwd`) VALUES
('logo.png', 60932220, 'Saw International Hotel', '60932220 ', 'example@gmail.com', 'Hotel', '06323456789', 'Halane, Borama', 'test1');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(4) NOT NULL,
  `tablename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `tablename`, `created_at`) VALUES
(12, '1', '2023-07-17 17:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(15) NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_number` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `fullname`, `phone`, `table_number`, `created_at`, `user_id`) VALUES
(15, 'MuradCade', '095435678', '1', '2023-08-09 14:17:29', 69967),
(16, 'maxamed abdirahman', '4567890', '1', '2023-08-10 16:57:41', 79367);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foodmenu`
--
ALTER TABLE `foodmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodorder`
--
ALTER TABLE `foodorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restinfo`
--
ALTER TABLE `restinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foodmenu`
--
ALTER TABLE `foodmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `foodorder`
--
ALTER TABLE `foodorder`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restinfo`
--
ALTER TABLE `restinfo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60932222;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
