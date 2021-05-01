-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 04:18 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masterarts`
--

-- --------------------------------------------------------

--
-- Table structure for table `pages_table`
--

CREATE TABLE `pages_table` (
  `page_id` int(11) NOT NULL,
  `page_title` varchar(100) NOT NULL,
  `page_slug` varchar(100) NOT NULL,
  `page_data` text NOT NULL,
  `create_on` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages_table`
--

INSERT INTO `pages_table` (`page_id`, `page_title`, `page_slug`, `page_data`, `create_on`) VALUES
(1, 'About Us', 'about', '<p>kapaoa hakahsa aksdaks Zxcvbza</p>\r\n', 0),
(2, 'Terms & Condition', 'terms-condition', 'kapaoa hakahsa aksdaks', 0),
(3, 'Privacy Policy', 'privacy-policy', 'kapaoa hakahsa aksdaks', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pages_table`
--
ALTER TABLE `pages_table`
  ADD PRIMARY KEY (`page_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pages_table`
--
ALTER TABLE `pages_table`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
