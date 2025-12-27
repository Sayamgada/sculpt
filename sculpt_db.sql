-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2025 at 05:37 PM
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
-- Database: `sculpt`
--

-- --------------------------------------------------------

--
-- Table structure for table `muscle_group`
--

CREATE TABLE `muscle_group` (
  `muscle_id` int(11) NOT NULL,
  `muscle_name` varchar(255) NOT NULL,
  `muscle_desc` text NOT NULL,
  `muscle_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `muscle_group`
--

INSERT INTO `muscle_group` (`muscle_id`, `muscle_name`, `muscle_desc`, `muscle_image`) VALUES
(1, 'Back', 'Build a strong, defined back with our specialized training program.', 'back.webp'),
(2, 'Chest', 'Explore our collection of Chest training videos to help you achieve your fitness goals.', 'chest.jpg'),
(3, 'Biceps', 'Explore our collection of Biceps training videos to help you achieve your fitness goals.', 'biceps.jpg'),
(4, 'Triceps', 'Explore our collection of Triceps training videos to help you achieve your fitness goals.', 'triceps.webp'),
(5, 'Shoulders', 'Explore our collection of Shoulders training videos to help you achieve your fitness goals.', 'shoulders.webp'),
(6, 'Legs', 'Explore our collection of Legs training videos to help you achieve your fitness goals.', 'legs.webp'),
(7, 'forearm', 'this is the forearm', 'fofre.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `muscle_videos`
--

CREATE TABLE `muscle_videos` (
  `video_id` int(11) NOT NULL,
  `video_name` varchar(255) NOT NULL,
  `video_url` text NOT NULL,
  `muscle_group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `muscle_videos`
--

INSERT INTO `muscle_videos` (`video_id`, `video_name`, `video_url`, `muscle_group_id`) VALUES
(1, 'Deadlift Form Guide', 'https://www.youtube.com/embed/r4MzxtBKyNE', 1),
(2, 'Back Exercises for Mass', 'https://www.youtube.com/embed/eE7dzM0iexc', 1),
(3, 'Pull-Up Tutorial', 'https://www.youtube.com/embed/eGo4IYlbE5g', 1),
(4, 'Dumbbell Curl Tutorial', 'https://www.youtube.com/embed/ykJmrZ5v0Oo', 3),
(5, 'Complete Chest Workout', 'https://www.youtube.com/embed/89e518dl4I8', 2),
(6, 'Bicep Peak Exercises', 'https://www.youtube.com/embed/vB5OHsJ3EME', 3),
(7, 'Cable Fly Guide', 'https://www.youtube.com/embed/Iwe6AmxVf7o', 2),
(8, 'Wrist Curl Tutorial', 'https://www.youtube.com/embed/Ej4WzltO1DA', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_contact` varchar(255) NOT NULL,
  `user_dob` date NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `video_count` int(11) NOT NULL DEFAULT 5,
  `user_age` int(11) DEFAULT NULL,
  `user_weight` int(11) DEFAULT NULL,
  `user_height` int(11) DEFAULT NULL,
  `membership_plan` varchar(255) DEFAULT NULL,
  `membership_start_date` date DEFAULT NULL,
  `membership_end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_contact`, `user_dob`, `user_password`, `video_count`, `user_age`, `user_weight`, `user_height`, `membership_plan`, `membership_start_date`, `membership_end_date`) VALUES
(1, 'dsd dsds', 'sayam.gada@somaiya.edu', '7208206132', '2025-03-03', 'dsdsd', 5, 0, 0, 0, NULL, NULL, NULL),
(2, 'sayam gada', 'sayam.gada@vpt.edu.in', '7208206132', '2025-03-01', '1234', -1, NULL, NULL, NULL, 'half-yearly', '2025-04-18', '2025-10-18'),
(3, 'Shavac Chenna', 'shavac.c@somaiya.edu', '7896541230', '2005-01-01', '1234', -1, NULL, NULL, NULL, 'half-yearly', '2025-04-18', '2025-10-18'),
(4, 'Sidd Sing', 'sidd@gmailcoin', '777777777', '2020-01-01', '1234', 5, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Shreeya Panchal', 'shreeya.hp@gmail.com', '98745632', '2024-01-01', '1234', -1, NULL, NULL, NULL, 'half-yearly', '2025-04-22', '2025-10-22'),
(6, 'sayam gada', 'abc@gmail.com', '9876232991', '2025-04-26', '43443', 5, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Abc Xyz', 'xyz@gmail.com', '7208206132', '2025-04-22', '1233', 5, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `muscle_group`
--
ALTER TABLE `muscle_group`
  ADD PRIMARY KEY (`muscle_id`);

--
-- Indexes for table `muscle_videos`
--
ALTER TABLE `muscle_videos`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `muscle_group`
--
ALTER TABLE `muscle_group`
  MODIFY `muscle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `muscle_videos`
--
ALTER TABLE `muscle_videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
