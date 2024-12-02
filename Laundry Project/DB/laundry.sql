-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 05:51 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lonicy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sr_no` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`sr_no`, `admin_name`, `admin_pass`) VALUES
(1, 'admin', 'superuser');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cat_type` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category`, `description`, `cat_type`, `price`) VALUES
(12, 'T-Shirt,Jeans,Shorts,Pants,Socks,Seasonal Basics,Light Jackets,Cardigans,Basic Hoodies', 'Description: Suitable for everyday laundry needs. Includes: Wash & Fold service, up to a specific weight limit (e.g., 5 kg). Price: Set price for a specific weight, with additional charges if exceeded.\r\n', 'Basic Package', '30000'),
(13, 'Jeans,Socks,Casual ,Formal Shirts,Chinos,Sportswear,Dresses,Casual Tops,Nightwear,Scarves', 'Description: Designed for households with larger amounts of laundry.Includes: Higher weight limit (e.g., 15 kg), Wash & Fold, Ironing, and discounts on Dry Cleaning for select items.Price: Offers a discount on per kg rates due to higher volume.', 'Family Package', '40000'),
(14, 'Jeans,Elegant Shirts,Trousers,Formalwear,Stylish Dresses,Palazzo Pants,Button-ups,Joggers,Soft,Rompers,Robes,Gloves', 'Description: For delicate or special-care fabrics.Includes: Dry Cleaning, Pressing/Ironing, and Special Care for materials like silk, wool, or leather.Price: Premium price due to special handling and material care.', 'Deluxe Care Package', '50000'),
(16, 'T-Shirt,Light Jackets,Cardigans,Scarves,Elegant Shirts,Trousers,Formalwear,Gloves,Suits,Ties ,Pocket Squares,Blouses,Pencil Skirts,Business Suits,Polo Shirts,Smart Casual Tops,Light Sweaters,Professional Belts,Stockings', 'Description: Targeted at businesses (e.g., hotels, spas, gyms) with bulk laundry needs.Includes: Regular pickups, Wash & Fold, Ironing, with discounts on bulk orders.Price: Custom pricing based on volume and frequency.', 'Corporate Package', '60000'),
(17, 'T-Shirt,Jeans,Casual ,Sportswear,Elegant Shirts,Formalwear,Button-ups,Gloves,Suits,Polo Shirts,Blazers,Gowns ,Tuxedos,Silk ,Lingerie,Lightweight Sweaters,Traditional Attire,Costumes,Handkerchiefs,Pillowcases', 'Description: For those who need additional services along with basic laundry.Includes: Wash & Fold, Dry Cleaning, and Ironing services.Price: Higher price with a limit on total weight (e.g., 10 kg).\r\n', 'Premium Package', '45000'),
(18, 'T-Shirt,Jeans,Shorts,Seasonal Basics,Formal Shirts,Sportswear,Casual Tops,Nightwear,Scarves,Trousers,Formalwear,Palazzo Pants,Button-ups,Soft,Gloves,Suits,Pocket Squares,Pencil Skirts,Business Suits,Polo Shirts,Smart Casual Tops,Lingerie,Lightweight Sweat', 'Description: For customers who need same-day or quick turnaround services.Includes: Fast-track service for Wash & Fold and Ironing.Price: Higher rate for faster delivery.', 'Express Package', '70000');

-- --------------------------------------------------------

--
-- Table structure for table `clothes_category`
--

CREATE TABLE `clothes_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clothes_category`
--

INSERT INTO `clothes_category` (`id`, `name`) VALUES
(1, 'T-Shirt'),
(2, 'Jeans'),
(3, 'Shorts'),
(4, 'Pants'),
(5, 'Socks'),
(6, 'Seasonal Basics'),
(7, 'Light Jackets'),
(8, 'Cardigans'),
(9, 'Basic Hoodies'),
(10, 'Casual '),
(11, 'Formal Shirts'),
(12, 'Chinos'),
(13, 'Sportswear'),
(14, 'Dresses'),
(15, 'Casual Tops'),
(16, 'Nightwear'),
(17, 'Scarves'),
(18, 'Elegant Shirts'),
(19, 'Trousers'),
(20, 'Formalwear'),
(21, 'Stylish Dresses'),
(22, 'Palazzo Pants'),
(23, 'Button-ups'),
(24, 'Joggers'),
(25, 'Soft'),
(26, 'Rompers'),
(27, 'Robes'),
(28, 'Gloves'),
(29, 'Suits'),
(30, 'Ties '),
(31, 'Pocket Squares'),
(32, 'Blouses'),
(33, 'Pencil Skirts'),
(34, 'Business Suits'),
(35, 'Polo Shirts'),
(36, 'Smart Casual Tops'),
(37, 'Light Sweaters'),
(38, 'Professional Belts'),
(39, 'Stockings'),
(40, 'Blazers'),
(41, 'Gowns '),
(42, 'Tuxedos'),
(43, 'Silk '),
(44, 'Lingerie'),
(45, 'Lightweight Sweaters'),
(46, 'Traditional Attire'),
(47, 'Costumes'),
(48, 'Handkerchiefs'),
(49, 'Pillowcases');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `orderid` int(10) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `service` varchar(100) DEFAULT NULL,
  `extra` int(25) DEFAULT NULL,
  `totalprice` varchar(100) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `action` varchar(50) NOT NULL,
  `pickup_date` varchar(25) NOT NULL,
  `delivery` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `rp_id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL,
  `rp_content` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting_key` varchar(255) NOT NULL,
  `setting_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_key`, `setting_value`) VALUES
(1, 'site_name', 'LONICY'),
(2, 'phone_number', '09773015393'),
(3, 'address', 'Yangon'),
(4, 'email', 'laundryservice@gmail.com'),
(5, 'slide_title', 'WELCOME'),
(6, 'slide_description', 'We believe that life’s too short to spend it worrying about laundry. That’s why we’re here to take care of your clothes while you focus on what truly matters.We’re a passionate team of laundry enthusiasts who take pride in delivering exceptional care to your garments.');

-- --------------------------------------------------------

--
-- Table structure for table `township`
--

CREATE TABLE `township` (
  `townid` int(11) NOT NULL,
  `township_name` varchar(250) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `township`
--

INSERT INTO `township` (`townid`, `township_name`, `price`) VALUES
(1, 'Ahlon Township', '4000'),
(5, 'Bahan Township', '4000'),
(10, 'Botataung Township', '4500'),
(11, 'Dagon Township', '5000'),
(12, 'Hlaing Township', '4500'),
(13, 'Insein Township', '5000'),
(15, 'Tamwe Township', '3500'),
(16, 'Yankin Township', '4000'),
(17, 'Thingangyun Township', '3500'),
(18, 'North Okkalapa Township', '4000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `user_pf` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `clothes_category`
--
ALTER TABLE `clothes_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`rp_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_key` (`setting_key`);

--
-- Indexes for table `township`
--
ALTER TABLE `township`
  ADD PRIMARY KEY (`townid`);

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
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `clothes_category`
--
ALTER TABLE `clothes_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `orderid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `rp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `township`
--
ALTER TABLE `township`
  MODIFY `townid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
