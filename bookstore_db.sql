-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 07:52 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `bio` varchar(512) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `bio`, `created_at`) VALUES
(1, 'JK Rowling', 'Harry Potter\'s author.', '2021-12-16 18:25:26'),
(2, 'Kate Mosse', 'Kate Mosse', '2021-11-11 14:07:49'),
(3, 'Ralph Epperson', 'New World Order\'s author. ', '2021-11-11 14:33:00'),
(4, 'Brandon Stranton', 'Humans\' author. ', '2021-11-15 12:08:55'),
(5, 'Michael Connelly', 'The Dark Hours\' author. ', '2021-12-16 18:33:16'),
(6, 'Максим Батирев', 'Автор на 45 татуировки на личността', '2022-01-10 11:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `isbn` varchar(16) NOT NULL,
  `title` varchar(128) NOT NULL,
  `year` char(4) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `publisher_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `isbn`, `title`, `year`, `description`, `image`, `price`, `publisher_id`, `created_at`) VALUES
(1, '9780747546245', 'Harry Potter and the Goblet of Fire', '2000', 'The summer holidays are dragging on and Harry Potter can\'t wait for the start of the school year. It is his fourth year at Hogwarts School of Witchcraft and Wizardry and there are spells to be learnt and (unluckily) Potions and Divination lessons to be attended. But Harry can\'t know that the atmosphere is darkening around him, and his worst enemy is preparing a fate that it seems will be inescapable ...With characteristic wit, fast-paced humour and marvellous emotional depth, J.K. Rowling has proved herself', NULL, '4.84', 1, '2021-11-11 13:56:59'),
(2, '9780752860534', 'Labyrinth', '2005', 'When Dr Alice Tanner discovers two skeletons during an archaeological dig in southern France, she unearths a link with a horrific and brutal past. But it\'s not just the sight of the shattered bones that makes her uneasy; there\'s an overwhelming sense of evil in the tomb that Alice finds hard to shake off, even in the bright French sunshine. ', 'https://i.ebayimg.com/images/g/TuAAAOSwxfheoZG5/s-l500.jpg', '11.25', 2, '2021-11-11 14:25:28'),
(4, '9781592324781', 'The New World Order', '2016', 'The New World Order Rulles', 'https://i.ebayimg.com/images/g/FnkAAOSwlPZhGabf/s-l500.jpg', '13.13', 3, '2021-11-11 14:31:58'),
(6, 'asfafsasf', 'safasfasf', '2121', '123', '', '999.99', 1, '2021-11-11 18:12:35'),
(26, '123', '123', '123', '123', '', '123.00', 2, '2021-11-16 16:38:27'),
(54, '9999999999', '9te 9', '9999', '9999', '', '999.99', 1, '2022-01-06 16:10:19'),
(55, '9786197494297', '45 татуировки на личността', '2022', '\"45 татуировки на личността\" е предназначена за всеки, който иска да тръгне по съзнателния път към своето усъвършенстване или вече се намира на него. Със сигурност ще успеете да приложите много от тези правила в живота си. И със сигурност ще намерите нещо, с което да ги допълните.', NULL, '17.95', 6, '2022-01-10 11:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `book_author`
--

CREATE TABLE `book_author` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_author`
--

INSERT INTO `book_author` (`id`, `book_id`, `author_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 4, 3),
(4, 14, 4),
(5, 15, 5),
(6, 35, 0),
(7, 36, 0),
(8, 37, 0),
(9, 38, 0),
(10, 39, 0),
(11, 40, 3),
(12, 41, 3),
(13, 42, 1),
(14, 42, 2),
(15, 42, 4),
(16, 43, 1),
(17, 43, 2),
(18, 43, 4),
(19, 44, 1),
(20, 44, 2),
(21, 45, 1),
(22, 45, 2),
(23, 46, 1),
(24, 46, 3),
(25, 50, 1),
(26, 51, 1),
(27, 51, 1),
(28, 52, 5),
(29, 52, 1),
(30, 53, 1),
(31, 53, 1),
(32, 54, 2),
(33, 55, 6);

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`id`, `book_id`, `category_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 4, 3),
(4, 14, 4),
(5, 15, 5),
(6, 45, 2),
(7, 46, 2),
(8, 54, 2),
(9, 55, 6);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `created_at`) VALUES
(1, 'Fantasy', 'Fantasy', '2021-11-11 13:58:29'),
(2, 'Historical', 'Historical', '2021-11-11 14:10:23'),
(3, 'Gambling', 'N.W.O/ Gambling ', '2021-11-11 14:34:20'),
(4, 'Bestseller', 'Bestseller', '2021-11-15 12:10:38'),
(5, 'Thriller', 'Thriller and Mystery', '2021-11-15 12:21:15'),
(6, 'Finance', 'Finance', '2022-01-10 11:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `tel` varchar(16) NOT NULL,
  `email` varchar(64) NOT NULL,
  `address` varchar(64) NOT NULL,
  `city` varchar(16) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `tel`, `email`, `address`, `city`, `user_id`, `created_at`) VALUES
(1, 'ivan', '08955555555', 'ivanivanov@gmail.com', 'Student city', 'Sofia', 1, '2021-11-11 14:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `book_id`, `qty`, `purchase_date`) VALUES
(1, 1, 1, 1, '2021-11-11 14:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `title`, `created_at`) VALUES
(1, 'Bloomsbury Publishing', '2021-11-11 13:56:16'),
(2, 'Orion Publishing Group', '2021-11-11 14:26:42'),
(3, 'African Tree Press', '2021-11-11 14:33:15'),
(4, 'St. Martin\'s Press', '2021-11-15 12:07:01'),
(5, '‎Little, Brown and Company', '2021-11-15 12:23:33'),
(6, 'AMG Publishers', '2022-01-10 11:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `role` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `created_at`) VALUES
(15, 'dada', '$2y$10$G1/TZoCibPYR1QbB1OBaWuvLPxXvVqK.bAbpapcbx73WnYwW/LX7S', 'dasd51@gmail.com', 'user', '2021-11-23 15:51:12'),
(16, '11111111', '$2y$10$ZZy2Kwv42mWlxdEHjgg4VepP4/S/dyjgWY6zlnV.7w.oyWJqIzL.O', 'asdasd', 'user', '2021-11-23 15:57:00'),
(17, 'proba', 'proba', 'proba@gmail.com', '', '2021-11-25 18:49:49'),
(18, 'proba22', '$2y$10$Df8gRx8AyAR2VKpQRHZxQ./hAaYsZqQv9nEqhBXx94EnTlcner62S', 'proba22@gmail.com', 'user', '2021-11-25 17:53:27'),
(19, '2022', '$2y$10$/xwgGbeIwspOyWOAlEvxx.E0k0Q17SrUUEpz5Qv9eIzj2.nubvBwW', '2022@gmail.com', 'user', '2022-01-04 17:08:55'),
(20, '123', '$2y$10$7E2eicwk52mtH4U/58kcuugP23Xw4Ky3CtQXeIVt4AgtQZH45Ddt2', '123@gmail.com', 'user', '2022-01-07 14:33:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_author`
--
ALTER TABLE `book_author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
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
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `book_author`
--
ALTER TABLE `book_author`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `book_category`
--
ALTER TABLE `book_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
