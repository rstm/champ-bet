<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ERROR</title>
<link href="style/style1.css" rel="stylesheet">
</head>

 <body>

<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

if ($server != null)
	$dbc = mysqli_connect($server, $username, $password, $db) OR DIE('Ошибка подключения к базе данных');
else
	$dbc = mysqli_connect('localhost', 'root', '', 'lesson') OR DIE('Ошибка подключения к базе данных');

if(isset($_POST['match_id'])){
	$user_id = $_COOKIE['user_id'];
	$match_id = mysqli_real_escape_string($dbc, trim($_POST['match_id']));
	$score1 = mysqli_real_escape_string($dbc, trim($_POST['score1']));
	$score2 = mysqli_real_escape_string($dbc, trim($_POST['score2']));

	if(!empty($match_id) && $score1 != null && $score2 != null && $score1 > -1 && $score2 > -1) {
        $query ="UPDATE `matches` SET score1 = $score1, score2 = $score2 where id = $match_id";
		mysqli_query($dbc,$query);
		mysqli_close($dbc);
	 	header("Location: admin.php");
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