<!DOCTYPE html>
<html>
    <head>
        <title>weather</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
 <div class="container">
    <h1 class="titlle">Погода в вашем городе</h1>
    <form id="form">
      <input type="text" name="cityName" class="cityName" 
        autocomplite="off"
        placeholder="Введите название города....">
      <input type="submit" class="button" value="Поиск">  
      <ul class="search_result"><ul>
    </form>
    <div class="result">
    
    </div>
 </div>
  <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
  <script src="js/search.js"></script>
</body>
</html>
