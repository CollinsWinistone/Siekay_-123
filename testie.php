<?php
include "libraries/User.php";
include "libraries/Database.php";
include "libraries/Authenticate.php";
include "connect.php";

$cosa = new Database();
$columns = [
	'username'=>'edna',
	'password'=>'edna'
	
	
];
$values = [
	'edna',
	'edna'
	

];
$user = new User();
$db = new Database();
$auth = new Authenticate();
//$user->login($columns,$conn,$db,$auth);

//authentication phase
$data=$auth->login_authenticate($columns,$conn,$db);
print_r($data);

?>