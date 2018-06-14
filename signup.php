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
  
if(isset($_POST['submit'])){
	$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
	$password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
	$password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
	if(!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
		$query = "SELECT * FROM `signup` WHERE username = '$username'";
		$data = mysqli_query($dbc, $query);
		if(mysqli_num_rows($data) == 0) {
			$query ="INSERT INTO `signup` (username, password) VALUES ('$username', '$password2')";
			mysqli_query($dbc,$query);
			echo 'Всё готово, можете <a href="index.php">авторизоваться</a>';
			mysqli_close($dbc);
			exit();
		}
		else {
			echo 'Логин уже существует';
		}

	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Authorization badge</title>
<link href="style/style.css" rel="stylesheet">
</head>

  <body>
  <div class="ribbon"></div>
  <div class="login">
  <h1>Добро пожаловать!</h1>
  <p>Чемпионат мира 2018</p>

  <content>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<div class="input">
<div class="blockinput">
        <i class="icon-envelope-alt"></i><label for="username"></label>
	<input type="text" name="username" placeholder="Введите никнейм">
      </div>


      <div class="blockinput">
        <i class="icon-unlock"></i><label for="password"></label>
	<input type="password" name="password1" placeholder="Введите пароль">
      </div>

      <div class="blockinput">
        <i class="icon-unlock"></i><label for="password"></label>
	<input type="password" name="password2" placeholder="Повторите пароль">
      </div>


    </div>
    <button type="submit" name="submit">Регистрация</button>
  </form>
  </content>
  </div>
</body>
  
  
</body>
</html>