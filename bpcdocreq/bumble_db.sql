-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2024 at 07:28 AM
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
-- Database: `bumble_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(99) NOT NULL,
  `admin_fn` varchar(99) NOT NULL,
  `admin_ln` varchar(99) NOT NULL,
  `admin_email` varchar(99) NOT NULL,
  `admin_number` varchar(20) NOT NULL,
  `admin_password` varchar(99) NOT NULL,
  `admin_image` varchar(99) DEFAULT NULL,
  `admin_role` varchar(99) DEFAULT NULL,
  `admin_token` varchar(99) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_name`, `admin_fn`, `admin_ln`, `admin_email`, `admin_number`, `admin_password`, `admin_image`, `admin_role`, `admin_token`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'Super', 'Admin', 'superadmin@gmail.com', '09991234567', '$2y$10$XwpuR5nlmv4lMz3E8C5OkOt3SOE21X74FNhkBEK/Kz.50KTBNrZrm', NULL, 'Admin', 'PXVoO1hDVzbeg8uWWQzaueuedHUSfF5KpgN8qTxkemx8XFR4tsHfaNPRW9iv', '2024-12-10 15:13:33', '2024-12-11 02:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(99) NOT NULL,
  `student_id` varchar(55) NOT NULL,
  `book_fname` varchar(99) NOT NULL,
  `book_lname` varchar(55) NOT NULL,
  `book_email` varchar(99) NOT NULL,
  `book_number` varchar(99) NOT NULL,
  `student_birthdate` date DEFAULT NULL,
  `course` varchar(99) NOT NULL,
  `section` varchar(99) NOT NULL,
  `year_level` varchar(11) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `book_document` varchar(99) NOT NULL,
  `price` decimal(50,0) NOT NULL,
  `pickup_date` varchar(999) NOT NULL DEFAULT 'TBA',
  `document_status` varchar(99) DEFAULT NULL,
  `book_status` enum('pending','in process','to pickup','completed','rejected') DEFAULT NULL,
  `payment_status` varchar(99) NOT NULL DEFAULT 'Paid',
  `book_token` varchar(60) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `notification_sent` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `username` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `number` varchar(99) NOT NULL,
  `message` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `document` varchar(99) NOT NULL,
  `price` decimal(20,0) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `service_token` varchar(70) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `document`, `price`, `status`, `service_token`, `created_at`, `updated_at`) VALUES
(5, 'Certificate of Registration', 0, 'Available', 'dQ8MJJ4GFo1j5put6F8SLd3oH7sdyZ3b0cNNqKBtYb8WMdzvfXhRIwHqFZEq', '2024-12-10 12:57:55', '2024-12-10 12:57:55'),
(6, 'Certificate of Grades', 50, 'Available', 'VkGPU9AW4Na4RYBofz5Jdj2H0N7IDsx8RvQKa7kvkVgZj2y5cIqQWBDX0dRI', '2024-12-10 12:58:10', '2024-12-10 12:58:10'),
(7, 'Transcript of Records', 50, 'Available', '2DiQqhtwR0kFwZS19hXoRz3Wefw0uhJ64icBGZyn8VBNIVoin1MOy6id4TDG', '2024-12-10 12:58:25', '2024-12-10 12:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `student_id` varchar(99) NOT NULL,
  `student_email` varchar(99) NOT NULL,
  `student_number` varchar(99) NOT NULL,
  `student_firstname` varchar(60) NOT NULL,
  `student_lastname` varchar(60) NOT NULL,
  `student_password` varchar(60) NOT NULL,
  `student_password_confirm` varchar(99) NOT NULL,
  `student_profile` varchar(60) DEFAULT NULL,
  `student_gender` varchar(99) NOT NULL,
  `student_birthdate` date NOT NULL,
  `course` varchar(99) NOT NULL,
  `section` varchar(25) NOT NULL,
  `year_level` varchar(99) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `terms` varchar(99) NOT NULL,
  `role` varchar(60) DEFAULT NULL,
  `token` varchar(60) DEFAULT NULL,
  `message` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`,`student_email`,`student_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
