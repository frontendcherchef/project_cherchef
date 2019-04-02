<?php
require __DIR__. '/connect.php';

header('Content-Type: application/json');
?>
<?php

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入不完整',
    'post' => [], // 做 echo 檢查      
        
];
$sid = isset($_POST['sid']) ? intval($_POST['sid']) : 0;

if(!empty($sid)){
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $result['post'] = $_POST;  // 做 echo 檢查



//
    if(empty($password) or empty($password2) or empty($name) or empty($phone) ){
        $result['errorCode'] = 400;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }
    if(strlen($password)<8 or strlen($password2)<8)
    {
       $result['errorMsg'] = '密碼請輸入八個字以上';
       echo json_encode($result, JSON_UNESCAPED_UNICODE);
       exit;

    }
    if($password!=$password2)
    {
        $result['errorMsg'] = '兩次密碼輸入需相同';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }
    if(mb_strlen($name)<2)
    {  
        $result['errorMsg'] = '名字需大於等於2字';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    } 
    else
    {

        $s_sql = "SELECT * FROM `member` WHERE `sid`=?";
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

        $sql = "UPDATE `member` SET 
                `password`=?,
                `name`=?,
                `phone`=?,
                `address`=? 
                WHERE `sid`=?";

      try {
          $stmt = $pdo->prepare($sql);

          $stmt->execute([
            sha1(trim($_POST['password'])),
            $_POST['name'],
            $_POST['phone'],
            $_POST['address'],
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
            $result['error'] =$ex->getMessage();
             $result['errorCode'] = 403;
             $result['errorMsg'] = '資料更新發生錯誤';
        }
    }
    
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);