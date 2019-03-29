<?php
require __DIR__. '/connect.php';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入不完整',
    'post' => [], // 做 echo 檢查      
        
];
$sid = isset($_POST['sid']) ? intval($_POST['sid']) : 0;

if(isset($_POST['name']) and !empty($sid)){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $open_time = $_POST['open_time'];
    $web = $_POST['web'];
    $intro = $_POST['intro'];
    $food_style = $_POST['food_style'] = isset($_POST['food_style']) ? $_POST['food_style']:[];

    $result['post'] = $_POST;  // 做 echo 檢查

    if(empty($name) or empty($phone) or empty($address) or empty($intro)){
        $result['errorCode'] = 400;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    // 1. 修改資料之前先確認該筆資料是否存在
    // 2. name 有沒有跟別筆的資料相同

    $s_sql = "SELECT * FROM `restaurant` WHERE `sid`=?";
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

    $sql = "UPDATE `restaurant` SET 
                `name`=?,
                `phone`=?,
                `address`=?,
                `open_time`=?,
                `web`=?,
                `intro`=?,
                `food_style`=?
                WHERE `sid`=?";

    try {
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $_POST['name'],
            $_POST['phone'],
            $_POST['address'],
            $_POST['open_time'],
            $_POST['web'],
            $_POST['intro'],
            implode(',',$food_style),
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
        $result['errorCode'] = 403;
        $result['errorMsg'] = '資料更新發生錯誤';
    }
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);