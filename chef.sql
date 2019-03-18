-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2019 at 09:48 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chef`
--

-- --------------------------------------------------------

--
-- Table structure for table `cooking_house`
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
-- Dumping data for table `cooking_house`
--

INSERT INTO `cooking_house` (`sid`, `name`, `phone`, `address`, `web`, `intro`) VALUES
(1, 'YAMICOOK美食廚藝教室', '02 2777', '104台北市中山區長安東路二段', 'https://www.yamicook.com/', '以美食的誘惑力觸動更多創意的活動空間。可成為一處您專屬的私人招待所，享受名師名廚的手藝佳餚。'),
(2, '料理生活家', '02 2888', '106台北市大安區青田街一巷', 'http://www.4fcookinghome.com/', '成立於2008，COOKING HOME用迎接朋友的態度來歡迎每一位學員。希望大家可以來這邊放鬆地一起做料理，打造一個不同於「烹飪教室」的「料理生活家」概念。'),
(3, 'NC5 Studio料理空間', '02 2541', '104台北市中山區民生東路一段', 'https://www.facebook.com/NC5Studio/', '沒有城市裡過度的繁華喧嘯，提供的只有最單純樸真的食材、健康美味的料理方式，伴隨著佳餚和花草芬芳香氣，以最熱情的心迎接喜愛品味美食以及尋找生活美學的朋友道訪，一同探索與體驗慢活的生命悸動。'),
(4, '不丹幸福空間', '02 2758', '110台北市信義區光復南路421巷', 'http://tw-bhutan.blogspot.com/', '「人如其食」（You are what you eat.），讓天然、無汙染、自然有機的生活態度，使我們的健康與美味、品味同進！'),
(5, '「台北發生」文創空間', '02 2105', '114台北市內湖區內湖路一段', 'http://www.taipeiing.com/', '「台北發生」，一個全新模式的文創空間，一個「吃、喝、玩、創」的新所在，一個文化雜食者的娛樂道場…Let\'s eat · drink · play · create！'),
(6, '山渡空間食藝', '03 9321', '260宜蘭縣宜蘭市健康路一段', 'https://www.facebook.com/feed.art.88', '\"支付訂金帳戶：代碼\r\n帳號:4202 \r\n帳戶名：山渡空間食\r\n親愛的貴賓如您匯款成功煩請來電告知櫃檯人員\"'),
(7, '小器生活料理教室', '02 2552', '103台北市大同區赤峰街23巷', 'https://www.facebook.com/xiaoqicooking', '尋常生活中的幸福感，就從自己親手做的一餐開始。'),
(8, '測試用料理空間', '02 1234', '台北市測試用地址', 'website', '測試用料理空間介紹'),
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
(71, '測試用料理空間71', '02 1234', '台北市測試用地址', 'website', '測試用料理空間介紹');

-- --------------------------------------------------------

--
-- Table structure for table `cooking_house_photo`
--

CREATE TABLE `cooking_house_photo` (
  `sid` int(255) NOT NULL,
  `cooking_house_sid` int(255) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cooking_house_photo`
--

INSERT INTO `cooking_house_photo` (`sid`, `cooking_house_sid`, `file_name`) VALUES
(1, 1, 'c_h_00_000'),
(2, 1, 'c_h_00_001');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `sid` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`sid`, `email`, `password`, `name`) VALUES
(1, 'morg@gmail.com', 'adminadmin', '陳蛋塔');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cooking_house`
--
ALTER TABLE `cooking_house`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `cooking_house_photo`
--
ALTER TABLE `cooking_house_photo`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cooking_house`
--
ALTER TABLE `cooking_house`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `cooking_house_photo`
--
ALTER TABLE `cooking_house_photo`
  MODIFY `sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
