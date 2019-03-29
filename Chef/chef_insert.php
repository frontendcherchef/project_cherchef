<?php
require __DIR__.'/connect.php';


$sql = "INSERT INTO `chef`(
             `name`, 
             `email`, 
             `password`, 
             `mobile`, 
             `birthday`, 
             `title`, 
             `info`, 
             `experience`, 
             `area`, 
             `restaurant`, 
             `own_kitchen`, 
             `tool`, 
             `note`
            ) VALUES (
              ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?
            )";


$res = $pdo->query("SELECT MAX(`sid`) AS maxsid FROM `chef`");
$last_row = $res->fetch(PDO::FETCH_ASSOC);
$last = $last_row['maxsid'];
$last++;


$stmt = $pdo->prepare($sql);
$pdo->beginTransaction();

for($i=1;$i<2;$i++)
{
    $stmt->execute([
        "Chef No.$last",
        "chefn$last@.cherchef.com",
        'admin',
        '0912520520', 
        '1985-03-20', 
        '高級廚師', 
        'Biography', 
        "飯店大廚 10年", 
        'A', 
        '1', 
        '1', 
        '1,3,5,7,9', 
        '廚師備註'
    ]);
}

$pdo->commit();

// $sql ="INSERT INTO `chef` (`name`, `phone`, `address`, `web`, `intro`)
//   VALUES ('測試用料理空間','02 1234','台北市測試用地址','website','測試用料理空間介紹')";

header('Location: '. $_SERVER['HTTP_REFERER']);
?>