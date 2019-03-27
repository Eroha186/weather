<?php 
$mysqli = new mysqli('localhost', 'root', '', 'weather');
$mysqli -> query("SET NAMES 'utf8'") or die ("Ошибка соединения с базой!");

if(!empty($_POST["cityName"])){ //Принимаем данные

    $referal = trim(strip_tags(stripcslashes(htmlspecialchars($_POST["cityName"]))));

    $db_referal = $mysqli -> query("SELECT * from cityes WHERE name LIKE '%$referal%'")
    or die('Ошибка №'.__LINE__.'<br>Обратитесь к администратору сайта пожалуйста, сообщив номер ошибки.');

    while ($row = $db_referal -> fetch_array()) {
        echo "\n<li>".$row["name"]."</li>"; //$row["name"] - имя поля таблицы
    }

}
?>