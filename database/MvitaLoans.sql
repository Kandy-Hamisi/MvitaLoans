-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 12, 2022 at 08:28 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MvitaLoans`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `IdNumber` int(20) NOT NULL,
  `ElectorsNo` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PassCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `Fullname`, `IdNumber`, `ElectorsNo`, `Email`, `PassCode`) VALUES
(1, 'Loving Otieno', 34585428, '01027921100710-8', 'loving234@gmail.com', 12345),
(2, 'Isaac Munuve', 34923481, '01027921200710-8', 'munuveisaac@gmail.com', 12345),
(3, 'Khadija Hassan', 29017320, '01027921200830-4', 'khadija23@gmail.com', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

CREATE TABLE `borrowers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ward_id` int(11) NOT NULL,
  `residence` varchar(255) NOT NULL,
  `guaranter_fullname` varchar(255) NOT NULL,
  `guaranter_id` int(11) NOT NULL,
  `loan_type` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `loanPlan_id` int(11) NOT NULL,
  `totalPay` int(11) NOT NULL,
  `approval_status` varchar(255) NOT NULL,
  `application_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowers`
--

INSERT INTO `borrowers` (`id`, `user_id`, `ward_id`, `residence`, `guaranter_fullname`, `guaranter_id`, `loan_type`, `amount`, `loanPlan_id`, `totalPay`, `approval_status`, `application_date`) VALUES
(5, 1, 1, 'sakina', 'Hamza Ali', 4837729, 'School Loan', 38000, 1, 39520, 'Paid', '2022-01-11 15:12:47'),
(7, 1, 2, 'ganjoni', 'Halima Hamisi', 1192876, 'small Business Loan', 150000, 1, 156000, 'Disbursed', '2022-01-11 18:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `loan_listing`
--

CREATE TABLE `loan_listing` (
  `id` int(11) NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `totalPay` int(11) NOT NULL,
  `approval_status` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loan_plans`
--

CREATE TABLE `loan_plans` (
  `id` int(11) NOT NULL,
  `months` int(11) NOT NULL,
  `interest_rate` int(11) NOT NULL,
  `overdue_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_plans`
--

INSERT INTO `loan_plans` (`id`, `months`, `interest_rate`, `overdue_rate`) VALUES
(1, 12, 4, 3),
(2, 36, 8, 4),
(3, 24, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `loan_types`
--

CREATE TABLE `loan_types` (
  `id` int(11) NOT NULL,
  `loan_type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_types`
--

INSERT INTO `loan_types` (`id`, `loan_type`, `description`) VALUES
(1, 'School Loan', 'Help you pay school fees'),
(2, 'small Business Loan', 'Help you start / expand business');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `IdNumber` int(11) NOT NULL,
  `ElectorsNo` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PassCode` varchar(255) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Fullname`, `IdNumber`, `ElectorsNo`, `Email`, `PassCode`, `CreatedDate`) VALUES
(1, 'Ali Juma', 38227120, '01027921200830-3', 'alijuma@gmail.com', '12345', '2022-01-09 12:58:26'),
(3, 'John Daniel', 38291083, '01027921100710-2', 'generalfib@gmail.com', '12345', '2022-01-12 19:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` int(11) NOT NULL,
  `ward_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `ward_name`) VALUES
(1, 'Majengo'),
(2, 'Shimanzi'),
(3, 'Old Town'),
(4, 'Tononoka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nation-ID` (`IdNumber`);

--
-- Indexes for table `borrowers`
--
ALTER TABLE `borrowers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `loanPlan_id` (`loanPlan_id`),
  ADD KEY `ward_id` (`ward_id`);

--
-- Indexes for table `loan_listing`
--
ALTER TABLE `loan_listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_plans`
--
ALTER TABLE `loan_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_types`
--
ALTER TABLE `loan_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `borrowers`
--
ALTER TABLE `borrowers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `loan_listing`
--
ALTER TABLE `loan_listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_plans`
--
ALTER TABLE `loan_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loan_types`
--
ALTER TABLE `loan_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowers`
--
ALTER TABLE `borrowers`
  ADD CONSTRAINT `borrowers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `borrowers_ibfk_2` FOREIGN KEY (`loanPlan_id`) REFERENCES `loan_plans` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `borrowers_ibfk_3` FOREIGN KEY (`ward_id`) REFERENCES `wards` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
