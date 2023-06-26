-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 01:01 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `password`, `admin_email`, `name`) VALUES
(2, 'jayden', '5ebce7d6811d66582777a8f2e109815f', 'jayden@gmail.com', 'Jayden'),
(4, 'lim', 'Qwer1234', 'limchinghong5355@gmail.com', 'alex');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bag`
--

INSERT INTO `bag` (`bag_id`, `bag_name`, `bag_price`, `bag_stock`, `bag_detail`, `bag_image`) VALUES
(3, 'Yonex Badminton Bag 01', '200.00', 45, 'Yonex is a popular brand that offers a variety of badminton bags for players of all levels. Their bags are made of high-quality materials that provide durability, style, and functionality.', 'image/Yonex badminton bag01.jpg'),
(4, 'Li-Ning Badminton Bag 01', '200.00', 50, 'Li-Ning is another popular badminton brand that offers a variety of bags for players of all levels. Their bags are made of high-quality materials that provide durability, style, and functionality.', 'image/Li-Ning badminton bag 01.jpg\r\n'),
(21, 'Yonex Pro Series 9', '300.00', 50, 'A spacious and durable badminton bag with multiple compartments for racket storage, gear organization, and accessories.', 'image/Yonex Pro Series 9.jpg'),
(22, 'Victor Pro Tour Bag', '300.00', 50, 'A stylish and functional badminton bag designed for professional players. It offers ample storage space and convenient features.', 'image/Victor Pro Tour Bag.jpg'),
(23, 'Li-Ning Turbo Charging Bag', '250.00', 50, 'A lightweight and compact badminton bag suitable for players on the go. It provides easy access to rackets and essentials.', 'image/Li-Ning Turbo Charging Bag.jpeg'),
(24, 'Babolat Essential Club Bag', '200.00', 50, 'An affordable and practical badminton bag for recreational players. It offers sufficient space for rackets and personal items.\r\n', 'image/Babolat Essential Club Bag.jpeg'),
(25, 'Ashaway Pro Tournament Bag', '130.00', 50, 'A compact and durable badminton bag suitable for tournament play. It provides protection and easy transportation of rackets.', 'image/Ashaway Pro Tournament Bag.jpg'),
(26, 'Yonex Backpack Bag', '80.00', 50, 'A compact and lightweight badminton bag that can be worn as a backpack. It offers storage space for rackets and personal belongings.\r\n', 'image/Yonex Backpack Bag.jpg'),
(27, 'Victor Double Compartment Bag', '60.00', 50, 'A practical badminton bag with two compartments for racket storage and accessories. It is suitable for players with minimal gear.', 'image/Victor Double Compartment Bag.jpeg');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clothes`
--

INSERT INTO `clothes` (`clothes_id`, `clothes_name`, `clothes_price`, `clothes_stock`, `clothes_detail`, `clothes_image`) VALUES
(3, 'Yonex Clothes', '150.00', 97, 'Yonex is a well-known brand in the badminton world and offers a wide range of badminton clothing for both men and women. Their clothing is made of high-quality materials that provide comfort, breathability, and flexibility.', 'image/yonexClothes01.jpg'),
(4, 'Li-Ning Clothes', '300.00', 100, 'Li-Ning is another popular badminton clothing brand that offers a variety of clothing options for men and women. Their clothing is made of high-quality materials that provide comfort, durability, and style.', 'image/Li-NingClothes01.jpg'),
(5, 'Victor Clothes', '250.00', 100, 'Victor is a brand that is known for its high-quality badminton equipment and clothing. Their clothing is made of high-quality materials that provide comfort, breathability, and flexibility.', 'image/VictorClothes01.jpg'),
(6, 'Yonex Tournament Shirt', '120.00', 100, 'A high-quality and breathable shirt designed for tournament play. It offers comfort and moisture-wicking properties.', 'image/Yonex Tournament Shirt.jpg'),
(7, 'Victor Pro Team Shorts', '89.00', 100, 'Lightweight and stretchable shorts suitable for professional players. They provide freedom of movement and comfort.', 'image/Victor Pro Team Shorts.jpg'),
(8, 'Li-Ning Badminton Skirt', '80.00', 100, 'A stylish and comfortable skirt suitable for female badminton players. It offers flexibility and moisture management.', 'image/Li-Ning Badminton Skirt.jpeg'),
(9, 'Babolat Performance Polo', '80.00', 100, 'A classic and functional polo shirt suitable for badminton training and casual play. It provides breathability and comfort.', 'image/Babolat Performance Polo.jpg'),
(10, 'Ashaway Training Pants', '70.00', 100, 'Comfortable and durable training pants suitable for badminton practice sessions. They offer a relaxed fit and flexibility.', 'image/Ashaway Training Pants.jpeg'),
(11, 'Carlton Team Jacket', '50.00', 100, 'A lightweight and versatile jacket suitable for warm-up or cool-down periods. It provides warmth and freedom of movement.', 'image/Carlton Team Jacket.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(9, 'lim', 'alex', 'limchinghong5355@gmail.com', '2023-05-31 15:10:59');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `order_total_price`, `customer_name`, `customer_number`, `order_item`, `customer_address`, `payment_method`, `delivery_status`, `user_id`) VALUES
(10, '2023-05-17', 2475, 'Si', '0183882392', 'Yonex Astrox 99 - RM 825.00 x 3 = RM 2,475.00\n', '12, Jalan Nibong', 'TNG', 'PENDING', 3),
(11, '2023-05-17', 1565, 'Jay', '0183882392', 'Yonex Astrox 99 - RM 825.00 x 1 = RM 825.00\nVictor Jetspeed S 12 - RM 740.00 x 1 = RM 740.00\n', '12, Jalan Nibong', 'FPX', 'COMPLETE', 5),
(12, '2023-05-31', 50, 'LIM CHING HONG', '01119295654', '[{\"name\":\"Victor Gold Feather 77\",\"price\":\"50.00\",\"quantity\":\"1\"}]', 'Menara IMC, No 8, Jalan Sultan Ismail, Kuala Lumpur, Malaysia', 'Online Banking', 'PENDING', 18),
(13, '2023-06-06', 825, 'ivan', '0186609887', '[{\"name\":\"Yonex Astrox 99\",\"price\":\"825.00\",\"quantity\":\"1\"}]', '109 , jalanputeri indah', 'Cash on Delivery', 'PENDING', 28),
(14, '2023-06-27', 50, 'ivan', '0123456789', '[{\"name\":\"Victor Gold Feather 77\",\"price\":\"50.00\",\"quantity\":\"1\"}]', '109 , jalan Puteri indah', 'Cash on Delivery', 'PENDING', 29),
(15, '2023-06-27', 790, 'ivan', '0186609887', '[{\"name\":\"Victor Jetspeed S 12\",\"price\":\"740.00\",\"quantity\":\"1\"},{\"name\":\"Victor Gold Feather 77\",\"price\":\"50.00\",\"quantity\":\"1\"}]', '109 , jalan Puteri indah', 'Online Banking', 'PENDING', 29);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `racquet`
--

INSERT INTO `racquet` (`racquet_id`, `racquet_name`, `racquet_price`, `racquet_stock`, `racquet_detail`, `racquet_images`) VALUES
(5, 'Yonex Astrox 99', '825.00', 50, 'This racquet is used by top-ranked players like Kento Momota and Tai Tzu-Ying. It has a head-heavy balance, stiff shaft, and is designed for aggressive attacking players.', 'image/yonex-astrox-99.jpg'),
(6, 'Victor Jetspeed S 12', '740.00', 50, 'This racquet is used by Lee Chong Wei, a retired Malaysian badminton player and former world number one. It has a balanced head and medium-flex shaft, making it versatile for both attacking and defensive play.', 'image/Victor Jetspeed S 12.jpg'),
(9, 'Yonex Voltric Z-Force II', '799.00', 100, 'A powerful and aggressive racquet designed for attacking players. It offers excellent maneuverability and control, making it a popular choice among advanced players.\r\n', 'image/Yonex Voltric Z-Force II.jpg'),
(10, 'Yonex Arcsaber 11.', '800.00', 100, 'A balanced racquet suitable for all-around play. It provides a good blend of power, control, and maneuverability, making it a versatile choice for players of varying playing styles.', 'image/Yonex Arcsaber 11.jpg'),
(11, 'Li-Ning N90 III', '750.00', 100, 'A head-heavy racquet designed for powerful shots and smashes. It offers excellent control and stability, making it a popular choice among advanced players with an aggressive playing style.', 'image/Li-Ning N90 III.jpg'),
(12, 'Victor Thruster K 9900', '888.00', 100, 'A powerful and sturdy racquet designed for aggressive attacking play. It offers excellent stability, power, and control, making it a preferred choice for offensive players.', 'image/Victor Thruster K 9900.jpg'),
(13, 'Li-Ning Windstorm 72', '650.00', 100, 'A lightweight and maneuverable racquet suitable for fast-paced gameplay. It provides excellent speed, control, and agility, making it ideal for players who prefer a quick and defensive playing style.\r\n', 'image/Li-Ning Windstorm 72.jpg'),
(14, 'Babolat Satelite Gravity', '750.00', 100, 'A versatile and well-balanced racquet suitable for all-around play. It offers a good combination of power, control, and maneuverability, making it suitable for players of varying skill levels.', 'image/Babolat Satelite Gravity.jpg'),
(15, 'Babolat X-Feel Origin Power', '700.00', 100, 'A powerful and stable racquet designed for aggressive play. It provides good power and stability, making it suitable for players who rely on powerful shots and smashes.\r\n', 'image/Babolat X-Feel Origin Power.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_id` int(11) NOT NULL,
  `receipt_date` date NOT NULL,
  `receipt_price` float NOT NULL,
  `receipt_details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shoe`
--

INSERT INTO `shoe` (`shoe_id`, `shoe_name`, `shoe_price`, `shoe_stock`, `shoe_detail`, `shoes_images`) VALUES
(2, 'Yonex Power Cushion 65 Z2', '449.00', 100, 'These shoes are designed for fast-paced and aggressive players, with a durable and responsive sole for quick movements.', 'image/Yonex 75th Power Cushion 65 Z 2 Badm 208.jpg'),
(3, 'Li-Ning Way of Wade 3', '459.00', 100, 'Designed in collaboration with NBA player Dwyane Wade, these shoes feature a lightweight and breathable upper for maximum comfort and agility on the court.', 'image/Li-ning way of wade 3.jpg'),
(4, 'Adidas Adizero Court 3', '329.00', 100, 'These shoes are designed for speed, with a lightweight upper and a flexible sole that allows for quick changes in direction.', 'image/adidas adizero court 3.jpg'),
(5, 'Victor SH-A920', '450.00', 100, 'A lightweight and responsive badminton shoe designed for agility and quick movements. It provides good traction and durability.', 'image/Victor SH-A920.jpg'),
(6, 'Li-Ning Ranger TD 70', '350.00', 100, 'A versatile badminton shoe suitable for all playing styles. It offers cushioning, stability, and breathability for enhanced performance.', 'image/Li-Ning Ranger TD 70.jpeg'),
(7, 'Adidas Court Stabil', '500.00', 100, 'A high-performance badminton shoe with excellent stability and grip. It features a supportive design for quick multidirectional movements.', 'image/Adidas Court Stabil.jpeg'),
(8, 'Asics Gel-Rocket', '300.00', 100, 'A reliable and affordable badminton shoe with gel cushioning for shock absorption. It offers good traction and durability.', 'image/Asics Gel-Rocket.jpg'),
(9, 'Mizuno Wave Lightning Z', '500.00', 100, 'A lightweight and responsive badminton shoe known for its excellent fit and comfort. It provides stability and agility on the court.', 'image/Mizuno Wave Lightning Z.jpg'),
(10, 'Salming Viper', '400.00', 100, 'A performance-oriented badminton shoe designed for quick movements and responsiveness. It offers good traction and support.', 'image/Salming Viper.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(20) NOT NULL,
  `shop_address` varchar(50) NOT NULL,
  `shop_contact` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shuttlecock`
--

INSERT INTO `shuttlecock` (`shuttlecock_id`, `shuttlecock_name`, `shuttlecock_price`, `shuttlecock_stock`, `shuttlecock_detail`, `shuttlecock_image`) VALUES
(2, 'Yonex AS-50', '70.00', 50, 'These shuttlecocks are widely used in professional and international badminton tournaments. They are made of high-quality goose feathers, which provide excellent flight stability and durability.', 'image/Yonex AS-50.jpg'),
(3, 'Victor Gold Feather 77', '50.00', 100, 'These shuttlecocks are also made of high-quality goose feathers and are used in professional and amateur badminton tournaments. They have a sturdy cork base, which provides good control and speed.', 'image/Victor Gold Feather 77.jpg'),
(4, 'RSL Classic Tourney No. 3', '60.00', 100, 'These shuttlecocks are made of premium goose feathers and have a durable cork base. They are widely used in international badminton tournaments and provide good flight stability and consistency.', 'image/RSL Classic Tourney No. 3.jpg'),
(5, 'Victor Master Ace', '80.00', 100, 'A durable feather shuttlecock suitable for training and practice sessions. It provides good flight stability and durability.', 'image/Victor Master Ace.jpg'),
(6, 'Li-Ning A+300', '65.00', 100, 'A cost-effective feather shuttlecock suitable for recreational play. It offers decent flight performance and durability.', 'image/Li-Ning A+300.jpg'),
(7, 'RSL Classic Tourney No. 1', '60.00', 100, 'A popular feather shuttlecock with good flight performance and durability. It is suitable for both practice and matches.', 'image/RSL Classic Tourney No. 1.jpg'),
(8, 'Carlton GT2', '50.00', 100, 'A reliable nylon shuttlecock designed for recreational play. It offers consistent flight and durability.', 'image/Carlton GT2.jpg'),
(9, 'Ashaway Bird 2', '35.00', 100, 'An affordable nylon shuttlecock suitable for beginners and casual play. It provides satisfactory flight performance.', 'image/Ashaway Bird 2.jpeg'),
(10, 'Babolat Mavis 350', '45.00', 100, 'A durable and reliable synthetic shuttlecock suitable for practice and training. It offers consistent flight characteristics.', 'image/Babolat Mavis 350.jpg');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `string`
--

INSERT INTO `string` (`string_id`, `string_name`, `string_price`, `string_stock`, `string_detail`, `string_image`) VALUES
(2, 'Yonex BG-66 Ultimax', '24.50', 50, 'This is a high-performance badminton string from Yonex that is used by professional players. It is made of high-quality materials that provide durability, power, and control.', 'image/Yonex BG-66 Ultimax.jpg'),
(3, 'Ashaway Zymax 62 Fire', '30.00', 50, 'This badminton string from Ashaway is made of high-quality materials that provide durability and power. It is designed to enhance the player\'s control and accuracy.', 'image/Ashaway Zymax 62 Fire.jpg'),
(4, 'Victor VBS-63', '25.00', 50, 'Victor\'s VBS-63 badminton string is designed for players who require a balance of power and control. It is made of high-quality materials that provide durability and consistent performance.', 'image/Victor VBS-63.jpg'),
(5, 'Li-Ning No. 1', '40.00', 100, 'An affordable and reliable badminton string offering decent durability and playability. It is suitable for recreational players.', 'image/Li-Ning No. 1.jpg'),
(6, 'Babolat Touch VS', '50.00', 100, 'A premium multifilament badminton string offering exceptional touch and feel. It provides a nice blend of power and control.', 'image/Babolat Touch VS.jpeg'),
(7, 'Ashaway Rally 21', '35.00', 100, 'An affordable nylon badminton string suitable for beginners and casual players. It offers durability and moderate performance.', 'image/Ashaway Rally 21.jpg'),
(8, 'Wilson NXT', '50.00', 100, 'A high-quality multifilament badminton string known for its comfort and arm-friendly properties. It provides good power and control.', 'image/Wilson NXT.jpg'),
(9, 'Lining No. 3', '30.00', 100, 'An entry-level badminton string suitable for beginners and recreational players. It offers basic performance and durability.', 'image/Lining No. 3.jpg'),
(10, 'Gosen OG-Sheep Micro', '40.00', 100, 'A cost-effective badminton string with decent durability and playability. It is suitable for players on a budget.', 'image/Gosen OG-Sheep Micro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `superadmin_id` int(11) NOT NULL,
  `superadmin_name` varchar(20) NOT NULL,
  `superadmin_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`superadmin_id`, `superadmin_name`, `superadmin_email`, `password`, `name`) VALUES
(1, 'superadmin01', 'superadmin01@gmail.com', '5ebce7d6811d66582777a8f2e109815f', 'Jayden'),
(2, 'superadmin02', 'superadmin02@gmail.com', '5ebce7d6811d66582777a8f2e109815f', 'Alex');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(20) NOT NULL,
  `supplier_contact` int(15) NOT NULL,
  `supplier_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supply order`
--

CREATE TABLE `supply order` (
  `supply_id` int(11) NOT NULL,
  `supply_price` float NOT NULL,
  `supply_date` date NOT NULL,
  `supply_details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supply receipt`
--

CREATE TABLE `supply receipt` (
  `supply_receipt_id` int(11) NOT NULL,
  `supply_receipt_date` date NOT NULL,
  `supply_receipt_price` float NOT NULL,
  `supply_receipt_details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `contact`, `password`, `address`, `verification_token`, `verified`) VALUES
(29, 'ivan', 'tzeearn0205300723@gmail.com', '', '$2y$10$g.SDsVsWxo/a6DnoUalSh.D5e.0CIbl.md/HR5eMf2qN83r1BgPnm', '', '74baab015a626aef8d32b6c19e7dd990d155eb4c461a86a044d0cb0966a8e79b', 1);

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
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_id`);

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
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`superadmin_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `supply order`
--
ALTER TABLE `supply order`
  ADD PRIMARY KEY (`supply_id`);

--
-- Indexes for table `supply receipt`
--
ALTER TABLE `supply receipt`
  ADD PRIMARY KEY (`supply_receipt_id`);

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
  MODIFY `bag_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `clothes`
--
ALTER TABLE `clothes`
  MODIFY `clothes_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loginhistory`
--
ALTER TABLE `loginhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `racquet`
--
ALTER TABLE `racquet`
  MODIFY `racquet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shoe`
--
ALTER TABLE `shoe`
  MODIFY `shoe_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shuttlecock`
--
ALTER TABLE `shuttlecock`
  MODIFY `shuttlecock_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `string`
--
ALTER TABLE `string`
  MODIFY `string_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `superadmin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supply order`
--
ALTER TABLE `supply order`
  MODIFY `supply_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supply receipt`
--
ALTER TABLE `supply receipt`
  MODIFY `supply_receipt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
