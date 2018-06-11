<?php

$dbc = mysqli_connect('localhost', 'root', '', 'lesson') OR DIE('Ошибка подключения к базе данных');
if(isset($_POST['match_id'])){
	$user_id = $_COOKIE['user_id'];
	$match_id = mysqli_real_escape_string($dbc, trim($_POST['match_id']));
	$rate1 = mysqli_real_escape_string($dbc, trim($_POST['rate1']));
	$rate2 = mysqli_real_escape_string($dbc, trim($_POST['rate2']));
	echo $match_id;
	echo "<br>";
	echo $rate1;
	echo "<br>";
	echo $rate2;
	echo "<br>";
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
		echo "упс. что то пошло не так, обратись к Демиду";
	}
}
?>