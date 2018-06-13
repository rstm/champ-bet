<?php


setcookie("user_id", "", time()-3600);
setcookie("username", "", time()-3600);

// $home_url = 'http://' . $_SERVER['HTTP_HOST']  . '/signup.ru/index.php';
 header('Location: index.php');
?>