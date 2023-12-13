-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-12-13 04:29:18
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
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_jobName` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `c_jobUrgent` int(11) DEFAULT NULL,
  `c_jobContent` int(11) DEFAULT NULL,
  `c_jobDescription` varchar(50) NOT NULL,
  `c_purchaseAmount` int(11) NOT NULL,
  `c_total_price` int(11) NOT NULL,
  `sellerID` int(11) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 傾印資料表的資料 `product_list`
--

INSERT INTO `product_list` (`c_id`, `c_jobName`, `c_jobUrgent`, `c_jobContent`, `c_jobDescription`, `c_purchaseAmount`, `c_total_price`, `sellerID`) VALUES
(1, '手機', 1000, 2, '', 1, 1000, 0),
(2, '電腦', 500, 3, '', 0, 0, 0),
(3, '平板', 800, 1, '', 1, 800, 0),
(4, '鍵盤', 400, 5, '', 0, 0, 0),
(9, '手機', 1003, 2, '', 0, 0, 0),
(11, '手機', 1000, 2, '11111', 0, 0, 0),
(12, '平板', 800, 111, '', 0, 0, 0),
(13, '手機', 22222, 2, '', 0, 0, 0),
(14, '蛤', 321, 123, '!!!!', 0, 0, 0),
(50, '商品A', 200, 3, 'Aa', 0, 0, 0),
(51, '商品B', 125, 45, 'Bb', 0, 0, 0),
(52, '商品C', 300, 10, 'Cc', 1, 300, 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `product_list`
--
ALTER TABLE `product_list`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
