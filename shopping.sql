-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2021 at 08:08 PM
-- Server version: 8.0.22
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-01-24 16:21:18', '02-11-2021 12:04:51 AM');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `productid` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `user_id` int DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fname`, `lname`, `email`, `phone`, `message`) VALUES
(1, 'Akshay', 'Bahadarpure', 'akgbahadarpure@gmail.com', '1231212323123123', 'asasd'),
(2, 'Akshay', 'Bahadarpure', 'akgbahadarpure@gmail.com', '1231212323123123', 'asasd');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bankname` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `holdername` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `accno` varchar(200) NOT NULL,
  `idfccode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `orderDate`, `bankname`, `holdername`, `accno`, `idfccode`) VALUES
(6, 1, '2021-10-08 19:21:38', 'COD', NULL, '', ''),
(8, 14, '2021-10-31 19:26:26', 'asdasd', 'asas', 'asdasd', 'asdasd'),
(9, 14, '2021-11-02 14:31:12', 'asdasd', 'asdasd', '2234234', 'e2312');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `order_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `product_id`, `quantity`, `order_id`) VALUES
(1, 19, 3, 7),
(2, 17, 2, 7),
(3, 16, 2, 7),
(4, 19, 3, 8),
(5, 17, 2, 8),
(6, 20, 2, 9),
(7, 20, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productPrice` int DEFAULT NULL,
  `productPriceBeforeDiscount` int DEFAULT NULL,
  `productDescription` longtext,
  `specifications` text,
  `productImage1` varchar(255) DEFAULT NULL,
  `shippingCharge` int DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `productPrice`, `productPriceBeforeDiscount`, `productDescription`, `specifications`, `productImage1`, `shippingCharge`, `productAvailability`, `postingDate`, `updationDate`) VALUES
(3, 'Redmi Note 4 (Gold, 32 GB)  (With 3 GB RAM)', 10999, 0, '<br><div><ol><li>3 GB RAM | 32 GB ROM | Expandable Upto 128 GB<br></li><li>5.5 inch Full HD Display<br></li><li>13MP Primary Camera | 5MP Front<br></li><li>4100 mAh Li-Polymer Battery<br></li><li>Qualcomm Snapdragon 625 64-bit Processor<br></li></ol></div>', NULL, 'mi-redmi-note-4-1.jpeg', 0, 'In Stock', '2017-02-04 04:03:15', ''),
(4, 'Lenovo K6 Power (Silver, 32 GB) ', 9999, 0, '<ul><li>3 GB RAM | 32 GB ROM | Expandable Upto 128 GB<br></li><li>5 inch Full HD Display<br></li><li>13MP Primary Camera | 8MP Front<br></li><li>4000 mAh Li-Polymer Battery<br></li><li>Qualcomm Snapdragon 430 Processor<br></li></ul>', NULL, 'lenovo-k6-power-k33a42-1.jpeg', 45, 'In Stock', '2017-02-04 04:04:43', ''),
(5, 'Lenovo Vibe K5 Note (Gold, 32 GB)  ', 11999, 0, '<ul><li>3 GB RAM | 32 GB ROM | Expandable Upto 128 GB<br></li><li>5.5 inch Full HD Display<br></li><li>13MP Primary Camera | 8MP Front<br></li><li>3500 mAh Li-Ion Polymer Battery<br></li><li>Helio P10 64-bit Processor<br></li></ul>', NULL, 'lenovo-k5-note-pa330010in-1.jpeg', 0, 'In Stock', '2017-02-04 04:06:17', ''),
(6, 'Micromax Canvas Mega 4G', 6999, 0, '<ul><li>3 GB RAM | 16 GB ROM |<br></li><li>5.5 inch HD Display<br></li><li>13MP Primary Camera | 5MP Front<br></li><li>2500 mAh Battery<br></li><li>MT6735 Processor<br></li></ul>', NULL, 'micromax-canvas-mega-4g-1.jpeg', 35, 'In Stock', '2017-02-04 04:08:07', ''),
(7, 'SAMSUNG Galaxy On5', 7490, 0, '<ul><li>1.5 GB RAM | 8 GB ROM | Expandable Upto 128 GB<br></li><li>5 inch HD Display<br></li><li>8MP Primary Camera | 5MP Front<br></li><li>2600 mAh Li-Ion Battery<br></li><li>Exynos 3475 Processor<br></li></ul>', NULL, 'samsung-galaxy-on7-sm-1.jpeg', 20, 'In Stock', '2017-02-04 04:10:17', ''),
(8, 'OPPO A57', 14990, 0, '<ul><li>3 GB RAM | 32 GB ROM | Expandable Upto 256 GB<br></li><li>5.2 inch HD Display<br></li><li>13MP Primary Camera | 16MP Front<br></li><li>2900 mAh Battery<br></li><li>Qualcomm MSM8940 64-bit Processor<br></li></ul>', NULL, 'oppo-a57-na-original-1.jpeg', 0, 'In Stock', '2017-02-04 04:11:54', ''),
(9, 'Affix Back Cover for Mi Redmi Note 4', 259, 0, '<ul><li>Suitable For: Mobile<br></li><li>Material: Polyurethane<br></li><li>Theme: No Theme<br></li><li>Type: Back Cover<br></li><li>Waterproof<br></li></ul>', NULL, 'amzer-amz98947-original-1.jpeg', 10, 'In Stock', '2017-02-04 04:17:03', ''),
(11, 'Acer ES 15 Pentium Quad Core', 19990, 0, '<ul><li>Intel Pentium Quad Core Processor ( )<br></li><li>4 GB DDR3 RAM<br></li><li>Linux/Ubuntu Operating System<br></li><li>1 TB HDD<br></li><li>15.6 inch Display<br></li></ul>', NULL, 'acer-aspire-notebook-original-1.jpeg', 0, 'In Stock', '2017-02-04 04:26:17', ''),
(12, 'Micromax Canvas Laptab II (WIFI) Atom 4th Gen', 10999, 0, '<ul><li>Intel Atom Processor ( 4th Gen )<br></li><li>2 GB DDR3 RAM<br></li><li>32 bit Windows 10 Operating System<br></li><li>11.6 inch Touchscreen Display<br></li></ul>', NULL, 'micromax-lt777w-2-in-1-laptop-original-1.jpeg', 0, 'In Stock', '2017-02-04 04:28:17', ''),
(13, 'HP Core i5 5th Gen', 41990, 0, '<span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">HP Core i5 5th Gen - (4 GB/1 TB HDD/Windows 10 Home/2 GB Graphics) N8M28PA 15-ac123tx Notebook</span><span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">&nbsp;&nbsp;(15.6 inch, Turbo SIlver, 2.19 kg)</span><br><div><ul><li>Intel Core i5 Processor ( 5th Gen )<br></li><li>4 GB DDR3 RAM<br></li><li>64 bit Windows 10 Operating System<br></li><li>1 TB HDD<br></li><li>15.6 inch Display<br></li></ul></div>', NULL, 'hp-notebook-original-1.jpeg', 0, 'In Stock', '2017-02-04 04:30:24', ''),
(14, 'Lenovo Ideapad 110 APU Quad Core A6 6th Gen', 22990, 0, '<span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">Lenovo Ideapad 110 APU Quad Core A6 6th Gen - (4 GB/500 GB HDD/Windows 10 Home) 80TJ00D2IH IP110 15ACL Notebook</span><span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">&nbsp;&nbsp;(15.6 inch, Black, 2.2 kg)</span><br><div><ul><li>AMD APU Quad Core A6 Processor ( 6th Gen )<br></li><li>4 GB DDR3 RAM<br></li><li>64 bit Windows 10 Operating System<br></li><li>500 GB HDD<br></li><li>15.6 inch Display<br></li></ul></div>', NULL, 'lenovo-ideapad-notebook-original-1.jpeg', 0, 'In Stock', '2017-02-04 04:32:15', ''),
(15, 'The Wimpy Kid Do -It- Yourself Book', 205, 250, '<span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">The Wimpy Kid Do -It- Yourself Book</span><span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">&nbsp;&nbsp;(English, Paperback, Jeff Kinney)</span><br><div><ul><li>Language: English<br></li><li>Binding: Paperback<br></li><li>Publisher: Penguin Books Ltd<br></li><li>ISBN: 9780141339665, 0141339667<br></li><li>Edition: 1<br></li></ul></div>', NULL, 'diary-of-a-wimpy-kid-do-it-yourself-book-original-1.jpeg', 50, 'In Stock', '2017-02-04 04:35:13', ''),
(16, 'Thea Stilton and the Tropical Treasure ', 240, 0, '<ul><li>Language: English<br></li><li>Binding: Paperback<br></li><li>Publisher: Scholastic<br></li><li>ISBN: 9789351032083, 9351032086<br></li><li>Edition: 2015<br></li><li>Pages: 176<br></li></ul>', NULL, '22-thea-stilton-and-the-tropical-treasure-original-1.jpeg', 30, 'In Stock', '2017-02-04 04:36:23', ''),
(17, 'Induscraft Solid Wood King Bed With Storage', 32566, 0, '<span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">Induscraft Solid Wood King Bed With Storage</span><span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">&nbsp;&nbsp;(Finish Color - Honey Brown)</span><br><div><ul><li>Material Subtype: Rosewood (Sheesham)<br></li><li>W x H x D: 1850 mm x 875 mm x 2057.5 mm<br></li><li>Floor Clearance: 8 mm<br></li><li>Delivery Condition: Knock Down<br></li></ul></div>', NULL, 'inaf245-queen-rosewood-sheesham-induscraft-na-honey-brown-original-1.jpeg', 0, 'In Stock', '2017-02-04 04:40:37', ''),
(18, 'Nilkamal Ursa Metal Queen Bed', 6523, 0, '<span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">@home by Nilkamal Ursa Metal Queen Bed</span><span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">&nbsp;&nbsp;(Finish Color - NA)</span><br><div><ul><li>Material Subtype: Carbon Steel<br></li><li>W x H x D: 1590 mm x 910 mm x 2070 mm<br></li><li>Floor Clearance: 341 mm<br></li><li>Delivery Condition: Knock Down<br></li></ul></div>', NULL, 'flbdorsabrqbblk-queen-carbon-steel-home-by-nilkamal-na-na-original-1.jpeg', 0, 'In Stock', '2017-02-04 04:42:27', ''),
(19, 'Asian Casuals  (White, White)', 379, 0, '<ul style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 0px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 14px;\"><li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">Colour: White, White</li><li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 16px; list-style: none; position: relative;\">Outer Material: Denim</li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\"><br></div></li></ul>', NULL, '1.jpeg', 45, 'In Stock', '2017-03-10 20:16:03', ''),
(20, 'Adidas MESSI 16.3 TF Football turf Shoes  (Blue)', 4129, 5000, '<ul style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 0px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 14px;\"><li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">Colour: Blue</li><li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 16px; list-style: none; position: relative;\">Closure: Laced</li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\"><b>Weight</b></div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\"><b>200 g (per single Shoe) - Weight of the product may vary depending on size.</b></li></ul></li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\"><b>Style</b></div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\"><b>Panel and Stitch Detail, Textured Detail</b></li></ul></li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\"><b>Tip Shape</b></div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\"><b>Round</b></li></ul></li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\"><b>Season</b></div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\"><b>AW16</b></li></ul></li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\"><b>Closure</b></div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\"><b>Laced</b></li></ul></li></ul>', '\r\n                        \r\n                    \r\n\r\n                    \r\n\r\n                    \r\n\r\n                    \r\n\r\n                    \r\n\r\n                    \r\n\r\n                    \r\n\r\n                    \r\n\r\n                    \r\n\r\n                    \r\n\r\n                    \r\n                        \r\n                        <table class=\"table_table\"><tbody><tr><td class=\"spce\">Model</td><td>SR09CNG &amp; SR09CNG SUPER</td></tr><tr>\r\n                        <td class=\"spce\">Weight</td>\r\n                        <td>1.68 KG &amp; 1.92 KG</td>\r\n                    </tr><tr>\r\n                        <td class=\"spce\">Dimensions</td>\r\n                        <td>144x123x154 mm &amp; <br> 150x105x154 mm</td>\r\n                    </tr><tr>\r\n                        <td class=\"spce\">Material</td>\r\n                        <td> Die Cast Aluminium Body</td>\r\n                    </tr><tr> \r\n                        <td class=\"spce\">Max. Inlet Pressure</td>\r\n                        <td>260 Bar</td>\r\n                    </tr><tr>\r\n                        <td class=\"spce\">Outlet Pressure</td>\r\n                        <td>Adjustable from 0.9 till 2.6 Bar</td>\r\n                    </tr><tr>\r\n                        <td class=\"spce\">Solenoid Voltage</td>\r\n                        <td>12V DC</td>\r\n                    </tr><tr>\r\n                        <td class=\"spce\">Coil Power Consumption</td>\r\n                        <td>17W</td>\r\n                    </tr><tr>\r\n                        <td class=\"spce\">Inlet Connection</td>\r\n                        <td>ø6 mm pipe, M 12x1</td>\r\n                    </tr><tr>\r\n                        <td class=\"spce\">Outlet Connection</td>\r\n                        <td>ø12 mm</td>\r\n                    </tr><tr><td class=\"spce\">Engine Power</td><td>Upto 250 HP</td></tr></tbody></table>', '1.jpeg', 0, 'In Stock', '2017-03-10 20:19:22', ''),
(21, 'CNG Sequential Reducer (CNGR03A & CNGSR03A SUPER)', 5000, 5500, '', '\r\n                        \r\n                    \r\n\r\n                    \r\n\r\n                    \r\n\r\n                    \r\n\r\n                    \r\n\r\n                    \r\n\r\n                    \r\n\r\n                    \r\n\r\n                    \r\n\r\n                    \r\n\r\n                    \r\n                        \r\n                        <table class=\"table_table\"><tbody><tr><td class=\"spce\">Model</td><td>CNGSR03A &amp; CNGSR03A SUPER</td></tr><tr>\r\n                        <td class=\"spce\">Weight</td>\r\n                        <td>1.72 kg &amp; 1.95 kg</td>\r\n                    </tr><tr>\r\n                        <td class=\"spce\">Dimensions</td>\r\n                        <td>176x32x140 mm &amp; <br> 138x92x140 mm</td>\r\n\r\n                    </tr><tr>\r\n                        <td class=\"spce\">Material</td>\r\n                        <td>Die Cast Aluminium Body</td>\r\n                    </tr><tr>\r\n                        <td class=\"spce\">Max. Inlet Pressure</td>\r\n                        <td>260 Bar</td>\r\n                    </tr><tr>\r\n                        <td class=\"spce\">Outlet Pressure</td>\r\n                        <td> Adjustable from 0.90 till 2.60 Bar</td>\r\n                    </tr><tr>\r\n                        <td class=\"spce\">Solenoid Voltage</td>\r\n                        <td> 12V DC</td>\r\n                    </tr><tr>\r\n                        <td class=\"spce\">Coid Power Consumption</td>\r\n                        <td>17W</td>\r\n                    </tr><tr>\r\n                        <td class=\"spce\">Inlet Connection</td>\r\n                        <td>ø6 mm pipe, M 12x1</td>\r\n                    </tr><tr>\r\n                        <td class=\"spce\">Outlet Connection</td>\r\n                        <td>ø12 mm</td>\r\n                    </tr><tr><td class=\"spce\">Engine Power</td><td> Upto 250 HP</td></tr></tbody></table>', 'p1.png', 0, 'In Stock', '2021-10-30 17:21:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shippingAddress` longtext,
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` int DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `contactno`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `regDate`, `updationDate`) VALUES
(1, 'Anuj Kumar', '', 'anuj.lpu1@gmail.com', 9009857868, 'f925916e2754e5e03f75dd58a5733251', 'CS New Delhi', 'New Delhi', 'Delhi', 110001, '2017-02-04 19:30:50', ''),
(2, 'Amit ', '', 'amit@gmail.com', 8285703355, '5c428d8875d2948607f3e3fe134d71b4', '', '', '', 0, '2017-03-15 17:21:22', ''),
(3, 'hg', '', 'hgfhgf@gmass.com', 1121312312, '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', 0, '2018-04-29 09:30:32', ''),
(4, 'asdas', 'asdasd', 'akgbahadarpure@gmail.com', 2323232323232, 'Agb@9096', 'asdasdas', NULL, NULL, NULL, '2021-10-31 14:57:57', NULL),
(5, 'asdas', 'asdasd', 'akgbahadarpure@gmail.com', 2323232323232, 'Agb@9096', 'asdasdas', NULL, NULL, NULL, '2021-10-31 15:05:05', NULL),
(6, 'asdas', 'asdasd', 'akgbahadarpure@gmail.com', 2323232323232, 'Agb@9096', 'asdasdas', NULL, NULL, NULL, '2021-10-31 15:05:18', NULL),
(7, 'asdas', 'asdasd', 'akgbahadarpure@gmail.com', 2323232323232, 'Agb@9096', 'asdasdas', NULL, NULL, NULL, '2021-10-31 15:05:58', NULL),
(8, 'asdas', 'asdasd', 'akgbahadarpure@gmail.com', 2323232323232, 'Agb@9096', 'asdasdas', NULL, NULL, NULL, '2021-10-31 15:06:12', NULL),
(9, 'asdas', 'asdasd', 'akgbahadarpure@gmail.com', 2323232323232, 'Agb@9096', 'asdasdas', NULL, NULL, NULL, '2021-10-31 15:06:48', NULL),
(10, 'asdas', 'asdasd', 'akgbahadarpure@gmail.com', 2323232323232, 'Agb@9096', 'asdasdas', NULL, NULL, NULL, '2021-10-31 15:07:14', NULL),
(11, 'asdas', 'asdasd', 'akgbahadarpure@gmail.com', 2323232323232, 'Agb@9096', 'asdasdas', NULL, NULL, NULL, '2021-10-31 15:07:55', NULL),
(12, 'asdas', 'asdasd', 'akgbahadarpure@gmail.com', 2323232323232, 'Agb@9096', 'asdasdas', NULL, NULL, NULL, '2021-10-31 15:08:08', NULL),
(13, 'asdas', 'asdasd', 'akgbahadarpure@gmail.com', 2323232323232, 'Agb@9096', 'asdasdas', NULL, NULL, NULL, '2021-10-31 15:08:15', NULL),
(14, 'Akshay', 'Bahadarpure', 'akgbahadarpure@gmail.com', 9098282828, '3c5453e913b5f690f4bc058af9cde86b', 'asdasdas das das d asd', 'asdas', 'asdas', 323, '2021-10-31 15:11:41', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
