<?php
session_start();


include "../connect.php";
include "../libraries/Authenticate.php";
include "../libraries/Database.php";
include "../libraries/User.php";





if( isset( $_POST["submit"] ) )
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    //array of user data
    $user_data = [
        'username'=>$username,
        'password'=>$password
    ];

    $user = new User();
    $dbObj = new Database();
    $auth = new Authenticate();
    if($user->login($user_data,$conn,$dbObj,$auth))
    {
        $_SESSION['id'] = $user->getUserId();
        $_SESSION['user'] = $user->getUsername();
        header("Location:../index.php");
    }
    else
    {
        header("Location:../login.php");
    }

}

?>