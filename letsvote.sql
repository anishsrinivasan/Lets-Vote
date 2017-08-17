-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2017 at 05:11 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `letsvote`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(10) NOT NULL,
  `aadharnumber` int(10) NOT NULL,
  `mobilenumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `aadharnumber`, `mobilenumber`) VALUES
(1, 35232, 0),
(2, 35232, 0),
(3, 0, 0),
(4, 21323, 12312),
(5, 32434, 2343),
(6, 2303, 0),
(7, 98989898, 9898989),
(8, 12345123, 12345123),
(9, 0, 0),
(10, 0, 0),
(11, 0, 0),
(12, 123, 123),
(13, 1234, 1234),
(14, 1234, 1234),
(15, 78989, 78989);

-- --------------------------------------------------------

--
-- Table structure for table `voterecords`
--

CREATE TABLE `voterecords` (
  `rid` int(10) NOT NULL,
  `aadharnumber` int(40) NOT NULL,
  `voteresult` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voterecords`
--

INSERT INTO `voterecords` (`rid`, `aadharnumber`, `voteresult`) VALUES
(1, 0, 'House Lannister'),
(2, 0, 'House Targaryen'),
(3, 0, 'House Targaryen'),
(4, 0, 'House Lannister'),
(5, 0, 'House Stark'),
(7, 0, 'House Lannister'),
(8, 0, 'House Targaryen'),
(9, 0, 'House Lannister'),
(10, 0, 'House Lannister'),
(11, 0, 'House Lannister'),
(12, 0, 'House Targaryen'),
(13, 0, 'House Targaryen'),
(14, 0, 'House Lannister'),
(15, 0, 'House Lannister'),
(16, 0, 'House Lannister'),
(17, 0, 'House Lannister'),
(18, 0, 'House Targaryen'),
(19, 0, 'House Stark'),
(20, 0, 'House Stark'),
(21, 0, 'House Targaryen'),
(22, 0, 'House Stark'),
(23, 78989, 'House Lannister'),
(24, 78989, 'House Lannister'),
(25, 78989, 'House Lannister'),
(26, 78989, 'House Stark'),
(27, 78989, 'House Stark'),
(28, 78989, 'House Targaryen'),
(29, 78989, 'House Lannister'),
(30, 78989, 'House Stark'),
(31, 78989, 'House Lannister'),
(32, 78989, 'House Stark'),
(33, 78989, 'House Stark'),
(34, 78989, 'House Lannister'),
(35, 78989, 'House Stark'),
(36, 78989, 'House Targaryen'),
(37, 78989, 'House Lannister'),
(38, 78989, 'House Targaryen'),
(39, 78989, 'House Targaryen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `voterecords`
--
ALTER TABLE `voterecords`
  ADD PRIMARY KEY (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `voterecords`
--
ALTER TABLE `voterecords`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
