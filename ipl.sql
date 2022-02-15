-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2022 at 04:33 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ipl`
--

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `team` varchar(256) NOT NULL,
  `price` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL,
  `role` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `name`, `image`, `team`, `price`, `status`, `role`) VALUES
(1, 'MS Dhoni', '1862095778_Dhoni-aa_d_d.jpg', '1', '12.7cr', 'Playing', 'Batsman'),
(2, 'Yuvraj Singh', '221085151_vBTZcDTv_400x400.jpg', '3', '1.00cr', 'On-Bench', 'Batsman'),
(3, 'Hardik Pandya', '505460605_Hardik-Pandya.jpg', '3', '6.50cr', 'Playing', 'All-Rounder'),
(4, 'Virat Kohli', '1692012866_3b3a43d40f07cfcb2123b302b2fc51ed.jpg', '5', '8.00cr', 'Playing', 'Batsman'),
(5, 'Chris Morris', '83849048_Chris-Morris-1.jpg', '4', '16.25cr', 'Playing', 'All-Rounder'),
(6, 'Glenn Maxwell', '922974232_86835183.jpg', '5', '14.25cr', 'Playing', 'All-Rounder'),
(7, 'Rohit Sharma', '1300580924_fv34BaHQ_400x400.jpg', '3', '6.50cr', 'Playing', 'Batsman'),
(8, 'Ishan Kishan', '42788427_Ishan-Kishan-4.jpg', '3', '2.50cr', 'Playing', 'Batsman'),
(9, 'Rishabh Pant', '2069931004_lFsXKEs__400x400.jpg', '6', '2.40cr', 'Playing', 'Batsman'),
(10, 'Deepak Chahar', '1367087906_Deepak_Chahar.jpg', '1', '1.50cr', 'Playing', 'Bowler'),
(11, 'Kagiso Rabada', '1465297924_Kagiso_Rabada_ipl_0.jpg', '6', '10.00cr', 'Playing', 'Bowler'),
(12, 'Shubhman Gill', '916391762_Shubman-Gill-with-Trophy.jpeg', '7', '4.30cr', 'Playing', 'Batsman'),
(13, 'Varun Chakravarthy', '1885197096_Varun-Chakravarthy.jpg', '7', '1.80cr', 'Playing', 'Bowler'),
(14, 'Sanju Samson', '58841193_jpg (1).jfif', '4', '5.60cr', 'Playing', 'Batsman'),
(15, 'Ruturaj Gaikwad', '664629034_Capture-16.jpg', '1', '2.00cr', 'Playing', 'Batsman');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `top_batsman` varchar(256) NOT NULL,
  `top_bowler` varchar(256) NOT NULL,
  `championship_no` varchar(256) NOT NULL,
  `player_count` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `image`, `top_batsman`, `top_bowler`, `championship_no`, `player_count`) VALUES
(1, 'Chennai Super Kings (CSK)', '1400890641_CSK_Logo_with_satin_flag.jpg', '15', '10', '4', '15'),
(3, 'Mumbai Indians (MI)', '222797254_2809a841bb08827603ccac5c6aee8b33.png', '7', '3', '5', '15'),
(4, 'Rajasthan Royals (RR)', '1230448196_delogy2-a0fde0bf-783f-445b-b9a6-2586cdbeb6b8.png', '14', '5', '1', '15'),
(5, 'Royal Challenger Bangalore (RCB)', '898286243_RCB_-logo_with_Satin_Flag.jpg', '4', '6', '0', '15'),
(6, 'Delhi Capitals (DC)', '1229032125_DC_Logo_With_Background.jpg', '9', '11', '0', '15'),
(7, 'Kolkata Knight Riders (KKR)', '1632739574_download.jfif', '12', '13', '2', '15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
