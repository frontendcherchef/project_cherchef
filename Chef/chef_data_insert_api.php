<?php
require __DIR__ . '/connect.php';

header('Content-Type: application/json');

$result = [
    'success' => false,
    'errorCode' => 0,
    'errorMsg' => '資料輸入不完整',
    'post' => [], // 做 echo 檢查      

];

if(isset($_POST['checkme'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $birthday = $_POST['birthday'];
    $title = $_POST['title'];
    $info = $_POST['info'];
    $experience = $_POST['experience'];
    $area = empty($_POST['area']) ?  [] : $_POST['area'];
    $restaurant = isset($_POST['restaurant']) ? $_POST['restaurant'] : null;
    $own_kitchen = isset($_POST['own_kitchen']) ? $_POST['own_kitchen'] : null;
    $tool = empty($_POST['tool']) ?  [] : $_POST['tool'];
    $note = $_POST['note'];
    
    $result['post'] = $_POST;  // 做 echo 檢查

    if (empty($name)
     or empty($email) or empty($password) or empty($mobile) or empty($birthday)

     ) {
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
            implode(',',$area),
            $restaurant,
            $own_kitchen,
            implode(',',$tool),
            $_POST['note'],
        ]);

        if ($stmt->rowCount() == 1) {
            $result['success'] = true;
            $result['errorCode'] = 200;
            $result['errorMsg'] = '';
        } else {
            $result['errorCode'] = 402;
            $result['errorMsg'] = '資料新增錯誤';
        }
    } catch (PDOException $ex) {
        $result['error'] = $ex->getMessage();
        $result['errorCode'] = 403;
        $result['errorMsg'] = '重複輸入';
    }
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);