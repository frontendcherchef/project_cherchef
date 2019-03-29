<?php
require __DIR__.'/connect.php';


$sql =  "INSERT INTO `restaurant`(
    `name`, `phone`, `address`, `open_time`, `web`, `intro`,`food_style`
    ) VALUES (
      ?, ?, ?, ?, ?, ?, ?
    )";

$res = $pdo->query("SELECT MAX(`sid`) AS maxsid FROM `restaurant`");
$last_row = $res->fetch(PDO::FETCH_ASSOC);
$last = $last_row['maxsid'];
$last++;


$stmt = $pdo->prepare($sql);
$pdo->beginTransaction();

for($i=1;$i<2;$i++)
{
    $stmt->execute([
        "測試用餐廳$last", //資料內容不能重複的欄位，要加上$last
        '02 1234',
        '台北市測試用地址',
        '採預約制',
        'website',
        '測試用餐廳介紹',
        '1, 2'
    ]);
}

$pdo->commit();

// $sql ="INSERT INTO `restaurant` (`name`, `phone`, `address`, `open_time`, `web`, `intro`,`food_style`)
//   VALUES ('測試用料理空間','02 1234','台北市測試用地址','website','測試用料理空間介紹')";

header('Location: '. $_SERVER['HTTP_REFERER']); //這個應該要去最後一頁啊！
?>