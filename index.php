
<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="ru">
<!--<![endif]-->
<script type="text/javascript">
function clock() {
var d = new Date();
var month_num = d.getMonth()
var day = d.getDate();
var hours = d.getHours();
var minutes = d.getMinutes();
var seconds = d.getSeconds();

month=new Array("января", "февраля", "марта", "апреля", "мая", "июня",
"июля", "августа", "сентября", "октября", "ноября", "декабря");

if (day <= 9) day = "0" + day;
if (hours <= 9) hours = "0" + hours;
if (minutes <= 9) minutes = "0" + minutes;
if (seconds <= 9) seconds = "0" + seconds;

date_time = day + " " + month[month_num] + " " + d.getFullYear() +
" г.&nbsp;&nbsp;&nbsp;"+ hours + ":" + minutes + ":" + seconds;
if (document.layers) {
 document.layers.doc_time.document.write(date_time);
 document.layers.doc_time.document.close();
}
else document.getElementById("doc_time").innerHTML = date_time;
 setTimeout("clock()", 1000);
}
</script>
<head>
	<meta charset="utf-8" />

	<title>ЧМ 2018</title>
	<meta content="" name="description" />
	<meta content="" property="og:image" />
	<meta content="" property="og:description" />
	<meta content="" property="og:site_name" />
	<meta content="website" property="og:type" />

	<meta content="telephone=no" name="format-detection" />
	<meta http-equiv="x-rim-auto-match" content="none">

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="shortcut icon" href="favicon.png" />

	<link rel="stylesheet" href="libs/bootstrap/bootstrap-grid-3.3.1.min.css" />
	<link rel="stylesheet" href="libs/font-awesome-4.2.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="libs/fancybox/jquery.fancybox.css" />
	<link rel="stylesheet" href="libs/owl-carousel/owl.carousel.css" />
	<link rel="stylesheet" href="libs/countdown/jquery.countdown.css" />
	<link rel="stylesheet" href="css/fonts.css" />
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/media.css" />
	 <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
</head>
<body>
	<div class="error">
	<?php

	$cleardb_url      = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server   = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db       = substr($cleardb_url["path"],1);

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

// $dbc = mysqli_connect('localhost', 'root', '', 'lesson');
$dbc = mysqli_connect($server, $username, $password, $db);
if(!isset($_COOKIE['user_id'])) {
	if(isset($_POST['submit'])) {
		$user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
		$user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
		if(!empty($user_username) && !empty($user_password)) {
			$query = "SELECT `user_id` , `username` FROM `signup` WHERE username = '$user_username' AND password = '$user_password'";
			$data = mysqli_query($dbc,$query);
			if(mysqli_num_rows($data) == 1) {
				$row = mysqli_fetch_assoc($data);
				setcookie('user_id', $row['user_id'], time() + (60*60*24*30));
				setcookie('username', $row['username'], time() + (60*60*24*30));
				// $home_url = 'http://' . $_SERVER['HTTP_HOST']  . '/signup.ru/index.php';
				$home_url = $_SERVER['PHP_SELF'];
 				header('Location: ' . $home_url);
			}
			else {
				echo 'Error_1552 - Неправильный логин/пароль';
			}
		}
		else {
			echo 'Error_228 - Поля входа заполнены неправильно.';
		}
	}
}
?>
</div>
	<header>
		<div class="top_line">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top">
							<strong>Чемпионат мира по футболу 2018</strong>
							<a href="#map">
								<span id="doc_time">Дата и время</span>
							</a>
						</div>
					</div>
					<div class="col-md-3">
					</div>	
				
					<div class="col-md-3">
		<section>
								<?php
									if(empty($_COOKIE['username'])) {
								?>
								    <div class="field">
									<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
										<label for="username">Логин:</label>
									<input type="text" name="username">
									 </div>
									 <div class="field">
									<label for="password">
										Пароль:</label>
									<input type="password" name="password">
									</div>
									 <div class="field">
									<button id="baton2" type="submit" name="submit">Войти</button>
									<a id='a' href="signup.php">Регистрация</a></div>
									</form>
								<?php
								}
								else {0
									?>
									<div class="ex"><a href="exit.php">Выйти (<?php echo $_COOKIE['username']; ?>)</a></div>
								<?php	
								}
								?>
								</section>
			
				
						
								    </div>
									
					</div>	
				</div>s
			</div>
        </div>
	</header>
	<div class="second_line">
		<div class="container">
			<div class="col-md-3"><div class="content">Ближайшие матчи:</div></div>
			<div class="col-md-3">
				<div class="match">
				 14.06.2018 18:00 <br>
				 	<div class="countries">
				 		<img src="img/icons/Russia.png" alt="">Россия<br>
				 		<img src="img/icons/Saudi Arabia.png" alt="">Сауд. Аравия<br>
					</div>
				(Группа А) Матч 1.<br>
				 Москва, «Лужники»
				</div>
			</div>
			<div class="col-md-3">
				<div class="match">
				 15.06.2018 15:00 <br>
				 	<div class="countries">
				 		<img src="img/icons/Egypt.png" alt="">Египет<br>
				 		<img src="img/icons/Uruguay.png" alt="">Уругвай<br>
					</div>
				(Группа А) Матч 2.<br>
				 Екатеринбург, «Екатеринбург арена»
				</div>
			</div>
			<div class="col-md-3">
				<div class="match">
				 15.06.2018 18:00 <br>
				 	<div class="countries">
				 		<img src="img/icons/Morocco.png" alt="">Марокко<br>
				 		<img src="img/icons/Iran.png" alt="">Иран<br>
					</div>
				(Группа В) Матч 3.<br>
				 Санкт-Петербург, «Санкт-Петербург»
				</div>
			</div>
		</div>
	</div>
	<div class="third_line">
		<div class="container">
				<div class="row">
					<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<div class="position">
				<div id="raspisanie2">Турнирная таблица</div>
<?php

 
$query ="SELECT * FROM `signup`";
 
$result = mysqli_query($dbc, $query) or die("Ошибка " . mysqli_error($dbc)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк

    $usernames = array();
    $ratings = array();
    $check_ratings = array();
     
    $i = 0;
    while($user = mysqli_fetch_object($result))
    {
		$rating = 0;
		$query_rate ="SELECT * FROM `rates` where user_id = $user->user_id";
		$result_rate = mysqli_query($dbc, $query_rate) or die("Ошибка " . mysqli_error($dbc)); 
	    while($rate = mysqli_fetch_object($result_rate)) {
			$query_m ="SELECT * FROM `matches` where id = $rate->match_id and score1 is not null and score2 is not null";
			$result_m = mysqli_query($dbc, $query_m) or die("Ошибка " . mysqli_error($dbc)); 
			if($match = mysqli_fetch_object($result_m)) {
        		if ($match->score1 == $rate->rate1 && 
        			$match->score2 == $rate->rate2) 
        		{
        				$rating = $rating + 3;
        		} 
        		else
        		{
	        		if ($match->score1 - $match->score2 ==  $rate->rate1 - $rate->rate2)
	        		{
	        				$rating = $rating + 2;
	        		} 
	        		else
	        		{
	                    if (
	                    	($match->score1 - $match->score2) > 0 &&
	        			   ($rate->rate1 - $rate->rate2) > 0
	        			 or
	        			   ($match->score1 - $match->score2) < 0 &&
	        			   ($rate->rate1 - $rate->rate2) < 0)
	        			{
	        				$rating = $rating + 1;
        				}
	        		}
        		}
			}
	    }
		$usernames[$i] = $user->username;
		$ratings[$i] = $rating;
		$check_ratings[$i] = $rating;
		$i++;
    }


    $sorted_ratings = array();

    for ($i=0; $i < sizeof($ratings); $i++) { 
	    $max = -1;
	    $max_index = $i;
		for ($j=0; $j < sizeof($check_ratings); $j++) { 
			if ($check_ratings[$j] != -1 && $check_ratings[$j] > $max) {
				$max = $check_ratings[$j];
				$max_index = $j;
			}
		}
		$check_ratings[$max_index] = -1;
		$sorted_ratings[$i] = $max_index;
    }
  
    echo "<table class='r1'><tr class='r21'><th>Место</th><th>Никнейм</th><th>Рейтинг</th></tr>";
    for ($i=0; $i < sizeof($sorted_ratings); $i++) { 
    	$k = $sorted_ratings[$i];
    	$number = $i + 1;
    	echo "<tr>";
        
        echo "<td>$number</td>";
        echo "<td>$usernames[$k]</td>";
        echo "<td>$ratings[$k]</td>";
        
        echo "</tr>";
    }


    echo "</table>";
     
    // очищаем результат
    mysqli_free_result($result);
}
 

?>
			
		</div>
	</div>
		<div class="col-md-2">
		</div>

	  
		
	</div>
	<div class="pravila">
	  	Правила: 
	  	<div class="reglament">Точный счёт - 3 очка. <br>
	  	Угаданная разница - 2 очка. <br>
	  	Предсказанный исход матча - 1 очко.</div>
	  </div>
</div>


        	
     </div>

     <div class="forthline">
     	<div class="container">
			<div class="row">
				<div class="col-md-2">
				</div>
     			<div class="col-md-8">
     				<div id="raspisanie">Расписание матчей</div>
				</div>
				<div class="col-md-2">
				</div>
			</div>
		</div>
     	<div class="container">
			<div class="row">
				<div class="col-md-1">
				</div>
     			<div class="col-md-10">
	
<?php

if (isset($_COOKIE['user_id'])) 
{
	?>
		<div class="position">

			<?php
		$user_id = $_COOKIE['user_id'];
		$query ="SELECT * FROM `matches`";
		 
		$result = mysqli_query($dbc, $query) or die("Ошибка " . mysqli_error($dbc)); 
		if($result)
		{
		    $rows = mysqli_num_rows($result); // количество полученных строк
		     
		    echo "<table class='redTable'>";
		    for ($i = 0 ; $i < $rows ; ++$i)
		    {
		    	$match = mysqli_fetch_object($result);

				$query_rate ="SELECT * FROM `rates` where match_id = $match->id and user_id = $user_id";
				$result_rate = mysqli_query($dbc, $query_rate) or die("Ошибка " . mysqli_error($dbc)); 
			    $rate = mysqli_fetch_object($result_rate); // количество полученных строк
			    if ($rate == null) {
			    	$rate = new stdClass();
			    	$rate->rate1 = null;
			    	$rate->rate2 = null;
			    	
			    }
              
				echo "<tr>";


				
		        echo "<td id='match_number'>#$match->id<br>$match->datetime</td>";
		        echo "<td><div><img src=\"/signup.ru/img/icons/$match->command1.png\"></br><div class='match_2'>$match->command1</div></div><br><div class='score'>$match->score1</div>
		        </div></td>";
		        echo "<td><div class='match_3'>VS.</div></td>";
		        echo "<td><div><img src=\"/signup.ru/img/icons/$match->command2.png\"></br><div class='match_2'>$match->command2</div></div><br><div class='score'>$match->score2</div></td>";

		        

		        // echo(date("Y-m-d H:i",time()));
		        // echo "<br>";
		        // echo(date("Y-m-d H:i",strtotime($match->datetime)));
		        // echo "<br>";

		        if (time() < strtotime($match->datetime)) {
		        ?>
				
				<td>
		          	<form method="POST" action="/signup.ru/create_rate.php">
						<input type="hidden" name="match_id" value="<?=$match->id?>">
						<input class="rate-input inputcss" type="number" name="rate1" >-<input class="rate-input inputcss" type="number" name="rate2" ><br>
					    <button id="baton" type="submit" name="submit">Сделать ставку</button>
			  		</form>
			  	</td>

		        <?php
	    		} else echo "<td id='id'>Ставок больше нет</td>";
				 
				 if ($rate->rate1 != null) {echo "<td><div class='moshniydiv'>Ваш прогноз:<br><img class='sizeimg inlineblock' src=\"/signup.ru/img/icons/$match->command1.png\"><div class='prognoz inlineblock'>$rate->rate1 - $rate->rate2</div><img class='sizeimg inlineblock' src=\"/signup.ru/img/icons/$match->command2.png\"></div></td>";} 
				 else echo "<td><div class='moshniydiv'>Ваш прогноз:<br><img class='sizeimg inlineblock' src=\"/signup.ru/img/icons/empty.png\"></div></td>";
				 
				 echo "</tr>";


		    }
		   
		    echo "</table>";

		     
		    // очищаем результат
		    mysqli_free_result($result);
		}
		 
		mysqli_close($dbc);
		?>
		</div>
<?php } else { ?>
	<div class="position"><h2>Для просмотра необходимо авторизоваться!</h2></div>
<?php } ?>
			
		</div>
		<div class="col-md-1">
		</div>

     </div>

 </div>
</div>


















	<div class="hidden"></div>
	<!-- Mandatory for Responsive Bootstrap Toolkit to operate -->
	<div class="device-xs visible-xs"></div>
	<div class="device-sm visible-sm"></div>
	<div class="device-md visible-md"></div>
	<div class="device-lg visible-lg"></div>
	<!-- end mandatory -->
	<!--[if lt IE 9]>
	<script src="libs/html5shiv/es5-shim.min.js"></script>
	<script src="libs/html5shiv/html5shiv.min.js"></script>
	<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="libs/respond/respond.min.js"></script>
	<![endif]-->
	<!--<script src="libs/jquery/jquery-1.11.1.min.js"></script>
	<script src="libs/jquery-mousewheel/jquery.mousewheel.min.js"></script>
	<script src="libs/fancybox/jquery.fancybox.pack.js"></script>
	<script src="libs/waypoints/waypoints-1.6.2.min.js"></script>
	<script src="libs/scrollto/jquery.scrollTo.min.js"></script>
	<script src="libs/owl-carousel/owl.carousel.min.js"></script>
	<script src="libs/countdown/jquery.plugin.js"></script>
	<script src="libs/countdown/jquery.countdown.min.js"></script>
	<script src="libs/countdown/jquery.countdown-ru.js"></script>
	<script src="libs/landing-nav/navigation.js"></script>
	<script src="libs/bootstrap-toolkit/bootstrap-toolkit.min.js"></script>
	<script src="libs/maskedinput/jquery.maskedinput.min.js"></script>
	<script src="libs/equalheight/jquery.equalheight.js"></script>
	<script src="libs/stellar/jquery.stellar.min.js"></script>
	<script src="js/common.js"></script>
	<!-- Yandex.Metrika counter --><!-- /Yandex.Metrika counter -->
	<!-- Google Analytics counter --><!-- /Google Analytics counter -->
	<script type="text/javascript">
 clock();
</script>
</body>
</html>