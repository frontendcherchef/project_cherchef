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
    $chef = $_POST['chef'];
    $food_style = $_POST['food_style'];
    $food_set_price = $_POST['food_set_price'];
    $food_set_content = $_POST['food_set_content'];

    $result['post'] = $_POST;  // 做 echo 檢查

    if(empty($name) or empty($chef) or empty($food_style) or empty($food_set_price)){
        $result['errorCode'] = 400;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    $sql = "INSERT INTO `food_set`(
            `name`, `chef`, `food_style`, `food_set_price`, `food_set_content`
            ) VALUES (
              ?, ?, ?, ?, ?
            )";

    try {
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $_POST['name'],
            $_POST['chef'],
            $_POST['food_style'],
            $_POST['food_set_price'],
            $_POST['food_set_content'],
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
        $result['error'] = $ex->getMessage();
        $result['errorCode'] = 403;
        $result['errorMsg'] = '重複輸入';
    }
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);

