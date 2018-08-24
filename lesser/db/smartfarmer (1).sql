-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2018 at 06:06 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartfarmer`
--
CREATE DATABASE IF NOT EXISTS `smartfarmer` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `smartfarmer`;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `line` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `address`, `phone`, `facebook`, `line`, `username`) VALUES
(1, '63 หมู่ 4 ต.หนองหาร อ.สันทราย จ.เชียงใหม่', '0610299050', 'Nattakit Nganrungrueang', 'Nat415', 'test'),
(2, '43/3 หมูบ้านสหกรณ์ ต.หนองหาร อ.สันทราย จ.เชียงใหม่', '0964325543', 'Arun WaNaraaak', 'nar433', 'nat'),
(3, 'หจก. เกษตรชัย', '02-1235543', 'KS Super', 'KS _LINE', 'seller'),
(4, '74 Los Eden st. , Ailltons , Willing, England ', '0665332143', 'Somphon St.John', 'TheJohn', 'farm'),
(5, 'tt', 'tt', 'tt', 'tt', 'kk'),
(6, 'gfdg', 'dfg', 'dfg', 'dfg', 'cccc'),
(7, 'dsa', 'sad', 'asd', 'asd', 'aaaa');

-- --------------------------------------------------------

--
-- Table structure for table `gcategory`
--

CREATE TABLE `gcategory` (
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gcategory`
--

INSERT INTO `gcategory` (`name`) VALUES
('ดอก'),
('ปุ๋ย'),
('ผล'),
('ราก'),
('ลำต้น'),
('อื่นๆ'),
('อื่นๆ(ผัก)'),
('เครื่องมือ'),
('ใบ');

-- --------------------------------------------------------

--
-- Table structure for table `gmarket`
--

CREATE TABLE `gmarket` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `marketid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gmarket`
--

INSERT INTO `gmarket` (`id`, `username`, `marketid`) VALUES
(1, 'kk', 1),
(2, 'kk', 2),
(3, 'kk', 3),
(4, 'test', 5),
(16, 'test', 7),
(17, 'test', 4),
(18, 'test', 8),
(19, 'cccc', 9),
(20, 'cccc', 10),
(21, 'cccc', 11),
(22, 'aaaa', 4);

-- --------------------------------------------------------

--
-- Table structure for table `gstatus`
--

CREATE TABLE `gstatus` (
  `statusname` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gstatus`
--

INSERT INTO `gstatus` (`statusname`) VALUES
('admin'),
('ปัจจัย'),
('ลูกค้า'),
('เกษตรกร');

-- --------------------------------------------------------

--
-- Table structure for table `gtype`
--

CREATE TABLE `gtype` (
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gtype`
--

INSERT INTO `gtype` (`name`) VALUES
('ปัจจัย'),
('พืชผัก');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `status`) VALUES
('1', '1', 'ปัจจัย'),
('aaaa', 'aaaa', 'เกษตรกร'),
('admin', '1234', 'admin'),
('à¹‚à¸•à¹‰à¸‡', '1234', 'admin'),
('cccc', 'cccc', 'เกษตรกร'),
('customer', '1234', 'ลูกค้า'),
('farm', '1234', 'เกษตรกร'),
('kk', 'kk', 'เกษตรกร'),
('nat', '1234', 'เกษตรกร'),
('qwe', '1234', 'admin'),
('seller', '1234', 'ปัจจัย'),
('test', '1234', 'เกษตรกร');

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

CREATE TABLE `market` (
  `id` int(11) NOT NULL,
  `market` varchar(100) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`id`, `market`, `latitude`, `longitude`, `type`) VALUES
(1, 'eee', 18.8959, 99.0261, 2),
(2, 'hh', 18.8931, 98.9884, 2),
(3, 'ee', 18.906, 99.0281, 2),
(4, 'ตลาดแม่โจ้', 18.901, 99.0054, 1),
(5, 'รวมโชค', 18.8507, 99.0111, 2),
(7, 'กาดหลวง', 18.7151, 99.0339, 2),
(8, 'กาดประตูเชียงใหม่', 18.7834, 98.9852, 2),
(9, 'sad', 18.8509, 99.0275, 2),
(10, 'กาดสามแยก', 18.8387, 99.0474, 2),
(11, 'ee', 18.8763, 99.0007, 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `media` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `topic`, `detail`, `media`, `time`, `username`) VALUES
(2, 'ทดลองข่าว', 'ทดลอง', 'sell3.jpg', '2018-08-31 04:47:18', 'admin'),
(3, 'อีกครั้ง', 'ออ', 'sell2.jpg', '2018-08-29 23:33:37', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `category` varchar(11) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `detail`, `type`, `category`, `picture`) VALUES
(57, 'หัว', '', 'พืชผัก', 'ราก', 'asparagus2018082317312658269115350382865827.jpg'),
(58, 'ราก', '', 'พืชผัก', 'ราก', 'Broccoli2018082317313908139315350382990814.jpg'),
(59, 'แครอท', '', 'พืชผัก', 'ราก', 'carrot2018082317321359571015350383335957.jpg'),
(60, 'เห็ด', '', 'พืชผัก', 'ราก', 'cassava201808231732255779751535038345578.jpg'),
(61, 'ไส้กรอก', '', 'พืชผัก', 'ดอก', 'p12018082318101196010815350406119601.jpg'),
(63, 'ข้าว', '', 'พืชผัก', 'ลำต้น', 'buy201808231859069179941535043546918.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `career` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `name`, `surname`, `career`, `age`, `picture`, `username`) VALUES
(1, 'Nattakit', 'Nganrungrueang', 'Farmmer', 34, 'nattakit.jpg', 'test'),
(2, 'หจก. เกษตรพัฒนา', 'จ.บึงกาฬ', 'ค้าขาย', 65, 'seller.jpg', 'seller'),
(3, 'na', 'na', 'รับจ้าง', 11, '', 'qwe'),
(4, 'Nakhon', 'Shongkla', 'Customer', 23, 'customer.jpg', 'customer'),
(5, 'Qurry', 'Armen', 'CEO ', 22, 'qwe.jpg', 'qwe'),
(6, 'Natta', 'Arun', 'Farmer', 11, 'qwe.jpg', 'nat'),
(8, 'สมพร', 'ยอดพุ่ม', 'เกษตรกร', 33, 'man.jpg', 'farm'),
(9, 'test', 'test', 'เกษตรกร', 23, 'Admin.png', 'kk'),
(10, 'Knight', 'Kk', 'เกษตรกร', 12, 'asparagus.jpg', 'cccc'),
(11, 'natdanai', 'togun', 'เกษตรกร', 25, '2018082323115474441215350587147444.', 'aaaa');

-- --------------------------------------------------------

--
-- Table structure for table `selllist`
--

CREATE TABLE `selllist` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `selllist`
--

INSERT INTO `selllist` (`id`, `productid`, `time`, `username`) VALUES
(58, 57, '2018-08-23 15:31:26', 'test'),
(59, 58, '2018-08-23 15:31:39', 'test'),
(60, 59, '2018-08-23 15:32:13', 'kk'),
(61, 60, '2018-08-23 15:32:25', 'kk'),
(62, 61, '2018-08-23 16:10:12', 'test'),
(64, 63, '2018-08-23 16:59:07', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `gcategory`
--
ALTER TABLE `gcategory`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `gmarket`
--
ALTER TABLE `gmarket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `marketif` (`marketid`);

--
-- Indexes for table `gstatus`
--
ALTER TABLE `gstatus`
  ADD PRIMARY KEY (`statusname`);

--
-- Indexes for table `gtype`
--
ALTER TABLE `gtype`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `market`
--
ALTER TABLE `market`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `selllist`
--
ALTER TABLE `selllist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productname` (`productid`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gmarket`
--
ALTER TABLE `gmarket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `market`
--
ALTER TABLE `market`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `selllist`
--
ALTER TABLE `selllist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`username`) REFERENCES `profile` (`username`);

--
-- Constraints for table `gmarket`
--
ALTER TABLE `gmarket`
  ADD CONSTRAINT `gmarket_ibfk_1` FOREIGN KEY (`username`) REFERENCES `profile` (`username`),
  ADD CONSTRAINT `gmarket_ibfk_2` FOREIGN KEY (`marketid`) REFERENCES `market` (`id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`status`) REFERENCES `gstatus` (`statusname`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`username`) REFERENCES `login` (`username`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`type`) REFERENCES `gtype` (`name`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`category`) REFERENCES `gcategory` (`name`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`username`) REFERENCES `login` (`username`);

--
-- Constraints for table `selllist`
--
ALTER TABLE `selllist`
  ADD CONSTRAINT `selllist_ibfk_2` FOREIGN KEY (`username`) REFERENCES `profile` (`username`),
  ADD CONSTRAINT `selllist_ibfk_3` FOREIGN KEY (`productid`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
