-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 07:54 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `habit_tracker_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tracker`
--

CREATE TABLE `tbl_tracker` (
  `tbl_tracker_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(255) NOT NULL,
  `exercise` varchar(255) NOT NULL,
  `pray` varchar(255) NOT NULL,
  `read_book` varchar(255) NOT NULL,
  `vitamins` varchar(255) NOT NULL,
  `laundry` varchar(255) NOT NULL,
  `alcohol` varchar(255) NOT NULL,
  `meat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tracker`
--

INSERT INTO `tbl_tracker` (`tbl_tracker_id`, `date`, `day`, `exercise`, `pray`, `read_book`, `vitamins`, `laundry`, `alcohol`, `meat`) VALUES
(1, '2024-01-22', 'Monday', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_tracker`
--
ALTER TABLE `tbl_tracker`
  ADD PRIMARY KEY (`tbl_tracker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_tracker`
--
ALTER TABLE `tbl_tracker`
  MODIFY `tbl_tracker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
