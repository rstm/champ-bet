<?php


setcookie("user_id", "", time()-3600);
setcookie("username", "", time()-3600);

// unset($_COOKIE['user_id']);
// unset($_COOKIE['username']);
// // $config['cookie_domain']    = "signup.ru";
// // $config['cookie_path']      = "signup.ru";
// setcookie('user_id', '', -1, '/');
// setcookie('username', '', -1, '/');
$home_url = 'http://' . $_SERVER['HTTP_HOST']  . '/signup.ru/index.php';
 header('Location: ' . $home_url);
?>