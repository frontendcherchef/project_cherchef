-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019 年 03 月 21 日 12:00
-- 伺服器版本: 10.1.37-MariaDB
-- PHP 版本： 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `pro_cherchef`
--

-- --------------------------------------------------------

--
-- 資料表結構 `activities`
--

CREATE TABLE `activities` (
  `sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `chef` varchar(255) NOT NULL,
  `places` varchar(255) NOT NULL,
  `time` date NOT NULL,
  `duration` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `act_pics` varchar(255) NOT NULL,
  `u_limit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `activities`
--

INSERT INTO `activities` (`sid`, `name`, `chef`, `places`, `time`, `duration`, `price`, `content`, `details`, `act_pics`, `u_limit`) VALUES
(1, '富基漁港海鮮採買團', '011', '基隆', '2019-06-05', '半天', '3000', '主廚帶領選菜、教導挑菜技巧、包含快速料理海鮮午餐', '活動對象：20 歲以上\r\n集合時間：因為魚市場很早開故凌晨就集合', '', '10'),
(2, '海邊星空BBQ', '009', '秘境', '2019-05-10', '兩天一夜', '4500', '包含用餐(烤乳豬)、帳篷海邊過夜、隔夜早午餐', '活動對象：20歲以上\r\n集合時間：需戶外過夜須配合帳棚過夜', '', '12'),
(3, '柚花下的餐會', '010', '宜蘭縣', '2019-06-10', '半天', '2000', '包含用午餐、採果活動、品茶、木雕活動、並贈予伴手禮', '', '', '10'),
(4, '東石外傘頂洲夕陽餐會', '006', '嘉義縣', '2019-07-01', '半天', '2800', '費用內含：沙洲體驗  / 餐桌晚餐 / 活動保險 / 船票', '生態沙洲與特色晚宴體驗\r\n欣賞潮間帶豐富生態和蚵棚風景\r\n在海中夕陽餘暉下用餐', '', '10'),
(6, '金黃稻田裡的餐桌', '004', '台東池上', '2019-06-30', '8小時', '1800', '採收稻米、在金黃稻田裡用餐', '', '', '10'),
(9, '原民部落風味餐', '100', '宜蘭縣大同鄉', '2019-07-05', '整天', '2200', '部落參觀，約十二點開始用餐，用餐完畢可隨意走走享受自然至下午四點左右。', '不老部落採取預約制，預約後，由客人自行開車至羅東寒溪村不老部落接駁處，部落將會有接待人員及專車接駁客人上山至不老部落(車程約十五分鐘)。\r\n', '', '10'),
(11, '測試用活動10', '帶領主廚(連結chef表)', '測試用活動地點', '2019-05-20', '活動長度', '0', '測試用活動內容', '測試用細節', '照片', '報名會員(連結client表)'),
(12, '測試用活動12', '帶領主廚(連結chef表)', '測試用活動地點', '2019-05-20', '活動長度', '0', '測試用活動內容', '測試用細節', '照片', '報名會員(連結client表)'),
(13, '測試用活動13', '帶領主廚(連結chef表)', '測試用活動地點', '2019-05-20', '活動長度', '0', '測試用活動內容', '測試用細節', '照片', '報名會員(連結client表)'),
(14, '測試用活動14', '帶領主廚(連結chef表)', '測試用活動地點', '2019-05-20', '活動長度', '0', '測試用活動內容', '測試用細節', '照片', '報名會員(連結client表)'),
(15, '測試用活動15', '帶領主廚(連結chef表)', '測試用活動地點', '2019-05-20', '活動長度', '0', '測試用活動內容', '測試用細節', '照片', '報名會員(連結client表)'),
(16, '測試用活動16', '帶領主廚(連結chef表)', '測試用活動地點', '2019-05-20', '活動長度', '0', '測試用活動內容', '測試用細節', '照片', '報名會員(連結client表)'),
(17, '測試用活動17', '帶領主廚(連結chef表)', '測試用活動地點', '2019-05-20', '活動長度', '0', '測試用活動內容', '測試用細節', '照片', '報名會員(連結client表)'),
(18, '測試用活動18', '帶領主廚(連結chef表)', '測試用活動地點', '2019-05-20', '活動長度', '0', '測試用活動內容', '測試用細節', '照片', '報名會員(連結client表)'),
(20, '測試用活動20', '帶領主廚(連結chef表)', '測試用活動地點', '2019-05-20', '活動長度', '0', '測試用活動內容', '測試用細節', '照片', '報名會員(連結client表)'),
(26, 'EDIT', '帶領廚師(連結chef表)', '測試用活動地點', '2019-05-20', '活動長度', '5', '測試用活動內容', '測試用細節', '照片', ''),
(37, '測試用活動27', '帶領廚師(連結chef表)', 'test活動地點', '2019-05-20', 'test半天', '2000元', 'test內容', 'test細節', '', 'test人'),
(38, '測試用活動38', '帶領廚師(連結chef表)', 'test活動地點', '2019-05-20', 'test半天', '2000元', 'test內容', 'test細節', '', 'test人'),
(39, '555777', '55', '55', '0000-00-00', '55', '55', '5', '5777', '', '5557'),
(40, '5557770', '55', '55', '0000-00-00', '55', '55', '5', '5777', '', '5557'),
(41, '6765', '5675', '5675', '0000-00-00', '567576', '5757', '5756', '5757', '', '567567');

-- --------------------------------------------------------

--
-- 資料表結構 `activities_photo`
--

CREATE TABLE `activities_photo` (
  `sid` int(11) NOT NULL,
  `activities_sid` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `activities_photo`
--

INSERT INTO `activities_photo` (`sid`, `activities_sid`, `file_name`) VALUES
(5, 1, 'act_5_0.jpg'),
(9, 1, 'act_9_0.jpg'),
(10, 2, 'act_9_1.jpg'),
(13, 2, 'act_11_0.jpg'),
(14, 1, 'act_14_0.jpg'),
(15, 2, 'act_15_0.jpg'),
(16, 1, 'act_16_0.jpg');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `activities`
--
ALTER TABLE `activities`
  ADD warning KEY (`sid`);

--
-- 資料表索引 `activities_photo`
--
ALTER TABLE `activities_photo`
  ADD warning KEY (`sid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `activities`
--
ALTER TABLE `activities`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- 使用資料表 AUTO_INCREMENT `activities_photo`
--
ALTER TABLE `activities_photo`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
