-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019 年 03 月 29 日 02:23
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
-- 傾印資料表的資料 `activities`
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
(41, '6765', '5675', '5675', '0000-00-00', '567576', '5757', '5756', '5757', '', '567567'),
(42, '測試用活動42', '帶領廚師(連結chef表)', 'test活動地點', '2019-05-20', 'test半天', '2000元', 'test內容', 'test細節', '', 'test人'),
(44, 'EDIR', '212', '21', '0000-00-00', '21', '21', '1', '2', '', '12');

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
-- 傾印資料表的資料 `activities_photo`
--

INSERT INTO `activities_photo` (`sid`, `activities_sid`, `file_name`) VALUES
(5, 1, 'act_5_0.jpg'),
(9, 1, 'act_9_0.jpg'),
(10, 2, 'act_9_1.jpg'),
(13, 2, 'act_11_0.jpg'),
(14, 2, 'act_14_0.jpg'),
(15, 2, 'act_15_0.jpg'),
(16, 9, 'act_16_0.jpg'),
(17, 1, 'act_17_0.jpeg'),
(18, 2, 'act_19_0.jpg'),
(20, 1, 'act_20_0.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `add_utensils`
--

CREATE TABLE `add_utensils` (
  `sid` int(11) NOT NULL,
  `clients` int(11) NOT NULL COMMENT '會員編號',
  `name` varchar(255) DEFAULT NULL,
  `rent` decimal(10,0) DEFAULT NULL COMMENT '租金',
  `price` decimal(10,0) DEFAULT NULL,
  `quantity` decimal(10,0) DEFAULT NULL COMMENT '訂購數量',
  `details` varchar(255) DEFAULT NULL COMMENT '詳細資訊',
  `intro` varchar(255) DEFAULT NULL COMMENT '商品特色'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `add_utensils`
--

INSERT INTO `add_utensils` (`sid`, `clients`, `name`, `rent`, `price`, `quantity`, `details`, `intro`) VALUES
(3, 2, '【皇家饗宴】葡萄牙Cutipol-粉紅金點心叉匙+德國Weimar經典玫瑰K金盤', '180', '2500', '10', '包含餐墊. 麵包碟. 黃油刀. 沙拉叉子 .晚餐叉子 .晚餐盤 .餐巾 .甜點勺子 . 晚餐刀 .湯匙. 水杯的玻璃杯. 紅酒高腳杯 .白酒杯', '※ 禮組新選擇 好價格\r\n※ 餐具葡萄牙設計製造榮獲Good Design Award獎\r\n※ 米其林星級餐廳推薦使用\r\n※ 奢華 24K 金'),
(4, 3, '德國KAHLA-BLAU SAKS餐具組\r\n', '99', '1200', NULL, '包含餐墊. 麵包碟. 黃油刀. 沙拉叉子 .晚餐叉子 .晚餐盤 .餐巾 .甜點勺子 . 晚餐刀 .湯匙. 水杯的玻璃杯. 紅酒高腳杯 .白酒杯', '※德國製造高級餐瓷\r\n※KAHLA pro Eco環保製程愛地球\r\n※高品質設計令人愛不釋手'),
(6, 12, '【秋意禮組】英國Portmeirion-BG經典植物園', '120', '1800', NULL, '包含餐墊. 麵包碟. 黃油刀. 沙拉叉子 .晚餐叉子 .晚餐盤 .餐巾 .甜點勺子 . 晚餐刀 .湯匙. 水杯的玻璃杯. 紅酒高腳杯 .白酒杯', '※嚴選熱銷單品禮組!!\r\n※英國進口精瓷/葡萄牙18/10不鏽鋼\r\n※精打細算!!!最強禮組!!!\r\n※送禮自用皆適合'),
(7, 12, '英國CHURCHiLL-Blue willow柳樹風格20件餐盤餐具組', '180', '2200', NULL, '包含餐墊. 麵包碟. 黃油刀. 沙拉叉子 .晚餐叉子 .晚餐盤 .餐巾 .甜點勺子 . 晚餐刀 .湯匙. 水杯的玻璃杯. 紅酒高腳杯 .白酒杯', '※ 可於微波爐、烤箱、冰箱使用\r\n※ 可用洗碗機清洗\r\n※ 英國設計英國製造'),
(8, 2, '【獨身貴族】葡萄牙Cutipol GOA系列-粉紅金主餐叉匙餐盤組', '130', '1600', NULL, '包含餐墊. 麵包碟. 黃油刀. 沙拉叉子 .晚餐叉子 .晚餐盤 .餐巾 .甜點勺子 . 晚餐刀 .湯匙. 水杯的玻璃杯. 紅酒高腳杯 .白酒杯', '※ Cutipol好評再加碼!!\r\n※ 餐具手工製成榮獲Good Design Award獎\r\n※ 葡萄牙設計製造紅遍全世界的餐具'),
(9, 3, '【貴族禮組】葡萄牙Cutipol紅金點心叉匙加英國PM設計聯名款K金盤', '100', '2300', NULL, '包含餐墊. 麵包碟. 黃油刀. 沙拉叉子 .晚餐叉子 .晚餐盤 .餐巾 .甜點勺子 . 晚餐刀 .湯匙. 水杯的玻璃杯. 紅酒高腳杯 .白酒杯', '※ 禮組新選擇!好價格!\r\n※ 餐具葡萄牙設計製造榮獲Good Design Award獎\r\n※ 米其林星級餐廳推薦使用\r\n※ 22K金妝飾送禮自用皆適宜'),
(10, 8, '【美國康寧 CorningWare】蓮花骨瓷餐具', '110', '1800', NULL, '包含餐墊. 麵包碟. 黃油刀. 沙拉叉子 .晚餐叉子 .晚餐盤 .餐巾 .甜點勺子 . 晚餐刀 .湯匙. 水杯的玻璃杯. 紅酒高腳杯 .白酒杯', '※奢華金邊，提升餐桌品味 \r\n※來自歐洲的設計靈感 \r\n※簡約大氣，完美搭配中西餐 \r\n※骨粉含量超過40%'),
(11, 12, '義大利VBC casa-純白花朵系列', '120', '3200', '1', '包含餐墊. 麵包碟. 黃油刀. 沙拉叉子 .晚餐叉子 .晚餐盤 .餐巾 .甜點勺子 . 晚餐刀 .湯匙. 水杯的玻璃杯. 紅酒高腳杯 .白酒杯', '※ 義大利設計製造\r\n※ 純白花朵精美刻畫\r\n※適用洗碗機清洗，可於微波爐、烤箱'),
(12, 12, '英國Spode-Blue Italian 典藏義大利藍系列', '100', '1880', '2', '包含餐墊. 麵包碟. 黃油刀. 沙拉叉子 .晚餐叉子 .晚餐盤 .餐巾 .甜點勺子 . 晚餐刀 .湯匙. 水杯的玻璃杯. 紅酒高腳杯 .白酒杯', '※英國製造高品質精瓷\r\n※可於微波爐、烤箱、冰箱使用\r\n※可用洗碗機清洗'),
(14, 8, '德國KAHLA-CENTURIES系列-12件方形碗盤組', '100', '3200', '2', '包含餐墊. 麵包碟. 黃油刀. 沙拉叉子 .晚餐叉子 .晚餐盤 .餐巾 .甜點勺子 . 晚餐刀 .湯匙. 水杯的玻璃杯. 紅酒高腳杯 .白酒杯', '※德國製造高級餐瓷\r\n※KAHLA pro Eco環保製程愛地球\r\n※高品質設計令人愛不釋手'),
(48, 0, '測試餐具組', '0', '0', '0', '測試詳細資訊', '測試商品特色'),
(50, 0, '測試餐具組', '0', '0', '0', '測試詳細資訊', '測試商品特色'),
(58, 11, '義大利VBC casa-手工浮雕蕾絲系列', '120', '2100', '2', '包含餐墊. 麵包碟. 黃油刀. 沙拉叉子 .晚餐叉子 .晚餐盤 .餐巾 .甜點勺子 . 晚餐刀 .湯匙. 水杯的玻璃杯. 紅酒高腳杯 .白酒杯', '※ 可於微波爐、烤箱、冰箱使用\r\n※ 可用洗碗機清洗\r\n※ 義大利製造'),
(65, 0, '測試餐具組', '0', '0', '0', '測試詳細資訊', '測試商品特色'),
(66, 12, '布丁', '10', '2100', '1', '包含餐墊. 麵包碟. 黃油刀. 沙拉叉子 .晚餐叉子 .晚餐盤 .餐巾 .甜點勺子 . 晚餐刀 .湯匙. 水杯的玻璃杯. 紅酒高腳杯 .白酒杯', '包含餐墊. 麵包碟. 黃油刀. 沙拉叉子 .晚餐叉子 .晚餐盤 .餐巾 .甜點勺子 . 晚餐刀 .湯匙. 水杯的玻璃杯. 紅酒高腳杯 .白酒杯'),
(67, 2, '【皇家饗宴】葡萄牙Cutipol-粉紅金點心叉匙+德國Weimar經典玫瑰K金盤', '180', '300', '10', '包含餐墊. 麵包碟. 黃油刀. 沙拉叉子 .晚餐叉子 .晚餐盤 .餐巾 .甜點勺子 . 晚餐刀 .湯匙. 水杯的玻璃杯. 紅酒高腳杯 .白酒杯', '※ 禮組新選擇 好價格\r\n※ 餐具葡萄牙設計製造榮獲Good Design Award獎\r\n※ 米其林星級餐廳推薦使用\r\n※ 奢華 24K 金'),
(68, 0, '測試餐具組', '0', '0', '0', '測試詳細資訊', '測試商品特色'),
(69, 0, '測試餐具組', '0', '0', '0', '測試詳細資訊', '測試商品特色'),
(70, 0, '測試餐具組', '0', '0', '0', '測試詳細資訊', '測試商品特色'),
(71, 1, '123', '123', '45', '850', '12', '12'),
(72, 1, '456', '123', '45', '850', '12', '12'),
(73, 1, 'mo', '125', '2222', '10', '12', '123'),
(74, 75, 'mo', '125', '2222', '10', '12', '123'),
(75, 0, '測試餐具組', '0', '0', '0', '測試詳細資訊', '測試商品特色'),
(76, 80, '123', '123', '12', '10', '111', '111'),
(77, 0, '測試餐具組', '0', '0', '0', '測試詳細資訊', '測試商品特色');

-- --------------------------------------------------------

--
-- 資料表結構 `add_utensils_photo`
--

CREATE TABLE `add_utensils_photo` (
  `sid` int(11) NOT NULL,
  `add_utensils_sid` int(255) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `add_utensils_photo`
--

INSERT INTO `add_utensils_photo` (`sid`, `add_utensils_sid`, `file_name`) VALUES
(11, 3, 'a_u_11_0.jpg'),
(12, 3, 'a_u_12_0.jfif'),
(13, 3, 'a_u_13_0.jpg'),
(16, 3, 'a_u_14_0.jpg'),
(17, 3, 'a_u_17_0.jpg'),
(18, 71, 'a_u_18_0.jpg'),
(19, 72, 'a_u_19_0.jpg'),
(20, 3, 'a_u_20_0.jpg'),
(21, 74, 'a_u_21_0.jpg'),
(23, 76, 'a_u_23_0.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `chef`
--

CREATE TABLE `chef` (
  `sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `pic` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `experience` varchar(255) NOT NULL,
  `food_set` varchar(255) DEFAULT NULL,
  `area` varchar(255) NOT NULL,
  `restaurant` varchar(255) DEFAULT NULL,
  `own_kitchen` varchar(255) NOT NULL,
  `tool` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `chef`
--

INSERT INTO `chef` (`sid`, `name`, `email`, `password`, `mobile`, `birthday`, `pic`, `title`, `info`, `experience`, `food_set`, `area`, `restaurant`, `own_kitchen`, `tool`, `note`) VALUES
(1, 'D\'Angelo Giuseppe', 'angelo@cherchef.com', '*43B5D28C4E561DC332E90E97FD8CEC2EC9C02D4C', '0919102103', '1985-06-21', '', '', '意大利廚師Giuseppe擁有十多年的國際入廚經驗，擅長經典意大利菜、創新的地中海菜、海鮮、野味及肉類菜式。他自己對飲食要求十分高，因此每次烹調都保證只會選用優質及有機食材。\r\n\r\n他除了畢業於法律系，亦擁有意大利廚藝學院Boscolo Etoile Academy的「Maestria di 1 Livello」學位。 2007年，他在遊艇公司擔任主廚，開始了廚師工作的生涯，及後陸續在西西里和莫斯科不同的餐廳擔任主廚。他除了是一位廚師外，還是烹飪導師，他亦有新餐廳諮詢的豐富經驗。\r\n\r\nGiuseppe是', 'City\'super 生活藝會廚藝班, 客席導師 (2018至今 )\r\n2016　俄羅斯電視「Master Chef Junior」評判\r\n\r\n品牌廚師 - CulinaryOn, 星加坡及俄羅斯莫斯科 (April 2016 – April 2017)\r\n品牌廚師 - Pane e Olio 俄羅斯莫斯科 (Oct 2011 – May 2014)\r\n主廚 - Tutto Bene, 俄羅斯莫斯科 (May 2011 – Sep 2011)', NULL, 'A', '0', '1', '2,6,8,10,11,13,15,23', '如家中沒有家務助理幫忙收碟，煩請備註 MobiChef 要求侍應服務(HK$900/侍應生, 包括5小時內的服務, 將人有專人聯系)\r\n以上中文菜名翻譯如有歧異，概以英文為準\r\nBBQ 菜單包括5小時廚師服務\r\n我一般會在用餐前2小時到達\r\n如賓客人數為10位以上，我將帶一位廚房助手協助烹調\r\n我可以另行為部份賓客準備素食份量'),
(2, 'Theodore Chang', 'theodore@cherchef.com', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', '0973574980', '1987-05-04', '', NULL, 'Theodore 為現職美國在台協會私人廚師，平日經常為大使館烹調宴客菜式。過往廿多年，他在美國不同的酒店及餐廳工作，累積豐富的經驗。之後前往香港發展，於美國會所、愉景灣高爾夫球會及富豪九龍酒店任職副主廚。 他畢業於舊金山的廚藝學院，主修酒店及餐飲管理。擅長西菜及美國菜。', 'Chef, AIT (2016 - Present)\r\nChef de Cuisine,飲食工房(香港)有限公司 (2015 - 2016)\r\nSenior Sous Chef, 愉景灣高爾夫球會 (2013 - 2015)\r\nSous Chef, 美國會所 (2012 - 2013)\r\nChef Consultant, F＆B計劃有限公司 (2011 - 2012)\r\nSous Chef, 富豪九龍酒店 (2008 - 2011)', NULL, 'B', NULL, '0', '1,2,3,4,5,6', '如賓客人數為10位以上，我將帶一位廚房助手協助烹調\r\n我一般會在用餐前 2-2.5小時到達\r\n我可以另行為部份賓客準備素食份量'),
(3, 'Wai Chung Eric Tse', 'eric@cherchef.com', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', '0975842351', '1990-02-03', '', '上海菜第一把交椅', '素食廚師 Eric 因為極喜愛吃上海菜，承傳母親手藝，茹素後研究把喜愛的上海菜式變成素食版本，兩年前更開始經營私房素菜及到會。Eric 乃 Green Common 的烹飪導師，他熱心推行素食，並不時透過網上平台分享食譜及心得 。', 'City\'super 生活藝會廚藝班, 客席導師 (2018至今)\r\n全綠煮義烹飪比賽 - 公開組最佳素食食譜\r\n中環銀杏館 (半年)\r\n私房素菜 (2年)', NULL, 'A', NULL, '0', '1,3,5,7,9,10,20', '人數多時，我可能帶同 1 個廚房助手 \r\n我可到有寵物場地\r\n我一般會在用餐前 2 小時到達'),
(4, 'Marc Chiu', 'marcchiu@cherchef.com', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', '0917843245', '1980-05-19', '', NULL, 'Marc出生於台灣，在美國長大，16歲時開始在餐廳廚房接受烹飪培訓。由於家裡經營餐館，Marc從小就喜歡上烹飪。他在美國多家中、西餐廳工作多年，受加州多元的飲食文化影響。他結合東、西方烹飪方式，喜歡用新鮮的食材，為客人提供溫馨親切的用餐體驗。\r\n「對我來說，飲食是生活中最重要的元素之一。在朋友、家人的聚會中，沒有什麼比起跟他們共享美食和歡樂更好的事了。」烹飪是一個永無止境的旅程，除了保留傳統的烹飪食譜，Marc還經常尋找新的元素，從世界各地找尋創新靈感，給食家帶來新鮮感。歡迎看看Marc 的食譜，預約他來', '兼任私人廚師 (2011-現在)\r\n副總廚 Cafe Maxim, 洛杉磯, 美國 (1998-2003)\r\n副總廚 Go N Win Chinese Restaurant, 洛杉磯, 美國 (1995-1998)', NULL, 'A', NULL, '1', '1,5,6,7,8,9,15,17', '可到有寵物場地\r\n我一般會在用餐前 2.5-3 小時到達\r\n我將視乎情況決定是否會帶廚房助手協助烹調\r\n我可以另行為部份賓客準備素食份量\r\n麻煩食家到時提供附近可泊車資料'),
(5, 'Tim Ng', 'tim@cherchef.com', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', '0918456232', '1979-04-12', '', NULL, 'Chef Tim 入廚20年，曾任職馬會、多間酒店、法國餐廳行政總廚及素食餐廳主廚。年輕的他於2016年開辦Oggi意大利餐廳並擔任主廚，他喜歡結合各國的食材，以西菜的烹調方式創作新的菜式，還加入「super food」食材，目的要為食家帶來不只是食物的味道，還有健康元素。', '行政總廚 & 店主, Oggi Restaurant (2016 - 現在)\r\n總廚, OVO Cafe (2015 - 2016)\r\n行政總廚, Stanley Deli (2014 - 2015)\r\n高級副總廚, 利景酒店 (2014 - 2014)\r\nChef De Partie, 台北萬豪酒店 (2013 - 2014)\r\n總廚, 拍板 (2011 - 2013)\r\n\r\n高級廚師, Stormies (2008 - 2009)\r\n廚師, Grappa\'s (2004 - 2008)\r\n高級廚師, ', NULL, 'A', NULL, '0', '1,6,7,9,12,15,16', '我一般會在用餐前 1.5小時到達\r\n如賓客人數為10位以上，我將帶一位廚房助手協助烹調\r\n我可以另行為部份賓客準備素食份量\r\n'),
(6, 'De Berardinis Luca', 'Berardinis@cherchef.com', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', '0915834956', '1978-03-15', '', NULL, '廚師Luca熱愛且專注於烹調藝術，他旨在為美食家提供最好的食物。Luca喜歡分享他作為廚師的熱情。 他擁有多年餐廳行政主廚的經驗，以意大利的當代風格為主，並遠瞻未來飲食趨勢，他使用傳統的烹飪混合新的技術，為他的菜餚帶來更多的不同的質感。', '行政主廚, Dine Art, Hong Kong (2018 - 現在)\r\n行政主廚, Operetta Restaurant Laisan Group, Hong Kong (2017 - 2018)\r\n專業廚師, Nicholini\'s, Conrad Hong Kong (2014 - 2017)\r\n行政主廚, Il Milione (1 Star Michelin), Hong Kong (2012 - 2014)\r\n行政主廚, Realis alla Corte del Sole, Italy', NULL, 'A', NULL, '1', '1,4,6,9,10,15', '中文菜名翻譯如有歧異，概以英文為準\r\n少於18人的聚餐需於5天前下單；18人或以上的聚餐需於10天前下單\r\n我需要為18人或以上的聚餐預先到現場視察, 訂單確定後我會以訊息跟食家約定時間\r\n如家中未能安排家傭負責收碟，請備註要求平台報價安排侍應服務\r\n我一般會在用餐前 3-4小時到達\r\n如賓客人數為10位以上，我將帶一位廚房助手協助烹調\r\n我可以另行為部份賓客準備素食份量\r\n歡迎在菜單中要求更換食材; 根據個別的要求可能會收取額外費用\r\n可到有寵物場地'),
(7, 'Leslie Liu', 'lesliel@cherchef.com', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', '09195345654', '1990-01-08', '', NULL, '正職為設計師，熱愛烹飪，2014年成立 Leslie Cooking Project。除了提供上門烹煮晚宴外， 亦為不同類型餐廳及品牌客戶作現場烹飪示範、創作及撰寫食譜。2015 年推出個人作品集《簡單食譜》，以日常食材及簡易做法泡製美味菜 餚為主題。現服務範圍包括中、小型到會美食 (Catering Service)，志在和更多人分享烹飪經驗及美食。Leslie 定時每兩個月更換新菜單，用上時令食材構思當季的最佳菜式。', 'Knockbox Coffee Company 客席廚師 (1/2 年)\r\nLeslie Cooking Project 上門廚師, 食譜書作者 (2014年至今)', NULL, 'A', NULL, '0', '1,4,6,8,11,12,14,17', '場地附近需有泊車地點\r\n可到有寵物場地\r\n我可以另行為部份賓客準備素食份量\r\n一般會在用餐1.5-2小時前到達'),
(8, 'Chef No.8', 'chefn8@.cherchef.com', 'admin', '0912520520', '1985-03-20', '', '高級廚師', 'Biography', '飯店大廚 10年', NULL, 'A', '1', '1', '1,3,5,7,9', '廚師備註'),
(9, 'Nusret Gökçe', 'kevin820422@gmail.co', 'adminadmin', '0978313131', '1983-04-01', '', '鹽寶貝 Salty Bae', '土耳其庫德人，為一名廚師，也是土耳其牛排館「Nusr-Et」的擁有者。並在土耳其、杜拜、阿布達比、邁阿密、紐約開設分店，由於他獨特的灑鹽手勢而在網路上爆紅。他也是一名專業屠夫。', 'Nusr-Et New York, 2018—', NULL, 'A', '1', '1', '2,6,7,13,14,23', '提早預一個禮拜預定。');

-- --------------------------------------------------------

--
-- 資料表結構 `chef_photo`
--

CREATE TABLE `chef_photo` (
  `sid` int(11) NOT NULL,
  `chef_sid` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `chef_photo`
--

INSERT INTO `chef_photo` (`sid`, `chef_sid`, `file_name`) VALUES
(4, 1, 'c_4_0.jpg'),
(5, 4, 'c_5_0.jpg'),
(6, 3, 'c_6_0.jpg'),
(7, 5, 'c_7_0.jpg'),
(8, 6, 'c_8_0.jpg'),
(9, 2, 'c_9_0.jpg'),
(10, 3, 'c_10_0.jpg'),
(12, 9, 'c_11_0.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `clients`
--

CREATE TABLE `clients` (
  `sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `kitchen_pics` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `clients`
--

INSERT INTO `clients` (`sid`, `name`, `mobile`, `email`, `password`, `address`, `birthday`, `profile_pic`, `kitchen_pics`) VALUES
(1, '李曉明', '0921-333-456', 'xiaoming@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '台北市大安區復興南路一段390號', '1990-10-10', '', ''),
(2, '蔡怡伶', '0918-549-268', 'yiling@yahoo.com.tw', '23b0fbac8b95d488396d2dca3b86a1c8bdcd7025', '新竹市東大路一段308號', '1987-06-05', '1', '1'),
(3, '林哲嘉', '0958-465-987', 'gia@yahoo.com.tw', '755d3a4e0fec40669f760d6f47eac21ad92f846a', '台北市大安區忠孝東路四段205號1樓', '1966-08-04', '2', '2'),
(8, '陳乃文', '0918377874', 'chen@yahoo.com.tw', '7c12f7f5bc98a0893b40ae5b580249b4c49f037f', '台中市北屯區廍子路666號', '1977-10-11', '', ''),
(12, '葉怡婷', '0932-576-748', 'yeahyeeeee@cherchef.com', 'b21af4c47547cd9f10b499701da5b75204928317', '台中市北屯區北屯路407-1號', '1980-05-14', '', ''),
(13, '唐雅茹', '0983-090-238', 'rubytung@msn.com', '0fb16f8da63d5b6e8eed92caf10f7a62e0fc10a6', '彰化縣彰化市茄苳路二段290巷彰化市景觀公園', '1983-03-16', '', ''),
(14, '陳鈺南', '0955-373-088', 'nannnn@cherchef', '28b242dd55c827c63baf103dcaa3ab0ca2091f07', 'eqweqweqwr', '1975-09-19', '', ''),
(42, '劉盈甄', '0956-399-333', 'liu@gmail.com', '1eb213f519c5864acb508dce9ae65094c137ffe0', '台北市萬華區武昌街二段118號', '1981-11-06', '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `clients_kitchen_pics`
--

CREATE TABLE `clients_kitchen_pics` (
  `sid` int(11) NOT NULL,
  `clients_sid` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `clients_kitchen_pics`
--

INSERT INTO `clients_kitchen_pics` (`sid`, `clients_sid`, `file_name`, `file`) VALUES
(3, '3', 'c_kit_3_0.jpg', '');

-- --------------------------------------------------------

--
-- 資料表結構 `clients_order`
--

CREATE TABLE `clients_order` (
  `sid` int(11) NOT NULL,
  `clients` varchar(255) NOT NULL,
  `chef` varchar(255) NOT NULL,
  `food_set` varchar(255) NOT NULL,
  `clients_house` enum('是','否') NOT NULL,
  `cooking_house` varchar(255) NOT NULL,
  `people_num` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `clients_order`
--

INSERT INTO `clients_order` (`sid`, `clients`, `chef`, `food_set`, `clients_house`, `cooking_house`, `people_num`, `order_date`, `order_time`, `total_price`) VALUES
(1, '李曉明', 'Marc Chiu', '心意情迷', '是', '', 4, '2019-02-26', '12:00:00', 24000),
(2, '蔡怡伶', 'Tim Ng', '日落卡普里島', '否', '不丹幸福空間', 6, '2019-01-18', '18:30:00', 28800);

-- --------------------------------------------------------

--
-- 資料表結構 `clients_profile_pics`
--

CREATE TABLE `clients_profile_pics` (
  `sid` int(11) UNSIGNED NOT NULL,
  `clients_sid` int(255) UNSIGNED DEFAULT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `clients_profile_pics`
--

INSERT INTO `clients_profile_pics` (`sid`, `clients_sid`, `file_name`) VALUES
(4, 1, 'c_h_3_0.jpg'),
(5, 2, 'c_h_5_0.png'),
(9, 8, 'c_h_6_0.jpg'),
(10, 8, 'c_h_10_0.jpg'),
(11, 8, 'c_h_11_0.jpg'),
(12, 42, 'c_h_12_0.jpg'),
(13, 1, 'c_h_13_0.jpg'),
(14, 8, 'c_h_14_0.jpg'),
(15, 1, 'c_h_15_0.jpg');

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
(77, '測試用料理空間77', '02 1234', '台北市測試用地址', 'website', '測試用料理空間介紹'),
(79, '測試用料理空間78', '0972', '台北市測試用地址xx路xx號', 'website', '測試用料理空間介紹'),
(80, '測試用料理空間80', '0972', '台北市測試用地址xx路xx號', 'website', '測試用料理空間介紹'),
(81, '米花工作室', '096', '台北市文山區汀洲路四段', '', '11111');

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
(17, 2, 'c_h_17_0.jpg'),
(18, 2, 'c_h_17_1.jpg'),
(19, 2, 'c_h_17_2.jpg'),
(20, 2, 'c_h_17_3.jpg'),
(23, 3, 'c_h_23_0.jpg'),
(24, 3, 'c_h_23_1.jpg'),
(25, 1, 'c_h_25_0.jpg'),
(26, 2, 'c_h_26_0.jpg'),
(27, 1, 'c_h_27_0.jpg'),
(28, 35, 'c_h_28_0.jpg'),
(29, 33, 'c_h_29_0.jpg'),
(30, 33, 'c_h_30_0.jpg'),
(31, 33, 'c_h_30_1.jpg'),
(32, 33, 'c_h_30_2.jpg'),
(33, 81, 'c_h_33_0.jpg'),
(34, 81, 'c_h_33_1.jpg'),
(35, 81, 'c_h_33_2.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `food_set`
--

CREATE TABLE `food_set` (
  `sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `chef` varchar(255) NOT NULL,
  `food_style` varchar(255) NOT NULL,
  `food_set_price` int(11) NOT NULL,
  `food_set_content` varchar(255) NOT NULL,
  `food_set_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `food_set`
--

INSERT INTO `food_set` (`sid`, `name`, `chef`, `food_style`, `food_set_price`, `food_set_content`, `food_set_image`) VALUES
(1, '心意情迷', '1', '3,301', 6000, '這個菜單靈感來自我的妻子, 我以「廚師妻子」的她最喜歡的菜式整合成這個Amore Mio 菜單, 意指「我的愛」。我的菜單全選用優質食材及有機食品, 將最好的帶給每位客人!', '0'),
(2, '日落卡普里島', '1', '3,301', 4800, '5道菜豐富晚餐，精選意大利卡普里島的菜式。我的菜單全選用優質食材及有機食品, 將最好的帶給每位客人!', ''),
(3, '西班牙色彩', '2', '3,305', 3200, '', ''),
(4, 'aaa', '1', '1,101', 2000, 'xxx', ''),
(22, 'mo', '11111', '11111', 2147483647, '111111111111111', '');

-- --------------------------------------------------------

--
-- 資料表結構 `food_set_class`
--

CREATE TABLE `food_set_class` (
  `sid` int(11) NOT NULL,
  `food_set` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `food_set_class`
--

INSERT INTO `food_set_class` (`sid`, `food_set`, `name`) VALUES
(1, 1, 'Starter (所有客人共選擇一款)'),
(2, 1, 'Soup (所有客人共選擇一款)'),
(3, 1, 'Pasta/ risotto *max 2 choices* (每位客人自選菜式)'),
(4, 1, 'Main course (每位客人自選菜式)'),
(5, 1, 'Dessert (所有客人共選擇一款)'),
(6, 2, 'starter *max 2 choices* (每位客人自選菜式)'),
(7, 2, 'soup (所有客人共選擇一款)'),
(8, 2, 'risotto/ home made fresh pasta *max 2 choices* (每位客人自選菜式)'),
(9, 2, 'main course (每位客人自選菜式)'),
(10, 2, 'dessert (所有客人共選擇一款)'),
(11, 3, 'Salad: (individual plate) (包括以下菜式)'),
(12, 3, 'Tapas: (包括以下菜式)'),
(13, 3, 'Main: (包括以下菜式)'),
(14, 3, 'Dessert: (individual plate) (包括以下菜式)'),
(15, 4, '涼菜四小碟 (十二選四)'),
(16, 4, '湯羮 (三選一)'),
(17, 4, '主菜 (十一選四)'),
(18, 4, '點心 (四選一)'),
(19, 4, '主食 (四選一) '),
(20, 4, '甜品 (三選一)'),
(21, 11, '11'),
(22, 111, '111');

-- --------------------------------------------------------

--
-- 資料表結構 `food_set_image`
--

CREATE TABLE `food_set_image` (
  `sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `food_set_meal`
--

CREATE TABLE `food_set_meal` (
  `sid` int(11) NOT NULL,
  `food_set_class` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `food_set_meal`
--

INSERT INTO `food_set_meal` (`sid`, `food_set_class`, `name`) VALUES
(1, 1, 'Baked artichokes stuffed with cheese \"Neapolitan style\"'),
(2, 1, 'Octopus salad with tomatoes capers olives potatoes and herbs'),
(3, 2, 'Classic tuscany seafood soup \"caciucco\"'),
(4, 2, 'Crab dumplings \"cappellacci\" in seafood broth'),
(5, 3, 'Risotto with asparagus and red Sicilian shrimps'),
(6, 3, '\"Paccheri\" with rockfish in tomatoes, olives and capers sauce with mediterranean herbs'),
(7, 3, 'Ravioli with lobster in scallops and asparagus sauce'),
(8, 3, 'Traditional home made Meat cannelloni'),
(9, 4, 'King fish with burrata cheese and organic spinach and tomatoes'),
(10, 4, 'Organic Wellington beef with truffle mashed potatoes'),
(11, 5, 'Pannacotta with berries'),
(12, 5, 'Classic Amalfi Coast ricotta and pear tart'),
(13, 5, 'Classic tiramisu'),
(14, 5, 'Chocolate lava cake with ice cream'),
(15, 6, 'Baked organic eggplants with mozzarella and tomatoes \"alla Parmigiana\"'),
(16, 6, '“Frittura all’Italiana ” Assorted Italian traditionals deep fried appetizers'),
(17, 6, 'Warm octopus salad with vegetables'),
(18, 7, 'Italian mussels and tomatoes soup'),
(19, 7, 'Minestrone soup with pesto'),
(20, 8, 'Seafood risotto'),
(21, 8, 'Home made “Fettuccine” with rabbit ragout and wild mushrooms'),
(22, 8, '\"Scialatielli\"with shrimps and vongole'),
(23, 8, 'Freshly made Cannelloni filled with ricotta and spinach'),
(24, 9, 'Pan fried sliced organic beef tenderloin baked with mozzarella and tomatoes and eggplants'),
(25, 9, 'Red Snapper \"all acqua pazza\" (tomatoes capers olives)'),
(26, 10, 'Classic amalfi coast Riccotta and peer tart'),
(27, 10, '“caprese” cake with Valrhona chocolate and almonds'),
(28, 10, 'Tiramisu'),
(29, 11, 'Orange Salad with Dried Fruit, Nuts, Olive & Manchego with Orange Dressing'),
(30, 12, 'Mushroom, Iberico Ham, Manchego & Black Truffle Toast'),
(31, 12, 'Tortilla Espanola - Spanish omelette of potatoes'),
(32, 12, 'Fried Chorizo Sausage in Red Wine Reduction'),
(33, 12, 'Gambas a la Ajillo - Sautéed Shrimp with Chili, Garlic'),
(34, 12, 'Vieiras a la Murciana - Scallop, White Wine, Chorizo, paprika'),
(35, 13, 'Roasted Spanish Chicken with Chorizo & Bell Pepper'),
(36, 13, 'Seafood Paella'),
(37, 13, 'Spanish Baked Fish'),
(38, 14, 'Filo Stacks with Fruits & Mascarpone'),
(39, 15, '四喜烤麩'),
(40, 15, '水晶肴玉'),
(41, 15, '拍黃瓜'),
(42, 15, '涼拌雲耳'),
(43, 15, '蘇式燻魚'),
(44, 15, '紅燒脆善'),
(45, 15, '香煎素鵝'),
(46, 15, '煙薰素鵝'),
(47, 15, '醉素雞卷'),
(48, 15, '醉枝豆'),
(49, 15, '油炆筍'),
(50, 15, '燻蛋 (蛋素)'),
(51, 16, '酸辣素翅'),
(52, 16, '西湖翠玉羹'),
(53, 16, '杏汁醃篤鮮'),
(54, 17, '清燉獅子頭'),
(55, 17, '紅燒獅子頭'),
(56, 17, '紅燒迷你素元蹄'),
(57, 17, '素黃雀'),
(58, 17, '冰花酸梅片皮鴨'),
(59, 17, '西湖醋黃魚'),
(60, 17, '香煎雪裡紅黃魚'),
(61, 17, '甜酸鍋巴'),
(62, 17, '松子素鬆生菜包'),
(63, 17, '京葱爆素牛 (五辛素)'),
(64, 17, '螞蟻上樹'),
(66, 18, '紅油抄手(少辣)'),
(67, 18, '香煎鍋貼'),
(68, 18, '砂鍋雲吞素鴨'),
(69, 19, '南京牛肉麵'),
(70, 19, '雪裡紅炒年糕'),
(71, 19, '擔擔撈麵'),
(72, 19, '上海粗炒'),
(73, 20, '豆沙鍋餅 (蛋奶素)'),
(74, 20, '冬梨桂蜜配湯丸 (香梨冬瓜桂花蜜糖水)'),
(75, 20, '紅豆蕃薯春卷配紅茶糖漿'),
(76, 111, '111');

-- --------------------------------------------------------

--
-- 資料表結構 `food_set_photo`
--

CREATE TABLE `food_set_photo` (
  `sid` int(11) NOT NULL,
  `food_set_sid` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `food_set_photo`
--

INSERT INTO `food_set_photo` (`sid`, `food_set_sid`, `file_name`) VALUES
(3, 1, 'c_h_1_0.jpg'),
(4, 2, 'c_h_4_0.jpg'),
(5, 1, 'c_h_5_0.jpg'),
(6, 3, 'c_h_6_0.jpg'),
(7, 2, 'c_h_7_0.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `food_style`
--

CREATE TABLE `food_style` (
  `sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` int(11) NOT NULL,
  `nickname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `food_style`
--

INSERT INTO `food_style` (`sid`, `name`, `class`, `nickname`) VALUES
(1, '台式料理', 0, '台灣菜, 台菜, 台灣料理'),
(2, '中式料理', 0, '中餐, 中華料理, 中菜'),
(3, '西洋料理', 0, '西餐, 西式料理, 歐式料理, 西菜'),
(4, '日本料理', 0, '日式料理, 和風料理'),
(5, '異國料理', 0, '異國菜'),
(101, '客家料理\r\n', 1, '客家菜'),
(102, '原民料理', 1, '原民菜, 原住民料理, 原住民菜'),
(201, '港式料理', 2, '香港菜, 香港料理'),
(202, '川式料理', 2, '川菜, 四川料理'),
(203, '上海料理', 2, '上海菜'),
(301, '義式料理', 3, '義大利菜'),
(302, '法式料理', 3, '法國菜'),
(303, '英式料理', 3, '英國菜'),
(304, '美式料理', 3, '美國菜'),
(305, '西班牙料理', 3, '西班牙菜'),
(501, '韓式料理', 5, '韓國菜'),
(502, '泰式料理', 5, '泰國菜'),
(503, '越式料理', 5, '越南菜'),
(504, '南洋料理', 5, '新加坡菜, 馬來西亞菜, 印尼菜');

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
(2, 'admin@gmail.com', '9765b2bfa3443ba7683729fa7b8b1011f4524537', '管理者', '0972', '台北市文山區汀洲路四段'),
(3, 'poor_guy@gmail.com', 'dd94709528bb1c83d08f3088d4043f4742891f4f', '陳鹹粿', '0963', '台南市佳里區延平路'),
(12, 'test4@gmail.com', '0071877d20a65c02d9a1654f109b97dc61416d1a', '路人4 ', '0972', '台北市測試用地址xx路xx號'),
(17, 'rose@yahoo.com.tw', '45e827f8fa10aed21ec1224ba9e108788a00531b', 'Rose', '09721234', '304新竹縣新豐鄉新興路189號'),
(18, 'violet@yahoo.com.tw', '73aa53c96c77dd7ef27997087e258ffb7ad41fe2', '賣當當', '0977', '新竹縣新豐鄉新興路400號'),
(19, 'w19@yahoo.com.tw', 'dd94709528bb1c83d08f3088d4043f4742891f4f', '王蛋糕', '02456123', '嘉義縣'),
(21, 'Peach@gmail.com', '82cee22cfe9973906e43f27987e016eda3fb0d4f', '陶子', '0972', '南投'),
(24, 'kevin820422@gmail.co', 'dd94709528bb1c83d08f3088d4043f4742891f4f', '許金魚', '0919006422', '水上鄉'),
(26, 'morg@gmail.com', 'dd94709528bb1c83d08f3088d4043f4742891f4f', '陳旦塔', '111', '111111111111');

-- --------------------------------------------------------

--
-- 資料表結構 `restaurant`
--

CREATE TABLE `restaurant` (
  `sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `open_time` varchar(255) DEFAULT NULL,
  `web` varchar(255) DEFAULT NULL,
  `food_style` varchar(255) DEFAULT NULL,
  `intro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `restaurant`
--

INSERT INTO `restaurant` (`sid`, `name`, `phone`, `address`, `open_time`, `web`, `food_style`, `intro`) VALUES
(1, '香色 Xiang Se', '(02)2358-819', '台北市中正區湖口街 1-2 號 1 樓', '週二至週四 17:30 - 22:00（晚餐） / 週五 17:30 - 22:30（晚餐）/ 週六 11:30 -15:00 / 17:30 - 22:30 / 週日 11:30 -15:00 / 17:30 - 22:00', 'https://www.facebook.com/xiangse/ ', '3', '我們的餐點是融合亞洲風味的西式料理。\r\n在這裡我們提供質樸、精緻、實在的食物。品嚐料理的同時，也品味室內的細緻氛圍。'),
(2, '屋頂上的貓', '0961-173-451', '台北市信義區逸仙路 32 巷 9 號 1 樓', '採預約制，12:00（午餐）/ 19:00（晚餐）', 'https://www.facebook.com/RPLesChats/ \n', '3', '愛貓人必去，包裹著濃厚人情的私房菜。'),
(3, 'Le Duet 198', '(02)2737-5865', '台北市大安區通化街 198 號', '採預約制', 'https://www.facebook.com/LeDuet198/', '3, 4, 302', '浪漫的法式風格又帶點強烈的日式職人精神。\nLe Duet 198 提供日法無菜單料理，並依照你的忌口過敏食材調整菜單。'),
(4, ' 南村｜私廚•小酒棧', '(02)2711-7272', '台北市大安區忠孝東路四段 216 巷 33 弄 10 號', '週一至週日 11:30 - 22:30', 'https://www.facebook.com/44svbistro/ ', '2', '滿懷暖意的眷村好味。'),
(5, '十得私廚 10 - de restaurant', '(02)2771-2033', '台北市大安區敦化南路一段 236 巷 29 號', '週一至週日 11:30 - 14:30 / 17:30 - 21:30', 'https://www.facebook.com/restaurant10de/ ', '1', '融合創意手法的新樣台菜。'),
(6, '裸食私廚 Nakedfood', '(02)2396-2202', '台北市中正區新生南路一段 160 巷 22-1 號', '週三至五 12:00 - 21:00 / 週六、日 11:00 - 21:00 / 週一、二休', 'https://www.facebook.com/nkdfood/', '3, 304', '集結裸食、純素與選物的複合式餐廳。'),
(7, '滕老私廚', '0931-501-944', '台北市文山區木新路三段 403 號', '週一至週日 12:00 - 15:00 / 18:00 - 21:00 ', '無', '1', '超豐盛辦桌型手路菜。'),
(8, '老傢俬.房', '詳洽粉絲專頁詢問，0938-776-751', '台北市中正區', '週一至週日 12:00 - 14:00 / 18:30 - 21:30', 'https://www.facebook.com/jimmy0218/', '3', '滿佈植栽的寫意食空間。'),
(9, 'WA 私廚', '0975-337-747', '台北市松山區南京東路五段 59 巷 31 弄', '採預約制（僅週四、週五接受訂位）', 'https://www.facebook.com/wahome1402/ ', '3', '一享小夫妻的細緻初心。\n一間小公寓，一個小廚房，一張八人餐桌，一次一組客人，一場美味體驗\n這是我們的家，也是專屬於你的聚會場所。\nOur house is open for you~來我家吃飯吧！'),
(10, '刀叉私廚 La maison de meisung', '(02)2557-5448', '台北市大同區涼州街 2-8 號 2 樓', '週一至週日 11:00 - 23:00', 'https://www.facebook.com/LaMaisonDeMeisung/ ', '1, 3', '嚴選當季食材入菜的鮮活態度。'),
(11, '福來許', '(02)2556-2526', '台北市大同區迪化街一段 94 號', '週一至週日 09:00 - 20:00', 'https://www.facebook.com/our.fleisch/ ', '1, 3', '展現中西合併的台式風格菜。'),
(12, '桂香 - 私宅 Flower No\'5 RSVP', '(02)2518-0528', '台北市中山區龍江路', '採預約制，週一至週日 11:59 - 23:00', 'https://www.facebook.com/Flower.N5/ ', '3', '隱身在靜巷裡的絕妙美食。'),
(13, '香頌', '(02)2501-8252', '台北市建國北路二段 52 號', '週一至週日 12:00 - 23:00', 'https://www.facebook.com/chansonbistro/ ', '3', '頂級歐式的餐酒饗宴。'),
(14, 'M Cuisine', '0981-128-913', '台北市大安區和平東路二段 311 巷', '採預約制', 'https://www.facebook.com/MCuisine81/', '3', '絕妙手藝創造對味好料。'),
(15, 'J&J Private Kitchen', '0928-003-333', '台北市松山區健康路 8 巷 1 號', '採預約制', 'https://www.facebook.com/jjprivatekitchen/', '1, 3', '結合中西料理的驚艷之作。'),
(16, '磨子 Mill', '詳洽粉絲專頁詢問', '北市至善路二段449號1樓', '週一至週日 14:00 - 21:00 週二、週三公休', 'https://www.facebook.com/Mill.MoZi/', '3', '用料理豐富每一個日常。'),
(17, '21 料理所', '(02)2703-3791', '台北市大安區四維路 52 巷 22 號', '12:00 - 14:30（午餐）/ 18:00 - 21:30（晚餐）', 'http://www.21-kitchen.com/', '4', '精緻講究的創意日式料理。'),
(19, '歐家宴', '0920-579-977', '台北市中山區民權東路二段 92 巷 7 弄 21 號', '採預約制', 'https://www.facebook.com/oujiayan/ ', '1, 2', '融合廣東、台式的私房手路菜。'),
(20, 'Mama thai 11', '(02)8773-2511', '台北市中山區遼寧街 45 巷 11 號 3 樓', '採預約制，週二、四、五、六 14:00 - 22:00 / 週一、三公休', 'https://www.facebook.com/Mamathai11/ ', '5, 502', '集結泰國家常、小吃的廣域料理。'),
(21, '什物 A Kind of Cafe', '(02)2706-5060', '台北市大安區安和路二段 32 巷', '採預約制，12:00-18:00', 'https://www.facebook.com/akindofcafe/', '3', '販賣家常餐時甜點與雜貨選物，藉由咖啡廳一般的溫暖空間，令人們舒適自在的聚集在一起。'),
(22, '芳庭彼得餐坊', '(02)2781-2758', '台北市大安區忠孝東路四段 40 巷 9 至 13 號', '週一至週日 11:00 - 21:30', 'https://www.facebook.com/fonting20/', '3', '時尚歐式餐廳，邀你品享食物初滋味。'),
(23, '猿人森活 & 海邊的家 Cafe', '(02)2638-0306', '新北市石門區崁子腳 27 號', '週六、日及國定假日 11:00 - 20:00', 'https://www.facebook.com/monkey.style/', '3', '與大海為鄰的藝術餐廚。'),
(24, 'Dining Table 私廚料理', '(02)2626-7575', '新北市淡水區新市一路三段 101 巷 112 號', '採預約制，週一至週日 12:00 - 14:00 / 15:00 - 21:00', 'https://www.facebook.com/diningxtable/', '3', '一再回味的創意經典。'),
(25, '古弟私廚', '(03)336-5767', '桃園市桃園區信光路 91 號', '採預約制，週二至週日 12:00 - 15:00 / 18:00 - 21:00 / 週一公休 ', 'https://www.facebook.com/gutysdulcehogar/', '3', '精緻道地的阿根廷烤肉料理。'),
(26, 'Noi 私廚', '詳洽粉絲專頁詢問', '桃園市中壢區義民路二段 91 號 2 樓', '採預約制', 'https://www.facebook.com/noichefs/', '3, 301', '以台灣在地食材演繹義式風味。'),
(27, 'Doux Innovation 度', '03-2873707', '桃園市中壢區洽溪路 353 號 4F（離高鐵站車程只要2分鐘）', '週一、四至日 12:30 - 16:00 / 18:30 - 21:00 / 週二、週三公休', 'https://www.facebook.com/DouxInnovation/', '3, 5', '揉入世界美味的分子料理。'),
(28, '賣魚郎食酒處', '(03)988-1792', '宜蘭縣礁溪鄉大塭路 16-6 號', '週一、二、五 11:00 - 14:00 / 週六、日 11:00 - 14:30 / 17:00 - 19:00 / 週三、週四公休', 'https://www.facebook.com/dawan1621/timeline', '1', '採養殖鱸鰻入菜的鮮甜魚料理。'),
(29, '小森空間 komori', '0982-036-197', '台中市西區精誠五街 33 號', '採預約制，12:00（午餐）/ 18:00（晚餐）', 'https://www.facebook.com/komorispace/ ', '3', '如歸家用餐的美好時光。'),
(30, '四十巷十八號', '0958-557-277', '台中市太平區永平南路 40 巷 18 號', '採預約制，週六、日', 'https://www.facebook.com/No18.Ln40/', '3', '中西客製的質感美食。'),
(31, '明日餐桌 - dish of tomorrow', '(04)2207-2250', '400 台中市中區三民路二段18巷6號', '週一 12:00 - 14:00 / 週二至週日 12:00 - 14:00 / 17:00 - 20:00', 'https://www.facebook.com/thedishoftomorrow/', '1, 3, 5', '共享剩食的新穎好味道。'),
(32, 'Hero Restaurant', '0966-533-993', '台中市西區五權一街 57 號', '週一、四至日 18:00 - 21:00 / 週二、週三公休', 'https://www.facebook.com/herorestaurant.tw/ ', '1, 3, 4', '堅持產地到餐桌的中西創意菜。'),
(33, '做 純的 私廚無菜單料理', '0963-928-371', '台中市北區自強街 47 巷 46 號', '週一至三、五至日 13:00 - 21:00 / 週四公休', 'https://www.facebook.com/No.4746/', '3', '感受料理與議題的多元純粹。'),
(34, 'Lingo\'s', '(04)2258-2223', '台中市西屯區黎明路二段 891 號', '週一、六 17:00 - 23:30 / 週二至五 11:30 - 14:30 / 18:00 - 22:00 / 週日公休', 'https://www.facebook.com/Lingos-698578813626678/ ', '3, 4', '享用揉合歐、日的佳餚美饌。'),
(35, '花自在食宿館', '0962-061-689', '苗栗市卓蘭鎮西坪里 4 鄰 37-2 號', '週一、二、四至日 18:00 - 23:00 / 週三公休', 'https://www.facebook.com/%E8%8A%B1%E8%87%AA%E5%9C%A8%E9%A3%9F%E5%AE%BF%E9%A4%A8-502663399767428/', '1, 101  ', '兼具禪意、美食的自在之所。'),
(36, '小餐桌．私廚．台南 ', '(06)209-2225', '台南市東區東興路 149 號', '週一、二、五 18:00 - 21:30 / 週六、日 12:00 - 14:30 / 18:00 - 19:30 / 週三、週四公休', 'https://www.facebook.com/%E5%B0%8F%E9%A4%90%E6%A1%8C%E7%A7%81%E5%BB%9A%E5%8F%B0%E5%8D%97-197414173631399/', '1, 3, 301', '亞洲融合餐、義式餐點和台灣料理。'),
(37, '黑拳食室', '0958-681-000', '台南市中西區成功路 387 號 2 樓', '週一、二、四至日 18:00 - 23:00 / 週三公休', 'https://www.facebook.com/%E9%BB%91%E6%8B%B3%E9%A3%9F%E5%AE%A4-1892836431002642/', '3', '貼心男子的私房菜。'),
(38, '胡作室', '詳洽粉絲專頁詢問', '台南市東區前鋒路 24 巷 2 號', '採預約制，皆於 19:00 開始', 'https://www.facebook.com/juliostaste/ ', '3', '食材 x 創意的家庭日常料理。'),
(39, '鰭27', '(07)211-9262', '高雄市苓雅區永明街 27 號 1 樓', '週一、三至日 12:00 - 14:30 / 18:00 - 22:00 / 週二公休', 'https://www.facebook.com/twnsushi27/ ', '4', '品賞江戶前壽司的舌尖魅力。'),
(40, 'NA.KI BISTRO 藍記小館', '(07)346-9080', '高雄市左營區重上街 252 號', '週一至日 11:30 - 23:00', 'https://zh-tw.facebook.com/pages/category/Kitchen-Cooking/NA-KI-%E8%97%8D%E8%A8%98%E7%BE%A9%E5%BC%8F%E9%A3%9F%E5%9D%8A-225598660826538/', '3', '秉持新鮮的無菜單私廚。'),
(41, '好森 Awesome！', '(06)263-5463', '台南市南區鹽埕路 291 巷 94 弄 10 號 3 樓', '採預約制，週二至日 11:00 - 23:00 / 週一公休', 'https://www.facebook.com/TodayAwesome/', '3', '生活 x 料理的美味哲學。'),
(42, '弄 relation', '0988-928-259', '台南市安平區安北路 181 號', '採預約制', 'https://www.facebook.com/dorelationship/', '3', '玩轉味蕾的迴響旅程。'),
(43, '兜齊私廚', '(06)208-9675', '台南市東區東門路一段 263 號', '週一、三至日 09:00 - 21:00 / 週二公休', 'https://zh-tw.facebook.com/%E5%85%9C%E9%BD%8A%E7%A7%81%E5%BB%9A%E8%80%81%E9%97%86%E7%9A%84%E5%90%83%E8%B2%A8%E4%BA%BA%E7%94%9F-374894106048000/', '5', '異國交會的私廚早午餐。'),
(44, '龍私廚義法餐廳', '(03)851-0216', '花蓮縣吉安鄉稻香路 55 號', '採預約制，週二至日 17:00 - 21:00 / 週一公休', 'https://www.facebook.com/Aaronkitchen88/', '3, 301, 302', '豐盛有勁的義式溫度。'),
(45, '四代務農', '0921-750-866', '花蓮縣鳳林鎮大榮里大忠路 1 號', '採預約制，11:00 - 12:30 / 12:30 - 14:00 / 17:00 - 18:30 / 18:30 - 20:00', 'http://www.flfood.com.tw/index.php', '1', '隨性自在的料理餐桌。'),
(46, '鹿野小館', '(08)955-0659', '台東縣鹿野鄉中正路 7 號', '採預約制', 'https://www.facebook.com/pages/Sarconi-Bistro-%E9%B9%BF%E9%87%8E%E5%B0%8F%E9%A4%A8/1378660599060327', '3, 301', '樸實味覺的新創料理'),
(47, '攜蔚 Seaway', '(06)926-8068', '澎湖縣馬公市西衛里 379-7 號', '早餐 07:00 - 09:30 / 午餐 11:30 - 14:00 / 下午茶 14:00 - 16:30 / 晚餐（預約制）', 'https://www.facebook.com/seaway11/ ', '3', '激發味蕾的純粹食體驗'),
(48, '長堤．荇菜廚房', '(08)367-7365', '連江縣東引鄉中柳村 90 號', '週一至週日 11:00 -14:00 / 17:00 - 21:00', 'https://oqenn7.wixsite.com/mulletroecafe', '1, 2, 3', '來東引蹭料理'),
(51, '河邊小屋', '123', '1231231', '123123', 'sldfkjlsdfkdslkfkjsldfjslfkll;dfg;dfkh;gfklh;', '1', '溫馨的小空間'),
(52, '阿方的店', '0919191919', '澎湖', '採預約制', '', '3,4,5', '好吃哦！'),
(53, '測試用餐廳53', '02 1234', '台北市測試用地址', '採預約制', 'website', '102', '測試用餐廳介紹'),
(54, '測試用餐廳54', '02 1234', '台北市測試用地址', '採預約制', 'website', '1, 2', '測試用餐廳介紹'),
(55, 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', '202', 'TEST'),
(56, '阿方的店', 'XXXXXX', '壁櫥', '每周五下午2:00~5:00', '', '1,2', 'hjuiuoi'),
(58, '測試用餐廳57', '02', '台北市測試用地址', '採預約制', '', '1,4,202', '測試用餐廳介紹'),
(59, '頂呱呱', '121312313', '南投', '採預約制', 'sldfkjlsdfkdslkfkjsldfjslfsdf', '304', '好啊！'),
(60, '花花的店', '13445', '台北市文山區汀洲路四段', '採預約制', '', '2,201', '溫馨的小空間。');

-- --------------------------------------------------------

--
-- 資料表結構 `restaurant_photo`
--

CREATE TABLE `restaurant_photo` (
  `sid` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `restaurant_sid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `restaurant_photo`
--

INSERT INTO `restaurant_photo` (`sid`, `file_name`, `restaurant_sid`) VALUES
(3, 'r_2_0.jpg', '2'),
(5, 'r_5_0.jpg', '2'),
(6, 'r_6_0.jpg', '1'),
(7, 'r_7_0.jpg', '4'),
(8, 'r_7_1.jpg', '4'),
(9, 'r_7_2.jpg', '4'),
(10, 'r_10_0.jpg', '8'),
(11, 'r_11_0.jpg', '6'),
(12, 'r_12_0.jpg', '3'),
(13, 'r_12_1.jpg', '3'),
(14, 'r_12_2.jpg', '3'),
(17, 'r_15_0.jpg', '1'),
(20, 'r_18_0.jpg', '1');

-- --------------------------------------------------------

--
-- 資料表結構 `tool`
--

CREATE TABLE `tool` (
  `sid` int(11) NOT NULL,
  `tool_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `tool`
--

INSERT INTO `tool` (`sid`, `tool_name`) VALUES
(1, '電磁爐'),
(2, '瓦斯爐'),
(3, '電鍋'),
(4, '微波爐'),
(5, '旋風爐'),
(6, '大型烤箱'),
(7, '冰箱(配備冷凍庫)'),
(8, '壓力鍋'),
(9, '不鏽鋼盆'),
(10, '砧板'),
(11, '鍋鏟'),
(12, '平底鍋'),
(13, '鐵鍋'),
(14, '刀具'),
(15, '湯勺'),
(16, '電動攪拌器'),
(17, '食物調理機'),
(18, '磨碎器'),
(19, '餐具'),
(20, '篩網'),
(21, '磅秤'),
(22, '果汁機'),
(23, '烤盤'),
(24, '削皮刀'),
(25, '不鏽鋼茶壺'),
(26, '廚具26'),
(27, '廚具27');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `activities_photo`
--
ALTER TABLE `activities_photo`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `add_utensils`
--
ALTER TABLE `add_utensils`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `add_utensils_photo`
--
ALTER TABLE `add_utensils_photo`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `chef`
--
ALTER TABLE `chef`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `chef_photo`
--
ALTER TABLE `chef_photo`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- 資料表索引 `clients_kitchen_pics`
--
ALTER TABLE `clients_kitchen_pics`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `clients_order`
--
ALTER TABLE `clients_order`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `clients_profile_pics`
--
ALTER TABLE `clients_profile_pics`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `cooking_house`
--
ALTER TABLE `cooking_house`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `cooking_house_photo`
--
ALTER TABLE `cooking_house_photo`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `food_set`
--
ALTER TABLE `food_set`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `food_set_class`
--
ALTER TABLE `food_set_class`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `food_set_image`
--
ALTER TABLE `food_set_image`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `food_set_meal`
--
ALTER TABLE `food_set_meal`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `food_set_photo`
--
ALTER TABLE `food_set_photo`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `food_style`
--
ALTER TABLE `food_style`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `restaurant_photo`
--
ALTER TABLE `restaurant_photo`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `tool`
--
ALTER TABLE `tool`
  ADD PRIMARY KEY (`sid`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `activities`
--
ALTER TABLE `activities`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `activities_photo`
--
ALTER TABLE `activities_photo`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `add_utensils`
--
ALTER TABLE `add_utensils`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `add_utensils_photo`
--
ALTER TABLE `add_utensils_photo`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `chef`
--
ALTER TABLE `chef`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `chef_photo`
--
ALTER TABLE `chef_photo`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `clients`
--
ALTER TABLE `clients`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `clients_kitchen_pics`
--
ALTER TABLE `clients_kitchen_pics`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `clients_order`
--
ALTER TABLE `clients_order`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `clients_profile_pics`
--
ALTER TABLE `clients_profile_pics`
  MODIFY `sid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `cooking_house`
--
ALTER TABLE `cooking_house`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `cooking_house_photo`
--
ALTER TABLE `cooking_house_photo`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `food_set`
--
ALTER TABLE `food_set`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `food_set_class`
--
ALTER TABLE `food_set_class`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `food_set_image`
--
ALTER TABLE `food_set_image`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `food_set_meal`
--
ALTER TABLE `food_set_meal`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `food_set_photo`
--
ALTER TABLE `food_set_photo`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `food_style`
--
ALTER TABLE `food_style`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=505;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `restaurant_photo`
--
ALTER TABLE `restaurant_photo`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `tool`
--
ALTER TABLE `tool`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
