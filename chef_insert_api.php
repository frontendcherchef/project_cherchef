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
    $tool_name = $_POST['tool_name'];
   
    $result['post'] = $_POST;  // 做 echo 檢查

    if(empty($tool_name)){
        $result['errorCode'] = 400;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    $sql = "INSERT INTO `chef`(
             `name`, 
             `email`, 
             `password`, 
             `mobile`, 
             `birthday`, 
             `title`, 
             `info`, 
             `experience`, 
             `area`, 
             `restaurant`, 
             `own_kitchen`, 
             `tool`, 
             `note`
            ) VALUES (
              ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?
            )";

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
            $_POST['area'],
            $_POST['restaurant'],
            $_POST['own_kitchen'],
            implode(',',$_POST['tool']),
            $_POST['note'],
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

