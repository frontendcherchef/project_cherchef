<?php
require __DIR__.'/connect.php';


$sql = "INSERT INTO `add_utensils`(
        `clients`,`name`, `rent`, `price`, `quantity`, `details`, `intro`
        ) VALUES (
            ?, ?, ?, ?, ?, ?, ?
        )";

$res = $pdo->query("SELECT MAX(`sid`) AS maxsid FROM `add_utensils`");
$last_row = $res->fetch(PDO::FETCH_ASSOC);
$last = $last_row['maxsid'];
$last++;


$stmt = $pdo->prepare($sql);
$pdo->beginTransaction();

for($i=1;$i<2;$i++)
{
    $stmt->execute([
        "測試會員編號$last",
        '測試餐具組',
        '測試200',
        '測試1900',
        '測試2',
        '測試詳細資訊',
        '測試商品特色'
    ]);
}

$pdo->commit();

header('Location: '. $_SERVER['HTTP_REFERER']);
?>