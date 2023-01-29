-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 12:03 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playarena`
--

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `club_id` int(11) NOT NULL,
  `club_name` varchar(40) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `wins` int(11) DEFAULT NULL,
  `draws` int(11) DEFAULT NULL,
  `losses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`club_id`, `club_name`, `wins`, `draws`, `losses`) VALUES
(2, '1234', 0, 0, 0),
(3, 'nowy klub', 0, 0, 0),
(4, 'Klub nowego kapitana', 0, 0, 0),
(5, 'Klub nowego kapitana v2', 0, 0, 0),
(6, 'Klub nowego kapitana v3', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `match_id` int(11) NOT NULL,
  `home_goals` int(11) NOT NULL,
  `away_goals` int(11) NOT NULL,
  `round` int(11) NOT NULL,
  `when_played` datetime NOT NULL DEFAULT current_timestamp(),
  `clubs_club_id` int(11) NOT NULL,
  `clubs_club_id1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playerstats`
--

CREATE TABLE `playerstats` (
  `stat_id` int(11) NOT NULL,
  `goals` int(11) DEFAULT NULL,
  `assists` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `is_active` char(1) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `name`, `is_active`) VALUES
(100, 'Administrator', '1'),
(110, 'User', '1'),
(120, 'Player', '1'),
(130, 'Captain', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `login` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `when_added` datetime NOT NULL DEFAULT current_timestamp(),
  `clubs_club_id` int(11) DEFAULT NULL,
  `playerstats_stat_id` int(11) DEFAULT NULL,
  `who_added` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `login`, `password`, `when_added`, `clubs_club_id`, `playerstats_stat_id`, `who_added`) VALUES
(11, 'admin', '$2y$10$/uwkivmdnBev8sXN3FomG.4y3e3QlqxHPbjQIyf2Y3l6nr7LZ9cJG', '2023-01-27 18:10:23', NULL, NULL, 11),
(14, '1234', '$2y$10$yRYi1g44TgEgrI8oGT/3X.xV1m.vl1EY3Rpfo40M51KPOyqDjs3Ta', '2023-01-27 18:34:51', NULL, NULL, 14),
(15, 'nowy', '$2y$10$2LKNiQ7xlPQFmzIxrzF7Bu0nbVHNQEa3MGFB3sI1msZbP0V47Oqxu', '2023-01-27 22:17:07', NULL, NULL, 15),
(16, 'user', '$2y$10$04ls3F3pxRx9W2DVEd3Ixu62E9rxXMcSsb.QCqO6ZQMtMLdMoJ4Ny', '2023-01-28 12:47:04', NULL, NULL, 16),
(17, 'captain', '$2y$10$ykv8.NLY1XbPX6mAq0w4LupjgN2g9pwBfwhzPSbbSW8/lonTI.Nya', '2023-01-28 13:25:38', NULL, NULL, 17),
(18, 'captain1', '$2y$10$xKhEZLh4u.zuI9f8MksZ1u6mJe4fjDwZrrIqKMwEkKHE554eZGPkK', '2023-01-28 13:50:31', NULL, NULL, 18),
(19, 'captain2', '$2y$10$lTgDmksTCccjUM0tnpmubeNspP6S1RqaOzdwXItDZsceqiwUhN732', '2023-01-28 13:58:28', 6, NULL, 19),
(20, 'captain3', '$2y$10$/y5KAWBoDLVit8hjsFz96ekCLqX/cpwa1C/QBg9vhnfUiUESeRvcG', '2023-01-28 13:59:28', NULL, NULL, 20),
(21, 'captain5', '$2y$10$.I4Rn8SQWHB2s4mcJoNr8OHDtLLY0KLFXkMTQovS3VQerLWy1zZIq', '2023-01-28 14:04:43', 2, NULL, 21),
(22, 'arnoldb', '$2y$10$WFK7IAYmWjLvyrFXnOfSxeY1ydixshCFLbrVruYit/8cQEadt7PCW', '2023-01-29 19:50:19', 2, NULL, 22),
(23, 'asdasd', '$2y$10$xX7MhJpjmqOlv5IbFayHQeixJuZsuJr1seDB2HXwwf1iyTTWBQqrq', '2023-01-29 22:47:53', NULL, NULL, 23),
(24, 'ziomeczek', '$2y$10$aNqWBx4jyVlvxEr88pKHQ.QIOWLJdnllPcYFNlNiQOdQ.OirC12Hm', '2023-01-29 23:00:24', NULL, NULL, 24);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `roles_role_id` int(11) NOT NULL,
  `when_added` datetime NOT NULL DEFAULT current_timestamp(),
  `users_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`roles_role_id`, `when_added`, `users_user_id`) VALUES
(100, '2023-01-27 18:18:46', 11),
(110, '2023-01-27 18:19:16', 11),
(110, '2023-01-27 18:34:51', 14),
(110, '2023-01-27 22:17:07', 15),
(110, '2023-01-28 12:47:04', 16),
(110, '2023-01-28 13:25:38', 17),
(130, '2023-01-28 13:30:28', 17),
(110, '2023-01-28 13:50:31', 18),
(130, '2023-01-28 13:50:47', 18),
(110, '2023-01-28 13:58:28', 19),
(130, '2023-01-28 13:58:40', 19),
(110, '2023-01-28 13:59:28', 20),
(130, '2023-01-28 13:59:45', 20),
(110, '2023-01-28 14:04:43', 21),
(110, '2023-01-29 19:50:19', 22),
(110, '2023-01-29 22:47:53', 23),
(110, '2023-01-29 23:00:24', 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`club_id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`match_id`,`clubs_club_id`,`clubs_club_id1`),
  ADD KEY `matches_clubs_fk` (`clubs_club_id`),
  ADD KEY `matches_clubs_fkv1` (`clubs_club_id1`);

--
-- Indexes for table `playerstats`
--
ALTER TABLE `playerstats`
  ADD PRIMARY KEY (`stat_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users__idx` (`playerstats_stat_id`),
  ADD KEY `users_clubs_fk` (`clubs_club_id`),
  ADD KEY `users_users_fk` (`who_added`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD KEY `user_roles_roles_fk` (`roles_role_id`),
  ADD KEY `user_roles_users_fk` (`users_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `club_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `match_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playerstats`
--
ALTER TABLE `playerstats`
  MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_clubs_fk` FOREIGN KEY (`clubs_club_id`) REFERENCES `clubs` (`club_id`),
  ADD CONSTRAINT `matches_clubs_fkv1` FOREIGN KEY (`clubs_club_id1`) REFERENCES `clubs` (`club_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_clubs_fk` FOREIGN KEY (`clubs_club_id`) REFERENCES `clubs` (`club_id`),
  ADD CONSTRAINT `users_playerstats_fk` FOREIGN KEY (`playerstats_stat_id`) REFERENCES `playerstats` (`stat_id`),
  ADD CONSTRAINT `users_users_fk` FOREIGN KEY (`who_added`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_roles_fk` FOREIGN KEY (`roles_role_id`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `user_roles_users_fk` FOREIGN KEY (`users_user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
