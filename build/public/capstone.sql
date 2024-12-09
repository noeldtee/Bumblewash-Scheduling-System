-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 01:58 AM
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
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `admin_fn` varchar(99) NOT NULL,
  `admin_ln` varchar(99) NOT NULL,
  `admin_name` varchar(99) NOT NULL,
  `admin_email` varchar(99) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_number` varchar(15) DEFAULT NULL,
  `role` enum('Admin','Staff') DEFAULT 'Admin',
  `last_login` timestamp NULL DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_fn`, `admin_ln`, `admin_name`, `admin_email`, `admin_password`, `admin_number`, `role`, `last_login`, `profile_picture`, `created_at`, `updated_at`) VALUES
(1, '', '', 'admin', '', '123456', NULL, 'Admin', NULL, NULL, '2024-11-28 03:32:17', '2024-12-07 01:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `admin_logs`
--

CREATE TABLE `admin_logs` (
  `log_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `request_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `document_type` varchar(99) NOT NULL,
  `status` varchar(99) NOT NULL,
  `price` decimal(50,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `document_type`, `status`, `price`, `created_at`, `updated_at`) VALUES
(1, 'test', 'Available', 11, '2024-12-08 06:18:25', '2024-12-08 06:18:25'),
(2, 'test', 'Available', 11, '2024-12-08 06:18:44', '2024-12-08 06:18:44'),
(3, 'test', 'Available', 11, '2024-12-08 06:19:41', '2024-12-08 06:19:41'),
(4, 'test', 'Available', 11, '2024-12-08 06:19:43', '2024-12-08 06:19:43'),
(5, 'test', 'Available', 11, '2024-12-08 06:20:06', '2024-12-08 06:20:06'),
(6, 'test', 'Available', 11, '2024-12-08 06:20:41', '2024-12-08 06:20:41'),
(7, 'test', 'Available', 11, '2024-12-08 06:20:44', '2024-12-08 06:20:44'),
(8, 'test', 'Available', 11, '2024-12-08 06:20:51', '2024-12-08 06:20:51'),
(9, 'test', 'Available', 11, '2024-12-08 06:21:53', '2024-12-08 06:21:53'),
(10, 'test', 'Available', 11, '2024-12-08 06:21:55', '2024-12-08 06:21:55'),
(11, 'test', 'Available', 11, '2024-12-08 06:46:46', '2024-12-08 06:46:46'),
(12, 'test', 'Available', 1111, '2024-12-08 06:46:50', '2024-12-08 06:46:50'),
(13, 'test', 'Available', 1111, '2024-12-08 06:47:31', '2024-12-08 06:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` enum('pending','resolved','dismissed') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` enum('pending','sent','seen') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `amount_paid` decimal(55,0) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(255) NOT NULL,
  `payment_status` enum('pending','completed','failed') NOT NULL,
  `receipt_number` varchar(255) NOT NULL,
  `payment_reference` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qr_codes`
--

CREATE TABLE `qr_codes` (
  `qr_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `qr_code` varchar(255) NOT NULL,
  `is_used` tinyint(1) NOT NULL DEFAULT 0,
  `generated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `used_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_firstname` varchar(99) NOT NULL,
  `student_lastname` varchar(99) NOT NULL,
  `student_email` varchar(99) NOT NULL,
  `student_number` int(99) NOT NULL,
  `student_birthdate` date NOT NULL,
  `course` varchar(99) NOT NULL,
  `section` varchar(99) NOT NULL,
  `year_level` varchar(99) NOT NULL,
  `document_name` varchar(99) NOT NULL,
  `price` decimal(11,0) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `status` varchar(99) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_logs`
--

CREATE TABLE `student_logs` (
  `log_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `request_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_firstname` varchar(99) NOT NULL,
  `student_lastname` varchar(99) NOT NULL,
  `student_email` varchar(99) NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `student_password_confirm` varchar(99) NOT NULL,
  `student_number` varchar(20) NOT NULL,
  `student_birthdate` date NOT NULL,
  `student_gender` enum('male','female','prefer not to say','') NOT NULL,
  `course` varchar(50) DEFAULT NULL,
  `section` varchar(11) NOT NULL,
  `year_level` int(11) DEFAULT NULL,
  `student_profile` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `token` varchar(999) DEFAULT NULL,
  `terms` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `student_id`, `student_firstname`, `student_lastname`, `student_email`, `student_password`, `student_password_confirm`, `student_number`, `student_birthdate`, `student_gender`, `course`, `section`, `year_level`, `student_profile`, `created_at`, `updated_at`, `token`, `terms`) VALUES
(1, 0, 'Noel Christopher', 'Tee', 'noeldtee@gmail.com', '$2y$10$HUxEIBjy0Ix6tlh3proBZOEAl7y.adfsGHqJ1oOKX27X95PraIP1y', '@Leonigop01', '09972181003', '2001-07-17', 'male', 'BSIS', 'G', 4, 'http://localhost/capstone/build/public/assets/images/default_profile.png', '2024-12-08 04:04:00', '2024-12-08 04:04:00', 'JVxV2rWMtK8QVaqMKO7VADFxTLVlHPGNxzqSskb2cuAtmjMUmPAhHLtpJ0PA', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_username` (`admin_name`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `admin_logs`
--
ALTER TABLE `admin_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `qr_codes`
--
ALTER TABLE `qr_codes`
  ADD PRIMARY KEY (`qr_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_logs`
--
ALTER TABLE `student_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_email` (`student_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qr_codes`
--
ALTER TABLE `qr_codes`
  MODIFY `qr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_logs`
--
ALTER TABLE `student_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
