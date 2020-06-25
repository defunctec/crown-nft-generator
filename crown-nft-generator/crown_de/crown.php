<?php
	// Check if entry from form match
	if(isset($_POST['Username']) && isset($_POST['Email']) && isset($_POST['NFTName']) && isset($_POST['NFTID']) && isset($_POST['NFTOwneraddress']) && isset($_POST['NFTMetadataAdminAddress']) && isset($_POST['NFTMetadata'])){
	$username = $_POST['Username'];
	$email = $_POST['Email'];
	$nftname = $_POST['NFTName'];
	$nftid = $_POST['NFTID'];
	$nftownaddress = $_POST['NFTOwneraddress'];
	$adminaddress = $_POST['NFTMetadataAdminAddress'];
	$NFTMetadata = $_POST['NFTMetadata'];
	// Call to Crown client
	$curl = curl_init();
	curl_setopt_array($curl, array(
	CURLOPT_PORT => "9341",
	CURLOPT_URL => "http://RPCUSER:RPCPASS@VPSIP:9341",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_SSL_VERIFYHOST => 0,
	CURLOPT_SSL_VERIFYPEER => 0,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	// Command to Crown client.
	CURLOPT_POSTFIELDS => '{"jsonrpc": "1.0", "id":"curltest", "method": "nftoken", "params": ["issue","'.$nftname.'","'.$nftid.'","'.$nftownaddress.'","'.$adminaddress.'","'.$NFTMetadata.'"] }',
	//CURLOPT_POSTFIELDS => '{"jsonrpc": "1.0", "id":"curltest", "method": "getinfo", "params": [] }',
	//CURLOPT_POSTFIELDS => '{"jsonrpc": "1.0", "id":"curltest", "method": "nftoken", "params": ["issue","nprf","1d0eac61086c9cfc6e23e8e3cf0f1b892836ae4551c0b19510f704b676d2fdfa","tCRWZwLBbBB97mRsBnnRcHqdTjw12Z5CUgMi9","tCRWZwLBbBB97mRsBnnRcHqdTjw12Z5CUgMi9","https://api.myjson.com/bins/exzwt"] }',
	CURLOPT_HTTPHEADER => array(
	"cache-control: no-cache",
	"content-type: application/json",
	"user: RPCUSER:RPCPASS"
	),
)); 
	//print_r($curl);
	$response = curl_exec($curl);
	// If fail
	echo $response;
	}else{
		echo '{error:"Please enter valid method"}';
	}
	die;
	?>