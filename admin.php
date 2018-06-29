<html>
<head>

<style>
    .rate-input {
        width: 40px;
    }
</style>

</head>
<body>


<form method="POST" action="create_match.php" border=1>
    Команда 1: <input type="text" name="command1" ><br>
    Команда 2: <input type="text" name="command2" ><br>
    Время матча: <input type="datetime-local" name="match_time" ><br>
    <button type="submit" name="submit">Создать матч</button>
</form>

<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

if ($server != null)
	$dbc = mysqli_connect($server, $username, $password, $db);
else
	$dbc = mysqli_connect('localhost', 'root', '', 'lesson');


    $query ="SELECT * FROM `matches`";
     
    $result = mysqli_query($dbc, $query) or die("Ошибка " . mysqli_error($dbc)); 
    if($result)
    {
        $rows = mysqli_num_rows($result); // количество полученных строк
         
        echo "<table class='redTable'>";
        while($match = mysqli_fetch_object($result))
        {
            echo "<tr>";

            $command1name = ucfirst(strtolower($match->command1));
            $command2name = ucfirst(strtolower($match->command2));
            
            echo "<td id='match$match->id' class='match_number'>#$match->id<br>$match->datetime</td>";
            echo "<td><div><img src=\"img/icons/$command1name.png\"></br><div class='match_2'>$match->command1</div></div><br><div class='score'>$match->score1</div>
            </div></td>";
            echo "<td><div class='match_3'>VS.</div></td>";
            echo "<td><div><img src=\"img/icons/$command2name.png\"></br><div class='match_2'>$match->command2</div></div><br><div class='score'>$match->score2</div></td>";
            echo "<td><br>$match->score1 - $match->score2</br></td>";

            ?>
            
            <td>
                  <form method="POST" action="set_result.php">
                    <input type="hidden" name="match_id" value="<?=$match->id?>">
                    <input class="rate-input inputcss" type="number" name="score1" >-
                    <input class="rate-input inputcss" type="number" name="score2" ><br>
                    <button id="baton" type="submit" name="submit">Сохранить результат</button>
                  </form>
              </td>

            <?php
             
             echo "</tr>";
        }
       
        echo "</table>";
         
        // очищаем результат
        mysqli_free_result($result);
    }
     
    mysqli_close($dbc);
?>

</body>
<html>