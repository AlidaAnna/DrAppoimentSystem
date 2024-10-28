-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 11:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dr`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `op_id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  `pname` varchar(100) NOT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`op_id`, `uid`, `tid`, `pname`, `appointment_date`, `appointment_time`, `status`, `created_at`) VALUES
(1, 3, 2, 'alida', '2024-10-12', '09:00:00', 'booked', '2024-10-26 16:48:14'),
(2, 3, 2, 'alida', '2024-10-12', '09:15:00', 'booked', '2024-10-26 16:48:37'),
(3, 3, 2, 'alida', '2024-10-12', '05:30:00', 'booked', '2024-10-27 06:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_details`
--

CREATE TABLE `doctor_details` (
  `uid` int(11) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `specialization` varchar(20) DEFAULT NULL,
  `Date_of_Joining` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_details`
--

INSERT INTO `doctor_details` (`uid`, `qualification`, `specialization`, `Date_of_Joining`) VALUES
(3, 'mbbs', 'psychology', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'alida', 'alida', 'Patient'),
(3, 'deepu', 'deepu', 'doctor'),
(4, 'thomas', 'Thomas@123', 'Patient'),
(5, 'annlee', 'Annlee@123', 'Patient');

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE `timeslot` (
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `bookdate` date NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`tid`, `uid`, `bookdate`, `starttime`, `endtime`) VALUES
(2, 3, '2024-10-12', '09:00:00', '13:00:00'),
(3, 3, '2024-10-12', '16:00:00', '18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phno` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `firstname`, `lastname`, `address`, `phno`, `email`, `age`, `gender`) VALUES
(1, 'admin', 'admin', 'adminveetil', 8547449048, 'admin@gmail.com', 21, 'male'),
(2, 'Alida', 'Anna', 'Alidaveetil', 8590440742, 'alida@gmail.com', 22, 'Female'),
(3, 'deepu', 'joseph', 'deepuveettil', 9961463971, 'deepu@gmail', 23, 'Male'),
(4, 'Thomas', 'pp', 'thomasveettil', 8156867689, 'thomas@gmail', 41, 'Male'),
(5, 'Ann', 'Thomas', 'abc', 5465657656, 'abc@gmail.com', 23, 'Female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`op_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `doctor_details`
--
ALTER TABLE `doctor_details`
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `timeslot`
--
ALTER TABLE `timeslot`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `INT` (`uid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `timeslot`
--
ALTER TABLE `timeslot`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `timeslot` (`tid`);

--
-- Constraints for table `doctor_details`
--
ALTER TABLE `doctor_details`
  ADD CONSTRAINT `doctor_details_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timeslot`
--
ALTER TABLE `timeslot`
  ADD CONSTRAINT `INT` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
