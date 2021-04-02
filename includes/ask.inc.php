<?php 
/**
 * script to process the asked question
 */
session_start();
include "../libraries/Database.php";
include "../libraries/Question.php";
include "../connect.php";

if(isset($_POST['submit']))
{
    $question = $_POST['question'];
    $user =$_SESSION['user'];
    $columns = ['question','askedby'];
    $values = [
        'question'=>$question,
        'askedby'=>'$user'
    ];

    $q = new Question();
    $db =new Database();

    $q->askQuestion($conn,$columns,$values,$db,"quans");

}

?>