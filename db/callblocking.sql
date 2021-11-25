-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 12:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `callblocking`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_block`
--

CREATE TABLE `log_block` (
  `id` int(11) NOT NULL,
  `ippbxid` varchar(60) DEFAULT NULL,
  `timestamp` varchar(30) DEFAULT '0000-00-00 00:00:00',
  `source` varchar(30) DEFAULT NULL,
  `destination` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_block`
--

INSERT INTO `log_block` (`id`, `ippbxid`, `timestamp`, `source`, `destination`) VALUES
(9, '0868789186.1637596623.98', '2021-11-22-22:57:03', '0868789186', '0000'),
(10, '0868789186.1637596680.99', '2021-11-22-22:58:00', '0868789186', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `id` int(11) NOT NULL,
  `phonenumber` varchar(10) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `status` int(1) DEFAULT NULL COMMENT '0=block'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`id`, `phonenumber`, `owner`, `status`) VALUES
(54, '0659895895', 'หวาน', 0),
(61, '0897495924', 'อาร์ม', 1),
(62, '3213123123', 'ปู แบล็คเฮด', 1),
(63, '5656565656', 'ต้อย หมวกแดง', 1),
(65, '6989154956', 'dasdeqwe', 1),
(66, '2987156419', 'asd', 1),
(67, '2598261549', '5asd', 1),
(68, '2598952644', 'daqe', 1),
(69, '2987126598', 'dqwe', 1),
(70, '1557843218', '2555', 1),
(71, '4895849584', 'อย่าขอ หมอลำ', 1),
(74, '3213123123', '', 1),
(75, '3213123123', 'dsadasdasdasdasdasd', 1),
(76, '1234', 'sakdlaskdladl', 0),
(77, '0755468896', 'test_got', 1),
(78, '2202', 'ก๊อต', 0),
(80, '220225', 'ก๊อต', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL COMMENT '0=SuperAdmin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'tanapong', '1ead03106c412e515b01d46db0e8d08d96c6d10f2d3061f4a8ce3be24576c9ed', 0),
(3, 'kantapat97', '1ead03106c412e515b01d46db0e8d08d96c6d10f2d3061f4a8ce3be24576c9ed', 0),
(4, 'got', '782ea4d2e51e7f58c3e674ec9208a42b5152d4008341302a0668cf38929c9e1e', 0),
(5, 'arm', '1ead03106c412e515b01d46db0e8d08d96c6d10f2d3061f4a8ce3be24576c9ed', 0),
(6, 'nook', '1ead03106c412e515b01d46db0e8d08d96c6d10f2d3061f4a8ce3be24576c9ed', 0),
(28, 'admin', '1ead03106c412e515b01d46db0e8d08d96c6d10f2d3061f4a8ce3be24576c9ed', 1),
(47, 'whan', '19d443d42b113a2800a70954f419c5ba25d48a4ca555ac4cd2e37be248c39804', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_block`
--
ALTER TABLE `log_block`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_block`
--
ALTER TABLE `log_block`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
