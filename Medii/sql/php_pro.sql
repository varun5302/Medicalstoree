-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 06:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) DEFAULT NULL,
  `admin_user_name` varchar(255) DEFAULT NULL,
  `admin_pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_user_name`, `admin_pass`) VALUES
(1, 'Aman Jabrin', 'anis@123', '202cb962ac59075b964b07152d234b70'),
(2, 'Naresh Chudasma', 'naru@123', 'naru123');

-- --------------------------------------------------------

--
-- Table structure for table `buy_product`
--

CREATE TABLE `buy_product` (
  `id` int(11) NOT NULL,
  `Full_Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `PinCode` int(10) NOT NULL,
  `Product_name` varchar(255) NOT NULL,
  `Product_Quantity` varchar(255) NOT NULL,
  `Product_price` varchar(255) NOT NULL,
  `Payment` varchar(255) NOT NULL,
  `t_product_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_img` varchar(255) NOT NULL,
  `pro_price` int(11) NOT NULL,
  `pro_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `pro_id`, `pro_name`, `pro_img`, `pro_price`, `pro_quantity`, `user_id`) VALUES
(34, 1, ' Cetaphil Gentle Skin Cleanser, 125 ml', 'Cetaphil Gentle Skin Cleanser,.jpg', 399, 1, 1),
(35, 5, ' Nestle Nan Pro Follow-Up Formula Stage 2 (After 6 Months) Powder, 400 gm ', 'nan pro.jpg', 805, 1, 1),
(36, 1, ' Cetaphil Gentle Skin Cleanser, 125 ml', 'Cetaphil Gentle Skin Cleanser,.jpg', 399, 1, 0),
(37, 2, ' Ahaglow Skin Rejuvenating Face Wash Gel, 200 gm', 'Ahaglow Skin Rejuvenating Face Wash Gel,.jpg', 709, 1, 0),
(38, 6, ' Kesh King Ayurvedic Scalp and Hair Medicine Oil, 300 ml', 'Kesh King Ayurvedic Scalp and Hair Medicine Oil,.jpg', 279, 1, 0),
(39, 4, ' Cetaphil Brightness Reveal Creamy Cleanser, 100 gm', 'Cetaphil Brightness Reveal Creamy Cleanser.webp', 665, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL,
  `catImg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catId`, `catName`, `catImg`) VALUES
(101, 'Baby Care', 'babycare.jpg'),
(102, 'Personal Care', 'personal-care.png'),
(103, 'Protein Powders', 'protein.avif'),
(104, 'Skin Care', 'Skin-Care.webp');


-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_kyeword` varchar(255) DEFAULT NULL,
  `catId` int(11) DEFAULT NULL,
  `product_img` varchar(255) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_kyeword`, `catId`, `product_img`, `product_price`) VALUES
(1, ' Cetaphil Gentle Skin Cleanser, 125 ml', 'Cetaphil Gentle Skin Cleanser, 125 ml', 104, 'Cetaphil Gentle Skin Cleanser,.jpg', 399),
(2, ' Ahaglow Skin Rejuvenating Face Wash Gel, 200 gm', 'Ahaglow Skin Rejuvenating Face Wash Gel, 200 gm', 104, 'Ahaglow Skin Rejuvenating Face Wash Gel,.jpg', 709),
(3, ' Nivea Soft Light Moisturising Cream, 300 ml', 'Nivea Soft Light Moisturising Cream, 300 ml', 104, 'Nivea Soft Light Moisturising Cream.jpg', 418),
(4, ' Cetaphil Brightness Reveal Creamy Cleanser, 100 gm', 'Cetaphil Brightness Reveal Creamy Cleanser, 100 gm', 104, 'Cetaphil Brightness Reveal Creamy Cleanser.webp', 665),
(5, ' Nestle Nan Pro Follow-Up Formula Stage 2 (After 6 Months) Powder, 400 gm ', 'Nestle Nan Pro Follow-Up Formula Stage 2 (After 6 Months) Powder, 400 gm ', 101, 'nan pro.jpg', 805),
(6, ' Kesh King Ayurvedic Scalp and Hair Medicine Oil, 300 ml', 'Kesh King Ayurvedic Scalp and Hair Medicine Oil, 300 ml', 102, 'Kesh King Ayurvedic Scalp and Hair Medicine Oil,.jpg', 279),
(7, ' Kesh King Anti-Hairfall Shampoo, 200 ml', 'Kesh King Anti-Hairfall Shampoo, 200 ml', 102, 'Kesh King Anti-Hairfall Shampoo.jpg', 120),
(8, ' VLCC 3D Youth Boost SPF 40 PA+++ Sunscreen Gel Creme, 25 gm', 'VLCC 3D Youth Boost SPF 40 PA+++ Sunscreen Gel Creme, 25 gm', 102, 'VLCC 3D Youth Boost SPF 40 PA+++ Sunscreen Gel Creme,.avif', 74),
(9, ' Neutrogena Hydro Boost Water Gel, 50 gm', 'Neutrogena Hydro Boost Water Gel, 50 gm', 102, 'Neutrogena Hydro Boost Water Gel.jpg', 977),
(10, ' Nivea Natural Glow Roll On Deodorant for Women, 50 ml', 'Nivea Natural Glow Roll On Deodorant for Women, 50 ml', 102, 'Nivea Natural Glow Roll On Deodorant for Women.jpg', 249),
(11, ' Philips Avent Natural Feeding Bottle, 260 ml', 'Philips Avent Natural Feeding Bottle, 260 ml', 101, 'Philips Avent Natural Feeding Bottle.jpg', 595),
(12, ' Himalaya Baby Diaper Rash Cream, 50 gm', 'Himalaya Baby Diaper Rash Cream, 50 gm', 101, 'Himalaya Baby Diaper Rash Cream.jpg', 140),
(13, ' Figaro Baby Massage Oil, 200 ml', 'Figaro Baby Massage Oil, 200 ml', 101, 'Figaro Baby Massage Oil.jpg', 318);

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `name` varchar(2555) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`user_id`, `user_name`, `user_email`, `user_pass`, `name`) VALUES
(1, 'naru', 'a@gmail', '202cb962ac59075b964b07152d234b70', 'nare');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `buy_product`
--
ALTER TABLE `buy_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buy_product`
--
ALTER TABLE `buy_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
