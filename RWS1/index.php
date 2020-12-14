<?php
$var=$_GET['account_id'];
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,"http://localhost/tocode4/RWS1.PHP?account_id=".$var);

curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$response=curl_exec($curl);
$data=json_decode($response);
echo $response;



?>