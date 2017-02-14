<?php
/* Retrieve earthquake json data from $url, save to file named $fileName. */
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
if ($request[0] != null) {
	/* print out json file based on request. */
	if (strcmp($request[0], 'withdraw') == 0) {
		withdraw("588d4d601756fc834d903dc6", intval($request[1]));
	} else if (strcmp($request[0], 'deposit') == 0) {
		deposit("588d4d601756fc834d903dc6", intval($request[1]));
	}else if (strcmp($request[0], 'branch') == 0) {
		if (strcmp($request[1], 'all') == 0) {
			echo file_get_contents("boe_branch.json");
		}
		else {
			echo 'invalid request';
		}
	} else if (strcmp($request[0], 'accountinfo') == 0) {
		getAccountInfo('588d4d601756fc834d903dc6');
	}

}

function getAccountInfo($id) {

	$url = "http://api.reimaginebanking.com/accounts/588d4d601756fc834d903dc6?key=7b57d7d15e0c5aa45e919d1601e9b097";   

	
	
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER,
			array("Content-type: application/json"));
	curl_setopt($curl, CURLOPT_POST, false);

	$json_response = curl_exec($curl);

	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	
	curl_close($curl);

	echo $json_response;

}
function checkAccount($id){
	$sURL = "http://api.reimaginebanking.com/"; // The POST URL
	$sPD = "customers/" . $id . "/accounts?key=7b57d7d15e0c5aa45e919d1601e9b097"; // The POST Data
	
	$aHTTP = array(
	'http' => // The wrapper to be used
	array(
	'method'  => 'POST', // Request Method
    // Request Headers Below
    'header'  => 'Content-type: application/x-www-form-urlencoded',
    'content' => $sURL + $sPD
  )
);

$context = stream_context_create($aHTTP);
$contents = file_get_contents($sURL, true, $context);

echo $contents;

}

function check($id){
	$url = 'http://api.reimaginebanking.com/';
	
	$myvars = 'customers/' . $id . '/accounts?key=7b57d7d15e0c5aa45e919d1601e9b097';
	
	$url .= $myvars;
	
	$ch = curl_init( $url );
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $myvars);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );

echo $response;
}

function createAccount($firstName, $lastName, $streetNumber, $streetName, $city, $state, $zip){

	$address = array(
	'street_number' => $streetNumber,
	'street_name' => $streetName,
	'city' => $city,
	'state' => $state,
	'zip' => $zip
	);

	$data = array(
	'first_name' => $firstName,
	'last_name' => $lastName,
	'address' => $address
	);
	
	$url = "http://api.reimaginebanking.com/customers?key=7b57d7d15e0c5aa45e919d1601e9b097";    

	$info = json_encode($data);
	
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER,
			array("Content-type: application/json"));
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $info);

	$json_response = curl_exec($curl);

	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	
	curl_close($curl);
	
	
	echo $json_response;
	
}

function deposit($id, $amount) {
	
	$deposit = array(
	'medium' => 'balance',
	'transaction_date' => date("Y-m-d"),
	'amount' => $amount,
	'description' => 'description'
	);
	
	
	$url = "http://api.reimaginebanking.com/accounts/" . $id . "/deposits?key=7b57d7d15e0c5aa45e919d1601e9b097";    

	$info = json_encode($deposit);
	
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER,
			array("Content-type: application/json"));
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $info);

	$json_response = curl_exec($curl);

	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	
	curl_close($curl);
	
	
	echo $json_response;
	
}


function withdraw($id, $amount){

	$withdrawal = array(
	'medium' => 'balance',
	'transaction_date' => date("Y-m-d"),
	'amount' => $amount,
	'description' => 'description'
	);
	
	
	$url = "http://api.reimaginebanking.com/accounts/" . $id . "/withdrawals?key=7b57d7d15e0c5aa45e919d1601e9b097";    

	$info = json_encode($withdrawal);
	
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER,
			array("Content-type: application/json"));
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $info);

	$json_response = curl_exec($curl);

	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	
	curl_close($curl);
	
	
	echo $json_response;
}



function getTime(){
	echo time();
}

function createDefaultAccount($id, $initialBalance){
	
	$account = array(
	'type' => 'Checking',
	'nickname' => 'Name',
	'rewards' => 0,
	'balance' => $initialBalance,
	'account_number' => '1111111111111111'
	);
	
	$url = "http://api.reimaginebanking.com/customers/" . $id . "/accounts?key=7b57d7d15e0c5aa45e919d1601e9b097";    

	$info = json_encode($account);
	
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER,
			array("Content-type: application/json"));
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $info);

	$json_response = curl_exec($curl);

	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	
	$result = json_decode($json_response);
	
	curl_close($curl);
	
	echo $json_response;
	
	
	
}

function getJson($url, $fileName)
{
	$originalJson = file_get_contents($url);
	$arry = json_decode($originalJson, true);
	$newJson = [[]];
	$counter = 0;
	
	foreach($arry['features'] as $earthquake) {

		// Only store certain earthquake data into the array.
		if (strcmp($earthquake['properties']['type'], 'earthquake') == 0) {
			$newJson[$counter]['time'] = date('Y-m-d H:i:s', $earthquake['properties']['time'] / 1000); // Original date was in UNIX millisecond
			$newJson[$counter]['place'] = $earthquake['properties']['place'];
			$newJson[$counter]['mag'] = $earthquake['properties']['mag'];
			$newJson[$counter]['url'] = $earthquake['properties']['url'];
			$newJson[$counter]['longitude'] = $earthquake['geometry']['coordinates']['0'];
			$newJson[$counter]['latitude'] = $earthquake['geometry']['coordinates']['1'];
			$newJson[$counter]['depth'] = $earthquake['geometry']['coordinates']['2'];
			$counter++;
		}
	}
	// Save to file.
	file_put_contents($fileName, json_encode($newJson, JSON_UNESCAPED_SLASHES));	
}

//check("0123");
//createAccount("John", "Smith", "1115", "AV Williams", "College Park", "MD", "20742");
//check("http://api.reimaginebanking.com/customers/", "588cfd9a1756fc834d903d8d")
//getTime();

//createDefaultAccount("588d4a6c1756fc834d903dc4", 1000000);

//deposit("588d4d601756fc834d903dc6", 100);
wang();
?>