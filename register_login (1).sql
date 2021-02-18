-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 12:43 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `email`, `phone_number`, `password`) VALUES
(0, 'reme', 'Ziedani', 'remeziedani@gmail.com', 684464817, '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `foto` varchar(255) NOT NULL,
  `title` varchar(40) NOT NULL,
  `startdatum` date NOT NULL,
  `einddatum` date DEFAULT NULL,
  `presentator` varchar(40) DEFAULT NULL,
  `aantalplaatsen` int(11) DEFAULT NULL,
  `aanmeldingen` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`foto`, `title`, `startdatum`, `einddatum`, `presentator`, `aantalplaatsen`, `aanmeldingen`, `id`) VALUES
('https://platform-duic.imgix.net/app/uploads/sites/2/2018/04/20171023-Rboosterbroek-Utrecht-040-1125x750.jpg?auto=format%2Ccompress&ch=Width%2CDPR%2CSave-Data&dpr=2.63&fit=max&h=430&ixjsv=2.2.4&ixlib=php-1.2.1&q=38', 'foto', '2021-02-17', '2021-04-06', 'reem', 12, 12, 9),
('https://www.visitflanders.com/nl/binaries/Cover-LR_crop420x210_tcm14-141348.jpg', 'web', '2021-02-09', '2021-02-23', 'reem', 21, 8, 10),
('https://pbs.twimg.com/media/DgVDr5QXcAAvX7R.jpg', 'concert', '2021-02-27', '2021-03-02', 'Anita', 12, 12, 11),
('https://comps.canstockphoto.com/emotional-musician-with-sax-during-the-stock-photography_csp84165004.jpg', 'consert', '2021-02-25', '2021-04-19', 'Anita', 12, 8, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`) VALUES
(5, 'reem', '202cb962ac59075b964b07152d234b70', 'reem'),
(6, 'louay', '202cb962ac59075b964b07152d234b70', 'louay'),
(7, 'raghad', '202cb962ac59075b964b07152d234b70', 'raghad');

-- --------------------------------------------------------

--
-- Table structure for table `user_events`
--

CREATE TABLE `user_events` (
  `user_id` int(11) DEFAULT NULL,
  `events_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_events`
--

INSERT INTO `user_events` (`user_id`, `events_id`, `id`) VALUES
(14, 9, 27),
(14, 9, 28),
(14, 9, 29),
(14, 9, 30),
(16, 11, 31),
(18, 11, 32),
(19, 11, 33),
(19, 11, 34),
(19, 11, 35),
(19, 11, 36),
(19, 11, 37),
(19, 11, 38),
(22, 11, 41),
(22, 12, 42),
(22, 12, 43);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `fname`, `lname`, `email`, `phone_number`, `password`) VALUES
(14, 'R', 'ziedani', 'raghadani@gmail.com', 0, '344'),
(15, 'renad', 'ziedani', 'renad@gmail.com', 684464817, '123456'),
(16, 'louay', 'hamadah', 'louayhamadah@gmail.com', 684464817, 'louay12'),
(17, 'lolo', 'lolo', 'lolo@gmail.com', 684464817, '1234'),
(18, 'romwe', 'ziedani', 'raedani@gmail.com', 684464817, '1234'),
(19, 'merfat', 'ziedani', 'merfatzedani@gmail.com', 684464, '202cb962ac59075b964b07152d234b70'),
(20, 'martijn', 'ziedani', 'martijnzedani@gmail.com', 684464817, '202cb962ac59075b964b07152d234b70'),
(21, 'll', 'll', 'll@gmail.com', 684464817, '202cb962ac59075b964b07152d234b70'),
(22, 'aa', 'aa', 'a@gmail.com', 684464817, '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_events`
--
ALTER TABLE `user_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_id` (`events_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_events`
--
ALTER TABLE `user_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_events`
--
ALTER TABLE `user_events`
  ADD CONSTRAINT `user_events_ibfk_1` FOREIGN KEY (`events_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `user_events_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_login` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
