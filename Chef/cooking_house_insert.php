<?php
require __DIR__.'/connect.php';


$sql = "INSERT INTO `cooking_house` 
(`name`, `phone`, `address`, `web`, `intro`)
VALUES(?,?,?,?,?)";

$res = $pdo->query("SELECT MAX(`sid`) AS maxsid FROM `cooking_house`");
$last_row = $res->fetch(PDO::FETCH_ASSOC);
$last = $last_row['maxsid'];
$last++;


$stmt = $pdo->prepare($sql);
$pdo->beginTransaction();

for($i=1;$i<2;$i++)
{
    $stmt->execute([
        "測試用料理空間$last",
        '0972',
        '台北市測試用地址xx路xx號',
        'website',
        '測試用料理空間介紹'
    ]);
}

$pdo->commit();

// $sql ="INSERT INTO `cooking_house` (`name`, `phone`, `address`, `web`, `intro`)
//   VALUES ('測試用料理空間','02 1234','台北市測試用地址','website','測試用料理空間介紹')";

header('Location: '. $_SERVER['HTTP_REFERER']);
?>