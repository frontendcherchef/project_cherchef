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
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $result['post'] = $_POST;  // 做 echo 檢查


    //檢查帳號是否重複$usernameExists = 0;
    $sql = "SELECT * FROM member WHERE email = '$email'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    //
  
    if(empty($email) or empty($password) or empty($password2) or empty($name) or empty($phone) or empty($address)  )
    {
        $result['errorCode'] = 400;
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }

    if($stmt->fetch(PDO::FETCH_ASSOC)!=0) 
    {
        $result['errorMsg'] = '已使用過的Email';
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
      $sql = "INSERT INTO `member`(
            `email`, `password`, `name`, `phone`, `address`
            ) VALUES (
              ?, ?, ?, ?, ?
            )";

        try {
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            $_POST['email'],
            sha1(trim($_POST['password'])),
            $_POST['name'],
            $_POST['phone'],
            $_POST['address'],
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

