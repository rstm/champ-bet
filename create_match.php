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

if(isset($_POST['command1'])){
	$command1 = mysqli_real_escape_string($dbc, trim($_POST['command1']));
	$command2 = mysqli_real_escape_string($dbc, trim($_POST['command2']));

	$input_date = $_POST['match_time'];
	$match_time = date("Y-m-d H:i:s",strtotime($input_date));

	if(!empty($match_time) && !empty($command1) && !empty($command2)) {
		$query ="INSERT INTO `matches` (command1, command2, datetime) VALUES ('$command1', '$command2', '$match_time')";
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