-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 07:48 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `office_visitors`
--

CREATE TABLE `office_visitors` (
  `id` int(11) NOT NULL,
  `name` varchar(254) NOT NULL,
  `phone` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `purpose` varchar(254) NOT NULL,
  `deleted_at` int(11) DEFAULT 0 COMMENT '0 = not deleted,1 = deleted',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `office_visitors`
--

INSERT INTO `office_visitors` (`id`, `name`, `phone`, `email`, `purpose`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'rahul chugh', '706584682', 'rahulchugh@gmail.com', 'demo purpose', 0, '2022-12-11 05:47:35', '2022-12-11 01:17:56'),
(2, 'rahul chugh', '7485963210', 'rahulchugh@gmail.com', 'testing purpose', 0, '2022-12-11 05:49:14', '2022-12-11 01:17:47'),
(3, 'rahul', '7485963210', 'rahulchugh@gmail.com', 'testing purpose', 1, '2022-12-11 06:29:41', '2022-12-11 01:17:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `office_visitors`
--
ALTER TABLE `office_visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `office_visitors`
--
ALTER TABLE `office_visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
