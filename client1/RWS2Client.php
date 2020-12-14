<?php

$curl_handle = curl_init();

$url = "https://covid19-api.org/api/timeline/:country";

curl_setopt($curl_handle, CURLOPT_URL, $url);


curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

$curl_data = curl_exec($curl_handle);

curl_close($curl_handle);


echo json_encode($curl_data);

?>