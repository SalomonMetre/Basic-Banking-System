-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 28, 2022 at 10:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Amount` float NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`Id`, `UserId`, `Amount`, `Date`, `Status`) VALUES
(1, 1, 1000, '2022-06-27 10:40:13', 'Disapproved'),
(2, 1, 1000, '2022-06-27 10:41:15', 'Approved'),
(3, 5, 1000, '2022-06-28 20:04:56', 'Approved'),
(4, 5, 500, '2022-06-28 20:07:53', 'Disapproved'),
(5, 5, 500, '2022-06-28 20:21:23', 'Approved'),
(6, 5, 0, '2022-06-28 20:26:54', 'Disapproved'),
(7, 5, 300, '2022-06-28 20:27:05', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Message` text NOT NULL,
  `Status` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`Id`, `UserId`, `Message`, `Status`, `Date`) VALUES
(1, 1, 'Your deposit of $2000 was successful !', 'Success', '2022-06-22 10:19:38'),
(2, 1, 'Your transaction failed ! Please try again...', 'Failure', '2022-06-22 10:21:01'),
(3, 1, 'Your deposit of $2000 was successful !', 'Success', '2022-06-22 10:23:33'),
(4, 1, 'Your withdrawal of $1800 was successful !', 'Success', '2022-06-22 10:58:21'),
(5, 1, 'Your withdrawal of $1800 was successful !', 'Success', '2022-06-22 11:03:18'),
(6, 1, 'Your transaction failed ! Please try again...', 'Failure', '2022-06-22 11:06:49'),
(7, 1, 'Your withdrawal of $2000 failed !', 'Failure', '2022-06-22 11:08:49'),
(8, 1, 'Your withdrawal of $1000 was successful !', 'Success', '2022-06-22 11:13:30'),
(9, 1, 'Your transaction failed ! Please try again...', 'Failure', '2022-06-22 11:14:47'),
(10, 1, 'Your deposit of $6600 was successful !', 'Success', '2022-06-22 11:16:44'),
(11, 1, 'Your transaction failed ! Please try again...', 'Failure', '2022-06-22 11:30:56'),
(12, 1, 'Your deposit of $500 was successful !', 'Success', '2022-06-22 12:41:34'),
(13, 1, 'Your transaction failed ! Please try again...', 'Failure', '2022-06-22 12:42:07'),
(14, 1, 'Your withdrawal of $6000 failed !', 'Failure', '2022-06-22 13:31:03'),
(15, 1, 'Your deposit of $500 was successful !', 'Success', '2022-06-26 10:57:14'),
(16, 1, 'Your withdrawal of $500 was successful !', 'Success', '2022-06-26 11:00:30'),
(17, 1, 'Your deposit of $500 was successful !', 'Success', '2022-06-27 11:46:41'),
(18, 1, 'Your transaction failed ! Please try again...', 'Failure', '2022-06-27 11:54:15'),
(19, 5, 'Your withdrawal of $500 failed !', 'Failure', '2022-06-28 19:42:56'),
(20, 5, 'Your withdrawal of $100 failed !', 'Failure', '2022-06-28 19:46:39'),
(21, 5, 'Your deposit of $500 was successful !', 'Success', '2022-06-28 19:55:43'),
(22, 5, 'Your transaction failed ! Please try again...', 'Failure', '2022-06-28 19:57:36'),
(23, 5, 'Your withdrawal of $0 was successful !', 'Success', '2022-06-28 19:58:09'),
(24, 5, 'Your transaction failed ! Please try again...', 'Failure', '2022-06-28 20:04:35'),
(25, 5, 'Your withdrawal of $200 was successful !', 'Success', '2022-06-28 20:14:32'),
(26, 5, 'Your withdrawal of $200000 failed !', 'Failure', '2022-06-28 20:15:11'),
(27, 5, 'Your withdrawal of $200000 failed !', 'Failure', '2022-06-28 20:17:47'),
(28, 5, 'Your withdrawal of $200000 failed !', 'Failure', '2022-06-28 20:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`Id`, `UserId`, `Rating`) VALUES
(1, 1, 3),
(2, 1, 3),
(3, 1, 3),
(4, 1, 3),
(5, 1, 3),
(6, 0, 3),
(7, 0, 3),
(8, 0, 3),
(9, 0, 3),
(10, 1, 3),
(11, 0, 3),
(12, 1, 3),
(13, 0, 3),
(14, 1, 3),
(15, 0, 3),
(16, 1, 3),
(17, 0, 3),
(18, 1, 3),
(19, 1, 3),
(20, 1, 3),
(21, 0, 3),
(22, 1, 3),
(23, 0, 3),
(24, 1, 3),
(25, 0, 3),
(26, 1, 3),
(27, 0, 3),
(28, 1, 3),
(29, 2, 3),
(30, 1, 4),
(31, 0, 3),
(32, 1, 3),
(33, 0, 3),
(34, 1, 4),
(35, 1, 3),
(36, 1, 3),
(37, 1, 3),
(38, 0, 3),
(39, 0, 3),
(40, 3, 3),
(41, 0, 3),
(42, 0, 3),
(43, 1, 3),
(44, 1, 3),
(45, 1, 3),
(46, 0, 3),
(47, 1, 3),
(48, 0, 3),
(49, 0, 3),
(50, 1, 3),
(51, 1, 3),
(52, 0, 3),
(53, 1, 3),
(54, 1, 3),
(55, 0, 3),
(56, 1, 3),
(57, 1, 3),
(58, 1, 3),
(59, 0, 3),
(60, 0, 3),
(61, 0, 3),
(62, 0, 3),
(63, 1, 3),
(64, 0, 3),
(65, 1, 3),
(66, 0, 3),
(67, 1, 3),
(68, 1, 3),
(69, 0, 3),
(70, 5, 3),
(71, 5, 3),
(72, 0, 3),
(73, 5, 3),
(74, 5, 3),
(75, 0, 3),
(76, 5, 3),
(77, 0, 3),
(78, 5, 3),
(79, 5, 3),
(80, 0, 3),
(81, 5, 3),
(82, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `receiverDetails`
--

CREATE TABLE `receiverDetails` (
  `Id` int(11) NOT NULL,
  `TransferId` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `ReceiverId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `ToId` int(11) NOT NULL,
  `Type` text NOT NULL,
  `Amount` float NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`Id`, `UserId`, `ToId`, `Type`, `Amount`, `Date`, `Status`) VALUES
(1, 1, 0, 'Deposit', 2000, '2022-06-22 10:23:33', 'Successful'),
(2, 1, 0, 'Withdraw', 200, '2022-06-22 10:58:21', 'Successful'),
(3, 1, 0, 'Withdraw', 200, '2022-06-22 11:03:18', 'Successful'),
(4, 1, 0, 'Withdraw', 300, '2022-06-22 11:06:49', 'Failed'),
(5, 1, 0, 'Withdraw', 800, '2022-06-22 11:13:31', 'Successful'),
(6, 1, 0, 'Deposit', 5500, '2022-06-22 11:14:47', 'Failed'),
(7, 1, 0, 'Deposit', 5600, '2022-06-22 11:16:44', 'Successful'),
(8, 1, 0, 'Withdraw', 300, '2022-06-22 11:30:56', 'Failed'),
(9, 1, 0, 'Transfer', 100, '2022-06-22 12:15:43', 'Successful'),
(10, 1, 2, 'Transfer', 0, '2022-06-22 13:04:28', 'Successful'),
(11, 1, 0, 'Deposit', 500, '2022-06-22 12:41:34', 'Successful'),
(12, 1, 0, 'Deposit', 0, '2022-06-22 12:59:34', 'Failed'),
(13, 1, 2, 'Transfer', 0, '2022-06-22 13:05:37', 'Successful'),
(14, 1, 0, 'Deposit', 500, '2022-06-26 10:57:14', 'Successful'),
(15, 1, 2, 'Transfer', 5000, '2022-06-22 13:32:03', 'Successful'),
(16, 1, 0, 'Withdraw', 500, '2022-06-26 11:00:31', 'Successful'),
(17, 1, 2, 'Transfer', 0, '2022-06-22 13:35:44', 'Successful'),
(18, 1, 2, 'Transfer', 100, '2022-06-26 15:15:16', 'Reversed'),
(19, 1, 2, 'Transfer', 50, '2022-06-26 15:16:01', 'Reversed'),
(20, 1, 2, 'Transfer', 500, '2022-06-26 15:20:56', 'Successful'),
(21, 1, 2, 'Transfer', 50, '2022-06-26 15:29:18', 'Reversed'),
(22, 1, 2, 'Transfer', 150, '2022-06-26 15:35:40', 'Failed'),
(23, 1, 0, 'Deposit', 500, '2022-06-27 11:46:42', 'Successful'),
(24, 1, 0, 'LoanPayment', 100, '2022-06-27 11:48:05', 'Successful'),
(25, 1, 0, 'LoanPayment', 100, '2022-06-27 11:54:15', 'Failed'),
(26, 1, 0, 'LoanPayment', 100, '2022-06-27 11:55:57', 'Successful'),
(27, 5, 0, 'Deposit', 500, '2022-06-28 19:55:43', 'Successful'),
(28, 5, 0, 'Withdraw', 0, '2022-06-28 19:57:36', 'Failed'),
(29, 5, 0, 'Withdraw', 0, '2022-06-28 19:58:09', 'Successful'),
(30, 5, 0, 'Deposit', 100, '2022-06-28 20:04:35', 'Failed'),
(31, 5, 0, 'Withdraw', 200, '2022-06-28 20:14:32', 'Successful'),
(32, 5, 2, 'Transfer', 300, '2022-06-28 20:12:06', 'Reversed'),
(33, 5, 2, 'Transfer', 100, '2022-06-28 20:09:57', 'Sent'),
(34, 5, 0, 'Withdraw', 800, '2022-06-28 20:15:20', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Gender` text NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `Amount` float NOT NULL,
  `LoanAmount` float NOT NULL,
  `PhysicalAddress` text NOT NULL,
  `Profession` text NOT NULL,
  `CardNumber` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `FirstName`, `LastName`, `Gender`, `Email`, `Password`, `Amount`, `LoanAmount`, `PhysicalAddress`, `Profession`, `CardNumber`) VALUES
(1, 'John', 'Metre', 'Male', 'salomon.metre@gmail.com', 'e1bb723b0c64bc4035fad998c422e345', 1700, 0, 'Nairobi', 'Student', '094b37e942ddd5fee90da3c5cd477c06'),
(2, 'Samson', 'Mokaya', 'Male', 'sammy123@gmail.com', '1c80dd8fa724b6c66ac5f7ee065349f9', 7400, 0, 'Embu', 'Student', '7440f3bcd868400059f557b057483e5b'),
(5, 'Melchior', 'Mikui', 'Male', 'melchbahati@gmail.com', 'c1afc7e0bddc7b462e51004c9ac634a4', 3000, 2800, 'Machakos', 'Electrical Engineer', '3f34cb49ccad606adc7009133a5be3c0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `receiverDetails`
--
ALTER TABLE `receiverDetails`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `receiverDetails`
--
ALTER TABLE `receiverDetails`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
