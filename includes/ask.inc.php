<?php 
/**
 * script to process the asked question
 */
session_start();
include "../libraries/Database.php";
include "../libraries/Question.php";
include "../libraries/Category.php";
include "../connect.php";

if(isset($_POST['submit']))
{
    $dbObj = new Database();
    $catObj = new Category();
    $question = $_POST['question'];
    $category = $_POST['cat'];
    $category_id = $catObj->getCategory($category,$dbObj,$conn);
    $user =$_SESSION['user'];
    $columns = ['question','askedby','category'];
    $values = [
        $question,
        $user,
        $category_id
    ];

    $q = new Question();
    $db =new Database();

    $q->askQuestion($conn,$columns,$values,$db,"question");

}

?>