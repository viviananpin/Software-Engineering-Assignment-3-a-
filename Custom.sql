SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `Custom` (
  `id` int(11) NOT NULL,
  `Product` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Price` int(11) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Detail` varchar(50) NOT NULL
  `PurchaseNum`int(11) DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 傾印資料表的資料 `Custom`
--

INSERT INTO `Custom` (`id`, `Product`, `Price`, `Amount`, `Detail`,`PurchaseNum`) VALUES
(1, '手機', 1000, 2, '',0),
(2, '電腦', 500, 3, '',1),
(3, '平板', 800, 1, '',2),
(4, '鍵盤', 400, 5, '',3),

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `Custom`
--
ALTER TABLE `Custom`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `Custom`
--
ALTER TABLE `Custom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;
