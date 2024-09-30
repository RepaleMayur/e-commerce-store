-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2022 at 06:56 PM
-- Server version: 5.7.37-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeginiter`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_img` varchar(255) NOT NULL,
  `cat_title` varchar(100) NOT NULL,
  `cat_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_img`, `cat_title`, `cat_desc`) VALUES
(50, 'a:3:{i:0;s:26:\"water-lily-3478924_640.jpg\";i:1;s:25:\"sunflower-1127174_640.jpg\";i:2;a:2:{i:0;s:22:\"flower-729512_1920.jpg\";i:1;a:3:{i:0;s:21:\"flower-156608_640.png\";i:1;s:26:\"technology-3353701_640.jpg\";i:2;s:21:\"flower-156608_640.png\";}}}', 'flower', '                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. '),
(51, 'a:3:{i:0;s:21:\"iphone-410311_640.jpg\";i:1;s:21:\"iphone-410324_640.jpg\";i:2;a:2:{i:0;s:25:\"smartphone-153650_640.png\";i:1;a:2:{i:0;s:21:\"iphone-160307_640.png\";i:1;s:26:\"technology-3353701_640.jpg\";}}}', 'mobile', '                                      Lorem ipsum dolor sit, amet consectetur adipisicing elit. '),
(53, 'a:3:{i:0;s:24:\"footwear-1838767_640.jpg\";i:1;s:20:\"shoes-153310_640.png\";i:2;a:2:{i:0;s:24:\"footwear-1838767_640.jpg\";i:1;s:24:\"footwear-1838767_640.jpg\";}}', 'sheos', '                                     test sheos categories '),
(54, 'a:3:{i:0;s:21:\"shirt-3740340_640.jpg\";i:1;s:21:\"shirt-3740340_640.jpg\";i:2;a:2:{i:0;s:18:\"man-748733_640.jpg\";i:1;s:21:\"shirt-3740340_640.jpg\";}}', 'clothes', '        Lorem ipsum dolor sit, amet consectetur adipisicing elit. '),
(69, 'a:1:{i:0;s:8:\"car4.jpg\";}', 'cars', '                         Lorem ipsum dolor sit, amet consectetur adipisicing elit. '),
(70, 'a:5:{i:0;s:28:\"analog-watch-1869928_640.jpg\";i:1;s:10:\"aaaaa.jpeg\";i:2;s:28:\"analog-watch-1869928_640.jpg\";i:3;s:28:\"aston-martin-2118857_640.jpg\";i:4;s:26:\"smart-watch-821559_640.jpg\";}', 'watch', '   ');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `coup_title` varchar(100) NOT NULL,
  `coup_code` varchar(100) NOT NULL,
  `coup_type` varchar(100) NOT NULL,
  `coup_disc` varchar(100) NOT NULL,
  `valid_from` date NOT NULL,
  `valid_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `coup_title`, `coup_code`, `coup_type`, `coup_disc`, `valid_from`, `valid_to`) VALUES
(2, '121', 'gJLnjRmM9G', 'discount', '7', '2022-04-06', '2022-06-02'),
(5, 'free', 'sdvc234r', 'discount', '100', '2022-06-23', '2022-06-28'),
(6, 'abcdf', '123abc', 'discount', '100', '2022-06-28', '2022-06-29'),
(7, 'test1', '1232', 'off', '100', '2022-06-28', '2022-06-25'),
(8, 'dsfdsfsd', 'sdfsdf', 'discount', '100', '0000-00-00', '0000-00-00'),
(9, 'wsgqerhreh', 'Iq4Sna7Nt5', 'discount', '100', '2022-06-28', '2022-06-30'),
(10, '12', 'btsc1ySMPk', 'discount', '10', '2022-06-28', '2022-06-30'),
(11, '', 'kffvqmeUFz', 'discount', '12', '2022-07-02', '2022-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `amu_subtotal` varchar(100) NOT NULL,
  `tax` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `shipping_charge` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `or_date` date NOT NULL,
  `or_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`id`, `user_id`, `customer`, `amu_subtotal`, `tax`, `discount`, `shipping_charge`, `total`, `or_date`, `or_status`) VALUES
(1, '56', '1', '11', '10', '1', '+40', '2145', '2022-04-07', 'pending'),
(7, '123', '123123', 'SFD', 'SDF', '20%', '+40', '2145', '2022-05-21', 'processing'),
(8, '1', 'SADFV', '11', '10', '20%', '+40', '656941', '2022-05-18', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`) VALUES
(10, 'About us', '<ul><li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit.</li><li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum'),
(11, 'Contact us', '<ul>\r\n	<li><em>fnjrfgjnfnjrtfgjnrtnj</em></li>\r\n	<li>sdkvksd</li>\r\n	<li>sdvlsd</li>\r\n	<li>abcd</li>\r\n</ul>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `place_order`
--

CREATE TABLE `place_order` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `order_item` text NOT NULL,
  `customer` varchar(100) NOT NULL,
  `amount_subtotal` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `ship_charge` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `billing` text NOT NULL,
  `shipping` text NOT NULL,
  `order_date` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place_order`
--

INSERT INTO `place_order` (`id`, `user_id`, `order_item`, `customer`, `amount_subtotal`, `tax`, `discount`, `ship_charge`, `total`, `payment`, `billing`, `shipping`, `order_date`, `status`) VALUES
(108, 'admin', 'a:1:{i:494;a:5:{s:6:\"pro_id\";s:3:\"494\";s:8:\"quantity\";s:1:\"1\";s:9:\"pro_price\";s:7:\"7546842\";s:8:\"pro_name\";s:4:\"audi\";s:3:\"img\";a:2:{i:0;s:7:\"car.jpg\";i:1;s:17:\"car-49278_640.jpg\";}}}', '132@123', 7546842, 452811, '0', 60, 7999713, 'a:3:{s:4:\"type\";s:16:\"cash on delivery\";s:6:\"status\";s:9:\"sussesful\";s:14:\"transaction_id\";s:0:\"\";}', 'a:10:{s:2:\"id\";s:3:\"223\";s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:3:\"abc\";s:5:\"email\";s:7:\"132@123\";s:6:\"mob_no\";s:10:\"4578986532\";s:3:\"pin\";s:6:\"414302\";s:7:\"country\";s:5:\"India\";s:5:\"state\";s:11:\"Maharashtra\";s:4:\"dist\";s:7:\"A.nagar\";s:4:\"city\";s:6:\"Parner\";}', 'a:9:{s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:3:\"abc\";s:5:\"email\";s:7:\"132@123\";s:6:\"mob_no\";s:10:\"4578986532\";s:3:\"pin\";s:6:\"414302\";s:7:\"country\";s:5:\"India\";s:5:\"state\";s:11:\"Maharashtra\";s:4:\"dist\";s:7:\"A.nagar\";s:4:\"city\";s:6:\"Parner\";}', '2022-06-27', 'a:1:{s:6:\"status\";s:7:\"procces\";}'),
(112, 'admin', 'a:1:{i:493;a:5:{s:6:\"pro_id\";s:3:\"493\";s:8:\"quantity\";s:1:\"1\";s:9:\"pro_price\";s:6:\"450000\";s:8:\"pro_name\";s:7:\"watch+1\";s:3:\"img\";a:3:{i:0;s:28:\"aston-martin-2118857_640.jpg\";i:1;s:20:\"auto-2179220_640.jpg\";i:2;s:21:\"watch-4638673_640.jpg\";}}}', '132@123', 450000, 22500, '0', 30, 472530, 'a:3:{s:4:\"type\";s:16:\"cash on delivery\";s:6:\"status\";s:9:\"sussesful\";s:14:\"transaction_id\";s:0:\"\";}', 'a:10:{s:2:\"id\";s:3:\"223\";s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:3:\"abc\";s:5:\"email\";s:7:\"132@123\";s:6:\"mob_no\";s:10:\"4578986532\";s:3:\"pin\";s:6:\"414302\";s:7:\"country\";s:5:\"India\";s:5:\"state\";s:11:\"Maharashtra\";s:4:\"dist\";s:7:\"A.nagar\";s:4:\"city\";s:6:\"Parner\";}', 'a:9:{s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:3:\"abc\";s:5:\"email\";s:7:\"132@123\";s:6:\"mob_no\";s:10:\"4578986532\";s:3:\"pin\";s:6:\"414302\";s:7:\"country\";s:5:\"India\";s:5:\"state\";s:11:\"Maharashtra\";s:4:\"dist\";s:7:\"A.nagar\";s:4:\"city\";s:6:\"Parner\";}', '2022-06-29', 'a:1:{s:6:\"status\";s:7:\"procces\";}'),
(113, 'admin', 'a:1:{i:494;a:5:{s:6:\"pro_id\";s:3:\"494\";s:8:\"quantity\";s:1:\"1\";s:9:\"pro_price\";s:7:\"7546842\";s:8:\"pro_name\";s:4:\"audi\";s:3:\"img\";a:1:{i:0;s:31:\"Cars-Mac-Wallpaper-1024x576.jpg\";}}}', '132@123', 7546842, 377342, '0', 30, 7924214, 'a:3:{s:4:\"type\";s:16:\"cash on delivery\";s:6:\"status\";s:9:\"sussesful\";s:14:\"transaction_id\";s:0:\"\";}', 'a:10:{s:2:\"id\";s:3:\"223\";s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:3:\"abc\";s:5:\"email\";s:7:\"132@123\";s:6:\"mob_no\";s:10:\"4578986532\";s:3:\"pin\";s:6:\"414302\";s:7:\"country\";s:5:\"India\";s:5:\"state\";s:11:\"Maharashtra\";s:4:\"dist\";s:7:\"A.nagar\";s:4:\"city\";s:6:\"Parner\";}', 'a:9:{s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:3:\"abc\";s:5:\"email\";s:7:\"132@123\";s:6:\"mob_no\";s:10:\"4578986532\";s:3:\"pin\";s:6:\"414302\";s:7:\"country\";s:5:\"India\";s:5:\"state\";s:11:\"Maharashtra\";s:4:\"dist\";s:7:\"A.nagar\";s:4:\"city\";s:6:\"Parner\";}', '2022-06-30', 'a:1:{s:6:\"status\";s:7:\"procces\";}'),
(114, 'admin', 'a:1:{i:498;a:5:{s:6:\"pro_id\";s:3:\"498\";s:8:\"quantity\";s:1:\"1\";s:9:\"pro_price\";s:7:\"7546842\";s:8:\"pro_name\";s:7:\"asffasf\";s:3:\"img\";a:1:{i:0;s:17:\"car-49278_640.jpg\";}}}', '132@123', 7546842, 377342, '0', 30, 7924214, 'a:3:{s:4:\"type\";s:16:\"cash on delivery\";s:6:\"status\";s:9:\"sussesful\";s:14:\"transaction_id\";s:0:\"\";}', 'a:10:{s:2:\"id\";s:3:\"223\";s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:3:\"abc\";s:5:\"email\";s:7:\"132@123\";s:6:\"mob_no\";s:10:\"4578986532\";s:3:\"pin\";s:6:\"414302\";s:7:\"country\";s:5:\"India\";s:5:\"state\";s:11:\"Maharashtra\";s:4:\"dist\";s:7:\"A.nagar\";s:4:\"city\";s:6:\"Parner\";}', 'a:9:{s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:3:\"abc\";s:5:\"email\";s:7:\"132@123\";s:6:\"mob_no\";s:10:\"4578986532\";s:3:\"pin\";s:6:\"414302\";s:7:\"country\";s:5:\"India\";s:5:\"state\";s:11:\"Maharashtra\";s:4:\"dist\";s:7:\"A.nagar\";s:4:\"city\";s:6:\"Parner\";}', '2022-06-30', 'a:1:{s:6:\"status\";s:7:\"procces\";}'),
(115, 'Mayur', 'a:1:{i:498;a:5:{s:6:\"pro_id\";s:3:\"498\";s:8:\"quantity\";s:1:\"1\";s:9:\"pro_price\";s:7:\"7546842\";s:8:\"pro_name\";s:7:\"asffasf\";s:3:\"img\";a:1:{i:0;s:17:\"car-49278_640.jpg\";}}}', 'MAYUR@123', 7546842, 377342, '0', 30, 7924214, 'a:3:{s:4:\"type\";s:16:\"cash on delivery\";s:6:\"status\";s:9:\"sussesful\";s:14:\"transaction_id\";s:0:\"\";}', 'a:10:{s:2:\"id\";s:3:\"225\";s:10:\"first_name\";s:5:\"Mayur\";s:9:\"last_name\";s:6:\"Repale\";s:5:\"email\";s:9:\"MAYUR@123\";s:6:\"mob_no\";s:10:\"1245789865\";s:3:\"pin\";s:6:\"414302\";s:7:\"country\";s:5:\"India\";s:5:\"state\";s:11:\"Maharashtra\";s:4:\"dist\";s:7:\"A.nagar\";s:4:\"city\";s:6:\"Parner\";}', 'a:9:{s:10:\"first_name\";s:5:\"Mayur\";s:9:\"last_name\";s:6:\"Repale\";s:5:\"email\";s:9:\"MAYUR@123\";s:6:\"mob_no\";s:10:\"1245789865\";s:3:\"pin\";s:6:\"414302\";s:7:\"country\";s:5:\"India\";s:5:\"state\";s:11:\"Maharashtra\";s:4:\"dist\";s:7:\"A.nagar\";s:4:\"city\";s:6:\"Parner\";}', '2022-06-30', 'a:1:{s:6:\"status\";s:7:\"procces\";}'),
(116, 'Mayur', 'a:1:{i:505;a:5:{s:6:\"pro_id\";s:3:\"505\";s:8:\"quantity\";s:1:\"1\";s:9:\"pro_price\";s:7:\"4547878\";s:8:\"pro_name\";s:2:\"EV\";s:3:\"img\";a:1:{i:0;s:28:\"aston-martin-2118857_640.jpg\";}}}', 'MAYUR@123', 4547878, 227394, '0', 30, 4775302, 'a:3:{s:4:\"type\";s:16:\"cash on delivery\";s:6:\"status\";s:9:\"sussesful\";s:14:\"transaction_id\";s:0:\"\";}', 'a:10:{s:2:\"id\";s:3:\"225\";s:10:\"first_name\";s:5:\"Mayur\";s:9:\"last_name\";s:6:\"Repale\";s:5:\"email\";s:9:\"MAYUR@123\";s:6:\"mob_no\";s:10:\"1245789865\";s:3:\"pin\";s:6:\"414302\";s:7:\"country\";s:5:\"India\";s:5:\"state\";s:11:\"Maharashtra\";s:4:\"dist\";s:7:\"A.nagar\";s:4:\"city\";s:6:\"Parner\";}', 'a:9:{s:10:\"first_name\";s:5:\"Mayur\";s:9:\"last_name\";s:6:\"Repale\";s:5:\"email\";s:9:\"MAYUR@123\";s:6:\"mob_no\";s:10:\"1245789865\";s:3:\"pin\";s:6:\"414302\";s:7:\"country\";s:5:\"India\";s:5:\"state\";s:11:\"Maharashtra\";s:4:\"dist\";s:7:\"A.nagar\";s:4:\"city\";s:6:\"Parner\";}', '2022-06-30', 'a:1:{s:6:\"status\";s:7:\"procces\";}'),
(117, 'admin', 'a:1:{i:495;a:5:{s:6:\"pro_id\";s:3:\"495\";s:8:\"quantity\";s:1:\"1\";s:9:\"pro_price\";s:6:\"450000\";s:8:\"pro_name\";s:6:\"flower\";s:3:\"img\";a:1:{i:0;s:21:\"flower-887443_640.jpg\";}}}', '132@123', 450000, 22500, '0', 30, 472530, 'a:3:{s:4:\"type\";s:16:\"cash on delivery\";s:6:\"status\";s:9:\"sussesful\";s:14:\"transaction_id\";s:0:\"\";}', 'a:10:{s:2:\"id\";s:3:\"223\";s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:3:\"abc\";s:5:\"email\";s:7:\"132@123\";s:6:\"mob_no\";s:10:\"4578986532\";s:3:\"pin\";s:6:\"414302\";s:7:\"country\";s:5:\"India\";s:5:\"state\";s:11:\"Maharashtra\";s:4:\"dist\";s:7:\"A.nagar\";s:4:\"city\";s:6:\"Parner\";}', 'a:9:{s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:3:\"abc\";s:5:\"email\";s:7:\"132@123\";s:6:\"mob_no\";s:10:\"4578986532\";s:3:\"pin\";s:6:\"414302\";s:7:\"country\";s:5:\"India\";s:5:\"state\";s:11:\"Maharashtra\";s:4:\"dist\";s:7:\"A.nagar\";s:4:\"city\";s:6:\"Parner\";}', '2022-07-02', 'a:1:{s:6:\"status\";s:7:\"procces\";}'),
(118, 'Mayur', 'a:1:{i:509;a:5:{s:6:\"pro_id\";s:3:\"509\";s:8:\"quantity\";s:1:\"1\";s:9:\"pro_price\";s:6:\"450000\";s:8:\"pro_name\";s:8:\"test1234\";s:3:\"img\";a:2:{i:0;s:11:\"banner2.jpg\";i:1;s:10:\"banner.jpg\";}}}', 'MAYUR@123', 450000, 22500, '0', 40, 472530, 'a:3:{s:4:\"type\";s:16:\"cash on delivery\";s:6:\"status\";s:9:\"sussesful\";s:14:\"transaction_id\";s:0:\"\";}', 'a:10:{s:2:\"id\";s:3:\"225\";s:10:\"first_name\";s:5:\"Mayur\";s:9:\"last_name\";s:6:\"Repale\";s:5:\"email\";s:9:\"MAYUR@123\";s:6:\"mob_no\";s:10:\"1245789865\";s:3:\"pin\";s:6:\"414302\";s:7:\"country\";s:5:\"India\";s:5:\"state\";s:11:\"Maharashtra\";s:4:\"dist\";s:7:\"A.nagar\";s:4:\"city\";s:6:\"Parner\";}', 'a:9:{s:10:\"first_name\";s:5:\"Mayur\";s:9:\"last_name\";s:6:\"Repale\";s:5:\"email\";s:9:\"MAYUR@123\";s:6:\"mob_no\";s:10:\"1245789865\";s:3:\"pin\";s:6:\"414302\";s:7:\"country\";s:5:\"India\";s:5:\"state\";s:11:\"Maharashtra\";s:4:\"dist\";s:7:\"A.nagar\";s:4:\"city\";s:6:\"Parner\";}', '2022-07-02', 'a:1:{s:6:\"status\";s:7:\"procces\";}'),
(119, 'admin', 'a:1:{i:495;a:5:{s:6:\"pro_id\";s:3:\"495\";s:8:\"quantity\";s:1:\"1\";s:9:\"pro_price\";s:6:\"450000\";s:8:\"pro_name\";s:6:\"flower\";s:3:\"img\";a:1:{i:0;s:21:\"flower-887443_640.jpg\";}}}', '132@123', 450000, 22500, '0', 30, 472530, 'a:3:{s:4:\"type\";s:16:\"cash on delivery\";s:6:\"status\";s:9:\"sussesful\";s:14:\"transaction_id\";s:0:\"\";}', 'a:10:{s:2:\"id\";s:3:\"223\";s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:3:\"abc\";s:5:\"email\";s:7:\"132@123\";s:6:\"mob_no\";s:10:\"4578986532\";s:3:\"pin\";s:6:\"414302\";s:7:\"country\";s:5:\"India\";s:5:\"state\";s:11:\"Maharashtra\";s:4:\"dist\";s:7:\"A.nagar\";s:4:\"city\";s:6:\"Parner\";}', 'a:9:{s:10:\"first_name\";s:5:\"admin\";s:9:\"last_name\";s:3:\"abc\";s:5:\"email\";s:7:\"132@123\";s:6:\"mob_no\";s:10:\"4578986532\";s:3:\"pin\";s:6:\"414302\";s:7:\"country\";s:5:\"India\";s:5:\"state\";s:11:\"Maharashtra\";s:4:\"dist\";s:7:\"A.nagar\";s:4:\"city\";s:6:\"Parner\";}', '2022-07-05', 'a:1:{s:6:\"status\";s:7:\"procces\";}');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_stock` varchar(100) NOT NULL,
  `attribute` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `images`, `product_name`, `product_desc`, `product_price`, `product_stock`, `attribute`) VALUES
(494, 'a:1:{i:0;s:31:\"Cars-Mac-Wallpaper-1024x576.jpg\";}', 'audi', 'wetfwef', 7546842, '1', 'a:4:{s:5:\"color\";s:5:\"black\";s:4:\"size\";s:2:\"41\";s:7:\"quality\";s:4:\"high\";s:8:\"warrenty\";s:1:\"1\";}'),
(495, 'a:1:{i:0;s:21:\"flower-887443_640.jpg\";}', 'flower', 'sdfgsdgds', 450000, '11', 'a:4:{s:5:\"color\";s:5:\"black\";s:4:\"size\";s:2:\"41\";s:7:\"quality\";s:4:\"high\";s:8:\"warrenty\";s:1:\"1\";}'),
(496, 'a:3:{i:0;s:11:\"Home_47.png\";i:1;s:11:\"Home_49.png\";i:2;s:22:\"flower-887443_6401.jpg\";}', 'logo', 'asf', 100, '11', 'a:4:{s:5:\"color\";s:5:\"black\";s:4:\"size\";s:2:\"41\";s:7:\"quality\";s:4:\"high\";s:8:\"warrenty\";s:1:\"1\";}'),
(498, 'a:1:{i:0;s:17:\"car-49278_640.jpg\";}', 'asffasf', 'asf', 7546842, '11', 'a:4:{s:5:\"color\";s:5:\"black\";s:4:\"size\";s:2:\"41\";s:7:\"quality\";s:4:\"high\";s:8:\"warrenty\";s:1:\"1\";}'),
(499, 'a:2:{i:0;s:19:\"rose-729509_640.jpg\";i:1;s:20:\"rose-2417334_640.jpg\";}', 'rose', 'sdbsd', 450000, 'sdgvsd', 'a:4:{s:5:\"color\";s:5:\"black\";s:4:\"size\";s:2:\"41\";s:7:\"quality\";s:4:\"high\";s:8:\"warrenty\";s:1:\"1\";}'),
(500, 'a:3:{i:0;s:26:\"water-lily-1510707_640.jpg\";i:1;s:26:\"water-lily-1825477_640.jpg\";i:2;s:26:\"water-lily-3478924_640.jpg\";}', 'flower1', 'asdasdasd', 450000, '1111', 'a:4:{s:5:\"color\";s:5:\"black\";s:4:\"size\";s:2:\"41\";s:7:\"quality\";s:4:\"high\";s:8:\"warrenty\";s:1:\"1\";}'),
(501, 'a:1:{i:0;s:21:\"opel-5190050__340.jpg\";}', 'car_old', 'sdasdasdasdasdasd', 2147483647, '1', 'a:4:{s:5:\"color\";s:5:\"black\";s:4:\"size\";s:2:\"41\";s:7:\"quality\";s:4:\"high\";s:8:\"warrenty\";s:1:\"1\";}'),
(502, 'a:1:{i:0;s:27:\"social-media-763731_640.jpg\";}', 'mobile', 'asdd', 150, '1', 'a:4:{s:5:\"color\";s:5:\"black\";s:4:\"size\";s:2:\"41\";s:7:\"quality\";s:4:\"high\";s:8:\"warrenty\";s:1:\"1\";}'),
(504, 'a:2:{i:0;s:28:\"analog-watch-1869928_640.jpg\";i:1;s:28:\"aston-martin-2118857_640.jpg\";}', 'RR', 'werwer', 450000, '11', 'a:4:{s:5:\"color\";s:5:\"black\";s:4:\"size\";s:2:\"41\";s:7:\"quality\";s:4:\"high\";s:8:\"warrenty\";s:1:\"1\";}'),
(505, 'a:1:{i:0;s:28:\"aston-martin-2118857_640.jpg\";}', 'EV', 'dsdfsd', 4547878, '11', 'a:4:{s:5:\"color\";s:5:\"black\";s:4:\"size\";s:2:\"41\";s:7:\"quality\";s:4:\"high\";s:8:\"warrenty\";s:1:\"1\";}'),
(506, 'a:4:{i:0;s:17:\"car-49278_640.jpg\";i:1;s:20:\"car-1661767__340.jpg\";i:2;s:9:\"cart2.png\";i:3;s:20:\"car-4393990__340.jpg\";}', 'sdgsdgsdg', 'sdgd', 450000, '11', 'a:4:{s:5:\"color\";s:5:\"black\";s:4:\"size\";s:2:\"41\";s:7:\"quality\";s:4:\"high\";s:8:\"warrenty\";s:1:\"1\";}'),
(509, 'a:2:{i:0;s:11:\"banner2.jpg\";i:1;s:10:\"banner.jpg\";}', 'test1234', 'test', 450000, '1', 'a:4:{s:5:\"color\";s:5:\"black\";s:4:\"size\";s:5:\"41sss\";s:7:\"quality\";s:4:\"high\";s:8:\"warrenty\";s:1:\"1\";}');

-- --------------------------------------------------------

--
-- Table structure for table `pro_categories`
--

CREATE TABLE `pro_categories` (
  `id` int(11) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `cat_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pro_categories`
--

INSERT INTO `pro_categories` (`id`, `pro_id`, `cat_id`) VALUES
(258, 358, 50),
(262, 362, 55),
(263, 363, 50),
(264, 364, 55),
(265, 365, 50),
(266, 366, 50),
(267, 368, 53),
(268, 369, 50),
(269, 370, 50),
(270, 371, 52),
(271, 372, 52),
(273, 374, 50),
(274, 375, 50),
(275, 376, 50),
(276, 377, 50),
(277, 378, 50),
(278, 379, 50),
(279, 380, 50),
(280, 381, 50),
(281, 382, 52),
(288, 389, 53),
(289, 390, 50),
(290, 391, 50),
(291, 392, 50),
(292, 393, 50),
(293, 394, 50),
(294, 395, 50),
(295, 396, 50),
(296, 397, 50),
(297, 398, 50),
(298, 399, 50),
(299, 400, 50),
(300, 401, 50),
(301, 402, 50),
(302, 403, 52),
(303, 404, 50),
(304, 405, 50),
(305, 406, 50),
(306, 407, 50),
(307, 408, 50),
(308, 409, 50),
(309, 410, 50),
(310, 411, 51),
(312, 413, 50),
(313, 414, 50),
(315, 412, 50),
(316, 415, 50),
(341, 420, 50),
(343, 416, 53),
(345, 418, 50),
(349, 421, 50),
(351, 417, 50),
(355, 425, 50),
(358, 423, 50),
(359, 422, 50),
(363, 427, 50),
(364, 419, 50),
(373, 426, 50),
(374, 428, 50),
(375, 424, 50),
(382, 356, 52),
(383, 357, 52),
(384, 360, 50),
(385, 55, 0),
(386, 55, 0),
(387, 0, 0),
(388, 0, 0),
(389, 122, 122),
(403, 388, 51),
(404, 383, 51),
(405, 349, 50),
(406, 350, 51),
(407, 351, 52),
(408, 352, 53),
(409, 353, 54),
(410, 354, 55),
(411, 355, 52),
(412, 359, 50),
(413, 361, 50),
(414, 384, 50),
(415, 385, 50),
(416, 386, 50),
(417, 387, 50),
(418, 387, 52),
(419, 389, 50),
(420, 393, 50),
(421, 394, 50),
(422, 400, 50),
(423, 402, 50),
(424, 403, 50),
(425, 412, 50),
(426, 417, 51),
(427, 420, 50),
(428, 423, 51),
(429, 425, 51),
(430, 433, 51),
(431, 436, 50),
(432, 440, 50),
(433, 441, 50),
(434, 443, 50),
(435, 444, 51),
(436, 445, 50),
(437, 448, 50),
(438, 449, 50),
(439, 450, 50),
(440, 453, 50),
(441, 455, 50),
(442, 456, 50),
(443, 459, 55),
(444, 461, 50),
(445, 462, 52),
(455, 470, 50),
(470, 474, 65),
(471, 473, 50),
(478, 471, 50),
(497, 472, 55),
(506, 467, 53),
(508, 469, 55),
(509, 475, 50),
(511, 464, 50),
(513, 466, 52),
(515, 479, 52),
(521, 480, 52),
(522, 481, 50),
(545, 482, 54),
(546, 478, 50),
(549, 477, 52),
(551, 476, 50),
(553, 463, 52),
(554, 465, 51),
(556, 468, 54),
(559, 484, 52),
(563, 485, 52),
(565, 486, 54),
(568, 483, 52),
(569, 487, 52),
(571, 489, 53),
(574, 490, 55),
(575, 491, 50),
(577, 492, 54),
(581, 488, 51),
(588, 497, 50),
(606, 503, 69),
(619, 499, 50),
(620, 500, 50),
(621, 500, 55),
(622, 501, 69),
(630, 510, 50),
(634, 511, 50),
(649, 512, 51),
(659, 495, 50),
(660, 496, 54),
(662, 502, 51),
(663, 504, 70),
(664, 505, 69),
(668, 514, 70),
(669, 515, 69),
(670, 517, 51),
(671, 519, 70),
(673, 520, 69),
(675, 507, 50),
(676, 507, 69),
(678, 494, 69),
(686, 506, 53),
(687, 506, 69),
(689, 493, 70),
(701, 508, 51),
(702, 508, 69),
(749, 509, 50),
(750, 509, 51),
(751, 498, 69);

-- --------------------------------------------------------

--
-- Table structure for table `setting_table`
--

CREATE TABLE `setting_table` (
  `id` int(11) NOT NULL,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_table`
--

INSERT INTO `setting_table` (`id`, `setting_key`, `setting_value`) VALUES
(13, 'currency', 'India'),
(14, 'curr_sym', '&#x20B9'),
(15, 'ship_cost', '30'),
(16, 'tax', '5'),
(17, 'site_email', 'abc@123'),
(48, 'abc', 'jasbd');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mob_no` varchar(11) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `user_status` enum('active','deactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `user_name`, `password`, `mob_no`, `user_type`, `user_status`) VALUES
(223, 'admin', 'abc', '132@123', 'admin', '$2y$10$ON4Q9cl3oe3F2w6d0svnK.L8yGpGagyQVWnALmxY8TZvcdZPu/OZu', '4578986532', 'admin', 'active'),
(225, 'Mayur', 'Repale', 'MAYUR@123', 'Mayur', '$2y$10$MH4TiKab1lCbgyrn9oKUMO6I8Q88NYjkn4lBp8eK26tPw9LDr9W8W', '1245789865', 'admin', 'active'),
(238, 'test', 'test', 'test@com', 'test1', '$2y$10$bC0PW8zfzOE8xUaPMVltPeMVzFoHSZjoxs.CXMffb/7j5ZsdyD3FW', '1245789865', 'admin', 'active'),
(239, 'abc', 'abc', 'abc@123', 'abc', '$2y$10$9wfRCQQURFHNCoejir/aeuYX1.YzQLm0YqfxsCCehw2ucYCaEThoi', '4521784512', 'user', 'active'),
(240, 'aaaa', 'aaaa', '132@123', 'aaaa', '$2y$10$uP5afr3M.j0eHPP8H3nFx.Jgliz40E7YOGcGfsOqVBiPbEbSKzvf.', '4521784512', 'user', 'active'),
(241, 'rohit', '111', '132@123', '11111', '$2y$10$v8p6YaM2gAdvE4LLxhFahu3GDYvowYK.WIdy7WT/1UMgpA152djVq', '4521784512', 'user', 'active'),
(245, 'adn1', 'asda', '132@123', '1103', '$2y$10$.Ye/3S0i7mqMJ0XrX7.Z3O23KaF5o5iRCxGsT3CuVWm4w9H4d3ld6', '457898', 'admin', 'active'),
(246, 'awefwefwe', 'asda', '132@123', 'qqaq', '$2y$10$rn3c7gwIeLG0vqkjxnPKROxM2KUqXDYsCqdfgfyIHfyuh4bl.bm/q', '4578986532', 'admin', 'active'),
(247, 'fwefwef234fcse4fgv', 'asda', '132@123', '110', '$2y$10$ofGtuREmQdCUPSeu7uqjv.3E9kbiYI/AKRM9qyYF.kxxG9iMaYXpK', '1245789865', 'user', 'active'),
(250, 'faaf', 'asda', '132@123', 'user', '$2y$10$Kr61JKJB6TiN26PULkaA/eUr0tFjn/hEqg3GMd30yI.Im.b4vqC6u', '4521784512', 'user', 'active'),
(251, 'ROHIT1', 'asda', 'wsef@54', 'ROHIT', '$2y$10$trbA6TCPZit9aROTxrFq1OFmmwElgcZ8pcA/HD.ZhzuU.mU6kNQiO', '4521784512', 'admin', 'active'),
(252, '1q2w', 'asda', '132@123', '1q1q', '$2y$10$1PBX/O1tuvRcVM6KH8AykuQZzzj0jWfnVnQo.p3EiDbA6pkNj9Rpa', '4578986532', 'admin', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `place_order`
--
ALTER TABLE `place_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `pro_categories`
--
ALTER TABLE `pro_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_table`
--
ALTER TABLE `setting_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_key` (`setting_key`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `place_order`
--
ALTER TABLE `place_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=510;
--
-- AUTO_INCREMENT for table `pro_categories`
--
ALTER TABLE `pro_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=752;
--
-- AUTO_INCREMENT for table `setting_table`
--
ALTER TABLE `setting_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
