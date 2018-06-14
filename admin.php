<html>
<head>
</head>
<body>


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

            if (strtotime('+3 hours', time()) < strtotime($match->datetime)) {
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
            } else echo "<td class='match_number'>Ставок больше нет</td>";
             
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