-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2023 at 03:58 AM
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
-- Database: `mltar`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `cellphone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `first_name`, `middle_name`, `last_name`, `cellphone`, `address`, `age`, `gender`, `email`, `service`, `appointment_date`, `appointment_time`, `status`) VALUES
(1, 'David', '', 'Bernal', '09876543221', 'Bicos, Rizal, Nueva Ecija', 23, 'Male', 'davidbernal@yahoo.com', 'hematology', '2023-07-10', '10:53:00', 'Done'),
(2, 'David', '', 'Bernal', '09876543221', 'Bicos, Rizal, Nueva Ecija', 23, 'Male', 'davidbernal@yahoo.com', 'hematology', '2023-07-10', '12:42:00', 'Done'),
(3, 'David', '', 'Bernal', '09876543221', 'Bicos, Rizal, Nueva Ecija', 23, 'Male', 'davidbernal@yahoo.com', 'urinalysis', '2023-07-10', '12:44:00', 'Done'),
(4, 'David', '', 'Bernal', '09876543221', 'Bicos, Rizal, Nueva Ecija', 23, 'Male', 'davidbernal@yahoo.com', 'urinalysis', '2023-07-10', '12:44:00', 'Done'),
(8, 'David', '', 'Bernal', '09876543221', 'Bicos, Rizal, Nueva Ecija', 23, 'Male', 'davidbernal@yahoo.com', 'urinalysis', '2023-07-17', '12:54:00', 'pending'),
(9, 'Kris', 'Tan ', 'Lee', '09876543221', 'Nagoya,Japan\r\n', 23, 'Male', 'kristanlee@gmail.com', 'blood chemistry / immunology', '2023-07-19', '12:55:00', 'pending'),
(11, 'Kris', 'Tan ', 'Lee', '09876543221', 'Nagoya,Japan\r\n', 23, 'Male', 'kristanlee@gmail.com', 'blood chemistry / immunology', '2023-07-19', '12:55:00', 'pending'),
(15, 'Kris', 'Tan ', 'Lee', '09876543221', 'Nagoya,Japan\r\n', 23, 'Male', 'kristanlee@gmail.com', 'blood chemistry / immunology', '2023-07-19', '12:55:00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `categories_active` int(11) NOT NULL DEFAULT 0,
  `categories_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_active`, `categories_status`) VALUES
(1, 'Blood', 1, 1),
(2, 'Urine', 1, 1),
(3, 'Sugar', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `cellphone` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `first_name`, `middle_name`, `last_name`, `cellphone`, `address`, `age`, `gender`, `email`, `password`) VALUES
(1, 'Juan', 'Dela', 'Cruz', '09668995030', '16 Eugenio St., San Jose City, Nueva Ecija', 40, 'Male', 'citidx@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `hematology_results`
--

CREATE TABLE `hematology_results` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `patient_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `hemoglobin` float DEFAULT NULL,
  `wbc` float DEFAULT NULL,
  `hematocrit` float DEFAULT NULL,
  `rbc` float DEFAULT NULL,
  `segmenter` float DEFAULT NULL,
  `pcount` float DEFAULT NULL,
  `lymphocyte` float DEFAULT NULL,
  `ctime` float DEFAULT NULL,
  `eosinophil` float DEFAULT NULL,
  `bleeding` float DEFAULT NULL,
  `monocyte` float DEFAULT NULL,
  `btype` varchar(10) DEFAULT NULL,
  `basophil` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hematology_results`
--

INSERT INTO `hematology_results` (`id`, `name`, `date`, `age`, `sex`, `patient_number`, `address`, `hemoglobin`, `wbc`, `hematocrit`, `rbc`, `segmenter`, `pcount`, `lymphocyte`, `ctime`, `eosinophil`, `bleeding`, `monocyte`, `btype`, `basophil`) VALUES
(61, 'Kris tan lee', '2023-07-07', 23, 'Male', '03222', 'Nagoya, Japan', 167, 7, 0.5, 0, 0.5, 0, 0.3, 0, 0, 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `immunology`
--

CREATE TABLE `immunology` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `patient_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `fbs` float DEFAULT NULL,
  `bun` float DEFAULT NULL,
  `na` float DEFAULT NULL,
  `calories` float DEFAULT NULL,
  `creatinine` float DEFAULT NULL,
  `k` float DEFAULT NULL,
  `triglyceride` float DEFAULT NULL,
  `acid` float DEFAULT NULL,
  `cl` float DEFAULT NULL,
  `hdl` float DEFAULT NULL,
  `sgpt` float DEFAULT NULL,
  `ca` float DEFAULT NULL,
  `ldl` float DEFAULT NULL,
  `sgot` float DEFAULT NULL,
  `hba1c` float DEFAULT NULL,
  `others` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `immunology`
--

INSERT INTO `immunology` (`id`, `name`, `date`, `age`, `sex`, `patient_number`, `address`, `fbs`, `bun`, `na`, `calories`, `creatinine`, `k`, `triglyceride`, `acid`, `cl`, `hdl`, `sgpt`, `ca`, `ldl`, `sgot`, `hba1c`, `others`) VALUES
(17, 'Kris tan lee', '2023-07-07', 23, 'Male', '03222', 'Nagoya, Japan', 109.1, 21.4, 139.4, 218.6, 1, 4.8, 140.6, 7.5, 105.2, 61, 27, 1.14, 164.3, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `cellphone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `middle_name`, `last_name`, `cellphone`, `address`, `age`, `gender`, `email`, `password`) VALUES
(1, 'Kris', 'Tan ', 'Lee', '09876543221', 'Nagoya,Japan', 23, 'Male', 'kristanlee@gmail.com', 'user1@123'),
(2, 'David', '', 'Bernal', '09876543221', 'Bicos, Rizal, Nueva Ecija', 23, 'Male', 'davidbernal@yahoo.com', 'user2@123');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `cellphone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `payment_method` varchar(20) DEFAULT NULL,
  `gcash_account_name` varchar(100) DEFAULT NULL,
  `gcash_account_number` varchar(20) DEFAULT NULL,
  `name_on_card` varchar(100) DEFAULT NULL,
  `card_number` varchar(16) DEFAULT NULL,
  `expiry_date` varchar(5) DEFAULT NULL,
  `cvv` varchar(4) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `first_name`, `middle_name`, `last_name`, `cellphone`, `address`, `age`, `gender`, `email`, `payment_method`, `gcash_account_name`, `gcash_account_number`, `name_on_card`, `card_number`, `expiry_date`, `cvv`, `amount`, `payment_date`) VALUES
(1, 'Kris', 'Tan ', 'Lee', '09876543221', 'Nagoya,Japan\r\n', 23, 'Male', 'kristanlee@gmail.com', 'gcash', 'Ako Ikaw', '09123456778', NULL, '', '', '', 5000.00, '2023-07-11 01:04:39'),
(2, 'Kris', 'Tan ', 'Lee', '09876543221', 'Nagoya,Japan\r\n', 23, 'Male', 'kristanlee@gmail.com', 'creditCard', '', '', 'Ako Ikaw', '09876543219', 'Augus', 'dhcn', 10000.00, '2023-07-11 01:05:16');

-- --------------------------------------------------------

--
-- Table structure for table `urinalysis`
--

CREATE TABLE `urinalysis` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `patient_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `gravity` float DEFAULT NULL,
  `mucus` varchar(255) DEFAULT NULL,
  `appearance` varchar(255) DEFAULT NULL,
  `pcells` varchar(255) DEFAULT NULL,
  `bacteria` varchar(255) DEFAULT NULL,
  `albumin` varchar(255) DEFAULT NULL,
  `rcells` varchar(255) DEFAULT NULL,
  `cast` varchar(255) DEFAULT NULL,
  `glucose` varchar(255) DEFAULT NULL,
  `ecells` varchar(255) DEFAULT NULL,
  `ptest` varchar(255) DEFAULT NULL,
  `ph` varchar(255) DEFAULT NULL,
  `aup` varchar(255) DEFAULT NULL,
  `other` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `urinalysis`
--

INSERT INTO `urinalysis` (`id`, `name`, `date`, `age`, `sex`, `patient_number`, `address`, `color`, `gravity`, `mucus`, `appearance`, `pcells`, `bacteria`, `albumin`, `rcells`, `cast`, `glucose`, `ecells`, `ptest`, `ph`, `aup`, `other`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '', '', '0', '', '', '0', '', '', '', '', '0', '', ''),
(2, NULL, NULL, NULL, NULL, NULL, NULL, 'yellow', 1.011, 'few', 'turbid', '4', 'rare', 'negative', '0', '0', 'negative', 'few', '0', '7', 'few', '0'),
(3, 'david bernal', '2023-07-02', 23, 'Male', '03222', 'Bicos, Rizal, Nueva Ecija', 'yellow', 1.011, 'few', '0', '4-6', 'rare', '0', '0-2', '0', 'negative', 'few', '0', '7.0', 'few', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'citidx@gmail.com', 'admin', 'citidx@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hematology_results`
--
ALTER TABLE `hematology_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `immunology`
--
ALTER TABLE `immunology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urinalysis`
--
ALTER TABLE `urinalysis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hematology_results`
--
ALTER TABLE `hematology_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `immunology`
--
ALTER TABLE `immunology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `urinalysis`
--
ALTER TABLE `urinalysis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
