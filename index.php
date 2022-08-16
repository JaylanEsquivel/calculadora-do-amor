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
	
	
	$curl = curl_init();

	curl_setopt_array($curl, [
		CURLOPT_URL => "https://google-translate1.p.rapidapi.com/language/translate/v2",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "q=".$_retorno['result']."&target=pt&source=en",
		CURLOPT_HTTPHEADER => [
			"Accept-Encoding: application/gzip",
			"X-RapidAPI-Host: google-translate1.p.rapidapi.com",
			"X-RapidAPI-Key: 580a15097cmshae0fc56a187fb11p1622fcjsn5450de7ba91e",
			"content-type: application/x-www-form-urlencoded"
		],
	]);

	$response2 = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	$_retorno2 = json_decode( $response2, true );

		
	

	echo "Compatibilidade amorosa e chances de um relacionamento amoroso bem-sucedido.<br>";
	echo "Casal: ".$_retorno['fname']." & ".$_retorno['sname']." Percentual: ".$_retorno['percentage']."% <br>".$_retorno2["data"]["translations"][0]["translatedText"];
	
}