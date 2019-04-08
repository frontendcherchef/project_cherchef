<?php

require __DIR__. '/connect.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

$pdo->query("DELETE FROM `clients_order` WHERE `sid`=$sid");

$goto = 'clients_order.php'; // 預設值

if (isset($_SERVER['HTTP_REFERER'])){
    $goto = $_SERVER['HTTP_REFERER'];
}

header("Location: $goto");