-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 04, 2021 at 02:06 PM
-- Server version: 5.7.32
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `babypark`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `text`, `comment_id`, `user_id`, `post_id`, `created_at`) VALUES
(23, 'asdfa', NULL, 2, 11, '2021-07-01 01:15:24'),
(24, '最高！', NULL, 2, 11, '2021-07-01 01:15:33'),
(25, '又コメント', NULL, 2, 11, '2021-07-01 01:34:15'),
(26, 'こんにちは', NULL, 2, 11, '2021-07-01 01:37:46'),
(27, 'asdfasdfasdfa', NULL, 2, 11, '2021-07-01 01:41:11'),
(28, 'gggggggggggggggggggggg', NULL, 2, 11, '2021-07-01 01:43:34'),
(29, 'asdfasas\r\nasdfasda\r\nasdfasdfas', NULL, 2, 11, '2021-07-01 01:47:00'),
(30, '', NULL, 2, 11, '2021-07-01 02:46:38'),
(31, 'コメントを送信', NULL, 2, 84, '2021-07-01 05:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `category`, `created_at`, `update_at`) VALUES
(84, 2, '初投稿です', '現在、1歳半の女の子がいます。ほとんど母乳で育ててきました。<br />\r\nいつも母親と一緒にいるせいか、あまり離乳食を食べずにしょっちゅう母乳を欲しがります。雑誌やマスコミで「母乳は子供が欲しがるだけいつまでも与えなさい」という話をよく聞きます。自然と欲しがらなくなるまで母乳は与えていてもよいということですが、このまま離乳食が進まないのでは、と心配しています。<br />\r\n<br />\r\n', '1', '2021-07-01 05:13:35', '2021-07-01 05:13:35'),
(85, 2, '子育てに関する質問', '子供が熱を出したときの対処法', '1', '2021-07-01 06:13:28', '2021-07-01 06:13:28'),
(86, 2, 'ブログ開設', '質問', '4', '2021-07-01 07:13:31', '2021-07-01 07:13:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sex` int(11) NOT NULL,
  `description` text,
  `birthplace` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `sex`, `description`, `birthplace`, `created_at`, `update_at`) VALUES
(1, '久保田悦也', 'instrctr.etsuya@gmail.com', '$2y$10$5e0IB.3qi5z0s.NgCWU9q.MDZo0TJNfWuVvMz7B8kCQfeyNN0iCxe', 0, NULL, NULL, '2021-06-29 10:58:25', '2021-06-29 10:58:25'),
(2, 'テストユーザー', 'test@test', '$2y$10$UE/zITAlGqlRzin23mGQHeRxQ28KZHItfxC38CucQULnxABHfp0NC', 0, 'パパ 本名　　<br /><br />\r\nカズ 誕生日 10月１８日 年齢 35歳 学歴 東鳥大学卒業 性別 男 星座 てんびん座 血液型 B型 性格', '1', '2021-06-29 11:36:17', '2021-07-01 06:14:25'),
(3, 'asdfad', 'asdfasdf', '$2y$10$A7Q2CKe8AmonPVC9R3L8S.pNxgqyGMdfYzyERmYGGb1Wmp7YRohOe', 1, NULL, NULL, '2021-06-29 12:23:05', '2021-06-29 12:23:05'),
(4, 'asdf', 'asdf', '$2y$10$lq5NI0h4rGHR33uJhWpD1OFC/CIYqzg3XO.AjHdOlnQOUXoNk20OC', 1, NULL, NULL, '2021-06-29 13:12:01', '2021-06-29 13:12:01'),
(5, 'たくま', 'メールアドレス', '$2y$10$vfEt/zPSD6hI82ILLx5G3e.yizpd4s9EiMdgDmceBVe3.uThVIsSy', 0, NULL, NULL, '2021-06-29 19:43:49', '2021-06-29 19:43:49'),
(8, 'こんにちは', 'めーえるあどれえす', '$2y$10$Tt.CdMjBCpIBlulzaMzVguh5GUFR0b1pwOnNMrzfaa3E62HZr63je', 1, NULL, NULL, '2021-06-29 20:15:48', '2021-06-29 20:15:48'),
(9, 'こんにちは', 'めーえるあどれえす', '$2y$10$0f5eQHaWw9wRzwXfK6HQXur0zw.QffpdE5jluwOVag3bkB5aHQLsK', 1, NULL, NULL, '2021-06-29 20:18:15', '2021-06-29 20:18:15'),
(10, '田中', '田中', '$2y$10$3iPf2sBkDet6Ox41NpgdkOdGvMX7AsM1RyHri9GuYmdbQLV3zy/uq', 0, NULL, NULL, '2021-06-29 20:19:04', '2021-06-29 20:19:04'),
(11, '田中', '田中', '$2y$10$pAdLcMi6x/E27GtQtbnzpOxBibQLE2.hdq/SZW8VVSyx6TYw72u3K', 0, NULL, NULL, '2021-06-29 20:19:22', '2021-06-29 20:19:22'),
(12, 'aaaaaa', 'aaaaaaaa', '$2y$10$/DinNRiyItvAOUUQ.5HyVOH5evBpFCUiIJkUHoknMLUDj1JZPqnvW', 1, NULL, NULL, '2021-06-30 17:09:38', '2021-06-30 17:09:38'),
(13, '久保田悦也', 'instrctr.etsuya@gmail.com', '$2y$10$JGYuUJiVqxx6Js7v2gNTYecgamJGWYS7jZv0fa/oSo0pYeS4gJe6u', 0, NULL, NULL, '2021-07-01 04:43:45', '2021-07-01 04:43:45'),
(14, '久保田悦也', 'instrctr.etsuya@gmail.com', '$2y$10$009rHxykqGQbS.zcBHd25.Q/Dq5yNpNeAuhaC8rTT0GcHTx1CFiFy', 0, NULL, NULL, '2021-07-01 04:48:59', '2021-07-01 04:48:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
