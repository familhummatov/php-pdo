-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2019 at 06:20 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dersler`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `ad`) VALUES
(1, 'Famil'),
(2, 'PHP'),
(3, 'HTML'),
(4, 'CSS'),
(5, 'JavaScript'),
(6, 'c'),
(7, 'c++'),
(8, 'c#'),
(9, 'java'),
(10, 'test'),
(11, 'React'),
(12, 'Vue JS'),
(13, 'Angular JS');

-- --------------------------------------------------------

--
-- Table structure for table `dersler`
--

CREATE TABLE `dersler` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `tarix` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dersler`
--

INSERT INTO `dersler` (`id`, `title`, `content`, `category_id`, `status`, `tarix`) VALUES
(13, 'php', 'php is oop programming language', '3,9,5,2', 1, '2019-10-02 17:07:15'),
(14, 'js', 'js is good language', '5', 1, '2019-10-23 16:19:33'),
(15, 'java', 'best oop language', '3,9', 1, '2019-10-05 16:20:43'),
(16, 'c#', 'microsoft famous language', '8', 1, '2019-10-05 16:21:15'),
(17, 'test', 'rgfdgdsdf', '10', 1, '2019-10-07 12:00:05'),
(18, 'React', 'React is a js library', '11', 1, '2019-10-31 14:34:39'),
(19, 'Vue', 'Vue is a js framework', '12', 1, '2019-10-06 14:35:39'),
(20, 'Angular', 'Angular most known js framework', '4,1,5', 1, '2019-10-16 14:36:12'),
(21, 'test1', 'test test test', '5', 1, '2019-10-07 07:04:10'),
(24, 'yeyeyeyey', 'jafkj;dlakd;as', '4', 1, '2019-10-08 09:51:27'),
(25, 'kmann', 'adasdasd', '13', 1, '2019-10-08 09:52:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dersler`
--
ALTER TABLE `dersler`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dersler`
--
ALTER TABLE `dersler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
