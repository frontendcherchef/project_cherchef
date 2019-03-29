<?php
require __DIR__. '/connect.php';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入不完整',
    'post' => [], // 做 echo 檢查      
        
];
$sid = ($_SESSION['user'] ['sid']) ? intval($_SESSION['user'] ['sid']) : 0;

if(isset($_POST['name']) and !empty($sid)){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $result['post'] = $_POST;  // 做 echo 檢查

    if(empty($name) or empty($phone)){
        $result['errorCode'] = 400;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }


    $s_sql = "SELECT * FROM `member` WHERE `sid`=?";
    $s_stmt = $pdo->prepare($s_sql);
    $s_stmt->execute([$sid]);

    switch($s_stmt->rowCount()){
        case 0:
            $result['errorCode'] = 410;
            $result['errorMsg'] = '該筆資料不存在';
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
            exit;
            //break;
        case 1:
            $row = $s_stmt->fetch(PDO::FETCH_ASSOC);
            if($row['sid']!=$sid){
                $result['errorCode'] = 430;
                $result['errorMsg'] = '該筆資料不存在';
                echo json_encode($result, JSON_UNESCAPED_UNICODE);
                exit;
            }
    }

    
    $sql = "UPDATE `member` SET 
                `name`=?,
                `phone`=?,
                `address`=?
                WHERE `sid`=?";

try {
$stmt = $pdo->prepare($sql);

$stmt->execute([
    $_POST['name'],
    $_POST['phone'],
    $_POST['address'],
    $sid
]);


if($stmt->rowCount()==1) {
$result['success'] = true;
$result['errorCode'] = 200;
$result['errorMsg'] = '';
} else {
$result['errorCode'] = 402;
$result['errorMsg'] = '資料沒有修改';
}
} catch(PDOException $ex){
$result['error'] =$ex->getMessage();
$result['errorCode'] =$stmt->rowCount();
$result['errorMsg'] = '資料更新發生錯誤';
}

}

echo json_encode($result, JSON_UNESCAPED_UNICODE);