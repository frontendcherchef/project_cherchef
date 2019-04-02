<?php
require __DIR__. '/connect.php';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入不完整',
    'post' => [], // 做 echo 檢查      
        
];

if(isset($_POST['checkme'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $open_time = $_POST['open_time'];
    $web = $_POST['web'];
    $intro = $_POST['intro'];
    $food_style = empty($_POST['food_style']) ?  [] : $_POST['food_style'];

    $result['post'] = $_POST;  // 做 echo 檢查

    if(empty($name) or empty($phone) or empty($address) or empty($intro)){
        $result['errorCode'] = 400;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    $sql = "INSERT INTO `restaurant`(
            `name`, `phone`, `address`, `open_time`, `web`, `intro`,`food_style`
            ) VALUES (
              ?, ?, ?, ?, ?, ?, ?
            )";

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
        ]);

        if($stmt->rowCount()==1) {
            $result['success'] = true;
            $result['errorCode'] = 200;
            $result['errorMsg'] = '';
        } else {
            $result['errorCode'] = 402;
            $result['errorMsg'] = '資料新增錯誤';
        }
    } catch(PDOException $ex){
        $result['errorCode'] = 403;
        $result['errorMsg'] = '重複輸入';
    }
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);

