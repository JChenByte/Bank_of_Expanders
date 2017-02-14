<?php
/* Retrieve earthquake json data from $url, save to file named $fileName. */

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

/* Pass 7 Days Data */

// Retrieve past 7 days M1+ earthquake data
getJson('http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/1.0_week.geojson', '1.0_week.json');

// Retrieve past 7 days M2.5+ earthquake data
getJson('http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojson', '2.5_week.json');

// Retrieve past 7 days M4.5+ earthquake data
getJson('http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_week.geojson', '4.5_week.json');

// Retrieve past 7 days significant earthquake data
getJson('http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/significant_week.geojson', 'significant_week.json');

// Retrieve past 7 days all earthquake data
getJson('http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_week.geojson', 'all_week.json');

/* Pass Day Data */

// Retrieve past day M1+ earthquake data
getJson('http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/1.0_day.geojson', '1.0_day.json');

// Retrieve past day M2.5+ earthquake data
getJson('http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_day.geojson', '2.5_day.json');

// Retrieve past day M4.5+ earthquake data
getJson('http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_day.geojson', '4.5_day.json');

// Retrieve past day significant earthquake data
getJson('http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/significant_day.geojson', 'significant_day.json');

// Retrieve past day all earthquake data
getJson('http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_day.geojson', 'all_day.json');

/* Pass Hour Data */

// Retrieve past hour M1+ earthquake data
getJson('http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/1.0_hour.geojson', '1.0_hour.json');

// Retrieve past hour M2.5+ earthquake data
getJson('http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_hour.geojson', '2.5_hour.json');

// Retrieve past hour M4.5+ earthquake data
getJson('http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_hour.geojson', '4.5_hour.json');

// Retrieve past hour significant earthquake data
getJson('http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/significant_hour.geojson', 'significant_hour.json');

// Retrieve past hour all earthquake data
getJson('http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_hour.geojson', 'all_hour.json');

?>