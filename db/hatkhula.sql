-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2019 at 04:50 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hatkhula`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` varchar(200) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `subject`, `message`, `id`) VALUES
('Ashik', 'ashik01731002123@gmail.com', 'Test', 'Test', 1),
('Ashik', 'ashik01731002123@gmail.com', 'Test', 'Test', 2),
('Ashik', 'ashik01731002123@gmail.com', 'Test', 'Test', 3),
('abul', 'ashik01731002123@gmail.com', 'aa', 'bb', 4),
('abul', 'ashik01731002123@gmail.com', 'aa', 'wqwdqwd', 5);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cId`, `name`, `email`, `phone`, `password`) VALUES
(1, 'sazzadur rahman', 'sheamsheam09@gmail.com', '123', 'a938d63aba1595770dbb53e298c02c83'),
(10, 'sazzadur rahman', 'asdas@sdha.com', '12e3', 'c51ce410c124a10e0db5e4b97fc2af39'),
(14, 'sazzadur rahman', 'adminasfa@sfsf.com', '1235667', '21232f297a57a5a743894a0e4a801fc3'),
(15, 'Biddut', 'biddut12@gmail.com', '01834040969', 'e7dee476d5719cb10fb92181f2db0fae'),
(16, 'sabbiur', 'sabbiur@gmail.com', '013', '92887c7037618c600cb8d56cdba54afd');

-- --------------------------------------------------------

--
-- Table structure for table `masteradmin`
--

CREATE TABLE `masteradmin` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` varchar(30) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `masteradmin`
--

INSERT INTO `masteradmin` (`id`, `name`, `userName`, `email`, `password`, `type`, `image`, `status`) VALUES
(1, 'Sazzadur rahman sheam', 'admin', 'sheamsheam09@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Master Admin', '5afd8a02a2dfc6.75169017.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
  `mId` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nId` varchar(100) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `cName` varchar(200) NOT NULL,
  `cType` varchar(200) NOT NULL,
  `cAddress` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`mId`, `name`, `phone`, `email`, `nId`, `userName`, `password`, `address`, `gender`, `cName`, `cType`, `cAddress`, `status`, `image`) VALUES
(15, 'sazzadur', '0147552', 'sheam09@gamil.com', '5456', 'sheam', 'a938d63aba1595770dbb53e298c02c83', '', 'Male', 'sadasdasd', '', '', 1, ''),
(16, 'asdasd', '2121', 'agsdhas@asdhas.cas', '5456', 'asdgas', '827ccb0eea8a706c4c34a16891f84e7b', '', 'Male', 'sadasd', '', '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `odetails`
--

CREATE TABLE `odetails` (
  `id` int(11) NOT NULL,
  `oId` int(11) NOT NULL,
  `productId` varchar(10) NOT NULL,
  `productName` varchar(30) NOT NULL,
  `size` varchar(20) NOT NULL,
  `quantity` float NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `odetails`
--

INSERT INTO `odetails` (`id`, `oId`, `productId`, `productName`, `size`, `quantity`, `price`) VALUES
(1, 44, '11', 'Hudy', '', 1, 999),
(2, 44, '2', 'Bags', '', 1, 1400);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oId` int(11) NOT NULL,
  `cId` int(11) NOT NULL,
  `tType` varchar(30) NOT NULL,
  `tNo` varchar(30) NOT NULL,
  `oDate` varchar(20) NOT NULL,
  `oStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oId`, `cId`, `tType`, `tNo`, `oDate`, `oStatus`) VALUES
(44, 16, 'b-kash', '12345', '30-01-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `company` varchar(200) NOT NULL,
  `discription` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `subCategory` varchar(200) NOT NULL,
  `image1` varchar(500) NOT NULL,
  `image2` varchar(500) NOT NULL,
  `image3` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  `postedBy` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `price`, `discount`, `company`, `discription`, `category`, `subCategory`, `image1`, `image2`, `image3`, `status`, `postedBy`) VALUES
(1, 'shirt', 1000, 0, 'police', 'it is good', 'Mens Wear', 'Shirts', '5b0316937ea3c7.26323743.jpg', '5b031693841c24.04640318.jpg', '5b031693844a98.63981269.jpg', 1, 'admin'),
(2, 'Bags', 1500, 100, 'nike', 'it is really good', 'Mens Wear', 'Bags', '5b0317453ca836.84768666.jpg', '5b0317453cd572.63103187.jpg', '5b0317453cfaf3.05437999.jpg', 1, 'admin'),
(3, 'Shoes/Footwear', 2000, 200, 'power', 'it is nice', 'Mens Wear', 'Shoes/Footwear', '5b0317b02b88e6.30607005.jpg', '5b0317b02c2b71.04377114.jpg', '5b0317b02cc588.98624146.jpg', 1, 'admin'),
(4, 'Bag', 12000, 200, 'power', 'good', 'Womens Wear', 'Bags', '5b03184697c999.26413986.jpg', '5b03184697f7b4.12411886.jpg', '5b031846981d91.32516790.jpg', 1, 'admin'),
(5, 'Bags', 1200, 200, 'Gorder', 'It is good quality.', 'Womens Wear', 'Bags', '5b061859ab6044.05088430.jpg', '5b061859abacd5.25125394.jpg', '5b061859abed36.45958437.jpg', 1, 'admin'),
(6, 'iPhone', 18000, 500, 'Apple', 'iPhone is the best phone', 'Electronics', 'Mobile', '5b061c5a07dd29.70986661.jpg', '5b061c5a084b38.41563038.jpg', '5b061c5a088b74.03514546.jpg', 1, 'admin'),
(8, 'Watch', 1100, 101, 'Casio', 'It is good quality', 'Watch and Clock', 'Watch and Clock', '5b0bd6ee7999a8.40080769.jpg', '5b0bd6ee7a47a8.52089172.jpg', '5b0bd6ee7b0174.34771669.jpg', 1, 'admin'),
(11, 'Hudy', 1000, 1, 'Unic', 'good good', 'Mens Wear', 'Clothing', '5b0bdd5e520c43.22129228.jpg', '5b0bdd5e52c7b9.40896816.jpg', '5b0bdd5e5351e0.11613534.jpg', 1, 'admin'),
(12, 'T-shirt', 500, 1, 'Easy', 'good', 'Mens Wear', 'T-shirts', '5b0be00ba7e575.41000611.jpg', '5b0be00ba88705.75531354.jpg', '5b0be00ba977f7.09473780.jpg', 1, 'admin'),
(13, 'a', 400, 1, 'sdsa', 'adasd', 'Mens Wear', 'Shirts', '5c4c59f78ca707.25403938.jpeg', '5c4c59f78cc482.17046810.jpeg', '5c4c59f78cdbd3.76233449.jpeg', 0, 'sheam');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `name`, `email`, `productId`, `message`) VALUES
(1, 'Ashik', 'ashik01731002123@gmail.com', 12, 'It is good'),
(2, 'Ashik', 'ashik01731002123@gmail.com', 12, 'It is good'),
(3, 'abul', '', 12, 'it is very good');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `sName` varchar(30) NOT NULL,
  `sAddress` varchar(150) NOT NULL,
  `sCity` varchar(100) NOT NULL,
  `sPhone` varchar(150) NOT NULL,
  `sId` int(11) NOT NULL,
  `cEmail` varchar(150) NOT NULL,
  `sDate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`sName`, `sAddress`, `sCity`, `sPhone`, `sId`, `cEmail`, `sDate`) VALUES
('Ashik', 'Rajshahi', 'Vodora', '01731002123', 1, 'sheamsheam09@gmail.com', '01-06-18'),
('Ashik', 'Natore', 'Natore', '01731002123', 2, 'sheamsheam09@gmail.com', '01-06-18'),
('Sheam', 'kalabagan', 'dhaka', '013', 3, 'sabbiur@gmail.com', '26-01-19'),
('Sheam', 'aaaa', 'aaaaa', '1234', 4, 'sabbiur@gmail.com', '29-01-19'),
('sabbiur', 'aaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', '111111111111', 5, 'sabbiur@gmail.com', '29-01-19'),
('aaaaaaaaa', 'bbbbbbbbbb', 'ccccccccccc', '1111111111', 6, 'sabbiur@gmail.com', '30-01-19'),
('aaaaaaaaa', 'qqqqqqqq', 'qqqqqqqqqq', '22222222222', 7, 'sabbiur@gmail.com', '30-01-19'),
('a', 'a', 'a', '1', 8, 'sabbiur@gmail.com', '30-01-19'),
('aaaaaaaaa', 'qqqq', 'qqqq', '11111', 9, 'sabbiur@gmail.com', '30-01-19'),
('xxxxxx', 'xxxxxxxxx', 'xxxxxxxx', '6666666666', 10, 'sabbiur@gmail.com', '30-01-19'),
('sheam', 'kalabagan,dhaka', 'dhaka', '01747083028', 11, 'sabbiur@gmail.com', '30-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `subadmin`
--

CREATE TABLE `subadmin` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subadmin`
--

INSERT INTO `subadmin` (`id`, `name`, `userName`, `email`, `password`, `type`, `image`, `status`) VALUES
(1, 'Ashik', 'ashik', '', '665f216444d0235a567667bad2c09e11', 'Sub Admin', 'image/1.jpg', 1),
(2, 'Sheam', 'sheam', 'sheam@gmail.com', 'a938d63aba1595770dbb53e298c02c83', 'Sub Admin', '5c4c549d20c963.24773089.jpeg', 1),
(3, 'sujoy dey', 'sujoy', '', 'd355e5dba7495b15fafe1be9dce3220c', 'Sub Admin', 'image/3.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cId`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `masteradmin`
--
ALTER TABLE `masteradmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`mId`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- Indexes for table `odetails`
--
ALTER TABLE `odetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oId` (`oId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oId`),
  ADD KEY `order_ibfk_1` (`cId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`sId`),
  ADD KEY `cEmail` (`cEmail`);

--
-- Indexes for table `subadmin`
--
ALTER TABLE `subadmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `masteradmin`
--
ALTER TABLE `masteradmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `merchant`
--
ALTER TABLE `merchant`
  MODIFY `mId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `odetails`
--
ALTER TABLE `odetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `sId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subadmin`
--
ALTER TABLE `subadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `odetails`
--
ALTER TABLE `odetails`
  ADD CONSTRAINT `odetails_ibfk_1` FOREIGN KEY (`oId`) REFERENCES `orders` (`oId`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cId`) REFERENCES `customer` (`cId`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `shipping_ibfk_1` FOREIGN KEY (`cEmail`) REFERENCES `customer` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
