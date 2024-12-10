-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2024 at 10:08 AM
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
(1, 'admin', 'Noel Christopher', 'Tee', 'noeldtee27@gmail.com', '09972181003', '$2y$10$cvMnmdgDiGf73LpsA9i16ebqfUdZo6YSeQjj2IlyMFMWmuZzQ6POO', NULL, 'Admin', 'mR1vVFmo4xFbzqmWfOI8GGdz40PA9lFZzF85yamF9zRix2cGKkrHP8foRU5q', '2024-12-09 17:42:51', '2024-12-09 17:42:51');

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
  `year_level` int(11) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `book_document` varchar(99) NOT NULL,
  `price` decimal(50,0) NOT NULL,
  `pickup_date` varchar(999) NOT NULL DEFAULT 'For Approval',
  `document_status` varchar(99) DEFAULT NULL,
  `book_status` enum('pending','in_process','to_pickup','completed','rejected') DEFAULT 'pending',
  `payment_status` varchar(99) NOT NULL DEFAULT 'Paid',
  `book_token` varchar(60) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `student_id`, `book_fname`, `book_lname`, `book_email`, `book_number`, `student_birthdate`, `course`, `section`, `year_level`, `purpose`, `book_document`, `price`, `pickup_date`, `document_status`, `book_status`, `payment_status`, `book_token`, `created_at`, `updated_at`) VALUES
(1, 'MA21592102', 'Noel Christopher', 'Tee', 'noeldtee@gmail.com', '09972181003', '2001-12-07', 'BSIS', 'G', 1, 'test', 'Certificate of Registration,ToR', 100, 'For Approval', NULL, 'pending', 'Paid', NULL, '2024-12-10 07:43:34', '2024-12-10 07:43:34');

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
(3, 'ToR', 100, 'Available', NULL, '2024-12-09 14:52:13', '2024-12-09 14:52:13'),
(4, 'Certificate of Registration', 0, 'Available', 'FSXKasJVpJlOInhxLYk3r1uaI7HvFcDru8QADw8lvhpVfKPzVx4ssqirVi7y', '2024-12-09 18:02:10', '2024-12-09 18:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `student_id` varchar(25) NOT NULL,
  `student_firstname` varchar(60) NOT NULL,
  `student_lastname` varchar(60) NOT NULL,
  `student_email` varchar(99) NOT NULL,
  `student_number` varchar(11) NOT NULL,
  `student_password` varchar(60) NOT NULL,
  `student_password_confirm` varchar(99) NOT NULL,
  `student_profile` varchar(60) DEFAULT NULL,
  `student_gender` varchar(99) NOT NULL,
  `student_birthdate` date NOT NULL,
  `course` varchar(11) NOT NULL,
  `section` varchar(25) NOT NULL,
  `year_level` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `terms` varchar(99) NOT NULL,
  `role` varchar(60) DEFAULT NULL,
  `token` varchar(60) DEFAULT NULL,
  `message` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `student_id`, `student_firstname`, `student_lastname`, `student_email`, `student_number`, `student_password`, `student_password_confirm`, `student_profile`, `student_gender`, `student_birthdate`, `course`, `section`, `year_level`, `created_at`, `updated_at`, `terms`, `role`, `token`, `message`) VALUES
(1, 'MA21592102', 'Noel Christopher', 'Tee', 'noeldtee@gmail.com', '09972181003', '$2y$10$W8X3ltq6y2DeFJWh5sRzkuQuDR7bFCdCuBUu5yGoNAGAo0QjrPo46', '123456', 'http://localhost/capstone/bumble/public/assets/images/defaul', 'Male', '2001-12-07', 'BSIS', 'G', 1, '2024-12-10 07:40:02', '2024-12-10 07:40:02', 'on', NULL, 'Rs9NOoOtbsWjR7qhDf7Wsn8FBX9tFVWk6MqVpkTr29472IateXtuZnZ57Azk', '');

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
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD KEY `student_email` (`student_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
