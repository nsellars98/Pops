-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 06:52 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nwacc`
--

-- --------------------------------------------------------

--
-- Table structure for table `pops`
--

CREATE TABLE `pops` (
  `id` int(11) NOT NULL,
  `pop_number` int(11) NOT NULL,
  `pop_type` varchar(50) NOT NULL,
  `pop_name` varchar(50) NOT NULL,
  `exclusive` tinyint(4) NOT NULL,
  `size` int(11) NOT NULL,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pops`
--

INSERT INTO `pops` (`id`, `pop_number`, `pop_type`, `pop_name`, `exclusive`, `size`, `last_update`) VALUES
(14, 50, 'Fallout', 'Feral Ghoul', 0, 3, '2019-04-24 23:41:12'),
(15, 205, 'Rose', 'Star Wars', 1, 3, '2019-04-24 22:54:28'),
(16, 502, 'Ready Player One', 'I-ROK', 0, 3, '2019-04-24 22:57:44'),
(18, 199, 'Gears of War', 'Brumak', 0, 6, '2019-04-24 23:01:39'),
(19, 109, 'Suicide Squad', 'The Jokers', 1, 3, '2019-04-24 23:01:39'),
(20, 65, 'Guardians of the Galaxy', 'Dancing Groot', 0, 3, '2019-04-24 23:05:17'),
(21, 83, 'Avengers', 'Grinning Ultron', 1, 3, '2019-04-24 23:05:17'),
(22, 31, 'Predator', 'Predator', 0, 3, '2019-04-24 23:08:41'),
(23, 63, 'Game of Thrones', 'Daenerys Targaryen on Throne', 0, 6, '2019-04-24 23:08:41'),
(24, 44, 'Borderlands', 'Claptrop', 1, 3, '2019-04-24 23:40:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pops`
--
ALTER TABLE `pops`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pops`
--
ALTER TABLE `pops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
