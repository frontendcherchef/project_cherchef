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
    $places = $_POST['places'];
    $time = $_POST['time'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];
    $content = $_POST['content'];
    $details = $_POST['details'];
    $u_limit = $_POST['u_limit'];


    $result['post'] = $_POST;  // 做 echo 檢查

    if(empty($name) or empty($chef) or empty($places) or empty($time) or empty($price) or empty($u_limit)){
        $result['errorCode'] = 400;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    
    $sql = "INSERT INTO `activities`(`name`, `chef`, `places`, `time`, `duration`, `price`, `content`, `details`, `u_limit`) 
    VALUES (?,?,?,?,?,?,?,?,?)";
    
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
             $_POST['u_limit'],
             
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

