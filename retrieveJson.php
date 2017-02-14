<?php
/* Retrieve earthquake json data from $url, save to file named $fileName. */
error_reporting(E_ALL);
ini_set('display_errors', '1');

function getJson($url, $fileName)
{
	$originalJson = file_get_contents($url);
	$arry = json_decode($originalJson, true);
	$newJson = [[]];
	$counter = 0;
	$address;


	foreach($arry as $branch) {

		// Only store certain earthquake data into the array.

			$newJson[$counter]['name'] = $branch['name']; // Original date was in UNIX millisecond
			$newJson[$counter]['address'] = $branch['address']['street_number'] . ' '. $branch['address']['street_name'] . ' '. $branch['address']['city']. ' '. $branch['address']['state'] . ' '. $branch['address']['zip'];
			$newJson[$counter]['longitude'] = $branch['geocode']['lng'];
			$newJson[$counter]['latitude'] = $branch['geocode']['lat'];
			$counter++;
		
	}

	// Save to file.

	file_put_contents($fileName, json_encode($newJson, JSON_UNESCAPED_SLASHES));
}

/* Pass 7 Days Data */

// Retrieve past 7 days M1+ earthquake data
getJson('http://api.reimaginebanking.com/branches?key=7b57d7d15e0c5aa45e919d1601e9b097', 'boe_branch.json');

?>