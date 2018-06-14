<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ERROR</title>
<link href="style/style1.css" rel="stylesheet">
</head>

 <body>

<?php

$dbc = mysqli_connect('localhost', 'root', '', 'lesson') OR DIE('Ошибка подключения к базе данных');
if(isset($_POST['match_id'])){
	$user_id = $_COOKIE['user_id'];
	$match_id = mysqli_real_escape_string($dbc, trim($_POST['match_id']));
	$rate1 = mysqli_real_escape_string($dbc, trim($_POST['rate1']));
	$rate2 = mysqli_real_escape_string($dbc, trim($_POST['rate2']));

	if(!empty($match_id) && $rate1 != null && $rate2 != null && $rate1 > -1 && $rate2 > -1) {
		$query = "SELECT * FROM `rates` WHERE match_id = $match_id and user_id = $user_id";
		$data = mysqli_query($dbc, $query);
		if(mysqli_num_rows($data) == 0) {
			$query ="INSERT INTO `rates` (user_id, match_id, rate1, rate2) VALUES ('$user_id', '$match_id', '$rate1', '$rate2')";
		 } else {
			$query ="UPDATE `rates` SET rate1 = $rate1, rate2 = $rate2 where match_id = $match_id and user_id = $user_id";
		 }
		mysqli_query($dbc,$query);
		mysqli_close($dbc);
		$home_url = 'http://' . $_SERVER['HTTP_HOST']  . '/signup.ru/index.php';
	 	header('Location: ' . $home_url);
	}
	else {
		echo "<h2>Ошибка, попробуйте ещё раз! </h2>";
		echo "<div class='a2'>1)Возможно вы не ввели одно из значений</div>";
		echo "<div class='a2'>2)Возможно вы ввели недопустимое значение</div>";
		echo "<div class='a2'>Если не получилось исправить, обратитесь к Демиду!</div>";

	}
}
?>


 
</body>
  
  
</body>
</html>