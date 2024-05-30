-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 07:39 PM
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
-- Database: `brand_new_server`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `color` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `color`) VALUES
(1, 'حواشی', '#00ff6e'),
(2, 'ورزشی', '#2080d9'),
(3, 'اقتصادی', '#4400ff'),
(4, 'اسس==ص', '#0f3761'),
(5, 'adssada', '#53cd32');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `text_body` text NOT NULL,
  `date` date NOT NULL,
  `author` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `is_pinned` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `text_body`, `date`, `author`, `category`, `is_deleted`, `is_pinned`, `image`) VALUES
(30, 'khabare 2', '2', '2023-12-02', 'nevisande 2', ' daste 2', 0, 1, 'upload/post-20231205214626.png'),
(31, 'khabre 33', '3', '2023-12-03', 'kjaf', ' akjvnkf', 0, 1, 'upload/post-20231205214644.png'),
(33, 'khabre 3', 'matn khabar 3', '2023-12-10', 'ljac', ' a/,dnccak.jc', 0, 1, 'upload/post-20231207103222.png'),
(34, 'salam', 'salam2 ', '2023-02-05', 'shumare 5', 'shumare 5', 0, 1, 'upload/post-20231210194409.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `taste` varchar(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `full_name`, `user_name`, `password`, `email`, `taste`, `is_admin`) VALUES
(7, 'afafr', 'aweff', 'wef', 'dwa@fadsdasda', 'کناف کاری,کارواش', 0),
(8, 'THDRHT', 'DHDHHH', 'DFHGDHD', 'DAEFI@DAFV', 'چوب', 0),
(9, 'حشقسش', 'شصبش', 'شثبششثب', 'AEUI@WFVDVFDS', 'کناف کاری,صلواتی', 0),
(10, 'das', 'asd', 'qweqdsa', 'd@as', 'کارواش,صلواتی', 0),
(11, ';jonvv', 'dkfvdfv', 'dlfjv dvfd', 'a@edf', 'کناف کاری,صلواتی', 0),
(12, 'akjsdasd', 'asdas', 'asd', 'asdasd@dsa', 'حلوا', 0),
(13, 'akjsdasd', 'asdas', 'asd', 'asdasd@dsa', 'حلوا', 0),
(14, 'kjsd', 'asdsad', 'dasda', 'dasda@dsa', 'صلواتی', 0),
(15, 'sad', 'adssa', 'adsa', 'asdasd@dsa', '', 0),
(16, 'kajbdjc', 'admin', 'f6a51c155d95861c35febb700cb661b34f4a85b5', '.kasjdb@skdjvb', '', 0),
(17, 'adkvc', 'admin', '123', 'lac@dc', 'کناف کاری', 0),
(18, 'pijbfv', 'admin', '123456789', 'ajbdb@ads', 'حلوا', 0),
(19, 'admin', 'admin', 'fcacf366e100ec0f419f6a2c3999047df8328a4c', 'kaskddc@aousdgc', 'صلواتی', 1),
(20, 'kazem', 'kazem', '36bbc5cf777b2a9906ae4dbfccf2641aa9b16112', 'hbasd@ajdsbf', 'کناف کاری', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
