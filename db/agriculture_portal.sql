-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2023 at 07:21 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agriculture_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(20) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `A_gender` varchar(255) NOT NULL,
  `A_birthday` varchar(255) NOT NULL,
  `A_province` varchar(50) NOT NULL,
  `A_District` varchar(50) NOT NULL,
  `A_Location` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `otp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`, `email`, `phone_no`, `A_gender`, `A_birthday`, `A_province`, `A_District`, `A_Location`, `photo`, `otp`) VALUES
(1, 'Sanisha Maharjan', 'password', 'sanisamhrzn@gmail.com', '9840032579', 'Female', '2000-01-24', 'Bagmati', 'Lalitpur', 'Patan', '../assets/a_image/9840032579.jpg', 0),
(2, 'Ashish sapkota', 'password', 'aryanashish223@gmail.com', '9840066162', 'male', '31/12/1998', 'bagmati', 'kathmandu', 'dhaneshwor', '../assets/a_image/ashish.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `cropname` varchar(255) NOT NULL,
  `quantity` int(50) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `cust_id`, `cropname`, `quantity`, `price`) VALUES
(180, 24, 'cotton', 30, 1350),
(182, 24, 'arhar', 15, 1125),
(183, 26, 'bajra', 10, 770);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_mobile` varchar(100) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_address` varchar(500) NOT NULL,
  `c_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`c_id`, `c_name`, `c_mobile`, `c_email`, `c_address`, `c_message`) VALUES
(8, 'sanisha', '9840032579', 'sanishamaharjan36@gmail.com', '44700', 'Test message'),
(22, 'sanisha', '9840032579', 'sanishamaharjan1@gmail.com', '44700', 'Test message');

-- --------------------------------------------------------

--
-- Table structure for table `crops`
--

CREATE TABLE `crops` (
  `Crop_id` int(255) NOT NULL,
  `Crop_name` varchar(255) NOT NULL,
  `N_value` double NOT NULL,
  `P_value` double NOT NULL,
  `K_value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crops`
--

INSERT INTO `crops` (`Crop_id`, `Crop_name`, `N_value`, `P_value`, `K_value`) VALUES
(1, 'Rice', 20, 25, 25),
(2, 'Bajra', 50, 25, 0),
(3, 'Maize', 135, 62.5, 50),
(4, 'Cotton', 50, 25, 25),
(5, 'Soya', 20, 80, 40),
(6, 'Moong', 12.5, 25, 12.5),
(7, 'Groundnut', 25, 50, 75),
(8, 'Sugarcane', 300, 100, 200);

-- --------------------------------------------------------

--
-- Table structure for table `custlogin`
--

CREATE TABLE `custlogin` (
  `cust_id` int(20) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `otp` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custlogin`
--

INSERT INTO `custlogin` (`cust_id`, `cust_name`, `password`, `email`, `address`, `district`, `province`, `phone_no`, `photo`, `otp`) VALUES
(29, 'Sanisha Maharjan', '$2y$10$dZmfGXX/mnFceDd0DBNNduGXuyviuIzL1sIPIu.nNZ1e1k6.YTBne', 'sanisamhrzn@gmail.com', 'Patan', 'Lalitpur', 'Bagmati', '9840032579', '../assets/c_image/9840032579.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `DistCode` int(11) NOT NULL,
  `PrCode` int(11) DEFAULT NULL,
  `DistrictName` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`DistCode`, `PrCode`, `DistrictName`) VALUES
(2, 1, 'Bhojpur'),
(3, 1, 'Dhankuta'),
(4, 1, 'Ilam'),
(5, 1, 'Jhapa'),
(6, 1, 'Khotang'),
(7, 1, 'Morang'),
(8, 1, 'Okhaldhunga'),
(9, 1, 'Panchthar'),
(10, 1, 'Sankhuwasabha'),
(11, 1, 'Solukhumbu'),
(12, 1, 'Sunsari'),
(13, 1, 'Taplejung '),
(14, 1, 'Terhathum '),
(15, 1, 'Udayapur '),
(16, 2, 'Saptari'),
(17, 2, 'Siraha'),
(18, 2, 'Dhanusa'),
(19, 2, 'Mahottari'),
(20, 2, 'Sarlahi'),
(21, 2, 'Bara'),
(22, 2, 'Parsa'),
(23, 2, 'Rautahat'),
(24, 3, 'Sindhuli '),
(25, 3, 'Ramechhap'),
(26, 3, 'Dolakha'),
(27, 3, 'Bhaktapur'),
(28, 3, 'Dhading'),
(29, 3, 'Kathmandu'),
(30, 3, 'Kavrepalanchok'),
(31, 3, 'Lalitpur'),
(32, 3, 'Nuwakot '),
(33, 3, 'Rasuwa'),
(34, 3, 'Sindhupalchok'),
(35, 3, 'Chitwan'),
(36, 3, 'Makwanpur'),
(37, 4, 'Baglung'),
(38, 4, 'Gorkha'),
(39, 4, 'Kaski'),
(40, 4, 'Lamjung '),
(41, 4, 'Manang '),
(42, 4, 'Mustang '),
(43, 4, 'Myagdi '),
(44, 4, 'Nawalpur '),
(45, 4, 'Parbat '),
(46, 4, 'Syangja '),
(47, 4, 'Tanahun '),
(48, 5, 'Kapilvastu '),
(49, 5, 'Parasi '),
(50, 5, 'Rupandehi '),
(51, 5, 'Arghakhanchi '),
(52, 5, 'Gulmi '),
(53, 5, 'Palpa '),
(54, 5, 'Dang '),
(55, 5, 'Pyuthan '),
(56, 5, 'Rolpa '),
(57, 5, 'Eastern Rukum '),
(58, 5, 'Banke '),
(59, 5, 'Bardiya '),
(60, 6, 'Western Rukum '),
(61, 6, 'Salyan '),
(62, 6, 'Dolpa '),
(63, 6, 'Humla '),
(64, 6, 'Jumla '),
(65, 6, 'Kalikot '),
(66, 6, 'Mugu '),
(67, 6, 'Surkhet '),
(68, 6, 'Dailekh '),
(69, 6, 'Jajarkot '),
(70, 7, 'Kailali '),
(71, 7, 'Achham '),
(72, 7, 'Doti '),
(73, 7, 'Bajhang '),
(74, 7, 'Bajura '),
(75, 7, 'Kanchanpur '),
(76, 7, 'Dadeldhura '),
(77, 7, 'Baitadi '),
(78, 7, 'Darchula ');

-- --------------------------------------------------------

--
-- Table structure for table `farmerlogin`
--

CREATE TABLE `farmerlogin` (
  `farmer_id` int(11) NOT NULL,
  `farmer_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `F_gender` varchar(255) NOT NULL,
  `F_birthday` varchar(255) NOT NULL,
  `F_province` varchar(255) NOT NULL,
  `F_District` varchar(255) NOT NULL,
  `F_Location` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `otp` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmerlogin`
--

INSERT INTO `farmerlogin` (`farmer_id`, `farmer_name`, `password`, `email`, `phone_no`, `F_gender`, `F_birthday`, `F_province`, `F_District`, `F_Location`, `photo`, `otp`) VALUES
(103, 'Ashish Sapkota', '$2y$10$kO4mEzA9NVKOoLtnUt5RH.jFetc972VXf0.Ln4bskZI9ZCbLOYUPC', 'aryanashish223@gmail.com', '9840066162', 'Male', '1998-12-31', 'Bagmati', 'Ramechhap', 'Gongabu', '../assets/u_image/9840066162.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `farmer_crops_trade`
--

CREATE TABLE `farmer_crops_trade` (
  `trade_id` int(11) NOT NULL,
  `farmer_fkid` int(50) NOT NULL,
  `Trade_crop` varchar(255) NOT NULL,
  `Crop_quantity` double NOT NULL,
  `costperkg` int(11) NOT NULL,
  `msp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer_crops_trade`
--

INSERT INTO `farmer_crops_trade` (`trade_id`, `farmer_fkid`, `Trade_crop`, `Crop_quantity`, `costperkg`, `msp`) VALUES
(125, 103, 'jute', 10, 90, 135),
(126, 103, 'moong', 15, 180, 270),
(127, 103, 'maize', 12, 190, 285),
(128, 103, 'soyabean', 18, 350, 525),
(129, 103, 'wheat', 20, 470, 705),
(130, 103, 'cotton', 15, 1060, 1590),
(131, 103, 'arhar', 20, 60, 90),
(132, 103, 'bajra', 15, 100, 150),
(133, 103, 'barley', 13, 130, 195),
(134, 103, 'gram', 25, 85, 128),
(135, 103, 'lentil', 25, 165, 248),
(136, 103, 'ragi', 15, 95, 143),
(137, 103, 'rice', 14, 125, 188),
(138, 103, 'urad', 15, 170, 255);

-- --------------------------------------------------------

--
-- Table structure for table `farmer_history`
--

CREATE TABLE `farmer_history` (
  `History_id` int(11) NOT NULL,
  `farmer_id` int(50) NOT NULL,
  `farmer_crop` varchar(255) NOT NULL,
  `farmer_quantity` int(50) NOT NULL,
  `farmer_price` int(50) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer_history`
--

INSERT INTO `farmer_history` (`History_id`, `farmer_id`, `farmer_crop`, `farmer_quantity`, `farmer_price`, `date`) VALUES
(25, 103, 'cotton', 15, 1060, '01/04/2023'),
(26, 44, 'bajra', 1, 23, '03/04/2023'),
(27, 44, 'barley', 1, 2, '03/04/2023'),
(28, 103, 'arhar', 20, 60, '03/04/2023'),
(29, 44, 'bajra', 1, 23, '03/04/2023'),
(30, 103, 'barley', 13, 130, '03/04/2023'),
(31, 44, 'arhar', 1, 60, '03/04/2023');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cropname` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cust_id`, `cust_name`, `cropname`, `quantity`, `email`, `phone`, `address`, `date`, `status`) VALUES
(32, 27, 'Ashish Sapkota', 'bajra', 7, 'ashish.181406@ncit.edu.np', '9840066162', 'Gongabu', '12/07/2023', 'Completed'),
(33, 27, 'Ashish Sapkota', 'barley', 1, 'ashish.181406@ncit.edu.np', '9840066162', 'Gongabu', '12/07/2023', 'Completed'),
(34, 27, 'Ashish Sapkota', 'bajra', 10, 'ashish.181406@ncit.edu.np', '9840066162', 'Gongabu', '12/07/2023', 'Completed'),
(35, 27, 'Ashish Sapkota', 'bajra', 2, 'ashish.181406@ncit.edu.np', '9840066162', 'Gongabu', '12/07/2023', 'Completed'),
(36, 27, 'Ashish Sapkota', 'barley', 1, 'ashish.181406@ncit.edu.np', '9840066162', 'Gongabu', '12/07/2023', 'Pending'),
(40, 29, 'Sanisha Maharjan', 'Jute', 2, 'sanishamaharjan36@gmail.com', '9840032579', 'Patan', '13/07/2023', 'Pending'),
(41, 29, 'Sanisha Maharjan', 'Maize', 2, 'sanishamaharjan36@gmail.com', '9840032579', 'Patan', '13/07/2023', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `production_approx`
--

CREATE TABLE `production_approx` (
  `crop` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production_approx`
--

INSERT INTO `production_approx` (`crop`, `quantity`) VALUES
('Arhar', 20),
('Bajra', 15),
('Barley', 13),
('Cotton', 15),
('Gram', 25),
('Jute', 8),
('Lentil', 25),
('Maize', 10),
('Moong', 15),
('Ragi', 15),
('Rice', 14),
('Soyabean', 18),
('Urad', 15),
('Wheat', 20);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `PrCode` int(11) NOT NULL,
  `ProvinceName` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`PrCode`, `ProvinceName`) VALUES
(1, 'Koshi'),
(2, 'Madhesh'),
(3, 'Bagmati'),
(4, 'Gandaki'),
(5, 'Lumbini'),
(6, 'Karnali'),
(7, 'Sudurpashchim');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_name` (`admin_name`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `crops`
--
ALTER TABLE `crops`
  ADD PRIMARY KEY (`Crop_id`);

--
-- Indexes for table `custlogin`
--
ALTER TABLE `custlogin`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`DistCode`),
  ADD KEY `StCode` (`PrCode`);

--
-- Indexes for table `farmerlogin`
--
ALTER TABLE `farmerlogin`
  ADD PRIMARY KEY (`farmer_id`);

--
-- Indexes for table `farmer_crops_trade`
--
ALTER TABLE `farmer_crops_trade`
  ADD PRIMARY KEY (`trade_id`),
  ADD KEY `farmer_fkid` (`farmer_fkid`);

--
-- Indexes for table `farmer_history`
--
ALTER TABLE `farmer_history`
  ADD PRIMARY KEY (`History_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `production_approx`
--
ALTER TABLE `production_approx`
  ADD PRIMARY KEY (`crop`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`PrCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `custlogin`
--
ALTER TABLE `custlogin`
  MODIFY `cust_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `DistCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `farmerlogin`
--
ALTER TABLE `farmerlogin`
  MODIFY `farmer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `farmer_crops_trade`
--
ALTER TABLE `farmer_crops_trade`
  MODIFY `trade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `farmer_history`
--
ALTER TABLE `farmer_history`
  MODIFY `History_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `PrCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `farmer_crops_trade`
--
ALTER TABLE `farmer_crops_trade`
  ADD CONSTRAINT `farmer_crops_trade_ibfk_1` FOREIGN KEY (`farmer_fkid`) REFERENCES `farmerlogin` (`farmer_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
