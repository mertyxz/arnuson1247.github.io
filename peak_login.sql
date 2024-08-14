-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 09, 2024 at 06:29 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peak_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `peak_admin`
--

CREATE TABLE `peak_admin` (
  `id` int(10) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `upass` varchar(255) NOT NULL,
  `myname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tell` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peak_admin`
--

INSERT INTO `peak_admin` (`id`, `uname`, `upass`, `myname`, `email`, `tell`) VALUES
(1, 'few', '1223', 'few', 'zenozen7891@gmail.com', '0825727987');

-- --------------------------------------------------------

--
-- Table structure for table `peak_system`
--

CREATE TABLE `peak_system` (
  `id` int(5) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `upass` varchar(255) NOT NULL,
  `myname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tell` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peak_system`
--

INSERT INTO `peak_system` (`id`, `uname`, `upass`, `myname`, `email`, `tell`) VALUES
(1, 'root', '1234', 'root', 'root@gmail.com', '09999999'),
(2, 'admin', '1234', 'admin', 'admin@gmail.com', '08888888'),
(4, 'dusan', '12345678', 'peak', 'zenozen7891@gmail.com', '0825727988'),
(5, 'root', '1234', 'dusan', 'zenozen7891@gmail.com', '0825727987');

-- --------------------------------------------------------

--
-- Table structure for table `std_it12`
--

CREATE TABLE `std_it12` (
  `id` int(10) NOT NULL,
  `code_std` varchar(255) NOT NULL,
  `name_std` varchar(255) NOT NULL,
  `dep_std` varchar(255) NOT NULL,
  `tel_std` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `std_it12`
--

INSERT INTO `std_it12` (`id`, `code_std`, `name_std`, `dep_std`, `tel_std`) VALUES
(8, '67319010035', 'นายญาณภัทร คงนันทะ', 'คอมพิวเตอร์', '0945017763'),
(9, '67319010034', 'นายอิทธิพัทธ์  พิมพ์อักษร', 'คอมพิวเตอร์', '0638304473'),
(10, '67319010030', 'สุรชาติ นาดีด่านกลาง', 'คอมพิวเตอร์', '0994656017'),
(11, '67319010013', 'นายกานต์ชนก กิตติวรรณ์', 'คอมพิวเตอร์', '0650055716'),
(12, '67319010032', 'นางสาวอวัสดา สนทนา', 'คอมพิวเตอร์', '0934682055'),
(14, '67319100008', 'sadasd', 'dsfsdfdf', '00000000'),
(15, 'bxvbxcvb', 'xcvczvxcvxc', 'vxcvxcvxc', 'vcxvxcvxcv'),
(16, 'root', '12345678', 'root', 'root');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peak_admin`
--
ALTER TABLE `peak_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peak_system`
--
ALTER TABLE `peak_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `std_it12`
--
ALTER TABLE `std_it12`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peak_admin`
--
ALTER TABLE `peak_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `peak_system`
--
ALTER TABLE `peak_system`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `std_it12`
--
ALTER TABLE `std_it12`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
