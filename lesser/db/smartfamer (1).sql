-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2018 at 12:47 PM
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
-- Database: `smartfamer`
--

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
('ผล'),
('ราก'),
('ลำต้น'),
('อื่นๆ(ผัก)'),
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
('admin', '1234', 'admin'),
('à¹‚à¸•à¹‰à¸‡', '1234', 'admin'),
('customer', '1234', 'ลูกค้า'),
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
  `name` varchar(100) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `category` varchar(11) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`name`, `detail`, `type`, `category`, `picture`) VALUES
('แครอท', 'หัวละ 40 สี่โลร้อย', 'พืชผัก', 'ราก', 'p1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
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

INSERT INTO `profile` (`name`, `surname`, `career`, `age`, `picture`, `username`) VALUES
('Nattakit', 'Nganrungrueang', 'Farmmer', 34, 'nattakit.jpg', 'test'),
('หจก. เกษตรพัฒนา', 'จ.บึงกาฬ', 'ค้าขาย', 65, 'seller.jpg', 'seller'),
('na', 'na', 'รับจ้าง', 11, '', 'qwe'),
('Nakhon', 'Shongkla', 'Customer', 23, 'customer.jpg', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `selllist`
--

CREATE TABLE `selllist` (
  `id` int(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`name`),
  ADD KEY `type` (`type`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD KEY `username` (`username`);

--
-- Indexes for table `selllist`
--
ALTER TABLE `selllist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productname` (`productname`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gmarket`
--
ALTER TABLE `gmarket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `market`
--
ALTER TABLE `market`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `selllist`
--
ALTER TABLE `selllist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `selllist_ibfk_1` FOREIGN KEY (`productname`) REFERENCES `product` (`name`),
  ADD CONSTRAINT `selllist_ibfk_2` FOREIGN KEY (`username`) REFERENCES `profile` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
