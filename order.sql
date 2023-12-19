-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-12-19 08:22:45
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
  `jobContent` int(11) DEFAULT NULL,
  `jobDescription` varchar(50) NOT NULL,
  `sellerID` int(11) NOT NULL,
  `customID` int(11) NOT NULL,
  `orderStatus` varchar(25) NOT NULL,
  `result` int(11) DEFAULT NULL,
  `feedback` int(1) DEFAULT NULL,
  `totalQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 傾印資料表的資料 `order`
--

INSERT INTO `order` (`orderID`, `id`, `jobName`, `jobUrgent`, `jobContent`, `jobDescription`, `sellerID`, `customID`, `orderStatus`, `result`, `feedback`, `totalQuantity`) VALUES
(226, '9', '手機', '1003', 1, '', 1, 5, 'Shipped', 1003, NULL, 0),
(227, '2', '電腦', '500', 2, '', 1, 5, 'Arrived', 1000, 4, 0),
(228, '83', '商品B', '66', 1, 'Bb', 3, 5, 'Shipped', 66, NULL, 0),
(229, '50', '商品A', '200', 3, 'Aa', 3, 5, 'Shipped', 600, NULL, 0);

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
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
