SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `CustomProduct_list` (
  `C_id` int(11) NOT NULL,
  `C_item` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `C_price` int(11) DEFAULT NULL,
  `C_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 傾印資料表的資料 `product_list`
--

INSERT INTO `product_list` (`id`, `item`, `price`, `quantity`) VALUES
(1, '手機', 1000, 2),
(2, '電腦', 500, 3),
(3, '平板', 800, 1),
(4, '鍵盤', 400, 5);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `product_list`
--
ALTER TABLE `CustomProduct_list`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;