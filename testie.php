<?php
include "libraries/User.php";
include "libraries/Database.php";
include "connect.php";

$cosa = new Database();
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
$salama = $cosa->retrieve(array('id', 'name', 'description'), "category", "id>1", $conn);
print("<pre>" . print_r($salama, true) . "</pre>");
?>