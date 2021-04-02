<?php
include "libraries/User.php";
include "connect.php";
include "libraries/Database.php";
include "libraries/Authenticate.php";

$cosa = new User();
$db = new Database();
$auth = new Authenticate();
$user_data = [
    'username'=>'makena',
    'password'=>'password',
    'name'=>'joan wanjiru',
    'email'=>'joan@gmail.com'
];
$cosa->login($user_data,$conn,$db,$auth);

?>