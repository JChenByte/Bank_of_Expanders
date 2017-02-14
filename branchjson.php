<?php
/*
* API Doc:
* api.php/getJson/{hour/day/week}/{1-5}	retrieve processed json data
* api.php/checkMD5/{1-15}/{md5}	check MD5 value of a particular json data. Return 0 if md5 values are the same.
*/


$path = $_SERVER['PATH_INFO'];
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
if ($request[0] != null) {
	/* print out json file based on request. */
	if (strcmp($request[0], 'branch') == 0) {
		if (strcmp($request[1], 'all') == 0) {
			echo file_get_contents("boe_branch.json");
		}
		else {
			echo 'invalid request';
		}
	}
}
else {
	echo 'invalid request';
}
?>