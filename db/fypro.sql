-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 04:29 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fypro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `password`, `admin_email`, `name`) VALUES
(4, 'admin01', 'Yang_031113', 'user01@gmail.com', 'Si E Yang');

-- --------------------------------------------------------

--
-- Table structure for table `archive_order`
--

CREATE TABLE `archive_order` (
  `id` int(11) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_number` varchar(255) NOT NULL,
  `customer_address` varchar(1000) NOT NULL,
  `order_item` varchar(1000) NOT NULL,
  `order_total_price` float NOT NULL,
  `payment_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `archive_product`
--

CREATE TABLE `archive_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(7,2) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_detail` varchar(1000) NOT NULL,
  `product_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bag`
--

CREATE TABLE `bag` (
  `bag_id` int(3) NOT NULL,
  `bag_name` varchar(255) NOT NULL,
  `bag_price` decimal(7,2) NOT NULL,
  `bag_stock` int(3) NOT NULL,
  `bag_detail` varchar(1000) NOT NULL,
  `bag_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bag`
--

INSERT INTO `bag` (`bag_id`, `bag_name`, `bag_price`, `bag_stock`, `bag_detail`, `bag_image`) VALUES
(3, 'Yonex Badminton Bag 01', '200.00', 45, 'Yonex is a popular brand that offers a variety of badminton bags for players of all levels. Their bags are made of high-quality materials that provide durability, style, and functionality.', 'image/Yonex badminton bag01.jpg'),
(4, 'Li-Ning Badminton Bag 01', '200.00', 49, 'Li-Ning is another popular badminton brand that offers a variety of bags for players of all levels. Their bags are made of high-quality materials that provide durability, style, and functionality.', 'image/Li-Ning badminton bag 01.jpg\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `product_name`, `product_price`, `product_image`, `quantity`, `total_price`, `user_id`) VALUES
(12, 5, 'Yonex Astrox 99', '825.00', 'image/yonex-astrox-99.jpg', 1, '825.00', 5),
(13, 4, 'Li-Ning Clothes', '300.00', 'image/Li-NingClothes01.jpg', 1, '300.00', 1),
(16, 3, 'Yonex Badminton Bag 01', '200.00', 'image/Yonex badminton bag01.jpg', 1, '200.00', 0),
(17, 3, 'Yonex Badminton Bag 01', '200.00', 'image/Yonex badminton bag01.jpg', 1, '200.00', 0),
(18, 3, 'Yonex Badminton Bag 01', '200.00', 'image/Yonex badminton bag01.jpg', 1, '200.00', 0),
(19, 4, 'Li-Ning Clothes', '300.00', 'image/Li-NingClothes01.jpg', 1, '300.00', 0),
(20, 4, 'Li-Ning Clothes', '300.00', 'image/Li-NingClothes01.jpg', 1, '300.00', 0),
(21, 4, 'Li-Ning Badminton Bag 01', '200.00', 'image/Li-Ning badminton bag 01.jpg\r\n', 1, '200.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `clothes`
--

CREATE TABLE `clothes` (
  `clothes_id` int(3) NOT NULL,
  `clothes_name` varchar(255) NOT NULL,
  `clothes_price` decimal(7,2) NOT NULL,
  `clothes_stock` int(3) NOT NULL,
  `clothes_detail` varchar(1000) NOT NULL,
  `clothes_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clothes`
--

INSERT INTO `clothes` (`clothes_id`, `clothes_name`, `clothes_price`, `clothes_stock`, `clothes_detail`, `clothes_image`) VALUES
(3, 'Yonex Clothes', '150.00', 99, 'Yonex is a well-known brand in the badminton world and offers a wide range of badminton clothing for both men and women. Their clothing is made of high-quality materials that provide comfort, breathability, and flexibility.', 'image/yonexClothes01.jpg'),
(4, 'Li-Ning Clothes', '300.00', 100, 'Li-Ning is another popular badminton clothing brand that offers a variety of clothing options for men and women. Their clothing is made of high-quality materials that provide comfort, durability, and style.', 'image/Li-NingClothes01.jpg'),
(5, 'Victor Clothes', '250.00', 100, 'Victor is a brand that is known for its high-quality badminton equipment and clothing. Their clothing is made of high-quality materials that provide comfort, breathability, and flexibility.', 'image/VictorClothes01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loginhistory`
--

CREATE TABLE `loginhistory` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginhistory`
--

INSERT INTO `loginhistory` (`id`, `username`, `name`, `email`, `time`) VALUES
(2, 'jayden', 'Jayden', 'jayden@gmail.com', '2023-05-14 15:30:01'),
(3, 'jayden', 'Jayden', 'jayden@gmail.com', '2023-05-14 17:23:44'),
(4, 'jayden', 'Jayden', 'jayden@gmail.com', '2023-05-14 17:43:21'),
(5, 'jayden', 'Jayden', 'jayden@gmail.com', '2023-05-14 17:52:50'),
(6, 'jayden', 'Jayden', 'jayden@gmail.com', '2023-05-15 14:44:07'),
(7, 'jayden', 'Jayden', 'jayden@gmail.com', '2023-05-15 14:59:07'),
(8, 'jayden', 'Jayden', 'jayden@gmail.com', '2023-05-15 18:20:00'),
(9, 'admin01', 'Si E Yang', 'user01@gmail.com', '2023-05-31 14:11:20'),
(10, 'admin01', 'Si E Yang', 'user01@gmail.com', '2023-05-31 14:54:09'),
(11, 'admin01', 'Si E Yang', 'user01@gmail.com', '2023-06-06 23:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_total_price` float NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_number` varchar(255) NOT NULL,
  `order_item` varchar(1000) NOT NULL,
  `customer_address` varchar(1000) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `delivery_status` varchar(255) NOT NULL DEFAULT 'PENDING',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `order_total_price`, `customer_name`, `customer_number`, `order_item`, `customer_address`, `payment_method`, `delivery_status`, `user_id`) VALUES
(10, '2023-05-17', 2475, 'Si', '0183882392', 'Yonex Astrox 99 - RM 825.00 x 3 = RM 2,475.00\n', '12, Jalan Nibong', 'TNG', 'PENDING', 3),
(11, '2023-05-17', 1565, 'Jay', '0183882392', 'Yonex Astrox 99 - RM 825.00 x 1 = RM 825.00\nVictor Jetspeed S 12 - RM 740.00 x 1 = RM 740.00\n', '12, Jalan Nibong', 'FPX', 'COMPLETE', 5);

-- --------------------------------------------------------

--
-- Table structure for table `racquet`
--

CREATE TABLE `racquet` (
  `racquet_id` int(11) NOT NULL,
  `racquet_name` varchar(255) NOT NULL,
  `racquet_price` decimal(7,2) NOT NULL,
  `racquet_stock` int(3) NOT NULL,
  `racquet_detail` varchar(1000) NOT NULL,
  `racquet_images` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `racquet`
--

INSERT INTO `racquet` (`racquet_id`, `racquet_name`, `racquet_price`, `racquet_stock`, `racquet_detail`, `racquet_images`) VALUES
(5, 'Yonex Astrox 99', '825.00', 50, 'This racquet is used by top-ranked players like Kento Momota and Tai Tzu-Ying. It has a head-heavy balance, stiff shaft, and is designed for aggressive attacking players.', 'image/yonex-astrox-99.jpg'),
(6, 'Victor Jetspeed S 12', '740.00', 50, 'This racquet is used by Lee Chong Wei, a retired Malaysian badminton player and former world number one. It has a balanced head and medium-flex shaft, making it versatile for both attacking and defensive play.', 'image/Victor Jetspeed S 12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shoe`
--

CREATE TABLE `shoe` (
  `shoe_id` int(3) NOT NULL,
  `shoe_name` varchar(255) NOT NULL,
  `shoe_price` decimal(7,2) NOT NULL,
  `shoe_stock` int(3) NOT NULL,
  `shoe_detail` varchar(1000) NOT NULL,
  `shoes_images` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shoe`
--

INSERT INTO `shoe` (`shoe_id`, `shoe_name`, `shoe_price`, `shoe_stock`, `shoe_detail`, `shoes_images`) VALUES
(2, 'Yonex Power Cushion 65 Z2', '449.00', 100, 'These shoes are designed for fast-paced and aggressive players, with a durable and responsive sole for quick movements.', 'image/Yonex 75th Power Cushion 65 Z 2 Badm 208.jpg'),
(3, 'Li-Ning Way of Wade 3', '459.00', 100, 'Designed in collaboration with NBA player Dwyane Wade, these shoes feature a lightweight and breathable upper for maximum comfort and agility on the court.', 'image/Li-ning way of wade 3.jpg'),
(4, 'Adidas Adizero Court 3', '329.00', 100, 'These shoes are designed for speed, with a lightweight upper and a flexible sole that allows for quick changes in direction.', 'image/adidas adizero court 3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(20) NOT NULL,
  `shop_address` varchar(50) NOT NULL,
  `shop_contact` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shuttlecock`
--

CREATE TABLE `shuttlecock` (
  `shuttlecock_id` int(3) NOT NULL,
  `shuttlecock_name` varchar(255) NOT NULL,
  `shuttlecock_price` decimal(7,2) NOT NULL,
  `shuttlecock_stock` int(3) NOT NULL,
  `shuttlecock_detail` varchar(1000) NOT NULL,
  `shuttlecock_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shuttlecock`
--

INSERT INTO `shuttlecock` (`shuttlecock_id`, `shuttlecock_name`, `shuttlecock_price`, `shuttlecock_stock`, `shuttlecock_detail`, `shuttlecock_image`) VALUES
(2, 'Yonex AS-50', '70.00', 50, 'These shuttlecocks are widely used in professional and international badminton tournaments. They are made of high-quality goose feathers, which provide excellent flight stability and durability.', 'image/Yonex AS-50.jpg'),
(3, 'Victor Gold Feather 77', '50.00', 100, 'These shuttlecocks are also made of high-quality goose feathers and are used in professional and amateur badminton tournaments. They have a sturdy cork base, which provides good control and speed.', 'image/Victor Gold Feather 77.jpg'),
(4, 'RSL Classic Tourney No. 3', '60.00', 100, 'These shuttlecocks are made of premium goose feathers and have a durable cork base. They are widely used in international badminton tournaments and provide good flight stability and consistency.', 'image/RSL Classic Tourney No. 3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `string`
--

CREATE TABLE `string` (
  `string_id` int(3) NOT NULL,
  `string_name` varchar(255) NOT NULL,
  `string_price` decimal(7,2) NOT NULL,
  `string_stock` int(3) NOT NULL,
  `string_detail` varchar(1000) NOT NULL,
  `string_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `string`
--

INSERT INTO `string` (`string_id`, `string_name`, `string_price`, `string_stock`, `string_detail`, `string_image`) VALUES
(2, 'Yonex BG-66 Ultimax', '24.50', 50, 'This is a high-performance badminton string from Yonex that is used by professional players. It is made of high-quality materials that provide durability, power, and control.', 'image/Yonex BG-66 Ultimax.jpg'),
(3, 'Ashaway Zymax 62 Fire', '30.00', 50, 'This badminton string from Ashaway is made of high-quality materials that provide durability and power. It is designed to enhance the player\'s control and accuracy.', 'image/Ashaway Zymax 62 Fire.jpg'),
(4, 'Victor VBS-63', '25.00', 50, 'Victor\'s VBS-63 badminton string is designed for players who require a balance of power and control. It is made of high-quality materials that provide durability and consistent performance.', 'image/Victor VBS-63.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `contact`, `password`, `address`, `verification_token`, `verified`) VALUES
(3, 'user1', 'user1@gmail.com', '', '5ebce7d6811d66582777a8f2e109815f', '', NULL, 0),
(4, 'user', 'user@gmail.com', '', '$2y$10$p/OLSsu9Q9Hjcf6zKY44xeEq.Z9Qh0/IcHENdj1VVXdlxYpNWPfda', '', NULL, 0),
(5, 'JaydenSi', 'jay@gmail.com', '013-2456789', '5ebce7d6811d66582777a8f2e109815f', '12, Jalan Hari 23, Taman Bulan, 81100', NULL, 0),
(6, 'summer117', '1211204346@student.mmu.edu.my', '', '$2y$10$Hxxi6i5lpWY/e1I00.aCGOsHqOfblnv.sgHxeUwsfvZZAEB1cblHW', '', NULL, 0),
(7, 'jcng101', '1211204451@student.mmu.edu.my', '', '$2y$10$Pc1PiadTSyaXXR/BbkAOnOepf.3lSFKkSHr02BLgzTqzEd848zGsW', '', NULL, 0),
(18, 's123', 'limchinghong5355@gmail.com', '012-3456789', '$2y$10$VflrxyF80dqcFehqg0aWKOwbgMPrqupcsKWd0EmIpJpd/9WEg9P.i', 'No 20, Jalan Nibong 12, Taman Daya', '3237593691734b960a8aa9016c1e04df4bb2ded07e741b90810195eb9555ed4e', 1),
(22, 'Jaye', '1211203714@student.mmu.edu.my', '', '$2y$10$PviXoDNQqp5sX8BI6lZgzeIR.UFjPajmtMBvwyWLdaEKk.U//qRmW', '', '9122bd0cd83ac0d4118b28f2b7a40c47fc86e37edd176fc119449eee4ded78c3', 1),
(23, 'user02', 'iameyang1113@gmail.com', '', '$2y$10$m19OIWeDRLCQ2ENPe2yFg.Zg9GmhdVEsB2Qzin1tPhP2pClSgI2sO', '', 'eb92e12682541817736cf8dc283b2bdaa360ac6c9a3e02625ba7d930a0045925', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `archive_order`
--
ALTER TABLE `archive_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive_product`
--
ALTER TABLE `archive_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `bag`
--
ALTER TABLE `bag`
  ADD PRIMARY KEY (`bag_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clothes`
--
ALTER TABLE `clothes`
  ADD PRIMARY KEY (`clothes_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginhistory`
--
ALTER TABLE `loginhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `racquet`
--
ALTER TABLE `racquet`
  ADD PRIMARY KEY (`racquet_id`);

--
-- Indexes for table `shoe`
--
ALTER TABLE `shoe`
  ADD PRIMARY KEY (`shoe_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `shuttlecock`
--
ALTER TABLE `shuttlecock`
  ADD PRIMARY KEY (`shuttlecock_id`);

--
-- Indexes for table `string`
--
ALTER TABLE `string`
  ADD PRIMARY KEY (`string_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `archive_order`
--
ALTER TABLE `archive_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `archive_product`
--
ALTER TABLE `archive_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bag`
--
ALTER TABLE `bag`
  MODIFY `bag_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `clothes`
--
ALTER TABLE `clothes`
  MODIFY `clothes_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loginhistory`
--
ALTER TABLE `loginhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `racquet`
--
ALTER TABLE `racquet`
  MODIFY `racquet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shoe`
--
ALTER TABLE `shoe`
  MODIFY `shoe_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shuttlecock`
--
ALTER TABLE `shuttlecock`
  MODIFY `shuttlecock_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `string`
--
ALTER TABLE `string`
  MODIFY `string_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
