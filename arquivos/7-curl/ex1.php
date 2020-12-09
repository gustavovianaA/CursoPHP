<?php
$cep = "01001000";
$link = "https://viacep.com.br/ws/$cep/json/";
$ch = curl_init($link);
//config
curl_setopt($ch, CURLOPT_RETURNTRANSFER /*MANDA E RECEBE*/,1 /*seta true*/);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER /* verifiva ssl*/,0 /*seta false */);
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response,true/*array*/);
print_r($data);
?>