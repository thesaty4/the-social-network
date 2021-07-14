-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2021 at 04:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the_social_network1`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_manage`
--

CREATE TABLE `chat_manage` (
  `chat_id` int(11) NOT NULL,
  `chat` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `chat_with` int(11) DEFAULT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `c_time` time NOT NULL DEFAULT current_timestamp(),
  `c_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `c_time` time NOT NULL DEFAULT current_timestamp(),
  `c_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contect_us`
--

CREATE TABLE `contect_us` (
  `contect_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` varchar(250) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `c_time` time NOT NULL DEFAULT current_timestamp(),
  `c_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `follower_manage`
--

CREATE TABLE `follower_manage` (
  `follow_id` int(11) NOT NULL,
  `followed_by` int(11) DEFAULT NULL,
  `follow_user` int(11) DEFAULT NULL,
  `c_time` time NOT NULL DEFAULT current_timestamp(),
  `c_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `c_time` time NOT NULL DEFAULT current_timestamp(),
  `c_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `num_of_notification` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(100) DEFAULT NULL,
  `post_filename` varchar(100) DEFAULT NULL,
  `post_location` varchar(100) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unread',
  `privacy` varchar(10) NOT NULL DEFAULT 'public',
  `category` varchar(20) NOT NULL DEFAULT 'nature',
  `mood` varchar(50) NOT NULL DEFAULT 'happy',
  `c_time` time NOT NULL DEFAULT current_timestamp(),
  `c_date` date NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_notification`
--

CREATE TABLE `post_notification` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_report`
--

CREATE TABLE `post_report` (
  `report_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `report` varchar(250) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `c_time` time NOT NULL DEFAULT current_timestamp(),
  `c_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `report` varchar(250) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `c_time` time NOT NULL DEFAULT current_timestamp(),
  `c_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `sponsor_id` int(11) NOT NULL,
  `sponsor_title` varchar(100) DEFAULT NULL,
  `sponsor_img_location` varchar(100) DEFAULT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `c_time` time NOT NULL DEFAULT current_timestamp(),
  `c_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sponsor_comments`
--

CREATE TABLE `sponsor_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sponsor_id` int(11) DEFAULT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `c_time` time NOT NULL DEFAULT current_timestamp(),
  `c_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sponsor_likes`
--

CREATE TABLE `sponsor_likes` (
  `like_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sponsor_id` int(11) DEFAULT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `c_time` time NOT NULL DEFAULT current_timestamp(),
  `c_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `filename` varchar(50) DEFAULT NULL,
  `profile_location` varchar(100) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `country_code` varchar(5) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `account_type` varchar(10) DEFAULT 'user',
  `status` varchar(10) DEFAULT 'active',
  `c_time` time NOT NULL DEFAULT current_timestamp(),
  `c_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `filename`, `profile_location`, `fname`, `lname`, `gender`, `country_code`, `mobile`, `email`, `password`, `account_type`, `status`, `c_time`, `c_date`) VALUES
(1, 'Satya-Mishra (4).jpg', 'profiles/Satya-Mishra (4).jpg', 'Satya', 'Mishra', 'male', '+91', '9120829055', 'satya@example.com', '$2y$10$4jiDecGOscWWU7KcXlOje.q7tXYZqOlr5vpHmjJsgUruD.XTM0eSu', 'user', 'active', '06:49:06', '2021-02-03'),
(2, 'PicsArt_01-25-07.13.15.png', 'profiles/PicsArt_01-25-07.13.15.png', 'iDepth', 'Admin', 'male', '+91', '9120829055', 'admin@admin.com', '$2y$10$vL54gX7ad06K.OhHTYXL6.3w2Xod/9VwzEmVhYd/tZI921tYovd1i', 'admin', 'active', '06:52:25', '2021-02-03'),
(3, 'IMG-20200424-WA0002.jpg', 'profiles/IMG-20200424-WA0002.jpg', 'Dipankar', 'Kumar', 'male', '+91', '7987654321', 'dipankar@example.com', '$2y$10$YvvAa8qYnUW12cG6uuBUEOxvNxAs9s9vsyXjzWQu.QBsDuPvGH1W2', 'user', 'active', '07:01:06', '2021-02-03'),
(4, '_DSC0089.jpg', 'profiles/_DSC0089.jpg', 'Shivam', 'Dubey', 'male', '+91', '7823449203', 'shivam@example.com', '$2y$10$qQYY64nCIFxNjP4X5T.3hODV.MDRt7F9/1rqhlzMphheghJcoD5Rq', 'user', 'active', '07:03:31', '2021-02-03'),
(5, 'IMG-20200424-WA0002.jpg', 'profiles/IMG-20200424-WA0002.jpg', 'md.', 'Asif', 'male', '+91', '9871829303', 'asif@example.com', '$2y$10$nSlaA8V2cCz0jiMHsKZdleb3cDRPucOLn76ZQG4Z5xBL/Hi.hMyjC', 'user', 'active', '07:04:39', '2021-02-03'),
(6, '00234936.jpg', 'profiles/00234936.jpg', 'Amisha', 'Sharma', 'female', '+91', '8756434234', 'amisha@example.com', '$2y$10$Yw.Eh9UFU2spukQzOvrAlepl1jn0rG6OJnIMUr6Ia6GvRR7f.8Ilu', 'user', 'active', '07:31:45', '2021-02-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_manage`
--
ALTER TABLE `chat_manage`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `chat_with` (`chat_with`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `contect_us`
--
ALTER TABLE `contect_us`
  ADD PRIMARY KEY (`contect_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `follower_manage`
--
ALTER TABLE `follower_manage`
  ADD PRIMARY KEY (`follow_id`),
  ADD KEY `followed_by` (`followed_by`),
  ADD KEY `follow_user` (`follow_user`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_notification`
--
ALTER TABLE `post_notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post_report`
--
ALTER TABLE `post_report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`sponsor_id`);

--
-- Indexes for table `sponsor_comments`
--
ALTER TABLE `sponsor_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `sponsor_id` (`sponsor_id`);

--
-- Indexes for table `sponsor_likes`
--
ALTER TABLE `sponsor_likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `sponsor_id` (`sponsor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_manage`
--
ALTER TABLE `chat_manage`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contect_us`
--
ALTER TABLE `contect_us`
  MODIFY `contect_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follower_manage`
--
ALTER TABLE `follower_manage`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_notification`
--
ALTER TABLE `post_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_report`
--
ALTER TABLE `post_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `sponsor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponsor_comments`
--
ALTER TABLE `sponsor_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponsor_likes`
--
ALTER TABLE `sponsor_likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat_manage`
--
ALTER TABLE `chat_manage`
  ADD CONSTRAINT `chat_manage_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `chat_manage_ibfk_2` FOREIGN KEY (`chat_with`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `contect_us`
--
ALTER TABLE `contect_us`
  ADD CONSTRAINT `contect_us_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `follower_manage`
--
ALTER TABLE `follower_manage`
  ADD CONSTRAINT `follower_manage_ibfk_1` FOREIGN KEY (`followed_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `follower_manage_ibfk_2` FOREIGN KEY (`follow_user`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `post_notification`
--
ALTER TABLE `post_notification`
  ADD CONSTRAINT `post_notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `post_notification_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `post_report`
--
ALTER TABLE `post_report`
  ADD CONSTRAINT `post_report_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `post_report_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `sponsor_comments`
--
ALTER TABLE `sponsor_comments`
  ADD CONSTRAINT `sponsor_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `sponsor_comments_ibfk_2` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsor` (`sponsor_id`);

--
-- Constraints for table `sponsor_likes`
--
ALTER TABLE `sponsor_likes`
  ADD CONSTRAINT `sponsor_likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `sponsor_likes_ibfk_2` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsor` (`sponsor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
