-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019 年 03 月 21 日 10:31
-- 伺服器版本： 10.1.38-MariaDB
-- PHP 版本： 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `chef`
--

-- --------------------------------------------------------

--
-- 資料表結構 `cooking_house`
--

CREATE TABLE `cooking_house` (
  `sid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(40) NOT NULL,
  `web` varchar(40) NOT NULL,
  `intro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `cooking_house`
--

INSERT INTO `cooking_house` (`sid`, `name`, `phone`, `address`, `web`, `intro`) VALUES
(1, 'YAMICOOK美食廚藝教室', '02 2777', '104台北市中山區長安東路二段', 'https://www.yamicook.com/', '以美食的誘惑力觸動更多創意的活動空間。可成為一處您專屬的私人招待所，享受名師名廚的手藝佳餚。'),
(2, '料理生活家', '02 2888', '106台北市大安區青田街一巷', 'http://www.4fcookinghome.com/', '成立於2008，COOKING HOME用迎接朋友的態度來歡迎每一位學員。希望大家可以來這邊放鬆地一起做料理，打造一個不同於「烹飪教室」的「料理生活家」概念。'),
(3, 'NC5 Studio料理空間', '02 2541', '104台北市中山區民生東路一段', 'https://www.facebook.com/NC5Studio/', '沒有城市裡過度的繁華喧嘯，提供的只有最單純樸真的食材、健康美味的料理方式，伴隨著佳餚和花草芬芳香氣，以最熱情的心迎接喜愛品味美食以及尋找生活美學的朋友道訪，一同探索與體驗慢活的生命悸動。'),
(4, '不丹幸福空間', '02 2758', '110台北市信義區光復南路421巷', 'http://tw-bhutan.blogspot.com/', '「人如其食」（You are what you eat.），讓天然、無汙染、自然有機的生活態度，使我們的健康與美味、品味同進！'),
(5, '「台北發生」文創空間', '02 2105', '114台北市內湖區內湖路一段', 'http://www.taipeiing.com/', '「台北發生」，一個全新模式的文創空間，一個「吃、喝、玩、創」的新所在，一個文化雜食者的娛樂道場…Let\'s eat · drink · play · create！'),
(6, '山渡空間食藝', '03 9321', '260宜蘭縣宜蘭市健康路一段', 'https://www.facebook.com/feed.art.88', '\"支付訂金帳戶：代碼\r\n帳號:4202 \r\n帳戶名：山渡空間食\r\n親愛的貴賓如您匯款成功煩請來電告知櫃檯人員\"'),
(7, '甜甜圈', '0913', '台南', '', ''),
(31, '米花工作坊', '02-1234', '台南市', 'www.mikaHouse.com', '充滿愛和歡笑的作菜空間'),
(33, '小米廚房', '02-1233', '新竹縣', 'www.cookingKinghouse.com', '提供教室租借 請提前三日預約'),
(35, '米米教室', '02-1234', '123', '123', '123'),
(61, '測試用料理空間36', '02 1234', '台北市測試用地址', 'website', '測試用料理空間介紹'),
(62, '測試用料理空間62', '02 1234', '台北市測試用地址', 'website', '測試用料理空間介紹'),
(64, '測試用料理空間63', '02 1234', '台北市測試用地址', 'website', '測試用料理空間介紹'),
(65, '測試用料理空間65', '02 1234', '台北市測試用地址', 'website', '測試用料理空間介紹'),
(66, '測試用料理空間66', '02 1234', '台北市測試用地址', 'website', '測試用料理空間介紹'),
(67, '測試用料理空間67', '02 2345', '台北市測試用地址', 'website', '測試用料理空間介紹'),
(70, '測試用料理空間68', '02 1234', '台北市測試用地址', 'website', '測試用料理空間'),
(72, '測試用料理空間72', '02 1234', '台北市測試用地址', 'website', '測試用料理空間'),
(73, '測試用料理空間73', '02 1234', '台北市測試用地址', 'website', '測試用料理空間介紹'),
(74, '測試用料理空間74', '02 1234', '台北市測試用地址', 'web', '測試用料理'),
(76, '測試用料理空間75', '02 1234', '台北市測試用地址', 'website', '測試用料理空間介紹'),
(77, '測試用料理空間77', '02 1234', '台北市測試用地址', 'website', '測試用料理空間介紹');

-- --------------------------------------------------------

--
-- 資料表結構 `cooking_house_photo`
--

CREATE TABLE `cooking_house_photo` (
  `sid` int(11) NOT NULL,
  `cooking_house_sid` int(255) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `cooking_house_photo`
--

INSERT INTO `cooking_house_photo` (`sid`, `cooking_house_sid`, `file_name`) VALUES
(5, 1, 'c_h_1_0.jpg'),
(6, 1, 'c_h_1_1.jpg'),
(7, 1, 'c_h_1_2.jpg'),
(9, 4, 'c_h_9_0.jpg'),
(10, 4, 'c_h_9_1.jpg'),
(11, 4, 'c_h_9_2.jpg'),
(12, 6, 'c_h_12_0.jpg'),
(13, 6, 'c_h_12_1.jpg'),
(15, 6, 'c_h_12_3.jpg'),
(16, 31, 'c_h_16_0.jpg'),
(17, 2, 'c_h_17_0.jpg'),
(18, 2, 'c_h_17_1.jpg'),
(19, 2, 'c_h_17_2.jpg'),
(20, 2, 'c_h_17_3.jpg'),
(23, 3, 'c_h_23_0.jpg'),
(24, 3, 'c_h_23_1.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `sid` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(4) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`sid`, `email`, `password`, `name`, `phone`, `address`) VALUES
(1, 'morg@gmail.com', '9765b2bfa3443ba7683729fa7b8b1011f4524537', '陳湯圓', '0972', '台北市文山區'),
(2, 'admin@gmail.com', '9765b2bfa3443ba7683729fa7b8b1011f4524537', '管理人', '0972', '台南市'),
(3, 'poor_guy@gmail.com', '0071877d20a65c02d9a1654f109b97dc61416d1a', '可憐人', '0963', '台北市文山區汀洲路四段'),
(6, 'test1@gmail.com', 'b480c074d6b75947c02681f31c90c668c46bf6b8', '花花', '021234', '台北市文山區汀洲路四段'),
(7, 'test12@gmail.com', 'b480c074d6b75947c02681f31c90c668c46bf6b8', '花生糖', '0913', '台南市'),
(8, 'morg@gmail.com', 'b480c074d6b75947c02681f31c90c668c46bf6b8', '花花', '13445', '台北市'),
(9, 'test4@gmail.com', '45e827f8fa10aed21ec1224ba9e108788a00531b', '鳳梨酥', '0972', '米花市平安街');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `cooking_house`
--
ALTER TABLE `cooking_house`
  ADD warning KEY (`sid`);

--
-- 資料表索引 `cooking_house_photo`
--
ALTER TABLE `cooking_house_photo`
  ADD warning KEY (`sid`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD warning KEY (`sid`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `cooking_house`
--
ALTER TABLE `cooking_house`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `cooking_house_photo`
--
ALTER TABLE `cooking_house_photo`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
