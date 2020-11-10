<?php
$homepage = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=hasselt&appid=f9ff88af65b1412f98f3a3eaf68bb4c7');

$homepage = json_decode($homepage, true);

$temp = $homepage["main"]["temp"];
$temp_min = $homepage["main"]["temp_min"];
$temp_max = $homepage["main"]["temp_max"];
$pressure = $homepage["main"]["pressure"];
$humidity = $homepage["main"]["humidity"];


