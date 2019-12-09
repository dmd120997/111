<?php
$apiKey = "555cf949c037be3ca740ad6e16915c0c";
$cityId_711435 = "711435";
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId_711435 . "&lang=ua&units=metric&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data_B = json_decode($response);
?>
