<?php

include "libraries/User.php";
include "libraries/Search.php";
include "connect.php";

$cosa = new Search();
$columns = [
	'username',
	'password',
	'name',
	'email',
];
$values = [
	'winstone',
	'Siekay',
	'Collins Winistone',
	'win@gmail.com',

];

//print("<pre>" . print_r($salama, true) . "</pre>");
$search_test = $cosa->search("nairobi", $conn, "category", array('description', 'name'), array('description'));
print("<pre>" . print_r($search_test, true) . "</pre>");

?>