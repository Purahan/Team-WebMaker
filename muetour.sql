-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2021 at 07:40 PM
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
-- Database: `muetour`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_visit`
--

CREATE TABLE `booked_visit` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `museum_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `status` enum('p','c') NOT NULL DEFAULT 'p'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `museums`
--

CREATE TABLE `museums` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `ref_link` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `pic_1` varchar(50) NOT NULL,
  `pic_2` varchar(50) NOT NULL,
  `pic_3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `museums`
--

INSERT INTO `museums` (`id`, `name`, `link`, `ref_link`, `description`, `pic_1`, `pic_2`, `pic_3`) VALUES
(1, 'The Natural History Museum, London, United Kingdom', 'https://artsandculture.google.com/streetview/the-natural-history-museum/JQF3coVswSVUVw?sv_lng=-0.1763095666940444&sv_lat=51.49585077079966&sv_h=349.7214560100194&sv_p=7.317086054834945&sv_pid=JjkDPElblDKT7EbT7wN9dw&sv_z=1.6578940231750074', 'https://en.wikipedia.org/wiki/Natural_History_Museum,_London', 'The Natural History Museum in London is a natural history museum that exhibits a vast range of specimens from various segments of natural history. It is one of three major museums on Exhibition Road in South Kensington, the others being the Science Museum and the Victoria and Albert Museum.', 'img/UK_museum.jpg', '', ''),
(2, 'Van Gogh Museum Amsterdam, Netherlands', 'https://artsandculture.google.com/streetview/van-gogh-museum-groundfloor/2QHwyv_Y6gueAw?sv_lng=4.881116679300609&sv_lat=52.35827690478066&sv_h=339.39457660908386&sv_p=-2.2390664344936795&sv_pid=XgEzf7Uj1a2wDLc0p6yh3w&sv_z=1.0000000000000002', 'https://en.wikipedia.org/wiki/Van_Gogh_Museum', 'The Van Gogh Museum is a Dutch art museum dedicated to the works of Vincent van Gogh and his contemporaries in the Museum Square in Amsterdam South, close to the Stedelijk Museum, the Rijksmuseum, and the Concertgebouw.', 'img/Amsterdam_museum.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(34) NOT NULL,
  `phone` int(15) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `dob` date NOT NULL,
  `created_on` date NOT NULL,
  `modified_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_visit`
--
ALTER TABLE `booked_visit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `museums`
--
ALTER TABLE `museums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked_visit`
--
ALTER TABLE `booked_visit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `museums`
--
ALTER TABLE `museums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
