-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019 年 3 月 13 日 06:19
-- サーバのバージョン： 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `feeds`
--

CREATE TABLE `feeds` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `feeds`
--

INSERT INTO `feeds` (`id`, `user_id`, `feed`) VALUES
(19, 17607055, 'hogehoge'),
(20, 17607055, 'hogehogehogehoge'),
(21, 17607055, 'moge'),
(22, 17607055, 'moge'),
(23, 17607055, 'hoge'),
(24, 17607055, 'hoge'),
(25, 17607055, 'hoge'),
(26, 17607055, 'hoge'),
(27, 17607055, 'hoge'),
(28, 17607055, 'hoge'),
(29, 17607055, 'hoge'),
(30, 17607055, 'hoge'),
(31, 17607055, 'hoge'),
(32, 17607055, 'hoge'),
(33, 17607055, 'hoge'),
(34, 17607055, 'hoge'),
(35, 17607055, 'hoge'),
(36, 17607055, 'hoge'),
(37, 17607055, 'hoge'),
(38, 17607055, 'hoge'),
(39, 17607055, 'hoge'),
(40, 17607055, 'hoge'),
(41, 17607055, 'hoge'),
(42, 17607055, 'hoge'),
(43, 17607055, 'hoge'),
(44, 17607055, 'hoge'),
(45, 17607055, 'hoge'),
(46, 17607055, 'hoge'),
(47, 17607055, 'hoge'),
(48, 17607055, 'hoge'),
(49, 17607055, 'hoge'),
(50, 17607055, 'hoge'),
(51, 17607055, 'hoge'),
(52, 17607055, 'hoge'),
(53, 17607055, 'hoge'),
(54, 17607055, 'hoge'),
(55, 17607055, 'hoge'),
(56, 17607055, 'hoge');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feeds`
--
ALTER TABLE `feeds`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feeds`
--
ALTER TABLE `feeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
