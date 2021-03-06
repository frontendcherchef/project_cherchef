<?php
require __DIR__ . '/connect.php';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入不完整',
    'post' => [], // 做 echo 檢查      

];
$sid = isset($_POST['sid']) ? intval($_POST['sid']) : 0;

if (isset($_POST['name']) and !empty($sid)) {


    $name = $_POST['name'];
    $chef = $_POST['chef'];
    $places = $_POST['places'];
    $time = $_POST['time'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];
    $content = $_POST['content'];
    $details = $_POST['details'];
    $act_pics = $_POST['act_pics'];
    $u_limit = $_POST['u_limit'];


    $result['post'] = $_POST;  // 做 echo 檢查

    if (empty($name) or empty($chef) or empty($price) or empty($content)) {
        $result['errorCode'] = 400;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    // 1. 修改資料之前先確認該筆資料是否存在
    // 2. name 有沒有跟別筆的資料相同

    $s_sql = "SELECT * FROM `activities` WHERE `sid`=?";
    $s_stmt = $pdo->prepare($s_sql);
    $s_stmt->execute([$sid]);

    switch ($s_stmt->rowCount()) {
        case 0:
            $result['errorCode'] = 410;
            $result['errorMsg'] = '該筆資料不存在';
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
            exit;
            //break;
        case 1:
            $row = $s_stmt->fetch(PDO::FETCH_ASSOC);
            if ($row['sid'] != $sid) {
                $result['errorCode'] = 430;
                $result['errorMsg'] = '該筆資料不存在';
                echo json_encode($result, JSON_UNESCAPED_UNICODE);
                exit;
            }
    }


    $sql = "UPDATE `activities` SET 
                `name`=?,
                `chef`=?,
                `places`=?,
                `time`=?,
                `duration`=?,
                `price`=?,
                `content`=?,
                `details`=?,
                `act_pics`=?,
                `u_limit`=?  
                WHERE `sid`=?";

    try {
        $stmt = $pdo->prepare($sql);


        $stmt->execute([
            $_POST['name'],
            $_POST['chef'],
            $_POST['places'],
            $_POST['time'],
            $_POST['duration'],
            $_POST['price'],
            $_POST['content'],
            $_POST['details'],
            $_POST['act_pics'],
            $_POST['u_limit'],
            $sid
        ]);

        if ($stmt->rowCount() == 1) {
            $result['success'] = true;
            $result['errorCode'] = 200;
            $result['errorMsg'] = '';
        } else {
            $result['errorCode'] = 402;
            $result['errorMsg'] = '資料沒有修改';
        }
    } catch (PDOException $ex) {
        $result['errorCode'] = 403;
        $result['errorMsg'] = '資料更新發生錯誤';
    }
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);

