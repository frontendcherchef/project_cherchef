<?php
require __DIR__. '/connect.php';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入不完整',
    'post' => []
];

// 三元運算子，sid有POST的話，會拿到sid的整數值(intval)，否則拿到0(false)
$sid = isset($_POST['sid']) ? intval($_POST['sid']) : 0;

if (isset($_POST['name']) and !empty($sid)) {

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $birthday = $_POST['birthday'];


    $result['post'] = $_POST; // 做 echo 檢查

    // empty()，括號內的值若為空會拿到true
    if (empty($name) or empty($email) or empty($mobile) or empty($password) or empty($address) or empty($birthday)){
        $result['errorCode'] = 400;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    // TODO:檢查name長度


    // 檢查email格式
    if (! filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result['errorCode'] = 402;
        $result['errorMsg'] = 'Email格式有誤';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    // 1. 修該資料之前可以先確認該筆資料是否存在
    // 2. Email 有沒有跟別筆的資料相同

    $s_sql = "SELECT * FROM `clients` WHERE `sid`=? OR `email`=?";
    $s_stmt = $pdo->prepare($s_sql);
    $s_stmt->execute([$sid, $_POST['email']]);

    switch ($s_stmt->rowCount()){
        case 0:
            $result['errorCode'] = 410;
            $result['errorMsg'] = '該筆資料不存在';
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
            exit;
        case 2:
            $result['errorCode'] = 420;
            $result['errorMsg'] = '該Email已被註冊';
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
            exit;
        case 1:
            $row = $s_stmt->fetch(PDO::FETCH_ASSOC);
            if ($row['sid']!=$sid){
                $result['errorCode'] = 430;
                $result['errorMsg'] = '該筆資料不存在';
                echo json_encode($result, JSON_UNESCAPED_UNICODE);
                exit;
            }
    }

    // TODO:檢查mobile長度


    $sql = "UPDATE `clients` SET 
                        `name`=?,
                        `mobile`=?,
                        `email`=?,
                        `password`=?,
                        `address`=?,
                        `birthday`=?
                        WHERE `sid`=?";

    try {

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $_POST['name'],
            $_POST['mobile'],
            $_POST['email'],
            $_POST['password'],
            $_POST['address'],
            $_POST['birthday'],
            $sid
        ]);

        if ($stmt->rowCount() == 1) {
            $result['success'] = true;
            $result['errorCode'] = 200;
            $result['errorMsg'] = '';
        } else {
            $result['errorCode'] = 400;
            $result['errorMsg'] = '資料沒有修改';
        }
    } catch (PDOException $ex) {
        $result['errorCode'] = 401;
        $result['errorMsg'] = '資料更新發生錯誤';
    }
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);
