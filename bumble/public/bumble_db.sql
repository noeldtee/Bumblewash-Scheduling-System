-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 01:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `admin_token` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_name`, `admin_fn`, `admin_ln`, `admin_email`, `admin_number`, `admin_password`, `admin_image`, `admin_role`, `admin_token`) VALUES
(1, 'admin', 'bumble', 'wash', 'admin@gmail.com', '09123456789', '$2y$10$5..mrlNAfymqFKWSESUmFOyUCZN7u7Jmuefm8.wHZCWZZVitu8FDm', NULL, 'Admin', 'hT1mAv9o2PPJ9axdZodQhG6Jdi62eyh47b8uJvisZeg8VVGsQiYmXVzU6WkT');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(99) NOT NULL,
  `book_name` varchar(99) NOT NULL,
  `book_email` varchar(99) NOT NULL,
  `book_number` varchar(99) NOT NULL,
  `book_services` varchar(99) NOT NULL,
  `book_price` decimal(50,0) NOT NULL,
  `book_vehicle` varchar(99) NOT NULL,
  `book_date` date NOT NULL,
  `service_status` varchar(99) DEFAULT NULL,
  `book_status` varchar(99) DEFAULT NULL,
  `book_time` varchar(50) DEFAULT NULL,
  `book_token` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_email`, `book_number`, `book_services`, `book_price`, `book_vehicle`, `book_date`, `service_status`, `book_status`, `book_time`, `book_token`) VALUES
(1, 'Joberta', 'bumblewash@gmail.com', '09123456789', 'Underwash', 80, 'Tricycle', '2024-05-27', NULL, '', '10:00am - 11:00am', NULL),
(2, 'Christine', 'bumblewash@gmail.com', '09123456789', 'Carwash', 60, 'Tricycle', '2024-05-27', NULL, NULL, '3:00pm - 4:00pm', NULL),
(3, 'gel', 'bumblewash@gmail.com', '09123456789', '', 0, 'SUV', '2024-08-22', NULL, NULL, '3:00pm - 4:00pm', NULL),
(4, 'Pogi', 'bumblewash@gmail.com', '09123456789', 'Carwash', 80, 'Motor', '2024-05-29', NULL, NULL, '10:00am - 11:00am', NULL),
(5, 'koro', 'gilnie@gmail.com', '09123456777', 'Interior Detailing', 160, 'VAN/L300	', '2024-06-26', NULL, NULL, '5', NULL);

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

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `username`, `email`, `number`, `message`) VALUES
(1, 'bumblewash', 'bumblewash@gmail.com', '09123456789', 'hello world'),
(2, 'bumblewash', 'bumblewash@gmail.com', '09123456789', 'ohugfhjfhjgrtuyfjnvbkjgkjgkjgjkgkj');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service` varchar(99) NOT NULL,
  `vehicle` varchar(99) NOT NULL,
  `price` decimal(20,0) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `service_token` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service`, `vehicle`, `price`, `status`, `service_token`) VALUES
(7, 'Carwash', 'Motor', 80, 'Available', 'WTOF5qmxIYnuUBQWKScDEbR4LVNqrORYBcmyvSGS9wu0DM7cV2lRSVV2A44g'),
(8, 'Carwash', 'Tricycle', 90, 'Available', 'LeqFXHnNgKFMZb8cKNEZS00bahtEyzIOYy0goD8uieeQsRrLG2dd5OyRnXtl'),
(9, 'Carwash', 'Small Car', 110, 'Available', 'IOVtbyKJ0jVr6FKMdERvqewETRtdhSMD29AZYmKaeRlSVn6N6Z37L39mwlHm'),
(10, 'Carwash', 'Owner Type Jeep', 120, 'Available', 'LRtKIDvOV1PuGFvsokWyQVILhQvKqdr9pb9OtlsIkk6V56HhVV27YpSJp9gt'),
(11, 'Carwash', 'Pick Up', 150, 'Available', 'qDs0Bk9vmPSEDMTVOMhntFvQ0UbL9LYcVUmSrfX4Wk5GMy1tO3Y6IhjHU4Gr'),
(12, 'Carwash', 'VAN/L300', 160, 'Available', 'GJJGxWFYw5UpFNxweplOjFlgB0mI6PL5ILGA3bxJicvgZNExhNWonXDUX3F9'),
(13, 'Under Wash', 'Motor', 80, 'Available', 'L4cpfxg4M8G2Pt0Xv6If69A4fXw1KUzojfjPHrj7QHncKfylJMFz7Jd0Lk6J'),
(14, 'Under Wash', 'Tricycle', 90, 'Available', 'yklKBSnIyvVju2OUkerwXxsEVF8crL1A6KhNVU2qPkQ6TZEu9EBbAMbiVfAh'),
(15, 'Under Wash', 'Small Car', 110, 'Available', 'm2Q1UkqAb9k3SQignEXnthwXdKVlPxGrUt5gKdoI3KefG9nYDMFdmbZRpAh2'),
(16, 'Under Wash', 'Owner Type Jeep', 120, 'Available', '2rAaLOtKETJL6NtwVX4qVs2JuHoALJIcxWpgJTZdd9PvasTeLHLtqab5KTNQ'),
(18, 'Under Wash', 'VAN/L300', 160, 'Available', 'XoB4hdb7nBeeAv12k6aiqolKYtVE6yNqzRTnaVW30rEsVmUf7eojo7VpeNXF'),
(19, 'Interior Detailing', 'Motor', 80, 'Available', 'ktdSmT1brTZpwHXLXOLPgGNEIVW2pKupZwyopqvE1srEx7xvQATGaxnt4hMj'),
(20, 'Interior Detailing', 'Tricycle', 90, 'Available', 'uei5we4JgT73F49UD0AuVjqYPdbsAyxjWaYxaS0nBEniMXe9ODc315IOjVIq'),
(21, 'Interior Detailing', 'Small Car	', 110, 'Available', 'QfjJPwgofOW8hpxM7uPtety3582jKcfmfVXRxX2eO2fmaS5PXOd4Iw51oKtc'),
(22, 'Interior Detailing', 'Owner Type Jeep	', 120, 'Available', 'y9sssdfGnBsKeGcprZtftE0Lj8XtS9y7ham18VglJSZhQ5MGcFPpUKA9naxQ'),
(23, 'Interior Detailing', 'Pick Up	', 150, 'Available', '4AraNZ8ZAeAF82wjj4O7Hl5aFZTVA9TbFULgTMFQUP93JL6fWgE5vNWyx1ry'),
(24, 'Interior Detailing', 'VAN/L300	', 160, 'Available', 'p0f4qNgK2pPvBEoAqq5eaUAuUtcO8Au2H7ZofwdeX73XAIUu38VZU0zYe6R5'),
(25, 'Exterior Detailing', 'Motor', 80, 'Available', 'n8xgxWXpRnwpsM6RjqKFMx61rj2vgloWx5qugkEjKjPrLVu9GzGWrzn5oEBa'),
(26, 'Exterior Detailing', 'Tricycle', 90, 'Available', 'gq3WgvR1J6JJqTxiMPubAITOuO6buZd2F3gY5m1zVjILB01QbshVzBzeygHP'),
(27, 'Exterior Detailing', 'Small Car	', 110, 'Available', 'jimwQ0jV59rt1VIGAiBHmVLsED4sq9ZkZaj6VQime3LttUxKSsWp1uf4NwbX'),
(28, 'Exterior Detailing', 'Owner Type Jeep	', 120, 'Available', 'vTx31npJLWh1ThLPHeyHsuMeKZ67hLhmyiedqfIFW32wBjNAUeDm4jvLMdek'),
(29, 'Exterior Detailing', 'Pick Up', 150, 'Available', 'fqLKTG76z3WvVZ8iUpZHOSa56G7Zx5omflu69ixEThpD9VMmVLf3kID9TbLs'),
(30, 'Exterior Detailing', 'VAN/L300	', 160, 'Available', 'XZu40kYi3uzaMyrQ9Qu0ohVomnzQSnhXdpLlFx3accZdVrD5axotvOiNmbEz'),
(31, 'Liquid Wax', 'Motor', 80, 'Available', 'GOzOSwS2vBY7wMrl6NbTV9dUZ601RaWVRto6mpptaNMJxd32IdzXN8K2MdiX'),
(32, 'Liquid Wax', 'Tricycle', 90, 'Available', 'atsQlcPUdSNmcpLsfhD6F4VQ0xXGdozEPFtDrGVzKLEcU9P9tApP1s29p6HX'),
(33, 'Liquid Wax', 'Small Car	', 110, 'Available', 'D7q8NSd2ALApuDXhv3WVM10EGDVtiANSMnvsbB1mmKRTXV1YYtSI32DNKqKw'),
(34, 'Liquid Wax', 'Owner Type Jeep	', 120, 'Available', 'HjSrdEDatqu0HTpf0xfBSxE0J4FYgFKMqJIUD1Wcm5tUtVSES4kvdVLuJecK'),
(35, 'Liquid Wax', 'Pick Up	', 150, 'Available', 'olal4YG19JVHTmGPrQUbG953M9R5hXc8KDJvPvjYZ6ZhIWQI1YKjfVbUahQk'),
(36, 'Liquid Wax', 'VAN/L300	', 160, 'Available', 'vmMVjPEd8wvD5jpe6IdWrVTaWwAlVsIuPqeyUnGM9ZDI0V34NzhNd2mNzpZj'),
(37, 'Cream Wax', 'Motor', 80, 'Available', 'HwhtINbhalVizg4RVKDsVMhKSX5GI5jtuusOeg8qaHoPwIDbTzF6rXdfj22f'),
(38, 'Cream Wax', 'Tricycle', 90, 'Available', '0vIkUcAV9VueQVBVeyzyS0L2vHunQIRWw4BQXM6qU1BFqerdsoE0s2rEvDz2'),
(39, 'Cream Wax', 'Small Car	', 110, 'Available', '34DUdcvuiK0WvnKpz5P9pF14EWgbflM91Wk3gRJV0wOOJ6AGbEVkRqSzmO0e'),
(40, 'Cream Wax', 'Owner Type Jeep	', 120, 'Available', 'kGjqXD1g8VV9KZT6VGPftakM4qK3SbTouFgzhhjoALO6mTvV3mLeolfFUOWo'),
(41, 'Cream Wax', 'Pick Up	', 150, 'Available', 'SOkETtyWtn1KneIe22anqyAoyOVRaht1Hqv61PXnJjjSebflvxtjiIPXevgo'),
(42, 'Cream Wax', 'VAN/L300	', 160, 'Available', 'jxws4Wa8jAbUJr1oRYeWrPJBYavfKYYLfnTdopbUTViQ8JjgeKSkTEB1JYa4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `username` varchar(99) NOT NULL,
  `email` varchar(60) NOT NULL,
  `number` varchar(11) NOT NULL,
  `password` varchar(60) NOT NULL,
  `image` varchar(60) DEFAULT NULL,
  `role` varchar(60) DEFAULT NULL,
  `token` varchar(60) DEFAULT NULL,
  `message` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `number`, `password`, `image`, `role`, `token`, `message`) VALUES
(1, 'bumble', 'wash', 'bumblewash', 'bumblewash@gmail.com', '09123456789', '$2y$10$5Kcwr1gFUHOX02XqyY9O5OY6r2HDxLeHx7WDkGfMrxwQNENY3ZM9W', NULL, NULL, 's6luklgaAy1A9a5Aud7YDpBkisovLVK1uaNmjIDp2j9q0VXnztfpEQyTwQhc', ''),
(2, 'Gilnie', 'Hipolito', 'Gilnie', 'gilnie@gmail.com', '09123456777', '$2y$10$zNVKekV2swg7QiIMcloiCuqCs5jngGm2FHCKygZECmRmRDSdrQ5jK', NULL, NULL, 'a3oHXZ5IcF4veLcDiXyRHso8BGVUo2ELWKBaJjfxkQ4V51V5EPPx2ytJlffl', '');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
