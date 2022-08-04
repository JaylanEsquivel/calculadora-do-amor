<?php

$sname = 'Fulana'; 	//Enter second name.
$fname = 'Sicrano';	//Enter first name.
	
$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://love-calculator.p.rapidapi.com/getPercentage?sname=$sname&fname=$fname",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: love-calculator.p.rapidapi.com",
		"X-RapidAPI-Key: 580a15097cmshae0fc56a187fb11p1622fcjsn5450de7ba91e"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	
	$_retorno = json_decode( $response, true );

	echo "Compatibilidade amorosa e chances de um relacionamento amoroso bem-sucedido.<br>";
	echo "Casal: ".$_retorno['fname']." & ".$_retorno['sname']." Percentual: ".$_retorno['percentage']."% <br>".$_retorno['result'];
	
}