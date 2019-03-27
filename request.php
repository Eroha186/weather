
  <?php
      // Получение названия города
      $cityName = trim($_POST['cityName']);
      
      // Подключение к БД
      $bd = new mysqli('localhost', 'root', '', 'weather');

      // Проверка работоспособности поключения 
      if ($bd -> connect_error) {
        die('Error : '. $mysqli->connect_error);
      }

      $lon;
      $lat;

      // Достаем координаты города из  БД
      if (isset($_POST['cityName'])) {
        if ($result = $bd->query(" SELECT * FROM cityes WHERE name = '$cityName' ")) {
          $row = $result->fetch_array(MYSQLI_ASSOC);
          
          $lon = $row['lon'];
          $lat = $row['lat'];
          $result->free();
          $bd -> close();
        }
      }
// "lat":50.207775,"lon":15.831585,"
      // // Отправление запроса на API 
      require __DIR__ . '/vendor/autoload.php';
      use \Curl\Curl;

      if (isset($lat) && isset($lon)) {
       
        $arrayWeather = new curl();
        $arrayWeather->setHeader('X-Yandex-API-Key', '770f38e6-79e0-4154-86f5-311625392bd9');
        $arrayWeather->get('https://api.weather.yandex.ru/v1/forecast', array(
          'lat' => "$lat",
          'lon' => "$lon",
        ));
        echo $arrayWeather->response;
       // echo $arrayWeather->response;
        $arrayWeather->close();
      }
      
      
  ?>
