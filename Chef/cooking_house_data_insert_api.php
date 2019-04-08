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
    $web = $_POST['web'];
    $intro = $_POST['intro'];

    $result['post'] = $_POST;  // 做 echo 檢查
  
    if(empty($name) or empty($phone) or empty($address) or empty($intro)  )
    {
        $result['errorCode'] = 400;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }
    if(mb_strlen($name)<2)
    {  
        $result['errorMsg'] = '料理空間名稱需大於2字';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;

    } 
    if(strlen($address)<10)
    {
        $result['errorMsg'] = '地址需大於10字';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }
    else
    {



      $sql = "INSERT INTO `cooking_house`(
            `name`, `phone`, `address`, `web`, `intro`
            ) VALUES (
              ?, ?, ?, ?, ?
            )";

        try {
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $_POST['name'],
            $_POST['phone'],
            $_POST['address'],
            $_POST['web'],
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
        $result['error'] =$ex->getMessage();
        $result['errorCode'] = 403;
        $result['errorMsg'] = '重複輸入';
    }
}
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);

