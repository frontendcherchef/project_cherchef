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
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $birthday = $_POST['birthday'];
    $title = $_POST['title'];
    $info = $_POST['info'];
    $experience = $_POST['experience'];
    $area = isset($_POST['area']) ? $_POST['area'] : null;
    $restaurant = isset($_POST['restaurant']) ? $_POST['restaurant'] : null;
    $own_kitchen = isset($_POST['own_kitchen']) ? $_POST['own_kitchen'] : null;
    $tool = empty($_POST['tool']) ?  [] : $_POST['tool'];
    $note = $_POST['note'];

    $result['post'] = $_POST;  // 做 echo 檢查

    if (empty($name)
    or empty($email) or empty($password) or empty($mobile) or empty($birthday) 
    
    ) { $result['errorCode'] = 400;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    // 1. 修改資料之前先確認該筆資料是否存在
    // 2. name 有沒有跟別筆的資料相同

    $s_sql = "SELECT * FROM `chef` WHERE `sid`=?";
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

    $sql = "UPDATE `chef` SET
             `name`=?, 
             `email`=?, 
             `password`=?, 
             `mobile`=?, 
             `birthday`=?, 
             `title`=?, 
             `info`=?, 
             `experience`=?, 
             `area`=?, 
             `restaurant`=?, 
             `own_kitchen`=?, 
             `tool`=?,
             `note`=? 
                WHERE `sid`=?";

    try {
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $_POST['name'],
            $_POST['email'],
            $_POST['password'],
            $_POST['mobile'],
            $_POST['birthday'], 
            $_POST['title'],
            $_POST['info'],
            $_POST['experience'],
            implode(',',$area),
            $restaurant,
            $own_kitchen,
            implode(',',$tool),
            $_POST['note'],
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