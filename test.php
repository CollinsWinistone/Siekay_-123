<?php
session_start();

include "libraries/User.php";
include "libraries/Search.php";
include "libraries/Database.php";
include "libraries/Question.php";
include "libraries/Category.php";
include "connect.php";

$cosa = new Category();
$dbObj = new Database();
$columns = [
	'q_id',
	'answer'
];
$values = [
	38,
	'It is a web develoment framework'

];

print($cosa->getCategory("Anatomy",$dbObj,$conn));


//print("<pre>" . print_r($salama, true) . "</pre>");
/*$search_test = $cosa->search("nairobi", $conn, "category", array('description', 'name'), array('description'));
print("<pre>" . print_r($search_test, true) . "</pre>");*/

?>