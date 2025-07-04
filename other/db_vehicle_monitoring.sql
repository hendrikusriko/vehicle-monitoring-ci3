-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2025 at 07:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vehicle_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `approver_1` int(11) DEFAULT NULL,
  `approver_1_status` enum('pending','approved','rejected') DEFAULT 'pending',
  `approver_2` int(11) DEFAULT NULL,
  `approver_2_status` enum('pending','approved','rejected') DEFAULT 'pending',
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `vehicle_id`, `driver_id`, `approver_1`, `approver_1_status`, `approver_2`, `approver_2_status`, `status`, `start_date`, `end_date`, `reason`, `created_at`, `deleted_at`) VALUES
(1, 3, 2, 1, 2, 'approved', 6, 'approved', 'approved', '2025-07-04', '2025-07-08', 'rapat penting', '2025-07-04 10:46:49', NULL),
(2, 2, 1, 2, 5, 'pending', 6, 'pending', 'pending', '2025-08-08', '2025-08-10', 'nambang pasir', '2025-07-04 11:05:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `license_number` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `phone`, `license_number`, `created_at`, `deleted_at`) VALUES
(1, 'Yono', '12345', '9999999', '2025-07-04 10:40:55', NULL),
(2, 'Asep', '7777777', '33333333', '2025-07-04 10:41:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `activity` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `activity`, `created_at`) VALUES
(1, 1, 'User Admin Kendaraan melakukan aksi create pada vehicle', '2025-07-04 05:40:26'),
(2, 1, 'User Admin Kendaraan melakukan aksi create pada vehicle', '2025-07-04 05:40:44'),
(3, 1, 'User Admin Kendaraan melakukan aksi create pada driver', '2025-07-04 05:40:55'),
(4, 1, 'User Admin Kendaraan melakukan aksi create pada driver', '2025-07-04 05:41:04'),
(5, 1, 'User Admin Kendaraan melakukan aksi create pada booking', '2025-07-04 05:46:49'),
(6, 2, 'User Manager Area melakukan aksi approval pada approval', '2025-07-04 05:56:11'),
(7, 6, 'User Leader 2 melakukan aksi approval pada approval', '2025-07-04 05:56:35'),
(8, 4, 'User admin 2 melakukan aksi create pada booking', '2025-07-04 06:05:54'),
(9, 4, 'User admin 2 melakukan aksi update pada booking', '2025-07-04 06:08:19'),
(10, 4, 'User admin 2 melakukan aksi update pada booking', '2025-07-04 06:08:28'),
(11, 1, 'User Admin Kendaraan melakukan aksi create pada vehicle', '2025-07-04 07:09:32'),
(12, 1, 'User Admin Kendaraan melakukan aksi update pada vehicle', '2025-07-04 07:10:50'),
(13, 1, 'User Admin Kendaraan melakukan aksi update pada vehicle', '2025-07-04 07:11:40'),
(14, 1, 'User Admin Kendaraan melakukan aksi update pada vehicle', '2025-07-04 07:11:57'),
(15, 1, 'User Admin Kendaraan melakukan aksi update pada vehicle', '2025-07-04 07:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','approver') NOT NULL,
  `level` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `level`, `created_at`) VALUES
(1, 'Admin Kendaraan', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 1, '2025-07-03 12:01:43'),
(2, 'Manager Area', 'approver1', 'e10adc3949ba59abbe56e057f20f883e', 'approver', 1, '2025-07-03 12:01:43'),
(3, 'Direktur Operasional', 'approver2', 'e10adc3949ba59abbe56e057f20f883e', 'approver', 2, '2025-07-03 12:01:43'),
(4, 'admin 2', 'admin2', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 1, '2025-07-04 10:36:46'),
(5, 'Leader 1', 'leader1', 'e10adc3949ba59abbe56e057f20f883e', 'approver', 1, '2025-07-04 10:38:08'),
(6, 'Leader 2', 'leader2', 'e10adc3949ba59abbe56e057f20f883e', 'approver', 2, '2025-07-04 10:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `type` enum('angkutan orang','angkutan barang') NOT NULL,
  `ownership` enum('milik','sewa') NOT NULL,
  `fuel_type` varchar(50) DEFAULT NULL,
  `license_plate` varchar(20) DEFAULT NULL,
  `last_service_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `fuel_consumption` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `type`, `ownership`, `fuel_type`, `license_plate`, `last_service_date`, `created_at`, `deleted_at`, `fuel_consumption`) VALUES
(1, 'Hino Dutro', 'angkutan barang', 'milik', 'solar', 'AB 2222 XX', '2025-04-04', '2025-07-04 10:40:26', NULL, 5.00),
(2, 'Inova Reborn', 'angkutan orang', 'sewa', 'solar', 'AB 2222 XXZZ', '2025-02-02', '2025-07-04 10:40:44', NULL, 8.00),
(3, 'Karimun kotak', 'angkutan orang', 'sewa', 'bensin', 'AB 2222 YY', '2025-01-01', '2025-07-04 12:09:32', NULL, 12.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `driver_id` (`driver_id`),
  ADD KEY `fk_approver_1` (`approver_1`),
  ADD KEY `fk_approver_2` (`approver_2`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`),
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`),
  ADD CONSTRAINT `fk_approver_1` FOREIGN KEY (`approver_1`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_approver_2` FOREIGN KEY (`approver_2`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
