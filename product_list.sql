-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-12-19 08:22:55
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `test`
--

-- --------------------------------------------------------

--
-- 資料表結構 `product_list`
--

CREATE TABLE `product_list` (
  `id` int(11) NOT NULL,
  `jobName` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `jobUrgent` int(11) DEFAULT NULL,
  `jobContent` int(11) DEFAULT NULL,
  `jobDescription` varchar(50) NOT NULL,
  `purchaseAmount` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `sellerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 傾印資料表的資料 `product_list`
--

INSERT INTO `product_list` (`id`, `jobName`, `jobUrgent`, `jobContent`, `jobDescription`, `purchaseAmount`, `total_price`, `sellerID`) VALUES
(2, '電腦', 500, 1, '', 0, 0, 1),
(3, '平板', 800, 0, '', 0, 0, 1),
(4, '鍵盤', 400, 5, '', 0, 0, 1),
(9, '手機', 1003, 0, '', 0, 0, 1),
(12, '平板', 850, 111, '', 0, 0, 1),
(50, '商品A', 200, 0, 'Aa', 0, 0, 3),
(83, '商品B', 66, 99, 'Bb', 0, 0, 3),
(84, '商品C', 33, 21, 'ccc', 0, 0, 1),
(85, '', 0, 0, '', 0, 0, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
