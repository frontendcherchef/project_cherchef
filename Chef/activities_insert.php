<?php
require __DIR__.'/connect.php';


$sql = "INSERT INTO `activities`(`name`, `chef`, `places`, `time`, `duration`, `price`, `content`, `details`,`u_limit`) 
VALUES (?,?,?,?,?,?,?,?,?)";


$res = $pdo->query("SELECT MAX(`sid`) AS maxsid FROM `activities`");
$last_row = $res->fetch(PDO::FETCH_ASSOC);
$last = $last_row['maxsid'];
$last++;


$stmt = $pdo->prepare($sql);
$pdo->beginTransaction();

for($i=1;$i<2;$i++)
{
    $stmt->execute([
        "測試用活動$last",
        '帶領廚師(連結chef表)',
        'test活動地點',
        '2019-05-20',
        'test半天',
        '2000元',
        'test內容',
        'test細節',
        'test人',

    ]);
}

$pdo->commit();


header('Location: '. $_SERVER['HTTP_REFERER']);
?>