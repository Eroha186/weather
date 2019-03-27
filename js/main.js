
$(document).ready(function() {

	$('.button').bind('click', function() {
		event.preventDefault();
		var cityName = $('.cityName').val();
		$('.cityName').val('');
		$.ajax({
			type: "POST",
			url: "request.php",
			data: {cityName:cityName},
			success: function(request) {
				var arrayWeather = JSON.parse(request);
				//состояние погоды
				var con = arrayWeather.fact.condition;
				//направление ветра 
				var wind_dir_var = arrayWeather.fact.wind_dir;
				$(".result").empty().append(
					'<p>Город: ' + cityName + '</p>',
					'<p>Температура: ' + arrayWeather.fact.temp + '</p>',
					'<p>Ощущаемая температура: ' + arrayWeather.fact.feels_like + '</p>',
					'<p>' + condition(con) + '</p>',
					'<p>Скорость ветра: ' + arrayWeather.fact.wind_speed + ' м/c</p>',
					'<p>Скорость порывов ветра: ' + arrayWeather.fact.wind_gust + ' м/с</p>',
					'<p>Направление ветра: ' + wind_dir(wind_dir_var) + '</p>',
					'<p>Давление: ' + arrayWeather.fact.pressure_mm + ' мм рт.ст.</p>',
					'<p>Влажность: ' + arrayWeather.fact.humidity + ' %</p>',
				);	

			}
		});
	});	
	function condition(con) {
		var condition = new Map([
			['clear','ясно'],
			['partly-cloudy','малооблачно'],
			['cloudy','облачно с прояснениями'],
			['overcast','пасмурно'],
			['partly-cloudy-and-light-rain','небольшой дождь'],
			['partly-cloudy-and-rain','дождь'],
			['overcast-and-rain','сильный дождь'],
			['overcast-thunderstorms-with-rain','сильный дождь и гроза'],
			['cloudy-and-light-rain','небольшой дождь'],
			['overcast-and-light-rain','небольшой дождь'],
			['cloudy-and-rain','дождь'],
			['overcast-and-wet-snow','дождь со снегом'],
			['partly-cloudy-and-light-snow ','небольшой снег'],
			['partly-cloudy-and-snow','снег'],
			['overcast-and-snow','снегопад'],
			['cloudy-and-light-snow','небольшой снег'],
			['overcast-and-light-snow','небольшой снег'],
			['cloudy-and-snow','снег'],
		]);
		return condition.get(con);
	};

	function wind_dir(wind_dir_var) {
		var wind_dir = new Map([
			['nw','северо-западное'],
			['n','северное'],
			['ne','северо-восточное'],
			['e','восточное'],
			['se','юго-восточное'],
			['s','южное'],
			['sw','юго-западное'],
			['w','западное'],
			['с','штиль'],
		]);
		return wind_dir.get(wind_dir_var);
	};

});
