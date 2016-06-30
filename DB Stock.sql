-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2016 at 02:41 AM
-- Server version: 5.7.12-log
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `brand_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(00000016, 'Logitech'),
(00000017, 'Asrock'),
(00000018, 'Western Digital'),
(00000019, 'Canon'),
(00000020, 'Color Fly'),
(00000021, 'Nikon'),
(00000022, 'Intel'),
(00000023, 'Tsunami'),
(00000024, 'Cubic'),
(00000025, 'Philips'),
(00000026, 'Kington'),
(00000027, 'Zircon'),
(00000028, 'Grandsteam');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(00000008, 'Cpu'),
(00000009, 'Mainboard'),
(00000010, 'Ram'),
(00000011, 'Harddisk'),
(00000012, 'Power Supply'),
(00000013, 'Camera'),
(00000014, 'Monitor'),
(00000015, 'Printer'),
(00000016, 'Toner'),
(00000017, 'Toner Inkjet'),
(00000018, 'Cartridge'),
(00000019, 'Mouse'),
(00000020, 'Keyboard'),
(00000021, 'Case'),
(00000022, 'Ups'),
(00000023, 'Ip Phone'),
(00000024, 'Battery Ups');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `emp_fname` varchar(50) NOT NULL,
  `emp_lname` varchar(50) NOT NULL,
  `emp_username` varchar(50) NOT NULL,
  `emp_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_fname`, `emp_lname`, `emp_username`, `emp_password`) VALUES
(00000001, 'ธนัตถ์', 'สาระเวียง', 'thanat.sar', 'Bonjib2015');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `model_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `model_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model_id`, `model_name`) VALUES
(00000011, 'M100r'),
(00000012, 'K120'),
(00000013, 'H110m-hdv/d'),
(00000014, 'Blue 1 Tb'),
(00000015, 'Blue 2 Tb'),
(00000016, 'Pg-810'),
(00000017, 'Cl-811'),
(00000018, 'Canon Bk 1000ml'),
(00000019, 'Canon C 1000ml'),
(00000020, 'Canon M 1000ml'),
(00000021, 'Canon Y 1000ml'),
(00000022, 'Coolpix A100'),
(00000023, 'DDR3 4 Gb'),
(00000024, 'G4400'),
(00000025, 'Extreme 520w'),
(00000026, 'Blackshield (Black)'),
(00000027, 'Philips 203V5LSB2/97 (B)'),
(00000028, 'Pixma Ip2770'),
(00000029, 'Smooth-S 850Va'),
(00000030, 'GXP1620'),
(00000031, 'Battery 12V 7.8Ah');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `order_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `prod_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `amount` int(11) NOT NULL,
  `priceperunit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`order_id`, `prod_id`, `amount`, `priceperunit`) VALUES
(00000025, 00000035, 10, 185),
(00000025, 00000036, 10, 250),
(00000025, 00000037, 6, 2170),
(00000025, 00000038, 10, 1610),
(00000025, 00000039, 6, 2620),
(00000025, 00000040, 10, 565),
(00000025, 00000041, 5, 705),
(00000025, 00000042, 1, 310),
(00000025, 00000043, 1, 310),
(00000025, 00000044, 1, 310),
(00000025, 00000045, 1, 310),
(00000025, 00000046, 2, 3160),
(00000025, 00000047, 6, 580),
(00000025, 00000048, 6, 2020),
(00000025, 00000049, 6, 305),
(00000025, 00000050, 6, 335),
(00000025, 00000051, 6, 2482),
(00000025, 00000052, 2, 1460);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `supplier_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `totalprice` float NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `supplier_id`, `totalprice`, `datetime`) VALUES
(00000025, 00000007, 103177, '2016-06-27 06:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `supplier_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `brand_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `model_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `category_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `amount` int(3) NOT NULL DEFAULT '0',
  `warranty` int(1) NOT NULL,
  `warrantytype` int(1) NOT NULL,
  `pointorder` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `supplier_id`, `brand_id`, `model_id`, `category_id`, `amount`, `warranty`, `warrantytype`, `pointorder`) VALUES
(00000035, 00000007, 00000016, 00000011, 00000019, 10, 3, 3, 5),
(00000036, 00000007, 00000016, 00000012, 00000020, 12, 3, 3, 5),
(00000037, 00000007, 00000017, 00000013, 00000009, 5, 3, 3, 5),
(00000038, 00000007, 00000018, 00000014, 00000011, 9, 3, 3, 5),
(00000039, 00000007, 00000018, 00000015, 00000011, 6, 3, 3, 5),
(00000040, 00000007, 00000019, 00000016, 00000018, 10, 1, 3, 5),
(00000041, 00000007, 00000019, 00000017, 00000018, 5, 3, 3, 5),
(00000042, 00000007, 00000020, 00000018, 00000017, 1, 0, 1, 1),
(00000043, 00000007, 00000020, 00000019, 00000017, 1, 0, 1, 1),
(00000044, 00000007, 00000020, 00000020, 00000017, 1, 0, 1, 1),
(00000045, 00000007, 00000020, 00000021, 00000017, 1, 0, 3, 1),
(00000046, 00000007, 00000021, 00000022, 00000013, 2, 1, 3, 1),
(00000047, 00000007, 00000026, 00000023, 00000010, 5, 1, 4, 5),
(00000048, 00000007, 00000022, 00000024, 00000008, 5, 3, 3, 5),
(00000049, 00000007, 00000023, 00000025, 00000012, 5, 1, 3, 5),
(00000050, 00000007, 00000024, 00000026, 00000021, 5, 7, 1, 5),
(00000051, 00000007, 00000025, 00000027, 00000014, 11, 3, 3, 5),
(00000052, 00000007, 00000019, 00000028, 00000015, 2, 1, 3, 2),
(00000053, 00000008, 00000027, 00000029, 00000022, 0, 2, 3, 5),
(00000054, 00000009, 00000028, 00000030, 00000023, 0, 0, 4, 5),
(00000055, 00000008, 00000027, 00000031, 00000024, 0, 1, 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `productdetail`
--

CREATE TABLE `productdetail` (
  `prod_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `serial` varchar(50) NOT NULL,
  `receive_id` int(8) UNSIGNED ZEROFILL DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productdetail`
--

INSERT INTO `productdetail` (`prod_id`, `serial`, `receive_id`, `status`) VALUES
(00000035, '5901417878', NULL, 1),
(00000035, '5901417923', NULL, 1),
(00000035, '5903449918', 00000021, 0),
(00000035, '5903449922', 00000021, 0),
(00000035, '5903449925', 00000021, 0),
(00000035, '5903457449', 00000021, 0),
(00000035, '5903457452', 00000021, 0),
(00000035, '5903457520', 00000021, 0),
(00000035, '5903457577', 00000021, 0),
(00000035, '5903457581', 00000021, 0),
(00000035, '5903457595', 00000021, 0),
(00000035, '5903457597', 00000021, 0),
(00000036, '5901445056', NULL, 0),
(00000036, '5901445059', NULL, 0),
(00000036, '5901445062', NULL, 1),
(00000036, '5903374610', 00000021, 0),
(00000036, '5903374613', 00000021, 0),
(00000036, '5903374690', 00000021, 0),
(00000036, '5903374693', 00000021, 0),
(00000036, '5903374696', 00000021, 0),
(00000036, '5903374699', 00000021, 0),
(00000036, '5903374715', 00000021, 0),
(00000036, '5903374718', 00000021, 0),
(00000036, '5903374721', 00000021, 0),
(00000036, '5903374724', 00000021, 0),
(00000037, '5901765144', NULL, 1),
(00000037, '5901809271', 00000021, 0),
(00000037, '5901809288', 00000021, 0),
(00000037, '5901809291', 00000021, 0),
(00000037, '5901809294', 00000021, 0),
(00000037, '5901809296', 00000021, 1),
(00000037, '5901809297', 00000021, 0),
(00000038, '5901955127', NULL, 1),
(00000038, '5903314574', 00000021, 0),
(00000038, '5903314575', 00000021, 0),
(00000038, '5903314580', 00000021, 0),
(00000038, '5903314581', 00000021, 0),
(00000038, '5903314586', 00000021, 0),
(00000038, '5903314587', 00000021, 0),
(00000038, '5903314592', 00000021, 0),
(00000038, '5903314593', 00000021, 0),
(00000038, '5903314598', 00000021, 1),
(00000038, '5903314599', 00000021, 0),
(00000039, '5903372862', 00000021, 0),
(00000039, '5903372863', 00000021, 0),
(00000039, '5903372868', 00000021, 0),
(00000039, '5903372869', 00000021, 0),
(00000039, '5903372884', 00000021, 0),
(00000039, '5903372885', 00000021, 0),
(00000040, '1600773823', 00000021, 0),
(00000040, '1600773825', 00000021, 0),
(00000040, '1600773911', 00000021, 0),
(00000040, '1600773912', 00000021, 0),
(00000040, '1600773917', 00000021, 0),
(00000040, '1600773918', 00000021, 0),
(00000040, '1600773923', 00000021, 0),
(00000040, '1600773924', 00000021, 0),
(00000040, '1600774179', 00000021, 0),
(00000040, '1600774180', 00000021, 0),
(00000041, '1600767523', 00000021, 0),
(00000041, '1600767524', 00000021, 0),
(00000041, '1600767529', 00000021, 0),
(00000041, '1600767535', 00000021, 0),
(00000041, '1600767536', 00000021, 0),
(00000042, '5903481474', 00000021, 0),
(00000043, '5903481515', 00000021, 0),
(00000044, '5903481578', 00000021, 0),
(00000045, '5903481663', 00000021, 0),
(00000046, '5903470328', 00000021, 0),
(00000046, '5903507991', 00000021, 0),
(00000047, '5901659395', NULL, 1),
(00000047, '5903156215', 00000021, 0),
(00000047, '5903156305', 00000021, 0),
(00000047, '5903156654', 00000021, 0),
(00000047, '5903156669', 00000021, 0),
(00000047, '5903156673', 00000021, 1),
(00000047, '5903156676', 00000021, 0),
(00000048, '5902095674', NULL, 1),
(00000048, '5903386533', 00000021, 1),
(00000048, '5903386538', 00000021, 0),
(00000048, '5903386539', 00000021, 0),
(00000048, '5903386544', 00000021, 0),
(00000048, '5903386545', 00000021, 0),
(00000048, '5903386602', 00000021, 0),
(00000049, '5902051116', NULL, 1),
(00000049, '5903484601', 00000021, 0),
(00000049, '5903484604', 00000021, 0),
(00000049, '5903484611', 00000021, 0),
(00000049, '5903484614', 00000021, 1),
(00000049, '5903484627', 00000021, 0),
(00000049, '5903484640', 00000021, 0),
(00000050, '5902025000', NULL, 1),
(00000050, '5903402788', 00000021, 0),
(00000050, '5903402789', 00000021, 0),
(00000050, '5903402797', 00000021, 0),
(00000050, '5903402800', 00000021, 0),
(00000050, '5903402803', 00000021, 1),
(00000050, '5903402806', 00000021, 0),
(00000051, '5900952313', NULL, 0),
(00000051, '5900953206', NULL, 0),
(00000051, '5900953260', NULL, 0),
(00000051, '5901654167', NULL, 1),
(00000051, '5901654739', NULL, 0),
(00000051, '5903366708', 00000021, 0),
(00000051, '5903366711', 00000021, 0),
(00000051, '5903366719', 00000021, 0),
(00000051, '5903366732', 00000021, 0),
(00000051, '5903366747', 00000021, 0),
(00000051, '5903366750', 00000021, 0),
(00000051, '590953212', NULL, 0),
(00000052, '5903498801', 00000021, 0),
(00000052, '5903498903', 00000021, 0),
(00000053, 'T020258SMS080961', NULL, 1),
(00000053, 'T021058SMS857892', NULL, 1),
(00000053, 'T021058SMS857894', NULL, 0),
(00000054, '20EZ0KYF407A8624', NULL, 1),
(00000055, 'Battery590007', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `receive`
--

CREATE TABLE `receive` (
  `receive_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `order_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `receive_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receive`
--

INSERT INTO `receive` (`receive_id`, `order_id`, `receive_date`) VALUES
(00000021, 00000025, '2016-06-27 06:24:13');

-- --------------------------------------------------------

--
-- Table structure for table `returnproduct`
--

CREATE TABLE `returnproduct` (
  `return_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `emp_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `return_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `returnproduct`
--

INSERT INTO `returnproduct` (`return_id`, `emp_id`, `return_date`) VALUES
(00000001, 00000001, '2016-06-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `returnproductdetail`
--

CREATE TABLE `returnproductdetail` (
  `return_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `prod_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `serial` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `returnproductdetail`
--

INSERT INTO `returnproductdetail` (`return_id`, `prod_id`, `serial`) VALUES
(00000001, 00000035, '5903449918');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `supplier_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`) VALUES
(00000007, 'บริษัท แอดไวซ์ โฮลดิ้งส์ กรุ๊ป จำกัด'),
(00000008, 'บริษัท เซอร์คอน พาวเวอร์ โซลูชั่น จำกัด'),
(00000009, 'บริษัท เอ็มวี คอมมิวนิเคชั่นส์ จำกัด');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `withdraw_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `emp_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `withdraw_date` datetime NOT NULL,
  `withdrawname` varchar(2000) DEFAULT NULL,
  `detail` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`withdraw_id`, `emp_id`, `withdraw_date`, `withdrawname`, `detail`) VALUES
(00000020, 00000001, '2016-06-20 00:00:00', 'ธนัตถ์', 'เบิกให้ธัญวัฒน์ (พนักงานใหม่)'),
(00000021, 00000001, '2016-06-28 09:05:01', 'คุณพรรณิดา', 'เนื่องจากเครื่องสำรองไฟเดิม มีปัญหา'),
(00000022, 00000001, '2016-06-28 17:33:02', 'คุณภัทรานิษฐ์', 'เนื่องจากแบตเตอร์รี่ของเดิมไม่สำรองไฟ'),
(00000023, 00000001, '2016-06-29 10:18:39', '', 'เบิกให้พนักงานใหม่ (โปรแกรมเมอร์)'),
(00000024, 00000001, '2016-06-29 00:00:00', NULL, 'เบิกให้พนักงานใหม่ (ฝ่าย HR)'),
(00000025, 00000001, '2016-06-29 00:00:00', NULL, 'เบิกใช้กับเครื่อง กล้องวงจรปิด Ta Auto Sales');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawdetail`
--

CREATE TABLE `withdrawdetail` (
  `withdraw_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `prod_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `serial` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `withdrawdetail`
--

INSERT INTO `withdrawdetail` (`withdraw_id`, `prod_id`, `serial`) VALUES
(00000023, 00000035, '5901417878'),
(00000020, 00000035, '5901417923'),
(00000023, 00000036, '5901445062'),
(00000023, 00000037, '5901765144'),
(00000020, 00000037, '5901809296'),
(00000024, 00000037, '5901809297'),
(00000023, 00000038, '5901955127'),
(00000025, 00000038, '5903314581'),
(00000024, 00000038, '5903314586'),
(00000020, 00000038, '5903314598'),
(00000023, 00000047, '5901659395'),
(00000024, 00000047, '5903156215'),
(00000020, 00000047, '5903156673'),
(00000023, 00000048, '5902095674'),
(00000020, 00000048, '5903386533'),
(00000024, 00000048, '5903386538'),
(00000023, 00000049, '5902051116'),
(00000024, 00000049, '5903484611'),
(00000020, 00000049, '5903484614'),
(00000023, 00000050, '5902025000'),
(00000024, 00000050, '5903402789'),
(00000020, 00000050, '5903402803'),
(00000023, 00000051, '5901654167'),
(00000021, 00000053, 'T020258SMS080961'),
(00000020, 00000053, 'T021058SMS857892'),
(00000025, 00000053, 'T021058SMS857894'),
(00000020, 00000054, '20EZ0KYF407A8624'),
(00000022, 00000055, 'Battery590007');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`,`emp_username`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`order_id`,`prod_id`),
  ADD KEY `FK_orderdetail` (`prod_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `FK_product` (`supplier_id`),
  ADD KEY `FK_product2` (`brand_id`),
  ADD KEY `FK_product3` (`model_id`),
  ADD KEY `FK_product4` (`category_id`);

--
-- Indexes for table `productdetail`
--
ALTER TABLE `productdetail`
  ADD PRIMARY KEY (`prod_id`,`serial`),
  ADD KEY `FK_productdetail1` (`receive_id`);

--
-- Indexes for table `receive`
--
ALTER TABLE `receive`
  ADD PRIMARY KEY (`receive_id`,`order_id`),
  ADD KEY `FK_receive` (`order_id`);

--
-- Indexes for table `returnproduct`
--
ALTER TABLE `returnproduct`
  ADD PRIMARY KEY (`return_id`),
  ADD KEY `FK_returnproduct` (`emp_id`);

--
-- Indexes for table `returnproductdetail`
--
ALTER TABLE `returnproductdetail`
  ADD PRIMARY KEY (`return_id`),
  ADD KEY `FK_returnproductdetail1` (`prod_id`,`serial`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`withdraw_id`),
  ADD KEY `FK_withdraw` (`emp_id`);

--
-- Indexes for table `withdrawdetail`
--
ALTER TABLE `withdrawdetail`
  ADD PRIMARY KEY (`withdraw_id`,`prod_id`,`serial`),
  ADD KEY `FK_withdrawdetail1` (`prod_id`,`serial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `model_id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `productdetail`
--
ALTER TABLE `productdetail`
  MODIFY `prod_id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `receive`
--
ALTER TABLE `receive`
  MODIFY `receive_id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `returnproduct`
--
ALTER TABLE `returnproduct`
  MODIFY `return_id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `withdraw_id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `FK_orderdetail` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`),
  ADD CONSTRAINT `FK_orderdetail1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_product` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`),
  ADD CONSTRAINT `FK_product2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`),
  ADD CONSTRAINT `FK_product3` FOREIGN KEY (`model_id`) REFERENCES `model` (`model_id`),
  ADD CONSTRAINT `FK_product4` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `productdetail`
--
ALTER TABLE `productdetail`
  ADD CONSTRAINT `FK_productdetail` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`),
  ADD CONSTRAINT `FK_productdetail1` FOREIGN KEY (`receive_id`) REFERENCES `receive` (`receive_id`);

--
-- Constraints for table `receive`
--
ALTER TABLE `receive`
  ADD CONSTRAINT `FK_receive` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `returnproduct`
--
ALTER TABLE `returnproduct`
  ADD CONSTRAINT `FK_returnproduct` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `returnproductdetail`
--
ALTER TABLE `returnproductdetail`
  ADD CONSTRAINT `FK_returnproductdetail` FOREIGN KEY (`return_id`) REFERENCES `returnproduct` (`return_id`),
  ADD CONSTRAINT `FK_returnproductdetail1` FOREIGN KEY (`prod_id`,`serial`) REFERENCES `productdetail` (`prod_id`, `serial`);

--
-- Constraints for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD CONSTRAINT `FK_withdraw` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `withdrawdetail`
--
ALTER TABLE `withdrawdetail`
  ADD CONSTRAINT `FK_withdrawdetail` FOREIGN KEY (`withdraw_id`) REFERENCES `withdraw` (`withdraw_id`),
  ADD CONSTRAINT `FK_withdrawdetail1` FOREIGN KEY (`prod_id`,`serial`) REFERENCES `productdetail` (`prod_id`, `serial`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
