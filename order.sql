-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-12-13 04:29:13
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
-- 資料表結構 `order`
--

CREATE TABLE `order` (
  `orderID` int(11) NOT NULL,
  `id` varchar(11) NOT NULL,
  `jobName` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `jobUrgent` varchar(11) DEFAULT NULL,
  `jobContent` varchar(11) DEFAULT NULL,
  `jobDescription` varchar(50) NOT NULL,
  `sellerID` int(11) NOT NULL,
  `customID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 傾印資料表的資料 `order`
--

INSERT INTO `order` (`orderID`, `id`, `jobName`, `jobUrgent`, `jobContent`, `jobDescription`, `sellerID`, `customID`) VALUES
(14, '3,52', '平板,商品C', '800,300', '1,10', ',Cc', 0, 0),
(15, '3,4,52', '平板,鍵盤,商品C', '800,400,300', '1,5,10', ',,Cc', 0, 0),
(16, '1,3,52', '手機,平板,商品C', '1000,800,30', '2,1,10', ',,Cc', 0, 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
