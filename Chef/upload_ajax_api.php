<?php

$upload_dir = __DIR__. "/pic/uploads/";

header('Content-type: application/json');

$result = [
    'success' => false,
    'filename' => '',
    'info' => '',
];

if(empty($_FILES['my_file'])){
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    exit;
}

$filename = sha1($_FILES['my_file']['name']. uniqid());

switch($_FILES['my_file']['type']){
    case 'image/jpeg':
        $filename .= '.jpg';
        break;
    case 'image/png':
        $filename .= '.png';
        break;
    default:
        $result['info'] = '格式不符';
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
};

$result['filename'] = $filename;
$upload_file = $upload_dir. $filename;

// $sql = "INSERT INTO `clients_profile_pics`(`clients_sid`, `file_name`)
//                         VALUES(
//                           ?, ?)";
// $stmt = $pdo->prepare($sql);

// $stmt->execute([
//     $_POST['clients_sid'],
//     $_POST['file_name']
// ]);


if(move_uploaded_file($_FILES['my_file']['tmp_name'], $upload_file)){
    $result['success'] = true;
} else {
    $result['info'] = '暫存檔無法搬移';
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);
