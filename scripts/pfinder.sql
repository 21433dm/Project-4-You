-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2017 at 04:21 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `cl_users`
--

CREATE TABLE `cl_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `company` varchar(64) NOT NULL,
  `postcode` varchar(8) NOT NULL,
  `city` varchar(30) NOT NULL,
  `tel` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cl_users`
--

INSERT INTO `cl_users` (`id`, `username`, `password`, `email`, `company`, `postcode`, `city`, `tel`) VALUES
(1, 'uizdm1', '$2y$10$PmBojZc0SpaB08Bx4vb1L.AfhqYxFEhMCB1B.CZyhe7kFEeQC4TjK', 'uizdm1@work.com', 'Work', 'S44 4BS', 'Sheffield', 114),
(2, 'Steve', '$2y$10$U9IYaGG9OMbD5ysY9dyTFOv9QSC7wbJnLigM5YdxHp.GRF2sUdH3K', 'steve@radley.com', 'S.Radley Ltd', 'NG8 8AP', 'Nottingham', 1159),
(3, 'CCL', '$2y$10$5PiTR7bNIZ41t2fMp3nxu.Id1puChWVkcUFFBkLDNBAsJTASEJCYO', 'ccl@chesterfield.ac.uk', 'Chesterfield College', 'S40 3PP', 'Chesterfield', 1246),
(4, 'unad', '$2y$10$kSJrL243gL6Qx3RdLQt6zezaMbTj7gbG5NBAAX/wbh7dVkKxRj6Qi', 'unad@nottingham.ac.uk', 'University of Nottingham', 'DE22 3DT', 'Derby', 1332);

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(11) UNSIGNED NOT NULL,
  `userid` int(11) UNSIGNED NOT NULL,
  `followerid` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

CREATE TABLE `login_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `token` varchar(64) NOT NULL,
  `st_userid` int(11) UNSIGNED DEFAULT NULL,
  `cl_userid` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_tokens`
--

CREATE TABLE `password_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `token` char(64) NOT NULL,
  `st_user_id` int(11) UNSIGNED DEFAULT NULL,
  `cl_user_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_tokens`
--

INSERT INTO `password_tokens` (`id`, `token`, `st_user_id`, `cl_user_id`) VALUES
(4, '73d00fd9aae1f9cb33cd4d70064c72dae55300f8', 1, NULL),
(5, '970a1e551460f0c30f67a92b5231b7b5ba86ee09', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `post` longtext NOT NULL,
  `st_userid` int(11) UNSIGNED DEFAULT NULL,
  `cl_userid` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post`, `st_userid`, `cl_userid`) VALUES
(1, 'test post', NULL, 2),
(2, 'Another test post', NULL, 2),
(3, 'test post from a student login', 1, NULL),
(4, 'Test post', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `st_users`
--

CREATE TABLE `st_users` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_users`
--

INSERT INTO `st_users` (`id`, `username`, `fname`, `lname`, `password`, `email`) VALUES
(1, '363391', 'David', 'Makanjuola', '$2y$10$gDwOf85ulAl8qA4t2SzxNuqeJN1YOhVmw.FWIdWeYFk.cHrcn404C', '363391@students.chesterfield.ac.uk'),
(2, '363636', 'Matt', 'Taylor', '$2y$10$tZyVRtw0848kPEYO7XmFvef0yC3s3cC4zPvlppBbUWzA6acZEtP1y', 'matt@hotmail.com'),
(3, '399999', 'Irene', 'Brady', '$2y$10$QIWvwCsjB5EgN.4pf1jBZe/MFRLXt2nxg0R45yZRqMiwcnNalUxK.', 'irene@gmail.com'),
(4, 'lamberts', 'Steven', 'Lambert', '$2y$10$SXMDaGjY/FypsUsD1SyxXeYe86W04SZdarxRMj7vaXXUd1jsQ/VZ.', 'lamberts@chesterfield.ac.uk'),
(5, 'Gemma', 'Gemma', 'Sobah', '$2y$10$RgI62GQrxxm0.W1StNWaduVBydaD6AYfTrL/Oh5X8ZVA9UmmvuDyq', 'gemma.sobah@hotmail.co.uk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cl_users`
--
ALTER TABLE `cl_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cl_userid` (`cl_userid`),
  ADD KEY `st_userid` (`st_userid`);

--
-- Indexes for table `password_tokens`
--
ALTER TABLE `password_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `st_user_id` (`st_user_id`),
  ADD KEY `cl_user_id` (`cl_user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`st_userid`),
  ADD KEY `cl_userid` (`cl_userid`);

--
-- Indexes for table `st_users`
--
ALTER TABLE `st_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `username_2` (`username`),
  ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cl_users`
--
ALTER TABLE `cl_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login_tokens`
--
ALTER TABLE `login_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `password_tokens`
--
ALTER TABLE `password_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `st_users`
--
ALTER TABLE `st_users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD CONSTRAINT `login_tokens_ibfk_1` FOREIGN KEY (`st_userid`) REFERENCES `st_users` (`id`),
  ADD CONSTRAINT `login_tokens_ibfk_2` FOREIGN KEY (`cl_userid`) REFERENCES `cl_users` (`id`);

--
-- Constraints for table `password_tokens`
--
ALTER TABLE `password_tokens`
  ADD CONSTRAINT `password_tokens_ibfk_1` FOREIGN KEY (`st_user_id`) REFERENCES `st_users` (`id`),
  ADD CONSTRAINT `password_tokens_ibfk_2` FOREIGN KEY (`cl_user_id`) REFERENCES `cl_users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`st_userid`) REFERENCES `st_users` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`cl_userid`) REFERENCES `cl_users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
