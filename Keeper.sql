SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `Keeper` (
  `c_id` int(11) NOT NULL,
  `c_Product` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `c_Price` int(11) DEFAULT NULL,
  `c_Amount` int(11) DEFAULT NULL,
  `c_Detail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 傾印資料表的資料 `Keeper`
--

INSERT INTO `Keeper` (`id`, `Product`, `Price`, `Amount`, `Detail) VALUES
(1, '手機', 1000, 2, ''),
(2, '電腦', 500, 3, ''),
(3, '平板', 800, 1, ''),
(4, '鍵盤', 400, 5, ''),

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `Keeper`
--
ALTER TABLE `Keeper`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Keeper`
--
ALTER TABLE `Keeper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;
