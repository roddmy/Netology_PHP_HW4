<?php

$content = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=Moscow,ru&appid=e7425706bcd4490ebe5d6fef880070b0");

$location = "Current weather in Moscow";
$precipitation = "Precipitation: ";
$curr_temp = "Current temperature, °С: ";
$temp_min = "Minimum temperature, °С: ";
$temp_max = "Maximum temperature, °С: ";
$wind_power = "Wind speed, м/с: ";
$humidity = "Humidity, %: ";
$pressure = "Pressure, mm Hg: ";

//echo "$content";

$result = json_decode($content,true);

//echo "<pre>";
//print_r($result);

$icon = "http://openweathermap.org/img/w/".$result["weather"][0]["icon"].".png";

echo "<b>", mb_convert_case($location, 0), "</b>", "<br>", 
		"<img src = $icon>", "<br>",
		"<b>", $precipitation, "</b>", $result["weather"][0]["description"], "<br>",
		"<b>", $curr_temp, "</b>", $result["main"]["temp"] - 273, "<br>",
		"<b>", $temp_min, "</b>", $result["main"]["temp_min"] - 273, "<br>",
		"<b>", $temp_max, "</b>", $result["main"]["temp_max"] - 273, "<br>",
		"<b>", $wind_power, "</b>", $result["wind"]["speed"], "<br>",
		"<b>", $humidity, "</b>", $result["main"]["humidity"], "<br>",
		"<b>", $pressure, "</b>", $result["main"]["pressure"] * 0.750062, "<br>";
  
  ?>