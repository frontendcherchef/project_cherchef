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
    $clients = $_POST['clients'];
    $name = $_POST['name'];
    $rent = $_POST['rent'];
    $price = $_POST['price'];
    $details = $_POST['details'];
    $intro = $_POST['intro'];


    $result['post'] = $_POST;  // 做 echo 檢查

    
    if(empty ($clients) or empty($name) or empty($rent) or empty($price) or empty($details) or empty($intro)){
        $result['errorCode'] = 400;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }


    $sql = "INSERT INTO `add_utensils`(
            `clients`,`name`, `rent`, `price`, `details`, `intro`
            ) VALUES (
              ?, ?, ?, ?, ?, ?
            )";

    try {
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $_POST['clients'],
            $_POST['name'],
            $_POST['rent'],
            $_POST['price'],
            $_POST['details'],
            $_POST['intro'],
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

