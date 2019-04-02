<?php
require __DIR__. '/connect.php';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => '0',
    'errorMsg' => '資料輸入不完整',
    'post' => []
];

$sid = isset($_POST['sid']) ? intval($_POST['sid']) : 0;

if (isset($_POST['checkme'])) {

    $name = $_POST['name'];
//    $gender = $_POST['gender'];
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
    // TODO:檢查mobile長度


    $sql = "INSERT INTO `clients`(`name`, `mobile`, `email`, `password`, `address`, `birthday`)
                        VALUES(
                          ?, ?, ?, ?, ?, ?
                        )";

    try {

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $_POST['name'],
//            $_POST['gender'],
            $_POST['mobile'],
            $_POST['email'],
            $_POST['password'],
            $_POST['address'],
            $_POST['birthday'],

        ]);

        if ($stmt->rowCount() == 1) {
            $result['success'] = true;
            $result['errorCode'] = 200;
            $result['errorMsg'] = '';
        } else {
            $result['errorCode'] = 400;
            $result['errorMsg'] = '資料輸入錯誤';
        }
    } catch (PDOException $ex) {
        $result['errorCode'] = 401;
        $result['errorMsg'] = '該Email已經存在';
    }
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);
