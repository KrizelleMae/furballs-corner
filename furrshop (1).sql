-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 03:00 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furrshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `categories_image` varchar(255) NOT NULL,
  `categories_active` int(11) NOT NULL DEFAULT 0,
  `categories_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_image`, `categories_active`, `categories_status`) VALUES
(8, 'Accessories', '202973190860a78dcc3753b.png', 1, 1),
(10, 'Clothes', '21669847260a78def9ef67.png', 1, 1),
(11, 'Foods', '176627349760a74c187befb.png', 1, 1),
(12, 'Hygiene', '64861523560a74c2644e03.png', 1, 1),
(13, 'Toys', '134075174160a78e04d12cc.png', 1, 1),
(14, 'test', '', 1, 2),
(15, '', '', 1, 2),
(16, 'try', '', 1, 2),
(17, 'sample', '188353186660a36f110c3c4.png', 1, 2),
(18, 'Another Test', '110859725160a8e878ed1c3.png', 2, 2),
(19, 'yaya', '81771851560a602ddd0c48.png', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phonenumber` varchar(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `user_id`, `firstname`, `lastname`, `email`, `address`, `phonenumber`, `password`, `date`) VALUES
(0, 480104406, 'Weab', 'Giraffe', 'weabgiraffe@gmail.com', 'san jose zamboanga city', '09123456789', '$2y$10$tAmORNQWs8y8pZrHe4H0N.wmw.F7NVJgCaoedv6n0dpp23sE6jQ2C', '2021-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_contact` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_item_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `rate`, `total`, `order_item_status`) VALUES
(1, 1, 1, '1', '1500', '1500.00', 2),
(2, 1, 2, '1', '1200', '1200.00', 2),
(3, 2, 3, '2', '1200', '2400.00', 2),
(4, 2, 4, '1', '1000', '1000.00', 2),
(5, 3, 5, '2', '1200', '2400.00', 2),
(6, 3, 6, '1', '1200', '1200.00', 2),
(7, 4, 5, '1', '1200', '1200.00', 2),
(8, 5, 7, '2', '1200', '2400.00', 1),
(9, 5, 8, '1', '1200', '1200.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `added_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `product_desc`, `categories_id`, `quantity`, `rate`, `active`, `status`, `added_time`) VALUES
(7, 'bow tie', '206054262860976071e3725.png', 'color blue ribbon made with 100% cotton', 8, '6', '40', 1, 1, '2021-05-21'),
(8, 'Bone Toy', '56106341460a34b500225d.png', '', 17, '8', '50', 2, 2, '2021-05-21'),
(9, 'test', '82111049360a34c51bb177.png', 'tet', 8, '1', '100', 1, 1, '2021-05-21'),
(10, 'testp', '1535674558609bba9aa2a47.png', 'test', 12, '1', '100', 1, 1, '2021-05-21'),
(11, 'testfood', '1265931675609bbae66ef2d.png', 'testtest1', 11, '5', '100', 2, 2, '2021-05-21'),
(12, 'test clothes', '51494143760a8196beae1a.png', 'charoot', 13, '10', '80', 2, 1, '2021-05-21'),
(13, 'test Tortoro', '145380945260a34b80293a3.png', 'tortoro', 13, '10', '100', 2, 1, '2021-05-21'),
(14, 'goku', '9199830660a51b598c194.png', 'cotton', 13, '2', '75', 2, 2, '2021-05-21'),
(15, 'wrong', '196287936860a60106aa3db.png', 'wrongtry', 8, '0', '1000', 1, 1, '2021-05-21'),
(16, 'blue bottle', '', 'cologne 140ml', 12, '5', '90', 2, 2, '2021-05-21'),
(17, 'yellowfoof', '', 'yellow', 11, '10', '100', 2, 2, '2021-05-21'),
(18, 'trytry1', '32439560160a7461d795cd.png', 'try', 11, '100', '10', 2, 2, '2021-05-21'),
(19, 'anothero', '171307742660a72bcd2938b.png', 'petcologne', 12, '5', '10', 2, 2, '2021-05-21'),
(20, 'roller', '11653996960a72c6a31f43.png', 'rolling', 10, '10', '90', 2, 1, '2021-05-21'),
(21, 'clipper', '147419865560a72cff2ac5e.png', 'nail clipper', 12, '10', '100', 1, 1, '2021-05-21'),
(23, 'green food', '147942752860a73b444f33e.png', 'greeeeeen', 11, '10', '5', 1, 1, '2021-05-21'),
(24, 'dragon ball clothes', '164570439160a742675a515.png', 'orange cotton', 13, '10', '80', 1, 1, '2021-05-21'),
(25, 'Watermelon Plushie', '150291715960a8dd4fb6acd.png', 'Watermelon Toy 100% soft', 13, '10', '100', 1, 1, '2021-05-22'),
(26, 'testtest', '69237615160a8dd70b1904.png', 'testtest', 8, '1000', '100', 1, 1, '2021-05-22'),
(27, 'bone plushie', '104877751160a8e95642658.png', '100% cotton', 13, '10', '50', 1, 1, '2021-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'admin', '31213a5c201b801f8d2904cdd92e736a', 'furballscorner@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `email` (`email`),
  ADD KEY `address` (`address`),
  ADD KEY `phonenumber` (`phonenumber`),
  ADD KEY `password` (`password`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
