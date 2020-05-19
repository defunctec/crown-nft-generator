<?php


$curl = curl_init();
curl_setopt_array($curl, array(
 CURLOPT_PORT => "9341",
 CURLOPT_URL => "http://RPCUSER:RPCPASS@RPCIP:9341/",
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_ENCODING => "",
 CURLOPT_MAXREDIRS => 10,
 CURLOPT_TIMEOUT => 30,
 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "{\"jsonrpc\": \"1.0\", \"id\":\"curltest\", \"method\": \"listaccounts\", \"params\": [] }",
 CURLOPT_HTTPHEADER => array(
"cache-control: no-cache",
"content-type: application/json",
"user: RPCUSER:RPCPASS"
 ),
)); 
print_r($curl);
$response = curl_exec($curl);
print_r($response);
$response; 
$err = curl_error($curl);
print_r($err);
curl_close($curl);
if ($err) {
echo "cURL Error #:" . $err;
} else {
echo $response;
} 

?>