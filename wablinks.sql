-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2021 at 07:32 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wablinks`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(500) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `name`, `username`, `password`, `type`, `photo`, `status`, `time`) VALUES
(1, 'Taqqiyah', 'admin', '1b115d01a16bf363a8da2f588b3a0297', 'admin', 'defualt.jpg', '1', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `credit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `username`, `password`, `credit`) VALUES
(1, 'Just Deals', 'admin', 'admin', 1),
(2, 'Super admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0),
(3, 'admin', 'admin', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `bid` int(11) NOT NULL,
  `business_name` varchar(45) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `business_type` varchar(20) NOT NULL,
  `business_photo` varchar(20) NOT NULL,
  `business_thumb` varchar(20) NOT NULL,
  `longitude` double NOT NULL DEFAULT '32.54234',
  `latitude` double NOT NULL DEFAULT '0.325645645',
  `contact_person` varchar(45) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `activation_code` varchar(4) NOT NULL,
  `address` varchar(45) NOT NULL,
  `fbtt_id` varchar(40) NOT NULL,
  `gcm` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `business_type`
--

CREATE TABLE `business_type` (
  `type_id` int(11) NOT NULL,
  `business_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Dry foods'),
(2, 'Bags'),
(3, 'Clothing'),
(4, 'Beddings');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(11) NOT NULL,
  `coupon_no` varchar(30) NOT NULL,
  `item_id` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(45) CHARACTER SET armscii8 NOT NULL,
  `contact` varchar(10) CHARACTER SET armscii8 NOT NULL,
  `sex` varchar(6) CHARACTER SET armscii8 NOT NULL,
  `email` varchar(65) NOT NULL,
  `password` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `location` varchar(45) CHARACTER SET armscii8 NOT NULL,
  `address` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `fbtt_id` varchar(36) CHARACTER SET armscii8 NOT NULL,
  `gcm` text CHARACTER SET armscii8 NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `img_desc` longtext NOT NULL,
  `imgType_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image_cat`
--

CREATE TABLE `image_cat` (
  `imgType_id` int(11) NOT NULL,
  `img_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `details` varchar(1000) NOT NULL,
  `item_desc` varchar(1000) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `sub_category_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `store_name` varchar(200) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expiry_date` date NOT NULL,
  `hash` varchar(100) NOT NULL,
  `availability` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `details`, `item_desc`, `photo`, `sub_category_id`, `category_id`, `bid`, `store_name`, `date_created`, `expiry_date`, `hash`, `availability`) VALUES
(1, 'Generic Dry Masavu Beans, 1 Kg', 'Beans are a staple sauce in Uganda and many parts of Africa, plus they are considered a great source of proteins and fiber.', 'Beans\r\n contain high amounts of fiber and may help reduce the rise in blood \r\nsugar that happens after a meal.Grab this deal and more from Jumia \r\nUganda at unbeatable prices with doorstep delivery.', NULL, 1, 1, 0, '', '2021-08-01 12:27:08', '0000-00-00', '356a192b7913b04c54574d18c28d46e6395428ab', 0),
(2, 'Generic Sorted Yellow Dry Beans 5kg', 'Beans are a staple sauce in Uganda and many parts of Africa, plus they are considered a great source of proteins and fiber.', 'Beans contain high amounts of fiber and may help reduce the rise in \r\nblood sugar that happens after a meal.Grab this deal and more from Wablinks\r\n Uganda at unbeatable prices with doorstep delivery.', NULL, 1, 1, 0, '', '2021-08-01 12:29:26', '0000-00-00', '', 0),
(3, 'Generic Dry beans nambaale- 5kg', 'Generic nambaale beans go with every meal be it rice matooke or my food u enjoy', 'Generic &lt;strong&gt;nambaale&lt;/strong&gt;&amp;nbsp;beans go with every meal be it rice matooke or \r\nmy food u enjoy.It contains dietary fibre,proteins and B vitaminsThey \r\nare sorted,health benefits and easy to cookOrder from jumia at \r\naffordable and unbeatable prices and door step delivery', NULL, 1, 1, 0, '', '2021-08-01 12:36:51', '0000-00-00', '', 0),
(4, 'Generic Dry Peas 5kg-green', 'Generic dry peas contain high amounts of fibre and help to reduce the rise in blood sugar and can be taken with various sauce Order from jumia at affordable prices and door step delivery.', 'Generic dry peas contain high amounts of fibre and help to reduce the \r\nrise in blood sugar and can be taken with various sauce&amp;nbsp;Order from jumia\r\n at affordable prices and door step delivery.', NULL, 2, 1, 0, '', '2021-08-01 13:16:01', '0000-00-00', '', 0),
(5, 'Generic Dry Peas 20kg-green', 'Generic dry peas contain high amounts of fibre and help to reduce the rise in blood sugar and can be taken with various sauce Order from jumia at affordable prices and door step delivery.', 'Generic dry peas contain high amounts of fibre and help to reduce the \r\nrise in blood sugar and can be taken with various sauce&amp;nbsp;Order from jumia\r\n at affordable prices and door step delivery.', NULL, 2, 1, 0, '', '2021-08-01 13:18:01', '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_photo`
--

CREATE TABLE `item_photo` (
  `photo_id` int(11) NOT NULL,
  `photo_name` varchar(45) NOT NULL,
  `item_id` int(11) NOT NULL,
  `update_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_photo`
--

INSERT INTO `item_photo` (`photo_id`, `photo_name`, `item_id`, `update_time`) VALUES
(1, '1627820793448.jpg', 1, 1627820793),
(2, '1627821004578.jpg', 2, 1627821004),
(3, '1627821297382.jpg', 2, 1627821297),
(4, '1627821444294.jpg', 3, 1627821444),
(5, '1627823774822.jpg', 4, 1627823774),
(6, '1627823894765.jpg', 5, 1627823894);

-- --------------------------------------------------------

--
-- Table structure for table `item_size`
--

CREATE TABLE `item_size` (
  `item_size_id` int(11) NOT NULL,
  `size` varchar(45) NOT NULL,
  `old_price` double NOT NULL,
  `new_price` double NOT NULL,
  `item_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_size`
--

INSERT INTO `item_size` (`item_size_id`, `size`, `old_price`, `new_price`, `item_id`, `sub_category_id`, `category_id`) VALUES
(1, 'kgs', 7500, 7000, 1, 1, 1),
(2, 'kgs', 30000, 29500, 2, 1, 1),
(3, 'kgs', 32000, 30000, 3, 1, 1),
(4, 'kgs', 35000, 30000, 4, 2, 1),
(5, 'kgs', 210000, 200000, 5, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `mid` int(11) NOT NULL,
  `sender` varchar(500) NOT NULL,
  `receiver` varchar(500) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `time` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ordered_item`
--

CREATE TABLE `ordered_item` (
  `ordered_item_id` int(11) NOT NULL,
  `item_size` varchar(45) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `cost` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `order_details_id` int(11) NOT NULL,
  `instructions` varchar(200) NOT NULL DEFAULT 'nothing'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `instruction` varchar(500) DEFAULT NULL,
  `verification_code` varchar(500) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `customer_name` varchar(100) NOT NULL DEFAULT 'mobile app user',
  `email` varchar(100) NOT NULL DEFAULT 'unknown'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `setting_name` varchar(45) NOT NULL,
  `setting_value` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `setting_name`, `setting_value`) VALUES
(1, 'help_line', '+256788049068'),
(2, 'email', 'amanyirepatrick2013@gmail.com'),
(3, 'currency', 'UGX');

-- --------------------------------------------------------

--
-- Table structure for table `sold_items`
--

CREATE TABLE `sold_items` (
  `sold_item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `sale_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `sub_category_name` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `sub_category_name`, `category_id`) VALUES
(1, 'Beans', 1),
(2, 'Peas', 1),
(3, 'Rice', 1),
(4, 'Maize', 1),
(5, 'Millet flour', 1),
(6, 'Paper bags', 2),
(7, 'Canvas Bags', 2),
(8, 'Shopping bags', 2),
(9, 'Ladies\' T-Shirts', 3),
(10, 'Men\'s T-Shirts', 3),
(11, 'Beddings', 4);

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `visitor_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `first_time` int(11) NOT NULL,
  `last_time` int(11) NOT NULL,
  `session_id` varchar(500) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `business_type`
--
ALTER TABLE `business_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `image_cat`
--
ALTER TABLE `image_cat`
  ADD PRIMARY KEY (`imgType_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`,`sub_category_id`,`category_id`),
  ADD KEY `fk_item_sub_category1` (`sub_category_id`,`category_id`);

--
-- Indexes for table `item_photo`
--
ALTER TABLE `item_photo`
  ADD PRIMARY KEY (`photo_id`,`item_id`),
  ADD KEY `fk_crane_photo_crane_idx` (`item_id`);

--
-- Indexes for table `item_size`
--
ALTER TABLE `item_size`
  ADD PRIMARY KEY (`item_size_id`,`item_id`,`sub_category_id`,`category_id`),
  ADD KEY `fk_item_size_item1` (`item_id`,`sub_category_id`,`category_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `ordered_item`
--
ALTER TABLE `ordered_item`
  ADD PRIMARY KEY (`ordered_item_id`,`order_details_id`),
  ADD KEY `fk_ordered_item_order_details1` (`order_details_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `sold_items`
--
ALTER TABLE `sold_items`
  ADD PRIMARY KEY (`sold_item_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`,`category_id`),
  ADD KEY `fk_sub_category_category` (`category_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`visitor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_type`
--
ALTER TABLE `business_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_cat`
--
ALTER TABLE `image_cat`
  MODIFY `imgType_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item_photo`
--
ALTER TABLE `item_photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item_size`
--
ALTER TABLE `item_size`
  MODIFY `item_size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ordered_item`
--
ALTER TABLE `ordered_item`
  MODIFY `ordered_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sold_items`
--
ALTER TABLE `sold_items`
  MODIFY `sold_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `visitor_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
