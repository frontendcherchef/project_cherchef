<?php
session_start();

unset($_SESSION['user']);
unset($_SESSION['admin']);
if(isset($_SERVER['HTTP_REFERER'])){
   // header('Location: '. $_SERVER['HTTP_REFERER']);
    header('Location: ./');
} else {
    header('Location: ./');
}

